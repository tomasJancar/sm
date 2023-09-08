<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk\Comparator;

use TomasJancar\ShipMonk\Node\Node;

class StringComparator implements Comparator
{
    public function __construct(
        private readonly OrderType $orderType
    ) {
    }

    public function compare(Node $a, Node $b): int
    {
        $dataA = $a->getData();
        assert(is_string($dataA), 'Node A is not string type.');

        $dataB = $b->getData();
        assert(is_string($dataB), 'Node B is not string type.');

        return ($this->orderType === OrderType::ASC ? 1 : -1) * strcmp($dataA, $dataB);
    }

    public function isSupported(int|string $data): bool
    {
        return is_string($data);
    }

    public function humanReadableSupportedType(): string
    {
        return 'string';
    }
}
