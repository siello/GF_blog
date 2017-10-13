<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
// Current Page ID
if( !function_exists('writepress_current_page_id') ){
	function writepress_current_page_id() {
		global $writepress_data, $woocommerce; 
		if ((is_front_page() && is_home()) ||
		(get_option('page_for_posts') && is_archive() && !is_post_type_archive()) && !(is_tax('product_cat') || is_tax('product_tag')) || (get_option('page_for_posts') && is_search()) || is_tag() || is_archive() ) {
		//echo 'Default homepage';
		$cur_id = get_option( 'page_for_posts' );
		} elseif ( is_front_page() ) {
		//echo 'static homepage';
		$cur_id = get_the_ID();
		} elseif ( is_home() ) {  	
		//echo 'blog page';
		$cur_id = get_option( 'page_for_posts' );
		} else {
		//echo 'everything else';
		$cur_id = get_the_ID();
		}
		return $cur_id;
	}
}

// Header layout 
if( !function_exists('writepress_header') ){
	function writepress_header() {
		global $writepress_data, $post; 
		
		$header_position = isset($writepress_data["header_position"]) ? $writepress_data["header_position"] : 'Top';
		$header_type = isset($writepress_data["header_layout"]) ? $writepress_data["header_layout"] : 'v1';
		
		// Show/Hide header
		$header_display = '';
		if ( (is_front_page() && is_home()) ||  is_home() ) {
			$cur_id = get_option( 'page_for_posts' );
			$header_display = get_post_meta( $cur_id, 'zt_header_display', true );
		}elseif(is_page() || is_single()){
			$header_display = get_post_meta( $post->ID, 'zt_header_display', true ); 
		}
		
		// Header Postition Top
		if($header_position == 'Top'){ 
			
			// Individual Page Header Show/Hide Condition Start
			if($header_display == 'yes'){
				
				if($header_type == 'v1'){
					get_template_part('framework/headers/preset_header/header1');  
				}elseif($header_type == 'v2') {
					get_template_part('framework/headers/preset_header/header2'); 
				}elseif($header_type == 'v3') {
					get_template_part('framework/headers/preset_header/header3'); 
				}elseif($header_type == 'v4') {
					get_template_part('framework/headers/preset_header/header4');
				}elseif($header_type == 'v5') { 
					get_template_part('framework/headers/preset_header/header5'); 
				}elseif($header_type == 'v6') { 
					get_template_part('framework/headers/preset_header/header6'); 
				}elseif($header_type == 'v7') { 
					get_template_part('framework/headers/preset_header/header7');
				}elseif($header_type == 'v8') {
					get_template_part('framework/headers/preset_header/header8');
				}
				
				}elseif($header_display == 'no'){
					echo '';	
				}else{	
					if($header_type == 'v1'){
						get_template_part('framework/headers/preset_header/header1');  
					}elseif($header_type == 'v2') {
						get_template_part('framework/headers/preset_header/header2'); 
					}elseif($header_type == 'v3') {
						get_template_part('framework/headers/preset_header/header3'); 
					}elseif($header_type == 'v4') {
						get_template_part('framework/headers/preset_header/header4');
					}elseif($header_type == 'v5') { 
						get_template_part('framework/headers/preset_header/header5'); 
					}elseif($header_type == 'v6') { 
						get_template_part('framework/headers/preset_header/header6'); 
					}elseif($header_type == 'v7') { 
						get_template_part('framework/headers/preset_header/header7');
					}elseif($header_type == 'v8') {
						get_template_part('framework/headers/preset_header/header8');
					}
				} 
			//Below Banner Aera 
			
			}elseif($header_position == 'Left'){			
				 // Individual Page Header Show/Hide Condition Start
				if ( (is_front_page() && is_home()) ||  is_home() ) {
					$cur_id = get_option( 'page_for_posts' );
					$header_display = get_post_meta( $cur_id, 'zt_header_display', true );
				 }elseif(is_page() || is_single('zt_portfolio')|| is_single('post')){
					 $header_display = get_post_meta( $post->ID, 'zt_header_display', true ); 
					 }
				if($header_display == 'yes'){
					get_template_part('framework/headers/vertical_left_header'); 
				 
				}elseif($header_display == 'no'){
					echo '';
				}else{
					get_template_part('framework/headers/vertical_left_header'); 
					
				 // Individual Page Header Show/Hide Condition End
				}
			}elseif($header_position == 'Right'){
						
				// Individual Page Header Show/Hide Condition Start
				if ( (is_front_page() && is_home()) ||  is_home() ) {
					$cur_id = get_option( 'page_for_posts' );
					$header_display = get_post_meta( $cur_id, 'zt_header_display', true );
				 }elseif(is_page() || is_single('zt_portfolio')|| is_single('post')){
					 $header_display = get_post_meta( $post->ID, 'zt_header_display', true ); 
					 }
				 if($header_display == 'yes'){
					 
						get_template_part('framework/headers/vertical_right_header');
				
				}elseif($header_display == 'no'){
						echo '';
				}else{
						get_template_part('framework/headers/vertical_right_header');
				 // Individual Page Header Show/Hide Condition End
			}
		}
	}
}

/**
 * Place a cart icon with number of items and total cost in the menu bar.
 */
 
if( !function_exists('writepress_mobile_woocommerce') ){
	function writepress_mobile_woocommerce() {
			global $woocommerce;				
			if ( class_exists( 'WooCommerce' ) ) {	
					
			$viewing_cart = __('View your shopping cart', 'writepress');
			$start_shopping = __('Start shopping', 'writepress');
			$cart_url = $woocommerce->cart->get_cart_url();
			$shop_page_url = esc_url(get_permalink( wc_get_page_id( 'shop' ) ) );
			$cart_contents_count = $woocommerce->cart->cart_contents_count;
			$cart_contents = sprintf(_n('%d', '%d', $cart_contents_count, 'writepress'), $cart_contents_count);
			$cart_total = $woocommerce->cart->get_cart_total();
			
			
			if ($cart_contents_count == 0) {
				$mob_menu_item = '<li><a class="wcmenucart-contents" href="'. esc_url($shop_page_url) .'" title="'. esc_html($start_shopping) .'">';
			} else {
				$mob_menu_item = '<li><a class="wcmenucart-contents" href="'. esc_url($cart_url) .'" title="'. esc_html($viewing_cart) .'">';
			}
			$mob_menu_item .= '<i class="fa fa-shopping-cart"></i> ';
			
			$mob_menu_item .= $cart_contents;//.//' - '. $cart_total;
			$mob_menu_item .= '</a></li>';
			
			echo $mob_menu_item; 
			}
				
				
		}
}

/**
 * Get related posts, filtered by same category which are assigned to $post_id
 */
if( ! function_exists( 'writepress_get_related_posts' ) ) {
	function writepress_get_related_posts( $post_id, $number_posts = 4 ) {
		$query = new WP_Query();
		$args = '';
		if( $number_posts == 0 ) {
			return $query;
		}
		
		$args = wp_parse_args( $args, array(
			'category__in'   => wp_get_post_categories( $post_id ),
			'ignore_sticky_posts' => 0,
			'meta_key'    => '_thumbnail_id',
			'posts_per_page'  => $number_posts,
			'post__not_in'   => array( $post_id ),
		));
		$query = new WP_Query( $args );
		return $query;
	}
}

/**
 * Title Bar
 */
