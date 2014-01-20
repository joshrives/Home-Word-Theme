<?php
/**
 * @package Home Word
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href = "<?php the_permalink(); ?>?cat=<?php echo $_GET['cat']; ?>"><?php the_title(); ?></a></h1>
		<div class="entry-meta">
			<div class="entry-author">
				by <a href = "<?php the_author_link(); ?>"><?php the_author(); ?></a> &middot; <?php the_date(); ?>
						<?php edit_post_link( __( 'Edit', 'homeword' ), '<span class="edit-link">', '</span>' ); ?>

			</div>
			<div class="entry-cats">
				Published in
<?php
	$area_terms = wp_get_object_terms($post->ID, 'area');
	if(!empty($area_terms)){
	  if(!is_wp_error( $area_terms )){
	    foreach($area_terms as $term){
	    	echo '<a href="' .  esc_url( home_url( '/' ) ) . $term->slug . '/?cat='. $_GET['cat'].'">'.$term->name.'</a>';
			//echo '<a href="'.get_term_link($term->slug, 'area').'?cat='. $_GET['cat'].'">'.$term->name.'</a>';
			if ($term != end($area_terms)) {
				echo ', ';
			}
	    }
	  }
	}
	//echo get_the_term_list( $post->ID, 'area', '', ', ', '' );
	//echo get_the_term_list( $post->ID, 'category', '', ', ', '' );
	$cat_terms = wp_get_object_terms($post->ID, 'category');
	if(!empty($cat_terms)){
	  if(!is_wp_error( $cat_terms )){
	    foreach($cat_terms as $term){
	      echo ', <a href="'.get_term_link($term->slug, 'category').'?cat='. $_GET['cat'].'">'.$term->name.'</a>';
	    }
	  }
	}
?>
			</div>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<a href = "<?php the_permalink(); ?>?cat=<?php echo $_GET['cat']; ?>">
		<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
				echo '<div class="caption">';
				echo get_post(get_post_thumbnail_id())->post_excerpt;
				echo '</div>';
			}
		?>
		</a>
		<p><?php the_excerpt(); ?></p>
		<a href = "<?php the_permalink(); ?>?cat=<?php echo $_GET['cat']; ?>" class="archive-more <?php echo $cat; ?>">Read More</a>
	</div>
</article><!-- #post-## -->
