<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk\Node;

interface Node
{
    public function getData(): int|string;

    public function getNext(): ?self;

    public function setNext(?self $next): void;
}
