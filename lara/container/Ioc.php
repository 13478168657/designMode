<?php

namespace container;


class Ioc{


    public function make($obj){

        $reflection = new \ReflectionClass($obj);

        $constructor = $reflection->getConstructor();

        if(is_null($constructor)){

            return $reflection->newInstance();
        }
        $parameters = $constructor->getParameters();
        $dependences = $this->getDependency($parameters);

        return $reflection->newInstanceArgs($dependences);
        
    }


    protected function getDependency($parameters){

        $dependences = [];

        foreach($parameters as $param){

            $dependences[] = $this->make($param);
        }
        return $dependences;
    }
}

