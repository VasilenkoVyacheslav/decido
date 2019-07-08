<?php
/**
 * Template part for displaying posts.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shapely
 */

$object = get_field('object');
$location = get_field('локация');
$desigion = get_field('решение');
$facebook = get_field('facebook');
$twitter = get_field('twitter');
$pint = get_field('pint');

?>
<article id="project-<?php the_ID(); ?>" <?php post_class( 'project-post project-content post-content post-grid-wide' ); ?>>
	<header class="entry-header nolist">
		<?php
		if ( has_post_thumbnail() ) {
                                        $size = 'shapely-full';
                                        $image = get_the_post_thumbnail( get_the_ID(), $size );
	
		?>
            
<?php echo $image; ?>

		<?php	}// End if().	?>
	</header><!-- .entry-header -->
	<div class="entry-project-content">
		
			<h2 class="post-title entry-title">
				<?php echo  get_the_title(); ?>
			</h2>
            <?php if($object){?>
            <div class="proj-item">
                <div class="proj-label">Объект</div>
                <div class="proj-text">
		<?php print  $object; ?>
                </div>
            </div>
            <?php }?>
            <?php if($location){?>
            <div class="proj-item">
                <div class="proj-label">Локация</div>
                <div class="proj-text">
		<?php print  $location; ?>
                </div>
            </div>
            <?php }?>
            <?php if($desigion){?>
            <div class="proj-item">
                <div class="proj-label">Решение</div>
                <div class="proj-text">
		<?php print  $desigion; ?>
                </div>
            </div>
            <?php }?>
                    

			<div class="project-content-text <?php echo $dropcaps ? 'dropcaps-content' : ''; ?>">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'shapely' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>
            <div class="social-wrapp">
                <ul>
                    <?php if($facebook){?>
                    <li><a href="<?php print $facebook;?>"><i class="fa fa-facebook-f"></i></a></li>
                        <?php }?>
                     <?php if($twitter){?>
                    <li><a href="<?php print $twitter;?>"><i class="fa fa-twitter"></i></a></li>
                        <?php }?>
                     <?php if($pint){?>
                    <li><a href="<?php print $pint;?>"><i class="fa fa-pinterest-p"></i></a></li>
                        <?php }?>
                </ul>
            </div>
		
	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) :?>
	
	<?php endif; ?>
</article>
