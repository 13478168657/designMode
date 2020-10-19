<?php

namespace abstractFactory;

include_once 'TemplateRenderer.php';
class PHPTemplateRenderer implements TemplateRenderer
{
    public function render($templateString, $arguments = [])
    {
        extract($arguments);

        ob_start();
        eval(' ?>' . $templateString . '<?php ');
        $result = ob_get_contents();
        ob_end_clean();

        return $result;
    }
}