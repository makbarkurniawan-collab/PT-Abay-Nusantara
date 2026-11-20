/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                coffee: {
                    950: '#2C1A12',
                    900: '#3E2723',
                    800: '#4E342E',
                },
                cream: '#FDF8EE',
                gold: '#EAB308',
                terracotta: '#B45309',
            },
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                display: ['"Playfair Display"', 'serif'],
            },
        },
    },
    plugins: [],
};
