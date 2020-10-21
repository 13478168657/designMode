<?php

namespace factory;

include_once 'SocialNetworkConnector.php';
class LinkedInConnector implements SocialNetworkConnector{

    protected $email,$password;

    public function __construct($email,$password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function login()
    {
        // TODO: Implement login() method.
        echo "Send HTTP API request to log in user $this->email with " .
            "password $this->password\n";
    }

    public function logout(){
        echo "Send HTTP API request to log out user $this->email\n";
    }

    public function createPost($content)
    {
        // TODO: Implement createPost() method.
        echo "Send HTTP API requests to create a post in LinkedIn timeline.\n";
    }
}