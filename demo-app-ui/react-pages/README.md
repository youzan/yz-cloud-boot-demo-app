## 电商云 - 前端开发脚手架（react）
```
本项目为有赞定制开发react版本脚手架,集成有赞 PC 端 WebUI 规范 zent，https://youzan.github.io/zent/zh/guides/install,
```

## 目录结构

```
.
├── src                         代码目录
│   ├── assets                  静态资源文件(不推荐，建议放到cdn)
│   ├── common                  客户端通用模块
│   ├── components              客户端通用组件
│   └── pages                   客户端页面入口
├── node_modules                node_modules
├── config                      打包配置文件存放目录
├── template                    模版文件目录
└── webpack                     打包配置文件目录

```
## 注意事项（必读）
- webpack配置多入口打包方案，会自动扫描src下所有的main.js文件，作为打包入口文件进行打包（重要）
- 模版文件默认为template下index.html，如果需要使用特定模版，请创建符合特定文件命名规则的html模版，例如：
- src/youzan/goods/main.js作为入口文件需要使用的模版文件名，应命名为：youzan.goods.html   截取src下面目录结构，以.分割命名

## Build Setup

``` bash
# 安装依赖
npm install

# 启动本地页面，端口config/index.js
npm run dev


# 打包 输出路径为: 
#        模版文件：工程根目录/src/resources/templates/XXX.ftl
#        其他静态资源： 工程根目录/src/resources/static/react/
npm run build

# build for production and view the bundle analyzer report
npm run build --report
```

## 命名规范

* 组件文件，文件名称使用大驼峰，并且跟组件名称保持一致，例如 `ActionButton` 组件的文件名就是 `ActionsButton.js`
* 一般文件，文件名称使用小驼峰
* 导出函数的文件名驼峰（首字母小写），一般和函数名字保持一致，例如 `withPop`
* 文件夹命名
  1. 如果该文件夹下存在 **index.xx** 文件并且 export default 为组件，那么使用全小写，并且使用'-'隔开字母
  2. 否则使用小驼峰

#### State文件
1. 在state文件里面定义一个当前模块state的interface（命名用`I${模块名称}State`）
2. Action用[immer](https://github.com/mweststrate/immer)库的  produce 方法来代替 return {...state, ...newState}，同时显示声明state参数的类型,方便编辑器智能提示