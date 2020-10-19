<?php

namespace abstractFactory;

include_once 'TemplateFactory.php';
include_once 'TwigTitleTemplate.php';
include_once 'TwigPageTemplate.php';
include_once 'TwigRenderer.php';

class TwigTemplateFactory implements TemplateFactory{


    public function createTitleTemplate()
    {
        return new TwigTitleTemplate();

    }

    public function createPageTemplate()
    {

        return new TwigPageTemplate($this->createTitleTemplate());
    }


    public function getRenderer()
    {
        return new TwigRenderer();
    }
}