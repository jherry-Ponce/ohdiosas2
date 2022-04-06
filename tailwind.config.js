const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')
module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            /* cuando se agrega colores nuevos se debe ejecutar el comando npm run dev para que estos esten funcionales */
            colors: {
                trueGray: colors.trueGray,
                orange: colors.orange,
                greenLime: colors.lime,
                greenEsmerald: colors.emerald,
                Blue: colors.blue,
                Indigo: colors.indigo,
                Yellow: colors.yellow,
                Rose: colors.rose,
                Red: colors.red,
                Teal: colors.teal,
                Purple: colors.purple,
              },
              gridTemplateColumns: {
                // Simple 16 column grid
                '6': 'repeat(6, minmax(0, 1fr))',
              }
        },

       
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
