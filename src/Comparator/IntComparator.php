<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk\Comparator;

use TomasJancar\ShipMonk\Node\IntNode;
use TomasJancar\ShipMonk\Node\Node;

class IntComparator implements Comparator
{
    public function __construct(
        private readonly OrderType $orderType
    ) {
    }

    public function compare(Node $a, Node $b): int
    {
        assert($a instanceof IntNode);
        assert($b instanceof IntNode);

        return $this->orderType->value * ($a->getData() <=> $b->getData());
    }

    public function isSupported(Node $node): bool
    {
        return $node instanceof IntNode;
    }

    public function humanReadableSupportedType(): string
    {
        return 'integer';
    }
}
