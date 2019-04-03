# YZCloudBootDemoApp

## 安装

`composer install`

## 配置

在 config 目录下面

* beps.php 配置扩展点实现
* routes.php 配置响应普通 Web 请求的 Controller

## 运行

先运行

`./vendor/youzanyun/yz-cloud-boot/bin/php_dev_server.sh`

或者如果安装了 XDebug, 可以开启方便调试

`./vendor/youzanyun/yz-cloud-boot/bin/php_dev_server.sh -d`

扩展点模拟测试：

`curl -XPOST "http://localhost:18888/business-extension-point/com.youzan.cloud.extension.api.BizTestService/invoke" -H 'Content-Type:application/json'  -H 'Transfer-Encoding:chunked' -H 'Bean-Name:testBep' -H 'Bean-Tag:1.0.0' -H 'Param-Type:com.youzan.cloud.extension.param.test.TestRequest'  -d '{"requestId":1,"data":{"number":100,"content":"测试扩展点"}}'`

Web 访问测试：

直接浏览器访问 http://localhost:18888
