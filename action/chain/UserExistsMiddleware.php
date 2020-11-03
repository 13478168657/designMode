<?php

namespace chain;

include_once 'Middleware.php';
include_once 'Server.php';
class UserExistsMiddleware extends Middleware{

    private $server;

    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    public function check($email, $password)
    {
        if (!$this->server->hasEmail($email)) {
            echo "UserExistsMiddleware: This email is not registered!\n";

            return false;
        }

        if (!$this->server->isValidPassword($email, $password)) {
            echo "UserExistsMiddleware: Wrong password!\n";

            return false;
        }

        return parent::check($email, $password);
    }
}