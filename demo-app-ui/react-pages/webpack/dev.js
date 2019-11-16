const fs = require('fs-extra');
const chalk = require('chalk');
const webpack = require('webpack');
const config = require('../config');
const rootConfig = require('../../config.js');
const webpackConfig = require('./webpack.dev.conf');

process.env.NODE_ENV = 'development';

const express = require('express');
const app = express();
const port = config.dev.port;
app.use(express.static(config.publicPath));
app.listen(port, () => console.log(`listening on http://localhost:${port}, path is ${config.publicPath}`));

fs.removeSync(config.build.pages);
fs.removeSync(config.build.output);
const hasWelcome = rootConfig.welcome && rootConfig.welcome.indexOf(config.rootPath) >= 0;
if (hasWelcome) {
  fs.removeSync(`${config.build.index}/index.html`);
  fs.removeSync(`${config.build.index}/index.ftl`);
}

const compiler = webpack(webpackConfig);
compiler.watch({
  aggregateTimeout: 300,
  poll: undefined
}, (err, stats) => { // Stats Object
  if (err) throw err;
  process.stdout.write(
    `${stats.toString({
      colors: true,
      modules: false,
      children: false, // If you are using ts-loader, setting this to true will make TypeScript errors show up during build.
      chunks: false,
      chunkModules: false
    })}\n\n`
  );

  if (stats.hasErrors()) {
    // console.log(stats.toJson());
    console.log(chalk.red('  Build failed with errors.\n'));
    process.exit(1);
  }
});


