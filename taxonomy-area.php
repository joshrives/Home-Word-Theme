<?php
/**
 * The template for displaying Archive pages.
 *
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

		<?php  ?>
				<h4 class="archive-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( __( 'Author: %s', 'homeword' ), '<span class="vcard">' . get_the_author() . '</span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'homeword' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'homeword' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'homeword' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'homeword' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'homeword' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'homeword' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'homeword');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'homeword' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'homeword' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'homeword' );

						else :
							_e( 'Archives', 'homeword' );

						endif;
					?>
				</h1>

			<?php /* Start the Loop */ ?>
<?php
	if($_SESSION['cat'] === 'families') :
		//Articles
		$args = array( 'post_type' => 'articles', 'posts_per_page' => 4, 'area' => 'families');
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) : ?>

				<h4 class="archive-title">Articles about Family</h4>
			<?php while ( $loop->have_posts() ) : $loop->the_post();?>
				<div class='half<?php if($i % 2 !== 0) {echo " first";} ?>'>
					<?php get_template_part( 'content', 'archive' ); ?>
				</div>
			<?php endwhile;	endif; ?>
		<?php wp_reset_postdata();
		//Devotions
		$args = array( 'post_type' => 'devotionals', 'posts_per_page' => 4, 'area' => 'families');
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) :
			echo '<h4 class="archive-title">Devotionals about Family';
			echo '</h4>';
			while ( $loop->have_posts() ) : $loop->the_post();
				get_template_part( 'content', 'archive' );
			endwhile;
		endif;
		wp_reset_postdata();
		//Blogs
		$args = array( 'post_type' => 'post', 'posts_per_page' => 4, 'area' => 'families');
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) :
			echo '<h4 class="archive-title">Blog Posts about Family';
			echo '</h4>';
			while ( $loop->have_posts() ) : $loop->the_post();
				get_template_part( 'content', 'archive' );
			endwhile;
		endif;
	elseif($_SESSION['cat'] === 'church') :
		$args = array( 'post_type' => 'articles', 'posts_per_page' => 4, 'area' => 'church-leaders');
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
			get_template_part( 'content', 'archive' );
		endwhile;
	else :
		$args = array( 'post_type' => 'articles', 'posts_per_page' => 4, 'category_name' => $thisCat);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
			get_template_part( 'content', 'archive' );
		endwhile;
	endif;
?>

			<?php homeword_paging_nav(); ?>


		</div><!--content-section-->
		<?php get_sidebar(); ?>
	</div><!--general-content-->

<?php get_footer(); ?>
