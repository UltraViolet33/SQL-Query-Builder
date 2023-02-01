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
}
