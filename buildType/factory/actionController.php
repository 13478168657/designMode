<?php
namespace factory;

include_once 'FacebookPoster.php';
include_once 'LinkedInPoster.php';
include_once 'SocialNetworkPoster.php';
class actionController{

    public function __construct()
    {

    }

    /**
     * @param SocialNetworkPoster $creator
     * 工厂抽象类SocialNetworkPoster
     */
    public function clientCode(SocialNetworkPoster $creator)
    {

        $creator->post("Hello world!");
        $creator->post("I had a large hamburger this morning!");
    }

}

$action = new actionController();
echo "\n";
$action->clientCode(new FacebookPoster(11,'11'));

echo "\n\n";
$action->clientCode(new LinkedInPoster('246@qq.com','11'));