<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\Mocks;

use Vanengers\PhpJsonObjectLibrary\PhpJsonObject;

class TestExcludeObject extends PhpJsonObject
{
    public $exclude_from_array = [
        'description'
    ];

    public $title;
    public $description;
}