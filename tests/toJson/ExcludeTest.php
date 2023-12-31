<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\toJson;

use PHPUnit\Framework\TestCase;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestExcludeObject;

class ExcludeTest extends TestCase
{
    public function testToArrayDoesGiveResultWithPrefix()
    {
        $title = "Hello World!";
        $test = new TestExcludeObject("{\"title\":\"".$title."\"}");

        $result = $test->toArray();

        $this->assertArrayHasKey("title", $result);
        $this->assertArrayNotHasKey("description", $result);
    }
}
