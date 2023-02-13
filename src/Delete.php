<?php

declare(strict_types=1);


namespace SqlQueryBuilder\App;


class Delete
{
    public static ?self $instance = null;
    public static string $prefix = "";
    public static array $where = array();
    public static string $sql = "";

    public static function delete(string $tableName): self
    {
        self::$instance = new Delete();
        
        self::$prefix = "DELETE FROM " . $tableName;
        return self::$instance;
    }


    public static function where(string $condition): self
    {
        self::$where[0] = " WHERE " . $condition;
        return self::$instance;
    }


    public static function getSql(): string
    {
        self::$sql = self::$prefix . implode(self::$where);
        return self::$sql;
    }
}