if( ! function_exists( 'writepress_current_page_title_bar' ) ) {
	function writepress_current_page_title_bar( $post_id ) {
	global $writepress_data;
	
	$primary_color = isset($writepress_data['primary_color']) ? $writepress_data['primary_color'] : '#f82eb3';
	
	// Parallax Title Area Start
	
	if ( is_front_page() && is_home() ) {
		// Default homepage
		$cur_id = get_option( 'page_for_posts' );
	} elseif ( is_front_page() ) {
		// static homepage
		$cur_id = get_the_ID();
	} elseif ( is_home() ) {
		// blog page
		$cur_id = get_option( 'page_for_posts' );
	} else {
		//everything else
		$cur_id = get_the_ID();
	}
	
	$titlebar_parallax_bg = get_post_meta( $cur_id, 'zt_titlebar_parallax_bg', true ); 
	
	$page_titlebar_bg_img = get_post_meta( $cur_id, 'zt_titlebar_bg_img', true );
	$page_titlebar_bg_color = get_post_meta( $cur_id, 'zt_titlebar_bg_color', true );
	
	if(isset($writepress_data['page_title_bg']['background-image']) && !empty($writepress_data['page_title_bg']['background-image'])) {
		$admin_titlebar_bg_img = $writepress_data['page_title_bg']["background-image"];
	}else{
		$admin_titlebar_bg_img = '';
		}
	
	if(isset($writepress_data['page_title_bg']['background-color']) && !empty($writepress_data['page_title_bg']['background-color'])) {
		$admin_titlebar_bg_color = $writepress_data['page_title_bg']["background-color"];
	}else{
		$admin_titlebar_bg_color = $primary_color;
		}
	
	$image_url = $bg_color = '';
	
	if($page_titlebar_bg_img || $page_titlebar_bg_color){
			if($page_titlebar_bg_img){
				$image_url = $page_titlebar_bg_img;
			}
			if($page_titlebar_bg_color){
				$bg_color = $page_titlebar_bg_color;
			}
			
	}else{		
			if($admin_titlebar_bg_img){
				$image_url = $admin_titlebar_bg_img;
			}
			if($admin_titlebar_bg_color){
				$bg_color = $admin_titlebar_bg_color;
			}
	}
				
	$page_title_bar = isset($writepress_data["page_title_bar"]) ? $writepress_data["page_title_bar"] : 'on';
	$blog_show_page_title_bar = isset($writepress_data["blog_show_page_title_bar"]) ? $writepress_data["blog_show_page_title_bar"] : 'on';
	$blog_post_title = isset($writepress_data["blog_post_title"]) ? $writepress_data["blog_post_title"] : 'on';
	$page_titlebar_show_hide = get_post_meta( $cur_id, 'zt_titlebar_show_hide', false ); 		
	$breadcrumb_show = isset($writepress_data["breadcrumb_show"]) ? $writepress_data["breadcrumb_show"] : 'on';
	$single_post_title_bar = isset($writepress_data["single_post_title_bar"]) ? $writepress_data["single_post_title_bar"] : 'off';	 
	$page_title_bg_parallax = isset($writepress_data["page_title_bg_parallax"]) ? $writepress_data["page_title_bg_parallax"] : 'off';	
  
	//TitleBar Show/hide
		$title = '';
		if( ! $title ) {
			if ( is_front_page() && is_home() ) {
				//echo 'Default homepage';
				if($blog_show_page_title_bar == 'on'){
						$title = isset($writepress_data['blog_title']) ? $writepress_data['blog_title'] : 'Blog';
				}				
			} elseif ( is_front_page() ) {
			//echo 'static homepage';
				if($page_titlebar_show_hide == 'default' || $page_titlebar_show_hide == ''){
					if($page_title_bar == 'on'){
						$title =  get_the_title( $cur_id );
					} 
				}elseif($page_titlebar_show_hide=='show'){
						$title =  get_the_title( $cur_id );
					}
				
			} elseif ( is_home() ) {  	
				//echo 'blog page';
					if($page_titlebar_show_hide=='default' || $page_titlebar_show_hide==''){
							if($blog_show_page_title_bar == 'on'){
								if(isset($writepress_data['blog_title'])){
									$title = $writepress_data['blog_title'];
								}else{
									$title = get_the_title( $cur_id );
									}
							} 
						}elseif($page_titlebar_show_hide=='show'){
							$title =  get_the_title( $cur_id );
						}
			
			} elseif ( is_singular( 'post' ) ) {
				
				if($page_titlebar_show_hide == 'default' || $page_titlebar_show_hide == ''){					
					if($single_post_title_bar == 'on'){					
						$title = get_the_title( $cur_id );
					} 
				}elseif($page_titlebar_show_hide=='show'){
					$title =  get_the_title( $cur_id );
				}else{
					$title =  get_the_title( $cur_id );
				}
					
			} else {							
				if($page_titlebar_show_hide == 'default' || $page_titlebar_show_hide == ''){
					if($page_title_bar == 'on'){					
						$title = get_the_title( $cur_id );
					} 
				}elseif($page_titlebar_show_hide == 'show'){
					$title =  get_the_title( $cur_id );
				}
			}
		
		if( is_search() ) {
			if($page_title_bar == 'on'){					
					$title = __('Результаты поиска: ', 'writepress') . get_search_query();
			}
			
		}
		
		if( is_404() ) {
			if($page_title_bar == 'on'){					
					$title = __('Error 404 Page', 'writepress');
			}
			
		}
		if( is_archive() ) {
			if($page_title_bar == 'on'){
				if ( is_day() ) {
					$title = __( 'Daily Archives:', 'writepress' ) . get_the_date();
				} else if ( is_month() ) {
					$title = __( 'Monthly Archives:', 'writepress' ) . get_the_date( _x( 'F Y', 'monthly archives date format', 'writepress' ) ) ;
				} elseif ( is_year() ) {
					$title = __( 'Yearly Archives:', 'writepress' ) . get_the_date( _x( 'Y', 'yearly archives date format', 'writepress' ) ) ;
				} elseif ( is_author() ) {
					$curauth = get_user_by( 'id', get_query_var( 'author' ) );
					$title = $curauth->nickname;
				} elseif( is_post_type_archive() ) {				
					$title = post_type_archive_title( '', false );
			
				} else {
					$title = single_cat_title( '', false );
				}
			}
		}
		
			if( class_exists( 'Woocommerce' ) && is_woocommerce() && ( is_product() || is_shop() ) && ! is_search() ) {
				if( ! is_product() ) {
					if($page_title_bar == 'on'){
					$title = woocommerce_page_title( false );
					}
				}
			}
		}
	
		if($title){ 
		?>
		<div class="pagetitle_parallax_section">
		  <div class="pagetitle_parallax" data-parallax="<?php if($titlebar_parallax_bg == 'No'){echo '';}else if($titlebar_parallax_bg == 'Yes'){echo esc_url($image_url);}else{ if($page_title_bg_parallax == 'on'){echo esc_url($image_url); } } ?>" style="background: url(<?php echo esc_url($image_url);?>);">
			<div class="pagetitle_parallax_content">
			  <div class="zolo-container">
				<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id="breadcrumbs">','</p>');
						}
					?>
				<h1 class="entry-title"><?php echo esc_html($title);?></h1>
			  </div>
			</div>
			<div class="overlay-dot"></div>
		  </div>
		</div>
        
		
		<!--Parallax Title Area End--> 
		<?php
		}	
		ob_start();
		$secondary_content = ob_get_contents();
		ob_get_clean();
	}
}

// Show Number of featured images
if( ! function_exists( 'writepress_archive_thumbnail_video' ) ) {
	function writepress_archive_thumbnail_video() {
		global $writepress_data, $post;
		include get_template_directory().'/framework/variables/variables-archive.php';
		include get_template_directory().'/framework/variables/variables-post-loop.php';
		if( has_post_thumbnail() || $post_video ){
				if (!$format_quote && !$format_audio){
				  echo '<div class="post_flexslider">';				  
						//zolo_zilla_likes
						if( function_exists('zolo_zilla_likes') ){ 
							echo '<span class="zolo_zilla_likes_box"> ';
								zolo_zilla_likes();
							echo '</span>';
						}
											
					echo '<ul class="slides">';
					  if($post_video){
					  echo '<li class="slide">';
						echo '<div class="zolo_fluid_video_wrapper"> ';
						echo wp_kses($post_video,array('iframe'=>array(
																		'src'             => array(),
																		'height'          => array(),
																		'width'           => array(),
																		'frameborder'     => array(),
																		'allowfullscreen' => array(),
																	)
																));
                        echo '</div>';
					  echo '</li>';
					 }   
						if ( has_post_thumbnail() ) {
						$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $blog_archive_layout_thumb); 						
					  echo '<li class="slide"><img src="'.esc_url($attachment_image[0]).'"  alt="'.esc_attr( get_bloginfo( 'name' ) ).'"/>';
						if($image_rollover_icons_show_hide == 'show' || $image_rollover_icons_show_hide == ''){
						echo'<span class="overlay"></span> <span class="zolo_blog_icons"> <span class="icons_center">';
						echo '<a class="zolo_blog_icon blog_zoom_icon fancybox" href="'.esc_url($attachment_image[0]).'"> <i class="fa fa-search-plus"></i> </a>';
						echo '<a class="zolo_blog_icon blog_link_icon" href="'.esc_url(get_permalink( $post->ID)).'"> <i class="fa fa-link"></i> </a> </span>';
						echo '</span>';
						}
					  echo '</li>';
					  }
                     if( writepress_number_of_featured_images() > 0 && class_exists( 'kdMultipleFeaturedImages' )){
					  
						$i = 2;
						while($i <= 5): 
						$attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
						if($attachment_new_id){
					  $attachment_image = wp_get_attachment_image_src($attachment_new_id, $blog_archive_layout_thumb);
					  echo '<li class="slide"><img src="'.esc_url($attachment_image[0]).'" alt="'.get_post_meta($attachment_new_id, '_wp_attachment_image_alt', true).'"/>';
						if($image_rollover_icons_show_hide == 'show'  || $image_rollover_icons_show_hide == ''){
						echo '<span class="overlay"></span> <span class="zolo_blog_icons"> <span class="icons_center">';
						echo '<a class="zolo_blog_icon blog_zoom_icon fancybox" href="'.esc_url($attachment_image[0]).'"><i class="fa fa-search-plus"></i></a>';
						echo '<a class="zolo_blog_icon blog_link_icon" href="'.esc_url(get_permalink( $post->ID)).'"><i class="fa fa-link"></i></a>';
						echo '</span> </span>';
						}
					  echo '</li>';
					  } $i++; endwhile; 
					  }
					echo '</ul>';
				  echo '</div>';				 
				  //Post Thumbnail End 
				 }
		
			}
		}
}

