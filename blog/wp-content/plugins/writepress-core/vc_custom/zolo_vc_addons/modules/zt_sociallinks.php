<?php 
/*-----------------------------------------------------------------------------------*/
/** Social Links
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Zolo_Sociallinks_Module')) {
	class Zolo_Sociallinks_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'zolo_sociallinks_init' ) );
			add_shortcode( 'zolo_sociallinks', array( &$this, 'zolo_sociallinks' ) );
		}
		
		function zolo_sociallinks_init() {
			if ( function_exists( 'vc_map' ) ) {

			vc_map( array(
			"name" => __("Social Links", 'writepress-core'),
			"base" => "zolo_sociallinks",
			"class" => "",
			"category" => __( "ZOLO", "writepress"),
			"icon"		=> get_template_directory_uri() . "/assets/images/vc_icons/vc-icon-social.png",
			"params" => array(		
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Social Icon Style",'writepress-core'),
				"param_name" => "socialicon_style",
				"value" => array ("Simple" => "simple","Color" => "color"), 
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Social Icon Design",'writepress-core'),
				"param_name" => "socialicon_design",
				"value" => array ("None" => "none","Square" => "square", "Rounded" => "rounded", "Round" => "round" ), 
			),			
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Social Icon Color",'writepress-core'),
				"param_name" => "socialicon_color",
				'value' => '#bebdbd',
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Social Icon Hover Color",'writepress-core'),
				"param_name" => "socialicon_hover_color",
				'value' => '#afaeae',
			),			
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Box Background Color",'writepress-core'),
				"param_name" => "socialicon_box_bg",
				'value' => '#e8e8e8',
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Box Hover Background Color",'writepress-core'),
				"param_name" => "socialicon_box_hover_bg",
				'value' => '#dbdada',
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Box Border Color",'writepress-core'),
				"param_name" => "socialicon_box_bor",
				'value' => '#e8e8e8',
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Box Hover Border Color",'writepress-core'),
				"param_name" => "socialicon_box_hover_bor",
				'value' => '#dbdada',
			),			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Facebook Link",'writepress-core'),
				"param_name" => "socialicon_facebook",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Twitter Link",'writepress-core'),
				"param_name" => "socialicon_twitter",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Instagram Link",'writepress-core'),
				"param_name" => "socialicon_instagram",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Dribbble Link",'writepress-core'),
				"param_name" => "socialicon_dribbble",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Google+ Link",'writepress-core'),
				"param_name" => "socialicon_googleplus",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("LinkedIn Link",'writepress-core'),
				"param_name" => "socialicon_linkedin",
				"value" => '',
			),			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Tumblr Link",'writepress-core'),
				"param_name" => "socialicon_tumblr",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Reddit Link",'writepress-core'),
				"param_name" => "socialicon_reddit",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Yahoo Link",'writepress-core'),
				"param_name" => "socialicon_yahoo",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Deviantart Link",'writepress-core'),
				"param_name" => "socialicon_deviantart",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Vimeo Link",'writepress-core'),
				"param_name" => "socialicon_vimeo",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Youtube Link",'writepress-core'),
				"param_name" => "socialicon_youtube",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Pinterest Link",'writepress-core'),
				"param_name" => "socialicon_pinterest",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("RSS Link",'writepress-core'),
				"param_name" => "socialicon_rss",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Digg Link",'writepress-core'),
				"param_name" => "socialicon_digg",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Flickr Link",'writepress-core'),
				"param_name" => "socialicon_flickr",
				"value" => '',
			),			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Skype Link",'writepress-core'),
				"param_name" => "socialicon_skype",
				"value" => '',
			),			
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Dropbox Link",'writepress-core'),
				"param_name" => "socialicon_dropbox",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("SoundCloud Link",'writepress-core'),
				"param_name" => "socialicon_soundcloud",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("VK Link",'writepress-core'),
				"param_name" => "socialicon_vk",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Email Address",'writepress-core'),
				"param_name" => "socialicon_email",
				"value" => '',
			),			
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Social Icon's Alignment",'writepress-core'),
				"param_name" => "socialicon_alignment",
				"value" => array ("Left" => "left","Center" => "center", "Right" => "right"), 
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


		function zolo_sociallinks($atts, $content = null) {
		  ob_start();
		   extract(shortcode_atts(array(
						'socialicon_style' =>'simple',
						'socialicon_design' =>'none',
						'socialicon_color' =>'#bebdbd',
						'socialicon_hover_color' =>'#afaeae',
						'socialicon_box_bg' =>'#e8e8e8',
						'socialicon_box_hover_bg' =>'#dbdada',
						'socialicon_box_bor' =>'#e8e8e8',
						'socialicon_box_hover_bor' =>'#dbdada',
						'socialicon_facebook' =>'',
						'socialicon_twitter' =>'',
						'socialicon_instagram' =>'',
						'socialicon_dribbble' =>'',
						'socialicon_googleplus' =>'',
						'socialicon_linkedin' =>'',
						'socialicon_tumblr' =>'',
						'socialicon_reddit' =>'',
						'socialicon_yahoo' =>'',
						'socialicon_deviantart' =>'',
						'socialicon_vimeo' =>'',
						'socialicon_youtube' =>'',
						'socialicon_pinterest' =>'',
						'socialicon_rss' =>'',
						'socialicon_digg' =>'',
						'socialicon_flickr' =>'',
						'socialicon_skype' =>'',
						'socialicon_dropbox' =>'',
						'socialicon_soundcloud' =>'',
						'socialicon_vk' =>'',
						'socialicon_email' =>'',
						'socialicon_alignment' =>'',
						'data_animation'=>'No Animation',
						'data_delay'=>'500',
						
				), $atts));
				
				//Animation
				if($data_animation == 'No Animation'){
					$animatedclass = 'noanimation';
				}else{
					$animatedclass = 'animated hiding';
				}
				$target = '_blank';
				
				static $c = 1;
				
				?>
				
		<!--zolo calltoaction Row Start-->
		
		<div class="zolo_social_box_<?php echo $c;?> zolo_social_box <?php echo $socialicon_style.' '.$socialicon_design.' '.$animatedclass;?>" style="text-align:<?php echo $socialicon_alignment;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
		<ul class="zolo_social_element">
		
				<?php if($socialicon_facebook): ?>
				<li class="social_icon_list facebook"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_facebook; ?>" ><i class="fa fa-facebook"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_flickr): ?>
				<li class="social_icon_list flickr"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_flickr; ?>" ><i class="fa fa-flickr"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_rss): ?>
				<li class="social_icon_list rss"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_rss; ?>" ><i class="fa fa-rss"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_twitter): ?>
				<li class="social_icon_list twitter"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_twitter; ?>" ><i class="fa fa-twitter"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_vimeo): ?>
				<li class="social_icon_list vimeo"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_vimeo; ?>" ><i class="fa fa-vimeo-square"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_youtube): ?>
				<li class="social_icon_list youtube"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_youtube; ?>" ><i class="fa fa-youtube"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_instagram): ?>
				<li class="social_icon_list instagram"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_instagram; ?>" ><i class="fa fa-instagram"></i></a></li>
				<?php endif; ?>
				<?php if($socialicon_pinterest): ?>
				<li class="social_icon_list pinterest"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_pinterest; ?>" ><i class="fa fa-pinterest"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_tumblr): ?>
				<li class="social_icon_list tumblr"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_tumblr; ?>" ><i class="fa fa-tumblr"></i></a></li>
				<?php endif; ?>
				<?php if($socialicon_googleplus): ?>
				<li class="social_icon_list google"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_googleplus; ?>" ><i class="fa fa-google-plus"></i></a></li>
				<?php endif; ?>
				<?php if($socialicon_dribbble): ?>
				<li class="social_icon_list dribbble"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_dribbble; ?>" ><i class="fa fa-dribbble"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_digg): ?>
				<li class="social_icon_list digg"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_digg; ?>" ><i class="fa fa-digg"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_linkedin): ?>
				<li class="social_icon_list linkedin"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_linkedin; ?>" ><i class="fa fa-linkedin"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_skype): ?>
				<li class="social_icon_list skype"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_skype; ?>" ><i class="fa fa-skype"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_deviantart): ?>
				<li class="social_icon_list deviantart"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_deviantart; ?>" ><i class="fa fa-deviantart"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_yahoo): ?>
				<li class="social_icon_list yahoo_link"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_yahoo; ?>" ><i class="fa fa-yahoo"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_reddit): ?>
				<li class="social_icon_list reddit"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_reddit; ?>" ><i class="fa fa-reddit"></i></a></li>
				<?php endif; ?>
		
				<?php if($socialicon_dropbox): ?>
				<li class="social_icon_list dropbox"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_dropbox; ?>" ><i class="fa fa-dropbox"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_soundcloud): ?>
				<li class="social_icon_list soundcloud"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_soundcloud; ?>" ><i class="fa fa-soundcloud"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_vk): ?>
				<li class="social_icon_list vk"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_vk; ?>" ><i class="fa fa-vk"></i></a></li>
				<?php endif; ?>
				
				<?php if($socialicon_email): ?>
				<li class="social_icon_list email"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_email; ?>" ><i class="fa fa-envelope-o"></i></a></li>
				<?php endif; ?>
				
			  </ul>
		
		</div>
		
		
		<style type='text/css'>
		
		
		.zolo_social_box_<?php echo $c;?>.zolo_social_box.simple ul.zolo_social_element li a{ background:<?php echo $socialicon_box_bg; ?>; border:1px solid <?php echo $socialicon_box_bor; ?>; color:<?php echo $socialicon_color; ?>;}
		.zolo_social_box_<?php echo $c;?>.zolo_social_box.simple ul.zolo_social_element li a:hover{ background:<?php echo $socialicon_box_hover_bg; ?>; border:1px solid <?php echo $socialicon_box_hover_bor; ?>; color:<?php echo $socialicon_hover_color; ?>;}
		
		
		
		
		</style>
		
		<?php
			$c++;
			wp_reset_query();
			$demolp_output = ob_get_clean();
			return $demolp_output;
			}
	}
	
	$Zolo_Sociallinks_Module = new Zolo_Sociallinks_Module;
}
