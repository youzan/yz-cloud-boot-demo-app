<?php

namespace YouzanCloudBootApp\Bep;

use Com\Youzan\Cloud\Extension\Api\Test\BizTestService;
use Com\Youzan\Cloud\Extension\Param\Test\BizTestRequest;
use Com\Youzan\Cloud\Extension\Param\Test\BizTestResponse;
use Com\Youzan\Cloud\Extension\Param\Test\BizTestResponseOutParam;
use YouzanCloudBoot\ExtensionPoint\BaseBusinessExtensionPointImpl;

class DemoBepImpl extends BaseBusinessExtensionPointImpl implements BizTestService
{

    public function invoke(BizTestRequest $bizTestRequest): BizTestResponseOutParam
    {
        // TODO: Implement invoke() method.
        $this->getLog()->info($bizTestRequest->getData()->getContent());
        $result = new BizTestResponseOutParam();
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