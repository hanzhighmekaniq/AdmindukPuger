import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/css/font.css', // Tambahkan ini jika belum ada
            'resources/js/app.js',
        ]),
    ],
    // server: {
    //     host: true, // Agar bisa diakses dari HP
    //     port: 5173, // Port untuk Vite
    // },
});
