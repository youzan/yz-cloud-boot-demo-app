<?php


namespace YouzanCloudBootApp\Bep;


use Com\Youzan\Cloud\Extension\Api\Scrm\GetCustomerPointsExtPoint;
use Com\Youzan\Cloud\Extension\Param\Scrm\ExtCustomerPointsQueryDTO;
use Com\Youzan\Cloud\Extension\Param\Scrm\ExtCustomerPointsStatusDTOOutParam;
use YouzanCloudBoot\ExtensionPoint\BaseBusinessExtensionPointImpl;
use YouzanCloudBoot\Facades\LogFacade;
use YouzanCloudBootApp\Builder\ExtCustomerPointsStatusDTOOutParamBuilder;
use YouzanCloudBootApp\Dependency\PointsClient;

class GetCustomerPointsExtPointBepImpl extends BaseBusinessExtensionPointImpl implements GetCustomerPointsExtPoint
{

    public function invoke(ExtCustomerPointsQueryDTO $request): ExtCustomerPointsStatusDTOOutParam
    {
        LogFacade::info("Bep GetCustomerPointsExtPoint request:" . json_encode($request));

        $currentPoints = (new PointsClient)->getCurrentPoints($request->getExtCustomerInfoDTO()->getAccountType(), $request->getExtCustomerInfoDTO()->getAccountId());

        return ExtCustomerPointsStatusDTOOutParamBuilder::build($currentPoints, $currentPoints);
    }
}