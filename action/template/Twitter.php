<?php


namespace template;

include_once 'SocialNetwork.php';


class Twitter extends SocialNetwork
{
    public function logIn($userName, $password)
    {
        echo "\nChecking user's credentials...\n";
        echo "Name: " . $this->username . "\n";
        echo "Password: " . str_repeat("*", strlen($this->password)) . "\n";

        simulateNetworkLatency();

        echo "\n\nTwitter: '" . $this->username . "' has logged in successfully.\n";

        return true;
    }

    public function sendData($message)
    {
        echo "Twitter: '" . $this->username . "' has posted '" . $message . "'.\n";

        return true;
    }

    public function logOut()
    {
        echo "Twitter: '" . $this->username . "' has been logged out.\n";
    }
}

