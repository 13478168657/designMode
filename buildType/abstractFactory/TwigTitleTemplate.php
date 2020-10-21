<?php

namespace abstractFactory;


class TwigTitleTemplate implements TitleTemplate{


    public function getTemplateString()
    {
        return "<h1>{{ title }}</h1>";
    }
}