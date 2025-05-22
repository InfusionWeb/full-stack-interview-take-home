import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';
import react from '@vitejs/plugin-react';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                // Comment the following line if you want to use Vue
                'resources/js/app.js',
                // Uncomment the following line if you want to use React
                // 'resources/js/app.jsx',
            ],
            refresh: true,
        }),
        tailwindcss(),

        // Uncomment the following line if you want to use Vue
        // vue({template: {transformAssetUrls: {base: null,includeAbsolute: false}}}),

        // Uncomment the following line if you want to use React
        // react(),
    ],
});
