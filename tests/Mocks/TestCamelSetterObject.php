<?php

namespace Vanengers\PhpJsonObjectLibrary\Tests\Mocks;

use Vanengers\PhpJsonObjectLibrary\PhpJsonObject;

class TestCamelSetterObject extends PhpJsonObject
{
    public $camel_test;

    public $camel_test_double;
    public $camel_test_double_triple;

    public function setCamelTest($data)
    {
        $this->camel_test = get_class($this).$data;
    }

    /**
     * @param mixed $camel_test_double
     */
    public function setCamelTestDouble($data): void
    {
        $this->camel_test_double = get_class($this).$data;
    }

    /**
     * @param mixed $camel_test_double_triple
     */
    public function setCamelTestDoubleTriple($data): void
    {
        $this->camel_test_double_triple = get_class($this).$data;
    }


}