<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\Mocks;

use Vanengers\PhpJsonObjectLibrary\PhpJsonObject;

class TestCaseInsensitiveSetter extends PhpJsonObject
{
    public $createdAt;
    public $ThisHasSomeCaseInsentiveFields;

    /**
     * @param mixed $ThisHasSomeCaseInsentiveFields
     */
    public function setThisHasSomeCaseInsentiveFields($data): void
    {
        $this->ThisHasSomeCaseInsentiveFields = get_class($this).$data;
    }
}