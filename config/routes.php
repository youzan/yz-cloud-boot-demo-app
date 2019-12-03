<?php

/** @var \Slim\App $app */

$app->get('/', \YouzanCloudBootApp\Controller\IndexController::class . ':index');

/**
 * 模版演示
 */
$app->get('/templates/example/{name}', \YouzanCloudBootApp\Controller\TemplateController::class . ':example');


$app->get('/demo/env', \YouzanCloudBootApp\Controller\DemoController::class . ':env');
$app->get('/demo/mysql', \YouzanCloudBootApp\Controller\DemoController::class . ':mysql');
$app->get('/demo/redis', \YouzanCloudBootApp\Controller\DemoController::class . ':redis');
$app->get('/demo/proxyHttp', \YouzanCloudBootApp\Controller\DemoController::class . ':proxyHttp');
$app->get('/demo/apollo/{api}', \YouzanCloudBootApp\Controller\DemoController::class . ':apollo');
