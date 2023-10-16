<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\toJson;

use Exception;
use PHPUnit\Framework\TestCase;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestObject;

class IsValidJsonTest extends TestCase
{
    public function testThisIsValidJson()
    {
        $title = "Hello World!";
        $test = new TestObject("{\"titel\":\"".$title."\"}");
        $result = $test->toArray();

        $this->assertArrayHasKey("title", $result);
    }

    public function testThisIsInValidJson()
    {
        $this->expectException(Exception::class);

        $title = "Hello World!";
        $test = new TestObject("dfghsdjkhjksdhfjks");
        $result = $test->toArray();
    }
}