// Show Number of featured images
if( ! function_exists( 'writepress_single_layout_thumbnail_video' ) ) {
	function writepress_single_layout_thumbnail_video() {
		global $writepress_data, $post;
		include get_template_directory().'/framework/variables/variables-blog.php';
		include get_template_directory().'/framework/variables/variables-post-loop.php';
		
		$page_single_post_layout = get_post_meta( $post->ID , 'zt_single_post_layout_style', true );
		$admin_single_post_layout_style = isset($writepress_data['single_post_layout_style']) ? $writepress_data['single_post_layout_style'] : 'layout_style1';
		
		if($page_single_post_layout == 'default' || $page_single_post_layout == ''){
			$single_post_layout_value = $admin_single_post_layout_style;
		}else{
			$single_post_layout_value = $page_single_post_layout;
		}
		if(is_single()){
		if($single_post_layout_value == 'layout_style1' || $single_post_layout_value == 'layout_style3'){
			$layout_classes = '';
		}else{
			$layout_classes = 'margin0';
			}
		}else{
			$layout_classes = '';
			}
		if(is_page()){
			$flex_slider_classes = 'page_flexslider';
			}else{
				$flex_slider_classes = '';
				}	
		if( has_post_thumbnail() || $post_video ){
				  echo '<div class="post_flexslider '.esc_attr($layout_classes.''.$flex_slider_classes).'">';				  
						if((is_single() && $single_post_layout_value == 'layout_style1') || (is_front_page() || is_home())){
							//zolo_zilla_likes
							if( function_exists('zolo_zilla_likes') ){ 
								echo '<span class="zolo_zilla_likes_box"> ';
									zolo_zilla_likes();
								echo '</span>';
							}
						}
					echo '<ul class="slides">';
					  if($post_video){
					  echo '<li class="slide">';
						echo '<div class="zolo_fluid_video_wrapper"> ';
						echo wp_kses($post_video,array('iframe'=>array(
																		'src'             => array(),
																		'height'          => array(),
																		'width'           => array(),
																		'frameborder'     => array(),
																		'allowfullscreen' => array(),
																	)
																));
                        echo '</div>';
					  echo '</li>';
					 }   
						if ( has_post_thumbnail() ) {
							if (is_singular('post') || is_page()) {
								$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'writepress_thumb_blog_large'); 
								echo '<li class="slide"><img src="'.esc_url($attachment_image[0]).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'"/> </li>';	
							}else{
								$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $blog_layout_thumb); 						
								echo '<li class="slide"><img src="'.esc_url($attachment_image[0]).'"  alt="'.esc_attr( get_bloginfo( 'name' ) ).'"/>';
								if($image_rollover_icons_show_hide == 'show' || $image_rollover_icons_show_hide == ''){
								echo'<span class="overlay"></span> <span class="zolo_blog_icons"> <span class="icons_center">';
								echo '<a class="zolo_blog_icon blog_zoom_icon fancybox" href="'.esc_url($attachment_image[0]).'"> <i class="fa fa-search-plus"></i> </a>';
								echo '<a class="zolo_blog_icon blog_link_icon" href="'.esc_url(get_permalink( $post->ID)).'"> <i class="fa fa-link"></i> </a> </span>';
								echo '</span>';
						 	}
						}
					  echo '</li>';
					  }
                     if( writepress_number_of_featured_images() > 0 && class_exists( 'kdMultipleFeaturedImages' )){
					  	
						$i = 2;
						while($i <= 5): 
						$attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');						
						if($attachment_new_id){
							if (is_singular('post') || is_page()) {
								$attachment_image = wp_get_attachment_image_src($attachment_new_id, 'writepress_thumb_blog_large');
								echo '<li class="slide">';
								echo '<img src="'.esc_url($attachment_image[0]).'" alt="'.get_post_meta($attachment_new_id, '_wp_attachment_image_alt', true).'" />';
								echo '</li>';
							}else{
								$attachment_image = wp_get_attachment_image_src($attachment_new_id, $blog_layout_thumb);
								echo '<li class="slide"><img src="'.esc_url($attachment_image[0]).'" alt="'.get_post_meta($attachment_new_id, '_wp_attachment_image_alt', true).'"/>';
								if($image_rollover_icons_show_hide == 'show'  || $image_rollover_icons_show_hide == ''){
									echo '<span class="overlay"></span> <span class="zolo_blog_icons"> <span class="icons_center">';
									echo '<a class="zolo_blog_icon blog_zoom_icon fancybox" href="'.esc_url($attachment_image[0]).'"><i class="fa fa-search-plus"></i></a>';
									echo '<a class="zolo_blog_icon blog_link_icon" href="'.esc_url(get_permalink( $post->ID)).'"><i class="fa fa-link"></i></a>';
									echo '</span> </span>';
									}
								echo '</li>';
							}
					  	} 
					  $i++; endwhile; 
					  }
					echo '</ul>';
					if(is_single()){
					if($single_post_layout_value == 'layout_style4'){
						echo '<div class="post_title_caption">';
						echo '<div class="zolo-container">';
						$post_title_position = 'below';
						if($post_title_position == 'below'){
							writepress_entry_meta($post_meta,$format_quote, $post_title_alignment,$post_title_position);
						}
						echo '</div>';
						echo '</div>';
					}
					}
				  echo '</div>';				 
				  //Post Thumbnail End 
		
			}
		}
}
// Show Number of featured images
if( ! function_exists( 'writepress_number_of_featured_images' ) ) {
	function writepress_number_of_featured_images() {
		global $writepress_data, $post;
		$number_of_images = 0;
		if(class_exists( 'kdMultipleFeaturedImages' )){
		
			if( has_post_thumbnail() && get_post_meta( $post->ID, 'zt_show_first_featured_image', true ) != 'yes' ) {
				$number_of_images++;
			}
		
			for( $i = 2; $i <= 5; $i++ ) {
				$attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, $post->post_type );
		
				if( $attachment_new_id ) {
					$number_of_images++;
				}
			}
		}
		return $number_of_images;
	}
}

// Display navigation to next/previous set of posts when applicable.
if ( ! function_exists( 'writepress_paging_nav' ) ) {
	function writepress_paging_nav() {
		global $wp_query;
	
		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 )
			return;
		?>
	
	<nav class="navigation paging-navigation">
	  <h1 class="screen-reader-text">
		<?php _e( 'Posts navigation', 'writepress' ); ?>
	  </h1>
	  <div class="nav-links">
		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous">
		  <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'writepress' ) ); ?>
		</div>
		<?php endif; ?>
		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next">
		  <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'writepress' ) ); ?>
		</div>
		<?php endif; ?>
	  </div>
	  <!-- .nav-links --> 
	</nav>
	<!-- .navigation -->
	<?php
	}
}

