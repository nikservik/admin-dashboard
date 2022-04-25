const plugin = require('tailwindcss/plugin')
const colors = require('tailwindcss/colors')

module.exports = {
  purge: {
      content: [
        './../admin-*/resources/views/**/*.blade.php',
      ],
      safelist: [
          'text-su-700', 'text-mo-700', 'text-ma-700', 'text-me-700', 'text-ve-700', 'text-jp-700', 'text-sa-700', 'text-ra-700', 'text-ke-700',
          'hover:bg-su-100', 'hover:bg-mo-100', 'hover:bg-ma-100', 'hover:bg-me-100', 'hover:bg-ve-100', 'hover:bg-jp-100', 'hover:bg-sa-100', 'hover:bg-ra-100', 'hover:bg-ke-100',
          'sm:bg-su-100', 'sm:bg-mo-100', 'sm:bg-ma-100', 'sm:bg-me-100', 'sm:bg-ve-100', 'sm:bg-jp-100', 'sm:bg-sa-100', 'sm:bg-ra-100', 'sm:bg-ke-100',
          'bg-su-100', 'bg-mo-100', 'bg-ma-100', 'bg-me-100', 'bg-ve-100', 'bg-jp-100', 'bg-sa-100', 'bg-ra-100', 'bg-ke-100',
          'bg-su-200', 'bg-mo-200', 'bg-ma-200', 'bg-me-200', 'bg-ve-200', 'bg-jp-200', 'bg-sa-200', 'bg-ra-200', 'bg-ke-200',
          'bg-su-400', 'bg-mo-400', 'bg-ma-400', 'bg-me-400', 'bg-ve-400', 'bg-jp-400', 'bg-sa-400', 'bg-ra-400', 'bg-ke-400',
          'border-su-300', 'border-mo-300', 'border-ma-300', 'border-me-300', 'border-ve-300', 'border-jp-300', 'border-sa-300', 'border-ra-300', 'border-ke-300',
          'border-su-100', 'border-mo-100', 'border-ma-100', 'border-me-100', 'border-ve-100', 'border-jp-100', 'border-sa-100', 'border-ra-100', 'border-ke-100',
          'sm:border-su-100', 'sm:border-mo-100', 'sm:border-ma-100', 'sm:border-me-100', 'sm:border-ve-100', 'sm:border-jp-100', 'sm:border-sa-100', 'sm:border-ra-100', 'sm:border-ke-100',
          'hover:border-su-300', 'hover:border-mo-300', 'hover:border-ma-300', 'hover:border-me-300', 'hover:border-ve-300', 'hover:border-jp-300', 'hover:border-sa-300', 'hover:border-ra-300', 'hover:border-ke-300',
          'first:mt-px', 'first:border-t', 'mt-px', 'border-t',
          'pl-2', 'pl-4', 'pl-6', 'pl-8', 'pl-10',
      ],
  },
  darkMode: 'media',
  theme: {
    colors: {
      // Build your palette here
      transparent: 'transparent',
      current: 'currentColor',
      black: colors.black,
      white: colors.white,
      gray: colors.blueGray,
      red: colors.red,
      blue: colors.blue,
      green: colors.emerald,
      yellow: colors.yellow,
      orange: colors.orange,
      violet: colors.violet,
      fuchsia: colors.fuchsia,
      indigo: colors.indigo,
      'su': {  DEFAULT: '#FFD96A',  '50': '#FFF6DD',  '100': '#FFF3D0',  '200': '#FFEDB6',  '300': '#FFE69D',  '400': '#FFE084',  '500': '#FFD96A',  '600': '#FFC841',  '700': '#FCB41C',  '800': '#F19C02',  '900': '#CD7F03'},
      'mo': {  DEFAULT: '#FACCAD',  '50': '#FEF4EE',  '100': '#FEF0E7',  '200': '#FDE7D8',  '300': '#FCDECA',  '400': '#FBD5BB',  '500': '#FACCAD',  '600': '#F9BD95',  '700': '#F7B182',  '800': '#F2A672',  '900': '#EE9B62'},
      'ma': {  DEFAULT: '#F78684',  '50': '#FDDDDA',  '100': '#FDD4D0',  '200': '#FCC6C2',  '300': '#FBB7B3',  '400': '#F99F9C',  '500': '#F78684',  '600': '#F4645F',  '700': '#ED493D',  '800': '#E03926',  '900': '#CD331F'},
      'me': {  DEFAULT: '#97D88A',  '50': '#E3F5E0',  '100': '#DBF1D7',  '200': '#CAEBC3',  '300': '#B9E5B0',  '400': '#A8DE9D',  '500': '#97D88A',  '600': '#78CD68',  '700': '#60B84E',  '800': '#4A9F39',  '900': '#3A812C'},
      'jp': {  DEFAULT: '#C09FDB',  '50': '#F7F2FA',  '100': '#F1E9F7',  '200': '#E5D7F0',  '300': '#D8C4E9',  '400': '#CCB2E2',  '500': '#C09FDB',  '600': '#AC83CE',  '700': '#986BBD',  '800': '#8455AA',  '900': '#724696'},
      've': {  DEFAULT: '#FFA2CB',  '50': '#FFE7F1',  '100': '#FFDFED',  '200': '#FFD0E5',  '300': '#FFC1DC',  '400': '#FFB1D4',  '500': '#FFA2CB',  '600': '#F989BB',  '700': '#F76DAA',  '800': '#F15499',  '900': '#E53D87'},
      'sa': {  DEFAULT: '#84B1D4',  '50': '#FBFCFE',  '100': '#EEF4F9',  '200': '#D3E3F0',  '300': '#B9D3E6',  '400': '#9EC2DD',  '500': '#84B1D4',  '600': '#629BC8',  '700': '#4186BB',  '800': '#356D99',  '900': '#2A5577'},
      'ra': {  DEFAULT: '#A9A19C',  '50': '#FEFEFE',  '100': '#F5F4F3',  '200': '#E2DFDE',  '300': '#CFCAC8',  '400': '#BCB6B2',  '500': '#A9A19C',  '600': '#918781',  '700': '#776E68',  '800': '#5C5550',  '900': '#413C38'},
      'ke': {  DEFAULT: '#C5C5C5',  '50': '#FEFEFE',  '100': '#F8F8F8',  '200': '#EBEBEB',  '300': '#DFDFDF',  '400': '#D2D2D2',  '500': '#C5C5C5',  '600': '#ACACAC',  '700': '#929292',  '800': '#797979',  '900': '#5F5F5F'},
    }
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
