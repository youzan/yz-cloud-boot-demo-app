<?php

namespace YouzanCloudBootApp\Bep;

use YouzanCloudBoot\Bep\BaseBusinessExtensionPointImpl;

class DemoBepImpl extends BaseBusinessExtensionPointImpl
{

    public function test()
    {
        $this->getLog()->info("hello world test");
        return ['hello' => 'world'];
    }

}