if ( ! function_exists( 'writepress_single_page_nav' ) ) {
	//Display navigation to next/previous post when applicable.
	function writepress_single_page_nav() {
		
		global $post, $writepress_data;
		
		$post_navigation_style = isset($writepress_data["post_navigation_style"]) ? $writepress_data["post_navigation_style"] : 'style1';
			
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
	
		if ( ! $next && ! $previous )
			return;		
			$pagination = 'navigation_'.$post_navigation_style;
			echo '<nav class="navigation post-navigation '.$pagination.'">';
			
			if($post_navigation_style == 'style1'){
				
				echo '<div class="nav-links">';
				previous_post_link( '%link', _x( '<span class="meta-nav post-meta-nav"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Предыдущий</span><span class="post-meta-nav-title">%title</span>', 'Previous post link', 'writepress' ) );
				
				next_post_link( '%link', _x('<span class="meta-nav post-meta-nav">Следующий <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span><span class="post-meta-nav-title">%title</span>', 'Next post link', 'writepress' ) );
				echo '</div>';
				
			}elseif($post_navigation_style == 'style2'){
				$previous_post = get_previous_post();
				$next_post = get_next_post();
				if(empty($next_post) && $previous_post){
						$only_class = 'previous_only';
					}else if($next_post && empty($previous_post)){
						$only_class = 'next_only';
					}else{
						$only_class = '';
						}
				if($writepress_data["post_navigation_button_link_source"] == 'page'){
						$portfolio_navigation_button_link = get_page_link($writepress_data['post_navigation_page_select']);
					}else if($writepress_data["post_navigation_button_link_source"] == 'url'){
						$portfolio_navigation_button_link = $writepress_data['post_navigation_page_url'];
					}else{
						$portfolio_navigation_button_link = '';
					}
				echo '<div class="nav-links '.$only_class.'">';
				previous_post_link( '%link', _x('<i class="fa fa-angle-left" aria-hidden="true"></i>', 'Previous post link', 'writepress' ) );
				
				echo $portfolio_parent_link = ($post_navigation_style == 'style2') ? '<a href="'.esc_url($portfolio_navigation_button_link).'"><i class="fa fa-th"></i></a>' : '';
				
				next_post_link( '%link', _x('<i class="fa fa-angle-right" aria-hidden="true"></i>', 'Next post link', 'writepress' ) );
				echo '</div>';
				
			}elseif($post_navigation_style == 'style3'){
							echo '<div class="nav-links">';
							$previous_post = get_previous_post();
							$next_post = get_next_post();
							
							 if(!empty($previous_post)) {
							  $previous_post_id = $previous_post->ID;
							  $post_thumbnail_id = get_post_thumbnail_id($previous_post_id);
							  
							   if ( has_post_thumbnail() ) {
								$attachment_image_src = wp_get_attachment_image_src($post_thumbnail_id,'thumbnail');
								$attachment_image = $attachment_image_src[0];
							   }else{
								   $attachment_image = '';
								   }
							  $prev_attachment_image = $attachment_image ? '<img src='.esc_url($attachment_image).' alt="'.esc_attr( get_bloginfo( 'name' ) ).'">': '';
							 
							   echo '<a href="'.esc_url(get_permalink($previous_post_id)).'" class="pagination_button previous_button">
							   <div class="pagination_icon"><i class="fa fa-angle-left"></i></div>
							   <div class="pagination_thumb_area">
							   <div class="pagination_thumb">'.$prev_attachment_image.'</div>
							   <div class="pagination_caption"><span class="title">'.esc_attr($previous_post->post_title).'</span></div></div></a>';
							 }
							 
							 
							if(!empty($next_post)) {
							 $next_post_id = $next_post->ID;   
							 $post_thumbnail_id = get_post_thumbnail_id($next_post_id);
							  
							  if ( has_post_thumbnail() ) {
								$attachment_image_src = wp_get_attachment_image_src($post_thumbnail_id,'thumbnail');
								$attachment_image = $attachment_image_src[0];
							   }else{
								   $attachment_image = '';
								   }
							 $next_attachment_image = $attachment_image ? '<img src='.esc_url($attachment_image).' alt="'.esc_attr( get_bloginfo( 'name' ) ).'">': '';
							 echo '<a href="'.esc_url(get_permalink($next_post_id)).'" class="pagination_button next_button">
							 <div class="pagination_icon"><i class="fa fa-angle-right"></i></div>
							 <div class="pagination_thumb_area">
							  <div class="pagination_thumb">'.$next_attachment_image.'</div>
							  <div class="pagination_caption"><span class="title">'.esc_attr($next_post->post_title).'</span></div></div></a>'; 
							}
							echo '</div>';
					}else{
					
					$next_post = get_next_post();
					$previous_post = get_previous_post();
					if(empty($next_post) && $previous_post){
						$only_class = 'previous_only';
					}else if($next_post && empty($previous_post)){
						$only_class = 'next_only';
					}else{
						$only_class = '';
						}
					echo '<div class="nav-links '.$only_class.'">';
						if(!empty($previous_post)) {
							$previous_post_id = $previous_post->ID;
							$post_thumbnail_id = get_post_thumbnail_id($previous_post_id);
							
								if ( has_post_thumbnail() ) {
									$attachment_image_src = wp_get_attachment_image_src($post_thumbnail_id,'full');
									$attachment_image = $attachment_image_src[0];
								}else{
									$attachment_image = '';
									}
						
								echo '<a href="'.esc_url(get_permalink($previous_post_id)).'" class="pagination_button previous_button">
								<div class="pagination_bg" style="background-image: url('.$attachment_image.');"></div>
								<div class="pagination_caption"><span class="pagination_caption_box"><span class="pagination_icon"><i class="fa fa-angle-left"></i></span><span class="title">'.esc_attr($previous_post->post_title).'</span></span></div></a>';
						}
					
					if(!empty($next_post)) {
						$next_post_id = $next_post->ID;			
						$post_thumbnail_id = get_post_thumbnail_id($next_post_id);
							
							if ( has_post_thumbnail() ) {
									$attachment_image_src = wp_get_attachment_image_src($post_thumbnail_id,'full');
									$attachment_image = $attachment_image_src[0];
								}else{
									$attachment_image = '';
									}
						
						echo '<a href="'.esc_url(get_permalink($next_post_id)).'" class="pagination_button next_button">
						<div class="pagination_bg" style="background-image: url('.$attachment_image.');"></div>
						<div class="pagination_caption"><span class="pagination_caption_box"><span class="title">'.esc_attr($next_post->post_title).'</span><span class="pagination_icon"><i class="fa fa-angle-right"></i></span></span></div></a>';	
					}
					
					}
			echo '</div>';	
			
			echo '</nav>';
	  
	}
}


