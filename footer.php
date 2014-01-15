<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Home Word
 */
?>

		<footer class="site-footer" role="contentinfo">
			<div class="content-wrap">
				<?php do_action( 'homeword_credits' ); ?>
				<ul class="three-list group">
					<li>
						<h3>About Homeword</h3>
						<p>HomeWord seeks to advance the work of God in the world by educating, equipping, and encouraging parents and churches to build God-honoring families from generation to generation.</p>
						<ul class="social ">
							<li>
								<a href = "#">
									<span aria-hidden="true" data-icon="&#x66;"></span>
									<span class="assistive-text">Facebook</span>
								</a>
							</li>
							<li>
								<a href = "#">
									<span aria-hidden="true" data-icon="&#x74;"></span>
									<span class="assistive-text">Twitter</span>
								</a>
							</li>
							<li>
								<a href = "#">
									<span aria-hidden="true" data-icon="&#x70;"></span>
									<span class="assistive-text">Pinterest</span>
								</a>
							</li>
							<li>
								<a href = "#">
									<span aria-hidden="true" data-icon="&#x69;"></span>
									<span class="assistive-text">Instagram</span>
								</a>
							</li>
							<li>
								<a href = "#">
									<span aria-hidden="true" data-icon="&#x79;"></span>
									<span class="assistive-text">YouTube</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<h3>About Azusa Pacific University</h3>
						<p>Azusa Pacific University is a leading Christian college ranked as one of the nation’s best colleges by U.S. News & World Report and The Princeton Review. Located near Los Angeles in Southern California, APU is a Christian university offering associate’s, bachelor’s, master's, doctoral, and degree completion programs, both on campus and online.  <a href = "#">Visit Website »</a></p>
						<ul class="social">
							<li>
								<a href = "#">
									<span aria-hidden="true" data-icon="&#x66;"></span>
									<span class="assistive-text">Facebook</span>
								</a>
							</li>
							<li>
								<a href = "#">
									<span aria-hidden="true" data-icon="&#x74;"></span>
									<span class="assistive-text">Twitter</span>
								</a>
							</li>
							<li>
								<a href = "#">
									<span aria-hidden="true" data-icon="&#x70;"></span>
									<span class="assistive-text">Pinterest</span>
								</a>
							</li>
							<li>
								<a href = "#">
									<span aria-hidden="true" data-icon="&#x79;"></span>
									<span class="assistive-text">YouTube</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<h3>Contact Information</h3>
						<ul class="contact-info">
							<li>
								<span aria-hidden="true" data-icon="&#x4c;"></span>
								<p>HomeWord<br />
								PO Box 1600<br />
								San Juan Capistrano, CA<br />
								92693</p>
							</li>
							<li>
								<span aria-hidden="true" data-icon="&#x4d;"></span>
								<p><a href = "mailto:info@homeword.com">info@homeword.com</a></p>
							</li>
							<li>
								<span aria-hidden="true" data-icon="&#x54;"></span>
								<p><strong>949-487-0217</strong><br />
								<small>(M-F: 9am-4pm PST)</small></p>
							</li>
						</ul>
					</li>
				</ul>
			</div><!-- .content-wrap -->
			<div class="bottom-footer">
				<div class="content-wrap group">
					<ul>
						<li>
							<a href = "#">Home</a>
						</li>
						<li>
							<a href = "#">Families</a>
						</li>
						<li>
							<a href = "#">Church Leaders</a>
						</li>
						<li>
							<a href = "#">About</a>
						</li>
						<li>
							<a href = "#">Store</a>
						</li>
						<li>
							<a href = "#">Donate</a>
						</li>
					</ul>
					<div class="copyright">
						Copyright &copy; <?php echo date("Y"); ?> HomeWord. All Rights Reserved.
					</div>
				</div>
			</div>
		</footer><!-- #colophon -->
	</div><!-- site-content -->
</div><!--site-->
<?php wp_footer(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/_js/production.min.js"></script>
<script src="//localhost:35729/livereload.js"></script>
</body>
</html>