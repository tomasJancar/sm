<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk;

use TomasJancar\ShipMonk\Comparator\Comparator;
use TomasJancar\ShipMonk\Exceptions\WrongValueTypeException;

interface DataTypeValidator
{
    /**
     * @throws WrongValueTypeException
     */
    public function validate(Comparator $comparator, string|int $data): void;
}
