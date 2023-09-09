<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk\Comparator;

use TomasJancar\ShipMonk\Node\Node;
use TomasJancar\ShipMonk\Node\StringNode;

class StringComparator implements Comparator
{
    public function __construct(
        private readonly OrderType $orderType
    ) {
    }

    public function compare(Node $a, Node $b): int
    {
        assert($a instanceof StringNode, 'Node A is not string type.');
        assert($b instanceof StringNode, 'Node B is not string type.');

        return $this->orderType->value * strcmp($a->getData(), $b->getData());
    }

    public function isSupported(Node $node): bool
    {
        return $node instanceof StringNode;
    }

    public function humanReadableSupportedType(): string
    {
        return 'string';
    }
}
