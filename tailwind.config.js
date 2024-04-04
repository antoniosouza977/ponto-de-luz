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
                'pl-blue' : '#89A1EF',
                'pl-green' : '#91F5AD',
                'pl-tomato' : '#FCB07E',
                'pl-balck' : '#100B00',
            }
        },
    },
    plugins: [],
}
