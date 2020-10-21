<?php

namespace abstractFactory;

include_once 'TitleTemplate.php';
class PHPTemplateTitleTemplate implements TitleTemplate{


    public function getTemplateString()
    {

        return "<h1><?= \$title; ?></h1>";
    }
}