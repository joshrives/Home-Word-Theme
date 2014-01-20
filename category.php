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
				<div class="archive-grouping group">
				<?php while ( $loop->have_posts() ) : $loop->the_post();?>
					<?php if($loop->post_count == 1) : ?>
						<div class="entry-excerpt">
							<?php get_template_part( 'content', 'archiveexcerpt' ); ?>
						</div>
					<?php else : ?>
					<div class='entry-excerpt half<?php if($i % 2 !== 0) {echo " first";} ?>'>
						<?php get_template_part( 'content', 'archiveexcerpt' ); ?>
					</div>
				<?php endif; endwhile; ?>
				</div>
		<?php endif; ?>
		<?php wp_reset_postdata();
		//Devotions
		$args = array( 'post_type' => 'devotionals', 'posts_per_page' => 4, 'area' => 'families', 'category_name' => $thisCat);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) : ?>

				<h4 class="archive-title">Devotions about <?php single_cat_title(); ?></h4>
				<div class="archive-grouping group">
				<?php while ( $loop->have_posts() ) : $loop->the_post();?>
					<?php if($loop->post_count == 1) : ?>
						<div class="entry-excerpt">
							<?php get_template_part( 'content', 'archiveexcerpt' ); ?>
						</div>
					<?php else : ?>
					<div class='entry-excerpt half<?php if($i % 2 !== 0) {echo " first";} ?>'>
						<?php get_template_part( 'content', 'archiveexcerpt' ); ?>
					</div>
				<?php endif; endwhile; ?>
				</div>
		<?php endif; ?>
		<?php wp_reset_postdata();
		//Devotions
		$args = array( 'post_type' => 'post', 'posts_per_page' => 4, 'area' => 'families', 'category_name' => $thisCat);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) : ?>

				<h4 class="archive-title">Blog Posts about <?php single_cat_title(); ?></h4>
				<div class="archive-grouping group">
				<?php while ( $loop->have_posts() ) : $loop->the_post();?>
					<?php if($loop->post_count == 1) : ?>
						<div class="entry-excerpt">
							<?php get_template_part( 'content', 'archiveexcerpt' ); ?>
						</div>
					<?php else : ?>
					<div class='entry-excerpt half<?php if($i % 2 !== 0) {echo " first";} ?>'>
						<?php get_template_part( 'content', 'archiveexcerpt' ); ?>
					</div>
				<?php endif; endwhile; ?>
				</div>
		<?php endif; ?>
<?php
	elseif($_SESSION['cat'] === 'church') :
		//Articles
		$args = array( 'post_type' => 'articles', 'posts_per_page' => 4, 'area' => 'church-leaders', 'category_name' => $thisCat);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) : ?>

				<h4 class="archive-title">Articles about <?php single_cat_title(); ?></h4>
				<div class="archive-grouping group">
				<?php while ( $loop->have_posts() ) : $loop->the_post();?>
					<?php if($loop->post_count == 1) : ?>
						<div class="entry-excerpt">
							<?php get_template_part( 'content', 'archiveexcerpt' ); ?>
						</div>
					<?php else : ?>
					<div class='entry-excerpt half<?php if($i % 2 !== 0) {echo " first";} ?>'>
						<?php get_template_part( 'content', 'archiveexcerpt' ); ?>
					</div>
				<?php endif; endwhile; ?>
				</div>
		<?php endif; ?>
		<?php wp_reset_postdata();
		//Devotions
		$args = array( 'post_type' => 'devotionals', 'posts_per_page' => 4, 'area' => 'church-leaders', 'category_name' => $thisCat);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) : ?>

				<h4 class="archive-title">Devotions about <?php single_cat_title(); ?></h4>
				<div class="archive-grouping group">
				<?php while ( $loop->have_posts() ) : $loop->the_post();?>
					<?php if($loop->post_count == 1) : ?>
						<div class="entry-excerpt">
							<?php get_template_part( 'content', 'archiveexcerpt' ); ?>
						</div>
					<?php else : ?>
					<div class='entry-excerpt half<?php if($i % 2 !== 0) {echo " first";} ?>'>
						<?php get_template_part( 'content', 'archiveexcerpt' ); ?>
					</div>
				<?php endif; endwhile; ?>
				</div>
		<?php endif; ?>
		<?php wp_reset_postdata();
		//Devotions
		$args = array( 'post_type' => 'post', 'posts_per_page' => 4, 'area' => 'church-leaders', 'category_name' => $thisCat);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) : ?>

				<h4 class="archive-title">Blog Posts about <?php single_cat_title(); ?></h4>
				<div class="archive-grouping group">
				<?php while ( $loop->have_posts() ) : $loop->the_post();?>
					<?php if($loop->post_count == 1) : ?>
						<div class="entry-excerpt">
							<?php get_template_part( 'content', 'archiveexcerpt' ); ?>
						</div>
					<?php else : ?>
					<div class='entry-excerpt half<?php if($i % 2 !== 0) {echo " first";} ?>'>
						<?php get_template_part( 'content', 'archiveexcerpt' ); ?>
					</div>
				<?php endif; endwhile; ?>
				</div>
		<?php endif; ?>
<?php else :
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
