<?php namespace Premmerce\Filter\Admin\Tabs;

use Premmerce\Filter\Admin\Tabs\Base\BaseSettings;

class Settings extends BaseSettings
{
    /**
     * @var string
     */
    protected $page = 'premmerce-filter-admin-settings';

    /**
     * @var string
     */
    protected $group = 'premmerce_filter';

    /**
     * @var string
     */
    protected $optionName = 'premmerce_filter_settings';

    /**
     * Register hooks
     */
    public function init()
    {
        add_action('admin_init', array($this, 'initSettings'));
    }

    /**
     * Init settings
     */
    public function initSettings()
    {
        register_setting($this->group, $this->optionName);

        $settings = array(
            'behavior'      => array(
                'label'  => __('Behavior', 'premmerce-filter'),
                'fields' => array(
                    'hide_empty'        => array(
                        'type'  => 'checkbox',
                        'label' => __('Hide empty terms', 'premmerce-filter'),
                    ),
                    'show_price_filter' => array(
                        'type'  => 'checkbox',
                        'label' => __('Show price filter', 'premmerce-filter'),
                    ),
                ),
            ),
            'show_on_pages' => array(
                'label'  => __('Show filter on pages', 'premmerce-filter'),
                'fields' => array(
                    'product_cat'   => array(
                        'type'  => 'checkbox',
                        'label' => __('Product category', 'premmerce-filter'),
                    ),
                    'tag'           => array(
                        'type'  => 'checkbox',
                        'label' => __('Tag', 'premmerce-filter'),
                    ),
                    'product_brand' => array(
                        'type'  => 'checkbox',
                        'label' => __('Brand', 'premmerce-filter'),
                    ),
                    'search'        => array(
                        'type'  => 'checkbox',
                        'label' => __('Search', 'premmerce-filter'),
                    ),
                    'shop'          => array(
                        'type'  => 'checkbox',
                        'label' => __('Store', 'premmerce-filter'),
                    ),
                    'attribute'     => array(
                        'type'  => 'checkbox',
                        'label' => __('Attribute', 'premmerce-filter'),
                    ),
                ),
            ),

        );

        $this->registerSettings($settings, $this->page, $this->optionName);
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return __('Settings', 'premmerce-filter');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'settings';
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return true;
    }
}