if ( ! function_exists( 'writepress_entry_date' ) ) {
//Print HTML with date information for current post.
function writepress_entry_date( $echo = true ) {
	
	global $writepress_data;        
	
	if($writepress_data["blog_layout"] == 'small' || $writepress_data["blog_layout"] == 'medium' || $writepress_data["blog_layout"] == 'large'){
			$icon = 'show';
		}else{
			$icon = 'hide';
			}
			
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'writepress' );
	else
		$format_prefix = '%2$s';

	if($icon == 'show'){ 
	
	$date = sprintf( '<li><span class="date"><span class="meta_label"><i class="fa fa-clock-o"></i></span><a href="%1$s" title="%2$s" rel="bookmark">%3$s</a></span></li>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'writepress' ), the_title_attribute( 'echo=0' ) ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);
	}else{
		
		$date = sprintf( '<li><span class="date"><span class="meta_label">Published:</span><a href="%1$s" title="%2$s" rel="bookmark">%3$s</a></span></li>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'writepress' ), the_title_attribute( 'echo=0' ) ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);
		}
		
	if ( $echo ){echo $date;}
	
	return $date;
	
	}
}

if ( ! function_exists( 'writepress_entry_meta' ) ) {
//Print HTML with date information for current post.
	function writepress_entry_meta( $post_meta,$format_quote, $post_title_alignment,$post_title_position) {
	global $writepress_data; 
	
	$post_category_position = isset($writepress_data['post_category_position']) ? $writepress_data['post_category_position'] : 'above';
	$post_category_design = isset($writepress_data['post_category_design']) ? $writepress_data['post_category_design'] : 'box';
	
	
	//if not quote Start
	if (!$format_quote){
		echo '<div class="post_title_area '.$post_title_alignment.' title_position_'.$post_title_position.'">';
		
		// categories list
		if($post_category_position == 'above'){
			if($post_category_design == 'rounded' || $post_category_design == 'box'){
				$categories_list = get_the_category_list( __( '&nbsp;', 'writepress' ) );
			}else{
				$categories_list = get_the_category_list( __( ' / ', 'writepress' ) );
			}
			if ( $categories_list ) {
				echo '<div class="postcategory_area postcategory_above">';
				if($post_title_alignment == 'right' || $post_title_alignment == 'center'){
						if($post_category_design == 'image'){echo '<img class="category_design_img category_left" src="'.esc_url($writepress_data['blog_category_design_img']['url']).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'"/>';}
					}
				//echo '<span class="categories-links above '.esc_attr($post_category_design).'">';
				//echo $categories_list;
				echo '</span>';
				if($post_title_alignment == 'left' || $post_title_alignment == 'center'){
						if($post_category_design == 'image'){echo '<img class="category_design_img category_right" src="'.esc_url($writepress_data['blog_category_design_img']['url']).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'"/>';}
					}
				echo '</div>';
			}
		}
		
		// Post title
		//$post_title_separator_show = isset($writepress_data['post_title_separator_show_hide']) ? $writepress_data['post_title_separator_show_hide'] : 'hide';
		//$blog_post_title = isset($writepress_data["blog_post_title"]) ? $writepress_data["blog_post_title"] : 'on';
		
		if ( is_single() ) {
		if($blog_post_title == 'on'){
			printf(	'<h1 class="entry-title">%s</h1>', get_the_title() );
			if($post_title_separator_show == 'show'){echo '<div class="post_title_separator"><img src="'.esc_url($writepress_data['post_title_separator_img']['url']).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'"/></div>';}
		}
		}else{
		printf(	'<h1 class="entry-title"><a href="%s" title="%s">%s</a></h1>', esc_url(get_permalink()), the_title_attribute( 'echo=0' ), get_the_title() );
		if($post_title_separator_show == 'show'){echo '<div class="post_title_separator"><img src="'.esc_url($writepress_data['post_title_separator_img']['url']).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'"/></div>';}
		}
		
		// Post Meta
		if($post_meta == true){
			echo '<ul class="entry_meta_list">';	
			$format_prefix = '%2$s';
			$date = sprintf( '<li><span class="date"><span class="meta_label"></span><a href="%1$s" title="%2$s" rel="bookmark">%3$s</a></span></li>',
			esc_url( get_permalink() ),
			esc_attr( sprintf( __( 'Permalink to %s', 'writepress' ), the_title_attribute( 'echo=0' ) ) ),
			esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
			);
			echo $date;	
			
			if($post_category_position == 'below'){
					$categories_list = get_the_category_list( __( ' / ', 'writepress' ) );
				if ( $categories_list ) {
					echo '<li class="categories-links">';
					echo $categories_list;
					echo '</li>';
				}
			}
			
			printf( '<li><span class="author-list"><span class="meta_label">'.__('By','writepress').' </span><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></li>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'writepress' ), get_the_author() ) ),
			get_the_author()
			); 
			
			if ( comments_open() && ! is_single() ) : 
				echo '<li><span class="comments-link">';
				comments_popup_link( '0 comments ', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); 
				echo '</span></li>';
			endif; 
			echo '</ul>';
		}
		echo '</div>';
		}
	
	}
}

if ( ! function_exists( 'writepress_tags' ) ) {
	function writepress_tags() {

	// Get Tags for posts.
	$tags_list = get_the_tag_list( '');
	
		if ( $tags_list ) {
		$html = '<div class="zolo_post_tags"><h5 class="tag_title">'.__("Tags:", "writepress").'</h5><ul class="single_tag_list">';
		$html .= "<li>".$tags_list."</li>";
		$html .= '</ul></div>';
		echo $html;
		}
	}
}

//writepress_shortcodes function
if ( ! function_exists( 'writepress_shortcodes_entry_meta' ) ) {
	function writepress_shortcodes_entry_meta($posttitlealignment,$posttitleposition, $titleseparatorimg1, $posttitleseparatorshowhide, $categoryposition, $categorydesign, $categorydesignimg1, $postmetashowhide ) {
	echo '<div class="post_title_area '.$posttitlealignment.' title_position_'.$posttitleposition.'">';
	//Categories Name
	if($categoryposition == 'above'){

	if($categorydesign == 'rounded' || $categorydesign == 'box'){
		$categories_list = get_the_category_list(' ');
	}else{
		$categories_list = get_the_category_list( __( ' / ', 'writepress' ) );
		}
		
	if ( $categories_list ) {
		echo '<div class="postcategory_area postcategory_above">';
		if($posttitlealignment == 'right' || $posttitlealignment == 'center'){
			if($categorydesign == 'image'){echo '<img class="category_design_img category_left" src="'.esc_url($categorydesignimg1).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'"/>';}}
			
		echo '<span class="categories-links  '.esc_attr($categorydesign).'">';
		echo $categories_list;
		echo '</span>';
		
		if($posttitlealignment == 'left' || $posttitlealignment == 'center'){
			if($categorydesign == 'image'){echo '<img class="category_design_img category_right" src="'.esc_url($categorydesignimg1).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'"/>';}}
			
		echo '</div>';
		} 
	}
	
	//Title
	printf(	'<h2 class="entry-title"><a href="%s" title="%s">%s</a></h2>', esc_url(get_permalink()), the_title_attribute( 'echo=0' ), get_the_title() );
	if($posttitleseparatorshowhide == 'show'){echo '<div class="post_title_separator"><img src="'.esc_url($titleseparatorimg1).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'"/></div>';}
		
	
	if($postmetashowhide == 'show'){
	echo '<ul class="entry_meta_list">';	
	//Posted Date
	$format_prefix = '%2$s';
	$date = sprintf( '<li><span class="date"><span class="meta_label"></span><a href="%1$s" title="%2$s" rel="bookmark">%3$s</a></span></li>',
	esc_url( get_permalink() ),
	esc_attr( sprintf( __( 'Permalink to %s', 'writepress' ), the_title_attribute( 'echo=0' ) ) ),
	esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);
	echo $date;	
	
	//Categories Name
	if($categoryposition == 'below'){
	$categories_list = get_the_category_list( __( ' / ', 'writepress' ) );
	if ( $categories_list ) {
		echo '<li class="categories-links">';
		echo $categories_list;
		echo '</li>';
	}
	}
	
	//Author Name
	printf( '<li><span class="author-list"><span class="meta_label">'.__('By','writepress').' </span><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></li>',
	esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
	esc_attr( sprintf( __( 'View all posts by %s', 'writepress' ), get_the_author() ) ),
	get_the_author()
	); 
	
	if ( comments_open() && ! is_single() ) : 
	echo '<li><span class="comments-link">';
	comments_popup_link( '0 comments ', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); 
	echo '</span></li>';
	endif; 
	echo '</ul>';
	}
		
	echo '</div>';
		

	}
}

if ( ! function_exists( 'writepress_shortcodes_entry_meta_for_shortcode' ) ) {
	function writepress_shortcodes_entry_meta_for_shortcode( $show_date = 1, $show_cat = 1, $show_tag = 1, $show_author = 1, $show_comment = 1, $show_likes = 1 , $show_avatar = 1 ,$categorydesign = '', $posttitlealignment = '', $categorydesignimg1 = '') {
		if(1 == $show_cat){
			if($categorydesign == 'rounded' || $categorydesign == 'box'){
				$categories_list = get_the_category_list( __( '&nbsp;', 'writepress' ) );
			}else{
				$categories_list = get_the_category_list( __( ' / ', 'writepress' ) );
				}
				
			if ( $categories_list ) {
				echo '<div class="postcategory_area">';
				if($posttitlealignment == 'right' || $posttitlealignment == 'center'){
					if($categorydesign == 'image'){echo '<img class="category_design_img category_left" src="'.esc_url($categorydesignimg1).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'"/>';}}
					
				echo '<span class="categories-links  '.esc_attr($categorydesign).'">';
				echo $categories_list;
				echo '</span>';
				
				if($posttitlealignment == 'left' || $posttitlealignment == 'center'){
					if($categorydesign == 'image'){echo '<img class="category_design_img category_right" src="'.esc_url($categorydesignimg1).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'"/>';}}
				echo '</div>';
			} 
		}
		
		if(1 == $show_author || 1 == $show_comment || 1 == $show_likes || 1 == $show_date || 1 == $show_tag){
			echo '<div class="writepress_postmeta_area"><ul class="writepress_postmeta">';
		}
		
		if(1 == $show_date){
			//Posted Date
			$format_prefix = '%2$s';
			$date = sprintf( '<li><span class="date"><span class="meta_label"></span><a href="%1$s" title="%2$s" rel="bookmark">%3$s</a></span></li>',
			esc_url( get_permalink() ),
			esc_attr( sprintf( __( 'Permalink to %s', 'writepress' ), the_title_attribute( 'echo=0' ) ) ),
			esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
			);
			echo $date;	
		}
		
		if(1 == $show_author){
			//Author Name
			if(1 == $show_avatar){
				printf( '<li class="author-list"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%4$s %3$s</a></li>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'writepress' ), get_the_author() ) ),
				get_the_author(),
				get_avatar(get_the_author_meta( 'ID' ), 20)
				); 
			}else{
				printf( '<li class="author-list">'.__('By','writepress').' <a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></li>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'writepress' ), get_the_author() ) ),
				get_the_author()
				); 
				}
		}
	
		if( 1 == $show_tag ){
			$tags_list = get_the_tag_list( '', ', ' );
			if ( $tags_list ) {
				printf( '<li class="tags-links"><strong>%1$s </strong>%2$s</li>',
				_x( 'Tagged : ', 'Used before tag names.', 'writepress' ),
				$tags_list
			);
			}
		}
	
		if(1 == $show_comment){
			//Comments
			if ( comments_open() && ! is_single() ) { 
			echo '<li class="comments-link">';
			comments_popup_link( '<i class="fa fa-comment-o"></i> 0', '<i class="fa fa-comment-o"></i> 1 ', '<i class="fa fa-comment-o"></i> % ', 'comments-link', 'Comments are off for this post'); 
			echo '</li>';
			};
		}
		
		if(1 == $show_likes){
			//Likes
			if( function_exists('zolo_zilla_likes') ){ 
				echo '<li class="zolo_zilla_likes_list"> ';
				zolo_zilla_likes();
				echo '</li>';
			}
		}
		
		if(1 == $show_author || 1 == $show_comment || 1 == $show_likes || 1 == $show_date || 1 == $show_tag){
			echo '</ul></div>';
		}
	}
}
// Pagination
if ( !function_exists( 'writepress_pagination' ) ) {
	
	function writepress_pagination() {
		
		$prev_arrow = is_rtl() ? '<' : '<';
		$next_arrow = is_rtl() ? '>' : '>';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
	
}	


// Header main menu
if ( !function_exists( 'writepress_preset_custom_top_header_main_menu' ) ) {
	function writepress_preset_custom_top_header_main_menu(){
	 
	 global $writepress_data, $woocommerce;  
	 $header_main_menu = isset($writepress_data["main_menu_design"]) ? $writepress_data["main_menu_design"] : 'menu1';
	 $dropdown_loading = isset($writepress_data["dropdown_loading"]) ? $writepress_data["dropdown_loading"] : 'dropdown_loading_fade';
	
		if($header_main_menu == 'menu1'){  
			$menu_design_name = 'menu_hover_design_none'; 
			$menu_hover_styles = '';	
		}elseif($header_main_menu == 'menu2'){ 
			$menu_design_name = 'menu_hover_design2';
			$menu_hover_styles = '';
		}elseif($header_main_menu == 'menu3'){  
			$menu_design_name = 'menu_hover_design3';
			$menu_hover_styles = '';
		}elseif($header_main_menu == 'menu4'){  
			$menu_design_name = 'menu_hover_design4';
			$menu_hover_styles = '';
		}elseif($header_main_menu == 'menu4'){  
			$menu_design_name = 'menu_hover_design4';
			$menu_hover_styles = '';
		}elseif($header_main_menu == 'menu_hover_style1'){ 
			$menu_design_name = 'menu_hover_design_none'; 
			$menu_hover_styles = 'menu_hover_styles menu_hover_style1';
		}elseif($header_main_menu == 'menu_hover_style2'){  
			$menu_design_name = 'menu_hover_design_none'; 
			$menu_hover_styles = 'menu_hover_styles menu_hover_style2';
		}elseif($header_main_menu == 'menu_hover_style3'){  
			$menu_design_name = 'menu_hover_design_none'; 
			$menu_hover_styles = 'menu_hover_styles menu_hover_style3';
		}elseif($header_main_menu == 'menu_hover_style4'){  
			$menu_design_name = 'menu_hover_design_none'; 
			$menu_hover_styles = 'menu_hover_styles menu_hover_style4';
		}else{
			$menu_design_name = '';
			$menu_hover_styles = ''; 
		} 
	 
	 echo '<li><div class="navigation '.$header_main_menu .' '.$dropdown_loading.' '.$menu_hover_styles.'">';
	 echo '<nav id="site-navigation" class="zolo-navigation main-navigation">';
		wp_nav_menu(  
			array(  
				'theme_location'  => 'primary-nav', 
				'container'       => false,            
				'container_id'    => 'main-nav',  
				'container_class' => '',  
				'menu_class' => 'nav zolo-navbar-nav '.$menu_design_name,
				'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'menu_id'         => 'primary_menu' ,
				'fallback_cb'       => 'ZOLOCoreFrontendWalker::fallback',
				'walker'    => new ZOLOCoreFrontendWalker()
			)
		);  
	 echo '</nav>';
	 echo '</div></li>';
	 
	}
}

// Header Logo
if ( !function_exists( 'writepress_header_logo' ) ) {
	function writepress_header_logo(){
		global $writepress_data;	
		$header_sticky_opt = isset($writepress_data["header_sticky_opt"]) ? $writepress_data["header_sticky_opt"] : 'on';
		$header_layout = isset($writepress_data['header_layout']) ? $writepress_data['header_layout'] : 'v1';			
		$middle_menu_break_point = $header_layout == 'v8' ? 'zolo-middle-logo-menu-logo' : '';
		$logo_url = isset($writepress_data['logo']['url']) ? $writepress_data['logo']['url'] : '';
		$logo_retina_url = isset($writepress_data['logo_retina']['url']) ? $writepress_data['logo_retina']['url'] : '';
		
		if($logo_url){
			echo '<li class="'.$middle_menu_break_point.'">';
			echo '<div class="logo-box"><a href="'.esc_url( home_url( '/' ) ).'">';
			echo '<img src="'.esc_url($logo_url).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="logo" />';
			if($logo_retina_url !== ''){
				echo '<img src="'.esc_url($logo_retina_url).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="retina_logo" />';
			}	
			echo '</a></div>';
			if($header_sticky_opt == 'on'){
				echo '<div class="logo-box sticky_logo"> <a href="'.esc_url( home_url( '/' ) ).'">';
				if($writepress_data['sticky_header_logo_showhide'] == 'on' && $writepress_data['sticky_logo']['url'] !== ''){             
						echo '<img src="'.esc_url($writepress_data['sticky_logo']['url']).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="logo" />';
						if($writepress_data['retina_sticky_logo']['url'] !== ''){                        
							echo '<img src="'.esc_url($writepress_data["retina_sticky_logo"]['url']).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="retina_logo" />';
						}
				}else{ 
					echo '<img src="'.esc_url($writepress_data['logo']['url']).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).' class="logo" /> ';          
					if($writepress_data['logo_retina']['url'] !== ''){ 
						echo '<img src="'.esc_url($writepress_data["logo_retina"]['url']).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="retina_logo" />';
					}
				}
			echo '</a></div>';
			}
			echo '</li>';
		}else{
			echo '<li class="'.$middle_menu_break_point.'">';
		   	echo '<div class="logo_text">';
			if ( is_front_page() ) :
            	echo '<h1 class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" rel="home">'.esc_attr( get_bloginfo( 'name' ) ).'</a></h1>';
            else :
            	echo '<p class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" rel="home">'.esc_attr( get_bloginfo( 'name' ) ).'</a></p>';
			endif;
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : 
				echo '<p class="site-description">'.$description.'</p>';
			endif; 
		   	echo '</div>';
		   	echo '</li>';
			}	
	}
}

// Mobile Menu Active
if ( !function_exists( 'writepress_mobile_menu' ) ) {
	function writepress_mobile_menu(){
		echo '<nav id="site-navigation" class="zolo-navigation main-navigation header_style7_menu">';
			wp_nav_menu(  
			array(  
				'theme_location'  => 'primary-nav', 
				'container'       => false,            
				'container_id'    => 'main-nav',  
				'container_class' => '',  
				'menu_class' => 'nav zolo-navbar-nav ',
				'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'menu_id'         => 'primary_menu' ,
				'fallback_cb'       => 'ZOLOCoreFrontendWalker::fallback',
				'walker'    => new ZOLOCoreFrontendWalker()
			)
		);  
		echo '</nav>';
	}
}

// Social Sharing
if ( !function_exists( 'writepress_social_sharing' ) ) {
	function writepress_social_sharing(){
		global $post, $writepress_data;
		$social_share_style = isset($writepress_data['social_share_style']) ? $writepress_data['social_share_style'] : 'default';
		$sharing_facebook = isset($writepress_data['sharing_facebook']) ? $writepress_data['sharing_facebook'] : 'on';
		$sharing_twitter = isset($writepress_data['sharing_twitter']) ? $writepress_data['sharing_twitter'] : 'on';
		$sharing_linkedin = isset($writepress_data['sharing_linkedin']) ? $writepress_data['sharing_linkedin'] : 'on';
		$sharing_tumblr = isset($writepress_data['sharing_tumblr']) ? $writepress_data['sharing_tumblr'] : 'on';
		$sharing_google = isset($writepress_data['sharing_google']) ? $writepress_data['sharing_google'] : 'on';
		$sharing_pinterest = isset($writepress_data['sharing_pinterest']) ? $writepress_data['sharing_pinterest'] : 'on';
		$sharing_email = isset($writepress_data['sharing_email']) ? $writepress_data['sharing_email'] : 'on';
		?>
		<ul class="social-networks <?php echo 'social_share_style_'.$social_share_style;?>">
			<?php if($sharing_facebook == 'on'): ?>
			<li class="facebook"> <a href="http://www.facebook.com/sharer.php?s=100&p&#91;url&#93;=<?php esc_url(the_permalink()); ?>&p&#91;title&#93;=<?php esc_attr(the_title()); ?>" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
			<?php endif; ?>
			<?php if($sharing_twitter == 'on'): ?>
			<li class="twitter"> <a href="http://twitter.com/home?status=<?php esc_attr(the_title()); ?> <?php esc_url(the_permalink()); ?>" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i></a></li>
			<?php endif; ?>
			<?php if($sharing_linkedin == 'on'): ?>
			<li class="linkedin"> <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php esc_attr(the_title()); ?>" target="_blank" rel="nofollow"><i class="fa fa-linkedin"></i></a> </li>
			<?php endif; ?>
			<?php if($sharing_tumblr == 'on'): ?>
			<li class="tumblr"> <a href="http://www.tumblr.com/share/link?url=<?php echo urlencode(esc_url(get_permalink())); ?>&amp;name=<?php echo urlencode($post->post_title); ?>&amp;description=<?php echo urlencode(esc_attr(get_the_excerpt())); ?>" target="_blank" rel="nofollow"> <i class="fa fa-tumblr"></i> </a></li>
			<?php endif; ?>
			<?php if($sharing_google == 'on'): ?>
			<li class="google"> <a href="https://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>" onclick="javascript:window.open(this.href,
			'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" rel="nofollow"> <i class="fa fa-google-plus"></i> </a></li>
			<?php endif; ?>
			<?php if($sharing_pinterest == 'on'): ?>
			<li class="pinterest">
			<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
			<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(esc_url(get_permalink())); ?>&amp;description=<?php echo urlencode($post->post_title); ?>&amp;media=<?php echo urlencode($full_image[0]); ?>" target="_blank" rel="nofollow"> <i class="fa fa-pinterest"></i> </a> </li>
			<?php endif; ?>
			<?php if($sharing_email == 'on'): ?>
			<li class="email"> <a href="mailto:?subject=<?php esc_attr(the_title()); ?>&amp;body=<?php esc_url(the_permalink()); ?>"> <i class="fa fa-envelope-o"></i> </a></li>
			<?php endif; ?>
		</ul>
<?php }
}

// Comment	
if ( !function_exists( 'writepress_comment' ) ) {	
	function writepress_comment( $comment, $args, $depth ) {
		$add_below = ''; ?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
					
					<div class="comment-author vcard">
							<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>						
						</div>
					<div class="comment-content">
					<?php
						/* translators: %s: comment author link */
						printf( '<h4 class="fn">%s</h4>', get_comment_author_link( $comment ) );?>
					<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<div class="reply">',
						'after'     => '</div>'
						) ) );
					?>
					<footer class="comment-meta">
						
						
					<!-- .comment-author -->
						<div class="comment-metadata">
							<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
								<time datetime="<?php comment_time( 'c' ); ?>">
									<?php
										/* translators: 1: comment date, 2: comment time */
										printf( __( '%1$s at %2$s','writepress' ), get_comment_date( '', $comment ), get_comment_time() );
									?>
								</time>
							</a>
							<?php edit_comment_link( __( 'Edit', 'writepress' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!-- .comment-metadata -->
	
						<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'writepress' ); ?></p>
						<?php endif; ?>
					</footer>
						<?php comment_text(); ?>
					</div><!-- .comment-content -->
	
					
				</article>
		<?php
	}
}

