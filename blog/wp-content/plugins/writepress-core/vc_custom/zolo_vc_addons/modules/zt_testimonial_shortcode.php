<?php 
/*-----------------------------------------------------------------------------------*/
/* Testimonial shortcode
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Zolo_Testimonial_Shortcode_Module')) {
	class Zolo_Testimonial_Shortcode_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'zolo_testimonial_shortcode_init' ) );
			add_shortcode( 'zolo_testimonial_shortcode', array( &$this, 'zolo_testimonial_shortcode' ) );
		}
		
		function zolo_testimonial_shortcode_init() {
			
		if ( function_exists( 'vc_map' ) ) {
			vc_map( array(
			"name" => __("Testimonials", 'writepress-core'),
			"base" => "zolo_testimonial_shortcode",
			"class" => "",
			 "category" => __( "ZOLO", "writepress"),
			 "icon"		=> get_template_directory_uri() . "/assets/images/vc_icons/vc-icon-testmonials.png",
			"params" => array(	
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Testimonials Style",'writepress-core'),
					"param_name" => "testimonialstyle",
					"value" => array(__("Style 1",'writepress-core') => "testimonials_style1",__("Style 2",'writepress-core') => "testimonials_style2",__("Style 3",'writepress-core') => "testimonials_style3"),
				),
				array(
					"type" => "attach_image",
					"holder" => "img",
					"class" => "",
					"heading" => __("Image",'writepress-core'),
					"param_name" => "authorimage",
					"value" => '',
					"description" => __("Enter Image",'writepress-core'),
					'dependency' => array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style1' ,'testimonials_style3'))
				 ),	
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Client Image Border Radius(Set 0 for Square And 50 for Circle)",'writepress-core'),
					"param_name" => "testimonialimgborradi",
					"value" => '100',
					'dependency' => array( 'element' => 'testimonialstyle', 'value' => array('testimonials_style1' ,'testimonials_style3'))
				 ),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Author",'writepress-core'),
					"param_name" => "by",
					"value" => 'Matt Tucker',
				 ),	
				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Designation",'writepress-core'),
					"param_name" => "designation",
					"value" => 'Designer',
				 ),	
				array(
					"type" => "textarea",
					"class" => "",
					"heading" => __("Content",'writepress-core'),
					"param_name" => "content",
					"value" => "This is the best WordPress theme I have ever used!",
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Testimonial Font Color",'writepress-core'),
					"param_name" => "testimonialfontcolor",
					"value" => '#777777',
				 ),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Testimonial Background Color",'writepress-core'),
					"param_name" => "testimonialbackgroundcolor",
					"value" => '#ffffff',
				 ),
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Testimonial Border Color",'writepress-core'),
					"param_name" => "testimonialbordercolor",
					"value" => '#cccccc',
				 ),
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Testimonial Author Color",'writepress-core'),
					"param_name" => "testimonialauthorcolor",
					"value" => '#777777',
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

		function zolo_testimonial_shortcode( $atts, $content=null ){
			ob_start();
			extract( shortcode_atts( array(
			'testimonialstyle'   	=> 'testimonials_style1',
			'authorimage'   		=> '',
			'testimonialimgborradi' => '100',
			'by'					=> 'Matt Tucker',
			'designation'			=> 'Designer',
			'testimonialfontcolor'	=> '#777777',
			'testimonialbackgroundcolor'=> '#ffffff',
			'testimonialbordercolor'=> '#cccccc',
			'testimonialauthorcolor'=> '#777777',
			'class'					=> '',
			'data_animation'		=> 'No Animation',
			'data_delay'			=> '500'
			), $atts ) );
			
			//Animation
			if($data_animation == 'No Animation'){
				$animatedclass = 'noanimation';
			}else{
				$animatedclass = 'animated hiding';
			}
			
			static $c = 1;
			
			$img_id = preg_replace( '/[^\d]/', '', $authorimage );
			$img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => '80'  ) );?>
			
			
			<div class="<?php echo 'zolotestimonial'.$c.' '.$testimonialstyle.' '.$animatedclass.' '.$class;?> zolo-testimonial zolo" data-animation = "<?php echo $data_animation;?>" data-delay = "<?php echo $data_delay;?>">
			<?php if($testimonialstyle == 'testimonials_style3'){?>
			<div class="zolo-testimonial-image"><?php echo $img['thumbnail'];?></div>
			<?php }?>
			<div class="zolotestimonial_box">
			<div class="zolo-testimonial-content">
			<?php echo $content;?>
			</div>
			
			<?php if($img['thumbnail'] || $by || $designation){?>
			<div class="zolo-testimonial-author">
			<?php if($testimonialstyle == 'testimonials_style1'){?>
			<div class="zolo-testimonial-image"><?php echo $img['thumbnail'];?></div>
			<?php }?>
			<span class="author"><strong><?php echo $by;?></strong>
			<span class="designation"><?php echo $designation;?></span>
			</span>
			</div>
			<?php }?>
			
			</div>
			</div>
			
			<style>
			.zolotestimonial<?php echo $c.'.testimonials_style2.zolo-testimonial,';?>
			.zolotestimonial<?php echo $c.'.testimonials_style3.zolo-testimonial';?>{background:<?php echo $testimonialbackgroundcolor;?>; border:1px solid <?php echo $testimonialbordercolor;?>; color:<?php echo $testimonialfontcolor;?>;}
			
			.zolotestimonial<?php echo $c;?> .zolo-testimonial-image img{
			-moz-border-radius:<?php echo $testimonialimgborradi;?>px;
			-webkit-border-radius:<?php echo $testimonialimgborradi;?>px;
			-ms-border-radius:<?php echo $testimonialimgborradi;?>px;
			-o-border-radius:<?php echo $testimonialimgborradi;?>px;
			border-radius:<?php echo $testimonialimgborradi;?>px;
			}
			.zolotestimonial<?php echo $c.'.testimonials_style1';?> .zolo-testimonial-content{ background:<?php echo $testimonialbackgroundcolor;?>; border:1px solid <?php echo $testimonialbordercolor;?>; color:<?php echo $testimonialfontcolor;?>;}
			.zolotestimonial<?php echo $c.'.testimonials_style1';?> .zolo-testimonial-content:after{border-right: 15px solid transparent;border-left: 15px solid transparent;border-top: 15px solid <?php echo $testimonialbordercolor;?>;}
			
			.zolotestimonial<?php echo $c.'.testimonials_style1';?> .zolo-testimonial-content:before{border-right: 14px solid transparent;border-left: 14px solid transparent;border-top: 15px solid <?php echo $testimonialbackgroundcolor;?>;}
			
			.zolotestimonial<?php echo $c.'.'.$testimonialstyle;?> .zolo-testimonial-author{color:<?php echo $testimonialauthorcolor;?>;}
			
			</style>
			
			
			<?php
			$c++;
			wp_reset_query();
			$demolp_output = ob_get_clean();
			return $demolp_output;
			}
	}
	
	$Zolo_Testimonial_Shortcode_Module = new Zolo_Testimonial_Shortcode_Module;
}
