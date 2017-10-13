<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.5
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

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
$woocommerce_related_columns = isset($writepress_data["woocommerce_related_columns"]) ? $writepress_data["woocommerce_related_columns"] : '4';
$related_prdct_col = $woocommerce_related_columns ? $woocommerce_related_columns : '4';
$shop_related_columns = 'related_column-'.$related_prdct_col;
$shop_page_layout = isset($writepress_data['shop_page_layout']) ? $writepress_data['shop_page_layout'] : 'rightsidebar';
?>

</style>

 <?php  //Full Width
		 if($shop_page_layout=="leftsidebar"){
			$sidebar_position_class = 'hassidebar left';
			}elseif($shop_page_layout=="rightsidebar"){
				$sidebar_position_class = 'hassidebar right';
			}elseif($shop_page_layout=="fullwidth"){
				$sidebar_position_class = 'nosidebar';
				
			}?>
        
        
<div class="container-main <?php echo esc_attr($sidebar_position_class.' '.$shop_related_columns);?>">
<div class="container-padding">
  <div class="zolo-container">
    <div class="inner-content">
      
		<div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
          <?php while ( have_posts() ) : the_post(); ?>
          <?php wc_get_template_part( 'content', 'single-product' ); ?>
          <?php endwhile; // end of the loop. ?>
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
