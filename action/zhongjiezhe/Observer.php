<?php

namespace zhongjiezhe;


interface Observer{


    public function update($event, $emitter, $data = null);
}