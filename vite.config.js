import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/nori.css',
                'resources/js/detail.js',
                'resources/js/app.js',
                'resources/js/nori.js',
                'resources/js/watch.js',
                'resources/js/histats.js'
            ],
            refresh: true,
        }),
    ],
});

