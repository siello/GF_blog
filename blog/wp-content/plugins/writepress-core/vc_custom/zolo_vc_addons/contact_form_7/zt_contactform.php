<?php 
/*-----------------------------------------------------------------------------------*/
/** Blog Modern
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Zolo_Contactform_Module')) {
	class Zolo_Contactform_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'zolo_contactform_init' ) );
			add_shortcode( 'zolo_contactform', array( &$this, 'zolo_contactform' ) );
		}
		
		function zolo_contactform_init() {
			global $wpdb;
			$cf7 = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_type = 'wpcf7_contact_form' " );
			$contact_forms = array();
			$contact_forms['Select your form'] = '';
			if ( $cf7 ) {
				foreach ( $cf7 as $cform ) {
					$contact_forms[$cform->post_title] = $cform->ID;
				}
			} else {
				$contact_forms[__( 'No contact forms found', 'writepress-core' )] = 0;
			}
			
			if ( function_exists( 'vc_map' ) ) {
			vc_map( array(
			"name" => __("Contact Form", 'writepress-core'),
			"base" => "zolo_contactform",
			"class" => "",
			"category" => __( "ZOLO", "writepress"),
			"icon"		=> get_template_directory_uri() . "/images/vc_icons/vc-icon-imagebox.png",
			"params" => array(		
				
			
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Select contact form",'writepress-core'),
					"param_name" => "contactform_id",
					'value' => $contact_forms,
					'description' => __( 'Choose previously created contact form from the drop down list.', 'writepress-core' )
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Text Color",'writepress-core'),
					"param_name" => "contactform_textcolor",
					'value' => '',
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Input Field Background Color",'writepress-core'),
					"param_name" => "contactform_bgcolor",
					'value' => '',
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Input Field Border Color",'writepress-core'),
					"param_name" => "contactform_borcolor",
					'value' => '',
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Text Color",'writepress-core'),
					"param_name" => "contactform_button_textcolor",
					'value' => '',
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Hover Text Color",'writepress-core'),
					"param_name" => "contactform_button_hover_textcolor",
					'value' => '',
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Background Color",'writepress-core'),
					"param_name" => "contactform_button_bgcolor",
					'value' => '',
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Hover Background Color",'writepress-core'),
					"param_name" => "contactform_button_hover_bgcolor",
					'value' => '',
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Border Color",'writepress-core'),
					"param_name" => "contactform_button_borcolor",
					'value' => '',
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Hover Border Color",'writepress-core'),
					"param_name" => "contactform_button_hover_borcolor",
					'value' => '',
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Button Size",'writepress-core'),
					"param_name" => "contactform_button_size",
					"value" => array ("Small" => "small","Medium" => "medium_buttton", "Full Width" => "fullwidth_buttton"),
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
		function zolo_contactform($atts, $content = null) {
		  ob_start();
		   extract(shortcode_atts(array(
						'contactform_id' =>'',
						'contactform_textcolor' =>'',
						'contactform_bgcolor' =>'',
						'contactform_borcolor' =>'',
						'contactform_button_textcolor' =>'',
						'contactform_button_hover_textcolor' =>'',
						'contactform_button_bgcolor' =>'',
						'contactform_button_hover_bgcolor' =>'',
						'contactform_button_borcolor' =>'',
						'contactform_button_hover_borcolor' =>'',
						'contactform_button_size' =>'small',
						'data_animation' =>'No Animation',
						'data_delay' =>'500'
			
						
						
				), $atts));
				
				//Animation
				if($data_animation == 'No Animation'){
					$animatedclass = 'noanimation';
				}else{
					$animatedclass = 'animated hiding';
				}
				
				static $c = 1;
				
				?>
				
			  
				
		<!--zolo calltoaction Row Start-->
		
		<div id="zolo_contactform_<?php echo $c;?>" class="zolo_contactform <?php echo $contactform_button_size.' '.$animatedclass;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
		
		<?php echo do_shortcode('[contact-form-7 id="'.$contactform_id.'" ]')?>
		
		</div>
		
		<style>
		
		<?php if($contactform_textcolor){?>
		#zolo_contactform_<?php echo $c;?> .wpcf7-form select,
		#zolo_contactform_<?php echo $c;?> .wpcf7-form .uneditable-input, 
		#zolo_contactform_<?php echo $c;?> .wpcf7-form input, 
		#zolo_contactform_<?php echo $c;?> .wpcf7-form textarea,
		#zolo_contactform_<?php echo $c;?> .wpcf7-form{color:<?php echo $contactform_textcolor; ?>;}
		<?php }?>
		
		<?php if($contactform_bgcolor){?>
		#zolo_contactform_<?php echo $c;?> .wpcf7-form select,
		#zolo_contactform_<?php echo $c;?> .wpcf7-form .uneditable-input, 
		#zolo_contactform_<?php echo $c;?> .wpcf7-form input, 
		#zolo_contactform_<?php echo $c;?> .wpcf7-form textarea{background:<?php echo $contactform_bgcolor; ?>!important;}
		<?php }?>
		
		<?php if($contactform_borcolor){?>
		#zolo_contactform_<?php echo $c;?> .wpcf7-form select,
		#zolo_contactform_<?php echo $c;?> .wpcf7-form .uneditable-input, 
		#zolo_contactform_<?php echo $c;?> .wpcf7-form input, 
		#zolo_contactform_<?php echo $c;?> .wpcf7-form textarea{border-color:<?php echo $contactform_borcolor; ?>;}
		<?php }?>
		
		<?php if($contactform_button_textcolor || $contactform_button_bgcolor || $contactform_button_borcolor){?>
		#zolo_contactform_<?php echo $c;?> .zt_button_icon, 
		#zolo_contactform_<?php echo $c;?> .zt_button_icon_right, 
		#zolo_contactform_<?php echo $c;?> .wpcf7-form button, 
		#zolo_contactform_<?php echo $c;?> .wpcf7-form input[type="reset"], 
		#zolo_contactform_<?php echo $c;?> .wpcf7-form input[type="submit"], 
		html #zolo_contactform_<?php echo $c;?> .wpcf7-form input[type="button"]{color:<?php echo $contactform_button_textcolor; ?>!important;background:<?php echo $contactform_button_bgcolor; ?>!important;border-color:<?php echo $contactform_button_borcolor; ?>!important;}
		<?php }?>
		
		<?php if($contactform_button_hover_textcolor || $contactform_button_hover_bgcolor || $contactform_button_hover_borcolor){?>
		#zolo_contactform_<?php echo $c;?> .zt_button_icon:hover, 
		#zolo_contactform_<?php echo $c;?> .zt_button_icon_right:hover, 
		#zolo_contactform_<?php echo $c;?> .wpcf7-form button:hover, 
		#zolo_contactform_<?php echo $c;?> .wpcf7-form input[type="reset"]:hover, 
		#zolo_contactform_<?php echo $c;?> .wpcf7-form input[type="submit"]:hover, 
		html #zolo_contactform_<?php echo $c;?> .wpcf7-form input[type="button"]:hover{color:<?php echo $contactform_button_hover_textcolor; ?>!important;background:<?php echo $contactform_button_hover_bgcolor; ?>!important;border-color:<?php echo $contactform_button_hover_borcolor; ?>!important;}
		<?php }?>
		
		</style>
		
		
		<?php
			$c++;
			wp_reset_query();
			$demolp_output = ob_get_clean();
			return $demolp_output;
			}
	}
	
	$Zolo_Contactform_Module = new Zolo_Contactform_Module;
}
