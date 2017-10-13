<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.5
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop, $writepress_data;

$woocommerce_shop_page_columns = isset($writepress_data["woocommerce_shop_page_columns"]) ? $writepress_data["woocommerce_shop_page_columns"] : '4';

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
// Modification by Writepress
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $woocommerce_shop_page_columns );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>

<li <?php post_class( $classes ); ?>>
<div class="product_list_item">
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	

<div class="zolo_product_thumbnail">
<a href="<?php the_permalink(); ?>" class="zolo_product_img">
		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
        </a>
        
        <div class="zolo_cart_but"><?php do_action( 'woocommerce_after_shop_loop_item' ); ?></div>
        </div>
        <a href="<?php the_permalink(); ?>">
<div class="zolo_product_details">
		<h3><?php esc_attr(the_title()); ?></h3>

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
</div>
	</a>

	
</div>
</li>