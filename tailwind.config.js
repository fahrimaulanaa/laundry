/** @type {import('tailwindcss').Config} */
module.exports = {
  //all file in laundry
  content: ["./**/*.php", './node_modules/tw-elements/dist/js/**/*.js'],
  theme: {
    extend: {},
  },
  plugins: [
    require('tw-elements/dist/plugin'),
    require('@tailwindcss/forms'),
  ],
}
