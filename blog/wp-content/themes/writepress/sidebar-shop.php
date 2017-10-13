<?php
/**
 * The sidebar containing the secondary widget area
 */
if ( is_active_sidebar( 'woo-widgets' ) ) : ?>
	<div class="page-sidebar">
		<div class="sidebar-inner">
			<div class="widget-area">
				<?php dynamic_sidebar( 'woo-widgets' ); ?>
			</div><!-- .widget-area -->
		</div><!-- .sidebar-inner -->
	</div><!-- #tertiary -->
<?php endif; ?>