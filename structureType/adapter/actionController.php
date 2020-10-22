<?php

namespace adapter;

include_once 'SlackNotification.php';

include_once 'Notification.php';

include_once 'EmailNotification.php';
include_once 'SlackApi.php';
include_once 'SlackNotification.php';
class actionController{


    public function clientCode(Notification $notification){

        $notification->send('一封邮件','好久不见');
    }
}

$action = new actionController();
$action->clientCode(new EmailNotification('xiaoming@qq.com'));
echo '===========';
$action->clientCode(new SlackNotification(new SlackApi('xiaohong','xiaowang'),'xiaoming@qq.com'));
