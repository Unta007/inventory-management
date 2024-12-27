import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss', // Your main Sass file
                'resources/js/app.js',      // Your main JavaScript file
            ],
            refresh: true, // Enables hot module replacement
        }),
    ],
    server: {
        host: '0.0.0.0', // Listen on all interfaces
        port: 3000,      // Set the port to 3000
        strictPort: true, // Exit if the port is already in use
    },
});
