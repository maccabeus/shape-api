<?php

namespace App\Shape\Types;

use App\Shape\IShape;
use App\Shape\Shape;
use App\Utility\ExceptionHandler;
use App\Utility\Formatter;

class Triangle extends Shape implements IShape

{
    use Formatter;
    use ExceptionHandler;

    public function __construct()
    {
        $this->type = "triangle";
    }
    public function  surface(): float
    {
        $this->handleInputException(!$this->a || !$this->b || !$this->c, "Parameter a, b, and c must be set", 100);
        $semiPerimeter = ($this->a + $this->b + $this->c) / 2;
        $surface = sqrt($semiPerimeter * ($semiPerimeter  - $this->a) * ($semiPerimeter  - $this->b) * ($semiPerimeter  - $this->c));
        $this->surface = $this->format($surface);
        return $this->surface;
    }
    public  function diameter(): float
    {
        $this->handleInputException(!$this->a || !$this->b, "Parameters a and b must be set", 101);
        $diameter = ($this->b * $this->a) / 2;
        return $this->format($diameter);
    }
    public  function circumference(): float
    {
        $this->handleInputException(!$this->a || !$this->b, "Parameters a and b must be set", 102);
        $circumference = ($this->a + $this->b + $this->c);
        $this->circumference = $this->format($circumference);
        return $circumference;
    }
    public function getProps(): array
    {
        return ($this->properties);
    }
    public function setProp(string $name, $value): IShape
    {
        $this->properties[$name] = $value;
        /**
         * Return the `class instance` to facilitate `chaining`
         */
        return $this;
    }
}
