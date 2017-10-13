<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
if( ! class_exists( 'ZOLO_Recent_Posts_By_Cat_Widget' ) ) {
	add_action('widgets_init', 'zolo_recent_posts_by_cat_load_widgets');

	function zolo_recent_posts_by_cat_load_widgets()
	{
		register_widget('ZOLO_Recent_Posts_By_Cat_Widget');
	}

	class ZOLO_Recent_Posts_By_Cat_Widget extends WP_Widget {

		public function __construct() {
			
			$widget_ops = array('classname' => 'widget_cat_recent_posts widget_recent_entries', 'description' => 'Display recent blog posts from a specific category.');
			$control_ops = array('id_base' => 'recent_posts_by_cat-widget');
			parent::__construct('recent_posts_by_cat-widget', 'Writepress: Recent Posts', $widget_ops, $control_ops);
		}

		public function widget($args, $instance){

		extract( $args );

		echo $before_widget;

		$title     = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$category  = $instance['category'];
		$number    = $instance['number'];
		$show_date = ( $instance['show_date'] === 1 ) ? true : false;
		$show_featured_image = ( $instance['show_featured_image'] === 1 ) ? true : false;

		if ( !empty( $title ) ) echo $before_title . $title . $after_title;
		if($category == -1){
		$cat_recent_posts = new WP_Query( array( 
			'posts_per_page' => $number,
			'ignore_sticky_posts' => 1,

		) );
		}else{			
			$cat_recent_posts = new WP_Query( array( 
				'posts_per_page' => $number,
				'cat'            => $category,
				'ignore_sticky_posts' => 1,
			
			) );
			
			
			}
		if ( $cat_recent_posts->have_posts() ) {

			echo '<ul>';

			while ( $cat_recent_posts->have_posts() ) {
				$cat_recent_posts->the_post();
				echo '<li><span class="post_list_item">';
				if ( $show_featured_image ){
				echo '<span class="post_list_thumb"><a href="' . get_permalink() . '">';
				if(has_post_thumbnail()){
					the_post_thumbnail('thumbnail'); 
				}
				echo '</a></span>';
				}
				echo '<span class="post_list_content">';
				echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
				if ( $show_date ){ echo '<span class="post-date">' . get_the_time( get_option( 'date_format' ) ) . '</span>';}
				echo '</span></span></li>';

			}

			echo '</ul>';

		} else {

			_e( 'No posts yet.', 'recent-posts-by-category-widget' );

		}

		wp_reset_postdata();

		echo $after_widget;

	}

		// Save widget settings
		
		public function update( $new_instance, $old_instance ){
		
			$instance              = $old_instance;
			$instance['title']     = wp_strip_all_tags( $new_instance['title'] );
			$instance['category']  = wp_strip_all_tags( $new_instance['category'] );
			$instance['number']    = is_numeric( $new_instance['number'] ) ? intval( $new_instance['number'] ) : 5;
			$instance['show_date'] = isset( $new_instance['show_date'] ) ? 1 : 0;
			$instance['show_featured_image'] = isset( $new_instance['show_featured_image'] ) ? 1 : 0;
		
			return $instance;
		
		}

		public function form($instance){
	
		$defaults  = array( 'title' => '', 'category' => '', 'number' => 5, 'show_date' => '', 'show_featured_image' => '' );
		$instance  = wp_parse_args( ( array ) $instance, $defaults );
		$title     = $instance['title'];
		$category  = $instance['category'];
		$number    = $instance['number'];
		$show_date = $instance['show_date'];
		$show_featured_image = $instance['show_featured_image'];
		
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'writepress-core'  ); ?>:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<label for="zolo_widget_cat_recent_posts_category"><?php _e( 'Category' ); ?>:</label>				
			
			<?php

			wp_dropdown_categories( array(
				'show_option_none' => __( 'Select Category' ),
				'orderby'    => 'title',
				'hide_empty' => false,
				'name'       => $this->get_field_name( 'category' ),
				'id'         => 'zolo_widget_cat_recent_posts_category',
				'class'      => 'widefat',
				'selected'   => $category

			) );

			?>

		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e( 'Number of posts to show' ); ?>: </label>
			<input type="text" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo esc_attr( $number ); ?>" size="3" />
		</p>

		<p>
			<input type="checkbox" id="<?php echo $this->get_field_id('show_date'); ?>" class="checkbox" name="<?php echo $this->get_field_name( 'show_date' ); ?>" <?php checked( $show_date, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e( 'Display Post date?', 'writepress-core'  ); ?></label>
		</p>
        <p>
			<input type="checkbox" id="<?php echo $this->get_field_id('show_featured_image'); ?>" class="checkbox" name="<?php echo $this->get_field_name( 'show_featured_image' ); ?>" <?php checked( $show_featured_image, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('show_featured_image'); ?>"><?php _e( 'Display Featured Image?', 'writepress-core'  ); ?></label>
		</p>
		
		<?php
	
	}
	}
}
?>