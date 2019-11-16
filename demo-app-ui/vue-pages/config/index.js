const path = require('path');
const fs = require('fs');
const rootConfig = require('../../config.js');
const appDirectory = fs.realpathSync(process.cwd());
const resolveApp = relativePath => path.resolve(appDirectory, relativePath);
const publicPath = path.resolve(appDirectory, '../', rootConfig.puhlicPath);

console.log('publicPath', publicPath);

module.exports = {
  rootPath: 'vue-pages.src',
  publicPath,
  htmlPath: 'templates',
  jscssPath: 'static',
  dev: {
    // Paths
    host: 'localhost',
    port: 3002,
  },
  build: {
    // Template for index.html
    pages: resolveApp(`${publicPath}/templates/vue-pages`),
    index: resolveApp(`${publicPath}/templates`),
    // Paths
    output: resolveApp(`${publicPath}/static/vue`),
    assetsSubDirectory: '',
  }
};
