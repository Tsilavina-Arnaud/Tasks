import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/jquery-3.6.1.js',
                'resources/js/app.js',
                'resources/js/script.js',
                'resources/js/tasks.js',
                'resources/js/adm-tasks.js',
                'resources/css/style.css'
            ],
            refresh: true,  
        }),
    ],
});
