<?php 
/*-----------------------------------------------------------------------------------*/
/** Call to Action
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Zolo_Callto_Action_Module')) {
	class Zolo_Callto_Action_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'zolo_callto_action_init' ) );
			add_shortcode( 'zolo_callto_action', array( &$this, 'zolo_callto_action' ) );
		}
		
		function zolo_callto_action_init() {
			if ( function_exists( 'vc_map' ) ) {

			vc_map( array(
			"name" => __("Call to Action", 'writepress-core'),
			"base" => "zolo_callto_action",
			"class" => "",
			"category" => __( "ZOLO", "writepress"),
			"icon"		=> get_template_directory_uri() . "/assets/images/vc_icons/vc-icon-calltoaction.png",
			"params" => array(		
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Call to Action Style",'writepress-core'),
					"param_name" => "calltoaction_style",
					"value" => array ("Style 1" => "style1","Style 2" => "style2"), 
					"description" => __("Choose Box Design",'writepress-core'),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Box Top & Bottom Padding",'writepress-core'),
					"param_name" => "calltoaction_topbottom_pad",
					"value" => '30',
					"description" => __("Enter the top and bottom padding for the Box",'writepress-core'),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Box Left & Right Padding",'writepress-core'),
					"param_name" => "calltoaction_leftright_pad",
					"value" => '30',
					"description" => __("Enter the left and right padding for the Box",'writepress-core'),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Box Title",'writepress-core'),
					"param_name" => "calltoaction_title",
					"value" => 'Box Title',
					"description" => __("Enter the Title for the Box",'writepress-core'),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Title Font Size",'writepress-core'),
					"param_name" => "calltoaction_title_size",
					"value" => '24',
					"description" => __("Enter the font size for the title",'writepress-core'),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Title Line Height",'writepress-core'),
					"param_name" => "calltoaction_title_lineheight",
					"value" => '28',
					"description" => __("Enter the line height for the title",'writepress-core'),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Title color",'writepress-core'),
					"param_name" => "calltoaction_titlecolor",
					"value" => '#777777',
					"description" => __("Choose the Title color",'writepress-core'),
					),
				array(
					"type" => "textarea",
					"class" => "",
					"heading" => __("Box Text",'writepress-core'),
					"param_name" => "calltoaction_text",
					"value" => 'This is the main text',
					"description" => __("Text for the module",'writepress-core'),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Text Align",'writepress-core'),
					"param_name" => "calltoaction_textalign",
					"value" => array ("Left" => "left","Right" => "right","Center" => "center"),
					"description" => __("Choose the box text align",'writepress-core'),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Text color",'writepress-core'),
					"param_name" => "calltoaction_textcolor",
					"value" => '#777777',
					"description" => __("Choose the Text color",'writepress-core'),
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Box Background color",'writepress-core'),
					"param_name" => "calltoaction_boxbgcolor",
					"value" => '#f7f7f7',
					"description" => __("Choose the box background color",'writepress-core'),
					),	
					
				array(
					"type" => "attach_image",
					"class" => "",
					"heading" => __("Background Image", "writepress"),
					"param_name" => "imagebox_image",
					"value" => "",
					"description" => __("Choose the box background Image",'writepress-core'),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Top Border Width",'writepress-core'),
					"param_name" => "calltoaction_top_borderwidth",
					"value" => '1',
					"description" => __("Enter the box top border Width",'writepress-core'),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Right Border Width",'writepress-core'),
					"param_name" => "calltoaction_right_borderwidth",
					"value" => '1',
					"description" => __("Enter the box Right border Width",'writepress-core'),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Bottom Border Width",'writepress-core'),
					"param_name" => "calltoaction_bottom_borderwidth",
					"value" => '1',
					"description" => __("Enter the box bottom border Width",'writepress-core'),
					),	
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Left Border Width",'writepress-core'),
					"param_name" => "calltoaction_left_borderwidth",
					"value" => '1',
					"description" => __("Enter the box left border Width",'writepress-core'),
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Box Border color",'writepress-core'),
					"param_name" => "calltoaction_boxbordercolor",
					"value" => '#f0f0f0',
					"description" => __("Choose the box Border color",'writepress-core'),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Button Position",'writepress-core'),
					"param_name" => "calltoaction_buttonposi",
					"value" => array ("Right" => "button_posi_right","Left" => "button_posi_left","Bottom" => "button_posi_bottom"),
					"description" => __("Choose Button Style",'writepress-core'),
					'dependency' => array( 'element' => 'calltoaction_style', 'value' => array('style1')),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Button Size",'writepress-core'),
					"param_name" => "calltoaction_button_size",
					"value" => array ("Small" => "small","Medium" => "medium", "Large" => "large" ), 
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Button text",'writepress-core'),
					"param_name" => "calltoaction_button_text",
					"value" => 'Button text',
					"description" => __("Enter the button text",'writepress-core'),
					'dependency' => array( 'element' => 'calltoaction_style', 'value' => array('style1')),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Button Icon",'writepress-core'),
					"param_name" => "calltoaction_button_icon",
					"value" => 'fa fa-angle-right',
					"description" => __("Enter the fontawesome icon class",'writepress-core'),
					'dependency' => array( 'element' => 'calltoaction_style', 'value' => array('style1')),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Button Icon position",'writepress-core'),
					"param_name" => "calltoaction_button_icon_position",
					"value" => array ("Left" => "left","Right" => "right"),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Button Style",'writepress-core'),
					"param_name" => "calltoaction_buttonstyle",
					"value" => array ("Square" => "square","Rounded" => "rounded"),
					"description" => __("Choose Button Style",'writepress-core'),
					'dependency' => array( 'element' => 'calltoaction_style', 'value' => array('style1')),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Button Hover Style",'writepress-core'),
					"param_name" => "calltoaction_button_hoverstyle",
					"value" => array ("Hover Style 1" => "hoverstyle1","Hover Style 2" => "hoverstyle2","Hover Style 3" => "hoverstyle3","Hover Style 4" => "hoverstyle4","Hover Style 5" => "hoverstyle5"), 
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Button Border Radius",'writepress-core'),
					"param_name" => "calltoaction_button_border_radius",
					"value" => '50',
					'dependency' => array( 'element' => 'calltoaction_buttonstyle', 'value' => array('rounded')),
					),
				array(
					"type" => "vc_link",
					"class" => "",
					"heading" => __("Button Link",'writepress-core'),
					"param_name" => "calltoaction_button_link",
					"description" => __("http://example.com",'writepress-core'),
					'dependency' => array( 'element' => 'calltoaction_style', 'value' => array('style1')),
				 ),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Font color",'writepress-core'),
					"param_name" => "calltoaction_buttonfontcolor",
					"value" => '#666666',
					"description" => __("Choose the button font color",'writepress-core'),
					'dependency' => array( 'element' => 'calltoaction_style', 'value' => array('style1')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Hover Font color",'writepress-core'),
					"param_name" => "calltoaction_buttonfontcolorhover",
					"value" => '#666666',
					"description" => __("Choose the Button hover Font color",'writepress-core'),
					'dependency' => array( 'element' => 'calltoaction_style', 'value' => array('style1')),
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Background color",'writepress-core'),
					"param_name" => "calltoaction_buttonbgcolor",
					"value" => '#ebebeb',
					"description" => __("Choose the Button background color",'writepress-core'),
					'dependency' => array( 'element' => 'calltoaction_style', 'value' => array('style1')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Hover Background color",'writepress-core'),
					"param_name" => "calltoaction_buttonbgcolorhover",
					"value" => '#dcdcdc',
					"description" => __("Choose the Button hover background color",'writepress-core'),
					'dependency' => array( 'element' => 'calltoaction_style', 'value' => array('style1')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Border color",'writepress-core'),
					"param_name" => "calltoaction_buttonbordercolor",
					"value" => '#e6e6e6',
					"description" => __("Choose the Button Border color",'writepress-core'),
					'dependency' => array( 'element' => 'calltoaction_style', 'value' => array('style1')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Hover Border color",'writepress-core'),
					"param_name" => "calltoaction_buttonbordercolorhover",
					"value" => '#ebebeb',
					"description" => __("Choose the Button hover border color",'writepress-core'),
					'dependency' => array( 'element' => 'calltoaction_style', 'value' => array('style1')),
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

		function zolo_callto_action($atts, $content = null) {
		  ob_start();
		   extract(shortcode_atts(array(
						'calltoaction_style' 			=> 'style1',
						'calltoaction_topbottom_pad' 	=> '30',
						'calltoaction_leftright_pad' 	=> '30',
						'calltoaction_title' 			=> 'Box Title',
						'calltoaction_title_size' 		=> '24',
						'calltoaction_title_lineheight'	=> '28',
						'calltoaction_titlecolor' 		=> '#777777',
						'calltoaction_text' 			=> 'This is the main text',
						'calltoaction_textalign'		=>'left',
						'calltoaction_textcolor' 		=> '#777777',
						'calltoaction_boxbgcolor' 		=> '#f7f7f7',
						'imagebox_image' 				=> '',
						'calltoaction_top_borderwidth' 	=> '1',
						'calltoaction_right_borderwidth'=> '1',
						'calltoaction_bottom_borderwidth' => '1',
						'calltoaction_left_borderwidth' => '1',
						'calltoaction_boxbordercolor' 	=> '#f0f0f0',
						'calltoaction_buttonposi'		=> 'button_posi_right',
						'calltoaction_button_size'		=> 'small',
						'calltoaction_button_text'		=> 'Button text',
						'calltoaction_button_icon' 		=> 'fa fa-angle-right',
						'calltoaction_button_icon_position'=>'left',
						'calltoaction_buttonstyle' 		=> 'square',
						'calltoaction_button_hoverstyle'	=> 'hoverstyle1',
						'calltoaction_button_border_radius' => '50',
						'calltoaction_button_link' 		=> 'style1',
						'calltoaction_buttonfontcolor' 	=> '#666666',
						'calltoaction_buttonfontcolorhover' => '#666666',
						'calltoaction_buttonbgcolor' 	=> '#ebebeb',
						'calltoaction_buttonbgcolorhover'=> '#dcdcdc',
						'calltoaction_buttonbordercolor'=> '#e6e6e6',
						'calltoaction_buttonbordercolorhover' => '#ebebeb',
						'data_animation'				=>'No Animation',
						'data_delay'					=>'500'
						
						
				), $atts));
				
				//Animation
				if($data_animation == 'No Animation'){
					$animatedclass = 'noanimation';
				}else{
					$animatedclass = 'animated hiding';
				}
				
				static $c = 1;
		
				$img = wp_get_attachment_image_src($imagebox_image,'full');
				$imagebox_image = $img[0];
		
				$calltoaction_button_link = vc_build_link( $calltoaction_button_link );
				?>
		
		<!--zolo calltoaction Row Start-->
		
		<div id="<?php echo 'zolocalltoaction'.$c;?>" class="zolo_calltoaction <?php echo $calltoaction_buttonposi.' '.$calltoaction_button_size.' '.$calltoaction_style.' '.$animatedclass.' '.$calltoaction_button_hoverstyle;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
		
		<div class="zolo_calltoaction_content">
		<?php if($calltoaction_title){?><h2><?php echo $calltoaction_title;?></h2><?php }?>
		<?php if($calltoaction_text){?><div class="calltoaction_text"><?php echo $calltoaction_text;?></div><?php }?>
		</div>
		<?php if($calltoaction_style == 'style1'){?>
		<?php if($calltoaction_button_text || $calltoaction_button_icon){?>
		
		<div class="zolo_calltoaction_button <?php echo $calltoaction_buttonstyle.' button_icon_'.$calltoaction_button_icon_position;?>">
		<a class="button" title="<?php echo esc_attr( $calltoaction_button_link['title'] );?>" href="<?php echo esc_attr( $calltoaction_button_link['url'] );?>" target="<?php echo ( strlen( $calltoaction_button_link['target'] ) > 0 ? esc_attr( $calltoaction_button_link['target'] ) : '_self' )?>"><span class="button_text"><?php if($calltoaction_button_icon_position == 'left'){?><i class="<?php echo $calltoaction_button_icon;?>"></i><?php } ?><?php echo $calltoaction_button_text;?><?php if($calltoaction_button_icon_position == 'right'){?><i class="<?php echo $calltoaction_button_icon;?>"></i><?php } ?></span>
		</a>
		</div>
		
		<?php }
		 }?>
		</div>
		
		
		<style type='text/css'>
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction{width:100%; float:left; position:relative; text-align:<?php echo $calltoaction_textalign;?>;background-color:<?php echo $calltoaction_boxbgcolor;?>; <?php if($imagebox_image){?>background-image:url(<?php echo $imagebox_image;?>);<?php }?> padding:<?php echo $calltoaction_topbottom_pad;?>px <?php echo $calltoaction_leftright_pad;?>px; border-bottom-width:<?php echo $calltoaction_bottom_borderwidth;?>px;border-top-width:<?php echo $calltoaction_top_borderwidth;?>px;border-left-width:<?php echo $calltoaction_left_borderwidth;?>px;border-right-width:<?php echo $calltoaction_right_borderwidth;?>px; border-color:<?php echo $calltoaction_boxbordercolor;?>; border-style:solid; background-repeat:no-repeat; background-position:center center; 
		-moz-background-size:cover;
		-webkit-background-size:cover;
		-ms-background-size:cover;
		-o-background-size:cover;
		background-size:cover;
		 }
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction.style2:after{ position:absolute; content:""; border:5px solid #fff; bottom:15px;top:15px;left:15px;right:15px;}
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction.style2 .zolo_calltoaction_content{ width:100%;}
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction .zolo_calltoaction_content{width:75%;float:left; color:<?php echo $calltoaction_textcolor;?>;}
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction .zolo_calltoaction_content h2{ padding:0;color:<?php echo $calltoaction_titlecolor;?>;font-size:<?php echo $calltoaction_title_size;?>px; line-height:<?php echo $calltoaction_title_lineheight;?>px;}
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction .zolo_calltoaction_content .calltoaction_text{padding:25px 0 0;}
		
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction.button_posi_left .zolo_calltoaction_content{ float:right;}
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction.button_posi_bottom .zolo_calltoaction_content{ width:100%;}
		
		
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction.button_posi_bottom .zolo_calltoaction_button{padding-top:20px;position: inherit; width:100%; float:left; right:auto;
		-moz-transform: translate(0px,0%);
		-webkit-transform: translate(0px,0%);
		-ms-transform: translate(0px,0%);
		-o-transform: translate(0px,0%);
		transform: translate(0px,0%);
		}
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction.button_posi_bottom .zolo_calltoaction_button a.button{float:none;}
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction.button_posi_left .zolo_calltoaction_button{ left:<?php echo $calltoaction_leftright_pad;?>px; right:auto;}
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction .zolo_calltoaction_button{float:right; position:absolute; right:<?php echo $calltoaction_leftright_pad;?>px; top:50%;overflow: hidden;
		-moz-transform: translate(0px, -50%);
		-webkit-transform: translate(0px, -50%);
		-ms-transform: translate(0px, -50%);
		-o-transform: translate(0px, -50%);
		transform: translate(0px, -50%);
		}	
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction .zolo_calltoaction_button.rounded a.button:before,
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction .zolo_calltoaction_button.rounded a.button{ 
		-moz-border-radius:<?php echo $calltoaction_button_border_radius;?>px;
		-webkit-border-radius:<?php echo $calltoaction_button_border_radius;?>px;
		-ms-border-radius:<?php echo $calltoaction_button_border_radius;?>px;
		-o-border-radius:<?php echo $calltoaction_button_border_radius;?>px;
		border-radius:<?php echo $calltoaction_button_border_radius;?>px;
		}
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction .zolo_calltoaction_button a.button span.button_text{ position:relative;}
		
		.zolo_calltoaction.small .zolo_calltoaction_button a.button{padding:8px 15px;}
		.zolo_calltoaction.medium .zolo_calltoaction_button a.button{ padding:12px 35px;}
		.zolo_calltoaction.large .zolo_calltoaction_button a.button{padding:15px 50px;}
		
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction .zolo_calltoaction_button a.button{position: relative; overflow:hidden;display: inline-block; float:left;background-color:<?php echo $calltoaction_buttonbgcolor;?>; border:1px solid <?php echo $calltoaction_buttonbordercolor;?>; color:<?php echo $calltoaction_buttonfontcolor;?>;}
		
		<?php if($calltoaction_button_text){?>
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction .zolo_calltoaction_button.button_icon_left a.button .fa{ margin-right:12px;}
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction .zolo_calltoaction_button.button_icon_right a.button .fa{ margin-left:12px;}
		<?php }?>
		
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction .zolo_calltoaction_button a.button:hover{border:1px solid <?php echo $calltoaction_buttonbordercolorhover;?>; color:<?php echo $calltoaction_buttonfontcolorhover;?>;}
		
		/*Hover Style CSS Start*/
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction.hoverstyle1 a.button:hover{background:<?php echo $calltoaction_buttonbgcolorhover;?>;}
		
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction a.button:before{
		background:<?php echo $calltoaction_buttonbgcolorhover;?>;
		}
		
		@media (max-width:900px) { 
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction{ text-align:center;}
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction .zolo_calltoaction_content{ width:100%;}
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction.button_posi_left .zolo_calltoaction_button,
		<?php echo '#zolocalltoaction'.$c;?>.zolo_calltoaction .zolo_calltoaction_button{ position:relative; top:auto; left:auto; right:auto; float:none; display:inline-block; margin-top: 30px;
		-moz-transform:translate(0,0);
		-ms-transform:translate(0,0);
		-o-transform:translate(0,0);
		-webkit-transform:translate(0,0);
		transform:translate(0,0);
		}
		
		}
			
		</style>
		
		<?php
			$c++;
			wp_reset_query();
			$demolp_output = ob_get_clean();
			return $demolp_output;
			}
	}
	
	$Zolo_Callto_Action_Module = new Zolo_Callto_Action_Module;
}
