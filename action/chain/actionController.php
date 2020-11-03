<?php

namespace chain;


include_once 'Server.php';

include_once 'ThrottlingMiddleware.php';
include_once 'UserExistsMiddleware.php';
include_once 'RoleCheckMiddleware.php';
class actionController{


}

$server = new Server();
$server->register("admin@example.com", "admin_pass");
$server->register("user@example.com", "user_pass");

// All middleware are chained. The client can build various configurations of
// chains depending on its needs.
$middleware = new ThrottlingMiddleware(2);
$middleware
    ->linkWith(new UserExistsMiddleware($server))
    ->linkWith(new RoleCheckMiddleware());

// The server gets a chain from the client code.
$server->setMiddleware($middleware);
print_r($middleware);
// ...

do {
    echo "\nEnter your email:\n";
    $email = readline();
    echo "Enter your password:\n";
    $password = readline();
    $success = $server->logIn($email, $password);
} while (!$success);