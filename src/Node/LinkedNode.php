<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk\Node;

final class LinkedNode implements Node
{
    private ?Node $next = null;

    public function __construct(
        private readonly int|string $data
    ) {
    }

    public function getData(): int|string
    {
        return $this->data;
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }

    public function setNext(?Node $next): void
    {
        $this->next = $next;
    }
}
