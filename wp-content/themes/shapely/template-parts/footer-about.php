<?php
/**
 * The Sidebar widget area for footer.
 *
 * @package shapely
 */
?>





<?php
// If footer sidebars do not have widget let's bail.

if (!is_active_sidebar('footer-widget-1') && !is_active_sidebar('footer-widget-2') && !is_active_sidebar('footer-widget-3') && !is_active_sidebar('footer-widget-4')) {
  return;
}
// If we made it this far we must have widgets.
?>





<div class="footer-widget-area">
  <?php if (is_active_sidebar('footer-widget-1')) : ?>
    <div id="top-footer">
      <div class="container footer-inner">
        <div id='top-footer-block'  class="row">
          <div class="col-lg-5 col-sm-8 col-xs-12 col-12">
            <?php dynamic_sidebar('footer-widget-1'); ?>
          </div>
        </div>

        <div id='top-footer-promo' class="row">
          <?php if (is_active_sidebar('footer-widget-11')) : ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
              <?php dynamic_sidebar('footer-widget-11'); ?>
            </div>
          <?php endif; ?>
          <?php if (is_active_sidebar('footer-widget-12')) : ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
              <?php dynamic_sidebar('footer-widget-12'); ?>
            </div>
          <?php endif; ?>
          <?php if (is_active_sidebar('footer-widget-13')) : ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
              <?php dynamic_sidebar('footer-widget-13'); ?>
            </div>
          <?php endif; ?>
          <?php if (is_active_sidebar('footer-widget-14')) : ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6  ">
              <?php dynamic_sidebar('footer-widget-14'); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>



      <div id='mounts-img'>
        <img id='mounts' src='<?php echo get_template_directory_uri(); ?>/images/Mountains_1.svg' alt='' />
        <img id='seed' src='<?php echo get_template_directory_uri(); ?>/images/Seed.svg' alt='' />
        <!--<div id="sun-wr" class="container">
            <div class="row">
        <img id='sun' src='<?php echo get_template_directory_uri(); ?>/images/Sun.svg' alt='' />
            </div>
        </div>-->
      </div>

    </div><!-- .widget-area .first -->
  <?php endif; ?>


  <div id="bottom-about-footer">
    <div class="container">
      <div id="expert-section">
        <div  class="row">
          <div class="zavedenie-title col-md-12 col-lg-12 col-sm-12 col-xs-12  col-12">
            <h2>Команда</h2>
          </div>
        </div>
        <?php
        global $post;
        $args = array(
            'numberposts' => 0,
            'post_type' => 'expert',
            'order' => 'DESC',
        );
        $reports = get_posts($args);
        ?>
        <div class="clearfix expert-wrapp-slick">
        <?php foreach ($reports as $post): ?>

            <?php setup_postdata($post); ?>

            <div class="expert-item">
              <span class="expert-link">
              <?php
              if (has_post_thumbnail()) {
                the_post_thumbnail('expert');
              }
              ?>
              </span>
              <div class="expert-text">
                <?php $job = get_field('должность'); ?>
                <h4><?php the_title(); ?></h4>
                <span><?php print $job; ?></span>
              </div>
            </div>

<?php endforeach; ?>
        </div>
          <?php wp_reset_postdata(); ?>
      </div>


      <!-- -->
      
<?php
global $post;
$args = array(
    'numberposts' => 1,
    'post_type' => 'about',
    'order' => 'DESC',
);
$about = get_posts($args);
?>
       <?php foreach ($about as $post): ?>
<div id="production-wrapp" class="row">
  <div  class="row">
          <div class="zavedenie-title col-md-12 col-lg-12 col-sm-12 col-xs-12  col-12">
            <h2>Производство</h2>
          </div>
        </div>
  <div class="clearfix project-wrapp row">
     
<div class="col-lg-5 col-lg-offset-2 col-md-6 col-md-offset-0  col-sm-6 col-sm-offset-0  col-xs-6 col-xs-offset-0">
        <?php setup_postdata($post); ?>
        <?php
// check if the repeater field has rows of data
        if (have_rows('production')):
