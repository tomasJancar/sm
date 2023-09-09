<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk\Comparator;

enum OrderType: int
{
    case ASC = 1;
    case DESC = -1;
}
