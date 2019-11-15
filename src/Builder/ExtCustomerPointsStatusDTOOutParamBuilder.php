<?php


namespace YouzanCloudBootApp\Builder;


use Com\Youzan\Cloud\Extension\Param\Scrm\ExtCustomerPointsStatusDTO;
use Com\Youzan\Cloud\Extension\Param\Scrm\ExtCustomerPointsStatusDTOOutParam;

class ExtCustomerPointsStatusDTOOutParamBuilder
{

    public static function build(int $currentPoints, int $totalPoints): ExtCustomerPointsStatusDTOOutParam
    {
        $resp = new ExtCustomerPointsStatusDTOOutParam();
        $resp->setCode("200");
        $resp->setMessage("success");
        $resp->setSuccess(true);
        $resp->setData(self::buildExtCustomerPointsStatusDTO($currentPoints, $totalPoints));
        return $resp;
    }


    private static function buildExtCustomerPointsStatusDTO(int $currentPoints, int $totalPoints): ExtCustomerPointsStatusDTO
    {
        $data = new ExtCustomerPointsStatusDTO();
        $data->setCurrentPoints(66);
        $data->setTotalPoints(100);
        return $data;
    }

}