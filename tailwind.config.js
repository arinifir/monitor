/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php"
  ],
  theme: {
    extend: {
      colors: {
        'default': '#0F4C75',
        blue: {
          50: '#2C5E80',
          100: '#3282B8',
        }
      }
    },
  },
  // plugins: [
  //   require('flowbite/plugin')
  // ],
  plugins: [require("daisyui")], 
}


