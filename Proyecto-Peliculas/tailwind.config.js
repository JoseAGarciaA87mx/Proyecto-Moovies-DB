import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            blue: {
                '50': '#E3F2FD',
                '100': '#BBDEFB',
                '200': '#90CAF9',
                '300': '#64B5F6',
                '400': '#42A5F5',
                '500': '#2196F3',
                '600': '#1E88E5',
                '700': '#1976D2',
                '800': '#1565C0',
                '900': '#0D47A1',
              },
              purple: {
                '50': '#F3E5F5',
                '100': '#E1BEE7',
                '200': '#CE93D8',
                '300': '#BA68C8',
                '400': '#AB47BC',
                '500': '#9C27B0',
                '600': '#8E24AA',
                '700': '#7B1FA2',
                '800': '#6A1B9A',
                '900': '#4A148C',
              },
              red: {
                '50': '#FFEBEE',
                '100': '#FFCDD2',
                '200': '#EF9A9A',
                '300': '#E57373',
                '400': '#EF5350',
                '500': '#F44336',
                '600': '#E53935',
                '700': '#D32F2F',
                '800': '#C62828',
                '900': '#B71C1C',
              },
        },
    },

    plugins: [forms, typography],
};
