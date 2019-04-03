<?php

namespace YouzanCloudBootApp\Bep;

use ExtensionPointApi\Com\Youzan\Cloud\Extension\Param\Test\BizTestOutParam;
use ExtensionPointApi\Com\Youzan\Cloud\Extension\Param\Test\BizTestRequest;
use ExtensionPointApi\Com\Youzan\Cloud\Extension\Param\Test\BizTestResponse;
use YouzanCloudBoot\ExtensionPoint\BaseBusinessExtensionPointImpl;
use ExtensionPointApi\Com\Youzan\Cloud\Extension\Api\BizTestService;

class DemoBepImpl extends BaseBusinessExtensionPointImpl implements BizTestService
{

    public function invoke(BizTestRequest $bizTestRequest): BizTestOutParam
    {
        // TODO: Implement invoke() method.
        $this->getLog()->info($bizTestRequest->getData()->getContent());
        $result = new BizTestOutParam();
        $result->setCode("200");
        $result->setMessage("call success");
        $result->setSuccess(true);

        $response = new BizTestResponse();
        $response->setContent("test content response");
        $response->setRequestId(100);
        $result->setData($response);

        return $result;
    }
}