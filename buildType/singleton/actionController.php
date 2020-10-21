<?php

namespace singleton;


include_once 'Logger.php';
include_once 'Config.php';
class actionController{


    public function index(){

        Logger::log('log message');

        $l1 = Logger::getInstance();
        $l2 = Logger::getInstance();
        if ($l1 === $l2) {
            Logger::log("Logger has a single instance.");
        } else {
            Logger::log("Loggers are different.");
        }

        $config1 = Config::getInstance();
        $login = "test_login";
        $password = "test_password";
        $config1->setValue("login", $login);
        $config1->setValue("password", $password);
// ...and restores it.
        $config2 = Config::getInstance();
        echo '333';
        if ($login == $config2->getValue("login") &&
            $password == $config2->getValue("password")
        ) {
//            echo '5555';
            Logger::log("Config singleton also works fine.");
        }

        Logger::log("Finished!");
    }
}

$action = new actionController();

$action->index();