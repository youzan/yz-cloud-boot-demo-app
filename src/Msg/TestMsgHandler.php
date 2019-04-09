<?php
/**
 * Created by IntelliJ IDEA.
 * User: allen
 * Date: 2019-04-08
 * Time: 17:13
 */

namespace YouzanCloudBootApp\Msg;


use Com\Youzan\Cloud\Extension\Api\Message\MessageHandler;
use Com\Youzan\Cloud\Extension\Param\NotifyMessage;
use YouzanCloudBoot\Component\BaseComponent;

class TestMsgHandler extends BaseComponent implements MessageHandler
{

    public function handle(NotifyMessage $notifyMessage): void
    {
        // TODO: Implement handle() method.
        $this->getLog()->info("receiver message");
    }
}