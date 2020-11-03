<?php

namespace chain;

include_once 'Middleware.php';
class Server {

    private $users = [];

    /**
     * @var Middleware
     */
    private $middleware;

    /**
     * The client can configure the server with a chain of middleware objects.
     */
    public function setMiddleware(Middleware $middleware)
    {
        $this->middleware = $middleware;
    }

    /**
     * The server gets the email and password from the client and sends the
     * authorization request to the middleware.
     */
    public function logIn($email, $password)
    {
        if ($this->middleware->check($email, $password)) {
            echo "Server: Authorization has been successful!\n";

            // Do something useful for authorized users.

            return true;
        }

        return false;
    }

    public function register($email, $password)
    {
        $this->users[$email] = $password;
    }

    public function hasEmail($email)
    {
        return isset($this->users[$email]);
    }

    public function isValidPassword($email, $password)
    {
        return $this->users[$email] === $password;
    }
}