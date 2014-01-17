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

			<?php /* Start the Loop */ ?>
<?php
	$thisCat = single_cat_title("", false);
	if($_SESSION['cat'] === 'families') :
		//Articles
		$args = array( 'post_type' => 'articles', 'posts_per_page' => 4, 'area' => 'families', 'category_name' => $thisCat);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) : ?>

				<h4 class="archive-title">Articles about <?php single_cat_title(); ?></h4>
			<?php while ( $loop->have_posts() ) : $loop->the_post();?>
				<div class='half<?php if($i % 2 !== 0) {echo " first";} ?>'>
					<?php get_template_part( 'content', 'archive' ); ?>
				</div>
			<?php endwhile;	endif; ?>
		<?php wp_reset_postdata();
		//Devotions
		$args = array( 'post_type' => 'devotionals', 'posts_per_page' => 4, 'area' => 'families', 'category_name' => $thisCat);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) :
			echo '<h4 class="archive-title">Devotionals about ';
			single_cat_title();
			echo '</h4>';
			while ( $loop->have_posts() ) : $loop->the_post();
				get_template_part( 'content', 'archive' );
			endwhile;
		endif;
		wp_reset_postdata();
		//Blogs
		$args = array( 'post_type' => 'post', 'posts_per_page' => 4, 'area' => 'families', 'category_name' => $thisCat);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) :
			echo '<h4 class="archive-title">Blog Posts about ';
			single_cat_title();
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
