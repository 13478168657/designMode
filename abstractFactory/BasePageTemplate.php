<?php

namespace abstractFactory;

include_once 'PageTemplate.php';

abstract class BasePageTemplate implements PageTemplate{

    protected $titleTemplate;
    public function __construct(TitleTemplate $titleTemplate)
    {

        $this->titleTemplate = $titleTemplate;
    }

}