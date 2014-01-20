<?php
/**
 * @package Home Word
 */
$entryTitle = get_the_title();
if(strlen($entryTitle) > 48) {
	$entryTitle = substr($entryTitle, 0, 48) . '...';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h3><a href = "<?php the_permalink(); ?>?cat=<?php echo $_GET['cat']; ?>"><?php echo $entryTitle; ?></a></h3>
		<div class="entry-meta">
			<div class="entry-author">
				by <a href = "<?php the_author_link(); ?>"><?php the_author(); ?></a> &middot; <?php the_time('F j, Y'); ?>
			</div>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<a href = "<?php the_permalink(); ?>?cat=<?php echo $_GET['cat']; ?>">
		<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
		?>
		</a>
		<p><?php echo get_excerpt(140); ?></p>
		<a href = "<?php the_permalink(); ?>?cat=<?php echo $_GET['cat']; ?>">Continue Reading &raquo;</a>
	</div>
</article><!-- #post-## -->
