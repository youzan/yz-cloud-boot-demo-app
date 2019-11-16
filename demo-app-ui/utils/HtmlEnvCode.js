function HtmlEnvCode(options) {
  this.options = options;
}

HtmlEnvCode.prototype.apply = function(compiler) {
    const language = this.options.language;
    const env = language === 'java' ? '${env!}' : language === 'php' ? '{{env}}' : '';
    compiler.plugin('compilation', function(compilation, options) {
       compilation.plugin('html-webpack-plugin-after-html-processing', function(htmlPluginData, callback) {
        // console.log(htmlPluginData.html = htmlPluginData.html.toString().replace(/youzan-cloud-env/, env))
        callback(null, htmlPluginData);
      });
    });
};

module.exports = HtmlEnvCode;