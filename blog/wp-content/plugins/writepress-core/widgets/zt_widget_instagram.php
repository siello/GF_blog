<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
if( ! class_exists( 'ZOLO_Instagram_Info_Widget' ) ) {
	add_action('widgets_init', 'instagram_load_widgets');
	
	function instagram_load_widgets()
	{
		register_widget('ZOLO_Instagram_Info_Widget');
	}
	
	class ZOLO_Instagram_Info_Widget extends WP_Widget {
	
		public function __construct() {
			
			$widget_ops = array('classname' => 'zt_instagram_widget_wrap', 'description' => __( 'Displays Instagram photos.', 'writepress-core' ));
			
			$control_ops = array('id_base' => 'instagram_info_widget');
			
			parent::__construct('instagram_info_widget', 'Writepress: Instagram', $widget_ops, $control_ops);
			
			// Add new Image Size
			add_image_size( 'zt_insta_square', 640, 640, true );
			
			add_action( 'wp_enqueue_scripts', array(&$this,'zt_instagram_script'), 15);
			
			add_action( 'admin_enqueue_scripts', array( $this, 'instagram_info_widget_js' ) );
			
			add_action( 'instagram_info_widget', array( $this, 'echo_widget' ) );
		}
		
		/**
		* Upload the Javascripts for the media uploader
		*/
		public function instagram_info_widget_js() {
			wp_enqueue_script('zt-insta-admin-script',  WRITEPRESS_EXTENSIONS_PLUGIN_URL . '/widgets/js/insta-admin.js', array('jquery'));
		}
		
		public function zt_instagram_script() {
			wp_enqueue_style( 'zt-instagram-widget', WRITEPRESS_EXTENSIONS_PLUGIN_URL . '/widgets/css/instagram-widget.css' );
		}

		public function widget($args, $instance){			
		
			extract($args);
			$class_wrap = isset( $instance['class_wrap'] ) ? $instance['class_wrap'] : '';
			
			// Class wrap
			if ( '' != $class_wrap ) {
				$class_widget = $class_wrap;
			}else{
				$class_widget = '';
				} 
			// no 'class' attribute
			if( strpos($before_widget, 'class') === false ) {
				$before_widget = str_replace('>', 'class="zt-'. $class_widget . '"', $before_widget);
			}
			// there is 'class' attribute
			else {
				$before_widget = str_replace('class="', 'class="zt-'. $class_widget . ' ', $before_widget);
			}
			
			echo $before_widget;
				
				do_action( 'instagram_info_widget', $instance );
			
			echo $after_widget;

			}
	
		public function update($new_instance, $old_instance)
		{
			$instance 						= $old_instance;
			$instance['title'] 				= strip_tags($new_instance['title']);
			$instance['class_wrap'] 		= strip_tags($new_instance['class_wrap']);
			$instance['search_for']     	= $new_instance['search_for'];
			$instance['username']       	= $new_instance['username'];
			$instance['hashtag']        	= $new_instance['hashtag'];
			$instance['blocked_users']  	= $new_instance['blocked_users'];
			$instance['number'] 			= $new_instance['number'];
			$instance['refresh_hour']   	= $new_instance['refresh_hour'];
			$instance['display_header']   	= $new_instance['display_header'];
			$instance['display_p_picture']  = $new_instance['display_p_picture'];
			$instance['picture_radius']   	= $new_instance['picture_radius'];
			$instance['display_name']   	= $new_instance['display_name'];
			$instance['description']   		= $new_instance['description'];
			$instance['header_position']   	= $new_instance['header_position'];
			$instance['header_align']   	= $new_instance['header_align'];
			$instance['columns'] 			= strip_tags($new_instance['columns']);
			$instance['margin'] 			= $new_instance['margin'];
			$instance['image_size']     	= $new_instance['image_size'];
			$instance['orderby']        	= $new_instance['orderby'];
			$instance['images_link']    	= $new_instance['images_link'];
			$instance['custom_url']     	= $new_instance['custom_url'];
			$instance['target'] 			= $new_instance['target'];
			$instance['follow'] 			= $new_instance['follow'];
			$instance['image_link_class'] 	= $new_instance['image_link_class'];
			return $instance;
		}
	
		public function form($instance){
			$instance = wp_parse_args( (array) $instance, array(
				'title' 			=> __('Instagram','writepress-core'),
				'class_wrap' 		=> '',
				'search_for'       	=> 'username',
				'username'         	=> __('adidas','writepress-core'),
				'hashtag'          	=> '',
				'blocked_users'    	=> '',
				'number' 			=> 10,
				'refresh_hour'     	=> 5,
				'display_header'    => __('No','writepress-core'),
				'display_p_picture'	=> __('Yes','writepress-core'),
				'picture_radius'   	=> __('Rounded','writepress-core'),
				'display_name'     	=> '',
				'description'     	=> '',
				'header_position'   => __('Before','writepress-core'),
				'header_align'   	=> __('Left','writepress-core'),
				'columns' 			=> '',
				'margin' 			=> __('Yes','writepress-core'),
				'image_size'       	=> 'zt_insta_square',
				'orderby'          	=> 'rand',
				'images_link'      	=> 'image_url',
				'custom_url'       	=> '',
				'target' 			=> 'blank',
				'follow' 			=> __('Follow','writepress-core'),
				'image_link_class' 	=> '',
			)); ?>
	
			<div class="zt-container">
	
				<p>
					<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'writepress-core'); ?></label>			
					<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
				</p>
	
				<p>
					<label for="<?php echo $this->get_field_id('class_wrap'); ?>"><?php _e('Class Wrap (optional):', 'writepress-core'); ?></label>			
					<input class="widefat" id="<?php echo $this->get_field_id('class_wrap'); ?>" name="<?php echo $this->get_field_name('class_wrap'); ?>" type="text" value="<?php echo $instance['class_wrap']; ?>" />
				</p>
	
				<p>
					<strong><?php _e( 'Search Instagram for:', 'writepress-core' ); ?></strong>
					<span class="zt-search-for-container">
						<label class="zt-seach-for">
							<input type="radio" id="<?php echo $this->get_field_id( 'search_for' ); ?>" name="<?php echo $this->get_field_name( 'search_for' ); ?>" value="username" <?php checked( 'username', $instance['search_for'] ); ?> />
							<?php _e( 'Username:', 'writepress-core' ); ?>
						</label>
						<input id="<?php echo $this->get_field_id( 'username' ); ?>" class="inline-field-text" name="<?php echo $this->get_field_name( 'username' ); ?>" type="text" value="<?php echo $instance['username']; ?>" />
					</span>
	
					<span class="zt-search-for-container">
						<label class="zt-seach-for">
							<input type="radio" id="<?php echo $this->get_field_id( 'search_for' ); ?>" name="<?php echo $this->get_field_name( 'search_for' ); ?>" value="hashtag" <?php checked( 'hashtag', $instance['search_for'] ); ?> />
							<?php _e( 'Hashtag:', 'writepress-core' ); ?>
						</label>
						<input id="<?php echo $this->get_field_id( 'hashtag' ); ?>" class="inline-field-text" placeholder="<?php _e('without # sign', 'writepress-core'); ?>" name="<?php echo $this->get_field_name( 'hashtag' ); ?>" type="text" value="<?php echo $instance['hashtag']; ?>" />
					</span>
				</p>
	
				<p class="<?php if ( 'hashtag' != $instance['search_for'] ) echo 'hidden'; ?>">
					<label for="<?php echo $this->get_field_id( 'blocked_users' ); ?>"><?php _e( 'Block Users', 'writepress-core' ); ?>:</label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'blocked_users' ); ?>" name="<?php echo $this->get_field_name( 'blocked_users' ); ?>" type="text" value="<?php echo $instance['blocked_users']; ?>" />
					<small><?php _e( 'Enter usernames separated by commas whose images you don\'t want to show', 'writepress-core' ); ?></small>
				</p>
	
				<p>
					<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number Images To Show:', 'writepress-core' ); ?>
						<input class="small-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $instance['number']; ?>" />
					</label>
				</p>
	
				<p>
					<label for="<?php echo $this->get_field_id( 'refresh_hour' ); ?>"><?php _e( 'Check New Images Every:', 'writepress-core' ); ?>
						<input class="small-text" id="<?php echo $this->get_field_id( 'refresh_hour' ); ?>" name="<?php echo $this->get_field_name( 'refresh_hour' ); ?>" type="text" value="<?php echo $instance['refresh_hour']; ?>" />
						<span><?php _e('hours', 'writepress-core'); ?></span>
					</label>
				</p>
	
				<p class="zt-left">
					<label for="<?php echo $this->get_field_id('columns'); ?>"><?php _e('Images Style:', 'writepress-core'); ?></label>
					<select class='zt-widget-select widefat' name="<?php echo $this->get_field_name('columns'); ?>" id="<?php echo $this->get_field_id('columns'); ?>">
						<option value="two-columns" <?php if($instance['columns'] == 'two-columns') { ?>selected="selected"<?php } ?>><?php _e( '2 Columns', 'writepress-core' ); ?></option>
						<option value="three-columns" <?php if($instance['columns'] == 'three-columns') { ?>selected="selected"<?php } ?>><?php _e( '3 Columns', 'writepress-core' ); ?></option>
						<option value="four-columns" <?php if($instance['columns'] == 'four-columns') { ?>selected="selected"<?php } ?>><?php _e( '4 Columns', 'writepress-core' ); ?></option>
						<option value="five-columns" <?php if($instance['columns'] == 'five-columns') { ?>selected="selected"<?php } ?>><?php _e( '5 Columns', 'writepress-core' ); ?></option>
						<option value="six-columns" <?php if($instance['columns'] == 'six-columns') { ?>selected="selected"<?php } ?>><?php _e( '6 Columns', 'writepress-core' ); ?></option>
						<option value="seven-columns" <?php if($instance['columns'] == 'seven-columns') { ?>selected="selected"<?php } ?>><?php _e( '7 Columns', 'writepress-core' ); ?></option>
						<option value="eight-columns" <?php if($instance['columns'] == 'eight-columns') { ?>selected="selected"<?php } ?>><?php _e( '8 Columns', 'writepress-core' ); ?></option>
						<option value="nine-columns" <?php if($instance['columns'] == 'nine-columns') { ?>selected="selected"<?php } ?>><?php _e( '9 Columns', 'writepress-core' ); ?></option>
						<option value="ten-columns" <?php if($instance['columns'] == 'ten-columns') { ?>selected="selected"<?php } ?>><?php _e( '10 Columns', 'writepress-core' ); ?></option>
					</select>
				</p>
	
				<p class="zt-right">
					<label for="<?php echo $this->get_field_id('margin'); ?>"><?php _e('Margin:', 'writepress-core'); ?></label>
					<select class='zt-widget-select widefat' name="<?php echo $this->get_field_name('margin'); ?>" id="<?php echo $this->get_field_id('margin'); ?>">
						<option value="margin" <?php if($instance['margin'] == 'margin') { ?>selected="selected"<?php } ?>><?php _e( 'Margin', 'writepress-core' ); ?></option>
						<option value="no-margin" <?php if($instance['margin'] == 'no-margin') { ?>selected="selected"<?php } ?>><?php _e( 'No Margin', 'writepress-core' ); ?></option>
					</select>
				</p>
	
				<p>
					<label for="<?php echo $this->get_field_id( 'image_size' ); ?>"><strong><?php _e( 'Image format', 'writepress-core' ); ?></strong></label>
					<select class="widefat" id="<?php echo $this->get_field_id( 'image_size' ); ?>" name="<?php echo $this->get_field_name( 'image_size' ); ?>">
						<option value="zt_insta_square" <?php echo ($instance['image_size'] == 'zt_insta_square') ? ' selected="selected"' : ''; ?>><?php _e( 'Square - Cropped', 'writepress-core' ); ?></option>
						<option value="full" <?php echo ($instance['image_size'] == 'full') ? ' selected="selected"' : ''; ?>><?php _e( 'Original - No Crop', 'writepress-core' ); ?></option>
					</select>
					<small><?php _e( '<strong>Square - Cropped</strong> - images in 640x640 pixels. <br/><strong>Original - No Crop</strong> - original image size.', 'writepress-core' ); ?></small>
				</p>
	
				<p>
					<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><strong><?php _e( 'Order by', 'writepress-core' ); ?></strong>
						<select class="widefat" name="<?php echo $this->get_field_name( 'orderby' ); ?>" id="<?php echo $this->get_field_id( 'orderby' ); ?>">
							<option value="date-ASC" <?php selected( $instance['orderby'], 'date-ASC', true); ?>><?php _e( 'Date - Ascending', 'writepress-core' ); ?></option>
							<option value="date-DESC" <?php selected( $instance['orderby'], 'date-DESC', true); ?>><?php _e( 'Date - Descending', 'writepress-core' ); ?></option>
							<option value="popular-ASC" <?php selected( $instance['orderby'], 'popular-ASC', true); ?>><?php _e( 'Popularity - Ascending', 'writepress-core' ); ?></option>
							<option value="popular-DESC" <?php selected( $instance['orderby'], 'popular-DESC', true); ?>><?php _e( 'Popularity - Descending', 'writepress-core' ); ?></option>
							<option value="rand" <?php selected( $instance['orderby'], 'rand', true); ?>><?php _e( 'Random', 'writepress-core' ); ?></option>
						</select>  
					</label>
				</p>
	
				<p>
					<label for="<?php echo $this->get_field_id( 'images_link' ); ?>"><strong><?php _e( 'Link To', 'writepress-core' ); ?></strong>
						<select class="widefat" name="<?php echo $this->get_field_name( 'images_link' ); ?>" id="<?php echo $this->get_field_id( 'images_link' ); ?>">
							<option value="image_url" <?php selected( $instance['images_link'], 'image_url', true); ?>><?php _e( 'Instagram Image', 'writepress-core' ); ?></option>
							<option class="<?php if ( 'hashtag' == $instance['search_for'] ) echo 'hidden'; ?>" value="user_url" <?php selected( $instance['images_link'], 'user_url', true); ?>><?php _e( 'Instagram Profile', 'writepress-core' ); ?></option>
							<option value="custom_url" <?php selected( $instance['images_link'], 'custom_url', true ); ?>><?php _e( 'Custom Link', 'writepress-core' ); ?></option>
							<option value="none" <?php selected( $instance['images_link'], 'none', true); ?>><?php _e( 'None', 'writepress-core' ); ?></option>
						</select>
					</label>
				</p>
	
				<p class="<?php if ( 'custom_url' != $instance['images_link'] ) echo 'hidden'; ?>">
					<label for="<?php echo $this->get_field_id( 'custom_url' ); ?>"><?php _e( 'Custom Link:', 'writepress-core'); ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'custom_url' ); ?>" name="<?php echo $this->get_field_name( 'custom_url' ); ?>" type="text" value="<?php echo $instance['custom_url']; ?>" />
					<small><?php _e('Use this field only if the above option is set to <strong>Custom Link</strong>', 'writepress-core'); ?></small>
				</p>
	
				<div class="zt-header-wrap <?php if ( 'hashtag' == $instance['search_for'] ) echo 'hidden'; ?>">
					<div class="zt-header-options zt-clr">
						<h4 class="zt-header-title"><?php _e( 'Header Options', 'writepress-core'); ?></h4>
						<p>
							<label for="<?php echo $this->get_field_id('display_header'); ?>"><?php _e('Display Header:', 'writepress-core'); ?></label>
							<select class='zt-widget-select widefat' name="<?php echo $this->get_field_name('display_header'); ?>" id="<?php echo $this->get_field_id('display_header'); ?>">
								<option value="no" <?php if($instance['display_header'] == 'no') { ?>selected="selected"<?php } ?>><?php _e( 'No', 'writepress-core' ); ?></option>
								<option value="yes" <?php if($instance['display_header'] == 'yes') { ?>selected="selected"<?php } ?>><?php _e( 'Yes', 'writepress-core' ); ?></option>
							</select>
						</p>
	
						<p>
							<label for="<?php echo $this->get_field_id('display_p_picture'); ?>"><?php _e('Display Profile Picture:', 'writepress-core'); ?></label>
							<select class='zt-widget-select widefat' name="<?php echo $this->get_field_name('display_p_picture'); ?>" id="<?php echo $this->get_field_id('display_p_picture'); ?>">
								<option value="yes" <?php if($instance['display_p_picture'] == 'yes') { ?>selected="selected"<?php } ?>><?php _e( 'Yes', 'writepress-core' ); ?></option>
								<option value="no" <?php if($instance['display_p_picture'] == 'no') { ?>selected="selected"<?php } ?>><?php _e( 'No', 'writepress-core' ); ?></option>
							</select>
						</p>
	
						<p>
							<label for="<?php echo $this->get_field_id('picture_radius'); ?>"><?php _e( 'Picture Radius:', 'writepress-core' ); ?></label>
							<select class='zt-widget-select widefat' name="<?php echo $this->get_field_name('picture_radius'); ?>" id="<?php echo $this->get_field_id('picture_radius'); ?>">
								<option value="rounded" <?php if($instance['picture_radius'] == 'rounded') { ?>selected="selected"<?php } ?>><?php _e( 'Rounded', 'writepress-core' ); ?></option>
								<option value="square" <?php if($instance['picture_radius'] == 'square') { ?>selected="selected"<?php } ?>><?php _e( 'Square', 'writepress-core'); ?></option>
							</select>
						</p>
	
						<p>
							<label for="<?php echo $this->get_field_id( 'display_name' ); ?>"><?php _e( 'Display Name:', 'writepress-core' ); ?>
								<input class="widefat" id="<?php echo $this->get_field_id( 'display_name' ); ?>" name="<?php echo $this->get_field_name( 'display_name' ); ?>" type="text" placeholder="<?php _e( 'Default is username', 'writepress-core' ); ?>" value="<?php echo $instance['display_name']; ?>" />
							</label>
						</p>
	
						<p>
							<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:', 'writepress-core'); ?></label>
							<textarea rows="15" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" class="widefat" style="height: 100px;"><?php if (  !empty( $instance['description'] ) ) { echo $instance['description']; } ?></textarea>
						</p>
	
						<p class="zt-left">
							<label for="<?php echo $this->get_field_id('header_position'); ?>"><?php _e( 'Position:', 'writepress-core' ); ?></label>
							<select class='zt-widget-select widefat' name="<?php echo $this->get_field_name('header_position'); ?>" id="<?php echo $this->get_field_id('header_position'); ?>">
								<option value="before" <?php if($instance['header_position'] == 'before') { ?>selected="selected"<?php } ?>><?php _e( 'Before Images', 'writepress-core' ); ?></option>
								<option value="after" <?php if($instance['header_position'] == 'after') { ?>selected="selected"<?php } ?>><?php _e( 'After Images', 'writepress-core'); ?></option>
							</select>
						</p>
	
						<p class="zt-right">
							<label for="<?php echo $this->get_field_id('header_align'); ?>"><?php _e( 'Align:', 'writepress-core' ); ?></label>
							<select class='zt-widget-select widefat' name="<?php echo $this->get_field_name('header_align'); ?>" id="<?php echo $this->get_field_id('header_align'); ?>">
								<option value="left" <?php if($instance['header_align'] == 'left') { ?>selected="selected"<?php } ?>><?php _e( 'Left', 'writepress-core' ); ?></option>
								<option value="right" <?php if($instance['header_align'] == 'right') { ?>selected="selected"<?php } ?>><?php _e( 'Right', 'writepress-core'); ?></option>
								<option value="center" <?php if($instance['header_align'] == 'center') { ?>selected="selected"<?php } ?>><?php _e( 'Center', 'writepress-core'); ?></option>
							</select>
						</p>
					</div>
				</div>
	
				<p class="zt-left">
					<label for="<?php echo $this->get_field_id('target'); ?>"><?php _e( 'Button Target:', 'writepress-core' ); ?></label>
					<select class='zt-widget-select widefat' name="<?php echo $this->get_field_name('target'); ?>" id="<?php echo $this->get_field_id('target'); ?>">
						<option value="blank" <?php if($instance['target'] == 'blank') { ?>selected="selected"<?php } ?>><?php _e( 'Blank', 'writepress-core' ); ?></option>
						<option value="self" <?php if($instance['target'] == 'self') { ?>selected="selected"<?php } ?>><?php _e( 'Self', 'writepress-core'); ?></option>
					</select>
				</p>
	
				<p class="zt-right">
					<label for="<?php echo $this->get_field_id('follow'); ?>"><?php _e( 'Button Text:', 'writepress-core' ); ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id('follow'); ?>" name="<?php echo $this->get_field_name('follow'); ?>" type="text" value="<?php echo $instance['follow']; ?>" />
				</p>
	
				<p>
					<label for="<?php echo $this->get_field_id( 'image_link_class' ); ?>"><?php _e( 'Image Link Class', 'writepress-core' ); ?>:</label>
					<input class="widefat" id="<?php echo $this->get_field_id('image_link_class'); ?>" name="<?php echo $this->get_field_name('image_link_class'); ?>" type="text" value="<?php echo $instance['image_link_class']; ?>" />
					<small><?php _e( 'Usefull if you are using jQuery lightbox plugins to open links', 'writepress-core' ); ?></small>
	
				</p>
	
			</div>
	
		<?php
		}
	
	/**
	 * Echoes the widget method
	 */
	public function echo_widget( $args ) {
		echo $this->display_widget( $args );
	}
	
	private function display_widget( $args ) {
	
		$title 				= apply_filters('widget_title', $args['title']);
		$class_wrap 		= isset( $args['class_wrap'] ) ? $args['class_wrap'] : '';
		$username         	= isset( $args['username'] ) && !empty( $args['username'] ) ? $args['username'] : 'adidas';
		$hashtag          	= isset( $args['hashtag'] ) && !empty( $args['hashtag'] ) ? $args['hashtag'] : false;
		$blocked_users    	= isset( $args['blocked_users'] ) && !empty( $args['blocked_users'] ) ? $args['blocked_users'] : false;
		$number 			= isset( $args['number'] ) ? $args['number'] : 10;
		$refresh_hour     	= isset( $args['refresh_hour'] ) ? absint( $args['refresh_hour'] ) : 5;
		$display_header 	= isset( $args['display_header'] ) ? $args['display_header'] : 'no';
		$display_p_picture 	= isset( $args['display_p_picture'] ) ? $args['display_p_picture'] : 'yes';
		$picture_radius 	= isset( $args['picture_radius'] ) ? $args['picture_radius'] : 'rounded';
		$display_name     	= isset( $args['display_name'] ) ? $args['display_name'] : '';
		$description 		= isset( $args['description'] ) ? $args['description'] : '';
		$header_position 	= isset( $args['header_position'] ) ? $args['header_position'] : '';
		$header_align 		= isset( $args['header_align'] ) ? $args['header_align'] : '';
		$columns 			= isset( $args['columns'] ) ? $args['columns'] : '';
		$margin 			= isset( $args['margin'] ) ? $args['margin'] : '';
		$image_size       	= isset( $args['image_size'] ) ? $args['image_size'] : 'zt_insta_square';
		$orderby          	= isset( $args['orderby'] ) ? $args['orderby'] : 'rand';
		$images_link      	= isset( $args['images_link'] ) ? $args['images_link'] : 'local_image_url';
		$custom_url       	= isset( $args['custom_url'] ) ? $args['custom_url'] : '';
		$target 			= isset( $args['target'] ) ? $args['target'] : '';
		$follow 			= isset( $args['follow'] ) ? $args['follow'] : '';
		$image_link_class 	= isset( $args['image_link_class'] ) ? $args['image_link_class'] : '';
		
		
		if( !empty( $username) && $display_p_picture == 'yes' ) {
			$profileimage = wp_remote_get( 'https://www.instagram.com/'.trim( $username ).'/media/' );
			
			if ( !is_wp_error( $profileimage ) && ( isset( $profileimage['response']['code']) && $profileimage['response']['code'] == '200' ) ) {
				
				$result = json_decode( $profileimage['body'] );
				
				$image  = isset( $result->items[0]->user->profile_picture ) ? $result->items[0]->user->profile_picture :'';
				
				if( !empty( $image) )
					$profile_picture = $image;
			}
		}
		
		// Class wrap
		if ( '' != $class_wrap ) {
			$class_widget = $class_wrap;
		}else{
			$class_widget = '';
			} 
	
		if ( isset ( $args['search_for'] ) && $args['search_for'] == 'hashtag' ) {
			$search = 'hashtag';
			$search_for['hashtag'] = $hashtag;
			$search_for['blocked_users'] = $blocked_users;
		} else {
			$search = 'user';
			$search_for['username'] = $username;
		}
	
		if ( $refresh_hour == 0 ) {
			$refresh_hour = 5;
		}
		
		$template_args = array(
			'search_for'    => $search,
			'image_size'    => $image_size,
			'link_class'    => $image_link_class,
		);
	
		$output = __( 'No images found! <br> Try some other hashtag or username', 'writepress-core' );
	
		$images_data = $this->instagram_data( $search_for, $refresh_hour, $number, false );
	
		if ( is_array( $images_data ) && !empty( $images_data ) ) {
	
			if ( $orderby != 'rand' ) {
				
				$orderby = explode( '-', $orderby );
				$func = $orderby[0] == 'date' ? 'sort_timestamp_' . $orderby[1] : 'sort_popularity_' . $orderby[1];
				
				usort( $images_data, array( $this, $func ) );
	
			} else {
				
				shuffle( $images_data );
			}				
			
			$output = '<div class="zt_widget_wrap instagram_info_widget_widget clr '. esc_attr( $class_widget ) .'">';
	
				if ( $title ) {
					$output .= '<h3 class="widget-title"><span>'. esc_attr( $title ) .'</span></h3>';
				}
	
				if ( $display_header != 'no' && $header_position == 'before' ) {
					$output .= '<div class="zt-instagram-header zt-before zt-'. esc_attr( $header_align ) .' clr">';
	
						if ( $display_p_picture == 'yes' ) {
							$output .= '<div class="zt-instagram-avatar '. esc_attr( $picture_radius ) .'">';
								$output .= '<a href="https://www.instagram.com/'. esc_attr( $username ) .'/" target="_blank" rel="nofollow">';
									$output .= '<img src="'. esc_url( $profile_picture ) .'" alt="'. esc_attr( $username ) .'">';
									$output .= '<span class="zt-instagram-follow"><span>Follow</span></span>';
								$output .= '</a>';
							$output .= '</div>';
						}
	
						$output .= '<div class="zt-instagram-info">';
						
							if ( $display_name == '' ) {
								$name = $username;
							} else {
								$name = $display_name;
							}
	
							$output .= '<h3 class="zt-instagram-username"><a href="https://www.instagram.com/'. esc_attr( $username ) .'/" target="_blank" rel="nofollow">'. $name .'</a></h3>';
							
							if ( $description != '' ) {
								$output .= '<p class="zt-instagram-desc">'. do_shortcode( $description ) .'</p>';
							}
	
						$output .= '</div>';
	
					$output .= '</div>';
				}
	
				$output .= '<ul class="zt-instagram-pics clr '. esc_attr( $columns ) .' '. esc_attr( $margin ) .'">';
	
					foreach ( $images_data as $image_data ) {
						
						if ( 'image_url' == $images_link ) {
							$template_args['link_to'] = $image_data['link'];
						} elseif ( 'user_url' == $images_link ) {
							$template_args['link_to'] = 'https://www.instagram.com/' . esc_attr( $username ) . '/';
						} elseif ( 'custom_url' == $images_link ) {
							$template_args['link_to'] = $custom_url;
						}
	
						if ( $image_size == 'zt_insta_square' ) {
							$template_args['image'] = $image_data['url_thumbnail'];
						} elseif( $image_size == 'full' ) {
							$template_args['image'] = $image_data['url'];
						} else {
							$template_args['image'] = $image_data['url'];
						}
	
						$template_args['caption']       = $image_data['caption'];
						$template_args['timestamp']     = $image_data['timestamp'];
						$template_args['username']      = $image_data['username'];
						
						$output .= $this->get_template( $columns, $template_args );
					}
	
				$output .= '</ul>';
	
				if ( $display_header != 'no' && $header_position == 'after' ) {
					$output .= '<div class="zt-instagram-header zt-after zt-'. esc_attr( $header_align ) .' clr">';
	
						if ( $display_p_picture == 'yes' ) {
							$output .= '<div class="zt-instagram-avatar">';
								$output .= '<a href="https://www.instagram.com/'. esc_attr( $username ) .'/" target="_blank" rel="nofollow">';
									$output .= '<img src="'. esc_url( $profile_picture ) .'" alt="'. esc_attr( $username ) .'">';
									$output .= '<span class="zt-instagram-follow"><span>Follow</span></span>';
								$output .= '</a>';
							$output .= '</div>';
						}
	
						$output .= '<div class="zt-instagram-info">';
						
							if ( $display_name == '' ) {
								$name = $username;
							} else {
								$name = $display_name;
							}
	
							$output .= '<h3 class="zt-instagram-username"><a href="https://www.instagram.com/'. esc_attr( $username ) .'/" target="_blank" rel="nofollow">'. $name .'</a></h3>';
							
							if ( $description != '' ) {
								$output .= '<p class="zt-instagram-desc">'. do_shortcode( $description ) .'</p>';
							}
	
						$output .= '</div>';
	
					$output .= '</div>';
				}
	
				if ( $follow != '' ) {
					$output .= '<p class="zt-instagram-link clr"><a href="https://www.instagram.com/'. esc_attr( $username ) .'/" rel="me" target="_'. esc_attr( $target ) .'">'. esc_attr( $follow ) .'</a></p>';
				}
	
	
			$output .= '</div>';
	
		}
	
		return $output;
	}
	
	/**
	 * Function to display Templates styles
	 */
	private function get_template( $columns, $args ) {
	
		$link_to = isset( $args['link_to'] ) ? $args['link_to'] : false;
		
		if ( $args['search_for'] == 'user' || $args['search_for'] == 'hashtag' ) {
			$caption   = $args['caption'];
			$time      = $args['timestamp'];
			$username  = $args['username'];
			$image_url = $args['image'];
		}
	
		$short_caption = wp_trim_words( $caption, 10 );
		$short_caption = preg_replace("/[^A-Za-z0-9?! ]/","", $short_caption);
		$caption       = wp_trim_words( $caption, $more = null );
	
		$image_src = '<img src="' . esc_url($image_url) . '" alt="' . $short_caption . '" title="' . $short_caption . '"/>';
		$image_output  = $image_src;
	
		if ( $link_to ) {
			$image_output  = '<a href="' . $link_to . '" target="_blank"';
	
			if ( ! empty( $args['link_class'] ) ) {
				$image_output .= ' class="' . $args['link_class'] . '"';
			}
			$image_output .= ' title="' . $short_caption . '">' . $image_src . '</a>';
		}			
	
		$output = '';
		
		$output .= "<li>";
		$output .= $image_output;
		$output .= "</li>";
	
		return $output;
	}
	
	/**
	 * Stores the fetched data from instagram in WordPress DB using transients
	 */
	private function instagram_data( $search_for, $cache_hours, $nr_images ) {
		
		if ( isset( $search_for['username'] ) && !empty( $search_for['username'] ) ) {
			$search = 'user';
			$search_string = $search_for['username'];
		} elseif ( isset( $search_for['hashtag'] ) && !empty( $search_for['hashtag'] ) ) {
			$search = 'hashtag';
			$search_string = $search_for['hashtag'];
			$blocked_users = $search_for['blocked_users'];
			$blocked_users_array = $this->get_ids_from_usernames( $blocked_users );
		} else {
			return __( 'Nothing to search for', 'writepress-core');
		}
		
		$opt_name  = 'zt_insta_' . md5( $search . '_' . $search_string );
		$instaData = get_transient( $opt_name );
		$user_opt  = (array) get_option( $opt_name );
	
		if ( false === $instaData || 'hashtag' == $search && $user_opt['blocked_users'] != $blocked_users || $user_opt['search_string'] != $search_string || $user_opt['search'] != $search || $user_opt['cache_hours'] != $cache_hours || $user_opt['nr_images'] != $nr_images ) {
	
			$instaData = array();
			$user_opt['search']        = $search;
			$user_opt['search_string'] = $search_string;
			if ( 'hashtag' == $search ) {
				$user_opt['blocked_users'] = $blocked_users;
			}
			$user_opt['cache_hours']   = $cache_hours;
			$user_opt['nr_images']     = $nr_images;
	
			if ( 'user' == $search ) {
				$response = wp_remote_get( 'https://www.instagram.com/' . trim( $search_string ), array( 'sslverify' => false, 'timeout' => 60 ) );
			} else {
				$response = wp_remote_get( 'https://www.instagram.com/explore/tags/' . trim( $search_string ), array( 'sslverify' => false, 'timeout' => 60 ) );
			}
	
			if ( is_wp_error( $response ) ) {
				return $response->get_error_message();
			}
			
			if ( $response['response']['code'] == 200 ) {
				
				$json = str_replace( 'window._sharedData = ', '', strstr( $response['body'], 'window._sharedData = ' ) );
				
				// Compatibility for version of php where strstr() doesnt accept third parameter
				if ( version_compare( PHP_VERSION, '5.3.0', '>=' ) ) {
					$json = strstr( $json, '</script>', true );
				} else {
					$json = substr( $json, 0, strpos( $json, '</script>' ) );
				}
				
				$json = rtrim( $json, ';' );
				
				// Function json_last_error() is not available before PHP * 5.3.0 version
				if ( function_exists( 'json_last_error' ) ) {
					
					( $results = json_decode( $json, true ) ) && json_last_error() == JSON_ERROR_NONE;
					
				} else {
					
					$results = json_decode( $json, true );
				}
				
				if ( $results && is_array( $results ) ) {
	
					if ( 'user' == $search ) {
						$entry_data = isset( $results['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ? $results['entry_data']['ProfilePage'][0]['user']['media']['nodes'] : array();
					} else {
						$entry_data = isset( $results['entry_data']['TagPage'][0]['tag']['media']['nodes'] ) ? $results['entry_data']['TagPage'][0]['tag']['media']['nodes'] : array();
					}
					
					if ( empty( $entry_data ) ) {
						return __( 'No images found', 'writepress-core');
					}
	
					foreach ( $entry_data as $current => $result ) {
	
						if ( $result['is_video'] == true ) {
							$nr_images++;
							continue;
						}
	
						if ( 'hashtag' == $search ) {
							if ( in_array( $result['owner']['id'], $blocked_users_array ) ) {
								$nr_images++;
								continue;
							}
						}
	
						if ( $current >= $nr_images ) {
							break;
						}
	
						$image_data['code']       = $result['code'];
						$image_data['username']   = 'user' == $search ? $search_string : false;
						$image_data['user_id']    = $result['owner']['id'];
						$image_data['caption']    = isset( $result['caption'] ) ? $this->sanitize( $result['caption'] ) : '';
						$image_data['id']         = $result['id'];
						$image_data['link']       = 'https://www.instagram.com/p/'. $result['code'] . '/';
						$image_data['popularity'] = (int) ( $result['comments']['count'] ) + ( $result['likes']['count'] );
						$image_data['timestamp']  = (float) $result['date'];
						$image_data['url']        = $result['display_src'];
						$image_data['url_thumbnail'] = $result['thumbnail_src'];
						
						if ( $search == 'hashtag' || $search == 'user' ) {
							$instaData[] = $image_data;
						}
						
					} // end -> foreach
					
				} // end -> ( $results ) && is_array( $results ) )
				
			} else { 
	
				return $response['response']['message'];
	
			} // end -> $response['response']['code'] === 200 )
	
			update_option( $opt_name, $user_opt );
			
			if ( is_array( $instaData ) && !empty( $instaData )  ) {
	
				set_transient( $opt_name, $instaData, $cache_hours * 60 * 60 );
			}
			
		} // end -> false === $instaData
	
		return $instaData;
	}
	
	
	/**
	 * Get Instagram Ids from Usernames into array
	 */
	private function get_ids_from_usernames( $usernames ) {
		
		$users = explode( ',', trim( $usernames ) );
		$user_ids = (array) get_transient( 'zt_insta_user_ids' );
		$return_ids = array();
	
		if ( is_array( $users ) && !empty( $users ) ) {
	
			foreach ( $users as $user ) {
				
				if ( isset( $user_ids[$user] ) ) {
					continue;
				}
	
				$response = wp_remote_get( 'https://www.instagram.com/' . trim( $user ), array( 'sslverify' => false, 'timeout' => 60 ) );
			
				if ( is_wp_error( $response ) ) {
	
					return $response->get_error_message();
				}
			
				if ( $response['response']['code'] == 200 ) {
					
					$json = str_replace( 'window._sharedData = ', '', strstr( $response['body'], 'window._sharedData = ' ) );
					
					// Compatibility for version of php where strstr() doesnt accept third parameter
					if ( version_compare( PHP_VERSION, '5.3.0', '>=' ) ) {
						$json = strstr( $json, '</script>', true );
					} else {
						$json = substr( $json, 0, strpos( $json, '</script>' ) );
					}
					
					$json = rtrim( $json, ';' );
					
					// Function json_last_error() is not available before PHP * 5.3.0 version
					if ( function_exists( 'json_last_error' ) ) {
						
						( $results = json_decode( $json, true ) ) && json_last_error() == JSON_ERROR_NONE;
						
					} else {
						
						$results = json_decode( $json, true );
					}
					
					if ( $results && is_array( $results ) ) {
	
						$user_id = isset( $results['entry_data']['ProfilePage'][0]['user']['id'] ) ? $results['entry_data']['ProfilePage'][0]['user']['id'] : false;
					
						if ( $user_id ) { 
							
							$user_ids[$user] = $user_id;
					
							set_transient( 'zt_insta_user_ids', $user_ids );
						}
					}
				}
			}	
		}
	
		foreach ( $users as $user ) {
			$return_ids[] = $user_ids[$user];
		}
	
		return $return_ids;
	}
	/**
	 * Sort Function for timestamp Ascending
	 */
	public function sort_timestamp_ASC( $a, $b ) {
		return $a['timestamp'] > $b['timestamp'];
	}

	/**
	 * Sort Function for timestamp Descending
	 */
	public function sort_timestamp_DESC( $a, $b ) {
		return $a['timestamp'] < $b['timestamp'];
	}

	/**
	 * Sort Function for popularity Ascending
	 */
	public function sort_popularity_ASC( $a, $b ) {
		return $a['popularity'] > $b['popularity'];
	}

	/**
	 * Sort Function for popularity Descending
	 */
	public function sort_popularity_DESC( $a, $b ) {
		return $a['popularity'] < $b['popularity'];
	}	
	/**
	 * Sanitize 4-byte UTF8 chars; no full utf8mb4 support in drupal7+mysql stack.
	 * This solution runs in O(n) time BUT assumes that all incoming input is
	 * strictly UTF8.
	 */
	private function sanitize( $input ) {
				
		if ( !empty( $input ) ) {
			$utf8_2byte       = 0xC0 /*1100 0000*/ ;
			$utf8_2byte_bmask = 0xE0 /*1110 0000*/ ;
			$utf8_3byte       = 0xE0 /*1110 0000*/ ;
			$utf8_3byte_bmask = 0XF0 /*1111 0000*/ ;
			$utf8_4byte       = 0xF0 /*1111 0000*/ ;
			$utf8_4byte_bmask = 0xF8 /*1111 1000*/ ;
			
			$sanitized = "";
			$len       = strlen( $input );
			for ( $i = 0; $i < $len; ++$i ) {
				
				$mb_char = $input[$i]; // Potentially a multibyte sequence
				$byte    = ord( $mb_char );
				
				if ( ( $byte & $utf8_2byte_bmask ) == $utf8_2byte ) {
					$mb_char .= $input[++$i];
				} else if ( ( $byte & $utf8_3byte_bmask ) == $utf8_3byte ) {
					$mb_char .= $input[++$i];
					$mb_char .= $input[++$i];
				} else if ( ( $byte & $utf8_4byte_bmask ) == $utf8_4byte ) {
					// Replace with ? to avoid MySQL exception
					$mb_char = '';
					$i += 3;
				}
				
				$sanitized .= $mb_char;
			}
			
			$input = $sanitized;
		}
		
		return $input;
	}
	
	}
	
}
?>