<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * About Me Widget
*/
if( ! class_exists( 'ZOLO_About_Me_Widget' ) ) {
	add_action('widgets_init', 'about_me_load_widgets');
	
	function about_me_load_widgets()
	{
		register_widget('ZOLO_About_Me_Widget');
	}
	
	class ZOLO_About_Me_Widget extends WP_Widget {
	
		public function __construct() {
			
			$widget_ops = array('classname' => 'zolo_about_info', 'description' => __( 'Adds a About Me widget.', 'writepress-core' ));
			$control_ops = array('id_base' => 'zolo_about_me-widget');
			parent::__construct('zolo_about_me-widget', 'Writepress: About Me', $widget_ops, $control_ops);
			add_action('admin_enqueue_scripts', array($this, 'zolo_about_me_upload'));
		}
		/**
		* Upload the Javascripts for the media uploader
		*/
		public function zolo_about_me_upload() {
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
			wp_enqueue_script('writepress_upload_media_widget',  WRITEPRESS_EXTENSIONS_PLUGIN_URL . '/widgets/js/upload-media.js', array('jquery'));
			wp_enqueue_style('thickbox');
		}
		
		public function widget($args, $instance)
		{
		
		extract($args);
		$title 				= apply_filters('widget_title', $instance['title']);
		$class_wrap 		= isset( $instance['class_wrap'] ) ? $instance['class_wrap'] : '';
		$style 				= $instance['style'];
		$avtar_style 		= $instance['avtar_style'];
		$border_color 		= $instance['border_color'];
		$img_header 		= $instance['img_header'];
		$img_avatar 		= $instance['img_avatar'];
		$name 				= $instance['name'];
		$text 				= $instance['text'];
		$img_signature 		= $instance['img_signature'];
		$social_style 		= $instance['social_style'];
		$target 			= $instance['target'];
		$social_services 	= $instance['social_services'];

		// Class wrap
		if ( '' != $class_wrap ) {
      		$class_widget = $class_wrap;
		} else {
      		$class_widget = '';
		}

		// no 'class' attribute
		if( strpos($before_widget, 'class') === false ) {
			$before_widget = str_replace('>', 'class="'. $class_widget . '"', $before_widget);
		}
		// there is 'class' attribute
		else {
			$before_widget = str_replace('class="', 'class="'. $class_widget . ' ', $before_widget);
		}

		echo $before_widget;
			if($title) { ?>
				<h3 class="zolo-title widget-title">
					<span><?php echo esc_attr( $title ); ?></span>
				</h3>
			<?php }
			
			// ADD Style
			if ( '' != $border_color ) {
				$border_color = 'style=border-color:'. $border_color .';';
			} ?>
			<div class="zolo-about-me style-<?php echo esc_attr( $style ); ?> avtar-style-<?php echo esc_attr( $avtar_style ); ?>" >
				<?php if ( $img_header ) { ?>
					<img src="<?php echo esc_url( $img_header ); ?>" class="zolo-about-me-banner" alt="writepress">
				<?php } ?>
				<div class="zolo-about-me-header clr">
					<?php if ( $img_avatar ) { ?>
						<img src="<?php echo esc_url( $img_avatar ); ?>" class="zolo-about-me-avatar" alt="writepress" <?php echo esc_attr( $border_color ); ?>>
					<?php } ?>
					<?php if ( $name ) { ?>
						<h3 class="zolo-about-me-name" ><?php echo esc_attr( $name ); ?></h3>
					<?php } ?>
				</div>
				<?php if ( $text ) { ?>
					<div class="zolo-about-me-text clr" ><?php echo do_shortcode( $text ); ?></div>
				<?php } ?>
                <?php if ( $img_signature ) { ?>
						<div class="zolo-signature-box"><img src="<?php echo esc_url( $img_signature ); ?>" class="zolo-about-me-signature" alt="writepress"></div>
					<?php }?>
				<?php if ( $social_services ) { ?>
					<ul class="zolo-ul zolo-about-me-social style-<?php echo esc_attr( $social_style ); ?>">
						<?php
						// Loop through each social service and display font icon
						foreach( $social_services as $key => $service ) {
							$link = !empty( $service['url'] ) ? $service['url'] : null;
							$social_name = $service['name'];
							if ( $link ) {
								if ( 'youtube' == $key ) {
									$key = 'youtube-play';
								}
								echo '<li class="'. esc_attr( $key ) .'"><a href="'. esc_url( $link ) .'" title="'. esc_attr( $social_name ) .'" target="_'.esc_attr( $target ).'"><i class="fa fa-'. esc_attr( $key ) .'"></i></a></li>';
							}
						} ?>
					</ul>
				<?php } ?>
			</div>
		<?php
		echo $after_widget;
	}
	
		public function update($new_instance, $old_instance){
			$instance = $old_instance;
	
			$instance['title'] 				= strip_tags( $new_instance['title'] );
			$instance['class_wrap'] 		= strip_tags( $new_instance['class_wrap'] );
			$instance['style'] 				= $new_instance['style'];
			$instance['avtar_style']		= $new_instance['avtar_style'];
			$instance['border_color'] 		= $new_instance['border_color'];
			$instance['img_header'] 		= $new_instance['img_header'];
			$instance['img_avatar'] 		= $new_instance['img_avatar'];
			$instance['name'] 				= $new_instance['name'];
			$instance['text'] 				= $new_instance['text'];
			$instance['img_signature'] 		= $new_instance['img_signature'];
			$instance['social_style'] 		= $new_instance['social_style'];
			$instance['target'] 			= $new_instance['target'];
			$instance['social_services'] 	= $new_instance['social_services'];
	
			return $instance;
		}
	
		public function form($instance){
			$instance = wp_parse_args((array) $instance, array(
				'title'				=> __('About Me','writepress-core'),
				'class_wrap'		=> '',
				'style'				=> __('Default','writepress-core'),
				'avtar_style'		=> 'circle',
				'background'		=> '',
				'color'				=> '',
				'border_color'		=> '',
				'img_header'		=> '',
				'img_avatar'		=> '',
				'name'				=> 'John Doe',
				'text'				=> 'Lorem ipsum ex vix illud nonummy novumtatio et his. At vix patrioque scribentur at fugitertissi ext scriptaset verterem molestiae.',
				'img_signature'		=> '',
				'social_style' 		=> 'circle',
				'target' 			=> 'blank',
				'social_services'	=> array(
					'facebook'		=> array(
						'name'		=> 'Facebook',
						'url'		=> ''
					),
					'google-plus'	=> array(
						'name'		=> 'GooglePlus',
						'url'		=> ''
					),
					'instagram'		=> array(
						'name'		=> 'Instagram',
						'url'		=> ''
					),
					'linkedin' 		=> array(
						'name'		=> 'LinkedIn',
						'url'		=> ''
					),
					'pinterest' 	=> array(
						'name'		=> 'Pinterest',
						'url'		=> ''
					),
					'twitter' 		=> array(
						'name'		=> 'Twitter',
						'url'		=> ''
					),
					'youtube' 		=> array(
						'name'		=> 'Youtube',
						'url'		=> ''
					),	
				),
			)); ?>
	
			<script type="text/javascript" >
				jQuery(document).ready(function($) {
					$(document).ajaxSuccess(function(e, xhr, settings) {
						var widget_id_base = 'zolo_about_me-widget';
						if(settings.data.search('action=save-widget') != -1 && settings.data.search('id_base=' + widget_id_base) != -1) {
							zoloAboutSortServices();
						}
					});
					function zoloAboutSortServices() {
						$('.zolo-about-social-list').each( function() {
							var id = $(this).attr('id');
							$('#'+ id).sortable({
								placeholder: "placeholder",
								opacity: 0.6
							});
						});
					}
					zoloAboutSortServices();
				});
			</script>
			
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'writepress-core'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('class_wrap'); ?>"><?php _e('Class Wrap (optional):', 'writepress-core'); ?></label>			
				<input class="widefat" id="<?php echo $this->get_field_id('class_wrap'); ?>" name="<?php echo $this->get_field_name('class_wrap'); ?>" type="text" value="<?php echo $instance['class_wrap']; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('style'); ?>"><?php _e('Style:', 'writepress-core'); ?></label>
				<br />
				<select class='zolo-widget-select widefat' name="<?php echo $this->get_field_name('style'); ?>" id="<?php echo $this->get_field_id('style'); ?>">
					<option value="default" <?php if($instance['style'] == 'default') { ?>selected="selected"<?php } ?>><?php _e( 'Default', 'writepress-core' ); ?></option>				
					<option value="simple" <?php if($instance['style'] == 'simple') { ?>selected="selected"<?php } ?>><?php _e( 'Simple', 'writepress-core' ); ?></option>
				</select>
			</p>
            <p>
				<label for="<?php echo $this->get_field_id('avtar_style'); ?>"><?php _e('Avtar Style:', 'writepress-core'); ?></label>
				<br />
				<select class='zolo-widget-select widefat' name="<?php echo $this->get_field_name('avtar_style'); ?>" id="<?php echo $this->get_field_id('avtar_style'); ?>">
					<option value="circle" <?php if($instance['avtar_style'] == 'circle') { ?>selected="selected"<?php } ?>><?php _e( 'Circle', 'writepress-core' ); ?></option>				
					<option value="square" <?php if($instance['avtar_style'] == 'square') { ?>selected="selected"<?php } ?>><?php _e( 'Square', 'writepress-core' ); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('border_color'); ?>"><?php _e('Avatar Border Color:', 'writepress-core'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('border_color'); ?>" name="<?php echo $this->get_field_name('border_color'); ?>" value="<?php echo $instance['border_color']; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('img_header'); ?>"><?php _e( 'Background Image:', 'writepress-core' ); ?></label>
				<small style="font-size: 11px;margin-left: 3px;"><?php _e( 'select image full size', 'writepress-core' ); ?></small>
				<input name="<?php echo $this->get_field_name('img_header'); ?>" id="<?php echo $this->get_field_id('img_header'); ?>" class="widefat" type="text" size="36" value="<?php echo esc_attr( $instance['img_header'] ); ?>" />
				<input class="writepress_upload_image_button button-primary" type="button" value="<?php _e( 'Upload Image', 'writepress-core' ); ?>" style="margin-top: 10px;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('img_avatar'); ?>"><?php _e( 'Avatar:', 'writepress-core' ); ?></label>
				<small style="font-size: 11px;margin-left: 3px;"><?php _e( 'Image size - 125px X 125px', 'writepress-core' ); ?></small>
				<input name="<?php echo $this->get_field_name('img_avatar'); ?>" id="<?php echo $this->get_field_id('img_avatar'); ?>" class="widefat" type="text" size="36" value="<?php echo esc_attr( $instance['img_avatar'] ); ?>" />
				<input class="writepress_upload_image_button button-primary" type="button" value="<?php _e( 'Upload Image', 'writepress-core' ); ?>" style="margin-top: 10px;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name:', 'writepress-core'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" value="<?php echo $instance['name']; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', 'writepress-core'); ?></label>
				<textarea rows="15" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" class="widefat" style="height: 100px;"><?php if( !empty( $instance['text'] ) ) { echo $instance['text']; } ?></textarea>
			</p>
            <p>
				<label for="<?php echo $this->get_field_id('img_signature'); ?>"><?php _e( 'Signature:', 'writepress-core' ); ?></label>
				<input name="<?php echo $this->get_field_name('img_signature'); ?>" id="<?php echo $this->get_field_id('img_signature'); ?>" class="widefat" type="text" size="36" value="<?php echo esc_attr( $instance['img_signature'] ); ?>" />
				<input class="writepress_upload_image_button button-primary" type="button" value="<?php _e( 'Upload Image', 'writepress-core' ); ?>" style="margin-top: 10px;" />
			</p>
			<p class="zolo-left">
				<label for="<?php echo $this->get_field_id('social_style'); ?>"><?php _e('Social Style:', 'writepress-core'); ?></label>
				<br />
				<select class='zolo-widget-select widefat' name="<?php echo $this->get_field_name('social_style'); ?>" id="<?php echo $this->get_field_id('social_style'); ?>">
					<option value="circle" <?php if($instance['social_style'] == 'circle') { ?>selected="selected"<?php } ?>><?php _e( 'Circle', 'writepress-core' ); ?></option>				
					<option value="square" <?php if($instance['social_style'] == 'square') { ?>selected="selected"<?php } ?>><?php _e( 'Square', 'writepress-core' ); ?></option>
					<option value="modern" <?php if($instance['social_style'] == 'modern') { ?>selected="selected"<?php } ?>><?php _e( 'Modern', 'writepress-core' ); ?></option>
                    <option value="none" <?php if($instance['social_style'] == 'none') { ?>selected="selected"<?php } ?>><?php _e( 'None', 'writepress-core' ); ?></option>
				</select>
			</p>
			<p class="zolo-right">
				<label for="<?php echo $this->get_field_id('target'); ?>"><?php _e( 'Social Link Target:', 'writepress-core' ); ?></label>
				<br />
				<select class='zolo-widget-select widefat' name="<?php echo $this->get_field_name('target'); ?>" id="<?php echo $this->get_field_id('target'); ?>">
					<option value="blank" <?php if($instance['target'] == 'blank') { ?>selected="selected"<?php } ?>><?php _e( 'Blank', 'writepress-core' ); ?></option>
					<option value="self" <?php if($instance['target'] == 'self') { ?>selected="selected"<?php } ?>><?php _e( 'Self', 'writepress-core'); ?></option>
				</select>
			</p>
			<h3 style="margin-top:20px;margin-bottom:5px;"><?php _e( 'Social Links','writepress-core' ); ?></h3>  
			<small style="display:block;margin-bottom:10px;"><?php _e('Enter the full URL to your social profile','writepress-core'); ?></small>
			<ul id="<?php echo $this->get_field_id( 'social_services' ); ?>" class="zolo-about-social-list">
				<input type="hidden" id="<?php echo $this->get_field_name( 'social_services' ); ?>" value="<?php echo $this->get_field_name( 'social_services' ); ?>">
				<input type="hidden" id="<?php echo wp_create_nonce('zolo_about_me-widget_nonce'); ?>">
				<?php
				$social_services = $instance['social_services'];
				foreach( $social_services as $key => $service ) {
					$url=0;
					if(isset($service['url'])) $url = $service['url'];
					if(isset($service['name'])) $name = $service['name']; ?>
					<li id="<?php echo $this->get_field_id( 'social_services' ); ?>_0<?php echo $key ?>">
						<p>
							<label for="<?php echo $this->get_field_id( 'social_services' ); ?>-<?php echo $key ?>-name"><?php echo $name; ?>:</label>
							<input type="hidden" id="<?php echo $this->get_field_id( 'social_services' ); ?>-<?php echo $key ?>-url" name="<?php echo $this->get_field_name( 'social_services' ).'['.$key.'][name]'; ?>" value="<?php echo $name; ?>">
							<input type="url" class="widefat" id="<?php echo $this->get_field_id( 'social_services' ); ?>-<?php echo $key ?>-url" name="<?php echo $this->get_field_name( 'social_services' ).'['.$key.'][url]'; ?>" value="<?php echo $url; ?>" />
						</p>
					</li>
				<?php } ?>
			</ul>
		<?php
		}
}
}
?>