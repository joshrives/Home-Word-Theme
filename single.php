<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Home Word
 */

get_header(); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php
				$displaySlider = get_field('display_slider');
				if ($displaySlider == 'Yes'){
					get_template_part( 'content', 'slider' );
					wp_reset_postdata();
				}
				$cat = isset($_GET['cat']) ? $_GET['cat'] : null;
				if ($cat === NULL) {
					if( has_term( 'families', 'area' ) ) {
						$cat = 'families';
					} elseif(has_term( 'church-leaders', 'area' )) {
						$cat = 'church';
					}
				}
			?>
			<?php //echo get_the_term_list( $post->ID, 'area', '', ', ', '' ); ?>
			<div class="general-content group <?php echo $cat; ?>-content">
				<div class="content-section single">

			<?php get_template_part( 'content', 'single' ); ?>

			<?php //homeword_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				/*if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;*/
			?>

		<?php endwhile; // end of the loop. ?>

				</div><!-- content-section -->
				<?php get_sidebar(); ?>
			</div><!-- #general-content -->


<?php get_footer(); ?>