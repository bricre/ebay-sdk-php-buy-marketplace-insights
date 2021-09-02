<?php

namespace Ebay\Buy\MarketplaceInsights\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * The container that defines the fields for the buying options refinements. This
 * container is returned when fieldgroups is set to BUYING_OPTION_REFINEMENTS or
 * FULL in the request.
 */
class BuyingOptionDistribution extends AbstractModel
{
    /**
     * @var string
     */
    public $buyingOption = null;

    /**
     * The number of items having this buying option.
     *
     * @var int
     */
    public $matchCount = null;

    /**
     * The HATEOAS reference for this buying option.
     *
     * @var string
     */
    public $refinementHref = null;
}
