const plugin = require('tailwindcss/plugin')

module.exports = {
  purge: [
    './../admin-*/resources/views/**/*.blade.php',
  ],
  darkMode: 'media',
  theme: {
    // fontFamily: {
    //   sans: '"Cera Pro", "Helvetica Neue", Arial, sans-serif'
    // },
  },
  variants: {
    extend: {
      display: ['group-focus', 'group-hover',],
    },
  },
  plugins: [
    plugin(function({ addUtilities }) {
      addUtilities({
        '.compact .compact\\:hidden': {
          display: 'none',
        },
        '.compact .compact\\:flex': {
          display: 'flex',
        },
      })
    })
  ],
}
