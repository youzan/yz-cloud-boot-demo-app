const ora = require('ora');
const fs = require('fs-extra');
const chalk = require('chalk');
const webpack = require('webpack');
const config = require('../config');
const rootConfig = require('../../config.js');
const {uploadCdn} = require('../../utils');
const webpackConfig = require('./webpack.prod.conf');
const upload = require('youzanyun/lib');
const spinner = ora('building for production...');
spinner.start();

process.env.NODE_ENV = 'production';

fs.removeSync(config.build.pages);
fs.removeSync(config.build.output);
const hasWelcome = rootConfig.welcome && rootConfig.welcome.indexOf(config.rootPath) >= 0;
if (hasWelcome) {
  fs.removeSync(`${config.build.index}/index.html`);
  fs.removeSync(`${config.build.index}/index.ftl`);
}

webpack(webpackConfig, (err, stats) => {
  spinner.stop();
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

  console.log(chalk.cyan('  Build complete.\n'));
  console.log(
    chalk.yellow(
      '  Tip: built files are meant to be served over an HTTP server.\n' +
      "  Opening index.html over file:// won't work.\n"
    )
  );

  uploadCdn(stats, config.build.output, upload);
});

