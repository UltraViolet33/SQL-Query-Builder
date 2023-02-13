<?php

declare(strict_types=1);

namespace SqlQueryBuilder\App\Tests;

use PHPUnit\Framework\TestCase;
use SqlQueryBuilder\App\Insert;

class InsertTest extends TestCase
{
    public function testInsert(): void
    {
        $sql = Insert::insert("users", ["name", "firstname", "lastname", "email", "password"]);
        $this->assertEquals("INSERT INTO users(name, firstname, lastname, email, password) VALUES(:name, :firstname, :lastname, :email, :password);", $sql);

        $sql = Insert::insert("books", ["title", "author", "category"]);
        $this->assertEquals("INSERT INTO books(title, author, category) VALUES(:title, :author, :category);", $sql);
    }
}
