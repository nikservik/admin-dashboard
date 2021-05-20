module.exports = {
  purge: [
    './../admin-*/resources/views/**/*.blade.php',
  ],
  darkMode: 'media',
  theme: {
    fontFamily: {
      sans: '"Cera Pro", "Helvetica Neue", Arial, sans-serif'
    },
    borderRadius: {
      none: '0',
      sm: '7px',
      DEFAULT: '11px',
      md: '13px',
      lg: '21px',
      full: '9999px',
    },
    extend: {
        minHeight: {
            '20': '20px',
            '30': '30px',
        },
        minWidth: {
            '20': '20px',
            '30': '30px',
        },
        width: {
            '1/7': '14.2857143%',
            '2/7': '28.5714286%',
            '3/7': '42.8571429%',
            '4/7': '57.1428571%',
            '5/7': '71.4285714%',
            '6/7': '85.7142857%',
        },
     }
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
