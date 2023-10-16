<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\toJson;

use PHPUnit\Framework\TestCase;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestMapperObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestSetterObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestSetterWithMapperObject;

class SkipFieldTest extends TestCase
{

    public function testToArrayDoesGiveResultWithPrefix()
    {
        $title = "Hello World!";
        $test = new TestSetterObject("{\"titel\":\"".$title."\"}");

        $result = $test->toArray(['skip'=>['description']]);

        $this->assertArrayHasKey("title", $result);
        $this->assertArrayNotHasKey("description", $result);
    }

    public function testToArrayDoesGiveResultWithPrefixWithMapper()
    {
        $title = "Hello World!";
        $test = new TestMapperObject("{\"titel\":\"".$title."\"}");

        $result = $test->toArray(['skip'=>['description']]);

        $this->assertArrayHasKey("title", $result);
        $this->assertArrayNotHasKey("description", $result);
    }

    ///
    /// NULL
    ///

    public function testToArrayDoesGiveResultWithPrefixNull()
    {
        $test = new TestObject("{\"description\":\"null\"}");

        $result = $test->toArray(['skip_null'=>['description']]);

        $this->assertArrayHasKey("title", $result);
        $this->assertArrayNotHasKey("description", $result);
    }

    public function testToArrayDoesGiveResultWithPrefixWithMapperNull()
    {
        $title = "Hello World!";
        $desc = null;
        $test = new TestSetterWithMapperObject("{\"titel\":\"".$title."\",\"omschrijving\":\"".$desc."\"}");

        $result = $test->toArray(['skip_null'=>['description']]);

        $this->assertArrayHasKey("title", $result);
        $this->assertArrayNotHasKey("description", $result);
    }

    ///
    /// EMPTY (0 is considered empty)
    ///

    public function testToArrayDoesGiveResultWithPrefixEmpty()
    {
        $desc = 0;
        $test = new TestObject(['description'=>$desc]);

        $result = $test->toArray(['skip_empty'=>['description']]);

        $this->assertArrayHasKey("title", $result);
        $this->assertArrayNotHasKey("description", $result);
    }

    public function testToArrayDoesGiveResultWithPrefixWithMapperEmpty()
    {
        $title = "Hello World!";
        $desc = 0;
        $test = new TestMapperObject("{\"titel\":\"".$title."\",\"description\":\"".$desc."\"}");

        $result = $test->toArray(['skip_empty'=>['description']]);

        $this->assertArrayHasKey("title", $result);
        $this->assertArrayNotHasKey("description", $result);
    }

    ///
    /// Test Nullable when not setting fields...
    ///

    public function testToArrayNotSettingFieldsSkipNullable()
    {
        $test = new TestObject(['description'=>null]); // not setting any fields

        $result = $test->toArray(['skip_null'=>['description']]);

        $this->assertArrayHasKey("title", $result);
        $this->assertArrayNotHasKey("description", $result);
    }
}
