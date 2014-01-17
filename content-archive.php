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
		<p><?php the_excerpt(); ?></p>
		<a href = "#" class="archive-more <?php echo $cat; ?>">Read More</a>
	</div>
</article><!-- #post-## -->
