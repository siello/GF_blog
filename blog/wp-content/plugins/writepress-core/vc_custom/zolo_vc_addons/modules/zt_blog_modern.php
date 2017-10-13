<?php 
/*-----------------------------------------------------------------------------------*/
/** Blog Modern
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Zolo_Blog_Modern_Module')) {
	class Zolo_Blog_Modern_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'zolo_blog_modern_init' ) );
			add_shortcode( 'zolo_blog_modern', array( &$this, 'zolo_blog_modern' ) );
		}
		
		function zolo_blog_modern_init() {
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
			"name" => __("Blog Modern Styles", 'writepress-core'),
			"base" => "zolo_blog_modern",
			"class" => "",
			"category" => __( "ZOLO", "writepress"),
			"icon"		=> get_template_directory_uri() . "/assets/images/vc_icons/vc-icon-testmonials-plus.png",
			"params" => array(		
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __("Choose Style",'writepress-core'),
					"param_name" => "style",
					'value' => array(__("Style 1",'writepress-core') => "style1",__("Style 2",'writepress-core') => "style2",__("Style 3",'writepress-core') => "style3",__("Style 4",'writepress-core') => "style4"),
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
					'value' => '4', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1','style2')),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Number of Posts",'writepress-core'),
					"param_name" => "style_num3",
					'value' => array(__("5",'writepress-core') => "5",__("10",'writepress-core') => "10",__("15",'writepress-core') => "15",__("20",'writepress-core') => "20",__("25",'writepress-core') => "25"),
					'dependency' => array( 'element' => 'style', 'value' => array('style3')),
					),					
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Number of Posts",'writepress-core'),
					"param_name" => "style_num4",
					'value' => array(__("3",'writepress-core') => "3",__("6",'writepress-core') => "6",__("9",'writepress-core') => "9",__("12",'writepress-core') => "12",__("15",'writepress-core') => "15"),
					'dependency' => array( 'element' => 'style', 'value' => array('style4')),
					),					
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Slider",'writepress-core'),
					"param_name" => "blgmodernslider",
					'value' => array(__("None",'writepress-core') => "none",__("Hide",'writepress-core') => "hide",__("Show",'writepress-core') => "show"),
					'dependency' => array( 'element' => 'style', 'value' => array('style3', 'style4')),
					),	
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Box Background",'writepress-core'),
					"param_name" => "blgmoderncolbg",
					"value" => '#999999', 
					'dependency' => array( 'element' => 'style', 'value' => array('style2')),
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Box Hover Background",'writepress-core'),
					"param_name" => "blgmoderncolhovbg",
					"value" => '#07abaa', 
					'dependency' => array( 'element' => 'style', 'value' => array('style2')),
				),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Box Padding",'writepress-core'),
					"param_name" => "blgcrslcolpad",
					'value' => '1,0,1,0', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2')),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Title Font Size",'writepress-core'),
					"param_name" => "blgcrsltitlesize",
					'value' => '24', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4')),
					),	
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Title Text Color",'writepress-core'),
					"param_name" => "blgcrsltitlecolor",
					"value" => '#ffffff', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Meta Text Color",'writepress-core'),
					"param_name" => "blgmodernmetacolor",
					"value" => '#ffffff', 
					'dependency' => array( 'element' => 'style',  'value' => array('style1', 'style2')),
					),			
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Image Overlay Color",'writepress-core'),
					"param_name" => "blgmodernimgoverlay",
					"value" => '#000000', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1')),
					),	
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Image Overlay Opacity",'writepress-core'),
					"param_name" => "blgmodernoverlayopac",
					'value' => '0.3', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1')),
					),		
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Hover Background",'writepress-core'),
					"param_name" => "blgmodernhovercolor",
					"value" => '#000000', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style3', 'style4')),
					),	
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Hover Opacity",'writepress-core'),
					"param_name" => "blgmodernhoveropac",
					'value' => '0.7', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style3', 'style4')),
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
					"description" => __("Delay",'writepress-core'),
					),
			),
			//"js_view" => 'VcColumnView'
		) );
			}
		}

		function zolo_blog_modern($atts, $content = null) {
		  ob_start();
		   extract(shortcode_atts(array(
						'style' => 'style1',
						'category' =>'all',
						'num' => '4',
						'style_num3' => '5',
						'style_num4' => '3',
						'blgmodernslider' => 'none',
						'blgmoderncolbg' => '#999999',
						'blgmoderncolhovbg' => '#07abaa',
						'blgcrslcolpad' => '1,0,1,0',
						'blgcrsltitlesize' => '24',
						'blgcrsltitlecolor' => '#ffffff',
						'blgmodernmetacolor' => '#ffffff',
						'blgmodernimgoverlay' => '#000000',
						'blgmodernoverlayopac'=>'0.3',
						'blgmodernhovercolor'=>'#000000',
						'blgmodernhoveropac' => '0.7',
						'data_animation'=>'No Animation',
						'data_delay'=>'500'
						
						
				), $atts));
				
				//Animation
				if($data_animation == 'No Animation'){
						$animatedclass = 'noanimation';
					}else{
						$animatedclass = 'animated hiding';
					}
					
				static $c = 1;
		 
				global $post;
				$blgcrslcolpad = explode(",",$blgcrslcolpad);
				
				if($style == 'style1' || $style == 'style2'){
					$num = $num;	
				}elseif($style == 'style3'){
					$num = $style_num3;
				}elseif($style == 'style4'){
					$num = $style_num4;
				}
				
				if ($category!=="all" && $category!=="") {
					query_posts( 'category_name='.$category.'&post_type=post&ignore_sticky_posts=1&posts_per_page='.$num.'&post_status=publish');
				}else{
					query_posts( 'post_type=post&ignore_sticky_posts=1&posts_per_page='.$num.'&post_status=publish');
				}
				?>
		<?php 
			if($style == 'style1'){
				$class = 'zolo_blog_modern1 zolo_blog_modern_1st_2nd';	
			}elseif($style == 'style2'){
				$class = 'zolo_blog_modern2 zolo_blog_modern_1st_2nd';
			}elseif($style == 'style3'){
				$class = 'zolo_blog_modern3 zolo_blog_modern3zt_4th';
			}elseif($style == 'style4'){
				$class = 'zolo_blog_modern4 zolo_blog_modern3zt_4th';
			}
		?>
		<!--Blog Row Start-->
		
		<div class="zolo_blog_area zolo_blog_modern_style <?php echo $animatedclass;?> <?php echo ' zoloblogmodern'.$c.' '. $class;?> " data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">
		<div class="zolo_blog_row" style="margin:0 -<?php echo $blgcrslcolpad[1];?>px 0 -<?php echo $blgcrslcolpad[3];?>px;">
		  <?php 
			if($style == 'style1' || $style == 'style2'){ ?>
		  <div class="zolo_row">
			<?php
				$i = 1;
				while (have_posts()) : the_post(); ?>
			<?php 
			  if( $i % 4 == 0 )
				$class = 'last';
				else
				$class = '';  ?>
			<?php
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
		if($thumb) {
			$url = $thumb['0'];
		  } 
		?>
			<!--Blog Box Area Start-->
			<div class="zolo_blog_modern_row <?php echo $class;?>" style="padding:<?php echo $blgcrslcolpad[0];?>px <?php echo $blgcrslcolpad[1];?>px <?php echo $blgcrslcolpad[2];?>px <?php echo $blgcrslcolpad[3];?>px;"> <a href="<?php the_permalink(); ?>">
			  <?php 
				if($style == 'style1'){ ?>
			  <div class="zolo_blog_box" style="background:url(<?php echo $url; ?>) no-repeat center center;">
				<?php }elseif($style == 'style2'){?>
				<div class="zolo_blog_box" style="background:<?php echo $blgmoderncolbg;?>;">
				  <?php }?>
				  <span class="overlay"></span>
				  <div class="zolo_blog_detail">
					<h2 class="zolo_blog_title" style="color:<?php echo $blgcrsltitlecolor;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;">
					  <?php the_title(); ?>
					</h2>
					<span class="zolo_blog_date" style="color:<?php echo $blgmodernmetacolor;?>;border-color:<?php echo $blgmodernmetacolor;?>;"> 
					<span class="zolo_blog_day" style="border-color:<?php echo $blgmodernmetacolor;?>;">
					<?php the_time('j') ?>
					</span> 
					<span class="zolo_blog_month_year">
					<span class="zolo_blog_month">
					<?php the_time('F') ?>
					</span>
					<span class="zolo_blog_year">
					<?php the_time('Y') ?>
					</span>
					</span>
					</span>
					 </div>
				</div>
				</a> </div>
			  <!--Blog Box Area End-->
			  <?php $i++; endwhile;?>
			</div>
			<?php }elseif($style == 'style3' || $style == 'style4'){ ?>
			<div class="zolo_row">
			  <?php 
			if($blgmodernslider == 'show'){
				$blgmodernsliderclass ='zolo_blog_modern_slider';
			}else{
				$blgmodernsliderclass ='';   
			}
			?>
			  <ul class="zolo_blog_modernslider <?php echo $blgmodernsliderclass;?> ">
				<?php
				$i = 1;
				while (have_posts()) : the_post(); ?>
				<?php if($style == 'style3'){ ?>
				<?php 
				if( $i % 5 == 1 || 1 == $i )
				$class = 'last';
				else
				$class = '';  
				if($i%5==1): echo '</li><li>'; endif; 
				} 
				?>
				<?php if($style == 'style4'){ 
				if( $i % 3 == 1 )
				$class = 'last';
				else
				$class = '';
				if($i%3==1): echo '</li><li>'; endif; 
				} ?>
				<!--Blog Box Area Start-->
				<div class="zolo_blog_modern3_col <?php echo $class;?>">
				  <div class="zolo_blog_box">
					<div class="zolo_blog_thumb">
					<?php //zolo_zilla_likes
					if( function_exists('zolo_zilla_likes') ){ 
					echo '<span class="zolo_zilla_likes_box"> ';
					zolo_zilla_likes();
					echo '</span>';
					}?>
					<a href="<?php the_permalink(); ?>">
					<?php if($style == 'style3'){ ?>
					<?php 
						if ( $class) { ?>
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('writepress_modern3_thumb_big');
							}else{
								echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/post_thumb/modern3_thumb_big.jpg" alt="writepress"/>';
							} ?>
						<?php } else { ?>
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('writepress_modern4_thumb_small');
							} else {
								echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/post_thumb/modern4_thumb_small.jpg" alt="writepress"/>';
							} ?>
					<?php } ?>
					<?php }elseif($style == 'style4'){ ?>
					<?php 
					if ( $class) { ?>
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('writepress_modern4_thumb_big');
						} else {
							echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/post_thumb/modern4_thumb_big.jpg" alt="writepress"/>';
						} ?>
						<?php } else { ?>
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('writepress_modern4_thumb_small');
						} else {
							echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/post_thumb/modern4_thumb_small.jpg" alt="writepress"/>';
						} ?>
						<?php } ?>
					<?php }?>
					<span class="overlay"></span>
					<div class="zolo_blog_detail">
					<h2 class="zolo_blog_title" style="color:<?php echo $blgcrsltitlecolor;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;">
					<?php the_title(); ?>
					</h2>
					<span class="zolo_blog_date" style="color:<?php echo $blgcrsltitlecolor;?>;">
					<?php the_time('j F Y') ?>
					</span> </div>
					</a> </div>
				  </div>
				</div>
				<!--Blog Box Area End-->
				
				<?php 
			  $i++; endwhile;?>
			  </ul>
			</div>
			<?php } ?>
		  </div>
		</div>
		<style type='text/css'>
		.zolo_blog_modern1<?php echo '.zoloblogmodern'.$c;?> .zolo_blog_box .overlay{background:<?php echo $blgmodernimgoverlay;?>; opacity:<?php echo $blgmodernoverlayopac; ?>;}
		.zolo_blog_modern1<?php echo '.zoloblogmodern'.$c;?> .zolo_blog_box:hover .overlay{background:<?php echo $blgmodernhovercolor;?>; opacity:<?php echo $blgmodernhoveropac; ?>;}
		.zolo_blog_modern2<?php echo '.zoloblogmodern'.$c;?> .zolo_blog_box:hover{ background:<?php echo $blgmoderncolhovbg;?>!important;}
		
		.zolo_blog_modern3zt_4th<?php echo '.zoloblogmodern'.$c;?> .zolo_blog_box .overlay:after{ content:""; position:absolute; height:100%; width:100%; float:left;background-color:<?php echo $blgmodernhovercolor;?>; opacity:0;}
		.zolo_blog_modern3zt_4th<?php echo '.zoloblogmodern'.$c;?> .zolo_blog_box:hover .overlay:after{opacity:<?php echo $blgmodernhoveropac; ?>;}
		
		</style>
		<?php
			$c++;
			wp_reset_query();
			$demolp_output = ob_get_clean();
			return $demolp_output;
			}
	}
	
	$Zolo_Blog_Modern_Module = new Zolo_Blog_Modern_Module;
}
