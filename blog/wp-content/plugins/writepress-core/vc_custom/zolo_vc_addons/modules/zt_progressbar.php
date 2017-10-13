<?php 
/*-----------------------------------------------------------------------------------*/
/*	Progress bar Shortcodes
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Zolo_Progress_Bar_Module')) {
	class Zolo_Progress_Bar_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'zolo_progress_bar_init' ) );
			add_shortcode( 'zolo_progress_bar', array( &$this, 'zolo_progress_bar' ) );
		}
		
		function zolo_progress_bar_init() {
			if ( function_exists( 'vc_map' ) ) {

			vc_map( array(
			  "name" => __("Progress Bar",'writepress-core'),
			  "base" => "zolo_progress_bar",
			  "class" => "",
			  "category" => __( "ZOLO", "writepress"),
			  "icon"		=> get_template_directory_uri() . "/assets/images/vc_icons/vc-icon-progressbar.png",
			  "params" => array(
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Progress bar style",'writepress-core'),
					"param_name" => "style",
					"value" => array ("Box" => "box", "Rounded" => "rounded" ), 
					"description" => __("Choose the Progress bar style ( visual )",'writepress-core'),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Container Height",'writepress-core'),
					"param_name" => "cnt_height",
					"value" => __("10",'writepress-core'),
					"description" => __("Enter the height for the progress bar  ( e.g 10 )",'writepress-core'),
					),
				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Progress bar padding",'writepress-core'),
					"param_name" => "cnt_padding",
					"value" => __("0",'writepress-core'),
					"description" => __("Enter padding for the progress bar ( e.g 0 )",'writepress-core'),
					),
					
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Progress bar Top/Bottom Margin",'writepress-core'),
					"param_name" => "cnt_margin",
					"value" => __("14",'writepress-core'),
					"description" => __("Enter Margin for the progress bar ( e.g 14 )",'writepress-core'),
					),
				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Progress bar title",'writepress-core'),
					"param_name" => "title",
					"value" => __("Webdesign",'writepress-core'),
					"description" => __("Enter the title for the progress bar",'writepress-core'),
					),
				 array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Progress bar Title position",'writepress-core'),
					"param_name" => "title_position",
					"value" => array ("Top" => "top", "Center" => "center", "Bottom" => "bottom"), 
					"description" => __("Choose title position",'writepress-core'),
					),
				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Percentage",'writepress-core'),
					"param_name" => "percentage",
					"value" => __("80",'writepress-core'),
					"description" => __("Enter the percentage ( e.g 80 )",'writepress-core'),
					),
				 array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Percentage Style",'writepress-core'),
					"param_name" => "percentage_style",
					"value" => array ("Style1" => "z_percentage_1", "Style2" => "z_percentage_2", "Style3" => "z_percentage_3"), 
					"description" => __("Choose Percentage Style",'writepress-core'),
					),
				 array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Tooltip Style",'writepress-core'),
					"param_name" => "tooltip_style",
					"value" => array ("Scroll" => "tooltip_scroll", "Hover" => "tooltip_hover"), 
					"description" => __("Choose Tooltip Style",'writepress-core'),
					"dependency" => array( "element" => "percentage_style", "value" => array("z_percentage_3"))
					),	
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Tooltip Text Color","writepress"),
					"param_name" => "tooltip_text_color",
					"value" => "#eeeeee", 
					"description" => __("Choose Tooltip Text Color","writepress"),
					"dependency" => array( "element" => "percentage_style", "value" => array("z_percentage_3"))
					),
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Tooltip Background Color","writepress"),
					"param_name" => "tooltip_bg_color",
					"value" => "#2c3e50", 
					"description" => __("Choose Tooltip Background Color","writepress"),
					"dependency" => array( "element" => "percentage_style", "value" => array("z_percentage_3"))
					),
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Tooltip Border Color","writepress"),
					"param_name" => "tooltip_bor_color",
					"value" => "#eeeeee", 
					"description" => __("Choose Tooltip Border Color","writepress"),
					"dependency" => array( "element" => "percentage_style", "value" => array("z_percentage_3"))
					),
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Title Color","writepress"),
					"param_name" => "title_color",
					"value" => "#777777", 
					"description" => __("Choose Title color","writepress"),
					),
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Progress bar color",'writepress-core'),
					"param_name" => "pb_color",
					"value" => '#549ffc', 
					"description" => __("Choose Progress bar color",'writepress-core'),
					),
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Progress bar second color",'writepress-core'),
					"param_name" => "pb_alt_color",
					"value" => '', 
					"description" => __("Add this color to create gradient (optional)",'writepress-core'),
					),
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Progress bar container color",'writepress-core'),
					"param_name" => "pb_ctn_color",
					"value" => '#f7f7f7', 
					"description" => __("Choose Progress container color",'writepress-core'),
					),
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Border color",'writepress-core'),
					"param_name" => "border_color",
					"value" => '#efeff0', 
					"description" => __("Choose border color",'writepress-core'),
					),
				 array(
					'type' => 'checkbox',
					'heading' => __("Add Stripe?",'writepress-core'),
					'param_name' => 'stripe',
					'value' => array(  'Yes'  => 'yes' ),
					'description' => __("Select if you want to add stripe to the bar",'writepress-core'),
					),	
				 array(
					'type' => 'checkbox',
					'heading' => __("Animate the stripe?",'writepress-core'),
					'param_name' => 'stripe_animation',
					'value' => array(  'Yes'  => 'yes' ),
					'description' => __("Select if you want to make the stripe move",'writepress-core'),
					),	
		
			),
		) );
			}
		}

		function zolo_progress_bar( $atts, $content = null ) {
			
			extract(shortcode_atts(array(
				'style' => 'box',
				'cnt_height' => '10',
				'cnt_padding' => '0',
				'cnt_margin' => '14',
				'title'   => 'Webdesign',
				'title_position' => 'top',
				'percentage' => '80',
				'percentage_style' => 'z_percentage_1',
				'tooltip_bg_color' => '#2c3e50',
				'tooltip_bor_color' => '#eeeeee',
				'tooltip_text_color' => '#eeeeee',
				'tooltip_style' => 'tooltip_scroll',
				'title_color' => '#777777',
				'pb_color'=> '#549ffc',
				'pb_alt_color'=> '',
				'pb_ctn_color'=> '#f7f7f7',
				'border_color'=> '#efeff0',		
				'stripe'=> '',		
				'stripe_animation'=> '',
			), $atts));
		
		ob_start();
		
		$pb_id = RandomString(20);
		
		if($stripe_animation == 'yes'){
			$stripe_animation = 'moving_stripe';
		}
		
		if($percentage_style == 'z_percentage_1'){
			$percentage_style_class = 'percentage_style1';
		}elseif($percentage_style == 'z_percentage_2'){
			$percentage_style_class = 'percentage_style2';
		}elseif($percentage_style == 'z_percentage_3'){
			$percentage_style_class = 'percentage_style3';
		}
		
		?>
		
		<div class="z_pb_holder <?php echo 'z_pb_holder_'.$pb_id.' '.$style.' title_position_'.$title_position.' title_position_'.$title_position.' '.$percentage_style_class.' '.$tooltip_style;?>">
		  <div id="<?php echo 'pb_'.$pb_id;?>" class="progress_bar_sc">
			<?php if($percentage < 101){?>
			<?php if($title_position == 'top'){?>
			<div class="pb_title_area"> <span class="pb_title"><?php echo $title;?></span>
			  <?php if($percentage_style != 'z_percentage_3'){?>
			  <span class="pb_percentage"><?php echo $percentage;?>%</span>
			  <?php }?>
			</div>
			<?php }?>
			<div class="pb_ctn">
			  <div class="pb_ctn_box">
				<div data-percentage-value="<?php echo $percentage;?>" class="pb_bg">
				  <?php if($percentage_style == 'z_percentage_3'){?>
				  <?php if($title_position == 'center'){?>
				  <div class="pb_title_area"> <span class="pb_title"><?php echo $title;?></span> </div>
				  <?php }?>
				  <span class="pb_percentage"><?php echo $percentage;?>%</span>
				  <?php }else{?>
				  <?php if($title_position == 'center'){?>
				  <div class="pb_title_area"> <span class="pb_title"><?php echo $title;?></span> <span class="pb_percentage"><?php echo $percentage;?>%</span> </div>
				  <?php }
				}?>
				</div>
				<?php if($stripe == 'yes'){?>
				<div class="pb_stripe <?php echo $stripe_animation;?>"></div>
				<?php } ?>
			  </div>
			</div>
			<?php if($title_position == 'bottom'){?>
			<div class="pb_title_area"> <span class="pb_title"><?php echo $title;?></span>
			  <?php if($percentage_style != 'z_percentage_3'){?>
			  <span class="pb_percentage"><?php echo $percentage;?>%</span>
			  <?php }?>
			</div>
			<?php }?>
			<?php }else{?>
			<?php if($title_position == 'top'){?>
			<div class="pb_title_area"> <span class="pb_title"><?php echo $title;?></span> <span class="pb_percentage"><?php echo $percentage;?>%</span> </div>
			<?php }?>
			<div class="pb_ctn">
			  <div class="pb_ctn_box">
				<div class="pb_bg"></div>
				<?php if($title_position == 'center'){?>
				<div class="pb_title_area"> <span class="pb_title"><?php echo $title;?></span> <span class="pb_percentage"><?php echo $percentage;?>%</span> </div>
				<?php }?>
			  </div>
			</div>
			<?php if($title_position == 'bottom'){?>
			<div class="pb_title_area"> <span class="pb_title"><?php echo $title;?></span> <span class="pb_percentage"><?php echo $percentage;?>%</span> </div>
			<?php }?>
			<?php }?>
		  </div>
		</div>
		<?php 
		$pb_percentage_bottom = $cnt_height + $cnt_padding + 10;
		?>
		<style>
		.z_pb_holder #<?php echo 'pb_'.$pb_id;?> .pb_bg{height:<?php echo $cnt_height;?>px;
		background:<?php echo $pb_color;?>; 
		background: -moz-linear-gradient(left, <?php echo $pb_color;?> 0%, <?php echo $pb_alt_color;?> 100%); 
		background: -webkit-gradient(linear, left top, right top, color-stop(0%,<?php echo $pb_color;?>), color-stop(100%,<?php echo $pb_alt_color;?>));  
		background: -webkit-linear-gradient(left, <?php echo $pb_color;?> 0%,<?php echo $pb_alt_color;?> 100%); 
		background: -o-linear-gradient(left, <?php echo $pb_color;?> 0%,<?php echo $pb_alt_color;?> 100%); 
		background: -ms-linear-gradient(left, <?php echo $pb_color;?> 0%,<?php echo $pb_alt_color;?> 100%); 
		background: linear-gradient(to right, <?php echo $pb_color;?> 0%,<?php echo $pb_alt_color;?> 100%); 
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="<?php echo $pb_color;?>", endColorstr="<?php echo $pb_alt_color;?>",GradientType=1 ); 
		}
		.z_pb_holder #<?php echo 'pb_'.$pb_id;?> .pb_ctn{background:<?php echo $pb_ctn_color;?>; border:1px solid <?php echo $border_color;?>;padding:<?php echo $cnt_padding;?>px;}
		.z_pb_holder #<?php echo 'pb_'.$pb_id;?> .pb_title_area{color:<?php echo $title_color;?>;}
		.z_pb_holder.percentage_style3 #<?php echo 'pb_'.$pb_id;?> .pb_percentage{bottom:<?php echo $pb_percentage_bottom;?>px;}
		
		.z_pb_holder.percentage_style3 #<?php echo 'pb_'.$pb_id;?> .pb_percentage{background:<?php echo $tooltip_bg_color;?>;border:1px solid <?php echo $tooltip_bor_color;?>;color:<?php echo $tooltip_text_color;?>;}
		.z_pb_holder.percentage_style3 #<?php echo 'pb_'.$pb_id;?> .pb_percentage:before{border-top: 7px solid <?php echo $tooltip_bor_color;?>;}
		.z_pb_holder.percentage_style3 #<?php echo 'pb_'.$pb_id;?> .pb_percentage:after{border-top: 7px solid <?php echo $tooltip_bg_color;?>;}
		
		.z_pb_holder<?php echo '.z_pb_holder_'.$pb_id;?>{ margin:<?php echo $cnt_margin;?>px 0;}
		
		</style>
		<?php
		$output_string = ob_get_contents();
		ob_end_clean();
		return $output_string; 
		}
	}
	
	$Zolo_Progress_Bar_Module = new Zolo_Progress_Bar_Module;
}
