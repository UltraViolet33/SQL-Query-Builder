<?php

declare(strict_types=1);


namespace SqlQueryBuilder\App;


class Update
{
    public static ?self $instance = null;
    public static string $prefix = "";
    public static array $where = array();
    public static string $sql = "";

    public static function update(string $tableName, array $values): self
    {
        self::$instance = new Update();
        $update = "";

        foreach ($values as $value) {
            $update .= $value . " = :" . $value . ", ";
        }

        $update = substr($update, 0, -2);
        self::$prefix = "UPDATE " . $tableName . " SET " . $update;
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
