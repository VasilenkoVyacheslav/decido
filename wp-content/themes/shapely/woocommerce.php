<?php

get_header(); ?>
	<?php
                $slug = $_SERVER['REQUEST_URI'];
             $slug =  trim(str_replace('/', '', $slug));?>
<?php if(stripos($slug, 'shop')!==false){?>
<div id="filter-swither" class="closed-filters"><i class="fa fa-filter"></i> <span class="link to-close"><span class="xs-hide">Скрыть </span>фильтры</span><span class="link to-show"><span class="xs-hide">Показать </span>фильтры</span></div>
<?php }?>

	<div class="row">
	
            <?php if(stripos($slug, 'shop')!==false){
                $col_class='col-md-9 col-sm-8 mb-xs-24 ';
                ?>
            
		<aside id="secondary" class="widget-area col-md-3 col-sm-4" role="complementary">
                    
                    <div id="filters-wrapp">
                        <div id="close-filter"><i class="fa fa-long-arrow-left"></i><span>Скрыть фильтры</span></div>
			<?php dynamic_sidebar( 'shop-sidebar' ); ?>
                    </div>
                    <div id="overlay-filter"></div>
		</aside><!-- #secondary -->
            <?php }else{
                 $col_class='col-md-12 mb-xs-24';
                ?>
                
            <?php }?>
                <div id="primary" class="<?php print $col_class;?>">
			<?php woocommerce_content(); ?>
		</div><!-- #primary -->
	</div>
<?php
get_footer();
