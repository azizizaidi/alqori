/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    'node_modules/preline/dist/*.js',
      './app/Http/Livewire/**/*Table.php',
      './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
      './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php'
    
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('preline/plugin'),
  ],
  darkMode: 'class',
}

