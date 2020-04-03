let mix = require('laravel-mix')
let tailwindcss = require('tailwindcss')

mix.setPublicPath('public')
    .js('resources/js/bigcommerce.js', 'public/js')
    // .sass('resources/scss/bigcommerce.scss', 'public/css', { implementation: require('node-sass') })
    .version()
    .options({
        processCssUrls: false,
        postCss: [
            tailwindcss('../../resources/tailwind.js')
        ]
    })