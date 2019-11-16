const express = require('express')
const proxy = require('http-proxy-middleware')
const rootConfig = require('../../config.js')
const openBrowser = require('react-dev-utils/openBrowser');
const HOST = 'localhost'
const PORT = '3000'

const pathRewrite = function (path, req) {
  let newPath = path;
  const regExpJs = new RegExp('/react/js/(.*)\\.(.*).js$')
  const regExpCss = new RegExp('/react/css/(.*)\\.(.*).css$')
  if(regExpJs.test(path)) {
    newPath = path.replace(regExpJs, '/js/$1.js');
  } else if (regExpCss.test(path)) {
    newPath = path.replace(regExpCss, '/css/$1.css');
  } else {
    newPath = path.replace('/react', '');
  }
  return newPath;
}

const apiProxy = proxy(['**/*', '!**/*.js', '!**/*.css', '!**/*.htm', '!**/*.html', '!**/*.gif', '!**/*.jpg', '!**/*.png', '!**/*.svg', '!**/*.jpeg', '!**/*.bmp', '!**/*.ico'],
  {target: rootConfig.appDomain,
    secure: false,
    changeOrigin: true,
    // router: routers,
  });

  const staticProxy = proxy(['**/*.js', '**/*.css', '**/*.htm', '**/*.html', '**/*.gif', '**/*.jpg', '**/*.png', '**/*.svg', '**/*.jpeg', '**/*.bmp', '**/*.ico'],
  {target: `http://${HOST}:${PORT}`,
    secure: false,
    changeOrigin: true,
    pathRewrite: pathRewrite,
  });
const app = express()
// module.exports = function (app) {
app.use(apiProxy);
app.use(staticProxy);
app.listen(8090)
openBrowser(`http://${HOST}:8090`);
