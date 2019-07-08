<?php namespace Premmerce\Filter\Filter\Query;

class PriceQuery
{
    /**
     * @var QueryHelper
     */
    private $queryHelper;

    /**
     * PriceQuery constructor.
     *
     * @param QueryHelper $queryHelper
     */
    public function __construct($queryHelper)
    {
        $this->queryHelper = $queryHelper;
    }

    /**
     * @var array
     */
    private $prices;

    /**
     * @return array
     */
    public function getPrices()
    {
        if (is_null($this->prices)) {
            global $wpdb;

            $metaQuery = $this->queryHelper->getMetaQuerySql(array('price_filter'));
            $taxQuery  = $this->queryHelper->getTaxQuerySql();

            $sql[] = "SELECT min( FLOOR( price_meta.meta_value ) ) as min, max( CEILING( price_meta.meta_value ) ) as max";
            $sql[] = "FROM {$wpdb->posts}";
            $sql[] = "LEFT JOIN {$wpdb->postmeta} as price_meta ON {$wpdb->posts}.ID = price_meta.post_id";
            $sql[] = $taxQuery['join'];
            $sql[] = $metaQuery['join'];
            $sql[] = $this->queryHelper->getPostWhereQuery();
            $sql[] = "AND price_meta.meta_key = '_price'";
            $sql[] = "AND price_meta.meta_value > ''";
            $sql[] = $taxQuery['where'];
            $sql[] = $metaQuery['where'];
            $sql[] = $this->queryHelper->getSearchQuery();

            $sql = implode(' ', $sql);

            $prices = $wpdb->get_row($sql, ARRAY_A) ?: array();

            $prices['min']          = apply_filters('woocommerce_price_filter_widget_min_amount', floor($prices['min']));
            $prices['max']          = apply_filters('woocommerce_price_filter_widget_max_amount', ceil($prices['max']));
            $prices['min_selected'] = $prices['min'];
            $prices['max_selected'] = $prices['max'];

            $values = $this->getSelectedValues();

            $this->prices = array_merge($prices, $values);
        }

        return $this->prices;
    }

    public function getSelectedValues()
    {
        $values = array();

        if (isset($_GET['min_price'])) {
            $values['min_selected'] = intval($_GET['min_price']);
        }
        if (isset($_GET['max_price'])) {
            $values['max_selected'] = intval($_GET['max_price']);
        }

        return $values;
    }
}
