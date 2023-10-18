<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\toArray;

use PHPUnit\Framework\TestCase;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestExcludeObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestMapperObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestSetterObject;

class ExcludeTest extends TestCase
{
    public function testToArrayExcludesDescription()
    {
        $title = "Hello World!";
        $test = new TestExcludeObject(['title'=>$title]);

        $result = $test->toArray();

        $this->assertArrayHasKey("title", $result);
        $this->assertArrayNotHasKey("description", $result);
    }
}
