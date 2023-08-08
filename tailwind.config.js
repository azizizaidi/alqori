/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    'node_modules/preline/dist/*.js',
      './app/Http/Livewire/**/*Table.php',
    
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('preline/plugin'),
  ],
  darkMode: 'class',
}

