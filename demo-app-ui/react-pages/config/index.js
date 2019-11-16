const path = require('path');
const fs = require('fs');
const rootConfig = require('../../config.js');
const appDirectory = fs.realpathSync(process.cwd());
const resolveApp = relativePath => path.resolve(appDirectory, relativePath);
const publicPath = path.resolve(appDirectory, '../', rootConfig.puhlicPath);

console.log('publicPath', publicPath);

module.exports = {
  rootPath: 'react-pages.src',
  publicPath,
  htmlPath: 'templates',
  jscssPath: 'static',
  dev: {
    // Paths
    proxyTable: {},
    host: 'localhost',
    port: 3001,
    proxySetup: resolveApp('./config/setupProxy.js'),
  },
  build: {
    // Template for index.html
    pages: resolveApp(`${publicPath}/templates/react-pages`),
    index: resolveApp(`${publicPath}/templates`),
    // Paths
    output: resolveApp(`${publicPath}/static/react`),
    assetsSubDirectory: '',
  }
};
