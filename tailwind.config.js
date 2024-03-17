/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./index.html',
            './ewc/',
            './admin/**/.{html,js,php}',
            './zamola/**/.{html,js,php}'],
  theme: {
    extend: {},
  },
  plugins: [],
}

