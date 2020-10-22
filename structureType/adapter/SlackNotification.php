<?php

namespace adapter;

include_once 'Notification.php';
include_once  'SlackApi.php';
class SlackNotification implements Notification{


    private $slack;
    private $chatId;

    public function __construct(SlackApi $slack, $chatId)
    {
        $this->slack = $slack;
        $this->chatId = $chatId;
    }

    public function send($title, $message)
    {
        $slackMessage = "#" . $title . "# " . strip_tags($message);
        $this->slack->logIn();
        $this->slack->sendMessage($this->chatId, $slackMessage);
    }
}