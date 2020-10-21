<?php

namespace abstractFactory;

include_once 'BasePageTemplate.php';

class TwigPageTemplate extends BasePageTemplate{


    public function getTemplateString(){

        $renderedTitle = $this->titleTemplate->getTemplateString();

        return <<<HTML
        <div class="page">
            $renderedTitle
            <article class="content">{{ content }}</article>
        </div>
HTML;
    }
}