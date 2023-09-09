<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk;

use TomasJancar\ShipMonk\Comparator\Comparator;
use TomasJancar\ShipMonk\Exceptions\WrongValueTypeException;
use TomasJancar\ShipMonk\Node\Node;

interface DataTypeValidator
{
    /**
     * @throws WrongValueTypeException
     */
    public function validate(Comparator $comparator, Node $node): void;
}
