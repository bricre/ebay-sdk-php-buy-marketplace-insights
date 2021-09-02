<?php

namespace Ebay\Buy\MarketplaceInsights\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

class ConvertedAmount extends AbstractModel
{
    /**
     * A three-letter ISO 4217 code that indicates the currency of the amount in the
     * convertedFromValue field. This value represents the pre-conversion currency. For
     * implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/buy/marketplace_insights/types/ba:CurrencyCodeEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $convertedFromCurrency = null;

    /**
     * The monetary amount before any conversion is performed, in the currency
     * specified by the convertedFromCurrency field. The value field contains the
     * converted amount of this value, in the currency specified by the currency field.
     *
     * @var string
     */
    public $convertedFromValue = null;

    /**
     * A three-letter ISO 4217 code that indicates the currency of the amount in the
     * value field. This value represents the post-conversion currency of the amount in
     * the value field. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/buy/marketplace_insights/types/ba:CurrencyCodeEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $currency = null;

    /**
     * The monetary value in the currency specified in the currency field.
     *
     * @var string
     */
    public $value = null;
}
