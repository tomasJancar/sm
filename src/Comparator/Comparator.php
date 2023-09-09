<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk\Comparator;

use TomasJancar\ShipMonk\Node\Node;

interface Comparator
{
    public function compare(Node $a, Node $b): int;

    public function isSupported(Node $node): bool;

    public function humanReadableSupportedType(): string;
}
