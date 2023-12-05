<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\Mocks;

use Vanengers\PhpJsonObjectLibrary\PhpJsonObject;

class TestPrefixObject extends PhpJsonObject
{
    public $mappers = [
        "test_title" => "ntitle",
        "test_description" => "description"
    ];

    public $title;
    public $ntitle;
    public $description;
}