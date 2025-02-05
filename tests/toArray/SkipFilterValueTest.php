<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\toArray;

use PHPUnit\Framework\TestCase;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestMapperObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestSetterObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestSkipFilterObject;
use Vanengers\PhpJsonObjectLibrary\Tests\Mocks\TestSkipFilterObjectNoFilters;

class SkipFilterValueTest extends TestCase
{
    public function testNoSkipFilteringSoExpectWithoutZero()
    {
        $ean = "01254587";
        $check = "1254587";
        $test = new TestSkipFilterObjectNoFilters(['ean'=>$ean]);

        $result = $test->ean;

        $this->assertEquals($check, $result);
    }

    public function testSkipFilteringToIntegerNoZero()
    {
        $ean = "1254587";
        $test = new TestSkipFilterObject(['ean'=>$ean]);

        $result = $test->ean;

        $this->assertEquals($ean, $result);
    }

    public function testSkipFilteringToIntegerLargerIntegerCanHandle()
    {
        $ean = "01254583534534534534534534674575678568574535234756734548673452353476785663457";
        $test = new TestSkipFilterObject(['ean'=>$ean]);

        $result = $test->ean;

        $this->assertEquals($ean, $result);
    }

    public function testSkipFilteringToIntegerLotsLargerIntegerCanHandle()
    {
        $ean = "0000000001254583534534534534534534674575678568574535234756734548673452353476785663457";
        $test = new TestSkipFilterObject(['ean'=>$ean]);

        $result = $test->ean;

        $this->assertEquals($ean, $result);
    }

    public function testSkipFilteringToIntegerSingleZero()
    {
        $ean = "01254587";
        $test = new TestSkipFilterObject(['ean'=>$ean]);

        $result = $test->ean;

        $this->assertEquals($ean, $result);
    }

    public function testSkipFilteringToIntegerDoubleZero()
    {
        $ean = "001254587";
        $test = new TestSkipFilterObject(['ean'=>$ean]);

        $result = $test->ean;

        $this->assertEquals($ean, $result);
    }
}
