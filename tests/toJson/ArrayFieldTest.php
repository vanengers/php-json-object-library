<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\toJson;

use PHPUnit\Framework\TestCase;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestObject;

class ArrayFieldTest extends TestCase
{
    public function testToArrayGivesResult()
    {
        $test = new TestObject();
        $result = $test->toArray();

        $this->assertIsArray($result);
    }

    public function testToArrayGivesResultField()
    {
        $title = "Hello World!";
        $test = new TestObject(['title'=>$title]);
        $result = $test->toArray();

        $this->assertArrayHasKey("title", $result);
    }

    public function testToArrayGivesResultFieldWithResult()
    {
        $title = "Hello World!";
        $test = new TestObject(['title'=>$title]);
        $result = $test->toArray();

        $this->assertArrayHasKey("title", $result);
        $this->assertEquals($title, $result["title"]);
    }

    public function testToArrayGivesResultFieldsWithResults()
    {
        $title = "Hello World!";
        $description = "This is a description";
        $test = new TestObject(['title'=>$title, 'description'=>$description]);
        $result = $test->toArray();

        $this->assertArrayHasKey("title", $result);
        $this->assertArrayHasKey("description", $result);
        $this->assertEquals($title, $result["title"]);
        $this->assertEquals($description, $result["description"]);
    }

    public function testToArrayGivesResultCount()
    {
        $title = "Hello World!";
        $test = new TestObject(['title'=>$title]);
        $result = $test->toArray();

        $this->assertCount(2, $result);
    }
}
