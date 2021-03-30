# YZCloudBootDemoApp

## 安装

`composer install`

## 配置

在 config 目录下面

* beps.php 配置扩展点实现
* routes.php 配置响应普通 Web 请求的 Controller

## 本地调试

本地应用变量

* env.local.yaml 用于配置需载入的本地应用环境变量
仅支持简单字符串类型，不支持其他类型及锁进层级结构，yaml格式。可以参照有赞云控制台-应用管理-配置管理-应用变量的键值配置

本地运行

`./vendor/youzanyun/yz-cloud-boot/bin/php_dev_server.sh`

或者如果安装了 XDebug, 可以开启方便调试

`./vendor/youzanyun/yz-cloud-boot/bin/php_dev_server.sh -d`

扩展点模拟测试：

`curl -XPOST "http://localhost:18888/business-extension-point/com.youzan.cloud.extension.api.BizTestService/invoke" -H 'Content-Type:application/json'  -H 'Transfer-Encoding:chunked' -H 'Bean-Name:testBep' -H 'Bean-Tag:1.0.0' -H 'Param-Type:com.youzan.cloud.extension.param.test.TestRequest'  -d '{"requestId":1,"data":{"number":100,"content":"测试扩展点"}}'`

Web 访问测试：

直接浏览器访问 http://localhost:18888

## Demo
请参照 config/routes.php 中的demo示例