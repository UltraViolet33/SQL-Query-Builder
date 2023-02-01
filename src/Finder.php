<?php

namespace App;

class Finder
{

    public static $sql = "";
    public static $instance = NULL;
    public static $prefix = "";
    public static $where = array();
    public static $control = ["", ""];


    public static function select($tableName, $columns = NULL)
    {
        self::$instance = new Finder();

        if ($columns) {
            self::$prefix = 'SELECT ' . $columns . ' FROM ' . $tableName;
        } else {
            self::$prefix = 'SELECT * FROM ' . $tableName;
        }

        return self::$instance;
    }


    public static function where($cond = NULL): self
    {
        self::$where[0] = ' WHERE ' . $cond;
        return self::$instance;
    }


    public static function like($a, $b)
    {
        self::$where[] = trim($a . ' LIKE ' . $b);
        return self::$instance;
    }


    public static function and($column)
    {
        self::$where[] = trim(' AND ' . $column);
        return self::$instance;
    }


    public static function or($column)
    {
        self::$where[] = trim(' OR ' . $column);
        return self::$instance;
    }


    public static function in(array $data)
    {
        self::$where[] = 'IN (' . implode(',', $data) . ')';
        return self::$instance;
    }


    public static function not($a = NULL)
    {
        self::$where[] = trim('NOT ' . $a);
        return self::$instance;
    }


    public static function limit($limit)
    {
        self::$control[0] = 'LIMIT ' . $limit;
        return self::$instance;
    }


    public static function offset($offset)
    {
        self::$control[1] = 'OFFSET ' . $offset;
        return self::$instance;
    }

    
    public static function getSql()
    {
        self::$sql = self::$prefix . implode(" ", self::$where);
        preg_replace('/ /', ' ', self::$sql);
        return trim(self::$sql);
    }
}
