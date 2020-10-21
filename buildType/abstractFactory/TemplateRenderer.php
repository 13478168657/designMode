<?php

namespace abstractFactory;
interface TemplateRenderer
{
    public function render($templateString, $arguments = []);
}
