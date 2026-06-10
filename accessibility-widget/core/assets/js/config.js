const FIXED_MORE_INFO_URL = 'https://transparenciaparaelpueblo.bcs.gob.mx/accesibilidad/saber-mas';

export const defaultAccessibilityWidgetConfig = {
    storageKey: 'itpbcs-accessibility-settings',
    logoSrc: null,
    logoAlt: 'Logotipo del Instituto',
    speechLang: 'es-MX',
    moreInfoUrl: FIXED_MORE_INFO_URL,
    defaultEnabledFeatures: [],
    labels: {
        eyebrow: 'Accesibilidad',
        title: 'Opciones de accesibilidad',
        reset: 'Restablecer',
        visual: 'Visual',
        reading: 'Lectura',
        spacing: 'Espaciado',
        assistance: 'Asistencia',
        fontDec: 'A-',
        fontInc: 'A+',
        grayscale: 'Escala de grises',
        contrast: 'Alto contraste',
        highlightLinks: 'Resaltar enlaces',
        cursorSize: 'Cursor grande',
        darkMode: 'Modo oscuro',
        readingMask: 'Máscara de lectura',
        readingGuide: 'Guía de lectura',
        dyslexiaFont: 'Tipografía para dislexia',
        verticalSpacing: 'Espaciado vertical',
        horizontalSpacing: 'Espaciado horizontal',
        screenReader: 'Asistente de lectura',
        moreLink: 'Saber más',
    },
    ariaLabels: {
        toggle: 'Abrir menú de accesibilidad',
        close: 'Cerrar menú de accesibilidad',
        fontDec: 'Reducir tamaño de texto',
        fontInc: 'Aumentar tamaño de texto',
        verticalSpacingLevel1: 'Nivel 1 de espaciado vertical',
        verticalSpacingLevel2: 'Nivel 2 de espaciado vertical',
        verticalSpacingLevel3: 'Nivel 3 de espaciado vertical',
        horizontalSpacingLevel1: 'Nivel 1 de espaciado horizontal',
        horizontalSpacingLevel2: 'Nivel 2 de espaciado horizontal',
        horizontalSpacingLevel3: 'Nivel 3 de espaciado horizontal',
    },
};

const isPlainObject = (value) => Boolean(value) && typeof value === 'object' && !Array.isArray(value);

const mergeConfig = (base, override) => {
    if (!isPlainObject(override)) {
        return { ...base };
    }

    const result = { ...base };

    Object.entries(override).forEach(([key, value]) => {
        if (isPlainObject(value) && isPlainObject(base[key])) {
            result[key] = mergeConfig(base[key], value);
            return;
        }

        result[key] = value;
    });

    return result;
};

const sanitizeFeatureDefaults = (features) => {
    if (!Array.isArray(features)) {
        return [];
    }

    return [...new Set(features.filter((feature) => typeof feature === 'string' && feature.trim() !== ''))];
};

export const getAccessibilityWidgetConfig = () => {
    const globalConfig = typeof window !== 'undefined' ? window.AccessibilityWidgetConfig : undefined;
    const merged = mergeConfig(defaultAccessibilityWidgetConfig, globalConfig);

    merged.storageKey = typeof merged.storageKey === 'string' && merged.storageKey.trim() !== ''
        ? merged.storageKey
        : defaultAccessibilityWidgetConfig.storageKey;
    merged.logoSrc = typeof merged.logoSrc === 'string' && merged.logoSrc.trim() !== ''
        ? merged.logoSrc
        : null;
    merged.logoAlt = typeof merged.logoAlt === 'string' && merged.logoAlt.trim() !== ''
        ? merged.logoAlt
        : defaultAccessibilityWidgetConfig.logoAlt;
    merged.speechLang = typeof merged.speechLang === 'string' && merged.speechLang.trim() !== ''
        ? merged.speechLang
        : defaultAccessibilityWidgetConfig.speechLang;
    merged.moreInfoUrl = FIXED_MORE_INFO_URL;
    merged.defaultEnabledFeatures = sanitizeFeatureDefaults(merged.defaultEnabledFeatures);

    return merged;
};

export const getDefaultAccessibilityState = () => {
    return getAccessibilityWidgetConfig().defaultEnabledFeatures.reduce((state, featureId) => {
        state[featureId] = true;
        return state;
    }, {});
};
