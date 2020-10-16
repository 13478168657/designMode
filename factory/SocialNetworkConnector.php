<?php

namespace factory;

interface SocialNetworkConnector{

    public function login();

    public function logout();

    public function createPost($content);

}