<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk;

use PharIo\Manifest\Type;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use TomasJancar\ShipMonk\Comparator\OrderType;
use TomasJancar\ShipMonk\Exceptions\WrongValueTypeException;
use TomasJancar\ShipMonk\Node\LinkedNode;
use TomasJancar\ShipMonk\Node\Node;
use TomasJancar\ShipMonk\Node\NodeType;

final class SortedLinkedListTest extends TestCase
{
    public function testSortNumbers(): void
    {
        // ASC sorting
        $sortedLinkedList = SortedLinkedListFactory::createIntList();

        $sortedLinkedList->insertValue(5);
        $sortedLinkedList->insertValue(2);
        $sortedLinkedList->insertValue(3);
        $sortedLinkedList->insertValue(1);

        Assert::assertSame([1, 2, 3, 5], $sortedLinkedList->toArray());

        $sortedLinkedList->insertValue(0);
        $sortedLinkedList->insertValue(3);
        Assert::assertSame([0, 1, 2, 3, 3, 5], $sortedLinkedList->toArray());

        // DESC sorting
        $descSortedLinkedList = SortedLinkedListFactory::createIntList(OrderType::DESC);
        $descSortedLinkedList->insertValue(5);
        $descSortedLinkedList->insertValue(2);
        $descSortedLinkedList->insertValue(3);
        $descSortedLinkedList->insertValue(1);

        Assert::assertSame([5, 3, 2, 1], $descSortedLinkedList->toArray());
    }

    public function testSortStrings(): void
    {
        // ASC sorting
        $sortedLinkedList = SortedLinkedListFactory::createStringList();

        $sortedLinkedList->insertValue('banana');
        $sortedLinkedList->insertValue('apple');
        $sortedLinkedList->insertValue('cherry');
        $sortedLinkedList->insertValue('date');

        Assert::assertSame(['apple', 'banana', 'cherry', 'date'], $sortedLinkedList->toArray());

        $sortedLinkedList->insertValue('curry');
        Assert::assertSame(['apple', 'banana', 'cherry', 'curry', 'date'], $sortedLinkedList->toArray());

        // DESC sorting
        $descSortedLinkedList = SortedLinkedListFactory::createStringList(OrderType::DESC);
        $descSortedLinkedList->insertValue('banana');
        $descSortedLinkedList->insertValue('apple');
        $descSortedLinkedList->insertValue('cherry');
        $descSortedLinkedList->insertValue('date');
        $descSortedLinkedList->insertNode(new LinkedNode('monkey'));

        Assert::assertSame(['monkey', 'date', 'cherry', 'banana', 'apple'], $descSortedLinkedList->toArray());
    }

    /**
     * @dataProvider linkedListDataProvider
     *
     * @param NodeList<Node> $nodeList
     */
    public function testCountOfNodesInList(int $expectedCount, NodeList $nodeList): void
    {
        Assert::assertCount($expectedCount, $nodeList);
    }

    /**
     * @return mixed[]
     */
    public static function linkedListDataProvider(): iterable
    {
        $sortedIntLinkedList = SortedLinkedListFactory::create(NodeType::INT);
        $sortedIntLinkedList->insertValue(5);
        $sortedIntLinkedList->insertValue(2);

        yield 'sorted int list' => [
            'expectedCount' => 2,
            'nodeList' => $sortedIntLinkedList,
        ];

        $sortedStringLinkedList = SortedLinkedListFactory::create(NodeType::STRING);
        $sortedStringLinkedList->insertValue('apple');
        $sortedStringLinkedList->insertValue('cherry');
        $sortedStringLinkedList->insertValue('date');

        yield 'sorted string list' => [
            'expectedCount' => 3,
            'nodeList' => $sortedStringLinkedList,
        ];
    }

    /**
     * @dataProvider invalidDataTypesProvider
     */
    public function testInsertInvalidValueIntoList(NodeType $type, string|int $insertedValue): void
    {
        $sortedLinkedList = SortedLinkedListFactory::create($type);

        $this->expectException(WrongValueTypeException::class);
        $sortedLinkedList->insertValue($insertedValue);
    }

    /**
     * @return array<array{type: NodeType::*, value: string|int}>
     */
    public static function invalidDataTypesProvider(): array
    {
        return [
            [
                'type' => NodeType::INT,
                'value' => 'banana',
            ],
            [
                'type' => NodeType::STRING,
                'value' => 10,
            ],
        ];
    }
}
