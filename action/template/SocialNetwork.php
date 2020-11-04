<?php

namespace template;


abstract class SocialNetwork
{
    protected $username;

    protected $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * The actual template method calls abstract steps in a specific order. A
     * subclass may implement all of the steps, allowing this method to actually
     * post something to a social network.
     */
    public function post($message)
    {
        // Authenticate before posting. Every network uses a different
        // authentication method.
        if ($this->logIn($this->username, $this->password)) {
            // Send the post data. All networks have different APIs.
            $result = $this->sendData($message);
            // ...
            $this->logOut();

            return $result;
        }

        return false;
    }

    /**
     * The steps are declared abstract to force the subclasses to implement them
     * all.
     */
    abstract public function logIn($userName, $password);

    abstract public function sendData($message);

    abstract public function logOut();
}

function simulateNetworkLatency()
{
    $i = 0;
    while ($i < 5) {
        echo ".";
        sleep(1);
        $i++;
    }
}
