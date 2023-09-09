<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk;

use TomasJancar\ShipMonk\Comparator\Comparator;
use TomasJancar\ShipMonk\Exceptions\WrongValueTypeException;
use TomasJancar\ShipMonk\Node\Node;

class IntStringDataTypeValidator implements DataTypeValidator
{
    public function validate(Comparator $comparator, Node $node): void
    {
        if (! $comparator->isSupported($node)) {
            throw WrongValueTypeException::createFromType(
                gettype($node->getData()),
                $comparator->humanReadableSupportedType()
            );
        }
    }
}
