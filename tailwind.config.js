/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme')

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue"
  ],
  theme: {
    extend: {
        fontFamily: {
            sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            times: ['"Times New Roman"', 'Times', 'serif'],
          },
    },
  },
  plugins: [require('tailwindcss-tables')(),
    require('@tailwindcss/forms')
  ],
}

