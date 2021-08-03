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
        },
        "secondary": {
          "DEFAULT": "#272727",
        },
      },
      gridTemplateRows: {
        'home-custom': 'auto 1fr auto',
      },
      fontFamily: {
        'sans': ['Roboto']
      },
      /*fontSize: {
        'base': '1.1rem',
      }*/
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
