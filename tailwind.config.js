import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['novaregular', ...defaultTheme.fontFamily.sans],
                novaSemiBold: ['novasemibold', ...defaultTheme.fontFamily.sans],
                novaBold: ['novabold', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                paradisePink: '#E7385C',
                faluRed: '#7F2021',
                coolGray: '#F9F9F9',
            },
        },

        corePlugins: {
            container: false,
        },
    },

    plugins: [forms, typography],
};
