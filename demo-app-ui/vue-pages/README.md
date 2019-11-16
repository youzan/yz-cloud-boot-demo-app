# 电商云 - 前端页面开发脚手架（vue）
> 本项目为有赞定制开发vue版本脚手架,集成有赞 h5 端 WebUI 规范 vant，https://youzan.github.io/vant/#/zh-CN/intro

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

# 启动本地页面，端口见config/index.js
npm run dev


# 打包 输出路径为: 
#        模版文件：工程根目录/src/resources/templates/XXX.ftl
#        其他静态资源： 工程根目录/src/resources/static/vue/
npm run build

# build for production and view the bundle analyzer report
npm run build --report
```

## 命名规范

### JS/CSS 文件
除组件外，统一使用中划线分隔，如 `my-func.js` `index.js`

### 文件夹
统一使用中划线分隔，如 `my-dir`

### Vue 组件
除 index.vue 外，统一使用大驼峰，如 `MyComponent.vue`

### 变量
统一使用驼峰，如 `myVar`

### global 参数
尽量使用小驼峰

### 接口字段
尽量使用小驼峰，部分历史遗漏代码为下划线分隔
