<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\Mocks;

use Vanengers\PhpJsonObjectLibrary\PhpJsonObject;

class TestMapperObject extends PhpJsonObject
{
    public $mappers = [
        'titel' => 'title',
        'omschrijving' => 'description'
    ];

    public $title;
    public $description;
}