<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header('shop'); ?>
	<div class="general-content group store-home">
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action('woocommerce_before_main_content');
	?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h3 class="page-title"><?php woocommerce_page_title(); ?></h3>

		<?php endif; ?>

		<?php
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => 3,
				'product_cat' => 'christian-living',
			);
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) : ?>
			<div class="store-home-group">
				<header class="store-category-header group">
					<h5 class="store-subheading">Christian Living</h5>
					<a href = "<?php echo esc_url( home_url( '/' ) ); ?>/product-category/christian-living">View All &raquo;</a>
				</header>
				<div class="group">
			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<?php woocommerce_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
				</div>
			</div><!--store-home-group-->
		<?php endif; wp_reset_postdata();
		/**Next Loop**/
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => 3,
				'product_cat' => 'books',
			);
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) : ?>
			<div class="store-home-group">
				<header class="store-category-header group">
					<h5 class="store-subheading">Christian Living</h5>
					<a href = "<?php echo esc_url( home_url( '/' ) ); ?>/product-category/christian-living">View All &raquo;</a>
				</header>
				<div class="group">
			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<?php woocommerce_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
			</div>
		</div><!--store-home-group-->
		<?php endif; wp_reset_postdata();?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action('woocommerce_sidebar');
	?>
</div>
<?php get_footer('shop'); ?>