<?php

/** @var \Slim\App $app */

$app->get('/', \YouzanCloudBootApp\Controller\IndexController::class . ':index');

/**
 * 模版演示
 */
$app->get('/templates/example/{name}', \YouzanCloudBootApp\Controller\TemplateController::class . ':example');
