<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk\Node;

final class StringNode implements Node
{
    public function __construct(
        private readonly string $data,
        private ?Node $next = null
    ) {
    }

    public function getData(): string
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
