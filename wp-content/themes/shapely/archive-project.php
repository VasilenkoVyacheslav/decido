<?php
/**
 * The template for displaying archive pages.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shapely
 */
get_header();
?>
<?php $layout_class = shapely_get_layout_class(); ?>

<div class="row">
    <div id="header-title" class="archive-project col-lg-12 col-md-12 mb-xs-24 <?php echo esc_attr($layout_class); ?>">
        <h1>Наши проекты</h1>
    </div>
</div>
<div class="row  text-center">
    <div class="monsonry-container">
        <?php

// query
$the_query = new WP_Query(array(
	'post_type'			=> 'project',
	'posts_per_page'	=> 8,
	'meta_key'			=> 'мы_гордимся',
	'orderby'			=> 'meta_value',
	'order'				=> 'DESC'
));

        if ($the_query->have_posts()) :
while (  $the_query->have_posts() ) {
		 $the_query->the_post(); ?>
    

          <?php get_template_part('template-parts/content', 'project');?>

          <?php   
            } // end while?>
            
            <?php misha_paginator( get_pagenum_link() );?>
</div>
    
           
<?php         endif;       ?>


</div>
<?php
get_footer();
