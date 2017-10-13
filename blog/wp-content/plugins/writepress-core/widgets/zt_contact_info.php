<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
if( ! class_exists( 'ZOLO_Contact_Info_Widget' ) ) {
	add_action('widgets_init', 'contact_info_load_widgets');
	
	function contact_info_load_widgets()
	{
		register_widget('ZOLO_Contact_Info_Widget');
	}
	
	class ZOLO_Contact_Info_Widget extends WP_Widget {
	
		public function __construct() {
			$widget_ops = array('classname' => 'contact_info_widget', 'description' => '');
			$control_ops = array('id_base' => 'contact_info-widget');
			parent::__construct('contact_info-widget', 'Writepress: Contact Info', $widget_ops, $control_ops);
		}
	
		public function widget($args, $instance){
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);
	
			echo $before_widget;
	
			if($title) {
				echo $before_title.$title.$after_title;
			}
			?>
			<ul class="contact-info-container">
            
            <?php if(isset($instance['cnt_textarea']) && $instance['cnt_textarea'] && isset($instance['cnt_textarea_options']) && $instance['cnt_textarea_options']=='Top'): ?>
			<li class="cnt_textarea cnt_textarea_options top"><?php echo $instance['cnt_textarea']; ?></li>
			<?php endif; ?>
            
			<?php if(isset($instance['address']) && $instance['address']): ?>
			<li class="address"><span class="contact_info_label"><?php if(isset($instance['address_label_name']) && $instance['address_label_name']): echo $instance['address_label_name']; endif; ?></span><span class="contact_info_value"><?php echo $instance['address']; ?></span></li>
			<?php endif; ?>
	
			<?php if(isset($instance['phone']) && $instance['phone']): ?>
			<li class="phone"><span class="contact_info_label"><?php if(isset($instance['phone_label_name']) && $instance['phone_label_name']): echo $instance['phone_label_name']; endif; ?></span><span class="contact_info_value"><?php echo $instance['phone']; ?></span></li>
			<?php endif; ?>
	
			<?php if(isset($instance['mobile']) && $instance['mobile']): ?>
			<li class="mobile"><span class="contact_info_label"><?php if(isset($instance['mobile_label_name']) && $instance['mobile_label_name']): echo $instance['mobile_label_name']; endif; ?></span><span class="contact_info_value"><?php echo $instance['mobile']; ?></span></li>
			<?php endif; ?>
	
			<?php if(isset($instance['fax']) && $instance['fax']): ?>
			<li class="fax"><span class="contact_info_label"><?php if(isset($instance['fax_label_name']) && $instance['fax_label_name']): echo $instance['fax_label_name']; endif; ?></span> <span class="contact_info_value"><?php echo $instance['fax']; ?></span></li>
			<?php endif; ?>
	
			<?php if(isset($instance['email']) && $instance['email']): ?>
			<li class="email"><span class="contact_info_label"><?php if(isset($instance['email_label_name']) && $instance['email_label_name']): echo $instance['email_label_name']; endif; ?></span> <span class="contact_info_value"><a href="mailto:<?php echo $instance['email']; ?>"><?php if($instance['email']) { echo $instance['email']; } else { echo $instance['email']; } ?></a></span></li>
			<?php endif; ?>
	
			<?php if(isset($instance['web']) && $instance['web']): ?>
			<li class="web"><span class="contact_info_label"><?php if(isset($instance['web_label_name']) && $instance['web_label_name']): echo $instance['web_label_name']; endif; ?></span><span class="contact_info_value"><a href="<?php echo $instance['web']; ?>" target="_blank"><?php if(isset($instance['web']) && $instance['web']) { echo $instance['web']; } else { echo $instance['web']; } ?></a></span></li>
			<?php endif; ?>
			
		    <?php if(isset($instance['cnt_textarea']) && $instance['cnt_textarea'] && isset($instance['cnt_textarea_options']) && $instance['cnt_textarea_options']=='Bottom'): ?>
			<li class="cnt_textarea cnt_textarea_options bottom"><?php echo $instance['cnt_textarea']; ?></li>
			<?php endif; ?>
			
			</ul>
			<?php
			echo $after_widget;
		}
	
		public function update($new_instance, $old_instance){
			$instance = $old_instance;
	
			$instance['title'] = $new_instance['title'];
			$instance['address_label_name'] = $new_instance['address_label_name'];
			$instance['address'] = $new_instance['address'];
			$instance['phone_label_name'] = $new_instance['phone_label_name'];
			$instance['phone'] = $new_instance['phone'];
			$instance['mobile_label_name'] = $new_instance['mobile_label_name'];
			$instance['mobile'] = $new_instance['mobile'];
			$instance['fax_label_name'] = $new_instance['fax_label_name'];
			$instance['fax'] = $new_instance['fax'];
			$instance['email_label_name'] = $new_instance['email_label_name'];
			$instance['email'] = $new_instance['email'];
			$instance['web_label_name'] = $new_instance['web_label_name'];
			$instance['web'] = $new_instance['web'];
			$instance['cnt_textarea'] = $new_instance['cnt_textarea'];
			$instance['cnt_textarea_options'] = $new_instance['cnt_textarea_options'];
	
			return $instance;
		}
	
		public function form($instance){
			$defaults = array('title' => 'Contact Info', 'address_label_name' => '', 'address' => '', 'phone_label_name' => '', 'phone' => '', 'mobile_label_name' => '', 'mobile' => '','fax_label_name' => '', 'fax' => '', 'email_label_name' => '', 'email' => '', 'web_label_name' => '', 'web' => '', 'cnt_textarea' =>'', 'cnt_textarea_options' =>'Bottom');
			$instance = wp_parse_args((array) $instance, $defaults); ?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'writepress-core' ); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
			</p>
            <div class="contact_info_row">
            	<span><?php _e( 'Address:', 'writepress-core' ); ?></span>
            	<p>
                <textarea name="<?php echo $this->get_field_name('address_label_name'); ?>" id="<?php echo $this->get_field_id('address_label_name'); ?>" class="widefat" placeholder="Icon / Image / Text" ><?php echo $instance['address_label_name']; ?></textarea>
            	
            	<input class="widefat" type="text" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" value="<?php echo $instance['address']; ?>"  placeholder="123th Demo Street, Cuba, North America"/>
            	</p>
            </div>
			<div class="contact_info_row">
            <span><?php _e( 'Phone:', 'writepress-core' ); ?></span>
            <p>
                <textarea name="<?php echo $this->get_field_name('phone_label_name'); ?>" id="<?php echo $this->get_field_id('phone_label_name'); ?>" class="widefat" placeholder="Icon / Image / Text" ><?php echo $instance['phone_label_name']; ?></textarea>
			
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo $instance['phone']; ?>" placeholder="+ 1.555.555.555 " />
			</p>
            </div>
            <div class="contact_info_row">
            <span><?php _e( 'Mobile:', 'writepress-core' ); ?></span>
             <p>
                <textarea name="<?php echo $this->get_field_name('mobile_label_name'); ?>" id="<?php echo $this->get_field_id('mobile_label_name'); ?>" class="widefat" placeholder="Icon / Image / Text" ><?php echo $instance['mobile_label_name']; ?></textarea>
			
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('mobile'); ?>" name="<?php echo $this->get_field_name('mobile'); ?>" value="<?php echo $instance['mobile']; ?>" placeholder="+ 1.555.555.555"  />
			</p>
            </div>
            <div class="contact_info_row">
            <span><?php _e( 'Fax:', 'writepress-core' ); ?></span>
             <p>
                <textarea name="<?php echo $this->get_field_name('fax_label_name'); ?>" id="<?php echo $this->get_field_id('fax_label_name'); ?>" class="widefat" placeholder="Icon / Image / Text" ><?php echo $instance['fax_label_name']; ?></textarea>
                
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>" value="<?php echo $instance['fax']; ?>" placeholder="+ 1.555.555.555" />
			</p>
            </div>
            <div class="contact_info_row">
            <span><?php _e( 'Email:', 'writepress-core' ); ?></span>
            <p>
				<textarea name="<?php echo $this->get_field_name('email_label_name'); ?>" id="<?php echo $this->get_field_id('email_label_name'); ?>" class="widefat" placeholder="Icon / Image / Text" ><?php echo $instance['email_label_name']; ?></textarea>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo $instance['email']; ?>" placeholder="info@yourdomain.com" />
			</p>
            </div>
            <div class="contact_info_row">
            <span><?php _e( 'Web:', 'writepress-core' ); ?></span>
             <p>
             	<textarea name="<?php echo $this->get_field_name('web_label_name'); ?>" id="<?php echo $this->get_field_id('web_label_name'); ?>" class="widefat" placeholder="Icon / Image / Text" ><?php echo $instance['web_label_name']; ?></textarea>
			
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('web'); ?>" name="<?php echo $this->get_field_name('web'); ?>" value="<?php echo $instance['web']; ?>" placeholder="http://writepresstheme.com/" />
			
			</p>
            </div>
            <div class="contact_info_row">
            <span><?php _e( 'Textarea:', 'writepress-core' ); ?></span>
			<p>
				<textarea name="<?php echo $this->get_field_name('cnt_textarea'); ?>" id="<?php echo $this->get_field_id('cnt_textarea'); ?>" cols="20" rows="10" class="widefat" placeholder="Enter your descriptions"><?php echo $instance['cnt_textarea']; ?></textarea>
				
			</p>
            </div>
            <div class="contact_info_row">
            <span><?php _e( 'Textarea Position:', 'writepress-core' ); ?></span>
            <p>
				<select id="<?php echo $this->get_field_id('cnt_textarea_options'); ?>" name="<?php echo $this->get_field_name('cnt_textarea_options'); ?>" class="widefat" style="width:100%;">
					<option <?php if ('Bottom' == $instance['cnt_textarea_options']) echo 'selected="selected"'; ?>>Bottom</option>
					<option <?php if ('Top' == $instance['cnt_textarea_options']) echo 'selected="selected"'; ?>>Top</option>
				</select>
			</p>
            </div>
		<?php
		}
}
}
?>