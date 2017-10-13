<?php 
/*-----------------------------------------------------------------------------------*/
/* Blog Carousel
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Zolo_Blog_Carousel_Module')) {
	class Zolo_Blog_Carousel_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'zolo_blog_carousel_init' ) );
			add_shortcode( 'zolo_blog_carousel', array( &$this, 'zolo_blog_carousel' ) );
		}
		
		function zolo_blog_carousel_init() {
		$available_categories  = array('all');
        $args = array(
            'type'                     => 'post',
            'orderby'                  => 'name',
            'order'                    => 'ASC',
            'hide_empty'               => 0,
            'exclude'                  => '',
            'include'                  => '',
            'number'                   => '',
            'taxonomy'                 => 'category'
        );
        $categories = get_categories( $args );

        if (is_array($categories)) {
            foreach ($categories as $category) {
                array_push($available_categories, $category->slug);
            }
        }
			if ( function_exists( 'vc_map' ) ) {
			vc_map( array(
			"name" => __("Blog Carousel Styles", 'writepress-core'),
			"base" => "zolo_blog_carousel",
			"class" => "",
			 "category" => __( "ZOLO", "writepress"),
			 "icon"		=> get_template_directory_uri() . "/assets/images/vc_icons/vc-icon-blog_slider.png",
			"params" => array(		
				array(
						"type" => "dropdown",
						"holder" => "div",
						"class" => "",
						"heading" => __("Choose Style",'writepress-core'),
						"param_name" => "style",
						'value' => array(__("Style 1",'writepress-core') => "style1",__("Style 2",'writepress-core') => "style2",__("Style 3",'writepress-core') => "style3",__("Style 4",'writepress-core') => "style4",__("Style 5",'writepress-core') => "style5"),
					),
				array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Category",'writepress-core'),
						"param_name" => "category",
						"value" => $available_categories, 
						"description" => __("Choose the category to show (optional)",'writepress-core')   
					),
				 array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Number of Posts",'writepress-core'),
						"param_name" => "num",
						"value" => "12", 
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Number of Items per row",'writepress-core'),
						"param_name" => "blgcrslcolprw",
						'value' => array(__("Four",'writepress-core') => "Four",__("Three",'writepress-core') => "Three",__("Two",'writepress-core') => "Two"),
					),
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __("Box Background Color",'writepress-core'),
						"param_name" => "blgcrslcolbg",
						"value" => '#f9f9f9',
						'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style5'))	 
					),
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __("Box Border Color",'writepress-core'),
						"param_name" => "blgcrslcolbordep",
						"value" => '#e6e6e6', 
						'dependency' => array( 'element' => 'style', 'value' => array('style1'))	 
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Box Border Radius",'writepress-core'),
						"param_name" => "blgcrslcolradi",
						'value' => '0', 
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Box Padding(Top, Right, Bottom, Left)",'writepress-core'),
						"param_name" => "blgcrslcolpad",
						'value' => '15,15,15,15', 
						'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style5'))	
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Box Padding(Top, Right, Bottom, Left)",'writepress-core'),
						"param_name" => "blgcrslcolpaddep",
						'value' => '0,0,0,0', 
						'dependency' => array( 'element' => 'style', 'value' => array('style3', 'style4'))	 
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Title Position",'writepress-core'),
						"param_name" => "blgcrsltitleposi",
						'value' => array(__("Bottom",'writepress-core') => "bottom",__("Top",'writepress-core') => "top"),
						'dependency' => array( 'element' => 'style', 'value' => array('style1'))	 
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Title Position",'writepress-core'),
						"param_name" => "blgcrsltitleposidep",
						'value' => array(__("Center",'writepress-core') => "center",__("Top",'writepress-core') => "top",__("Bottom",'writepress-core') => "bottom"),
						'dependency' => array( 'element' => 'style', 'value' => array('style2', 'style3'))	 
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Title Font Size",'writepress-core'),
						"param_name" => "blgcrsltitlesize",
						'value' => '24', 
					),
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __("Text Color",'writepress-core'),
						"param_name" => "blgcrsltitlecolor",
						"value" => '#ffffff', 
						'dependency' => array( 'element' => 'style', 'value' => array('style2','style3', 'style4'))	
					),
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __("Text Color",'writepress-core'),
						"param_name" => "blgcrsltitlecolordep",
						"value" => '#000000', 
						'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style5'))	
					),
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __("Text Hover Color",'writepress-core'),
						"param_name" => "blgcrsltitlehovcolor",
						"value" => '#ffffff', 
						'dependency' => array( 'element' => 'style', 'value' => array('style5'))	 
					),
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __("Title Hover Background",'writepress-core'),
						"param_name" => "blgcrsltitlebg5dep",
						"value" => '#00c8ec', 
						'dependency' => array( 'element' => 'style', 'value' => array('style4','style5'))	 
					),	
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __("Post meta Color",'writepress-core'),
						"param_name" => "blgcrslmetacolor",
						'value' => '#777777',
						'dependency' => array( 'element' => 'style', 'value' => array('style5'))	
					),		
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __("Image Overlay Color",'writepress-core'),
						"param_name" => "blgcrslimgoverlay",
						"value" => '#000000', 
					),	
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Image Overlay Opacity",'writepress-core'),
						"param_name" => "blgcrsloverlayopac",
						'value' => '0.3', 
						'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3','style5'))	
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Image Overlay Opacity",'writepress-core'),
						"param_name" => "blgcrsloverlayopacdep",
						'value' => '0.7', 
						'dependency' => array( 'element' => 'style', 'value' => array('style4'))	
					),
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __("Hover Background",'writepress-core'),
						"param_name" => "blgcrslhovercolor",
						"value" => '#000000', 
					),	
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Hover Opacity",'writepress-core'),
						"param_name" => "blgcrslhoveropac",
						'value' => '0.8', 
						'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3','style5'))	
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Hover Opacity",'writepress-core'),
						"param_name" => "blgcrslhoveropacdep",
						'value' => '0.1', 
						'dependency' => array( 'element' => 'style', 'value' => array('style4'))
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Fontawesome Zoom Icon",'writepress-core'),
						"param_name" => "blgcrslzoomicon",
						'value' => 'fa fa-search-plus', 
						'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style5'))	
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Fontawesome Link Icon",'writepress-core'),
						"param_name" => "blgcrsllinkicon",
						'value' => 'fa fa-link', 
						'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style5'))	
					),
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __("Button Background",'writepress-core'),
						"param_name" => "blgcrslbuttonbg",
						"value" => '#00c8ec', 
					),
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __("Button Hover Background",'writepress-core'),
						"param_name" => "blgcrslbuttonhovbg",
						"value" => '#0187a0', 
					),	
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Slider Navigation Design",'writepress-core'),
						"param_name" => "blgcrslnav",
						'value' => array(__("None",'writepress-core') => "none",__("Square",'writepress-core') => "square",__("Round",'writepress-core') => "round"),
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("CSS Animation",'blogera'),
						"param_name" => "data_animation",
						'value' => writepress_data_animations(),
						"description" => __("Select type of animation. Note: Works only in modern browsers.",'blogera')
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Delay",'writepress-core'),
						"param_name" => "data_delay",
						"value" => '500',
						"description" => __("Delay",'writepress-core')
					),
			),
			//"js_view" => 'VcColumnView'
			) );
			}
		}

		function zolo_blog_carousel( $atts, $content=null ){
		  ob_start();
		   extract(shortcode_atts(array(
						'style' => 'style1',
						'category' =>'all',
						'num' => '12',
						'blgcrslcolprw' => 'Four',
						'blgcrslcolbg' => '#f9f9f9',
						'blgcrslcolbordep'=>'#e6e6e6',
						'blgcrslcolradi'=>'0',
						'blgcrslcolpad'=>'15,15,15,15',
						'blgcrslcolpaddep'=>'0,0,0,0',
						'blgcrsltitleposi'=>'bottom',
						'blgcrsltitleposidep'=>'center',
						'blgcrsltitlesize'=>'24',
						'blgcrsltitlecolor' => '#ffffff',
						'blgcrsltitlecolordep' => '#000000',
						'blgcrsltitlehovcolor' => '#ffffff',
						'blgcrslmetacolor'	=>'#777777',				
						'blgcrsltitlebg5dep' => '#00c8ec',
						'blgcrslimgoverlay' => '#000000',
						'blgcrsloverlayopac' => '0.3',
						'blgcrsloverlayopacdep' => '0.7',
						'blgcrslhovercolor' => '#000000',
						'blgcrslhoveropac' => '0.8',
						'blgcrslhoveropacdep' => '0.1',
						'blgcrslzoomicon' => 'fa fa-search-plus',
						'blgcrsllinkicon' => 'fa fa-link',
						'blgcrslbuttonbg' => '#00c8ec',
						'blgcrslbuttonhovbg' => '#0187a0',
						'blgcrslnav' => 'none',				
						'data_animation'=>'No Animation',
						'data_delay'=>'500'
						
				), $atts));
				if($blgcrslcolprw == 'Four'){
						$blgcrslcolprw = 4;
					}elseif($blgcrslcolprw == 'Three'){
							$blgcrslcolprw = 3;
						}elseif($blgcrslcolprw == 'Two'){
								$blgcrslcolprw = 2;
							}
				
				//Animation
				if($data_animation == 'No Animation'){
						$animatedclass = 'noanimation';
					}else{
						$animatedclass = 'animated hiding';
					}
					
				static $c = 1;
				
				echo '<script type="text/javascript" charset="utf-8">
				var j$ = jQuery;
				j$.noConflict();
				"use strict";
				j$(window).load(function() {
				j$(".zolo_blog_slider'.$c.'").owlCarousel({
				loop:true,
				autoplay:true,
				margin:0,
				responsiveClass:true,
				navText:["<i class=\"fa fa-angle-left\"></i>","<i class=\"fa fa-angle-right\"></i>"],
				responsive:{
				0:{
					items:1,
					nav:true
				},
				500:{
					items:2,
					nav:true
				},
				800:{
					items:3,
					nav:true
				},
				1000:{
					items:'.$blgcrslcolprw.',
					nav:true,
					loop:true
				}
				}
				});
				});
				</script>';
				global $post;
				$blgcrslcolpaddep = explode(",",$blgcrslcolpaddep);
				$blgcrslcolpad = explode(",",$blgcrslcolpad);
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				if ($category!=="all" && $category!=="") {
					query_posts( 'category_name='.$category.'&post_type=post&ignore_sticky_posts=1&posts_per_page='.$num.'&paged='. $paged .'&post_status=publish');
				}else{
					query_posts( 'post_type=post&ignore_sticky_posts=1&posts_per_page='.$num.'&paged='. $paged .'&post_status=publish');
				}
				 ?>
		
		<?php 
			if($style == 'style1'){
				$class = 'zolo_carouselstyle1';	
				$blogstylethumb = 'writepress_blogstyle_thumb';
				$blogstylethumb_img = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			}elseif($style == 'style2'){
				$class = 'zolo_carouselstyle2 zolo_thumb_Carousel';
				$blogstylethumb = 'writepress_blogstyle_thumb';
				$blogstylethumb_img = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			}elseif($style == 'style3'){
				$class = 'zolo_carouselstyle3 zolo_thumb_Carousel';
				$blogstylethumb = 'writepress_blogstyle_thumb';
				$blogstylethumb_img = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			}elseif($style == 'style4'){
				$class = 'zolo_carouselstyle4 zolo_thumb_Carousel';
				$blogstylethumb = 'writepress_blogstyle_thumb';
				$blogstylethumb_img = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			}elseif($style == 'style5'){
				$class = 'zolo_carouselstyle5';
				$blogstylethumb = 'writepress_thumb_blog_medium';
				$blogstylethumb_img = get_stylesheet_directory_uri() . '/assets/images/post_thumb/blog_medium.jpg';
			}
		?>
		<?php if($style == 'style1'){ 
				$crsltitleposi = $blgcrsltitleposi;
			  }elseif($style == 'style2' || $style == 'style3'){
			  $crsltitleposi = $blgcrsltitleposidep;
			  }elseif($style == 'style4'){
				$crsltitleposi = 'bottom';
			  }
			  
			  if($style == 'style3' || $style == 'style4'){
				$classpad = $blgcrslcolpaddep; 
				}else{
				$classpad = $blgcrslcolpad; 
					
				}
			  ?>
		
		<!--Blog carousel1 Area Start-->
		  <div class="zolo_blog_slider_area <?php echo $class;?>">
		  <div class="zolo_blog_carousel_row" style="margin:0 -<?php echo $classpad[1];?>px 0 -<?php echo $classpad[3];?>px;">
			<div data-post-number="<?php echo $blgcrslcolprw;?>" id="owl-demo" class="zolo_blog_slider<?php echo $c;?> <?php echo $animatedclass;?> <?php echo ' zolocarousel'.$c;?> <?php echo $blgcrslnav;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">
			  <?php
			  $i = 1;
			  while (have_posts()) : the_post(); ?>
			  <?php 
			  if( $i % 4 == 0 )
				$class = 'last';
				else
				$class = '';  ?>
			  
			  <!--Blog Box Area Start-->
			  <div class="zolo_blogbox" style="padding:<?php echo $classpad[0];?>px <?php echo $classpad[1];?>px <?php echo $classpad[2];?>px <?php echo $classpad[3];?>px;">
				<div class="zolo_blog_box <?php echo $crsltitleposi; ?>" style="background:<?php echo $blgcrslcolbg;?>; border-color:<?php echo $blgcrslcolbordep;?>; border-radius:<?php echo $blgcrslcolradi; ?>px;">
		
				  <!-- Blog carousel Style 1 Detail Start --> 
				  <?php
					 if($style == 'style1' && $blgcrsltitleposi == 'top'){ ?>
				  <div class="zolo_blog_detail">
					<h2 class="zolo_blog_title" style="color:<?php echo $blgcrsltitlecolordep;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;"><a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolordep;?>;">
					  <?php if (strlen($post->post_title) > 50) {
						echo substr(the_title($before = '', $after = '', FALSE), 0, 50) . '...'; } else {
						the_title();
						} ?>
					  </a></h2>
					<span class="zolo_blog_date" style="color:<?php echo $blgcrsltitlecolordep;?>;">
					<?php the_time('F jS, Y') ?>
					</span></div>
				  <?php }?>
				  
				  <!-- Blog carousel Style 1 Detail End -->
				  
				  <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $blogstylethumb ); ?>
				
			 <?php    
			if ( $thumb ){
				$thumb_url = $thumb['0'];
			}
			else {
				$thumb_url = $blogstylethumb_img;
			} ?>
				  <div class="zolo_blog_thumb">
			<?php //zolo_zilla_likes
			if( function_exists('zolo_zilla_likes') ){ 
				echo '<span class="zolo_zilla_likes_box"> ';
				zolo_zilla_likes();
				echo '</span>';
			}?>
				   
			  <img src="<?php echo esc_url($thumb_url); ?>" alt="writepress"/>
			  
			<span class="overlay"></span>
			
			<!-- Blog carousel Style 2, 3 & 4 Detail Start -->
			<?php if($style == 'style2' || $style == 'style3' || $style == 'style4'){ ?>
			<div class="zolo_blog_detail">
				   <h2 class="zolo_blog_title" style="color:<?php echo $blgcrsltitlecolor;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;"><a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
					  <?php //the_title(); ?>
		
						<?php if (strlen($post->post_title) > 50) {
						echo substr(the_title($before = '', $after = '', FALSE), 0, 50) . '...'; } else {
						the_title();
						} ?>
		
					  </a></h2>
					<span class="zolo_blog_date" style="color:<?php echo $blgcrsltitlecolor;?>;">
					<?php the_time('F jS, Y') ?>
					</span>
					
					<!-- Blog carousel Style 2 & 3 Icon Start -->
				   <?php if($style == 'style2' || $style == 'style3'){ ?>
					<span class="zolo_blog_icons"> <a href="<?php echo $thumb_url ?>" class="fancybox"><span class="zolo_blog_icon blog_zoom_icon">
					<i class="<?php if($blgcrslzoomicon){ echo $blgcrslzoomicon; }?>"></i>
					</span></a> <a href="<?php the_permalink(); ?>"><span class="zolo_blog_icon blog_link_icon">
					<i class="<?php if($blgcrsllinkicon){ echo $blgcrsllinkicon; }?>"></i>
					</span></a> </span>
					<?php }?>
					<!-- Blog carousel Style 2 & 3 Icon End -->
					
					</div>
					<?php }?>
			  <!-- Blog carousel Style 2, 3 & 4 Detail End -->
			  
			<!-- Blog carousel Style 1 Icon Start -->
			 <?php if($style == 'style1' || $style == 'style5'){ ?>
					<span class="zolo_blog_icons"> <a href="<?php echo $thumb_url ?>" class="fancybox"><span class="zolo_blog_icon blog_zoom_icon">
					<i class="<?php if($blgcrslzoomicon){ echo $blgcrslzoomicon; }?>"></i>
					</span></a> <a href="<?php the_permalink(); ?>"><span class="zolo_blog_icon blog_link_icon">
					<i class="<?php if($blgcrsllinkicon){ echo $blgcrsllinkicon; }?>"></i>
					</span></a> </span>
					<?php }?>
			 <!-- Blog carousel Style 1 Icon End -->
			 
					 </div>
					 
					 <!-- Blog carousel Style 1 Detail Start --> 
				  <?php
					 if($style == 'style1' && $blgcrsltitleposi == 'bottom'){ ?>
				  <div class="zolo_blog_detail">
					
					<h2 class="zolo_blog_title" style="color:<?php echo $blgcrsltitlecolordep;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;">
					  <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolordep;?>;">
					  <?php if (strlen($post->post_title) > 50) {
						echo substr(the_title($before = '', $after = '', FALSE), 0, 50) . '...'; } else {
						the_title();
					  } ?>
						</a>
					  </h2>
					<span class="zolo_blog_date" style="color:<?php echo $blgcrsltitlecolordep;?>;">
					<?php the_time('F jS, Y') ?>
					</span></div>
				  <?php }?>
				  
				  <!-- Blog carousel Style 1 Detail End --> 
				  
				  
				  <!-- Blog carousel Style 1 Detail Start --> 
				  <?php
					 if($style == 'style5'){ ?>
					 <div class="zolo_blog_detail">
					<h2 class="zolo_blog_title" style="color:<?php echo $blgcrsltitlecolordep;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;">
					  <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolordep;?>;">
					  <?php if (strlen($post->post_title) > 50) {
						echo substr(the_title($before = '', $after = '', FALSE), 0, 50) . '...'; } else {
						the_title();
						} ?>
						</a>
					  </h2>
					
					<div class="zolo_blog_description" style="color:<?php echo $blgcrsltitlecolordep;?>;">
					<?php $content = wp_trim_words( get_the_content(), 16, '' );
						  echo  preg_replace( '/\[[^\]]+\]/', '', $content );	 ?>
					  </div>
					  <span class="zolo_blog_date_style5" style="color:<?php echo $blgcrslmetacolor;?>;"><?php the_time('F jS, Y') ?></span>
					</div>
				  <?php }?>
		
				  <!-- Blog carousel Style 1 Detail End --> 
				  
				  </div>
			  </div>
			  <!--Blog Box Area End-->
			  <?php $i++; endwhile; ?>
			</div>
			</div>
			</div>
		
		<style type='text/css'>
		
		
		<?php echo '.zolocarousel'.$c;?> .zolo_blog_box .overlay{background:<?php echo $blgcrslimgoverlay;?>; opacity:<?php echo $blgcrsloverlayopac; ?>;}
		
		<?php echo '.zolocarousel'.$c;?> .zolo_blog_box:hover .overlay{background:<?php echo $blgcrslhovercolor;?>; opacity:<?php echo $blgcrslhoveropac; ?>;}
		
		<?php echo '.zolocarousel'.$c;?> .zolo_blog_box .zolo_blog_icons .zolo_blog_icon{background:<?php echo $blgcrslbuttonbg; ?>;}
		
		<?php echo '.zolocarousel'.$c;?>  .zolo_blog_box .zolo_blog_icons .zolo_blog_icon:hover{background:<?php echo $blgcrslbuttonhovbg; ?>;}
		
		<?php echo '.zolocarousel'.$c;?>.owl-carousel.square .owl-controls .owl-nav div,
		<?php echo '.zolocarousel'.$c;?>.owl-carousel.round .owl-controls .owl-nav div{background:<?php echo $blgcrslbuttonbg;?>;}
		<?php echo '.zolocarousel'.$c;?>.owl-carousel.square .owl-controls .owl-nav div:hover,
		<?php echo '.zolocarousel'.$c;?>.owl-carousel.round .owl-controls .owl-nav div:hover{background:<?php echo $blgcrslbuttonhovbg;?>;}
		
		.zolo_thumb_Carousel.zolo_carouselstyle4 .zolo_blog_box.bottom:hover .zolo_blog_detail{background:<?php echo $blgcrsltitlebg5dep;?>;border-bottom-left-radius:<?php echo $blgcrslcolradi;?>px;border-bottom-right-radius:<?php echo $blgcrslcolradi;?>px;}
		.zolo_thumb_Carousel.zolo_carouselstyle4 .zolo_blog_box.bottom .zolo_blog_detail{border-bottom-left-radius:<?php echo $blgcrslcolradi;?>px;border-bottom-right-radius:<?php echo $blgcrslcolradi;?>px;}
		
		
		.zolo_carouselstyle1 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box.top .overlay,
		.zolo_carouselstyle1 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box.top .zolo_blog_thumb img{border-bottom-left-radius:<?php echo $blgcrslcolradi;?>px;
		border-bottom-right-radius:<?php echo $blgcrslcolradi;?>px; overflow:hidden;}
		
		.zolo_carouselstyle1 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box.bottom .zolo_blog_thumb .overlay,
		.zolo_carouselstyle1 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box.bottom .zolo_blog_thumb img{border-top-left-radius:<?php echo $blgcrslcolradi;?>px;
		border-top-right-radius:<?php echo $blgcrslcolradi;?>px; overflow:hidden;}
		
		.zolo_carouselstyle2 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box .zolo_blog_thumb .overlay,
		.zolo_carouselstyle2 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box .zolo_blog_thumb img{border-radius:<?php echo $blgcrslcolradi;?>px;overflow:hidden;}
		
		.zolo_carouselstyle3 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box .zolo_blog_thumb .overlay,
		.zolo_carouselstyle3 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box .zolo_blog_thumb img{border-radius:<?php echo $blgcrslcolradi;?>px;overflow:hidden;}
		
		.zolo_carouselstyle4 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box .overlay{opacity:<?php echo $blgcrsloverlayopacdep; ?>;}
		.zolo_carouselstyle4 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box:hover .overlay{opacity:<?php echo $blgcrslhoveropacdep; ?>;}
		
		.zolo_carouselstyle4 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box .zolo_blog_thumb .overlay,
		.zolo_carouselstyle4 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box .zolo_blog_thumb img{border-radius:<?php echo $blgcrslcolradi;?>px;overflow:hidden;}
		
		.zolo_carouselstyle5 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box .zolo_blog_thumb .overlay,
		.zolo_carouselstyle5 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box .zolo_blog_thumb img{border-top-left-radius:<?php echo $blgcrslcolradi;?>px;border-top-right-radius:<?php echo $blgcrslcolradi;?>px;}
		
		.zolo_carouselstyle5 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box .zolo_blog_detail{border-bottom-left-radius:<?php echo $blgcrslcolradi;?>px;border-bottom-right-radius:<?php echo $blgcrslcolradi;?>px;}
		
		.zolo_carouselstyle5 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box:hover .zolo_blog_detail{background:<?php echo $blgcrsltitlebg5dep;?>; }
		
		.zolo_carouselstyle5 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box:hover .zolo_blog_detail .zolo_blog_description,
		.zolo_carouselstyle5 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box:hover .zolo_blog_detail .zolo_blog_title a,
		.zolo_carouselstyle5 <?php echo '.zolocarousel'.$c;?> .zolo_blog_box:hover .zolo_blog_detail .zolo_blog_title{color:<?php echo $blgcrsltitlehovcolor;?>!important; }
		
		</style>
		  
		
		<!--Blog carousel1 Area End-->
		<?php
			$c++;
			wp_reset_query();
			$demolp_output = ob_get_clean();
			return $demolp_output;
			}
	}
	
	$Zolo_Blog_Carousel_Module = new Zolo_Blog_Carousel_Module;
}
