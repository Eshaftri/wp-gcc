const mix = require("laravel-mix");

mix.js("assets/main.js", "dist").sass("assets/main.scss", "dist");
