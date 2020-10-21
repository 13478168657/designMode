<?php

namespace abstractFactory;
//namespace aaa;

include_once 'PHPTemplateFactory.php';

include_once 'TwigTemplateFactory.php';

include_once 'TemplateFactory.php';
class actionController{

    public $title;

    public $content;

    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    // Here's how would you use the template further in real life. Note that the
    // page class does not depend on any concrete template classes.
    public function render(TemplateFactory $factory)
    {
        $pageTemplate = $factory->createPageTemplate();

        $renderer = $factory->getRenderer();

        return $renderer->render($pageTemplate->getTemplateString(), [
            'title' => $this->title,
            'content' => $this->content
        ]);
    }
}
$page = new actionController('Sample page', 'This it the body.');

echo "Testing actual rendering with the PHPTemplate factory:\n";
echo $page->render(new PHPTemplateFactory());

echo "\n";

echo $page->render(new TwigTemplateFactory());