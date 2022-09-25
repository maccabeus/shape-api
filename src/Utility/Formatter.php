<?php

namespace App\Utility;

trait Formatter
{
    private function format(float $value, int $decimals = 2): float
    {
        return sprintf("%." . $decimals . "F", (float)($value / 1.0));
    }
}
