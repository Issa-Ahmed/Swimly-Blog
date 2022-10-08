/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    fontFamily : {
    poppins : ['Poppins, sans-serif']
  },
    extend: {
      spacing: {
        '128': '32rem'
      }
    },
  },
  plugins: [],
}
