<?php

namespace Ebay\Buy\MarketplaceInsights\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * The container that defines the fields for the conditions refinements. This
 * container is returned when fieldgroups is set to ASPECT_REFINEMENTS or FULL in
 * the request.
 */
class AspectValueDistribution extends AbstractModel
{
    /**
     * The value of an aspect. For example, Red is a value for the aspect Color.
     *
     * @var string
     */
    public $localizedAspectValue = null;

    /**
     * The number of items with this aspect.
     *
     * @var int
     */
    public $matchCount = null;

    /**
     * A HATEOAS reference for this aspect.
     *
     * @var string
     */
    public $refinementHref = null;
}
