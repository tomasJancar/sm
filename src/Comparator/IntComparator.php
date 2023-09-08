<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk\Comparator;

use TomasJancar\ShipMonk\Node\Node;

class IntComparator implements Comparator
{
    public function __construct(
        private readonly OrderType $orderType
    ) {
    }

    public function compare(Node $a, Node $b): int
    {
        return ($this->orderType === OrderType::ASC ? 1 : -1) * ($a->getData() <=> $b->getData());
    }

    public function isSupported(int|string $data): bool
    {
        return is_numeric($data);
    }

    public function humanReadableSupportedType(): string
    {
        return 'int';
    }
}
