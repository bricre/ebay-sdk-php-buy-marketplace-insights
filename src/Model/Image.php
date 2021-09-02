<?php

namespace Ebay\Buy\MarketplaceInsights\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * Type the defines the details of an image, such as size and image URL. Currently
 * only imageUrl is populated. The height and width were added for future use.
 */
class Image extends AbstractModel
{
    /**
     * Reserved for future use.
     *
     * @var int
     */
    public $height = null;

    /**
     * The URL of the image.
     *
     * @var string
     */
    public $imageUrl = null;

    /**
     * Reserved for future use.
     *
     * @var int
     */
    public $width = null;
}
