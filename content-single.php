<?php
/**
 * @package Home Word
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="entry-meta">
			<div class="entry-author">
				by <a href = "<?php the_author_link(); ?>"><?php the_author(); ?></a> &middot; <?php the_date(); ?>
						<?php edit_post_link( __( 'Edit', 'homeword' ), '<span class="edit-link">', '</span>' ); ?>

			</div>
			<div class="entry-cats">
				Published in
<?php
	echo get_the_term_list( $post->ID, 'area', '', ', ', ', ' );
	echo get_the_term_list( $post->ID, 'category', '', ', ', '' );
?>
			</div>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
				echo '<div class="caption">';
				echo get_post(get_post_thumbnail_id())->post_excerpt;
				echo '</div>';
			}
		?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'homeword' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<div class="entry-social group">
		<div class="social-buttons">
			<!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
			<a class="addthis_button_facebook"></a>
			<a class="addthis_button_twitter"></a>
			<a class="addthis_button_email"></a>
			<a class="addthis_button_print"></a>
			<a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
			</div>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-52d814ff54066ddf"></script>
			<!-- AddThis Button END -->
		</div>
		<a href = "#post-<?php the_ID(); ?>" class="to-top"><span>&uarr;</span>Back to Top</a>

	</div>
	<footer class="entry-footer group">
		<?php echo get_avatar(get_the_author_meta('ID'), 240); ?>
		<div class="author-info">
			<h4><?php the_author_meta('display_name'); ?></h4>
			<p><?php the_author_meta('description'); ?></p>
		</div>

	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
