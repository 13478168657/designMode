<?php

namespace iterator;

include_once 'CsvIterator.php';
class actionController{

    public function __construct()
    {

    }

    public function index(){


    }
}


$csv = new CsvIterator(__DIR__ . '/cats.csv');
print_r($csv);

foreach ($csv as $key => $row) {
    print_r('222'."\n");
    print_r($row);
    print_r('333'."\n");
}

