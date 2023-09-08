<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk;

use TomasJancar\ShipMonk\Comparator\Comparator;
use TomasJancar\ShipMonk\Node\LinkedNode;
use TomasJancar\ShipMonk\Node\Node;

/**
 * @implements NodeList<int|string>
 */
class SortedLinkedList implements NodeList
{
    private ?Node $head = null;

    private ?Node $current = null;

    private int $count = 0;

    public function __construct(
        private readonly Comparator $comparator,
        private readonly DataTypeValidator $dataTypeValidator
    ) {
    }

    public function insertValue(int|string $data): void
    {
        $node = new LinkedNode($data);
        $this->insertNode($node);
    }

    public function insertNode(Node $node): void
    {
        $this->dataTypeValidator->validate($this->comparator, $node->getData());

        if ($this->head === null || $this->comparator->compare($node, $this->head) < 0) {
            $node->setNext($this->head);
            $this->head = $node;
        } else {
            $current = $this->head;
            while ($current->getNext() !== null && $this->comparator->compare($node, $current->getNext()) > 0) {
                $current = $current->getNext();
            }
            $node->setNext($current->getNext());
            $current->setNext($node);
        }

        $this->count++;
    }

    /**
     * @return array<int|string|null>
     */
    public function toArray(): array
    {
        $elements = [];

        foreach ($this as $element) {
            $elements[] = $element;
        }

        return $elements;
    }

    public function rewind(): void
    {
        $this->current = $this->head;
    }

    public function current(): int|string|null
    {
        return $this->current?->getData() ?? null;
    }

    public function key(): int|string|null
    {
        return $this->current !== null ? spl_object_id($this->current) : null;
    }

    public function next(): void
    {
        $this->current = $this->current?->getNext();
    }

    public function valid(): bool
    {
        return $this->current !== null;
    }

    public function count(): int
    {
        return $this->count;
    }
}
