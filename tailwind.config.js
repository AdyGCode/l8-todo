const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            // Build your palette here
            transparent: 'transparent',
            current: 'currentColor',
            white: colors.white,
            black: colors.black,
            blueGray: colors.blueGray,
            coolGray: colors.coolGray,
            gray: colors.gray,
            trueGray: colors.trueGray,
            warmGray: colors.warmGray,
            red: colors.red,
            orange: colors.orange,
            amber: colors.amber,
            yellow: colors.yellow,
            lime: colors.lime,
            green: colors.green,
            emerald: colors.emerald,
            teal: colors.teal,
            cyan: colors.cyan,
            sky: colors.sky,
            blue: colors.blue,
            indigo: colors.indigo,
            violet: colors.violet,
            purple: colors.purple,
            fuchsia: colors.fuchsia,
            pink: colors.pink,
            rose: colors.rose,
        },
        linearGradientColors: theme => theme('colors'),
        radialGradientColors: theme => theme('colors'),
        conicGradientColors: theme => theme('colors'),
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/aspect-ratio'),

        require('tailwindcss-gradients'),
        require("tailwind-heropatterns")({
            // as per tailwind docs you can pass variants
            variants: [],

            // the list of patterns you want to generate a class for
            // the names must be in kebab-case
            // an empty array will generate all 87 patterns
            patterns: [],

            // The foreground colors of the pattern
            colors: {
                default: "#71717a",

                "black": "#000000",
                "white": "#ffffff",
                "warmGray": "#78716c",
                "trueGray": "#737373",
                "gray": "#71717a",
                "coolGray": "#6b7280",
                "blueGray": "#64748b",

                "blue-900": "#1e3a8a",

                "purple": '#a855f7',
                "violet": '#8b5cf6',
                "indigo": '#6366f1',
                "blue": "#3b82f6",
                "sky": "#0ea5e9",
                "cyan": "#06b6d4",
                "teal": '#14b8a6',
                "emerald": '#10b981',
                "green": "#22c55e",
                "lime": '#84cc16',
                "yellow": "#eab308",
                "amber": '#f59e0b',
                "orange": '#f97316',
                "rose": '#f43f5e',
                "red": "#ef4444",
                "pink": "#ec4899",
                "fuchsia": '#d946ef',

            },

            // The foreground opacity
            opacity: {
                default: "0.4",
                "100": "1.0"
            }
        })
    ],
};
