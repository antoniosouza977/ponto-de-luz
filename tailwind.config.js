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
                'body' : '#ffffff',
                'title' : '#d1f8d1',
                'card' : '#f4fffa',
            }
        },
    },
    plugins: [],
}
