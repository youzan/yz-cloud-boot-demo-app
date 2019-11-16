const { exec } = require('child_process');

promiseExec('npm view youzanyun version', {}).then((res)=>{
  const ver = res.replace(/\s/g, '');
  console.log(`\u001B[31m最新的打包工具版本为${ver}，如需更新请执行 npm run update\u001B[39m`);
}).catch(e=>{
  console.log(e);
})

function promiseExec (cmd, options) {
  return new Promise((resolve, reject) => {
    options.shell = true;
    options.env = process.env;
    options.env.LC_CTYPE = 'UTF-8';
    exec(cmd, options, (error, stdout, stderr) => {
      if (error) {
        console.log('error', error)
        reject(error);
        return;
      }
      if (stderr) {
        console.log('stderr', stderr)
        reject(stderr);
        return;
      }
      resolve(stdout);
    });
  });
}
