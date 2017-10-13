<?php
	
ob_start();
  
$title = $source = $type = $images = $img_size = $img_gutter = $desktop_no_of_items = $small_desktop_no_of_items = $tablet_no_of_items = $slick_variable_width = $slick_center_mode = $slick_center_desktop_padding = $slick_center_small_desktop_padding = $slick_center_tablet_padding = $slick_autoplay = $slick_autoplay_duration = $slick_hide_arrow_navigation = $arrow_navigation_style = $slick_bullet_navigation = $bullet_navigation_style = $slick_focusonselect = $display_title_caption = $slider_height = $gallery_style = $load_in_animation = $onclick = $custom_links = $custom_links_target = $el_class = $gal_images = $css = $css_animation = '';
 
extract(shortcode_atts(array(
	'title' => '',
	'source' => 'media_library',
	'external_img_size' => '',
	'custom_srcs' => '',
    'type' => '',
    'images' => '',
    'img_size' => 'full',
    'desktop_no_of_items' => '',
    'small_desktop_no_of_items' => '',
    'tablet_no_of_items' => '',
	'img_gutter' => '',
    'slick_variable_width' => '',
    'slick_center_mode' => '',
    'slick_center_desktop_padding' => '',
    'slick_center_small_desktop_padding' => '',
    'slick_center_tablet_padding' => '',
    'slick_autoplay' => '',
    'slick_autoplay_duration' => '',
    'slick_hide_arrow_navigation' => '',
    'arrow_navigation_style' => '',
    'slick_bullet_navigation' => '',
    'bullet_navigation_style' => '',
	'slick_focusonselect'=>'',
    "display_title_caption" => "1",
    "slider_height" => "500",
    "gallery_style" => "",
    "load_in_animation" => '',
    "onclick" => '',
    "custom_links" => '',
    'custom_links_target' => 'default',
    'el_class' => '',
	'data_animation'=>'No Animation',
	'data_delay'=>'500',
	'css'=>'',
), $atts));

$default_src = vc_asset_url( 'vc/no_image.png' );

$gal_images = '';
$link_start = '';
$link_end = '';
$el_start = '';
$el_end = '';
$slides_wrap_start = '';
$slides_wrap_end = '';

if(!function_exists('wp_get_attachment')) {
	function wp_get_attachment( $attachment_id ) {
	
		if(is_numeric($attachment_id) && $attachment_id > 0) {
			$attachment = get_post( $attachment_id );
			return array(
				'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
				'caption' => $attachment->post_excerpt,
				'description' => $attachment->post_content,
				'href' => get_permalink( $attachment->ID ),
				'src' => $attachment->guid,
				'title' => $attachment->post_title,
				'masonry_image_sizing' => get_post_meta( $attachment->ID, 'zolo_image_gal_masonry_sizing', true ),
				'image_url' => get_post_meta( $attachment->ID, 'writepress_image_gal_url', true ),
			);
		} else {
			return array(
				'alt' => '',
				'caption' => '',
				'description' => '',
				'href' => '',
				'src' => '',
				'title' => '',
				'masonry_image_sizing' => '',
				'image_url' => ''
			);
		}
	}
}
//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}
	static $c = 1;
	
	$slick_variable_width = ($slick_variable_width)? $slick_variable_width : 'false';
	$slick_center_mode = ($slick_center_mode)? $slick_center_mode : 'false';
	$slick_autoplay = ($slick_autoplay)? $slick_autoplay : 'false';
	$slick_hide_arrow_navigation = ($slick_hide_arrow_navigation)? $slick_hide_arrow_navigation : 'false';
	$slick_bullet_navigation = ($slick_bullet_navigation)? $slick_bullet_navigation : 'false';
	$slick_focusonselect = ($slick_focusonselect)? $slick_focusonselect : 'false';
	

echo '<script type="text/javascript" charset="utf-8">
	var j$ = jQuery;
	j$.noConflict();
	"use strict";
	j$(window).load(function() {

j$(".gallery_slider").slick({
  centerMode: '.$slick_center_mode.',
  centerPadding: "'.$slick_center_desktop_padding.'",
  dots: '.$slick_bullet_navigation.',
  infinite: true,
  speed: 300,
  slidesToShow: '.$desktop_no_of_items.',
  slidesToScroll: 1,
  variableWidth: '.$slick_variable_width.',
  autoplay: '.$slick_autoplay.',
  autoplaySpeed: "'.$slick_autoplay_duration.'",
  arrows: '.$slick_hide_arrow_navigation.',
  focusOnSelect:'.$slick_focusonselect.',
  
  responsive: [
    {
      breakpoint: 1050,
      settings: {
        slidesToShow: '.$small_desktop_no_of_items.',
        slidesToScroll: 1,
		centerPadding: "'.$slick_center_small_desktop_padding.'",
		
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: '.$tablet_no_of_items.',
        slidesToScroll: 1,
		centerPadding: "'.$slick_center_tablet_padding.'",
		
      }
    },
  ]
});
			
			});
		</script>';
