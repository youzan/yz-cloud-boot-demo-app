<?php

/** @var \Slim\App $app */

$app->get('/', \YouzanCloudBootApp\Controller\IndexController::class . ':index');

/**
 * 默认路由
 */

$app->any('/', \YouzanCloudBootApp\Controller\IndexController::class . ':index');

/**
 * 页面渲染
 */
$app->get('/templates/example/{name}', \YouzanCloudBootApp\Controller\TemplateController::class . ':example');

/**
 * http请求，请求外部域名请先申请统一接出
 */
$app->get('/http', \YouzanCloudBootApp\Controller\DemoController::class . ':http');

/**
 * token托管，请将授权应用的店铺id替换掉{id}
 * 在开发环境中先触发code回调到回调地址，示例回调地址设置为/demo/code这个路径
 */
$app->get('/demo/code', \YouzanCloudBootApp\Controller\DemoController::class . ':code');
$app->get('/demo/token/{id}', \YouzanCloudBootApp\Controller\DemoController::class . ':token');

/**
 * 上传图片
 */
$app->get('/upload', \YouzanCloudBootApp\Controller\TemplateController::class . ':uploadImage');
$app->post('/file', \YouzanCloudBootApp\Controller\UploadController::class . ':upload');

/**
 * Post表单提交
 */
$app->get('/post/form', \YouzanCloudBootApp\Controller\TemplateController::class . ':postForm');
$app->post('/post/form/submit', \YouzanCloudBootApp\Controller\PostFormController::class . ':submit');

/**
 * mysql示例
 * 示例在数据库test下新建了一张表tt，请自行去新建对应的数据表
 */
$app->get('/demo/mysql', \YouzanCloudBootApp\Controller\DemoController::class . ':mysql');

/**
 * redis示例
 * {name} 为redis的key值，示例默认会写入key=hello，value=hello world
 */
$app->get('/demo/redis/{name}', \YouzanCloudBootApp\Controller\DemoController::class . ':redis');

/**
 * 当前环境变量
 * 仅做演示，正式上线请移除不要对外暴露环境变量！！！
 */
$app->any('/demo/env', \YouzanCloudBootApp\Controller\DemoController::class . ':env');

/**
 * 请求头
 */
$app->any('/demo/headers', \YouzanCloudBootApp\Controller\DemoController::class . ':headers');

/**
 * 502演示
 */
$app->get('/502', function ($request, \Slim\Http\Response $response, $args) {
    return $response->withStatus(502);
});

/**
 * phpinfo
 */
$app->get('/info', \YouzanCloudBootApp\Controller\DemoController::class . ':info');