<?php

/** @var \YouzanCloudBoot\ExtensionPoint\MepRegistry $mepReg */

$mepReg->register('testTopic', \YouzanCloudBootApp\Mep\TestMsgHandler::class);

$mepReg->register('ntc_order_create', \YouzanCloudBootApp\Mep\TestMsgHandler::class);
$mepReg->register('ntc_order_pay', \YouzanCloudBootApp\Mep\TestMsgHandler::class);
$mepReg->register('ntc_order_wait_ship', \YouzanCloudBootApp\Mep\TestMsgHandler::class);
$mepReg->register('ntc_order_cancel', \YouzanCloudBootApp\Mep\TestMsgHandler::class);
$mepReg->register('ntc_order_success', \YouzanCloudBootApp\Mep\TestMsgHandler::class);


