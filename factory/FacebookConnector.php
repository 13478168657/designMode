<?php

namespace factory;

include_once 'SocialNetworkConnector.php';
class FacebookConnector implements SocialNetworkConnector{

    private $login,$password;


    public function __construct($login,$password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function login(){
        echo "Send HTTP API request to log in user $this->login with " .
            "password $this->password\n";
    }

    public function logout()
    {
        echo "Send HTTP API request to log out user $this->login\n";
    }

    public function createPost($content)
    {
        echo "Send HTTP API requests to create a post in Facebook timeline.\n";
    }
}