<?php 
/*-----------------------------------------------------------------------------------*/
/** Image Box
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Zolo_Imagebox_Module')) {
	class Zolo_Imagebox_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'zolo_imagebox_init' ) );
			add_shortcode( 'zolo_imagebox', array( &$this, 'zolo_imagebox' ) );
		}
		
		function zolo_imagebox_init() {
			if ( function_exists( 'vc_map' ) ) {

			vc_map( array(
			"name" => __("Image Box", 'writepress-core'),
			"base" => "zolo_imagebox",
			"class" => "",
			"category" => __( "ZOLO", "writepress"),
			"icon"		=> get_template_directory_uri() . "/assets/images/vc_icons/vc-icon-imagebox.png",
			"params" => array(		
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Image Box Style",'writepress-core'),
					"param_name" => "imagebox_style",
					"value" => array ("Style 1" => "style1","Style 2" => "style2"),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Box Background Color",'writepress-core'),
					"param_name" => "imagebox_bg_color",
					'value' => '#ffffff',
					'dependency' => array( 'element' => 'imagebox_style', 'value' => array('style2')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Box Border Color",'writepress-core'),
					"param_name" => "imagebox_bor_color",
					'value' => '#dddddd',
					'dependency' => array( 'element' => 'imagebox_style', 'value' => array('style1', 'style2')),
					),
				array(
					"type" => "attach_image",
					"class" => "",
					"heading" => __("Image", "writepress"),
					"param_name" => "imagebox_image",
					"value" => "",
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Title",'writepress-core'),
					"param_name" => "imagebox_title",
					"value" => 'Your Title',
					'dependency' => array( 'element' => 'imagebox_style', 'value' => array('style2')),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Title Font Size",'writepress-core'),
					"param_name" => "imagebox_title_fonsize",
					"value" => '18',
					'dependency' => array( 'element' => 'imagebox_style', 'value' => array('style2')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Title font Color",'writepress-core'),
					"param_name" => "imagebox_title_color",
					'value' => '#777777',
					'dependency' => array( 'element' => 'imagebox_style', 'value' => array('style2')),
					),
				array(
					"type" => "textarea_html",
					"class" => "",
					"heading" => __("Description Text Area",'writepress-core'),
					"param_name" => "content",
					"value" => 'Your Description Eos movet legimus euripidis ea. Cu eos minim aeque interpretaris, vel te eirmod dissentiet, homero utroque ut mea.',
					'dependency' => array( 'element' => 'imagebox_style', 'value' => array('style2')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Description font Color",'writepress-core'),
					"param_name" => "imagebox_description_color",
					'value' => '#777777',
					'dependency' => array( 'element' => 'imagebox_style', 'value' => array('style2')),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Text Align",'writepress-core'),
					"param_name" => "imagebox_align",
					"value" => array ("Center" => "center","Left" => "left", "Right" => "right" ), 
					'dependency' => array( 'element' => 'imagebox_style', 'value' => array('style2')),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Button Size",'writepress-core'),
					"param_name" => "imagebox_button_size",
					"value" => array ("Small" => "small","Medium" => "medium", "Large" => "large" ), 
					),
				array(
					"type" => "checkbox",
					"class" => "",
					"heading" => __("Button Show on hover",'writepress-core'),
					"param_name" => "imagebox_button_show_onhover",
					'value' => array(  'Yes'  => true ),
					"description" => __("Check the box to display Button Show on hover",'writepress-core'),
					'dependency' => array( 'element' => 'imagebox_style', 'value' => array('style1')),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Button Position",'writepress-core'),
					"param_name" => "imagebox_button_position",
					"value" => array ("Middle" => "middle","Top" => "top", "Bottom" => "bottom" ), 
					'dependency' => array( 'element' => 'imagebox_style', 'value' => array('style1')),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Button Text",'writepress-core'),
					"param_name" => "imagebox_button_text",
					"value" => 'Read More',
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Button Text Font Size",'writepress-core'),
					"param_name" => "imagebox_button_fontsize",
					"value" => '15',
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Button Border Radius",'writepress-core'),
					"param_name" => "imagebox_button_border_radius",
					"value" => '0',
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Button Hover Style",'writepress-core'),
					"param_name" => "imagebox_button_hover_style",
					"value" => array ("Hover Style 1" => "hoverstyle1","Hover Style 2" => "hoverstyle2","Hover Style 3" => "hoverstyle3","Hover Style 4" => "hoverstyle4","Hover Style 5" => "hoverstyle5"), 
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button font Color",'writepress-core'),
					"param_name" => "imagebox_buttonfontcolor",
					'value' => '#eeeeee',
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Hover font Color",'writepress-core'),
					"param_name" => "imagebox_buttonfontcolorhover",
					'value' => '#549ffc',
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Background Color",'writepress-core'),
					"param_name" => "imagebox_buttonbackgroundcolor",
					'value' => '#549ffc',
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Hover Background Color",'writepress-core'),
					"param_name" => "imagebox_buttonbackgroundcolorhover",
					'value' => '#ffffff',
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button border Color",'writepress-core'),
					"param_name" => "imagebox_buttonbordercolor",
					'value' => '#777777',
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Hover border Color",'writepress-core'),
					"param_name" => "imagebox_buttonbordercolorhover",
					'value' => '#549ffc',
					),	
				array(
					"type" => "vc_link",
					"class" => "",
					"heading" => __("Imagee Box Link",'writepress-core'),
					"param_name" => "imagebox_link",
					"description" => __("http://example.com",'writepress-core')
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

		function zolo_imagebox($atts, $content = null) {
		  ob_start();
		   extract(shortcode_atts(array(
						'imagebox_style' => 'style1',
						'imagebox_image' =>'',
						'imagebox_title' =>'Your Title',
						'imagebox_title_fonsize' =>'18',
						'imagebox_title_color' =>'#777777',
						'imagebox_description' =>'Your Description Eos movet legimus euripidis ea. Cu eos minim aeque interpretaris, vel te eirmod dissentiet, homero utroque ut mea.',
						'imagebox_description_color' =>'#777777',
						'imagebox_bg_color' =>'#ffffff',
						'imagebox_bor_color' =>'#dddddd',
						'imagebox_align' =>'center',
						'imagebox_button_size' => 'small',
						'imagebox_button_show_onhover' => '',
						'imagebox_button_position' =>'middle',
						'imagebox_button_text' =>'Read More',
						'imagebox_button_fontsize' =>'15',
						'imagebox_button_border_radius' =>'0',
						'imagebox_button_hover_style' =>'hoverstyle1',
						'imagebox_buttonfontcolor' =>'#eeeeee',
						'imagebox_buttonfontcolorhover' =>'#549ffc',
						'imagebox_buttonbackgroundcolor' =>'#549ffc',
						'imagebox_buttonbackgroundcolorhover' =>'#ffffff',
						'imagebox_buttonbordercolor' =>'#777777',
						'imagebox_buttonbordercolorhover' =>'#549ffc',
						'imagebox_link'	=>'',
						'data_animation'=>'No Animation',
						'data_delay'=>'500',
						
						
				), $atts));
				
				//Animation
				if($data_animation == 'No Animation'){
					$animatedclass = 'noanimation';
				}else{
					$animatedclass = 'animated hiding';
				}
				
				//imagebox_button_show_on hover
				if($imagebox_button_show_onhover == 1){ 
				$button_show_on_hover = 'button_show_on_hover';
				}else{$button_show_on_hover = '';}
				
				static $c = 1;
				
				$img = wp_get_attachment_image_src($imagebox_image,'full');
				$imagebox_image = $img[0];
				$imagebox_link = vc_build_link( $imagebox_link );
				?>
				
		<!--zolo Image Box Row Start-->
		<div id="zolo_imagebox_<?php echo $c;?>" class="zolo_imagebox_area <?php echo $imagebox_button_position.' '.$imagebox_style.' '.$button_show_on_hover.' '.$imagebox_button_size.' '.$imagebox_button_hover_style.' '.$animatedclass;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
		<div class="zolo_imagebox">
		
		<a title="<?php echo esc_attr( $imagebox_link['title'] );?>" href="<?php echo esc_attr( $imagebox_link['url'] );?>" target="<?php echo ( strlen( $imagebox_link['target'] ) > 0 ? esc_attr( $imagebox_link['target'] ) : '_self' )?>">
		<img src="<?php echo esc_url($imagebox_image);?>" alt="writepress"/>
		<?php if($imagebox_style == 'style1'){?>
		<span class="imagebox_button"><span class="button_text"><?php echo $imagebox_button_text;?></span></span>
		<?php }?>
		</a>
		
		</div>
		<?php if($imagebox_style == 'style2'){?>
		<div class="imagebox_content">
		<?php if($imagebox_title){?><h3><?php echo $imagebox_title;?></h3><?php }?>
		
		<div><?php echo apply_filters('the_content', $content); ?></div>
				
		<?php if($imagebox_button_text){?>
		<a title="<?php echo esc_attr( $imagebox_link['title'] );?>" href="<?php echo esc_attr( $imagebox_link['url'] );?>" target="<?php echo ( strlen( $imagebox_link['target'] ) > 0 ? esc_attr( $imagebox_link['target'] ) : '_self' )?>">
		<span class="imagebox_button"><span class="button_text"><?php echo $imagebox_button_text;?></span></span>
		</a>
		<?php }?>
		
		</div>
		<?php }?>
		
		</div>
		
		<style type='text/css'>
		#zolo_imagebox_<?php echo $c;?>.zolo_imagebox_area{ background:<?php echo $imagebox_bg_color;?>; border-color:<?php echo $imagebox_bor_color;?>; text-align:<?php echo $imagebox_align;?>}
		#zolo_imagebox_<?php echo $c;?>.zolo_imagebox_area:hover{box-shadow: 0 0 7px <?php echo $imagebox_bor_color;?>;}
		#zolo_imagebox_<?php echo $c;?> .imagebox_content h3{ line-height:normal; font-size:<?php echo $imagebox_title_fonsize;?>px;color:<?php echo $imagebox_title_color;?>; padding:10px 0 10px 0;}
		#zolo_imagebox_<?php echo $c;?> .imagebox_content p{ padding:10px 0;color:<?php echo $imagebox_description_color;?>;}
		
		#zolo_imagebox_<?php echo $c;?> .imagebox_button{ font-size:<?php echo $imagebox_button_fontsize;?>px;
		-webkit-border-radius:<?php echo $imagebox_button_border_radius;?>px;
		-moz-border-radius:<?php echo $imagebox_button_border_radius;?>px;
		-o-border-radius:<?php echo $imagebox_button_border_radius;?>px;
		-ms-border-radius:<?php echo $imagebox_button_border_radius;?>px;
		border-radius:<?php echo $imagebox_button_border_radius;?>px;
		border:1px solid <?php echo $imagebox_buttonbordercolor;?>; background:<?php echo $imagebox_buttonbackgroundcolor;?>; color:<?php echo $imagebox_buttonfontcolor;?>;
		}
		#zolo_imagebox_<?php echo $c;?> .imagebox_button:hover{ border:1px solid <?php echo $imagebox_buttonbordercolorhover;?>;color:<?php echo $imagebox_buttonfontcolorhover;?>; }
		
		/*Hover Style CSS Start*/
		#zolo_imagebox_<?php echo $c;?>.hoverstyle1 .imagebox_button:hover{background:<?php echo $imagebox_buttonbackgroundcolorhover;?>;}
		
		#zolo_imagebox_<?php echo $c;?> .imagebox_button:before{
		-webkit-border-radius:<?php echo $imagebox_button_border_radius;?>px;
		-moz-border-radius:<?php echo $imagebox_button_border_radius;?>px;
		-o-border-radius:<?php echo $imagebox_button_border_radius;?>px;
		-ms-border-radius:<?php echo $imagebox_button_border_radius;?>px;
		border-radius:<?php echo $imagebox_button_border_radius;?>px;
		background:<?php echo $imagebox_buttonbackgroundcolorhover;?>;
			}
		
		
		</style>
		
		<?php
			$c++;
			wp_reset_query();
			$demolp_output = ob_get_clean();
			return $demolp_output;
			}
	}
	
	$Zolo_Imagebox_Module = new Zolo_Imagebox_Module;
}
