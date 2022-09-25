<?php

namespace App\Shape;

use App\Shape\IShape;

abstract class Shape
{
    /**
     * Handles dynamic property assignment. When we call the `setter` or `getter `
     * of object instance, we will dynamically add to this class field
     *
     * @var array
     */
    protected array $properties = [];

    public function __get(string $name)
    {
        if (!isset($this->properties[$name])) {
            return null;
        };
        return $this->properties[$name];
    }
    public function __set(string $name, $value)
    {
        $this->properties[$name] = $value;
    }
}
