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


}