<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Shapely
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'shapely' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content text-404">
                    <h1>Страница не найдена</h1>
<!--					<p>--><?php //esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'shapely' ); ?><!--</p>-->
                    <?php
					//	get_search_form();
					?>
                    <p>Похоже, что страницы, которую вы ищете, не существует.</p>
                    <p>Попробуйте перейти на <a href="<?php echo get_home_url(); ?>">Главную страницу</a> или воспользуйтесь поиском.</p>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
