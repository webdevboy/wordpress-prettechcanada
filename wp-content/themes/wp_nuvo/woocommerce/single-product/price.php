<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     10.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>
<div class="left" itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<div class="price"><?php echo $product->get_price_html(); ?></div>

	<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>
</div> <!-- start in rating.php -->