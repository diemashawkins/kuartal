/**
 * Kuartal Shared Design System — Tailwind Configuration
 * Drop this into the root of any of the 5 Kuartal Laravel properties:
 *   kuartal.id, kuartalspace.com, kuartalcapital.com,
 *   kuartalimpact.org, kuartalventures.com
 *
 * Dark mode uses the 'class' strategy so the toggle in
 * resources/js/theme-toggle.js can flip it on <html>.
 */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  darkMode: 'class',
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        // Core brand palette — identical across all 5 properties.
        navy: {
          DEFAULT: '#18333d',
          deep: '#0b1319',
          50: '#eef3f4',
          100: '#d3e0e3',
          200: '#a7c1c8',
          300: '#7aa2ac',
          400: '#4e8390',
          500: '#2c5f6c',
          600: '#1f4a55',
          700: '#18333d', // brand navy
          800: '#122730',
          900: '#0b1319', // brand navy-deep
        },
        green: {
          DEFAULT: '#36cc64',
          50: '#eafcf1',
          100: '#c9f6da',
          200: '#93ecb6',
          300: '#5fe092',
          400: '#36cc64', // brand green accent
          500: '#28a852',
          600: '#1f8642',
          700: '#186833',
          800: '#134f27',
          900: '#0e3b1d',
        },
        gray: {
          bg: '#f7f9f9',
          border: '#e1e8ed',
          muted: '#6c7a86',
          'muted-dark': '#5b6b74',
        },
        // Dark-mode surface tokens (kept distinct from navy-deep, which is a brand color)
        surface: {
          light: '#ffffff',
          DEFAULT: '#f7f9f9', // gray-bg
          dark: '#0f1c22',
          'dark-alt': '#152730',
        },
      },
      fontFamily: {
        display: ['"Playfair Display"', ...defaultTheme.fontFamily.serif],
        sans: ['Inter', ...defaultTheme.fontFamily.sans],
      },
      borderRadius: {
        card: '14px',
        pill: '999px',
      },
      boxShadow: {
        card: '0 2px 10px rgba(11, 19, 25, 0.06)',
        'card-dark': '0 2px 14px rgba(0, 0, 0, 0.35)',
      },
      maxWidth: {
        content: '1180px',
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
  ],
};
