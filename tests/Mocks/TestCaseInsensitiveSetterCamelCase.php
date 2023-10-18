<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\Mocks;

use Vanengers\PhpJsonObjectLibrary\PhpJsonObject;

class TestCaseInsensitiveSetterCamelCase extends PhpJsonObject
{
    public $createdAt;
    public $ThisHas_SomeCase_InsentiveFields;

    /**
     * @param mixed $ThisHas_SomeCase_InsentiveFields
     */
    public function setThisHasSomeCaseInsentiveFields($data): void
    {
        $this->ThisHas_SomeCase_InsentiveFields = get_class($this).$data;
    }


}