<?php

namespace Ebay\Buy\MarketplaceInsights\Api;

use Ebay\Buy\MarketplaceInsights\Model\SalesHistoryPagedCollection as SalesHistoryPagedCollection;
use OpenAPI\Runtime\AbstractAPI as AbstractAPI;

class ItemSales extends AbstractAPI
{
    /**
     * (Limited Release) This method searches for sold eBay items by various URI query
     * parameters and retrieves the sales history of the items for the last 90 days.
     * You can search by keyword, category, eBay product ID (ePID), or GTIN, or a
     * combination of these. This method also supports the following: Filtering by the
     * value of one or multiple fields, such as listing format, item condition, price
     * range, location, and more. For the fields supported by this method, see the
     * filter parameter. Retrieving the refinements (metadata) of an item , such as
     * item aspects (color, brand), condition, category, etc. using the fieldgroups
     * parameter. Filtering by item aspects and other refinements using the
     * aspect_filter parameter. Creating aspects histograms, which enables shoppers to
     * drill down in each refinement narrowing the search results. For details and
     * examples of these capabilities, see Browse API in the Buying Integration Guide.
     * Pagination and sort controls There are pagination controls (limit and offset
     * fields) and sort query parameters that control/sort the data that is returned.
     * By default, the results are sorted by &quot;Best Match&quot;. For more
     * information about Best Match, see the eBay help page Best Match. URLs for this
     * method Production URL:
     * https://api.ebay.com/buy/marketplace_insights/v1_beta/item_sales/search? Sandbox
     * URL:
     * https://api.sandbox.ebay.com/buy/marketplace_insights/v1_beta/item_sales/search?
     * Request headers You will want to use the X-EBAY-C-ENDUSERCTX request header with
     * this method. If you are an eBay Network Partner you must use
     * affiliateCampaignId=ePNCampaignId,affiliateReferenceId=referenceId in the header
     * in order to be paid for selling eBay items on your site . For details see,
     * Request headers in the Buy APIs Overview. URL Encoding for Parameters Query
     * parameter values need to be URL encoded. For details, see URL encoding query
     * parameter values. Restrictions For a list of supported sites and other
     * restrictions, see API Restrictions.
     *
     * @param array $queries options:
     *                       'aspect_filter'	string	This field lets you filter by item aspects. The aspect
     *                       name/value pairs and category, which is required, is used to limit the results
     *                       to specific aspects of the item. For example, in a clothing category one aspect
     *                       pair would be Color/Red. The results are returned in the refinement container.
     *                       For example, the method below uses the category ID for Women's Clothing. This
     *                       will return only sold items for a woman's red or blue shirt.
     *                       /buy/marketplace_insights/v1_beta/item_sales/search?q=shirt&amp;category_ids=15724&amp;aspect_filter=categoryId:15724,Color:{Red|Blue}
     *                       To get a list of the aspects pairs and the category, which is returned in the
     *                       dominantCategoryId field, set fieldgroups to ASPECT_REFINEMENTS.
     *                       /buy/marketplace_insights/v1_beta/item_sales/search?q=shirt&amp;category_ids=15724&amp;fieldgroups=ASPECT_REFINEMENTS
     *                       Format: aspectName:{value1|value2} Required: The category ID is required twice;
     *                       once as a URI parameter and as part of the aspect_filter parameter. For
     *                       implementation help, refer to eBay API documentation at
     *                       https://developer.ebay.com/api-docs/buy/marketplace_insights/types/gct:AspectFilter
     *                       'category_ids'	string	The category ID is required and is used to limit the
     *                       results. For example, if you search for 'shirt' the result set will be very
     *                       large. But if you also include the category ID 137084, the results will be
     *                       limited to 'Men's Athletic Apparel'. For example:
     *                       /buy/marketplace-insights/v1_beta/item_sales/search?q=shirt&amp;category_ids=137084
     *                       The list of eBay category IDs is not published and category IDs are not the same
     *                       across all the eBay marketplaces. You can use the following techniques to find a
     *                       category by site: For the US marketplace, use the Category Changes page. Use the
     *                       Taxonomy API. For details see Get Categories for Buy APIs. Usage: This field can
     *                       have one category ID or a comma separated list of IDs. You can use category_ids
     *                       by itself or use it with any combination of the gtin, epid, and q fields, which
     *                       gives you additional control over the result set. Restrictions: Partners will be
     *                       given a list of categories they can use. To use a top-level (L1) category, you
     *                       must also include the q, or gtin, or epid query parameter. Maximum number of
     *                       categories: 4
     *                       'epid'	string	The ePID is the eBay product identifier of a product from the eBay
     *                       product catalog. This field limits the results to only items in the specified
     *                       ePID.
     *                       /buy/marketplace-insights/v1_beta/item_sales/search?epid=241986085&amp;category_ids=168058
     *                       You can use the product_summary/search method in the Catalog API to search for
     *                       the ePID of the product. Required: At least 1 category_ids Maximum: 1 epid
     *                       Optional: Any combination of epid, gtin, or q
     *                       'fieldgroups'	string	This field lets you control what is to be returned in the
     *                       response and accepts a comma separated list of values. The default is
     *                       MATCHING_ITEMS, which returns the items that match the keyword or category
     *                       specified. The other values return data that can be used to create histograms.
     *                       For code examples see, aspect_filter. Valid Values: ASPECT_REFINEMENTS - This
     *                       returns the aspectDistributions container, which has the dominantCategoryId,
     *                       matchCount, and refinementHref for the various aspects of the items found. For
     *                       example, if you searched for 'Mustang', some of the aspect would be Model Year,
     *                       Exterior Color, Vehicle Mileage, etc. Note: ASPECT_REFINEMENTS are category
     *                       specific. BUYING_OPTION_REFINEMENTS - This returns the buyingOptionDistributions
     *                       container, which has the matchCount and refinementHref for AUCTION and
     *                       FIXED_PRICE (Buy It Now) items. Note: Classified items are not supported.
     *                       CATEGORY_REFINEMENTS - This returns the categoryDistributions container, which
     *                       has the categories that the item is in. CONDITION_REFINEMENTS - This returns the
     *                       conditionDistributions container, such as NEW, USED, etc. Within these groups
     *                       are multiple states of the condition. For example, New can be New without tag,
     *                       New in box, New without box, etc. MATCHING_ITEMS - This is meant to be used with
     *                       one or more of the refinement values above. You use this to return the specified
     *                       refinements and all the matching items. FULL - This returns all the refinement
     *                       containers and all the matching items. Code so that your app gracefully handles
     *                       any future changes to this list. Default: MATCHING_ITEMS
     *                       'filter'	string	This field supports multiple field filters that can be used to
     *                       limit/customize the result set. The following lists the supported filters. For
     *                       details and examples for all the filters, see Buy API Field Filters.
     *                       buyingOptions conditionIds conditions itemLocationCountry lastSoldDate price
     *                       priceCurrency The following example filters the result set by price. Note: To
     *                       filter by price, price and priceCurrency must always be used together.
     *                       /buy/marketplace-insights/v1_beta/item_sales/search?q=iphone&amp;category_ids=15724&amp;filter=price:[50..500],priceCurrency:USD
     *                       For implementation help, refer to eBay API documentation at
     *                       https://developer.ebay.com/api-docs/buy/marketplace_insights/types/cos:FilterField
     *                       'gtin'	string	This field lets you search by the Global Trade Item Number of the
     *                       item as defined by https://www.gtin.info. This can be a UPC (Universal Product
     *                       Code), EAN (European Article Number), or an ISBN (International Standard Book
     *                       Number) value.
     *                       /buy/marketplace-insights/v1_beta/item_sales/search?gtin=241986085&amp;category_ids=9355
     *                       Required: At least 1 category_ids Maximum: 1 gtin Optional: Any combination of
     *                       epid, gtin, or q
     *                       'limit'	string	The number of items, from the result set, returned in a single
     *                       page. Default: 50 Maximum number of items per page (limit): 200 Maximum number
     *                       of items in a result set: 10,000
     *                       'offset'	string	Specifies the number of items to skip in the result set. This is
     *                       used with the limit field to control the pagination of the output. If offset is
     *                       0 and limit is 10, the method will retrieve items 1-10 from the list of items
     *                       returned, if offset is 10 and limit is 10, the method will retrieve items 11
     *                       thru 20 from the list of items returned. Valid Values: 0-10,000 (inclusive)
     *                       Default: 0 Maximum number of items returned: 10,000
     *                       'q'	string	A string consisting of one or more keywords that are used to search
     *                       for items on eBay. The keywords are handled as follows: If the keywords are
     *                       separated by a comma, it is treated as an AND. In the following example, the
     *                       query returns items that have iphone AND ipad.
     *                       /buy/marketplace-insights/v1_beta/item_sales/search?q=iphone,ipad&amp;category_ids=15724
     *                       If the keywords are separated by a space, it is treated as an OR. In the
     *                       following examples, the query returns items that have iphone OR ipad.
     *                       /buy/marketplace-insights/v1_beta/item_sales/search?q=iphone&amp;category_ids=15724&nbsp;ipad
     *                       /buy/marketplace-insights/v1_beta/item_sales/search?q=iphone,&nbsp;ipad&amp;category_ids=15724
     *                       Restriction: The * wildcard character is not allowed in this field. Required: At
     *                       least 1 category_ids Optional: Any combination of epid, gtin, or q
     *                       'sort'	string	This field specifies the order and the field name to use to sort
     *                       the items. To sort in descending order use - before the field name. Currently,
     *                       you can only sort by price (in ascending or descending order). If no sort
     *                       parameter is submitted, the result set is sorted by &quot;Best Match&quot;. The
     *                       following are examples of using the sort query parameter. Sort Result
     *                       &amp;sort=price Sorts by price in ascending order (lowest price first)
     *                       &amp;sort=-price Sorts by price in descending order (highest price first)
     *                       Default: ascending For implementation help, refer to eBay API documentation at
     *                       https://developer.ebay.com/api-docs/buy/marketplace_insights/types/cos:SortField
     *
     * @return SalesHistoryPagedCollection
     */
    public function search(array $queries = []): SalesHistoryPagedCollection
    {
        return $this->client->request('search', 'GET', 'item_sales/search',
            [
                'query' => $queries,
            ]
        );
    }
}
