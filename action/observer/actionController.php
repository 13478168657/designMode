<?php

namespace observer;

include_once 'UserRepository.php';
include_once 'Logger.php';
include_once 'OnboardingNotification.php';
class actionController{


    public function index(){


    }
}


$repository = new UserRepository();
$repository->attach(new Logger(__DIR__ . "/log.txt"), "*");
$repository->attach(new OnboardingNotification("1@example.com"), "users:created");

$repository->initialize(__DIR__ . "/users.csv");

// ...

$user = $repository->createUser([
    "name" => "John Smith",
    "email" => "john99@example.com",
]);

$repository->deleteUser($user);