# 有赞电商云 - 前端开发
```
> 有赞定制前端开发代码目录
```
## 目录结构说明：
```bash
.
├── components                  定制组件开发目录
├── vue-pages                   定制页面开发目录（vue）
├── react-pages                 定制页面开发目录（react）
└── mp-app                      定制小程序开发目录（小程序）

```

## 注意事项（必读）
- 目前为开发者提供了两套页面开发脚手架和一套组件开发脚手架
- 开发时可使用代理工具，可将测试接口返回页面中需要的的静态资源（js/css/图片）代理到本地用于调试，
   mac电脑可使用zan-proxy + SwitchyOmega

   zan-proxy: https://youzan.github.io/zan-proxy
   SwitchyOmega: https://chrome.google.com/webstore/detail/proxy-switchyomega/padekgcemlokbadohgkifijomclgjgif?utm_source=chrome-ntp-icon
   SwitchyOmega配置教程：https://developers.youzanyun.com/article/1560326581043

- vue-pages、react-pages内部提供了多入口打包功能，可自定义多款模版文件，配合后端modelAndView.addObject可做一些简单的SEO等，更多好玩的东西等着大家去发掘
- 组件开发必须使用提供的脚手架，使用vue为前端开发框架
- 页面开发建议：h5开发使用vue-pages、pc开发使用react-pages，但不是必须的，具体使用何种框架开发者可根据团队能力、业务需求等情况自行选择
- 打包后文件需输出到 ../src/resources/ java层会获取templates目录中的ftl文件作为模版文件输出
- ./components/README.md 必读
- ./vue-pages/README.md 必读
- ./react-pages/README.md 必读
- ./mp-app/README.md 必读
- ./config.js 文件配置代理转发域名和欢迎页面（welcome = 'react-pages.src.pages.index' 表示文件夹 react-pages/src/pages/index/main.js作为入口文件打出的页面作为欢迎页面）
## 环境依赖
1. node环境依赖 = 8.11.1
2. npm环境依赖（尽量保持一致，避免不必要的错误）= 5.6.0