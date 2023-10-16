<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\toJson;

use PHPUnit\Framework\TestCase;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestSetterObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestSetterWithMapperObject;

class SetterFieldTest extends TestCase
{

    public function testToArrayDoesGiveResultWithPrefix()
    {
        $title = "Hello World!";
        $test = new TestSetterWithMapperObject("{\"title\":\"".$title."\"}");

        $result = $test->toArray();

        $this->assertArrayHasKey("title", $result);
        $this->assertEquals($test->getTestPrefix().$title, $result["title"]);
    }

    public function testToArrayDoesGiveResultWithPrefixWithMapper()
    {
        $title = "Hello World!";
        $test = new TestSetterWithMapperObject("{\"titel\":\"".$title."\"}");

        $result = $test->toArray();

        $this->assertArrayHasKey("title", $result);
        $this->assertEquals($test->getTestPrefix().$title, $result["title"]);
    }
}
