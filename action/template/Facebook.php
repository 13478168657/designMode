<?php

namespace template;

include_once 'SocialNetwork.php';

class Facebook extends SocialNetwork
{
    public function logIn($userName, $password)
    {
        echo "\nChecking user's credentials...\n";
        echo "Name: " . $this->username . "\n";
        echo "Password: " . str_repeat("*", strlen($this->password)) . "\n";

        simulateNetworkLatency();

        echo "\n\nFacebook: '" . $this->username . "' has logged in successfully.\n";

        return true;
    }

    public function logiIn($user,$x,$y){

    }

    public function sendData($message)
    {
        echo "Facebook: '" . $this->username . "' has posted '" . $message . "'.\n";

        return true;
    }

    public function logOut()
    {
        echo "Facebook: '" . $this->username . "' has been logged out.\n";
    }
}
