<?php
/**
 * Created by IntelliJ IDEA.
 * User: allen
 * Date: 2019-04-08
 * Time: 17:13
 */

namespace YouzanCloudBootApp\Mep;


use YouzanCloudBoot\Component\BaseComponent;
use YouzanCloudBoot\ExtensionPoint\Api\Message\MessageHandler;
use YouzanCloudBoot\ExtensionPoint\Api\Message\Metadata\NotifyMessage;

class TestMsgHandler extends BaseComponent implements MessageHandler
{

    public function handle(NotifyMessage $notifyMessage): void
    {
        // TODO: Implement handle() method.
        $this->getLog()->info("receiver message" . $notifyMessage->getData());
    }
}