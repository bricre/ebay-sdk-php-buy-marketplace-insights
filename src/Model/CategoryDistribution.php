<?php

namespace Ebay\Buy\MarketplaceInsights\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * The container that defines the fields for the category refinements. This
 * container is returned when fieldgroups is set to CATEGORY_REFINEMENTS or FULL in
 * the request.
 */
class CategoryDistribution extends AbstractModel
{
    /**
     * The identifier of the category.
     *
     * @var string
     */
    public $categoryId = null;

    /**
     * The name of the category, such as Baby &amp; Toddler Clothing.
     *
     * @var string
     */
    public $categoryName = null;

    /**
     * The number of items in this category.
     *
     * @var int
     */
    public $matchCount = null;

    /**
     * The HATEOAS reference of this category.
     *
     * @var string
     */
    public $refinementHref = null;
}
