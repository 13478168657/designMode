<?php

namespace shengchengqi;

include_once 'SQLQueryBuilder.php';
include_once 'MysqlQueryBuilder.php';
include_once 'PostgresQueryBuilder.php';
class actionController{

    public function clientCode(SQLQueryBuilder $queryBuilder){

        $query = $queryBuilder
            ->select("users", ["name", "email", "password"])
            ->where("age", 18, ">")
            ->where("age", 30, "<")
            ->limit(10, 20)
            ->getSQL();
            
        echo $query;
    }
}

$action = new actionController();
echo "Testing MySQL query builder:\n";
$action->clientCode(new MysqlQueryBuilder());

echo "\n\n";

echo "Testing PostgresSQL query builder:\n";
$action->clientCode(new PostgresQueryBuilder());