$i=0;
        $count =count(get_field('production'));
          // loop through the rows of data
          while (have_rows('production')) : the_row();

            // display a sub field value
            
            $image = get_sub_field('изображение');
            $src = wp_get_attachment_image_src($image['id'], 'project');
            if ($i == ceil($count/2)) {
                print '</div><div class="col-lg-4 col-lg-offset-1  col-md-5 col-md-offset-1  col-sm-5 col-sm-offset-1  col-xs-5 col-xs-offset-1">';
              }
            ?>
  
  
   <div class="project-item">
     <?php if(get_sub_field('видео')){?>
     <div class="hidden hide">
     <div id="production-video-<?php print $i;?>" >
            <?php the_sub_field('видео');?>
       </div>
       </div>
     <a href="#production-video-<?php print $i;?>" class="mfp-inline play-mfp-button"><i class="fa fa-play-circle"></i></a>
     <?php }?>
            <img src="<?php echo $src[0]; ?>" alt="<?php echo $image['alt'] ?>" />
</div>
            <?php
    $i++;
          endwhile;

        endif;
        ?>
             </div>
            </div>
  
  <div class="clearfix project-wrapp-mobile row">
     
<div id="production-carousel">
        <?php setup_postdata($post); ?>
        <?php
// check if the repeater field has rows of data
        if (have_rows('production')):
$i=0;
        $count =count(get_field('production'));
          // loop through the rows of data
          while (have_rows('production')) : the_row();

            // display a sub field value
            
            $image = get_sub_field('изображение');
            $src = wp_get_attachment_image_src($image['id'], 'project4');
     
            ?>
  
  
   <div class="project-item">
     <?php if(get_sub_field('видео')){?>
     <div class="hidden hide">
     <div id="production-video-<?php print $i;?>" >
            <?php the_sub_field('видео');?>
       </div>
       </div>
     <a href="#production-video-<?php print $i;?>" class="mfp-inline play-mfp-button"><i class="fa fa-play-circle"></i></a>
     <?php }?>
            <img src="<?php echo $src[0]; ?>" alt="<?php echo $image['alt'] ?>" />
</div>
            <?php
    $i++;
          endwhile;

        endif;
        ?>
             </div>
            </div>
</div>

      
      
      <div id="sertificats" class="row">
        <div  class="row">
          <div class="zavedenie-title col-md-12 col-lg-12 col-sm-12 col-xs-12  col-12">
            <h2>Награды и сертификаты</h2>
          </div>
        </div>
        <div id="sertificats-slick" class="row">
        <?php
// check if the repeater field has rows of data
        $counter=0;
        if (have_rows('награды_и_сертификаты')):

          // loop through the rows of data
          while (have_rows('награды_и_сертификаты')) : the_row();
              if($counter%2==0){
                $u=3;
              }else{
                $u=4;
              }
            // display a sub field value
            $image = get_sub_field('фото');
            $src = wp_get_attachment_image_src($image['id'], 'sertificat');
            ?>
                <div class="img-item col-lg-<?php print $u;?> col-md-<?php print $u;?> col-sm-<?php print $u;?> col-xs-12">
                  <img src="<?php echo $src[0]; ?>" alt="<?php echo $image['alt'] ?>" />
                </div>
            <?php
             $counter++;
          endwhile;

        endif;
        ?>
      </div>
            </div>
      <?php endforeach; ?>
            
      <!-- -->

      <div id="zavedenie-wr" class="row">
        <div  class="row">
          <div class="zavedenie-title col-md-12 col-lg-12 col-sm-12 col-xs-12  col-12">
            <h2>Мы гордимся</h2>
          </div>
        </div>

        <div class="clearfix project-wrapp row">
          <div class="col-lg-5 col-lg-offset-2 col-md-6 col-md-offset-0  col-sm-6 col-sm-offset-0  col-xs-6 col-xs-offset-0">
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
            <?php
            $i = 0;
            foreach ($reports as $post):
              ?>
              <?php setup_postdata($post); ?>
              <?php
              $solution = get_field('решение');
              $location = get_field('локация');

              if ($i == 2) {
                print '</div><div class="col-lg-4 col-lg-offset-1  col-md-5 col-md-offset-1  col-sm-5 col-sm-offset-1  col-xs-5 col-xs-offset-1">';
              }
              ?>
              <div class="project-item">
                <a class="project-link" href="/project#project-<?php the_ID();?>">
              <?php
              if ($i == 0) {
                if (has_post_thumbnail()) {
                  the_post_thumbnail('project1');
                }
              } elseif ($i == 1) {
                if (has_post_thumbnail()) {
                  the_post_thumbnail('project2');
                }
              } else {
                if (has_post_thumbnail()) {
                  the_post_thumbnail('project3');
                }
              }
              ?>
                  <span class="location"><?php print $location; ?></span>
                  <div class="project-text-wr">

                    <h3><?php the_title(); ?></h3>
                    <p class="solution"><?php print $solution; ?></p>
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

