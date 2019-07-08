<?php

if ( ! defined('ABSPATH')) {
    exit;
}

/**
 * @var array $activeFilters
 * @var array $args
 * @var array $instance
 */

?>

<?php echo $args['before_widget']; ?>

<?php if ( ! empty($instance['title'])): ?>
    <?php echo $args['before_title'] . $instance['title'] . $args['after_title'] ?>
<?php endif; ?>

<div class="pc-active-filter">
    <div class="pc-active-filter__list">
        <?php foreach ($activeFilters as $item): ?>

            <?php do_action('premmerce_filter_render_active_item_before', $item); ?>

            <div class="pc-active-filter__list-item">
                <a class="pc-active-filter__item-link" rel="nofollow"
                   aria-label="<?= esc_attr__('Remove filter', 'woocommerce') ?>" href="<?= $item['link'] ?>">
                    <span class="pc-active-filter__item-text-el">
                        <?php echo apply_filters('premmerce_filter_render_active_item_title', $item['title']) ?>
                    </span>
                    <span class="pc-active-filter__item-delete">
                        <?php echo apply_filters('premmerce_filter_render_active_item_close', 'x') ?>
                    </span>
                </a>
            </div>

            <?php do_action('premmerce_filter_render_active_item_after', $item); ?>

        <?php endforeach; ?>
    </div>
</div>

<?php echo $args['after_widget']; ?>
