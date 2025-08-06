/** @type {import('tailwindcss').Config} */
module.exports = {
  prefix: "bfg-", // Custom prefix to avoid conflicts
  content: [
    "./**/*.php",
    "./assets/js/**/*.js",
    "./assets/css/**/*.css",
  ],
  theme: {
    extend: {
      colors: {
        skyCustom: '#58bbee',
      },
    },
  },
  plugins: [],
};
