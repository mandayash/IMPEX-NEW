import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/sass/home.scss',
                'resources/js/home.js',
                'resources/sass/complete-profile.scss',
                'resources/js/complete-profile.js',
                'resources/css/create-product.css',
                'resources/css/my-store.css',
            ],
            refresh: true,
        }),
    ],
});
