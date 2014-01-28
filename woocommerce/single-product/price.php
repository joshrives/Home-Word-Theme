<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="product-price">

	<?php
		$currentPrice = $product->get_price();
		$sale = get_post_meta( get_the_ID(), '_sale_price', true);
		if ($sale === $currentPrice) :
			echo '<div class="sale price">$' . $currentPrice . "</div>";
		else :
			echo '<div class="price">$' . $currentPrice . "</div>";
		endif;
		if ($sale === $currentPrice) :
	?>
		<span class="list-price">List Price: <?php echo $product->get_price_html(); ?></span>
	<?php endif; ?>
	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>