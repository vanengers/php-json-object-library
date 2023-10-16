<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\Mocks;

use Vanengers\PhpJsonObjectLibrary\PhpJsonObject;

class TestSetterWithMapperObject extends PhpJsonObject
{
    public $mappers = [
        'titel' => 'title',
    ];

    public $title;
    public $description;

    public function setTitle($data)
    {
        $this->title = $this->getTestPrefix().$data;
    }

    public function setDescription($data)
    {
        $this->description = $this->getTestPrefix().$data;
    }

    public function getTestPrefix()
    {
        return "test_";
    }
}