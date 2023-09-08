<?php

declare(strict_types=1);

namespace TomasJancar\ShipMonk\Comparator;

enum OrderType: string
{
    case ASC = 'asc';
    case DESC = 'desc';
}
