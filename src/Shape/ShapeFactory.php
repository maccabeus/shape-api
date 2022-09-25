<?php

namespace App\Shape;

use App\Shape\Types\Circle;
use App\Shape\Types\Triangle;
use Exception;

class ShapeFactory
{
    public function create(string $type)
    {
        $classType = strtolower($type);
        switch ($classType) {
            case "circle":
                return new Circle();
                break;
            case "triangle":
                return new Triangle();
                break;
            default:
                throw new Exception("Shape type not supported");
        }
    }
}
