<?php
include get_template_directory().'/framework/variables/variables-footer.php';
?>
<?php //Footer Fix class And Margin Div
 if ($footer_layout_style == 'footer_fixed'){
	echo '<div class="zolo_footer_fixed_content_mar"></div>';
}
?>
</div>
<!--zolo_content_bg_area End-->
</div>
<!--zolo_main_content_area End-->

<?php 
if($back_to_top !== 'hide_backtotop'){
	if($back_to_top == 'sticky_backtotop' || $back_to_top == 'sticky_on_scroll_backtotop'){ ?>
<a href="#" class="<?php echo esc_attr($back_to_top.' '.$back_to_top_style);?> back-to-top"><i class="fa fa-angle-up"></i></a>
<?php }
}?>

<!--zolo_footer_area Start-->

<div class="zolo_footer_area">
  <div class="zolo_footer_container_area " id="<?php echo ($footer_layout_style == 'footer_fixed') ? 'footer_fixed' : 'none'; ?>">
    <?php if($back_to_top!== 'hide_backtotop'){
			if($back_to_top == 'default_backtotop'){?>
			<a href="#" class="default_back-to-top <?php echo esc_attr($back_to_top_style);?>"><i class="fa fa-angle-up"></i></a>
			<?php }
			}?>
    <?php //Footer section start ?>
    <?php // Individual Page Header Show/Hide Condition Start
 
 if($footer_show_hide == 'show'){?>
    <div class="footer" data-parallax="<?php if($footer_layout_style=='footer_parallax'){ echo esc_url($writepress_data["footer_bg_image"]["background-image"]); }?>">
      <?php if($upper_footer_widgets == 'on') : ?>
      <div class="footer-layout-upper <?php echo esc_attr('upperfooter_layout_columns_'.$footer_upper_columns);?>">
        <div class="zolo-container">
          <?php get_template_part('framework/footers/footer-layout-upper'); ?>
        </div>
      </div>
      <?php endif; ?>
      <?php if ( is_active_sidebar( 'footer_widget1' ) || is_active_sidebar( 'footer_widget2' ) || is_active_sidebar( 'footer_widget3' ) || is_active_sidebar( 'footer_widget4' ) ) { ?>
      <div class="footer-widgets <?php echo esc_attr($layout_columns_class);?>">
        <div class="zolo-container">
          <?php   
            $footer_type = $footer_layout_columns;
            get_template_part('framework/footers/footer',$footer_type); 
            ?>
        </div>
      </div>
      <?php } ?>
      <?php if($lower_footer_widgets == 'on') : ?>
      <div class="footer-layout-lower <?php echo esc_attr('lowerfooter_layout_columns_'.$footer_lower_columns);?>">
        <div class="zolo-container">
          <?php get_template_part('framework/footers/footer-layout-lower'); ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <?php }?>
    <?php //Footer section End ?>
    <?php //CopyRight section start ?>
    <?php // Individual Page Header Show/Hide Condition Start
 if($copyright_show_hide == 'show'){
	 ?>
    <div class="copyright <?php echo ($copyright_social_align == 'center') ? 'copyright_social_center': ''; ?>">
      <div class="zolo-container">
        <?php if($footer_social_icon == 'on'){?>
        <div class="copyright_social">
            <?php get_template_part('framework/footer_social_icons'); ?>
        </div>
        <?php }?>
        <div class="copyright_text"><?php echo wp_kses($copyright_text,array(
										'span' => array(
											'class' => array(),
										),
										'i' => array(
											'class' => array(),
										),
										'img' => array(
											'src' => array(),
											'class' => array(),
											'alt' => array(),
										),
										'strong' => array(),
										'em' => array(),
										'br' => array(),
										'a' => array(
											'href' => array(),
											'class' => array(),
											'mailto' => array(),
											'callto' => array()
										)
									)); ?></div>
      </div>
    </div>
    <?php }?>
    <?php //CopyRight section End ?>
  </div>
</div>
<!--zolo_footer_area End-->

</div>
<?php //Site Layout End ?>
</div>
</div>
<?php //Site Layout ?>
<?php wp_footer(); ?>
</body></html>