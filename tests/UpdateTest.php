<?php

declare(strict_types=1);

namespace SqlQueryBuilder\App\Tests;

use PHPUnit\Framework\TestCase;
use SqlQueryBuilder\App\Update;

class UpdateTest extends TestCase
{
    public function testUpdate(): void
    {
        $sql = Update::update("users", ["lastname", "firstname", "email"])->where("id = :id")->getSql();
        
        $this->assertEquals("UPDATE users SET lastname = :lastname, firstname = :firstname, email = :email WHERE id = :id", $sql);

        $sql = Update::update("books", ["title", "author", "category"])->where("title = :title")->getSql();
        $this->assertEquals("UPDATE books SET title = :title, author = :author, category = :category WHERE title = :title", $sql);
    }
}
