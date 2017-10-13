<?php
$writepress_theme = wp_get_theme();
$writepress_version = $writepress_theme->get( 'Version' );

$zolo_url = 'http://wpblogtheme.org/demo/writepress/';
$demos = array(
	'main'		=> array('siteurl'=>'demo1'),
	'demo2'		=> array('siteurl'=>'demo2'),
	'demo3'		=> array('siteurl'=>'demo3'),
	'demo4'		=> array('siteurl'=>'demo4'),
	'demo5'		=> array('siteurl'=>'demo5'),
	'demo6'		=> array('siteurl'=>'demo6'),
	'demo7'		=> array('siteurl'=>'demo7'),
	'demo8'		=> array('siteurl'=>'demo8'),
	'demo9'		=> array('siteurl'=>'demo9'),
	'demo10'	=> array('siteurl'=>'demo10'),
	'demo11'	=> array('siteurl'=>'demo11'),
	'demo12'	=> array('siteurl'=>'demo12'),
	'demo13'	=> array('siteurl'=>'demo13'),
	'demo14'	=> array('siteurl'=>'demo14'),
	'demo15'	=> array('siteurl'=>'demo15'),
	'demo16'	=> array('siteurl'=>'demo16'),
	'demo17'	=> array('siteurl'=>'demo17'),
	'demo18'	=> array('siteurl'=>'demo18'),
	'demo19'	=> array('siteurl'=>'demo19'),
);
?>
<div class="wrap about-wrap writepress-wrap">
	<h1><?php echo __( "Welcome to Writepress!", "writepress" ); ?></h1>

	<div class="updated error importer-notice importer-notice-1" style="display: none;">
		<p><strong><?php echo __( "We're sorry but the demo data could not be imported. It is most likely due to low PHP configurations on your server. There are two possible solutions.", 'writepress-core' ); ?></strong></p>

		<p><strong><?php _e( 'Solution 1:', 'writepress-core' ); ?></strong> <?php _e( 'Import the demo using an alternate method.', 'writepress-core' ); ?><a href="http://wpblogtheme.org/alternate-demo-method/" class="button-primary" target="_blank" style="margin-left: 10px;"><?php _e( 'Alternate Method', 'writepress-core' ); ?></a></p>
		<p><strong><?php _e( 'Solution 2:', 'writepress-core' ); ?></strong> <?php echo sprintf( __( 'Fix the PHP configurations, then use the %s, then reimport.', 'writepress-core' ), '<a href="' . admin_url() . 'plugin-install.php?tab=plugin-information&amp;plugin=wordpress-reset&amp;TB_iframe=true&amp;width=830&amp;height=472' . '">Reset WordPress Plugin</a>' ); ?><a href="<?php echo admin_url( 'admin.php?page=writepress-system-status' ); ?>" class="button-primary" target="_blank" style="margin-left: 10px;"><?php _e( 'System Status', 'writepress-core' ); ?></a></p>
	</div>

	<div class="updated importer-notice importer-notice-2" style="display: none;"><p><strong><?php echo __( "Demo data successfully imported. Now, please install and run", "writepress" ); ?> <a href="<?php echo admin_url();?>plugin-install.php?tab=plugin-information&amp;plugin=regenerate-thumbnails&amp;TB_iframe=true&amp;width=830&amp;height=472" class="thickbox" title="<?php echo __( "Regenerate Thumbnails", "writepress" ); ?>"><?php echo __( "Regenerate Thumbnails", "writepress" ); ?></a> <?php echo __( "plugin once", "writepress" ); ?>.</strong></p></div>

	<div class="updated error importer-notice importer-notice-3" style="display: none;">
		<p><strong><?php echo __( "We're sorry but the demo data could not be imported. It is most likely due to low PHP configurations on your server. There are two possible solutions.", 'writepress-core' ); ?></strong></p>

		<p><strong><?php _e( 'Solution 1:', 'writepress-core' ); ?></strong> <?php _e( 'Import the demo using an alternate method.', 'writepress-core' ); ?><a href="http://wpblogtheme.org/alternate-demo-method/" class="button-primary" target="_blank" style="margin-left: 10px;"><?php _e( 'Alternate Method', 'writepress-core' ); ?></a></p>
		<p><strong><?php _e( 'Solution 2:', 'writepress-core' ); ?></strong> <?php echo sprintf( __( 'Fix the PHP configurations, then use the %s, then reimport.', 'writepress-core' ), '<a href="' . admin_url() . 'plugin-install.php?tab=plugin-information&amp;plugin=wordpress-reset&amp;TB_iframe=true&amp;width=830&amp;height=472' . '">Reset WordPress Plugin</a>' ); ?></p>
	</div>

	<div class="about-text"><?php echo __( "Thank you for purchasing Writepress Theme. Design any layout and customize everything without any coding.", "writepress" ); ?></div>
	<div class="writepress-logo"><div class="theme_name"><?php _e( 'Writepress', 'writepress-core' ); ?></div><span class="writepress-version"><?php echo __( "Version", "writepress" ); ?> <?php echo esc_html($writepress_version); ?></span></div>
	<h2 class="nav-tab-wrapper">
		<?php
		printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=writepress' ), __( "What's New", "writepress" ) );
		printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', __( "Install Demos", "writepress" ) );
		?>
	</h2>
    <?php
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
	// check for plugin using plugin name
	if ( is_plugin_active( 'writepress-importer/writepress-importer.php' ) ) {
		?>
        <div class="writepress-important-notice">
		<p class="about-description"><span><?php echo __( "WARNING! This will overwrite all existing option values, please keep backup and proceed with caution!", "writepress" ); ?></span><br /><?php echo __( "IMPORTANT: The included plugins need to be installed and activated before you install a demo.<br />Installing a demo provides pages, posts, images, theme options, widgets, sliders and more.", "writepress" ); ?></p>
	</div>
        <?php
	} 
	?>
	 
	<div class="writepress-demo-themes">
		<div class="feature-section theme-browser rendered">
			<?php
			// Loop through all demos
			if ( is_plugin_active( 'writepress-importer/writepress-importer.php' ) ) {
			foreach ( $demos as $demo => $demo_details ) { ?>
				<div class="theme">
					<div class="theme-screenshot">
						<img src="<?php echo WRITEPRESS_EXTENSIONS_PLUGIN_URL . '/writepress_welcome/images/' . $demo . '.jpg'; ?>" alt="writepress"/>
					</div>
					<h3 class="theme-name" id="<?php echo esc_attr($demo); ?>"><?php echo 'writepress - ' . esc_attr(ucfirst( $demo )); ?></h3>
					<div class="theme-actions">
						<?php printf( '<a class="button button-primary button-install-demo" data-demo-id="%s" href="#">%s</a>', strtolower( $demo ), __( "Install", "writepress" ) ); ?>
						<?php printf( '<a class="button button-primary" target="_blank" href="%1s">%2s</a>', ( $demo != 'classic' ) ? $zolo_url . $demo_details['siteurl'] : $writepress_url, __( "Preview", "writepress" ) ); ?>
					</div>
					<div class="demo-import-loader preview-all"></div>
					<div class="demo-import-loader preview-<?php echo strtolower( $demo ); ?>"><span class="loader"></span></div>
					<?php if( isset( $demo_details['new'] ) && $demo_details['new'] == true ): ?>
					<div class="plugin-required">
						<?php _e( 'New', 'writepress-core' ); ?>
					</div>
					<?php endif; ?>
				</div>
			<?php }
			}else{
				echo '<h1>';
				_e( 'Please activate Writepress Importer', 'writepress-core' );
				echo '</h1>';
				} ?>
		</div>
	</div>
	<div class="writepress-thanks">
		<p class="description"><?php echo __( "Thank you for choosing writepress.", "writepress" ); ?></p>
	</div>
</div>
