<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Home Word
 */

get_header(); ?>

	<?php
		while ( have_posts() ) : the_post();
			$displaySlider = get_field('display_slider');
			if ($displaySlider == 'Yes'){
				get_template_part( 'content', 'slider' );
				wp_reset_postdata();
			}
			$cat = isset($_GET['cat']) ? $_GET['cat'] : null;
	?>
	<div class="general-content group <?php if ($cat != NULL) {echo $cat.'-content';} ?>">
		<div class="content-section page">
			<h1>Test</h1>
				<?php get_template_part( 'content', 'woo' ); ?>


			<?php endwhile; // end of the loop. ?>

		</div><!-- content-section -->
		<?php get_sidebar(); ?>
	</div><!-- .general-content -->


<?php get_footer(); ?>
