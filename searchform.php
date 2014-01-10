<?php
/**
 * The template for displaying search forms in Home Word
 *
 * @package Home Word
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span><?php _ex( 'Search...', 'label', 'homeword' ); ?></span>
		<input type="search" class="search-field" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'homeword' ); ?>">
</form>
