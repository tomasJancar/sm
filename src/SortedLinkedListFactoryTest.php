<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk;

use PHPUnit\Framework\TestCase;
use TomasJancar\ShipMonk\Comparator\OrderType;
use TomasJancar\ShipMonk\Exceptions\WrongValueTypeException;

final class SortedLinkedListFactoryTest extends TestCase
{
    public function testCreateLinkedListWithStringValues(): void
    {
        $sortedLinkedList = SortedLinkedListFactory::createStringList(OrderType::DESC);
        $sortedLinkedList->insertValue('foo');

        $this->expectException(WrongValueTypeException::class);
        $this->expectExceptionMessage('This type(integer) is not accepted. Please use string value.');
        $sortedLinkedList->insertValue(1);
    }

    public function testCreateLinkedListWithIntValues(): void
    {
        $sortedLinkedList = SortedLinkedListFactory::createIntList();
        $sortedLinkedList->insertValue(5);

        $this->expectException(WrongValueTypeException::class);
        $this->expectExceptionMessage('This type(string) is not accepted. Please use int value.');
        $sortedLinkedList->insertValue('foo');
    }
}
