<?php

declare(strict_types=1);

namespace SqlQueryBuilder\App\Tests;

use SqlQueryBuilder\App\Select;
use PHPUnit\Framework\TestCase;

class SelectTest extends TestCase
{

    public function testSelectEverything(): void
    {
        $sql = Select::selectEverything("users")->getSql();
        $this->assertEquals("SELECT * FROM users", $sql);

        $sql = Select::selectEverything("books")->getSql();
        $this->assertEquals("SELECT * FROM books", $sql);

        $sql = Select::selectEverything("posts")->getSql();
        $this->assertEquals("SELECT * FROM posts", $sql);
    }


    public function testSelectColumns(): void
    {
        $sql = Select::selectColumns("products", ["id", "name", "price"])->getSql();
        $this->assertEquals("SELECT id, name, price FROM products", $sql);

        $sql = Select::selectColumns("users", ["id", "firstname", "lastname", "email"])->getSql();
        $this->assertEquals("SELECT id, firstname, lastname, email FROM users", $sql);
    }


    public function testWhere(): void
    {
        $sql =  Select::selectEverything("users")->where("username = bob")->getSql();
        $this->assertEquals("SELECT * FROM users WHERE username = bob", $sql);

        $sql = Select::selectEverything("users")->where("username = bob AND age > 30")->getSql();
        $this->assertEquals("SELECT * FROM users WHERE username = bob AND age > 30", $sql);
    }
}
