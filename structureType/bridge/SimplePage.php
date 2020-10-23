<?php
namespace bridge;

include_once 'Page.php';
class SimplePage extends Page{

    protected $title;
    protected $content;
    public function __construct(Renderer $renderer,$title,$message)
    {
        parent::__construct($renderer);
        $this->title = $title;
        $this->message = $message;
    }

    public function view()
    {
        return $this->renderer->renderParts([
            $this->renderer->renderHeader(),
            $this->renderer->renderTitle($this->title),
            $this->renderer->renderTextBlock($this->content),
            $this->renderer->renderFooter()
        ]);
    }
}