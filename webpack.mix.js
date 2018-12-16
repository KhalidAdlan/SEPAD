const mix = require('laravel-mix'), secure_assetsDir = 'resources/', distDir = 'public/dist/';

mix.sass(secure_assetsDir + 'scss/admin.scss', distDir + 'css/admin.css')
  .sass(secure_assetsDir + 'scss/application.scss', distDir + 'css/application.css')
  .js(secure_assetsDir + 'js/admin.js', distDir + 'js/admin.js')
  .js(secure_assetsDir + 'js/application.js', distDir + 'js/application.js');

if (mix.inProduction()) {
  mix.version();
}
