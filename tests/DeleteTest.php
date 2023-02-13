<?php

declare(strict_types=1);

namespace SqlQueryBuilder\App\Tests;

use PHPUnit\Framework\TestCase;
use SqlQueryBuilder\App\Delete;

class DeleteTest extends TestCase
{
    public function testUpdate(): void
    {
        $sql = Delete::delete("users")->where("id = :id")->getSql();
        
        $this->assertEquals("DELETE FROM users WHERE id = :id", $sql);

        $sql = Delete::delete("books")->where("title = :title")->getSql();
        $this->assertEquals("DELETE FROM books WHERE title = :title", $sql);
    }
}
