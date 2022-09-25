<?php

namespace App\Tests;

use App\Shape\IShape;
use App\Shape\ShapeFactory;
use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase
{
    private ShapeFactory $shapeFactory;
    private IShape $circle;

    protected function setUp(): void
    {
        $this->shapeFactory = new ShapeFactory();
        $this->circle = $this->shapeFactory->create("circle");
    }

    public function testInit(): void
    {
        $this->circle->radius = 10;
        $this->assertEquals($this->circle->radius, 10, "Circle radius properly assigned");
        $this->circle->radius = 20;
        $this->assertEquals($this->circle->radius, 20, "Successive  radius  assignment works");
        $this->assertEquals($this->circle->type, "circle", "Shape type correctly set");
    }
    public function testCalculateDiameter(): void
    {
        $this->circle->radius = 2.0;
        $this->assertEquals($this->circle->diameter(), 4.0, "Diameter properly calculated");
        $this->assertIsFloat($this->circle->surface(), "Diameter properly calculated");
    }
    public function testCalculateSurface(): void
    {
        $this->circle->radius = 2.0;
        $diameter = $this->circle->diameter();
        $this->assertEquals($diameter, 4.0, "Diameter properly calculated");
        $this->assertIsFloat($diameter, "Diameter value is float");
        $this->assertEquals($diameter / 2, $this->circle->radius, "Diameter  calculated is twice the radius");
    }
    public function testCalculateCircumference(): void
    {
        $this->circle->radius = 2.0;
        $this->assertIsFloat($this->circle->circumference(), "Circumference must be a float");
        $this->assertEqualsWithDelta(12.56, $this->circle->circumference(), 0.1, "Circumference  calculation is accurate to the degree of 0.1");
    }
}
