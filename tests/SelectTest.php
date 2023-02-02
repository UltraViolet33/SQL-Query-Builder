<?php

declare(strict_types=1);

namespace SqlQueryBuilder\App\Tests;

use SqlQueryBuilder\App\Select;
use PHPUnit\Framework\TestCase;

class SelectTest extends TestCase
{
    private ?Select $selectClass;

    protected function setUp(): void
    {
        $this->selectClass = new Select();
    }

    protected function tearDown(): void
    {
        $this->selectClass = null;
    }

    public function testSelectEverything(): void
    {
        $this->selectClass->selectEverything("users");
        $this->assertEquals("SELECT * FROM users", $this->selectClass->prefix);

        $this->selectClass->selectEverything("books");
        $this->assertEquals("SELECT * FROM books", $this->selectClass->prefix);

        $this->selectClass->selectEverything("posts");
        $this->assertEquals("SELECT * FROM posts", $this->selectClass->prefix);

        $this->selectClass->selectEverything("products");
        $this->assertEquals("SELECT * FROM products", $this->selectClass->prefix);
    }


    public function testSelectColumns(): void
    {
        $this->selectClass->selectColumns("products", ["id, name, price"]);
        $this->assertEquals("SELECT id, name, price FROM products", $this->selectClass->prefix);

        $this->selectClass->selectColumns("users", ["id, firstname, lastname, email"]);
        $this->assertEquals("SELECT id, firstname, lastname, email FROM users", $this->selectClass->prefix);

        $this->selectClass->selectColumns("books", ["id, title, author"]);
        $this->assertEquals("SELECT id, title, author FROM books", $this->selectClass->prefix);

        $this->selectClass->selectColumns("posts", ["id, title, category_id"]);
        $this->assertEquals("SELECT id, title, category_id FROM posts", $this->selectClass->prefix);
    }

    
    public function testWhere(): void
    {
        $this->selectClass->where("username = bob");
        $this->assertEquals(" WHERE username = bob", $this->selectClass->where[0]);
    
        
        $this->selectClass->where("username = bob AND age > 30");
        $this->assertEquals(" WHERE username = bob AND age > 30", $this->selectClass->where[0]);
    }
}
