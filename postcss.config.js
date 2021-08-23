module.exports = {
  plugins: [
    require('tailwindcss'),
    require('postcss-nested'),
    require('postcss-custom-properties'),
    require('autoprefixer'),
    require('postcss-normalize')({ browsers: 'last 2 versions' }),
    // require('cssnano')({preset: 'default'}),
  ]
}
