const utils = require('./utils');
const webpack = require('webpack');
const config = require('../config');
const merge = require('webpack-merge');
const path = require('path');
const baseWebpackConfig = require('./webpack.base.conf');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const FriendlyErrorsPlugin = require('friendly-errors-webpack-plugin');

process.env.NODE_ENV = 'development';

module.exports = merge(baseWebpackConfig, {
  module: {
    rules: utils.styleLoaders({ 
      sourceMap: true, 
      extract: true, 
    })
  },
  // cheap-module-eval-source-map is faster for development
  devtool: 'cheap-module-eval-source-map',

  plugins: [
    // new webpack.ProgressPlugin(),
    new webpack.DefinePlugin({
      'process.env': {
        NODE_ENV: JSON.stringify('development')
      }
    }),
    new webpack.NamedModulesPlugin(), // HMR shows correct file names in console on update.
    new ExtractTextPlugin({
      filename: ('[name].css'),
      allChunks: true,
    }),
    new FriendlyErrorsPlugin()
  ].concat(utils.htmlPlugin())
});
