<?php


namespace YouzanCloudBootApp\Builder;


use Com\Youzan\Cloud\Extension\Param\GoPayResultDTO;
use Com\Youzan\Cloud\Extension\Param\GoPayResultDTOOutParam;
use stdClass;

class GoPayResultDTOOutParamBuilder
{
    public static function build(string $cashDeskUrl, array $extension): GoPayResultDTOOutParam
    {
        $resp = new GoPayResultDTOOutParam();
        $resp->setCode("200");
        $resp->setMessage("success");
        $resp->setSuccess(true);
        $resp->setData(self::buildGoPayResultDTO($cashDeskUrl, $extension));
        return $resp;
    }

    public static function buildGoPayResultDTO(string $cashDeskUrl, array $extension): GoPayResultDTO
    {
        $resp = new GoPayResultDTO();
        $resp->setCashDeskUrl($cashDeskUrl);
        $resp->setExtension(json_decode(json_encode($extension)));
        return $resp;
    }
}