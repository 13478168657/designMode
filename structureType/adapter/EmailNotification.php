<?php

namespace adapter;

include_once 'Notification.php';
class EmailNotification implements Notification{

    private $adminEmail;

    public function __construct($adminEmail)
    {

        $this->adminEmail = $adminEmail;
    }


    public function send($title ,$message){


        echo "Sent email with title '$title' to '{$this->adminEmail}' that says '$message'.";
    }
}