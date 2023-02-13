<?php

declare(strict_types=1);


namespace SqlQueryBuilder\App;


class Insert
{
    public static function insert(string $tableName, array $values): string
    {
        return "INSERT INTO " . $tableName . "(" . implode(",", $values) . ") VALUES (" . implode(", :", $values) . ");";
    }
}
