<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Home Word
 */
?>
	<aside class="sidebar-section store-sidebar">
		<?php get_product_search_form(); ?>
		<h3>Categories</h3>
		<ul>
		<?php
			wp_list_categories(array('taxonomy' => 'product_cat', 'title_li' => ''));
		?>
		</ul>
		<h3>Customer Service</h3>

		<div class="sidebar-content">

		</div>
	</aside>