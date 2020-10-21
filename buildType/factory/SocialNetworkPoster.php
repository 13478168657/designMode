<?php

namespace factory;


abstract class SocialNetworkPoster{

    abstract public function getSocialNetwork();


	public function post($content){

        $network = $this->getSocialNetwork();

        $network->logIn();
        $network->createPost($content);
        $network->logout();
    }
}