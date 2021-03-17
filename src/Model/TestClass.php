<?php

namespace App\Model;

class TestClass
{
    private TestValueObject $one;

    private TestValueObject $two;

    /**
     * @var TestValueObject[]
     */
    private array $many;

    /**
     * @param TestValueObject   $one
     * @param TestValueObject   $two
     * @param TestValueObject[] $many
     */
    public function __construct(TestValueObject $one, TestValueObject $two, array $many)
    {
        $this->one = $one;
        $this->two = $two;
        $this->many = $many;
    }

    /**
     * @return TestValueObject
     */
    public function getOne(): TestValueObject
    {
        return $this->one;
    }

    /**
     * @return TestValueObject
     */
    public function getTwo(): TestValueObject
    {
        return $this->two;
    }

    /**
     * @return TestValueObject[]
     */
    public function getMany(): array
    {
        return $this->many;
    }
}