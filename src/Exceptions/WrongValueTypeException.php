<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk\Exceptions;

use RuntimeException;

class WrongValueTypeException extends RuntimeException
{
    public static function createFromType(string $wrongType, string $expectedType): self
    {
        return new self(
            'This type(' . $wrongType . ') is not accepted. Please use ' . $expectedType . ' value.'
        );
    }
}
