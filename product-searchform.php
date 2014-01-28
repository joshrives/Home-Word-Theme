<?php ?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>" class="product-search-form">
	<div>
		<label class="product-search-label" for="s"><?php _e( 'Quick Search', 'woocommerce' ); ?></label>
		<div class="product-search">
		<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php _e( 'Search...', 'woocommerce' ); ?>" class="product-search-input"/>
		<input type="submit" id="searchsubmit" value="<?php echo esc_attr__( 'Search' ); ?>" class="product-search-submit"/>
		<input type="hidden" name="post_type" value="product" />
	</div>
</form>