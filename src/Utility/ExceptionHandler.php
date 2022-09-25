<?php

namespace App\Utility;

use InvalidArgumentException;

trait ExceptionHandler
{
    private function handleInputException(bool $predicate, string $message, mixed $code = null): void
    {
        $predicate && throw new  InvalidArgumentException($message, $code);
    }
}
