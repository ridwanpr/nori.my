import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/nori.css', 'resources/css/detail.js', 'resources/js/app.js', 'resources/js/nori.js', 'resources/js/watch.js'],
            refresh: true,
        }),
    ],
});
