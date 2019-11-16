# 电商云

## 目录结构

```
├── dist    构建结果
├── src    源码目录
│   └── _global    全局组件目录（目录名固定）
│   └── node_buy    下单页节点（和有赞提供节点标识一致，查询地址）
│       	├── _common    节点级组件目录（目录名固定）
│       	└── buy    下单页模版（和有赞提供节点标识一致，查询地址）
│       		  ├── components    自定义组件目录
│       			    └── Xxx     自定义组件
│       				      └── App.vue      自定义组件指定入口文件
└── package.json
```
> 注：以上目录名有具体要求，请开发时确认正确。

## 命令
`npm install` 安装项目依赖
`npm install youzanyun -g` 全局安装youzanyun工具

本地开发
`npm run dev` 

`npm run release` 发布

## 如何开发自定义组件

在 `src/**/components` 目录下可以开发自定义组件，组件入口文件名必须为`App.vue`，使用 `export default` 直接导出对象，且包含直接用字符串声明值的 name 和 title 字段，如：

```html
<script>
export default {
  name: 'demo',
  title: '示例组件'
};
</script>
```
