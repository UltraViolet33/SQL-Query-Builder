<?php
declare(strict_types=1);


namespace SqlQueryBuilder\App;


class Select
{
    public string $sql = "";
    public string $prefix = "";
    public array $where = array();
    public array $control = ["", ""];


    public function select(string $tableName, string $columns = null): self
    {
        if ($columns) {
            $this->prefix = 'SELECT ' . $columns . ' FROM ' . $tableName;
        } else {
            $this->prefix = 'SELECT *  FROM ' . $tableName;
        }

        return $this;
    }


    public function selectEverything(string $tableName): self
    {
        $this->prefix = 'SELECT * FROM ' . $tableName;
        return $this;
    }
}
