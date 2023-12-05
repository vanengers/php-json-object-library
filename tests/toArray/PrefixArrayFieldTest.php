<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\toArray;

use PHPUnit\Framework\TestCase;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestCamelObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestPrefixObject;

class PrefixArrayFieldTest extends TestCase
{
    const PREFIX = "test_";

    public function testToArrayGivesResult()
    {
        $test = new TestPrefixObject();
        $result = $test->toArray();

        $this->assertIsArray($result);
    }

    public function testToArrayGivesResultField()
    {
        $title = "Hello World!";
        $titlen = "Hello Worldie!";
        $test = new TestPrefixObject("{\"title\":\"".$title."\"}");
        $test->fromArray([self::PREFIX."title" => $titlen]);
        $result = $test->toArray();

        $this->assertArrayHasKey("ntitle", $result);
    }

    public function testToArrayGivesResultFieldWithResult()
    {
        $title = "Hello World!";
        $test = new TestPrefixObject("{\"title\":\"".$title."\"}", self::PREFIX);
        $result = $test->toArray();

        $this->assertArrayHasKey("ntitle", $result);
        $this->assertEquals($title, $result["ntitle"]);
    }

    public function testToArrayGivesResultFieldWithResultDoubleFromArray()
    {
        $title = "Hello World!";
        $titleNew = "Hello Worldie!";
        $test = new TestPrefixObject("{\"title\":\"".$title."\"}");
        $test->fromArray(["title" => $titleNew], self::PREFIX);
        $result = $test->toArray();

        $this->assertArrayHasKey("ntitle", $result);
        $this->assertEquals($titleNew, $result["ntitle"]);
    }
}
