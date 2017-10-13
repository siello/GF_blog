<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}

// Woocommerce Settings
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

function writepress_enqueue_woocommerce_style(){
	wp_register_style( 'woocommerce', get_template_directory_uri() . '/woocommerce/css/woocommerce.css' );
	wp_enqueue_style('woo-layout-css', get_template_directory_uri() . '/woocommerce/css/woocommerce-layout.css' );
	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'woocommerce' );
	 }
}
add_action( 'wp_enqueue_scripts', 'writepress_enqueue_woocommerce_style' );

add_filter( 'woocommerce_enqueue_styles', 'zolo_dequeue_styles' );
function zolo_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-layout'] ); 
	return $enqueue_styles;
}
 
add_filter( 'woocommerce_breadcrumb_defaults', 'zolo_change_breadcrumb_delimiter' );
function zolo_change_breadcrumb_delimiter( $defaults ) {
	$defaults['delimiter'] = ' &raquo; ';
	return $defaults;
}

// Display numbeer of products per page.

add_filter('loop_shop_per_page', 'writepress_loop_shop_per_page');
function writepress_loop_shop_per_page()
{
	global $writepress_data;

	parse_str($_SERVER['QUERY_STRING'], $params);
	$woo_items = isset($writepress_data["woo_items"]) ? $writepress_data["woo_items"] : '12';
	if($woo_items){
		$prdct_per_page = $woo_items;
	}else{
		$prdct_per_page = 4;
		}

	$pc = !empty($params['product_count']) ? $params['product_count'] : $prdct_per_page;

	return $pc;
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action('woocommerce_after_single_product_summary', 'writepress_woocommerce_output_related_products', 15);
function writepress_woocommerce_output_related_products()
	{
	global $writepress_data;
	$woocommerce_related_columns = isset($writepress_data["woocommerce_related_columns"]) ? $writepress_data["woocommerce_related_columns"] : '4';
	$related_prdct_col = $woocommerce_related_columns ? $woocommerce_related_columns : '4';
		$args = array(
			'posts_per_page' => $related_prdct_col,
			'columns' => $related_prdct_col,
			'orderby' => 'rand'
		);
	
		woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
}



/*** Tiny Cart ***/
if( !function_exists('zolo_tiny_cart') ){
	function zolo_tiny_cart(){

		$cart_empty = sizeof( WC()->cart->get_cart() ) > 0 ? false : true ;
		$cart_url = WC()->cart->get_cart_url();
		$checkout_url = WC()->cart->get_checkout_url();
		$cart_number = WC()->cart->cart_contents_count;
		ob_start();
		?>
        <div class="zt-tiny-cart-wrapper">
            <a class="cart-control" href="<?php echo esc_url($cart_url); ?>" title="<?php esc_html_e('View your shopping bag','writepress');?>">
                <span class="ic-cart"><span class="ic"></span></span>
                <?php /*?><span class="cart-total"><?php echo WC()->cart->get_cart_subtotal(); ?></span><?php */?>
                <span class="cart-number"><?php echo esc_html($cart_number) ?></span>
            </a>
            <span class="cart-drop-icon drop-icon"></span>
            <div class="cart-dropdown-form dropdown-container">
                <div class="form-content">
                    <?php if( $cart_empty ): ?>
                        <label><?php esc_html_e('Your shopping cart is empty', 'writepress'); ?></label>
                    <?php else: ?>
                        <ul class="cart-list">
                            <?php 
                            $cart = WC()->cart->get_cart();
                            foreach( $cart as $cart_item_key => $cart_item ):
                                $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                if ( !( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) ){
                                    continue;
                                }
                                    
                                $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                
                            ?>
                                <li>
                                    <a href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
                                        <?php echo  $_product->get_image(); ?>
                                    </a>
                                    <div class="cart-item-wrapper">	
                                        <h3 class="product-name">
                                            <a href="<?php echo esc_url(get_permalink( $cart_item['product_id'] )); ?>">
                                                <?php echo  $_product->get_title(); ?>
                                            </a>
                                        </h3>
                                        <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . $cart_item['quantity'] . '</span> ', $cart_item, $cart_item_key ); ?>
                                        <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="price"><span class="amount icon"> x </span> ' . $product_price . '</span>', $cart_item, $cart_item_key ); ?>
                                        <?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s" data-key="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'writepress' ), $cart_item_key ), $cart_item_key ); ?>
                                    </div>
                                </li>
                            
                            <?php endforeach; ?>
                        </ul>
                        <div class="dropdown-footer">
                            <div class="total"><span class="total-title"><?php esc_html_e('Subtotal :', 'writepress');?></span><?php echo WC()->cart->get_cart_subtotal(); ?> </div>
                            
                            <a href="<?php echo esc_url($cart_url); ?>" class="button view-cart"><?php esc_html_e('View cart', 'writepress'); ?></a>
                            <a href="<?php echo esc_url($checkout_url); ?>" class="button checkout button-secondary"><?php esc_html_e('Checkout', 'writepress'); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
		<?php
		return ob_get_clean();
	}
}

add_filter('woocommerce_add_to_cart_fragments', 'zolo_tiny_cart_filter');
function zolo_tiny_cart_filter($fragments){
	$fragments['.zt-tiny-cart-wrapper'] = zolo_tiny_cart();
	return $fragments;
}