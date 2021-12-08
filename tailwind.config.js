const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        "primary": {
          "light": "#63d093ff",
          "DEFAULT": "#56B280",
          "dark": "#41825cff",
          "100": 'rgba(86,178,128, 0.1)'
        },
        "secondary": {
          "DEFAULT": "#272727",
        },
        "tertiary":  {
          "DEFAULT": "#F7F8FA",
          "dark": "#2a2929",
        },
        "quartary":  {
          "DEFAULT": "#9E9E9E",
        },
      },
      gridTemplateRows: {
        'home-custom': 'auto 1fr auto',
      },
      fontFamily: {
        poppins: ['Poppins'],
        roboto: ['Roboto']
      },
    },
  },
  variants: {
    extend: {},
  },
  daisyui: {
    themes: false,
  },
  plugins: [
    require('daisyui'),
  ],
}
