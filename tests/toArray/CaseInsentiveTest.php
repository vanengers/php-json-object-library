<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\toArray;

use PHPUnit\Framework\TestCase;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestCaseInsensitiveObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestCaseInsensitiveSetter;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestCaseInsensitiveSetterCamelCase;
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

    public function testToArrayGivesResultFieldsWithResultsSetter()
    {
        $createdAt = 'cvdnfvgdfvghj344';
        $caseInsentive = 'HJGdgfsjkftghjkewrtjk34hfg;';
        $test = new TestCaseInsensitiveSetter([
            "createdAt" => $createdAt,
            "ThisHasSomeCaseInsentiveFields" => $caseInsentive
        ]);
        $result = $test->toArray();

        $this->assertArrayHasKey("createdAt", $result);
        $this->assertArrayHasKey("ThisHasSomeCaseInsentiveFields", $result);
        $this->assertEquals($createdAt, $result["createdAt"]);
        $this->assertEquals(get_class($test).$caseInsentive, $result["ThisHasSomeCaseInsentiveFields"]);
    }

    public function testToArrayGivesResultFieldsWithResultsSetterWithCamel()
    {
        $createdAt = 'cvdnfvgdfvghj344';
        $caseInsentive = 'HJGdgfsjkftghjkewrtjk34hfg;';
        $test = new TestCaseInsensitiveSetterCamelCase([
            "createdAt" => $createdAt,
            "ThisHas_SomeCase_InsentiveFields" => $caseInsentive
        ]);
        $result = $test->toArray();

        $this->assertArrayHasKey("createdAt", $result);
        $this->assertArrayHasKey("ThisHas_SomeCase_InsentiveFields", $result);
        $this->assertEquals($createdAt, $result["createdAt"]);
        $this->assertEquals(get_class($test).$caseInsentive, $result["ThisHas_SomeCase_InsentiveFields"]);
    }
}
