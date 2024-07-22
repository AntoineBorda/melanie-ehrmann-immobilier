/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./assets/**/*.js",
        "./templates/**/*.html.twig",
        "./node_modules/flowbite/**/*.js"
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                // Slate TailwindCSS
                default: {
                    "50": "#f8fafc",
                    "100": "#f1f5f9",
                    "200": "#e2e8f0",
                    "300": "#cbd5e1",
                    "400": "#94a3b8",
                    "500": "#64748b",
                    "600": "#475569",
                    "700": "#334155",
                    "800": "#1e293b",
                    "900": "#0f172a",
                    "950": "#020617"
                },
                // Teal TailwindCSS
                primary: {
                    "50": "#f0fdfa",
                    "100": "#ccfbf1",
                    "200": "#99f6e4",
                    "300": "#5eead4",
                    "400": "#2dd4bf",
                    "500": "#14b8a6",
                    "600": "#0d9488",
                    "700": "#0f766e",
                    "800": "#115e59",
                    "900": "#134e4a",
                    "950": "#042f2e"
                },
                // Amber TailwindCSS
                secondary: {
                    "50": "#fffbeb",
                    "100": "#fef3c7",
                    "200": "#fde68a",
                    "300": "#fcd34d",
                    "400": "#fbbf24",
                    "500": "#f59e0b",
                    "600": "#d97706",
                    "700": "#b45309",
                    "800": "#92400e",
                    "900": "#78350f",
                    "950": "#572508"
                },
            }
        },
        fontFamily: {
            'sans': [
                'Nunito',
                'ui-sans-serif',
                'system-ui',
                '-apple-system',
                'system-ui',
                'Segoe UI',
                'Roboto',
                'Helvetica Neue',
                'Arial',
                'Noto Sans',
                'sans-serif',
                'Apple Color Emoji',
                'Segoe UI Emoji',
                'Segoe UI Symbol',
                'Noto Color Emoji'
            ],
            'title': [
                'Weave',
                'ui-sans-serif',
                'system-ui',
                '-apple-system',
                'system-ui',
                'Segoe UI',
                'Roboto',
                'Helvetica Neue',
                'Arial',
                'Noto Sans',
                'sans-serif',
                'Apple Color Emoji',
                'Segoe UI Emoji',
                'Segoe UI Symbol',
                'Noto Color Emoji'
            ],
        }
    },
    plugins: [
        require('flowbite/plugin')
    ],
}