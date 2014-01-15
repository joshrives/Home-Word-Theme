<?php
/**
 * Template name: Home
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
				<?php get_template_part( 'content', 'newsletter' ); ?>
				<div class="content-wrap general-content">
					<div class="feature-tabs group">
						<ul class="nav nav-tabs feature-tab-nav">
							<li class="active">
								<a href="#radio" data-toggle="tab" class="radio-tab">
									<span aria-hidden="true" data-icon="&#x52;"></span>
									Radio Broadcast
								</a>
							</li>
							<li>
								<a href="#family" data-toggle="tab" class="family-tab">
									<span aria-hidden="true" data-icon="&#x46;"></span>
									Family Resources
								</a>
							</li>
							<li>
								<a href="#church" data-toggle="tab" class="church-tab">
									<span aria-hidden="true" data-icon="&#x43;"></span>
									Church Leader Resources
								</a>
							</li>
						</ul>

						<div class="tab-content feature-tab-content">
							<div class="tab-pane radio-pane active" id="radio">
								<div class="tab-column image">
									<a href = "#">
										<img src = "<?php bloginfo('template_directory'); ?>/_i/radio-image.jpg">
									</a>
								</div>
								<div class="tab-column double right-tab recent-radio">
									<h4>december 29, 2013</h4>
									<h2>Kay Warren Interview</h2>
									<p>In non velit elementum, varius erat sit amet, vulputate enim. Quisque id ligula massa. Vivamus elit lectus, condimentum non commodo eget, tristique ac dolor. Curabitur pellentesque, leo ut cursus ullamcorper, lectus massa sollicitudin neque, ut facilisis nunc risus nec libero. </p>
									<a href = "#" class="button">Listen Now</a>
								</div>
							</div>
							<div class="tab-pane family-pane" id="family">
								<div class="tab-column article-preview">
<?php
	$args = array( 'post_type' => 'articles', 'posts_per_page' => 1, 'area' => 'families');
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
?>
									<a href = "<?php the_permalink(); ?>">
										<?php
											if ( has_post_thumbnail() ) {
												the_post_thumbnail();
											}

										?>
									</a>
									<h3><?php the_title(); ?></h3>
									<p><?php the_excerpt(); ?></p>
									<a href = "<?php the_permalink(); ?>" class="read-more">Continue Reading &raquo;</a>
<?php endwhile; ?>
								</div>
								<div class="tab-column image">
									<a href = "#">
										<img src = "<?php bloginfo('template_directory'); ?>/_i/family-image.jpg">
									</a>
								</div>
								<div class="tab-column right-tab link-list">
									<h5>Family Resources Library:</h5>
									<ul>
										<li><a href = "#">Articles & Media</a></li>
										<li><a href = "#">Culture Blog</a></li>
										<li><a href = "#">Devotionals</a></li>
										<li><a href = "#">Upcoming Events</a></li>
									</ul>
								</div>
							</div>
							<div class="tab-pane church-pane" id="church">
								<div class="tab-column link-list">
									<h5>Family Resources Library:</h5>
									<ul>
										<li><a href = "#">Articles & Media</a></li>
										<li><a href = "#">Culture Blog</a></li>
										<li><a href = "#">Devotionals</a></li>
										<li><a href = "#">Upcoming Events</a></li>
									</ul>
								</div>
								<div class="tab-column article-preview">
<?php
	$args = array( 'post_type' => 'articles', 'posts_per_page' => 1, 'area' => 'church-leaders');
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
?>
									<a href = "<?php the_permalink(); ?>">
										<?php
											if ( has_post_thumbnail() ) {
												the_post_thumbnail();
											}

										?>
									</a>
									<h3><?php the_title(); ?></h3>
									<p><?php the_excerpt(); ?></p>
									<a href = "<?php the_permalink(); ?>" class="read-more">Continue Reading &raquo;</a>
<?php endwhile; ?>
								</div>
								<div class="tab-column image">
									<a href = "#">
										<img src = "<?php bloginfo('template_directory'); ?>/_i/church-image.jpg">
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="regular-tabs group">
						<ul class="nav nav-tabs regular-tab-nav">
							<li class="active"><a href="#new" data-toggle="tab">Newest Release</a></li>
							<li><a href="#popular" data-toggle="tab">Most Popular</a></li>
							<li><a href="#special" data-toggle="tab">Special Offer</a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content regular-tab-content">
							<div class="tab-pane active single-pane" id="new">
								<a href = "#" class="single-image">
									<img src = "<?php bloginfo('template_directory'); ?>/_i/product1.jpg">
								</a>
								<div class="single-content">
									<a href = "#" class="view-all">View All Products &raquo;</a>
									<h2>
										<a href = "#">First Few Years of Marriage</a>
									</h2>
									<h4>by Jim Burns and Doug Fields</h4>
									<p>In non velit elementum, varius erat sit amet, vulputate enim. Quisque id ligula massa. Vivamus elit lectus, condimentum non commodo eget, tristique ac dolor. Curabitur pellentesque, leo ut cursus ullamcorper, lectus massa sollicitudin neque, ut facilisis nunc risus nec libero…</p>
									<a href = "#" class="btn-gray">Details</a>
									<a href = "#" class="btn">Add to Cart</a>
								</div>
							</div>
							<div class="tab-pane three-pane" id="popular">
								<ul class="three-list">
									<li>
										<a href = "#">
											<img src = "<?php bloginfo('template_directory'); ?>/_i/product1.jpg">
											<h3>Product Title</h3>
										</a>
									</li>
									<li>
										<a href = "#">
											<img src = "<?php bloginfo('template_directory'); ?>/_i/product1.jpg">
											<h3>Product Title</h3>
										</a>
									</li>
									<li>
										<a href = "#">
											<img src = "<?php bloginfo('template_directory'); ?>/_i/product1.jpg">
											<h3>Product Title</h3>
										</a>
									</li>
								</ul>
							</div>
							<div class="tab-pane" id="special">
								<a href = "#" class="single-image">
									<img src = "<?php bloginfo('template_directory'); ?>/_i/product1.jpg">
								</a>
								<div class="single-content">
									<a href = "#" class="view-all">View All Products</a>
									<h2>
										<a href = "#">First Few Years of Marriage</a>
									</h2>
									<h4>by Jim Burns and Doug Fields</h4>
									<p>In non velit elementum, varius erat sit amet, vulputate enim. Quisque id ligula massa. Vivamus elit lectus, condimentum non commodo eget, tristique ac dolor. Curabitur pellentesque, leo ut cursus ullamcorper, lectus massa sollicitudin neque, ut facilisis nunc risus nec libero…</p>
									<a href = "#" class="btn-gray">Details</a>
									<a href = "#" class="btn">Add to Cart</a>
								</div>
							</div>
						</div>
					</div>
				</div><!--general-content-->

<?php get_footer(); ?>
