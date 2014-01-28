<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;
?>
<?php
		$currentPrice = $product->get_price();
		$sale = get_post_meta( get_the_ID(), '_sale_price', true);
		if ($sale === $currentPrice) :
			echo '<div class="sale price">$' . $currentPrice . "</div>";
		else :
			echo '<div class="price">$' . $currentPrice . "</div>";
		endif;
	?>
