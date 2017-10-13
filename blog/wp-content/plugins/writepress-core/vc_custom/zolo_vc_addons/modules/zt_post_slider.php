<?php 
/*-----------------------------------------------------------------------------------*/
/** Blog Post Slider
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Zolo_Blog_Post_Slider_Module')) {
	class Zolo_Blog_Post_Slider_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'zolo_blog_post_slider_init' ) );
			add_shortcode( 'zolo_blog_post_slider', array( &$this, 'zolo_blog_post_slider' ) );
		}
		
		function zolo_blog_post_slider_init() {
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
			"name" => __("Blog Post Slider", 'writepress-core'),
			"base" => "zolo_blog_post_slider",
			"class" => "",
			"category" => __( "ZOLO", "writepress"),
			"icon"		=> get_template_directory_uri() . "/assets/images/vc_icons/vc-icon-post_slider.png",
			"params" => array(		
			
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Slider Style",'writepress-core'),
				"param_name" => "blogpostsliderstyle",
				'value' => array(__("Style 1",'writepress-core') => "postsliderstyle1",__("Style 2",'writepress-core') => "postsliderstyle2",__("Style 3",'writepress-core') => "postsliderstyle3",__("Style 4",'writepress-core') => "postsliderstyle4",__("Style 5",'writepress-core') => "postsliderstyle5"),
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
				),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Slider height",'writepress-core'),
				"param_name" => "postsliderheight",
				'value' => '450', 
				'dependency' => array( 'element' => 'blogpostsliderstyle', 'value' => array('postsliderstyle1','postsliderstyle2','postsliderstyle3','postsliderstyle3','postsliderstyle4','postsliderstyle4'))
				),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Slider Caption height",'writepress-core'),
				"param_name" => "postslidercaptionheight",
				'value' => '206', 
				),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Slider Caption width",'writepress-core'),
				"param_name" => "postslidercaptionwidth",
				'value' => '606', 
				),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Slider Caption Padding(Top, Right, Bottom, Left)",'writepress-core'),
				"param_name" => "postslidercaptionpad",
				'value' => '50,50,50,50',
				),
			array(
				"type" => "attach_image",
				"class" => "",
				"heading" => __("Slider Caption Background Image", "writepress"),
				"param_name" => "postslidercaptionbg",
				"value" => "",
				),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Title Font Size",'writepress-core'),
				"param_name" => "blgcrsltitlesize",
				'value' => '20', 
				),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Text Align",'writepress-core'),
				"param_name" => "slidercaptiontextalgin",
				'value' => array(__("Left",'writepress-core') => "left",__("Center",'writepress-core') => "center",__("Right",'writepress-core') => "right"), 
				),	
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Title Text Color",'writepress-core'),
				"param_name" => "blgcrsltitlecolor",
				"value" => '#777777', 
				),
			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Title Top Padding",'writepress-core'),
				"param_name" => "titletoppadding",
				'value' => '12', 
				),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Title Bottom Padding",'writepress-core'),
				"param_name" => "titlebottompadding",
				'value' => '15',
				),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Post title separator Show/Hide",'writepress-core'),
				"param_name" => "posttitleseparatorshowhide",
				'value' => array(__("Hide",'writepress-core') => "hide",__("Show",'writepress-core') => "show"),
				),
			array(
				"type" => "attach_image",
				"class" => "",
				"heading" => __("Title separator Image", "writepress"),
				"param_name" => "titleseparatorimg",
				"value" => "",
			
				'dependency' => array( 'element' => 'posttitleseparatorshowhide', 'value' => array('show')),
				),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Excerpt Length",'writepress-core'),
				"param_name" => "excerptlength",
				'value' => '0',
				),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Category Design",'writepress-core'),
				"param_name" => "slidercategorydesign",
				'value' => array(__("None",'writepress-core') => "none",__("Box",'writepress-core') => "box",__("Rounded",'writepress-core') => "rounded"),
				),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Category Item font Color",'writepress-core'),
				"param_name" => "categoryfontcolor",
				'value' => '#ffffff',
				),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Category Item Hover font Color",'writepress-core'),
				"param_name" => "categoryfontcolorhover",
				'value' => '#ffffff',
				),
				
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Category Item Background Color",'writepress-core'),
				"param_name" => "categorybackgroundcolor",
				'value' => '#549ffc',
				),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Category Item hover Background Color",'writepress-core'),
				"param_name" => "categorybackgroundcolorhover",
				'value' => '#347ad1',
				),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Category Item Border Color",'writepress-core'),
				"param_name" => "categorybordercolor",
				'value' => '#549ffc',
				),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Category Item hover Border Color",'writepress-core'),
				"param_name" => "categorybordercolorhover",
				'value' => '#347ad1',
				),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Continue Reading Show/Hide",'writepress-core'),
				"param_name" => "continuereadingshowhide",
				'value' => array(__("Hide",'writepress-core') => "hide",__("Show",'writepress-core') => "show"),
				),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Modify the Continue Reading text",'writepress-core'),
				"param_name" => "continuereadingmodify",
				'value' => 'Continue Reading',
				'dependency' => array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
				),
			
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Button font Color",'writepress-core'),
				"param_name" => "buttonfontcolor",
				'value' => '#777777',
				'dependency' => array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
				),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Button Hover font Color",'writepress-core'),
				"param_name" => "buttonfontcolorhover",
				'value' => '#549ffc',
				'dependency' => array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
				),
				
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Button Background Color",'writepress-core'),
				"param_name" => "buttonbackgroundcolor",
				'value' => '#ffffff',
				'dependency' => array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
				),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Button Hover Background Color",'writepress-core'),
				"param_name" => "buttonbackgroundcolorhover",
				'value' => '#ffffff',
				'dependency' => array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
				),
				
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Button border Color",'writepress-core'),
				"param_name" => "buttonbordercolor",
				'value' => '#777777',
				'dependency' => array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
				),
				
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Button Hover border Color",'writepress-core'),
				"param_name" => "buttonbordercolorhover",
				'value' => '#549ffc',
				'dependency' => array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
				),	
						
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Meta Show/Hide",'writepress-core'),
				"param_name" => "postmetashowhide",
				'value' => array(__("Show",'writepress-core') => "show",__("Hide",'writepress-core') => "hide"),
				),
				
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Meta Text Color",'writepress-core'),
				"param_name" => "blgmodernmetacolor",
				"value" => '#777777', 
				'dependency' => array( 'element' => 'postmetashowhide', 'value' => array('show')),
				),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Meta Text hover Color",'writepress-core'),
				"param_name" => "postmetacolorhover",
				'value' => '#777777',
				'dependency' => array( 'element' => 'postmetashowhide', 'value' => array('show')),
				),		
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Post content Color",'writepress-core'),
				"param_name" => "postcontentcolor",
				'value' => '#777777',
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

			function zolo_blog_post_slider($atts, $content = null) {
			  ob_start();
			   extract(shortcode_atts(array(
							'blogpostsliderstyle' 					=>'postsliderstyle1',	
							'category' 								=>'all',
							'num' 									=>'4',
							'postsliderheight'						=>'450',
							'postslidercaptionheight'				=>'206',
							'postslidercaptionwidth'				=>'606',
							'postslidercaptionpad'					=>'50,50,50,50',
							'postslidercaptionbg' 					=>'',
							'blgcrsltitlesize'						=>'20',
							'slidercaptiontextalgin'				=>'left',
							'blgcrsltitlecolor' 					=>'#777777',
							'titletoppadding' 						=>'12',
							'titlebottompadding' 					=>'15',
							'posttitleseparatorshowhide' 			=>'hide',
							'titleseparatorimg'						=>'',
							'excerptlength'							=>'0',
							'slidercategorydesign'					=>'none',
							'categoryfontcolor'						=>'#ffffff',
							'categoryfontcolorhover'				=>'#ffffff',
							'categorybackgroundcolor'				=>'#549ffc',
							'categorybackgroundcolorhover'			=>'#347ad1',
							'categorybordercolor'					=>'#549ffc',
							'categorybordercolorhover'				=>'#347ad1',
							'continuereadingshowhide'				=>'hide',
							'continuereadingmodify'					=>'Continue Reading',
							'buttonfontcolor'						=>'#757575',
							'buttonfontcolorhover'					=>'#549ffc',
							'buttonbackgroundcolor'					=>'#ffffff',
							'buttonbackgroundcolorhover'			=>'#ffffff',
							'buttonbordercolor'						=>'#757575', 
							'buttonbordercolorhover'				=>'#549ffc',
							'postmetashowhide'						=>'show',
							'blgmodernmetacolor' 					=>'#777777',
							'postmetacolorhover'					=>'#549ffc',
							'postcontentcolor'						=>'#777777',
							'data_animation'						=>'No Animation',
							'data_delay'							=>'500'
							
							
					), $atts));
					
					//Animation
					if($data_animation == 'No Animation'){
							$animatedclass = 'noanimation';
						}else{
							$animatedclass = 'animated hiding';
						}
						
					static $c = 1;
					
					$img = wp_get_attachment_image_src($titleseparatorimg,'full');
					$titleseparatorimg1 = $img[0];
					
					global $post;
					$postslidercaptionpad = explode(",",$postslidercaptionpad);		
					
					if ($category!=="all" && $category!=="") {
						query_posts( 'category_name='.$category.'&post_type=post&ignore_sticky_posts=1&posts_per_page='.$num.'&post_status=publish');
					}else{
						query_posts( 'post_type=post&ignore_sticky_posts=1&posts_per_page='.$num.'&post_status=publish');
					}
					 ?>
			
			<!--Blog Row Start-->
			<div class="zolo_blog_post_slider_area" style="height:<?php if($blogpostsliderstyle != 'postsliderstyle5'){echo $postsliderheight;}?>px;overflow:hidden; width:100%; float:left;">
				
				<div id="owl-demo" class="zolo_blogslider<?php echo $c;?> <?php echo $animatedclass.' '.$blogpostsliderstyle;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">
				  
				  <?php while (have_posts()) : the_post(); ?>
			
				<?php $img = wp_get_attachment_image_src($postslidercaptionbg,'full');
					  $postslidercaptionbgimg = $img[0];
				 $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
					
				 <?php    
				if ( $thumb ){
					$thumb_url = $thumb['0'];
				}
				else {
					$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/blog_large.jpg';
				} ?>
					  <div class="zolo_blog_post_slide" style=" height:<?php if($blogpostsliderstyle != 'postsliderstyle5'){echo $postsliderheight;}?>px;background:url(<?php echo $thumb_url ?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover;">
			   
			   <div class="post_slider_caption <?php echo $slidercaptiontextalgin;?>" style="max-width:<?php echo $postslidercaptionwidth;?>px;min-height:<?php echo $postslidercaptionheight;?>px;background:url(<?php echo $postslidercaptionbgimg ?>) no-repeat center center; padding:<?php echo $postslidercaptionpad[0];?>px <?php echo $postslidercaptionpad[1];?>px <?php echo $postslidercaptionpad[2];?>px <?php echo $postslidercaptionpad[3];?>px;-moz-background-size:100% 100%;-webkit-background-size:100% 100%;-o-background-size:100% 100%;-ms-background-size:100% 100%;background-size:100% 100%;">
			   <div class="post_slider_caption_text">
			   
				<?php if($slidercategorydesign == 'none'){
					$categories_list = get_the_category_list( __( ' / ', 'writepress-core' ) );
					}else{
					$categories_list = get_the_category_list( __( ' ', 'writepress-core' ) );
					} 
				 if ( $categories_list ) {
					echo '<div class="post_slider_category '.$slidercategorydesign.'">';
					echo '<span class="categories-links">';
					echo $categories_list;
					echo '</span>';
					echo '</div>';
					}?>
				  <h2 class="zolo_blog_title" style=" font-size:<?php echo $blgcrsltitlesize;?>px; color:<?php echo $blgcrsltitlecolor;?>; padding:<?php echo $titletoppadding;?>px 0 <?php echo $titlebottompadding;?>px">
				  <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;"><?php the_title();?></a>
				  </h2>
				  <?php if($titleseparatorimg1){?>
				  <div class="postslider_title_separator"><img src="<?php echo esc_url($titleseparatorimg1);?>" alt="writepress"/></div>
				  <?php }?>
				
				<?php if($postmetashowhide == 'show'){?>
					<ul class="metatag_list">
						<li class="date"><span class="meta_label">Posted on: </span> <?php the_time('F j, Y') ?></li>
						<li class="date"><span class="meta_label">Posted by: </span> <?php echo get_the_author_posts_link(); ?></li>
						<li class="date"><?php comments_popup_link( '0 comments ', '1 comment', '% comments', 'comments-link', 'Comments are off for this post');  ?></li>
					</ul>
				<?php }?>
			
			<?php if($excerptlength != '0'){?>
				<div class="zolo_postslider_description" style="color:<?php echo $postcontentcolor;?>;">
				<?php 
				if($continuereadingshowhide == 'show'){
				$continuereadingmodifytext = '<span class="read_more_area"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
				$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext);
				echo  preg_replace( '/\[[^\]]+\]/', '', $content );
				}else{
				$content = wp_trim_words( get_the_content(), $excerptlength, '' );
				echo  preg_replace( '/\[[^\]]+\]/', '', $content );
				}
				?>
				</div>
			<?php }?>
				
			</div>
			</div>
			 </div>
			
				  <!--Blog Box Area End-->
				  <?php endwhile; ?>
				</div>
				
				</div>
			
				
			<style type='text/css'>
			.zolo_blog_post_slider_area <?php echo '.zolo_blogslider'.$c;?> ul.metatag_list,
			.zolo_blog_post_slider_area <?php echo '.zolo_blogslider'.$c;?> ul.metatag_list a{color:<?php echo $blgmodernmetacolor;?>;}
			.zolo_blog_post_slider_area <?php echo '.zolo_blogslider'.$c;?> ul.metatag_list a:hover{color:<?php echo $postmetacolorhover;?>;}
			.zolo_blog_post_slider_area <?php echo '.zolo_blogslider'.$c;?> .post_slider_caption{ text-align:<?php echo $slidercaptiontextalgin;?>;}
			.zolo_blog_post_slider_area <?php echo '.zolo_blogslider'.$c;?> .post_slider_category a{background:<?php echo $categorybackgroundcolor;?>;border: 1px solid <?php echo $categorybordercolor;?>;color:<?php echo $categoryfontcolor;?>;}
			.zolo_blog_post_slider_area <?php echo '.zolo_blogslider'.$c;?> .post_slider_category a:hover{background:<?php echo $categorybackgroundcolorhover;?>;border: 1px solid <?php echo $categorybordercolorhover;?>;color:<?php echo $categoryfontcolorhover;?>;}
			
			.zolo_blog_post_slider_area <?php echo '.zolo_blogslider'.$c;?> .read_more_area{ text-align:<?php echo $slidercaptiontextalgin;?>}
			.zolo_blog_post_slider_area <?php echo '.zolo_blogslider'.$c;?> .read_more_area a.read-more{ color:<?php echo $buttonfontcolor;?>;background:<?php echo $buttonbackgroundcolor;?>; border:1px solid <?php echo $buttonbordercolor;?>;}
			.zolo_blog_post_slider_area <?php echo '.zolo_blogslider'.$c;?> .read_more_area a.read-more:hover{ color:<?php echo $buttonfontcolorhover;?>;background:<?php echo $buttonbackgroundcolorhover;?>; border:1px solid <?php echo $buttonbordercolorhover;?>;}
			
			
			</style>
			<?php
				$c++;
				wp_reset_query();
				$demolp_output = ob_get_clean();
				return $demolp_output;
				}
	}
	
	$Zolo_Blog_Post_Slider_Module = new Zolo_Blog_Post_Slider_Module;
}
