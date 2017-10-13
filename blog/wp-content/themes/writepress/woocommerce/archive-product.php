<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.5
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $writepress_data;
get_header( 'shop' ); ?>
<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
    
    
<?php 
$woocommerce_shop_page_columns = isset($writepress_data["woocommerce_shop_page_columns"]) ? $writepress_data["woocommerce_shop_page_columns"] : '4';
$prdct_col = $woocommerce_shop_page_columns ? $woocommerce_shop_page_columns : '4';
$shop_page_columns = 'columns-'.$prdct_col;
$shop_page_layout = isset($writepress_data['shop_page_layout']) ? $writepress_data['shop_page_layout'] : 'rightsidebar';
//$content_width = $writepress_data["content_width"];
//$sidebar_width = $writepress_data["sidebar_width"];
?>


 <?php  //Full Width
		 if($shop_page_layout=="leftsidebar"){
			$sidebar_position_class = 'hassidebar left';
			}elseif($shop_page_layout=="rightsidebar"){
				$sidebar_position_class = 'hassidebar right';
			}elseif($shop_page_layout=="fullwidth"){
				$sidebar_position_class = 'nosidebar';
				
			}?>
        
        
<div class="container-main <?php echo esc_attr($sidebar_position_class.' '.$shop_page_columns);?>">
<div class="container-padding">
  <div class="zolo-container">
    <div class="inner-content">
      
        
      
		<div id="primary" class="content-area">
          <div id="content" class="site-content" role="main">

            <?php do_action( 'woocommerce_archive_description' ); ?>
            <?php if ( have_posts() ) : ?>
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
            <?php while ( have_posts() ) : the_post(); ?>
            
            <?php wc_get_template_part( 'content', 'product' ); ?>
            
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
            <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
            <?php wc_get_template( 'loop/no-products-found.php' ); ?>
            <?php endif; ?>
            <?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
          </div>
        </div>
        
        <?php // Left Sidebar
		 if($shop_page_layout=="leftsidebar"): ?>
        <div class="sidebar sidebar_container_1 left"><?php get_sidebar( 'shop' ); ?></div>
        <?php endif; ?>
        
        <?php // Right Sidebar
		 if($shop_page_layout=="rightsidebar"): ?>
        <div class="sidebar sidebar_container_2 right"><?php get_sidebar( 'shop' ); ?></div>
        <?php endif; ?>
      
      </div>
    </div>
    </div>
  </div>

<?php get_footer( 'shop' ); ?>
