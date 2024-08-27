import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/posts/delete-index-confirmation.js',
                'resources/js/categories/delete-index-confirmation.js',
            ],
            refresh: true,
        }),
    ],
});
