#!/usr/bin/env python3
"""
Migra navbars embebidos a componente central (#navbar-root + js/navbar.js).
"""
import re
import os
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent

NAV_START_PATTERNS = [
    r"<!--\s*Barra de navegación\s*-->",
    r"<!--\s*INCIO NAVBAR[\s\S]*?-->",
    r"<!--\s*Navbar[\s\S]*?-->",
]

PLACEHOLDER_TEMPLATE = """    <!-- Navbar CECYTE (componente central) -->
    <div id="navbar-root" data-base="{base}" data-variant="{variant}"></div>
    <script src="{js_path}navbar.js" defer></script>"""

# Script blocks that are navbar-only (remove entirely)
NAVBAR_SCRIPT_MARKERS = [
    "menu-btn",
    "mobile-menu",
    "toggleSubmenu",
    "docentes-btn",
    "servicios-btn",
    "nosotros-btn",
    "norma-btn",
    "trns-btn",
]


def compute_base(filepath: Path) -> str:
    rel = filepath.relative_to(ROOT)
    depth = len(rel.parts) - 1
    return "../" * depth if depth > 0 else ""


def compute_js_path(base: str) -> str:
    return base + "js/"


def find_nav_start(content: str) -> int | None:
    for pattern in NAV_START_PATTERNS:
        m = re.search(pattern, content, re.IGNORECASE)
        if m:
            # Also accept <nav without comment before it in some files
            return m.start()
    # Fallback: first <nav class="bg-white
    m = re.search(r'<nav\s+class="bg-white', content)
    if m:
        return m.start()
    return None


def find_nav_end(content: str, start: int) -> int | None:
    """Find end of navbar block (FIN comment or closing </nav>)."""
    fin = re.search(r"<!--\s*FIN NAVBAR[^>]*-->", content[start:], re.IGNORECASE)
    if fin:
        return start + fin.end()

    nav_open = content.find("<nav", start)
    if nav_open == -1:
        return None
    close = content.find("</nav>", nav_open)
    if close == -1:
        return None
    return close + len("</nav>")


def is_navbar_only_script(script_body: str) -> bool:
    body = script_body.strip()
    if not body:
        return False
    # Keep scripts with substantial non-navbar logic
    keep_markers = [
        "mostrarFecha",
        "VideoGallery",
        "videoData",
        "class ",
        "function mostrar",
        "addEventListener('scroll",
        "carousel",
        "Chart",
        "google.maps",
    ]
    for marker in keep_markers:
        if marker in body:
            return False
    for marker in NAVBAR_SCRIPT_MARKERS:
        if marker in body:
            return True
    return False


def strip_navbar_from_mixed_scripts(content: str) -> str:
    """Quita bloque de navbar dentro de scripts que también tienen otra lógica (ej. index.html)."""
    patterns = [
        r"\s*// Variables de navegación móvil[\s\S]*?(?=\s*// Función para mostrar fecha)",
        r"\s*// Variables de navegación móvil[\s\S]*?(?=\s*// Configuración de videos)",
        r"\s*const menuBtn = document\.getElementById\([\"']menu-btn[\"']\);[\s\S]*?(?=\s*// Función para mostrar fecha)",
        r"\s*const menuBtn = document\.getElementById\([\"']menu-btn[\"']\);[\s\S]*?(?=\s*function mostrarFecha)",
    ]
    for pattern in patterns:
        content = re.sub(pattern, "\n", content)
    return content


def strip_navbar_scripts(content: str) -> str:
    content = strip_navbar_from_mixed_scripts(content)

    def replacer(m):
        if is_navbar_only_script(m.group(1)):
            return ""
        return m.group(0)

    return re.sub(
        r"<script(?:\s[^>]*)?>([\s\S]*?)</script>",
        replacer,
        content,
        flags=re.IGNORECASE,
    )


def already_migrated(content: str) -> bool:
    return 'id="navbar-root"' in content


def has_orphan_nav(content: str) -> bool:
    root_pos = content.find('id="navbar-root"')
    if root_pos == -1:
        return False
    before = content[:root_pos]
    return bool(
        re.search(r"<nav\s+class=\"bg-white", before)
        or re.search(r"<!--\s*INICIO NAVBAR", before, re.IGNORECASE)
    )


def remove_orphan_nav(content: str) -> str:
    """Elimina restos de navbar embebido antes del placeholder."""
    patterns = [
        r"<!--\s*INICIO NAVBAR[\s\S]*?(?=\s*<!--\s*Navbar CECYTE|\s*<div id=\"navbar-root\")",
        r"<nav\s+class=\"bg-white[\s\S]*?(?=\s*<!--\s*Navbar CECYTE|\s*<div id=\"navbar-root\")",
        r"</nav>\s*<!--\s*FIN NAVBAR[\s\S]*?-->\s*(?=\s*<!--\s*Navbar CECYTE|\s*<div id=\"navbar-root\")",
    ]
    for pattern in patterns:
        content = re.sub(pattern, "", content, flags=re.IGNORECASE)
    return content


def migrate_file(filepath: Path) -> str:
    try:
        content = filepath.read_text(encoding="utf-8", errors="replace")
    except OSError:
        return "error"

    if already_migrated(content):
        if has_orphan_nav(content):
            cleaned = remove_orphan_nav(content)
            try:
                filepath.write_text(cleaned, encoding="utf-8")
            except OSError:
                return "error"
            return "cleaned"
        return "skip"

    start = find_nav_start(content)
    if start is None:
        return "no_marker"

    end = find_nav_end(content, start)
    if end is None:
        return "no_end"

    base = compute_base(filepath)
    js_path = compute_js_path(base)
    variant = "home" if filepath.name == "index.html" and base == "" else "default"

    placeholder = PLACEHOLDER_TEMPLATE.format(
        base=base, variant=variant, js_path=js_path
    )

    new_content = content[:start] + placeholder + content[end:]
    new_content = strip_navbar_scripts(new_content)

    try:
        filepath.write_text(new_content, encoding="utf-8")
    except OSError:
        return "error"
    return "migrated"


def main():
    html_files = list(ROOT.rglob("*.html"))
    exclude_dirs = {".git", "node_modules", "scripts"}

    stats = {"migrated": 0, "skip": 0, "cleaned": 0, "no_marker": 0, "no_end": 0, "error": 0}
    no_marker_files = []

    for fp in sorted(html_files):
        if any(part in exclude_dirs for part in fp.parts):
            continue
        result = migrate_file(fp)
        stats[result] = stats.get(result, 0) + 1
        if result == "no_marker":
            no_marker_files.append(str(fp.relative_to(ROOT)))

    print("=== Migración navbar ===")
    for k, v in stats.items():
        print(f"  {k}: {v}")
    if no_marker_files:
        print(f"\nSin marcador ({len(no_marker_files)} archivos):")
        for f in no_marker_files[:20]:
            print(f"  - {f}")
        if len(no_marker_files) > 20:
            print(f"  ... y {len(no_marker_files) - 20} más")


if __name__ == "__main__":
    main()
