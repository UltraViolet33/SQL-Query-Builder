<?php

declare(strict_types=1);


namespace SqlQueryBuilder\App;


class Select
{
    public string $sql = "";
    public string $prefix = "";
    public array $where = array();
    public array $control = ["", ""];

    public function selectEverything(string $tableName): self
    {
        $this->prefix = 'SELECT * FROM ' . $tableName;
        return $this;
    }


    public function selectColumns(string $tableName, array $columns): self
    {
        $this->prefix = 'SELECT ' . implode(";", $columns) . ' FROM ' . $tableName;
        return $this;
    }
}
