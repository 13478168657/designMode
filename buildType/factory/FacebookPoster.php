<?php

namespace factory;

include_once 'SocialNetworkPoster.php';
include_once 'FacebookConnector.php';
class FacebookPoster extends SocialNetworkPoster{

    private $login,$password,$name;

    public function __construct($login, $password,$name)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function getSocialNetwork()
    {
        return new FacebookConnector($this->login, $this->password);
    }

}