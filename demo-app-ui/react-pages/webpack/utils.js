const path = require('path');
let glob = require('glob');
let merge = require('webpack-merge');
// 页面模板
const HtmlWebpackPlugin = require('html-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const fs = require('fs');
const config = require('../config');
const rootConfig = require('../../config.js');
const packageConfig = require('../package.json');
const HtmlEnvCode = require('../../utils/HtmlEnvCode');

const hasWelcome = rootConfig.welcome && rootConfig.welcome.indexOf(config.rootPath) >= 0;
const language = rootConfig.language;

// 取得相应的页面路径，因为之前的配置，所以是src文件夹下的templates文件夹
const PAGE_PATH = path.resolve(__dirname, '../template');
const ENTRY_PATH = path.resolve(__dirname, '../src');
const entries = function() {
  const entryFiles = glob.sync(`${ENTRY_PATH}/**/@(main).js`, {matchBase: true});
  const map = {};
  entryFiles.forEach((filePath) => {
    const relativePath = filePath.split(`${ENTRY_PATH}/`);
    let key = 'index';
    if (relativePath.length > 1) {
      const relativeKey = relativePath[1].split('/main.js');
      if (relativeKey.length > 1) {
        key = relativeKey[0].replace('/', '.');
      }
    }
    map[key] = filePath;
  });
  return map;
};
exports.entries = entries;

// 与上面的多页面入口配置相同，读取templates文件夹下的对应的html后缀文件，然后放入数组中
exports.htmlPlugin = function() {
  // 每个入口文件都需要生成一个出口文件
  const entries = this.entries();
  let arr = [];
  for (const entry in entries) {
    let templatePath = `${PAGE_PATH}/index.html`;
    if (fs.existsSync(`${PAGE_PATH}/${entry}.html`)) {
      templatePath = `${PAGE_PATH}/${entry}.html`;
    }
    let filename = `${entry}.html`;
    if (process.env.NODE_ENV === 'production') {
      if (hasWelcome && entry === rootConfig.welcome.substring(`${config.rootPath}.`.length)) {
        filename = `${config.build.index}/index`;
      } else if (hasWelcome && entry === 'index') {
        filename = `${config.build.index}/index`;
      } else {
        filename = `${config.build.pages}/${entry}`;
      }
      // 根据不同语言，添加不同的模版后缀
      filename += language === 'java' ? '.ftl' : '.html';
    } else {
      if (hasWelcome && entry === rootConfig.welcome.substring(`${config.rootPath}.`.length)) {
        filename = `${config.build.index}/index.html`;
      } else if (hasWelcome && entry === 'index') {
        filename = `${config.build.index}/index.html`;
      } else {
        filename = `${config.build.pages}/${entry}.html`;
      }
    }
    let conf = {
      // 模板来源
      template: `raw-loader!${templatePath}`,
      // 文件名称
      filename,
      // 页面模板需要加对应的js脚本，如果不加这行则每个页面都会引入所有的js脚本
      chunks: ['manifest', 'vendor', entry],
      inject: true,
    };

    if (process.env.NODE_ENV === 'production') {
      conf = merge(conf, {
        minify: {
          removeComments: true,
          collapseWhitespace: true,
          removeAttributeQuotes: true
        },
        chunksSortMode: 'dependency'
      });
    }
    arr.push(new HtmlWebpackPlugin(conf));
    arr.push(new HtmlEnvCode({
      language: language,
    }));
  }
  return arr;
};

exports.assetsPath = function (_path) {
  const assetsSubDirectory = config.build.assetsSubDirectory;
  return path.posix.join(assetsSubDirectory, _path);
};

exports.cssLoaders = function (options) {
  options = options || {};

  const cssLoader = {
    loader: 'css-loader',
    options: {
      sourceMap: options.sourceMap
    }
  };

  // generate loader string to be used with extract text plugin
  function generateLoaders (loader, loaderOptions) {
    const loaders = [cssLoader];

    if (loader) {
      loaders.push({
        loader: `${loader}-loader`,
        options: Object.assign({}, loaderOptions, {
          sourceMap: options.sourceMap
        })
      });
    }

    // Extract CSS when that option is specified
    // (which is the case during production build)
    if (options.extract) {
      return ExtractTextPlugin.extract({
        use: loaders,
        fallback: 'style-loader'
      });
    } else {
      return ['style-loader'].concat(loaders);
    }
  }

  return {
    css: generateLoaders(),
    sass: generateLoaders('sass', { indentedSyntax: true }),
    scss: generateLoaders('sass'),
    stylus: generateLoaders('stylus'),
    styl: generateLoaders('stylus')
  };
};

exports.styleLoaders = function (options) {
  const output = [];
  const loaders = exports.cssLoaders(options);

  for (const extension in loaders) {
    const loader = loaders[extension];
    output.push({
      test: new RegExp(`\\.${extension}$`),
      use: loader
    });
  }

  return output;
};

exports.createNotifierCallback = () => {
  const notifier = require('node-notifier');

  return (severity, errors) => {
    if (severity !== 'error') return;

    const error = errors[0];
    const filename = error.file && error.file.split('!').pop();

    notifier.notify({
      title: packageConfig.name,
      message: `${severity}: ${error.name}`,
      subtitle: filename || '',
      icon: path.join(__dirname, 'logo.png')
    });
  };
};
