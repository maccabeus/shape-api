<?php

namespace App\Tests;

use App\Service\Geometry\GeometryCalculator;
use App\Service\Geometry\IGeometryCalculator;
use App\Shape\IShape;
use App\Shape\ShapeFactory;
use PHPUnit\Framework\TestCase;

class GeometryCalculatorTest extends TestCase
{
    private ShapeFactory $shapeFactory;
    private IShape $triangle;
    private IShape $circle;
    private  IGeometryCalculator $geometryCalculator;

    protected function setUp(): void
    {
        $this->shapeFactory = new ShapeFactory();
        $this->circle = $this->shapeFactory->create("circle");
        $this->triangle = $this->shapeFactory->create("triangle");
        $this->geometryCalculator = new GeometryCalculator();
    }

    public function testSumArea(): void
    {
        $this->circle->radius = 2.0;
        $this->triangle->setProp("a", 3.0)->setProp("b", 4.0)->setProp("c", 5.0);

        $sumOfArea = $this->geometryCalculator->sumOfAreas($this->circle, $this->triangle);
        $this->assertIsFloat($sumOfArea, "Sum area value must be a float");
        $this->assertEqualsWithDelta(18.57, $sumOfArea, 0.01, "Geometry sumArea calculation is accurate to the degree of 0.01");
    }
}
