<?php

namespace chain;

include_once 'Middleware.php';

class RoleCheckMiddleware extends Middleware{

    public function check($email, $password)
    {
        if ($email === "admin@example.com") {
            echo "RoleCheckMiddleware: Hello, admin!\n";

            return true;
        }
        echo "RoleCheckMiddleware: Hello, user!\n";

        return parent::check($email, $password);
    }
}