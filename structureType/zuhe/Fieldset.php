<?php

namespace zuhe;

include_once 'FieldComposite.php';
class Fieldset extends FieldComposite{


    public function render()
    {
        // Note how the combined rendering result of children is incorporated
        // into the fieldset tag.
        $output = parent::render();

        return "<fieldset><legend>{$this->title}</legend>\n$output</fieldset>\n";
    }
}