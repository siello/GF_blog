<!-- Full Screen Menu Start -->
<div class="full_screen_menu_area"> <a class="fullscreen_menu_close_button"><?php echo __('Close','writepress');?></a>
  <div class="full_screen_menu">
    <div class="zolo-container">
      <div class="zolo-navigation">
        <?php	
                wp_nav_menu(  
                array(  
                'theme_location'  => 'primary-nav', 
                'container'       => false, 
                'container_id'    => 'main-nav',  
                'container_class' => '',  
                'menu_class' => 'nav zolo-navbar-nav',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'menu_id'         => 'primary_menu' ,
                'depth'  			=> 1,
                'fallback_cb'       => 'ZOLOCoreFrontendWalker::fallback',
                'walker' 			=> new ZOLOCoreFrontendWalker()
                )
                );  
                ?>
      </div>
    </div>
  </div>
</div>
<!-- Full Screen Menu End --> 

<!-- Extended Sidebar Start -->

<div class="extended_sidebar_area">
  <div class="extended_sidebar_content">
    <?php //wp_nav_menu(array( 'theme_location' => 'primary-nav', 'menu_class' => 'main_nav' )); ?>
    <?php if ( is_active_sidebar( 'extended_sidebar' ) ) : ?>
    <div class="extended_sidebar_content_area">
      <?php dynamic_sidebar( 'extended_sidebar' ); ?>
    </div>
    <?php endif; ?>
  </div>
</div>

<!-- Extended Sidebar End --> 

