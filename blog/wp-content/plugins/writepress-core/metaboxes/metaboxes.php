<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * The Metaboxes class.
 */
class ZOLOThemeFrameworkMetaboxes {

	public function __construct()
	{
		global $writepress_data;
		$this->data = $writepress_data;

		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
	}

	// Load backend scripts
	function admin_script_loader() {
		global $pagenow;
		if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
			$theme_info = wp_get_theme();

			//wp_enqueue_script('media-upload');
			
			wp_enqueue_script('thickbox');
	   		wp_enqueue_style('thickbox');	
			
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-tabs' );
					
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'color-picker-handle',  WRITEPRESS_EXTENSIONS_PLUGIN_URL.'/metaboxes/js/color-pic.js',array( 'wp-color-picker' ));
			
			// General JS for fields.
			wp_enqueue_script('writepress-options', WRITEPRESS_EXTENSIONS_PLUGIN_URL.'/metaboxes/js/writepress-options.js', array( 'jquery' ),	$theme_info->get( 'Version' ) );

		}
	}

	// Adds the metaboxes.
	public function add_meta_boxes()
	{
		$this->add_meta_box('post_options', 'ZOLO Options', 'post');
		$this->add_meta_box('page_options', 'ZOLO Options', 'page');
	}

	public function add_meta_box($id, $label, $post_type)
	{
		add_meta_box('zt_' . $id, $label, array($this, $id), $post_type);
	}

	public function save_meta_boxes($post_id)
	{
		if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		foreach($_POST as $key => $value) {
			if(strstr($key, 'zt_')) {
				// Check if post meta already exists.
				$meta_exists = metadata_exists( 'post', $post_id, $key );

				// If post meta exists delete it before updating.
				if ( true === $meta_exists ) {
					delete_post_meta( $post_id, $key );
				}
				
				update_post_meta($post_id, $key, $value);
			}
		}
	}
	
	public function post_options() {
		$this->render_option_tabs( array( 'post', 'page', 'header', 'footer', 'sidebars', 'background', 'pagetitlebar' ) );
	}
	public function page_options() {
		$this->render_option_tabs( array( 'page', 'header', 'footer', 'sidebars', 'background', 'pagetitlebar' ) );
	}

	public function render_option_tabs( $requested_tabs, $post_type = 'default' ) {
		$screen = get_current_screen();

		$tabs_names = array(
			'sliders'		=> esc_html__( 'Sliders', 'writepress-core' ),
			'page'			=> esc_html__( 'Page', 'writepress-core' ),
			'post'			=> esc_html__( 'Post', 'writepress-core' ),
			'header'		=> esc_html__( 'Header', 'writepress-core' ),
			'footer'		=> esc_html__( 'Footer', 'writepress-core' ),
			'sidebars'		=> esc_html__( 'Sidebars', 'writepress-core' ),
			'background'	=> esc_html__( 'Background', 'writepress-core' ),
			'pagetitlebar'	=> esc_html__( 'Page Title Bar', 'writepress-core' ),
			'portfolio'		=> esc_html__( 'Portfolio', 'writepress-core' ),
			'team'			=> esc_html__( 'Team', 'writepress-core' ),
			'testimonial'	=> esc_html__( 'Testimonial', 'writepress-core' ),
		);
		?>
		
        <div id="zt_metabox_tabs">
            <ul class="zt_metabox_tabs">
    
                <?php foreach ( $requested_tabs as $key => $tab_name ) : ?>
                    <?php $class_active = ( 0 === $key ) ? ' class="active"' : ''; ?>				
                        <li<?php echo esc_attr($class_active); ?>><a href="<?php echo '#'.$tab_name; ?>"><?php echo esc_html($tabs_names[ $tab_name ]); ?></a></li>
                    
                <?php endforeach; ?>
    
            </ul>
    
            <div class="zt_metabox">
    
                <?php foreach ( $requested_tabs as $key => $tab_name ) : ?>
                <?php $class_active = ( 0 === $key ) ? ' active' : ''; ?>
                    <div class="zt_metabox_tab <?php echo esc_attr($class_active); ?>" id="<?php echo esc_attr($tab_name); ?>">
                        <?php require_once( 'tabs/tab_' . $tab_name . '.php' ); ?>
                    </div>
                <?php endforeach; ?>
    
            </div>
            <div class="clear"></div>
        </div>
		<?php

	}
	
	
	public function text($field = array(), $dependency = array() ) {
		global $post;
				
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];	
		$default = 	$field['default'];	
		
		$db_value = get_post_meta( $post->ID, 'zt_' . $id, true );
		$value = ( $db_value ) ? $db_value : $default;
		
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . esc_attr($id) . '">';
				$html .= $label;
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . esc_html($desc) . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="zt_field">';
				$html .= '<input type="text" id="zt_' . esc_attr($id) . '" name="zt_' . esc_attr($id) . '" value="' . esc_attr($value) . '" />';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
        
	}
	
	public function color($field = array(), $dependency = array() ){
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];	
		$default = 	$field['default'];	
		
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . esc_attr($id) . '">';
				$html .= esc_html($label);
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . esc_html($desc) . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="zt_field">';
				$html .= '<input type="text" id="zt_' . esc_attr($id) . '" name="zt_' . esc_attr($id) . '" value="' . esc_attr(get_post_meta($post->ID, 'zt_' . $id, true)) . '" class="color-picker writepress-color-field" data-alpha="true" data-default="'.esc_attr($default).'" />';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function select($field = array(), $dependency = array() ) {		
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];	
		$default = 	$field['default'];	
		$options = $field['options'];
				
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . esc_attr($id) . '">';
				$html .= esc_html($label);
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . esc_html($desc) . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="zt_field">';
				$html .= '<div class="zolo-shortcodes-arrow"></div>';
				$html .= '<select id="zt_' . esc_attr($id) . '" name="zt_' . esc_attr($id) . '">';
				foreach($options as $key => $option) {
					if(get_post_meta($post->ID, 'zt_' . $id, true) == $key) {
						$selected = 'selected="selected"';
					} else {
						$selected = '';
					}

					$html .= '<option ' . $selected . 'value="' . esc_attr($key) . '">' . esc_attr($option) . '</option>';
				}
				$html .= '</select>';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function multiple($field = array(), $dependency = array() ) {
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];
		$default = 	$field['default'];	
		$options = $field['options'];
		
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . esc_attr($id) . '">';
				$html .= esc_html($label);
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . esc_html($desc) . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="zt_field">';
				$html .= '<select multiple="multiple" id="zt_' . esc_attr($id) . '" name="zt_' . esc_attr($id) . '[]">';
				foreach($options as $key => $option) {
					if(is_array(get_post_meta($post->ID, 'zt_' . $id, true)) && in_array($key, get_post_meta($post->ID, 'zt_' . $id, true))) {
						$selected = 'selected="selected"';
					} else {
						$selected = '';
					}

					$html .= '<option ' . $selected . 'value="' . esc_attr($key) . '">' . esc_attr($option) . '</option>';
				}
				$html .= '</select>';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function textarea($field = array(), $dependency = array() ) {
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];
		$default = 	$field['default'];	
		
		$db_value = get_post_meta( $post->ID, 'zt_' . $id, true );
		$value = ( metadata_exists( 'post', $post->ID, 'zt_' . $id ) ) ? $db_value : $default;

		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . esc_attr($id) . '">';
				$html .= esc_html($label);
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . esc_html($desc) . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="zt_field">';
				$html .= '<textarea cols="120" rows="10" id="zt_' . esc_attr($id) . '" name="zt_' . esc_attr($id) . '">' . esc_textarea($value) . '</textarea>';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function upload($field = array(), $dependency = array() ) {
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];		
		$default = $field['default'];
		
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . esc_attr($id) . '">';
				$html .= esc_html($label);
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . esc_html($desc) . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="zt_field">';
				$html .= '<div class="zt_upload">';
					$html .= '<div><input name="zt_' . esc_attr($id) . '" class="upload_field" id="zt_' . esc_attr($id) . '" type="text" value="' . esc_attr(get_post_meta($post->ID, 'zt_' . $id, true)) . '" /></div>';
					$html .= '<div class="zolo_upload_button_container"><input class="zolo_upload_button" type="button" value="Browse" /></div>';
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}
	
	public function radio_buttonset( $field = array(), $dependency = array() ) {
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];
		
		$options = $field['options'];
		$options_reset = $options;
		reset( $options_reset );
		
		$value = ( '' == get_post_meta( $post->ID, 'zt_' . $id, true )  ) ? key( $options_reset ) : get_post_meta( $post->ID, 'zt_' . $id, true );
		
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . esc_attr($id) . '">';
					$html .= esc_html($label);
					$html .= '</label>';
					if($desc) {
						$html .= '<p>' . esc_html($desc) . '</p>';
					}
				$html .= '</div>';
			$html .= '<div class="zt_field writepress-buttonset">';
				$html .= '<div class="zolo-form-radio-button-set ui-buttonset">';
					$html .= '<input type="hidden" id="zt_'.esc_attr($id).'" name="zt_'.esc_attr($id).'" value="'.esc_attr($value).'" class="button-set-value" />';
						foreach ( $options as $key => $option ) :
							$selected = ( $key == $value ) ? ' ui-state-active' : '';
						$html .= '<a href="#" class="ui-button buttonset-item'.esc_attr($selected).'" data-value="'.esc_attr($key).'">'.esc_attr($option).'</a>';
					endforeach;
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';
		echo $html;
	}
	
	public function image_buttonset( $field = array(), $dependency = array() ) {
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];
		
		$options = $field['options'];
		$options_reset = $options;
		reset( $options_reset );
		
		$value = ( '' == get_post_meta( $post->ID, 'zt_' . $id, true )  ) ? key( $options_reset ) : get_post_meta( $post->ID, 'zt_' . $id, true );
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . esc_attr($id) . '">';
					$html .= esc_html($label);
					$html .= '</label>';
					if($desc) {
						$html .= '<p>' . esc_html($desc) . '</p>';
					}
				$html .= '</div>';
				$html .= '<div class="zt_field writepress-image-buttonset">';
					$html .= '<div class="zolo-form-radio-button-set ui-buttonset">';
						$html .= '<input type="hidden" id="zt_'.esc_attr($id).'" name="zt_'.esc_attr($id).'" value="'.esc_attr($value).'" class="button-set-value" />';
							foreach ( $options as $key => $option ) :							
								$selected = ( $key == $value ) ? ' ui-state-active' : '';
							$html .= '<img src="' . esc_url($option['img']) . '" alt="' . esc_attr($option['alt']) . '" class="ui-button buttonset-item'.esc_attr($selected).'" data-value="'.esc_attr($key).'" />';							
						endforeach;
					$html .= '</div>';
				$html .= '</div>';
			$html .= '</div>';
		
		echo $html;	
		
		}
	
	public function image_upload($field = array(), $dependency = array() ) {
		
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];		
		$default = $field['default'];
		
		$post_meta_value = get_post_meta($post->ID, 'zt_'.$field['id'], true);
		if( $post_meta_value == '' ){
			$post_meta_value = $field['default'];
		}
		
		$post_meta_value = trim($post_meta_value);	
			
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . esc_attr($id) . '">';
				$html .= esc_html($label);
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . esc_html($desc) . '</p>';
				}
				$html .= '</div>';
				$html .= '<div class="zt_field writepress_image_upload">';
					$html .= '<input type="text" class="upload_field" name="zt_'.esc_attr($id).'" id="zt_'.esc_attr($id).'" value="'.esc_attr($post_meta_value).'" />';
					$html .= '<input type="button" class="zt_meta_box_upload_button" value="Select Image" />';
					$html .= '<input type="button" class="zt_meta_box_clear_image_button" value="Clear Image" '.($post_meta_value?'':'disabled').' />';
				if( $post_meta_value ){
					$html .= '<img class="preview-image" src="'.esc_url($post_meta_value).'" alt="writepress"/>';
				}
				$html .= '</div>';
		$html .= '</div>';

		echo $html;
		
		}
	
	private function dependency( $dependency = array() ) {
		$data_dependency = '';
		if ( 0 < count( $dependency ) ) {
			$data_dependency .= '<div class="writepress-dependency">';
			foreach ( $dependency as $dependence ) {
				$data_dependency .= '<span class="hidden" data-value="' . esc_attr($dependence['value']) . '" data-field="' . esc_attr($dependence['field']) . '" data-comparison="' . esc_attr($dependence['comparison']) . '"></span>';
			}
			$data_dependency .= '</div>';
		}
		return $data_dependency;
	}
	

}

$metaboxes = new ZOLOThemeFrameworkMetaboxes;