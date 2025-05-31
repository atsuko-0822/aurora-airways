import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'node_modules/@fortawesome/fontawesome-free/css/all.min.css',
            ],
            refresh: true,
        }),
    ],

    //  server: {
    //     https: {
    //         key: fs.readFileSync('/path/to/localhost-key.pem'),
    //         cert: fs.readFileSync('/path/to/localhost-cert.pem'),
    //     },
    //     host: 'localhost',
    //     port: 5175,
    // },
});
