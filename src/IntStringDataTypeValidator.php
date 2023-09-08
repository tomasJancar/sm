<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk;

use TomasJancar\ShipMonk\Comparator\Comparator;
use TomasJancar\ShipMonk\Exceptions\WrongValueTypeException;

class IntStringDataTypeValidator implements DataTypeValidator
{
    public function validate(Comparator $comparator, int|string $data): void
    {
        if (! $comparator->isSupported($data)) {
            throw WrongValueTypeException::createFromType(
                gettype($data),
                $comparator->humanReadableSupportedType()
            );
        }
    }
}
