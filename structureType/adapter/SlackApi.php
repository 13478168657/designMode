<?php

namespace adapter;


class SlackApi {

    private $login;
    private $apiKey;

    public function __construct($login, $apiKey)
    {
        $this->login = $login;
        $this->apiKey = $apiKey;
    }

    public function logIn()
    {

        echo "Logged in to a slack account '{$this->login}'.\n";
    }

    public function sendMessage($chatId, $message)
    {
        // Send message post request to Slack web service.
        echo "Posted following message into the '$chatId' chat: '$message'.\n";
    }
}