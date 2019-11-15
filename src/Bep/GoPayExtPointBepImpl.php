<?php


namespace YouzanCloudBootApp\Bep;


use Com\Youzan\Cloud\Extension\Api\Trade\GoPayExtPoint;
use Com\Youzan\Cloud\Extension\Param\GoPayParamDTO;
use Com\Youzan\Cloud\Extension\Param\GoPayResultDTOOutParam;
use YouzanCloudBoot\ExtensionPoint\BaseBusinessExtensionPointImpl;
use YouzanCloudBoot\Facades\LogFacade;
use YouzanCloudBootApp\Builder\GoPayResultDTOOutParamBuilder;


class GoPayExtPointBepImpl extends BaseBusinessExtensionPointImpl implements GoPayExtPoint
{

    public function goPay(GoPayParamDTO $request): GoPayResultDTOOutParam
    {
        LogFacade::info("Bep GoPayExtPoint request:" . json_encode($request));

        return GoPayResultDTOOutParamBuilder::build("https://www.youzanyun.com/", ['test' => 'ok']);
    }
}