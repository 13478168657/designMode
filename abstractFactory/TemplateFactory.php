<?php

namespace abstractFactory;

interface TemplateFactory{


    public function createTitleTemplate();

    public function createPageTemplate();

    public function getRenderer();
}