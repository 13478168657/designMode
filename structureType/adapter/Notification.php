<?php

namespace adapter;


interface Notification{

    public function send($title,$message);
}

