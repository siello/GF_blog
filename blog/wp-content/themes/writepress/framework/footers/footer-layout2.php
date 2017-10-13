<div class="zolo_footer_row">
<?php if ( is_active_sidebar( 'footer_widget1' ) ) { ?>
<div class="footercolumn footer_column4"><?php dynamic_sidebar('footer_widget1'); ?></div>
<?php } ?>
<?php if ( is_active_sidebar( 'footer_widget2' ) ) { ?>
<div class="footercolumn footer_column4"><?php dynamic_sidebar('footer_widget2'); ?></div>
<?php } ?>
<?php if ( is_active_sidebar( 'footer_widget3' ) ) { ?>
<div class="footercolumn footer_column2"><?php dynamic_sidebar('footer_widget3'); ?></div>
<?php } ?>
</div>