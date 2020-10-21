<?php

namespace  abstractFactory;

include_once  'TemplateFactory.php';
include_once  'PHPTemplatePageTemplate.php';
include_once  'PHPTemplateTitleTemplate.php';
include_once  'PHPTemplateRenderer.php';
/**
 *
 * PHP模版工厂,返回页头，内页，渲染模块；
 */
class PHPTemplateFactory implements TemplateFactory{


    public function createTitleTemplate()
    {
        return new PHPTemplateTitleTemplate();
    }

    public function createPageTemplate()
    {
        return new PHPTemplatePageTemplate($this->createTitleTemplate());
    }

    public function getRenderer()
    {
        return new PHPTemplateRenderer();
    }
}