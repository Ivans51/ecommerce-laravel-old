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
          "light": "#00D4C1",
          "DEFAULT": "#009688",
          "dark": "#004037",
        },
        "secondary": {
          "DEFAULT": "#F1F5FC",
        },
      },
      gridTemplateRows: {
        'home-custom': 'auto 1fr auto',
      },
      fontFamily: {
        'sans': ['monospace']
      },
      fontSize: {
        'base': '1.1rem',
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}
