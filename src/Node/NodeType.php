<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk\Node;

enum NodeType: string
{
    case STRING = 'string';
    case INT = 'int';
}
