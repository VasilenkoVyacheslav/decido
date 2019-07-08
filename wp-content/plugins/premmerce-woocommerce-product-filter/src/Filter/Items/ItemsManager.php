<?php namespace Premmerce\Filter\Filter\Items;

use Premmerce\Filter\Filter\Container;
use Premmerce\Filter\Filter\Items\Types\FilterInterface;
use Premmerce\Filter\Filter\Items\Types\PriceFilter;
use Premmerce\Filter\Filter\Items\Types\TaxonomyFilter;

class ItemsManager
{
    /**
     * @var FilterInterface[]
     */
    private $items = array();

    /**
     * @var array
     */
    private $taxonomyItems = array();

    /**
     * @var bool
     */
    private $hideEmpty = true;

    /**
     * @var null|array
     */
    private $activeFilters;

    /**
     * @var bool
     */
    private $prepared = false;

    /**
     * @var bool
     */
    private $showPriceFilter = false;

    /**
     * @var Container
     */
    private $container;

    /**
     * ItemsManager constructor.
     *
     * @param Container $container
     */
    public function __construct($container)
    {
        $this->container       = $container;
        $this->hideEmpty       = ! empty($settings['hide_empty']);
        $this->showPriceFilter = ! empty($settings['show_price_filter']);

        $this->loadItems();

        add_filter('woocommerce_is_filtered', array($this, 'isFiltered'));

        add_filter('posts_search', array($this, 'onPostsSearch'), 100, 2);
    }

    /**
     * @param $searchQuery
     * @param $wpQuery
     *
     * @return mixed
     */
    public function onPostsSearch($searchQuery, $wpQuery)
    {
        if ($wpQuery->is_search) {
            $this->container->getQueryHelper()->setSearchQuery($searchQuery);
        }

        return $searchQuery;
    }

    /**
     * @param $filtered
     *
     * @return bool
     */
    public function isFiltered($filtered)
    {
        foreach ($this->items as $item) {
            if ($item->isActive()) {
                return true;
            }
        }

        return $filtered;
    }

    /**
     * Get active items for 'Active filters widget'
     *
     * @return array
     */
    public function getActiveFilters()
    {
        if (is_null($this->activeFilters)) {
            $this->activeFilters = array();

            foreach ($this->getItems() as $item) {
                $this->activeFilters = array_merge($this->activeFilters, $item->getActiveItems());
            }
        }

        return $this->activeFilters;
    }

    /**
     * Get filter items for 'Filter widget'
     *
     * @return array
     */
    public function getFilters()
    {
        $filters = array();

        foreach ($this->getItems() as $item) {
            if ($item->isVisible()) {
                $filters[] = $item;
            }
        }

        return $filters;
    }

    /**
     * Prepare filter items
     */
    private function init()
    {
        $termTaxonomyIds = array();

        $productQuery = $this->container->getProductQuery();

        foreach ($this->taxonomyItems as $item) {
            foreach ($item->getTerms() as $term) {
                $termTaxonomyIds[] = $term->term_taxonomy_id;
            }
        }

        $allProducts  = $productQuery->getProductIdsByMainQuery(array_keys($this->taxonomyItems));
        $termProducts = $productQuery->getTermTaxonomyProductIds($termTaxonomyIds);


        foreach ($this->taxonomyItems as $item) {
            foreach ($item->getTerms() as $term) {
                if (isset($termProducts[$term->term_taxonomy_id])) {
                    $term->products = $termProducts[$term->term_taxonomy_id];
                }
            }
        }

        $taxonomyProducts = array();

        foreach ($this->taxonomyItems as $item) {
            if ($item->isActive()) {
                $taxonomyProducts[$item->getId()] = $item->getActiveProducts();
            }
        }

        foreach ($this->taxonomyItems as $itemKey => $item) {
            foreach ($item->getTerms() as $termKey => $term) {
                $term->count = $this->getTermCount($term, $allProducts, $taxonomyProducts);
            }
        }
    }

    /**
     * @param object $term
     * @param array $queriedProducts - products by main query
     *
     * @param array $queriedTaxonomyProducts - products by selected taxonomy terms
     *
     * @return int
     *
     */
    private function getTermCount($term, $queriedProducts, $queriedTaxonomyProducts)
    {
        if (empty($term->products) || empty($queriedProducts)) {
            return 0;
        }

        $products = array_intersect_key($term->products, $queriedProducts);

        if (empty($products)) {
            return 0;
        }

        if (empty($queriedTaxonomyProducts)) {
            return count($products);
        }

        foreach ($queriedTaxonomyProducts as $taxonomy => $taxonomyProducts) {
            if ($taxonomy !== $term->taxonomy) {
                $products = array_intersect_key($products, $taxonomyProducts);
            }
        }

        return count($products);
    }

    /**
     * Init filter items
     */
    private function loadItems()
    {
        $factory = $this->container->getItemFactory();

        $options = $this->container->getOption('items');

        $settings = $this->container->getOption('settings');

        $hideEmpty = ! empty($settings['hide_empty']);

        $items = array();
        foreach ($options as $key => $option) {
            if ($option['active']) {
                $option['hide_empty'] = $hideEmpty;
                $items[]              = $factory->createItem($key, $option);
            }
        }

        if (! empty($settings['show_price_filter'])) {
            array_unshift($items, new PriceFilter($this->container->getPriceQuery()));
        }

        $items = apply_filters('premmerce_filters_register_items', $items);

        foreach ($items as $item) {
            if ($item instanceof FilterInterface) {
                $this->items[$item->getId()] = $item;
                if ($item instanceof TaxonomyFilter) {
                    $this->taxonomyItems[$item->getId()] = $item;
                }
            }
        }
    }

    /**
     * @return FilterInterface[]
     */
    private function getItems()
    {
        if (! $this->prepared) {
            $this->prepared = true;
            $this->init();
        }

        return $this->items;
    }
}
