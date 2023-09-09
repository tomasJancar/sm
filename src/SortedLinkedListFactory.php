<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk;

use TomasJancar\ShipMonk\Comparator\IntComparator;
use TomasJancar\ShipMonk\Comparator\OrderType;
use TomasJancar\ShipMonk\Comparator\StringComparator;
use TomasJancar\ShipMonk\Node\NodeType;

final class SortedLinkedListFactory
{
    public static function createIntList(OrderType $orderType = OrderType::ASC): SortedLinkedList
    {
        return self::create(NodeType::INTEGER, $orderType);
    }

    public static function createStringList(OrderType $orderType = OrderType::ASC): SortedLinkedList
    {
        return self::create(NodeType::STRING, $orderType);
    }

    public static function create(NodeType $nodeType, OrderType $orderType = OrderType::ASC): SortedLinkedList
    {
        return match ($nodeType) {
            NodeType::STRING => new SortedLinkedList(
                new StringComparator($orderType),
                new IntStringDataTypeValidator()
            ),
            NodeType::INTEGER => new SortedLinkedList(
                new IntComparator($orderType),
                new IntStringDataTypeValidator()
            ),
        };
    }
}
