<?php

declare(strict_types=1);


namespace SqlQueryBuilder\App;


class Select
{
    public static ?self $instance = null;
    public static string $prefix = "";
    public static array $where = array();
    public static string $sql = "";
    public array $control = ["", ""];


    public static function selectEverything(string $tableName): self
    {
        self::$instance = new Select();
        self::$prefix = 'SELECT * FROM ' . $tableName;
        return self::$instance;
    }


    public static function selectColumns(string $tableName, array $columns): self
    {
        self::$instance = new Select();
        self::$prefix = 'SELECT ' . implode(", ", $columns) . ' FROM ' . $tableName;
        return self::$instance;
    }


    public static function where(string $condition): self
    {
        self::$where[0] = ' WHERE ' . $condition;
        return self::$instance;
    }


    public function getSql(): string
    {
        self::$sql = self::$prefix . implode(self::$where);
        return self::$sql;
    }
}
