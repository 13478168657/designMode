<?php

namespace visitor;


interface Entity
{
    public function accept(Visitor $visitor);
}

