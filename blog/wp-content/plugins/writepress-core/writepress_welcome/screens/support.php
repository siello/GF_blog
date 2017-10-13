<?php
$writepress_theme = wp_get_theme();
$writepress_version = $writepress_theme->get( 'Version' );
?>
<div class="wrap about-wrap writepress-wrap">
	<h1><?php echo __( "Welcome to Writepress!", "writepress" ); ?></h1>
	<div class="about-text"><?php echo __( "Thank you for purchasing Writepress Theme. Design any layout and customize everything without any coding.", "writepress" ); ?>
    </div>
    <div class="writepress-logo"><div class="theme_name"><?php echo __( "Writepress", "writepress" ); ?></div><span class="writepress-version"><?php echo __( "Version", "writepress" ); ?> <?php echo esc_html($writepress_version); ?></span></div>
	<h2 class="nav-tab-wrapper">
    	<?php
		printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', __( "What's New", "writepress" ) );
		printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=writepress-demos' ), __( "Install Demos", "writepress" ) );
		?>
	</h2>
    <img class="writepress_featured_img" src="<?php echo WRITEPRESS_EXTENSIONS_PLUGIN_URL . '/writepress_welcome/images/writepress_new.png'; ?>" alt="writepress"/>
    <h3 class="writepress_featured_title"><?php echo __( "Latest Updates - Writepress", "writepress" ); ?></h3>
    <p><?php echo __( "The clean minimal and easyto use WrodPress theme suitable for all types of blog sites. It comes with powerful admin panel and easy to use Drag n Drop Visual Composer bundled with the theme. There are 6 different single post layout so suit all sorts of blogging requirements, 5 + blog carousel and 15 + different blog designs like masonry, grid, small, medium, large, checkered blog, parallax, full screen, and many more.","writepress" ); ?></p>
    
    <p><?php echo __( "New testimonial designs are added to give more styling options. Check all the changes in change history.", "writepress" ); ?></p>
    
    <div class="writepress_admin_feature_section">
    <ul>
    <li>
    <span class="icon_box"><img src="<?php echo WRITEPRESS_EXTENSIONS_PLUGIN_URL . '/writepress_welcome/images/01.png'; ?>" alt="writepress"/></span>
    <h4><?php echo __( "Submit A Ticket", "writepress" ); ?></h4>
    <p><?php echo __( "With Writepress theme purchase, our team is committed to provide all its users all the theme related support.", "writepress" ); ?></p>
    <a href="http://wpblogtheme.org/" class="button" target="_blank"><?php echo __( "Submit A Ticket", "writepress" ); ?></a>
    </li>
    <li>
    <span class="icon_box"><img src="<?php echo WRITEPRESS_EXTENSIONS_PLUGIN_URL . '/writepress_welcome/images/02.png'; ?>" alt="writepress"/></span>
    <h4><?php echo __( "Documentation", "writepress" ); ?></h4>
    <p><?php echo __( "Everything about how to use Writepress Theme is provided in our extensive documentation and we are updating it as we add new features with every release.", "writepress" ); ?></p>
    <a href="http://wpblogtheme.org/documentation/writepress/" class="button" target="_blank"><?php echo __( "Documentation", "writepress" ); ?></a>
    </li>
    
    </ul>
    </div>
    
    <div class="writepress-thanks">
    	<p class="description"><?php echo __( "Thank you for choosing writepress. We are honored and are fully dedicated to making your experience perfect.", "writepress" ); ?></p>
    </div>
</div>
