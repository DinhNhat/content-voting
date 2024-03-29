const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
            'gray': {
                400: '#a3a3a3',
                500: '#6b7280',
                600: '#4b5563'
            },
            'indigo': {
                200: '#c7d2fe',
                300: '#a5b4fc',
                500: '#6366f1',
                600: '#4f46e5'
            },
            'violet': {
                300: '#c4b5fd',
                400: '#a78bfa',
                500: '#8b5cf6',
                600: '#7c3aed'
            },
            'red': {
                100: '#fee2e2',
                500: '#ef4444',
                600: '#dc2626',
                700: '#b91c1c',
                DEFAULT: '#e11d48'
            },
            hardrock: '#a5f3fc',
            tan: '#daa520',
            emerald: '#800080',
        },
        extend: {
            colors: {
                transparent: colors.transparent,
                black: colors.black,
                white: colors.white,
                slate: colors.slate,
                gray: colors.trueGray,
                'gray-background': '#f7f8fc',
                'blue': '#328af1',
                'blue-hover': '#2879bd',
                'yellow': '#ffc73c',
                'green': '#1aab8b',
                'purple': '#8b60ed',
            },
            spacing: {
                22: '5.5rem',
                44: '11rem',
                70: '17.5rem',
                76: '19rem',
                104: '26rem',
                175: '43.75rem'
            },
            maxWidth: {
                custom: '68.5rem'
            },
            boxShadow: {
                card: '4px 4px 15px 0 rgba(36, 37, 38, 0.08)',
                dialog: '3px 4px 15px 0 rgba(36, 37, 38, 0.22)'
            },
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                xxs: ['0.625rem', { lightHeight: '1rem' }],
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp')
    ],

};