// Sidebar Class
if ( !function_exists( 'writepress_sidebar_and_class' ) ) {	
	function writepress_sidebar_and_class($sidebar_class, $sidebar, $post_type){
		
	global $post, $writepress_data;
	
	
	$zolo_sidebar_position = get_post_meta( $post->ID , 'zt_sidebar_position', true );
	$zolo_sidebar_left_position = get_post_meta( $post->ID , 'zt_sidebar_left_position', true );
	$zolo_sidebar_right_position = get_post_meta( $post->ID , 'zt_sidebar_right_position', true );
	
	$admin_sidebar_position = isset($writepress_data["blogposts_sidebar_position"]) ? $writepress_data["blogposts_sidebar_position"] : 'left';
	$admin_left_sidebar = isset($writepress_data["blogposts_left_sidebar"]) ? $writepress_data["blogposts_left_sidebar"] : 'sidebar';
	$admin_right_sidebar = isset($writepress_data["blogposts_right_sidebar"]) ? $writepress_data["blogposts_right_sidebar"] : '';
		
	if($sidebar_class == 'show'){
		if($zolo_sidebar_position == 'default' || $zolo_sidebar_position == ''){
			
			if($admin_sidebar_position == 'left'){			
				$sidebar_position_class = 'hassidebar left';					
			}elseif($admin_sidebar_position == 'right'){			
				$sidebar_position_class = 'hassidebar right';					
			}elseif($admin_sidebar_position == 'both'){			
				$sidebar_position_class = 'hassidebar double_sidebars';					
			}elseif($admin_sidebar_position == 'none'){			
				$sidebar_position_class = 'nosidebars';				
			}  
			
		}else{	
		
			if($zolo_sidebar_position == 'left'){			
				$sidebar_position_class = 'hassidebar left';		
			}elseif($zolo_sidebar_position == 'right'){			
				$sidebar_position_class = 'hassidebar right';		
			}elseif($zolo_sidebar_position == 'both'){			
				$sidebar_position_class = 'hassidebar double_sidebars';		
			}elseif($zolo_sidebar_position == 'none'){			
				$sidebar_position_class = 'nosidebars';		
			}  
		}
		echo esc_attr($sidebar_position_class);
	}
		
		
	if($sidebar == 'show'){
		//Single Post sidebar
		if($zolo_sidebar_position == 'default' || $zolo_sidebar_position == ''){
			if($admin_sidebar_position != 'none' || $admin_sidebar_position != ''){
				if($admin_sidebar_position == 'left' || $admin_sidebar_position == 'both'){
					echo '<div class="sidebar sidebar_container_1 left" role="complementary"><div class="widget-area">';
					if(function_exists('generated_dynamic_sidebar')){
						generated_dynamic_sidebar($admin_left_sidebar ); 
					}else{
						dynamic_sidebar($admin_left_sidebar);
					}
					echo '</div></div>';	
				}
				if($admin_sidebar_position == 'right' || $admin_sidebar_position == 'both'){
					echo '<div class="sidebar sidebar_container_2 right" role="complementary"><div class="widget-area">';
						generated_dynamic_sidebar($admin_right_sidebar);
					echo '</div></div>';	
				}	
			}
		}else{
			if($zolo_sidebar_position == 'left' || $zolo_sidebar_position == 'both'){
				echo '<div class="sidebar sidebar_container_1 left" role="complementary"><div class="widget-area">';
					generated_dynamic_sidebar($zolo_sidebar_left_position ); 
				echo '</div></div>';
			}
			if($zolo_sidebar_position == 'right' || $zolo_sidebar_position == 'both'){
				echo '<div class="sidebar sidebar_container_2 right" role="complementary"><div class="widget-area">';
					generated_dynamic_sidebar($zolo_sidebar_right_position ); 
				echo '</div></div>';
			}	
			
		}
	}
		
	}
}
// Page Sidebar Class
if ( !function_exists( 'writepress_page_sidebar_class' ) ) {
	function writepress_page_sidebar_class($sidebar_class, $sidebar){
		global $writepress_data, $post;
		
		$page_sidebar_position = get_post_meta( $post->ID , 'zt_sidebar_position', true );	
		$page_left_sidebar = get_post_meta( $post->ID , 'zt_sidebar_left_position', true );	
		$page_right_sidebar = get_post_meta( $post->ID , 'zt_sidebar_right_position', true );		
		$admin_page_sidebar_position = isset($writepress_data["page_sidebar_position"]) ? $writepress_data["page_sidebar_position"] : 'left';
		$admin_page_left_sidebar = isset($writepress_data["page_left_sidebar"]) ? $writepress_data["page_left_sidebar"] : 'sidebar';
		$admin_page_right_sidebar = isset($writepress_data["page_right_sidebar"]) ? $writepress_data["page_right_sidebar"] : ''; 
		
		if($sidebar_class == 'show'){
			// Sidebar class
			if($page_sidebar_position == 'default' || $page_sidebar_position == ''){		
				if($admin_page_sidebar_position == 'left'){			
					$sidebar_position_class = 'hassidebar left';					
				}elseif($admin_page_sidebar_position == 'right'){			
					$sidebar_position_class = 'hassidebar right';					
				}elseif($admin_page_sidebar_position == 'both'){			
					$sidebar_position_class = 'hassidebar double_sidebars';					
				}elseif($admin_page_sidebar_position == 'none'){			
					$sidebar_position_class = 'nosidebars';				
				}
			}else{		
				if($page_sidebar_position == 'left'){			
					$sidebar_position_class = 'hassidebar left';		
				}elseif($page_sidebar_position == 'right'){			
					$sidebar_position_class = 'hassidebar right';		
				}elseif($page_sidebar_position == 'both'){			
					$sidebar_position_class = 'hassidebar double_sidebars';		
				}elseif($page_sidebar_position == 'none'){			
					$sidebar_position_class = 'nosidebars';		
				}  
			}
			return $sidebar_position_class;
		}
		
		if($sidebar == 'show'){			
			if($page_sidebar_position == 'default' || $page_sidebar_position == ''){
				if($admin_page_sidebar_position != 'none' || $admin_page_sidebar_position != ''){
						if($admin_page_sidebar_position == 'left' || $admin_page_sidebar_position == 'both'){
								echo '<div class="sidebar sidebar_container_1 left" role="complementary"><div class="widget-area">';
								if(function_exists('generated_dynamic_sidebar')){
									generated_dynamic_sidebar($admin_page_left_sidebar ); 
								}else{
									dynamic_sidebar( $admin_page_left_sidebar );
								}
			
								echo '</div></div>';	
							}
						if($admin_page_sidebar_position == 'right' || $admin_page_sidebar_position == 'both'){
								echo '<div class="sidebar sidebar_container_2 right" role="complementary"><div class="widget-area">';
								generated_dynamic_sidebar($admin_page_right_sidebar);
								echo '</div></div>';	
							}	
					}
			}else{
				if($page_sidebar_position == 'left' || $page_sidebar_position == 'both'){
						echo '<div class="sidebar sidebar_container_1 left" role="complementary"><div class="widget-area">';
						if(function_exists('generated_dynamic_sidebar')){
							generated_dynamic_sidebar($page_left_sidebar ); 
						}else{
							dynamic_sidebar( $page_left_sidebar );
						}
						echo '</div></div>';
					}
				if($page_sidebar_position == 'right' || $page_sidebar_position == 'both'){
						echo '<div class="sidebar sidebar_container_2 right" role="complementary"><div class="widget-area">';
						generated_dynamic_sidebar($page_right_sidebar ); 
						echo '</div></div>';
					}	
				
			}  			
			
		}		
		
	}
}
// Page Sidebar Class
if ( !function_exists( 'writepress_archive_sidebar_class' ) ) {
	function writepress_archive_sidebar_class($sidebar_class, $sidebar){
		global $writepress_data, $post;
		
		$blog_archive_sidebar_position = isset($writepress_data["blog_archive_sidebar_position"]) ? $writepress_data["blog_archive_sidebar_position"] : 'left';
		$blog_archive_left_sidebar = isset($writepress_data["blog_archive_left_sidebar"]) ? $writepress_data["blog_archive_left_sidebar"] : 'sidebar';
		$blog_archive_right_sidebar = isset($writepress_data["blog_archive_right_sidebar"]) ? $writepress_data["blog_archive_right_sidebar"] : ''; 
		
		if($sidebar_class == 'show'){
			//Sidebar Show/Hide Condition Class
			if($blog_archive_sidebar_position == 'left'){				
				$sidebar_position_class = 'hassidebar left';			
			}elseif($blog_archive_sidebar_position == 'right'){				
				$sidebar_position_class = 'hassidebar right';			
			}elseif($blog_archive_sidebar_position == 'both'){				
				$sidebar_position_class = 'hassidebar double_sidebars';			
			}elseif($blog_archive_sidebar_position == 'none'){				
				$sidebar_position_class = 'nosidebars';
			}else{					
				$sidebar_position_class = '';				
				}
			return $sidebar_position_class;	
			}
		
		if($sidebar == 'show'){
			if($blog_archive_sidebar_position != 'none'){
				if(($blog_archive_sidebar_position == 'left' || $blog_archive_sidebar_position == 'both')){ 				
					echo '<div class="sidebar sidebar_container_1 left" role="complementary"><div class="widget-area">';				
					if(function_exists('generated_dynamic_sidebar')){
						generated_dynamic_sidebar($blog_archive_left_sidebar ); 
					}else{
						dynamic_sidebar( $blog_archive_left_sidebar );
					}
					echo '</div></div>';
				}
				if($blog_archive_sidebar_position == 'right' || $blog_archive_sidebar_position == 'both'){	
					echo '<div class="sidebar sidebar_container_2 right" role="complementary"><div class="widget-area">';
					generated_dynamic_sidebar($blog_archive_right_sidebar ); 
					echo '</div></div>';
						
				}
			}
		}		
		
	}
}

