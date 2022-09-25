<?php

namespace App\Shape\Types;

use App\Shape\IShape;
use App\Shape\Shape;
use App\Utility\ExceptionHandler;
use App\Utility\Formatter;

class Circle extends Shape implements IShape

{
    use Formatter;
    use ExceptionHandler;

    public function __construct()
    {
        $this->type = "circle";
    }
    public function  surface(): float
    {
        $this->validateRadius();
        $surface = pi() * pow($this->radius, 2);
        $this->surface = $this->format($surface);
        return $this->surface;
    }
    public  function diameter(): float
    {
        $this->validateRadius();
        $diameter = 2 * $this->radius;
        return $this->format($diameter);
    }
    public function circumference(): float
    {
        $this->validateRadius();
        $circumference = 2 * pi() * $this->radius;
        $this->circumference  = $this->format($circumference);
        return $this->circumference;
    }
    public function getProps(): array
    {
        return ($this->properties);
    }
    /**
     * Set class property value
     *
     * @param string $name The property name
     * @param mixed $value The property value
     * @return ShapeAbstract Returns an instance of `setProps`
     */
    public function setProp(string $name, $value): IShape
    {
        $this->properties[$name] = $value;
        /**
         * Return the `class instance` to facilitate `chaining`
         */
        return $this;
    }
    private function  validateRadius()
    {
        $this->handleInputException(!$this->radius, "Radius must be set", 200);
    }
}