<?php foreach ($reports as $post): ?>
  <?php setup_postdata($post); ?>
  <?php
  $solution = get_field('решение');
  $location = get_field('локация');
  ?>
              <div class="project-item">
                <a class="project-link" href="/project#project-<?php the_ID();?>">
  <?php
    if (has_post_thumbnail()) {
      the_post_thumbnail('project3');
    }
  ?>
                  <span class="location"><?php print $location; ?></span>
                  <div class="project-text-wr">

                    <h3><?php the_title(); ?></h3>
                    <p class="solution"><?php print $solution; ?></p>
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
    </div>
  </div>

<?php if ((is_active_sidebar('footer-showrooms') ) && (is_active_sidebar('footer-map'))) : ?>
    <div id="map-footer">
      <div class="container footer-inner">
        <div id="map-wrapp"  class="row ">
            <?php if (is_active_sidebar('footer-showrooms')) : ?>
            <div id="rooms-wrapp" class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
              <h3>Наши шоурумы</h3>
    <?php dynamic_sidebar('footer-showrooms'); ?>
            </div>
  <?php endif; ?>
  <?php if (is_active_sidebar('footer-map')) : ?>
            <div id="maps-wrapp"  class="col-lg-8 col-md-8 col-sm-7 col-sm-push-0 col-xs-10 col-xs-push-2">
    <?php dynamic_sidebar('footer-map'); ?>
            </div>
    <?php endif; ?>
        </div></div></div>
<?php endif; ?>

        <?php if (is_active_sidebar('footer-widget-31')) : ?>
    <div id="middle-2-footer">
      <div class="container footer-inner">
        <div  class="row row-1">
          <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12"></div>
          <div id="maps-wrapp-bottom"  class="col-lg-8 col-md-8 col-sm-7 col-sm-push-0 col-xs-10 col-xs-push-2"></div>
        </div>
        <div  class="row row-2">
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-mini-12">
          <?php dynamic_sidebar('footer-widget-31'); ?>
          </div>
    <?php if (is_active_sidebar('footer-widget-32')) : ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-mini-6">
      <?php dynamic_sidebar('footer-widget-32'); ?>
            </div>
  <?php endif; ?>
  <?php if (is_active_sidebar('footer-widget-33')) : ?>
            <div class="col-lg-3 col-md-2 col-sm-6 col-xs-6 col-mini-6">
    <?php dynamic_sidebar('footer-widget-33'); ?>
            </div>
  <?php endif; ?>
  <?php if (is_active_sidebar('footer-widget-34')) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-mini-12">
              <?php dynamic_sidebar('footer-widget-34'); ?>
            </div>
          <?php endif; ?>	
        </div>
      </div>
    </div><!-- .widget-area .third -->
        <?php endif; ?>

          <?php if (is_active_sidebar('footer-widget-4')) : ?>
    <div class="col-md-3 col-sm-6 footer-widget" role="complementary">
          <?php dynamic_sidebar('footer-widget-4'); ?>
    </div><!-- .widget-area .third -->
        <?php endif; ?>
</div>
