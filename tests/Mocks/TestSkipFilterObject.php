<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\Mocks;

use Vanengers\PhpJsonObjectLibrary\PhpJsonObject;

class TestSkipFilterObject extends PhpJsonObject
{
    public $skip_filter_value = ['ean'];
    public $ean;
}