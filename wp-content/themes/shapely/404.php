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
				<div class="page-content text-404">
                    <h3 class="page_title">Страница не найдена</h3>
                    <p>Похоже, что страницы, которую вы ищете, не существует.</p>
                    <p>Попробуйте перейти на <a href="<?php echo get_home_url(); ?>">Главную страницу</a> или воспользуйтесь поиском.</p>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
