# YZCloudBootDemoApp

## 安装

`composer install`

## 配置

在 config 目录下面

* beps.php 配置扩展点实现
* routes.php 配置响应普通 Web 请求的 Controller

## 运行

先运行

`./vendor/vimac/yz-cloud-boot/bin/php_dev_server.sh`

或者如果安装了 XDebug, 可以开启方便调试

`./vendor/vimac/yz-cloud-boot/bin/php_dev_server.sh -d`

扩展点模拟测试：

`curl -d '' -H 'Bean-Name:demo' http://localhost:18888/_bep/service/test`

Web 访问测试：

直接浏览器访问 http://localhost:18888
