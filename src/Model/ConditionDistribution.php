<?php

namespace Ebay\Buy\MarketplaceInsights\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * The container that defines the fields for the conditions refinements. This
 * container is returned when fieldgroups is set to CONDITION_REFINEMENTS or FULL
 * in the request.
 */
class ConditionDistribution extends AbstractModel
{
    /**
     * The text describing the condition of the item, such as New or Used. For a list
     * of condition names, see ConditionEnum. Code so that your app gracefully handles
     * any future changes to this list.
     *
     * @var string
     */
    public $condition = null;

    /**
     * The identifier of the condition. For example, 1000 is the identifier for NEW.
     *
     * @var string
     */
    public $conditionId = null;

    /**
     * The number of items having the condition.
     *
     * @var int
     */
    public $matchCount = null;

    /**
     * The HATEOAS reference of this condition.
     *
     * @var string
     */
    public $refinementHref = null;
}
