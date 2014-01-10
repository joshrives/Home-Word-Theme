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

			<?php while ( have_posts() ) : the_post(); ?>
				<div id="carousel-home" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<a href = "#" class="slide-link">
								<img src = "<?php bloginfo('template_directory'); ?>/_i/banner5.jpg">
							</a>
							<div class="carousel-caption">
							    <h1>Slide Heading #1</h1>
							    <p>This is the subheading which is typically a little longer.</p>
							    <a href = "#" class="carousel-action">Learn More</a>
							</div>
						</div>
						<div class="item">
							<a href = "#" class="slide-link">
								<img src = "<?php bloginfo('template_directory'); ?>/_i/banner6.jpg">
							</a>
							<div class="carousel-caption">
							    <h1>Slide Heading #2</h1>
							    <p>This is the subheading which is typically a little longer.</p>
							    <a href = "#" class="carousel-action">Learn More</a>
							</div>
						</div>
						<div class="item">
							<a href = "#" class="slide-link">
								<img src = "<?php bloginfo('template_directory'); ?>/_i/banner4.jpg">
							</a>
							<div class="carousel-caption">
							    <h1>Slide Heading #3</h1>
							    <p>This is the subheading which is typically a little longer.</p>
							    <a href = "#" class="carousel-action">Learn More</a>
							</div>
						</div>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-home" data-slide="prev">
					<span aria-hidden="true" data-icon="&#x6c;"></span>
					</a>
					<a class="right carousel-control" href="#carousel-home" data-slide="next">
					<span aria-hidden="true" data-icon="&#x72;"></span>
					</a>
				</div>
				<div class="newsletter-signup full-section">
					<div class = "content-wrap group">
						<span aria-hidden="true" data-icon="&#x4e;"></span>
						<h1>Do you want to keep in touch? We thought so.</h1>
						<p>Subscribe to our Newsletter to hear about upcoming events, special offers, and more!</p>
						<div class="sm-wrap">
							<?php mc4wp_form(); ?>
						</div>
					</div>
				</div>
				<div class="content-wrap general-content">
					<div class="feature-tabs group">
						<ul class="nav nav-tabs feature-tab-nav">
							<li class="active">
								<a href="#radio" data-toggle="tab" class="radio-tab">
									<span aria-hidden="true" data-icon="&#x52;"></span>
									Recent Radio Show
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
									<img src = "<?php bloginfo('template_directory'); ?>/_i/radio-image.jpg">
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
									<img src = "<?php bloginfo('template_directory'); ?>/_i/article-thumb.jpg">
									<h3>Article Title</h3>
									<p>In non velit elementum, varius erat sit amet, vulputate enim. Quisque id ligula massa. Vivamus elit lectus, condimentum non commodo eget, tristique ac dolor</p>
									<a href = "#" class="read-more">Continue Reading...</a>
								</div>
								<div class="tab-column image">
									<img src = "<?php bloginfo('template_directory'); ?>/_i/family-image.jpg">
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
									<img src = "<?php bloginfo('template_directory'); ?>/_i/article-thumb.jpg">
									<h3>Article Title</h3>
									<p>In non velit elementum, varius erat sit amet, vulputate enim. Quisque id ligula massa. Vivamus elit lectus, condimentum non commodo eget, tristique ac dolor</p>
									<a href = "#" class="read-more">Continue Reading...</a>
								</div>
								<div class="tab-column image">
									<img src = "<?php bloginfo('template_directory'); ?>/_i/church-image.jpg">
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
			<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
