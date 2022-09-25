<?php

namespace App\Tests;

use App\Shape\IShape;
use App\Shape\ShapeFactory;
use PHPUnit\Framework\TestCase;

class TriangleTest extends TestCase
{
    private ShapeFactory $shapeFactory;
    private IShape $triangle;

    protected function setUp(): void
    {
        $this->shapeFactory = new ShapeFactory();
        $this->triangle = $this->shapeFactory->create("triangle");
    }

    public function testInit(): void
    {
        $this->triangle->setProp("a", 3.0)->setProp("b", 4.0)->setProp("c", 5.0);
        $this->assertEquals($this->triangle->a, 3.0, "Triangle a class field set correctly");
        $this->assertEquals($this->triangle->b, 4.0, "Triangle b class field correctly");
        $this->assertEquals($this->triangle->c, 5.0, "Triangle a class field correctly");
        $this->assertEquals($this->triangle->type, "triangle", "Shape type correctly set");
    }
    public function testCalculateDiameter(): void
    {
        $this->triangle->setProp("a", 3.0)->setProp("b", 4.0)->setProp("c", 5.0);
        $this->assertEquals($this->triangle->diameter(), 6.0, "Triangle diameter properly calculated");
    }
    public function testCalculateSurface(): void
    {
        $this->triangle->setProp("a", 3.0)->setProp("b", 4.0)->setProp("c", 5.0);
        $diameter = $this->triangle->diameter();
        $this->assertEquals($diameter, 6.0, " Triangle surface must properly calculated");
        $this->assertIsFloat($diameter, "Triangle surface value is float");
    }
    public function testCalculateCircumference(): void
    {
        $this->triangle->setProp("a", 3.0)->setProp("b", 4.0)->setProp("c", 5.0);
        $circumference = $this->triangle->circumference();
        $this->assertIsFloat($circumference, "Triangle circumference value must be a float");
        $this->assertEquals($circumference, 12.0, " Triangle diameter  must properly calculated");
    }
}
