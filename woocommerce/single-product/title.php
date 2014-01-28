<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
<?php
	$author = get_post_meta( get_the_ID(), '_author_field', true );
	if(!empty($author)) :
?>
<h3 class="product-author">by <?php echo $author ?></h3>
<?php endif; ?>
<div class="product-specifics">
<?php
	$publisher = get_post_meta( get_the_ID(), '_publisher_field', true );
	$pubyear = get_post_meta( get_the_ID(), '_year_field', true );
	$pubformat = get_post_meta( get_the_ID(), '_format_field', true );
	$numPages = get_post_meta( get_the_ID(), '_pages_field', true );
	if(!empty($publisher)) {
		echo $publisher;
	}
	if(!empty($pubyear) or !empty($pubformat) or !empty($numPages)) {
		echo ' / ';
	}
	if(!empty($pubyear)) {
		echo $pubyear;
	}
	if(!empty($pubformat) or !empty($numPages)) {
		echo ' / ';
	}
	if(!empty($pubformat)) {
		echo $pubformat;
	}
	if(!empty($numPages)) {
		echo ' / ';
	}
	if(!empty($numPages)) {
		echo $numPages;
	}
?>
</div>
<hr class="product-divider">