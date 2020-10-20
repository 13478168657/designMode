<?php

namespace shengchengqi;

include_once 'SQLQueryBuilder.php';
class MysqlQueryBuilder implements SQLQueryBuilder{

    protected $query;

    protected function reset()
    {
        $this->query = new \stdClass();
    }

    public function select( $table, $fields)
    {
        $this->reset();
        $this->query->base = "select " . implode(',',$fields) . ' from ' . $table;
        $this->query->type = 'select';

        return $this;
    }

    public function where( $field,  $value,  $operator = '=')
    {
        if (!in_array($this->query->type, ['select', 'update', 'delete'])) {
            throw new \Exception("WHERE can only be added to SELECT, UPDATE OR DELETE");
        }

        $this->query->where[] = "$field $operator '$value'";

        return $this;
    }

    public function limit( $start, $offset)
    {
        if (!in_array($this->query->type, ['select'])) {
            throw new \Exception("LIMIT can only be added to SELECT");
        }

        $this->query->limit = " LIMIT " . $start . ", " . $offset;

        return $this;
    }

    public function getSQL()
    {
        $query = $this->query;
        $sql = $query->base;
        if (!empty($query->where)) {
            $sql .= " WHERE " . implode(' AND ', $query->where);
        }
        if (isset($query->limit)) {
            $sql .= $query->limit;
        }
        $sql .= ";";
        return $sql;
    }

}