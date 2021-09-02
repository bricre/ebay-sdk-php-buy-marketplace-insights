<?php

namespace Ebay\Buy\MarketplaceInsights;

use OpenAPI\Runtime\ResponseTypes as AbstractResponseTypes;

class ResponseTypes extends AbstractResponseTypes
{
    public static $types = [
        'search' => [
            '200.' => 'Ebay\\Buy\\MarketplaceInsights\\Model\\SalesHistoryPagedCollection',
        ],
    ];
}