?>




<?php 
if($type == 'slick_slider'){
	$el_start = '<div class="slider_item">';
	$el_end = '</div>';
	$slides_wrap_start = '<div class="writepress_gallery_slider_area" style="height:'.$slider_height.'"><div class="writepress_gallery_slider gallery_slider">';
	$slides_wrap_end = '</div></div>';
	
	if ( 'link_image' === $onclick ) {
		wp_enqueue_script( 'prettyphoto' );
		wp_enqueue_style( 'prettyphoto' );
	}
	
	if ( '' === $images ) {
	$images = '-1,-2,-3,-4';
	}
	
	$pretty_rel_random = ' data-rel="prettyPhoto[rel-' . get_the_ID() . '-' . rand() . ']"';
	
	if ( 'custom_link' === $onclick ) {
		$custom_links = vc_value_from_safe( $custom_links );
		$custom_links = explode( ',', $custom_links );
	}
	switch ( $source ) {
		case 'media_library':
			$images = explode( ',', $images );
			break;
	
		case 'external_link':
			$images = vc_value_from_safe( $custom_srcs );
			$images = explode( ',', $images );
	
			break;
	}
	foreach ( $images as $i => $image ) {
		switch ( $source ) {
			case 'media_library':
				if ( $image > 0 ) {
					$img = wpb_getImageBySize( array(
						'attach_id' => $image,
						'thumb_size' => $img_size,
					) );
					$thumbnail = $img['thumbnail'];
					$large_img_src = $img['p_img_large'][0];
				} else {
					$large_img_src = $default_src;
					$thumbnail = '<img src="' . esc_url($default_src) . '" alt="writepress"/>';
				}
				break;
	
			case 'external_link':
				$image = esc_attr( $image );
				$dimensions = vcExtractDimensions( $external_img_size );
				$hwstring = $dimensions ? image_hwstring( $dimensions[0], $dimensions[1] ) : '';
				$thumbnail = '<img ' . $hwstring . ' src="' . esc_url($image) . '" alt="writepress"/>';
				$large_img_src = $image;
				break;
		}	
		$link_start = $link_end = '';

	switch ( $onclick ) {
		case 'img_link_large':
			$link_start = '<a href="' . $large_img_src . '" target="' . $custom_links_target . '">';
			$link_end = '</a>';
			break;

		case 'link_image':
			$link_start = '<a class="prettyphoto" href="' . $large_img_src . '"' . $pretty_rel_random . '>';
			$link_end = '</a>';
			break;

		case 'custom_link':
			if ( ! empty( $custom_links[ $i ] ) ) {
				$link_start = '<a href="' . $custom_links[ $i ] . '"' . ( ! empty( $custom_links_target ) ? ' target="' . $custom_links_target . '"' : '' ) . '>';
				$link_end = '</a>';
			}
			break;
	}

	$gal_images .= $el_start . $link_start . $thumbnail . $link_end . $el_end;
	}
	
	
	$class_to_filter = 'wpb_gallery wpb_content_element vc_clearfix';
	$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
	$wrapper_attributes = array();
	$output = '';
	$output .= '<div class="' . $css_class . '" ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_widget_title( array(
		'title' => $title,
		'extraclass' => 'wpb_gallery_heading',
	) );
	$output .= '<div class="wpb_gallery_slides' . $type . '" >' . $slides_wrap_start . $gal_images . $slides_wrap_end . '</div>';
	$output .= '</div>';
	
	echo $output;
	
			
}else if($type == 'image_grid'){
	
	echo 'image_grid';
	
}else if($type == 'image_masonry'){
	
	echo 'image_masonry';
	
}else if($type == 'image_packery'){

	echo 'image_packery';

}
?>

<style>
.writepress_gallery_slider_area .writepress_gallery_slider{ padding:0 <?php echo '-'.$img_gutter;?>px;}
.writepress_gallery_slider_area .writepress_gallery_slider .slider_item{ padding:<?php echo $img_gutter;?>px;}

<?php if($arrow_navigation_style == 'style1'){?>

.writepress_gallery_slider_area .writepress_gallery_slider .slick-arrow:before{ content:"\f104";}
.writepress_gallery_slider_area .writepress_gallery_slider .slick-arrow.slick-next:before{content:"\f105";}
	
<?php }else if($arrow_navigation_style == 'style2'){?>
.writepress_gallery_slider_area .writepress_gallery_slider .slick-arrow:before{ content:"\f177";}
.writepress_gallery_slider_area .writepress_gallery_slider .slick-arrow.slick-next:before{content:"\f178";}

<?php }else if($arrow_navigation_style == 'style3'){?>
		
<?php }?>

</style>


<?php
	$c++;
	wp_reset_query();
	$demolp_output = ob_get_clean();
	echo $demolp_output;
	
?>


