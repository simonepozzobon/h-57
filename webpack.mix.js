const mix = require('laravel-mix');

mix
    .browserSync({
        proxy: 'http://h-57.test',
        browser: 'google chrome',
        files: [
            'wp-admin/**/*',
            'wp-includes/**/*',
            'wp-content/themes/**/*',
        ]
    })
