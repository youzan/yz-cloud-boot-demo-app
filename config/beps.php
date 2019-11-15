<?php

/** @var \YouzanCloudBoot\ExtensionPoint\BepRegistry $bepReg */

$bepReg->register('testBep', \YouzanCloudBootApp\Bep\DemoBepImpl::class, "1.0.0");

// 中文名称: 查询客户积分
$bepReg->register('GetCustomerPointsExtPoint', \YouzanCloudBootApp\Bep\GetCustomerPointsExtPointBepImpl::class, "1.0.0");

// 中文名称: 去支付
$bepReg->register('GoPayExtPoint', \YouzanCloudBootApp\Bep\GoPayExtPointBepImpl::class, "1.0.0");

