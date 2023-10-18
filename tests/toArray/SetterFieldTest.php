<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\toArray;

use PHPUnit\Framework\TestCase;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestCamelSetterObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestSetterObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestSetterWithMapperObject;

class SetterFieldTest extends TestCase
{

    public function testToArrayDoesGiveResultWithPrefix()
    {
        $title = "Hello World!";
        $test = new TestSetterObject(['title'=>$title]);

        $result = $test->toArray();

        $this->assertArrayHasKey("title", $result);
        $this->assertEquals($test->getTestPrefix().$title, $result["title"]);
    }

    public function testToArrayDoesGiveResultWithPrefixWithMapper()
    {
        $title = "Hello World!";
        $test = new TestSetterWithMapperObject(['titel'=>$title]);

        $result = $test->toArray();

        $this->assertArrayHasKey("title", $result);
        $this->assertEquals($test->getTestPrefix().$title, $result["title"]);
    }

    public function testToArrayDoesGiveResultWithPrefixCaseCamelCase()
    {
        $title = "Hello World!";
        $test = new TestCamelSetterObject(['camel_test'=>$title]);

        $result = $test->toArray();

        $this->assertArrayHasKey("camel_test", $result);
        $this->assertEquals(get_class($test).$title, $result["camel_test"]);
    }

    public function testToArrayDoesGiveResultWithPrefixCaseCamelDouble()
    {
        $title = "Hello World!";
        $test = new TestCamelSetterObject(['camel_test_double'=>$title]);

        $result = $test->toArray();

        $this->assertArrayHasKey("camel_test_double", $result);
        $this->assertEquals(get_class($test).$title, $result["camel_test_double"]);
    }

    public function testToArrayDoesGiveResultWithPrefixCaseCamelTriple()
    {
        $title = "Hello World!";
        $test = new TestCamelSetterObject(['camel_test_double_triple'=>$title]);

        $result = $test->toArray();

        $this->assertArrayHasKey("camel_test_double_triple", $result);
        $this->assertEquals(get_class($test).$title, $result["camel_test_double_triple"]);
    }

    public function testToArrayDoesGiveResultWithPrefixCaseCamelTripleSetWithSetterName()
    {
        $title = "Hello World!";
        $test = new TestCamelSetterObject(['CamelTestDoubleTriple'=>$title]);

        $result = $test->toArray();

        $this->assertArrayHasKey("camel_test_double_triple", $result);
        $this->assertEquals(get_class($test).$title, $result["camel_test_double_triple"]);
    }

    public function testToArrayDoesGiveResultWithPrefixCaseCamelDoubleSetWithSetterName()
    {
        $title = "Hello World!";
        $test = new TestCamelSetterObject(['CamelTestDouble'=>$title]);

        $result = $test->toArray();

        $this->assertArrayHasKey("camel_test_double", $result);
        $this->assertEquals(get_class($test).$title, $result["camel_test_double"]);
    }

    public function testToArrayDoesGiveResultWithPrefixCaseCamelSingleSetWithSetterName()
    {
        $title = "Hello World!";
        $test = new TestCamelSetterObject(['CamelTest'=>$title]);

        $result = $test->toArray();

        $this->assertArrayHasKey("camel_test", $result);
        $this->assertEquals(get_class($test).$title, $result["camel_test"]);
    }
}
