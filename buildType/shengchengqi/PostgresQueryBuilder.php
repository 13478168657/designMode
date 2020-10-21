<?php

namespace shengchengqi;

include_once 'MysqlQueryBuilder.php';
class PostgresQueryBuilder extends MysqlQueryBuilder{


    public function limit($start, $offset)
    {
        parent::limit($start, $offset);

        $this->query->limit = " LIMIT " . $start . " OFFSET " . $offset;

        return $this;
    }
}