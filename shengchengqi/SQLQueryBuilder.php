<?php

namespace shengchengqi;


interface SQLQueryBuilder{

    public function select($table, $fields);

    public function where($field, $value, $operator = '=');

    public function limit($start, $offset);

    public function getSQL();
}