// Page Sidebar Class
if ( !function_exists( 'writepress_search_sidebar_class' ) ) {
	function writepress_search_sidebar_class($sidebar_class, $sidebar){
		global $writepress_data, $post;
		
		$searchpage_sidebar_position = isset($writepress_data["searchpage_sidebar_position"]) ? $writepress_data["searchpage_sidebar_position"] : 'left';
		$searchpage_left_sidebar = isset($writepress_data["searchpage_left_sidebar"]) ? $writepress_data["searchpage_left_sidebar"] : 'sidebar';
		$searchpage_right_sidebar = isset($writepress_data["searchpage_right_sidebar"]) ? $writepress_data["searchpage_right_sidebar"] : '';
		$sidebar_position_class = '';
		
		
		if($sidebar_class == 'show'){
			if($searchpage_sidebar_position == 'left'){			
				$sidebar_position_class = 'hassidebar left';					
			}else if($searchpage_sidebar_position == 'right'){			
				$sidebar_position_class = 'hassidebar right';					
			}else if($searchpage_sidebar_position == 'both'){			
				$sidebar_position_class = 'hassidebar double_sidebars';					
			}else if($searchpage_sidebar_position == 'none'){			
				$sidebar_position_class = 'nosidebars';				
			}
			return $sidebar_position_class;
		}
		
		if($sidebar == 'show'){
			if($searchpage_sidebar_position != 'none' || $searchpage_sidebar_position != ''){
				if($searchpage_sidebar_position == 'left' || $searchpage_sidebar_position == 'both'){
						echo '<div class="sidebar sidebar_container_1 left" role="complementary"><div class="widget-area">';
						if(function_exists('generated_dynamic_sidebar')){
							generated_dynamic_sidebar($searchpage_left_sidebar ); 
						}else{
							dynamic_sidebar( $searchpage_left_sidebar );
						}
						echo '</div></div>';	
					}
				if($searchpage_sidebar_position == 'right' || $searchpage_sidebar_position == 'both'){
						echo '<div class="sidebar sidebar_container_2 right" role="complementary"><div class="widget-area">';
						generated_dynamic_sidebar($searchpage_right_sidebar);
						echo '</div></div>';	
					}	
				}			
			}		
		
	}
}

// Writepress Author Info
if ( !function_exists( 'writepress_author_info' ) ) {
function writepress_author_info(){
	global $post, $writepress_data;
	$post_author_info = isset($writepress_data["post_author_info"]) ? $writepress_data["post_author_info"] : 'on';
	$social_sharing_box = isset($writepress_data["social_sharing_box"]) ? $writepress_data["social_sharing_box"] : 'on';
	
	if( ( $post_author_info == 'on' && get_post_meta($post->ID, 'zt_author_info', true ) != 'no' ) ||  ( $social_sharing_box == 'off' && get_post_meta($post->ID, 'zt_share_box', true) == 'yes' ) ): ?>
            <?php if(get_the_author_meta('description') != "") : ?>
           	<div class="about-author">
            <div class="about-author-container">
              <div class="avatar"> <?php echo get_avatar(get_the_author_meta('email'), '72'); ?> </div>
              <div class="description">
              <h4><?php the_author_posts_link(); ?></h4>               
					<?php echo get_the_author_meta('description') ?>				
              </div>
            </div>
          </div>
          <?php endif;
		 endif;
	}
}