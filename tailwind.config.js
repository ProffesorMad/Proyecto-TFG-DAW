import defaultTheme from 'tailwindcss/defaultTheme'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./storage/framework/views/*.php",
        "./app/View/Components/**/*.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    safelist: [
        'bg-black',
        'text-white',
        'flex',
        'hidden',
        'block',
        'grid',
    ],

    plugins: [],
}
