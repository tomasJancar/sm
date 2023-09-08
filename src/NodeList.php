<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk;

use Countable;
use Iterator;
use TomasJancar\ShipMonk\Node\Node;

/**
 * @template TValue
 * @extends Iterator<TValue>
 */
interface NodeList extends Iterator, Countable
{
    public function insertValue(int|string $data): void;

    public function insertNode(Node $node): void;
}
