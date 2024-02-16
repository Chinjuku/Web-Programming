/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily : {
        'sans' : ['"LINE Seed Sans TH"', 'sans-serif'],
      },
      colors : {
        'primary' : '#000'
      }
    },
  },
  plugins: [],
}

