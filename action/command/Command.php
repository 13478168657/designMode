<?php

namespace command;


interface Command{

    public function execute();

    public function getId();

    public function getStatus();
}