<?php

namespace App\Service\Geometry;

use App\Shape\IShape;

interface IGeometryCalculator
{
    public function sumOfAreas(IShape ...$shapes);
    public function sumOfDiameters(IShape ...$shapes);
}
