<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\toArray;

use PHPUnit\Framework\TestCase;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestCaseInsensitiveObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestObject;

class CaseInsentiveTest extends TestCase
{
    public function testToArrayGivesResultFieldsWithResults()
    {
        $createdAt = 'cvdnfvgdfvghj344';
        $caseInsentive = 'HJGdgfsjkftghjkewrtjk34hfg;';
        $test = new TestCaseInsensitiveObject([
            "createdAt" => $createdAt,
            "ThisHasSomeCaseInsentiveFields" => $caseInsentive
        ]);
        $result = $test->toArray();

        $this->assertArrayHasKey("createdAt", $result);
        $this->assertArrayHasKey("ThisHasSomeCaseInsentiveFields", $result);
        $this->assertEquals($createdAt, $result["createdAt"]);
        $this->assertEquals($caseInsentive, $result["ThisHasSomeCaseInsentiveFields"]);
    }
}
