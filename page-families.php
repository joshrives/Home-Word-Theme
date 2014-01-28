<?php
/**
 * Template name: Families Home
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
					$displaySlider = get_field('display_slider');
					if ($displaySlider == 'Yes'){
						get_template_part( 'content', 'slider' );
						wp_reset_postdata();
					}
				?>

				<div class="general-content group families-content">
					<div class="content-section">
						<div class="section-intro">
							<h1>Families</h1>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
						</div>
						<div class="entry-excerpt devo-excerpt">
							<h5>Daily Devotional</h5>
<?php
	$args = array( 'post_type' => 'devotionals', 'posts_per_page' => 1, 'area' => 'families');
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
?>
							<a href = "<?php the_permalink(); ?>?cat=families">
								<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									}

								?>
							</a>
							<h3><a href = "<?php the_permalink(); ?>?cat=families"><?php the_title(); ?></a></h3>
							<div class="metadata">Published <?php the_date(); ?> by <?php the_author(); ?></div>
							<p><?php the_excerpt(); ?></p>
							<a href = "<?php the_permalink(); ?>?cat=families" class="read-more">Continue Reading &raquo;</a>
<?php endwhile; ?>
						</div>
						<div class="excerpt-group group">
							<div class="entry-excerpt half first">
								<h5>Recent Article</h5>
<?php
	$args = array( 'post_type' => 'articles', 'posts_per_page' => 1, 'area' => 'families');
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
?>
								<a href = "<?php the_permalink(); ?>?cat=families">
									<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail();
										}

									?>
								</a>
								<h3><a href = "<?php the_permalink(); ?>?cat=families"><?php the_title(); ?></a></h3>
								<div class="metadata">Published <?php the_date(); ?> by <?php the_author(); ?></div>
								<p><?php the_excerpt(); ?></p>
								<a href = "<?php the_permalink(); ?>?cat=families" class="read-more">Continue Reading &raquo;</a>
<?php endwhile; ?>
							</div>
							<div class="entry-excerpt half">
								<h5>From the Culture Blog</h5>
<?php
	$args = array( 'post_type' => 'post', 'posts_per_page' => 1, 'area' => 'families');
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
?>
								<a href = "<?php the_permalink(); ?>?cat=families">
									<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail();
										}

									?>
								</a>
								<h3><a href = "<?php the_permalink(); ?>?cat=families"><?php the_title(); ?></a></h3>
								<div class="metadata">Published <?php the_date(); ?> by <?php the_author(); ?></div>
								<p><?php the_excerpt(); ?></p>
								<a href = "<?php the_permalink(); ?>?cat=families" class="read-more">Continue Reading &raquo;</a>
<?php endwhile; ?>
							</div>
						</div><!--excerpt-group-->
					</div>
					<?php get_sidebar(); ?>

				</div><!--general-content-->
<?php get_template_part( 'content', 'newsletter' ); ?>
<?php get_footer(); ?>
