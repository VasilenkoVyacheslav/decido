<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shapely
 */
get_header();
?>
<?php $layout_class = shapely_get_layout_class(); ?>

<div id="primary">


        <div class="row">
            <?php if (is_active_sidebar('home-slider')) : ?>
            <div  class="col-md-7 col-lg-5 col-sm-9 col-xs-10  col-10">
                <div id="home-slider-outer">
                    <div id="home-slider">
    <?php dynamic_sidebar('home-slider'); ?>
                      
                    </div>
                    <div id="home-slider-nav">
                    <i class="fa fa-long-arrow-left arrow-left"></i><div class="home-slide-nav slider-nav"></div><i class="fa fa-long-arrow-right arrow-right"></i>
                    </div>
                  <a href="#popup-video" class="mfp-inline video-start"><i class="fa fa-play"></i></a>
                </div>
            </div>
             <?php endif; ?>
          
           
        </div>
    
   <div id="categories-wr" class="row">
    <?php 
$counts = get_terms( 'zavedenie', 'orderby=count&hide_empty=1' );
 foreach ( $counts as $count ) {
     $co[] = $count->count;
 }
rsort($co);

$last = $co[count($co)-1];
 $first  = ($co[0]);
 
 
 $kef = 200/$first;
 
?>
       

  <?php   $terms = get_terms( 'zavedenie', 'orderby=filter&hide_empty=1' );
    
  
  if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){    ?>
    <div class="row">
    <?php 
    $con = 0;
    foreach ( $terms as $term ) {
        
       switch ($con) {
    case 0:
      $cl = 'col-md-5 col-lg-5 col-sm-6 col-xs-6  col-6 col-md-offset-1 col-lg-offset-1 col-sm-offset-0 no-marg big-title';
        break;
    case 1:
       $cl = 'col-md-4 col-lg-4 col-sm-5 col-xs-6  col-6 col-md-offset-2 col-lg-offset-2  col-sm-offset-1 no-marg midle-title';
        break;
    case 2:
       $cl = 'col-md-3 col-lg-3 col-sm-4 col-xs-6  col-6  col-md-offset-1 col-lg-offset-1  col-sm-offset-0  small-title';
        break;
        case 3:
       $cl = 'col-md-4 col-lg-4 col-sm-5 col-xs-6  col-6  col-md-offset-1 col-lg-offset-1 col-sm-offset-1 midle-title';
        break;
        case 4:
       $cl = 'col-md-3 col-lg-3 col-sm-4 col-xs-6  col-6  col-md-offset-4 col-lg-offset-4 col-sm-offset-3 small-title';
        break;
        case 5:
       $cl = 'col-md-3 col-lg-3 col-sm-4 col-xs-6  col-6  col-md-offset-1 col-lg-offset-1 col-sm-offset-1 small-title';
        break;
     case 6:
   $cl = 'col-md-3 col-lg-3 col-sm-6 col-xs-6  col-6  col-md-offset-1 col-lg-offset-1  col-sm-offset-0 small-title';
        break;
        case 7:
      $cl = 'col-md-4 col-lg-4 col-sm-6 col-xs-6  col-6  col-md-offset-1 col-lg-offset-1 col-sm-offset-1 small-title';
        break;
     default: $cl = 'col-md-5 col-lg-5 col-sm-6 col-xs-6  col-6  pull-right small-title';
}
            
        
            if($con%2==0){
                print '</div><div class="row">';
            }
            $con++;
            if($con<7){
        ?>
        
        
        <div  class="term-item term-item-<?php print $con;?> <?php print $cl;?>">
            <a href="<?php print get_term_link( $term );?>">
                <?php if(z_taxonomy_image_url($term->term_id)){?>
             <img src="<?php echo z_taxonomy_image_url($term->term_id, 'termimage'); ?>" alt="<?php print $term->name; ?>" />
                <?php }?>
             <div class="text-ww">
            <h3><?php print $term->name; ?></h3>
            <span><?php print $term->count; ?> моделей</span>
             
            </div>
             <span class="watch-link"><span class="link">Смотреть</span></span>
            </a>
        </div>
        <?php //print_r($term);?>
    <?php
    }
    }
    ?>
    </div>
<?php } ?>
    

    
           <?php
              
                global $post;
                $args = array(
                    'numberposts' => 10,
                    'post_type' => 'project',
                    'order' => 'DESC',
                    'meta_query' => array(
        array(
            'key' => 'мы_гордимся',
            'value' => '1',
            'compare' => 'LIKE'
        )
)
                  
                );
                $reports = get_posts($args);
                ?>

    </div>
     <div id="zavedenie-wr" class="row">
         <div  class="row">
        <div class="zavedenie-title col-md-12 col-lg-12 col-sm-12 col-xs-12  col-12">
            <h2>Мы гордимся</h2>
        </div>
         </div>
         
  <div class="clearfix project-wrapp row">
      <div class="col-lg-5 col-lg-offset-2 col-md-6 col-md-offset-0  col-sm-6 col-sm-offset-0  col-xs-6 col-xs-offset-0">
    <?php
    $i=0;
    foreach ($reports as $post): ?>
  <?php setup_postdata($post); ?>
 <?php 
       $solution = get_field('решение');
      $location = get_field('локация');
                       
        if($i==2){
          print '</div><div class="col-lg-4 col-lg-offset-1  col-md-5 col-md-offset-1  col-sm-5 col-sm-offset-1  col-xs-5 col-xs-offset-1">';
        }
 ?>
                        <div class="project-item">
                        <a class="project-link" href="<?php the_permalink(); ?>">
                            <?php 
                            if($i==0){
                                   if (has_post_thumbnail()) {
                                the_post_thumbnail('project1');
                            }
                            }elseif($i==1){
                                   if (has_post_thumbnail()) {
                                the_post_thumbnail('project2');
                            }
                            }else{
                                   if (has_post_thumbnail()) {
                                the_post_thumbnail('project3');
                                
                            }
                            }?>
                             <span class="location"><?php print  $location;?></span>
                            <div class="project-text-wr">
                           
                            <h3><?php the_title();?></h3>
                            <p class="solution"><?php print  $solution;?></p>
                        </div>
                            <?php
                            $i++;
                            ?>
                        </a>
                            </div>
  <?php endforeach; ?>
      
      <div class="project-item project-item-more">
                        <div class="project-link-w">
                            <div class="project-text-wr-w">
                            <h3>Владелец<br /> ресторана?<br /> Гостиницы?<br /> Или дизайнер?</h3>
                            <p class="description-2">Decido сотрудничает со многим, присоединяйтесь</p>
                        </div>
                            <div class="pr-footer">
                                <a href="#"  class="link white-line">Подробнее о сотрудничестве</a>
                            </div>
                            <div class="pr-footer-2">
                                <a href="#" class="link">Смотреть все проекты</a>
                            </div>
                        </div>
                            </div>
 
                <?php wp_reset_postdata(); ?>
      </div>
 </div>
         
         
          <div class="clearfix project-wrapp-mobile row">
              <div id="project-carousel">
    <?php
    foreach ($reports as $post): ?>
  <?php setup_postdata($post); ?>
 <?php 
       $solution = get_field('решение');
      $location = get_field('локация');

 ?>
                        <div class="project-item">
                        <a class="project-link" href="<?php the_permalink(); ?>">
                            <?php 
                            if($i==0){
                                   if (has_post_thumbnail()) {
                                the_post_thumbnail('project1');
                            }
                            }elseif($i==1){
                                   if (has_post_thumbnail()) {
                                the_post_thumbnail('project2');
                            }
                            }else{
                                   if (has_post_thumbnail()) {
                                the_post_thumbnail('project3');
                                
                            }
                            }?>
                             <span class="location"><?php print  $location;?></span>
                            <div class="project-text-wr">
                           
                            <h3><?php the_title();?></h3>
                            <p class="solution"><?php print  $solution;?></p>
                        </div>
                            <?php
                            $i++;
                            ?>
                        </a>
                            </div>
  <?php endforeach; ?>
      </div>
      <div class="project-item project-item-more">
                        <div class="project-link-w">
                            <div class="project-text-wr-w">
                            <h3>Владелец<br /> ресторана?<br /> Гостиницы?<br /> Или дизайнер?</h3>
                            <p class="description-2">Decido сотрудничает со многим, присоединяйтесь</p>
                        </div>
                            <div class="pr-footer">
                                <a href="#" class="link">Подробнее о сотрудничестве</a>
                            </div>
                            <div class="pr-footer-2">
                                <a href="/project" class="link">Смотреть все проекты</a>
                            </div>
                        </div>
                            </div>
 
                <?php wp_reset_postdata(); ?>
   
 </div>


</div><!-- #primary -->

<div class="hidden hide">
    <div id="popup-video">
         <?php if (is_active_sidebar('home-video-popup')) : ?>
            <?php dynamic_sidebar('home-video-popup'); ?>
         <?php endif;?>
    </div>
    
</div>






<?php
get_footer();
