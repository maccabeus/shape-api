<?php

namespace App\Service\Geometry;

class GeometryCalculator implements IGeometryCalculator
{
    public function sumOfAreas(...$shapes)
    {
        $sum = 0;
        foreach ($shapes as $shape) {
            $sum += $shape->surface();
        }
        return $sum;
    }
    public function sumOfDiameters(...$shapes)
    {
        $sum = 0;
        foreach ($shapes as $shape) {
            $sum += $shape->diameter();
        }
        return $sum;
    }
}
