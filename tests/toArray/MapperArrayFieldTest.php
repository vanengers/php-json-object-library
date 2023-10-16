<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\toArray;

use PHPUnit\Framework\TestCase;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestMapperObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestObject;

class MapperArrayFieldTest extends TestCase
{
    public function testToArrayGivesResult()
    {
        $test = new TestMapperObject();
        $result = $test->toArray();

        $this->assertIsArray($result);
    }

    public function testToArrayGivesResultField()
    {
        $title = "Hello World!";
        $test = new TestMapperObject("{\"titel\":\"".$title."\"}");
        $result = $test->toArray();

        $this->assertArrayHasKey("title", $result);
    }

    public function testToArrayGivesResultFieldWithResult()
    {
        $title = "Hello World!";
        $test = new TestMapperObject("{\"titel\":\"".$title."\"}");
        $result = $test->toArray();

        $this->assertArrayHasKey("title", $result);
        $this->assertEquals($title, $result["title"]);
    }

    public function testToArrayGivesResultFieldsWithResults()
    {
        $title = "Hello World!";
        $description = "This is a description";
        $test = new TestMapperObject("{\"titel\":\"".$title."\",\"omschrijving\":\"".$description."\"}");
        $result = $test->toArray();

        $this->assertArrayHasKey("title", $result);
        $this->assertArrayHasKey("description", $result);
        $this->assertEquals($title, $result["title"]);
        $this->assertEquals($description, $result["description"]);
    }

    public function testToArrayGivesResultCount()
    {
        $title = "Hello World!";
        $test = new TestMapperObject("{\"titel\":\"".$title."\"}");
        $result = $test->toArray();

        $this->assertCount(2, $result);
    }
}
