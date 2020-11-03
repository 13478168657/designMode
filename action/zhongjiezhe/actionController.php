<?php


namespace zhongjiezhe;

include_once 'UserRepository.php';

include_once 'EventDispatcher.php';
include_once 'Logger.php';
include_once 'OnboardingNotification.php';
class actionController{


}



/**
 * The client code.
 */

$repository = new UserRepository();
events()->attach($repository, "facebook:update");

$logger = new Logger(__DIR__ . "/log.txt");
events()->attach($logger, "*");

$onboarding = new OnboardingNotification("1@example.com");
events()->attach($onboarding, "users:created");



$repository->initialize(__DIR__ . "users.csv");


$user = $repository->createUser([
    "name" => "John Smith",
    "email" => "john99@example.com",
]);


$user->delete();