/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            backgroundColor: {
                'rosa1' : '#F6B8AD',
                'rosa2' : '#FADCC4',
                'rosa2hv' : '#ffe7d3',
                'card' : '#f4fffa',
            }
        },
    },
    plugins: [],
}
