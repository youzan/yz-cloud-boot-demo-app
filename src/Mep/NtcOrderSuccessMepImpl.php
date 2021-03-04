<?php

namespace YouzanCloudBootApp\Mep;

use YouzanCloudBoot\Component\BaseComponent;
use YouzanCloudBoot\ExtensionPoint\Api\Message\MessageHandler;
use YouzanCloudBoot\ExtensionPoint\Api\Message\Metadata\NotifyMessage;
use YouzanCloudBoot\Facades\LogFacade;

class NtcOrderSuccessMepImpl extends BaseComponent implements MessageHandler
{

    public function handle(NotifyMessage $notifyMessage): void
    {
        LogFacade::info("receiver message" . $notifyMessage->getData());

        //todo 业务逻辑
    }
}