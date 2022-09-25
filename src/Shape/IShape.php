<?php

namespace App\Shape;

use App\Shape\IShape as ShapeIShape;

interface IShape
{
    /**
     * Calculate the shape area surface
     *
     * @return float return the calculated area value
     */
    public function surface(): float;
    /**
     * Calculate shape diameter
     *
     * @return float returns the calculated diameter
     */
    public function diameter(): float;
    /**
     * Calculate the the shape circumference
     *
     * @return float return the calculated circumference
     */
    public function circumference(): float;
    /**
     * Get the list of set shape properties
     *
     * @return array return all set class properties
     */
    public function getProps(): array;
    /**
     * Set Props values providing method chaining capability
     *
     * @return mixed
     */
    public function setProp(string $name, $value): self;
}
