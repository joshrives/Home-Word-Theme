<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Home Word
 */

get_header(); ?>
	<?php
		$displaySlider = get_field('display_slider');
		if ($displaySlider == 'Yes'){
			get_template_part( 'content', 'slider' );
			wp_reset_postdata();
		}

	?>
	<div class="general-content group <?php echo $_SESSION['cat']; ?>-content">
		<div class="content-section archive">

		<?php if ( have_posts() ) : ?>
<?php
	$thisCat = single_cat_title("", false);
	if($_SESSION['cat'] === 'families') :
		//Articles
		$args = array( 'post_type' => 'post', 'posts_per_page' => 4, 'area' => 'families');
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) : ?>

				<h4 class="archive-title">Culture Blog for Families</h4>
				<div class="group">
				<?php while ( $loop->have_posts() ) : $loop->the_post();?>
					<div class="entry-excerpt">
						<?php get_template_part( 'content', 'archive' ); ?>
					</div>
				<?php endwhile;	endif; ?>
				</div>
<?php
	elseif($_SESSION['cat'] === 'church') :
		//Articles
		$args = array( 'post_type' => 'post', 'posts_per_page' => 4, 'area' => 'church-leaders');
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) : ?>

				<h4 class="archive-title">Culture Blog for Church Leaders</h4>
				<div class="group">
				<?php while ( $loop->have_posts() ) : $loop->the_post();?>
					<div class="entry-excerpt">
						<?php get_template_part( 'content', 'archive' ); ?>
					</div>
				<?php endwhile;	endif; ?>
				</div>
<?php else :
		$args = array( 'post_type' => 'post', 'posts_per_page' => 4);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
			echo '<div class="entry-excerpt">';
			get_template_part( 'content', 'archive' );
			echo '</div>';
		endwhile;
	endif;
?>
			<?php homeword_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</div><!--content-section-->
		<?php get_sidebar(); ?>
	</div><!--general-content-->
<?php get_footer(); ?>
