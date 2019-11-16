const { execSync } = require("child_process");
const path = require("path");

function getAppName() {
  const options = {};
  options.shell = true;
  options.env = process.env;
  options.env.LC_CTYPE = "UTF-8";
  options.cwd = process.cwd();
  const remote = execSync("git remote -v", options).toString("utf8");

  const appNameArr = remote
    .split("/")
    .pop()
    .split(".");
  return appNameArr.slice(0, appNameArr.length - 1).join("/");
}

function uploadCdn(stats, outputPath, upload) {
  const appName = getAppName();
  const filenames = {};

  async function uploadFile(filenames) {
    const arr = Object.keys(filenames);
    for(let i=0, len=arr.length; i<len; i++){
      await upload([`${appName}/${arr[i]}`, ...filenames[arr[i]]], { hasHash: false });
    };
  }

  function execFile(file) {
    const ext = path.extname(file).slice(1);
    if(ext !== 'css' && ext !== 'js'){
      return;
    }
    if (!filenames[ext]) {
      filenames[ext] = [];
    }
    filenames[ext].push(path.resolve(outputPath, file));
  }

  const outputs = stats.toJson().assets;
  outputs.map((v, k) => {
    execFile(v.name);
  });
  uploadFile(filenames);
}

module.exports = {
  getAppName,
  uploadCdn
};
