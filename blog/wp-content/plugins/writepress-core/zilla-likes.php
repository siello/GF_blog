<?php
class ZillaLikes {

    function __construct() 
    {	
        add_action('publish_post', array(&$this, 'setup_likes'));
        add_action('wp_ajax_zilla-likes', array(&$this, 'ajax_callback'));
		add_action('wp_ajax_nopriv_zilla-likes', array(&$this, 'ajax_callback'));
	}

	function setup_likes( $post_id ) 
	{
		if(!is_numeric($post_id)) return;
	
		add_post_meta($post_id, '_zolo_zilla_likes', '0', true);
	}
	
	function ajax_callback($post_id) 
	{

		$options = get_option( 'zolo_zilla_likes_settings' );
		if( !isset($options['add_to_posts']) ) $options['add_to_posts'] = '0';
		//if( !isset($options['add_to_pages']) ) $options['add_to_pages'] = '0';
		if( !isset($options['add_to_other']) ) $options['add_to_other'] = '0';
		if( !isset($options['zero_postfix']) ) $options['zero_postfix'] = '';
		if( !isset($options['one_postfix']) ) $options['one_postfix'] = '';
		if( !isset($options['more_postfix']) ) $options['more_postfix'] = '';

		if( isset($_POST['likes_id']) ) {
		    // Click event. Get and Update Count
			$post_id = str_replace('zilla-likes-', '', $_POST['likes_id']);
			echo $this->like_this($post_id, $options['zero_postfix'], $options['one_postfix'], $options['more_postfix'], 'update');
		} else {
		    // AJAXing data in. Get Count
			$post_id = str_replace('zilla-likes-', '', $_POST['post_id']);
			echo $this->like_this($post_id, $options['zero_postfix'], $options['one_postfix'], $options['more_postfix'], 'get');
		}
		
		exit;
	}
	
	function like_this($post_id, $zero_postfix = false, $one_postfix = false, $more_postfix = false, $action = 'get') 
	{
		if(!is_numeric($post_id)) return;
		$zero_postfix = strip_tags($zero_postfix);
		$one_postfix = strip_tags($one_postfix);
		$more_postfix = strip_tags($more_postfix);		
		
		switch($action) {
		
			case 'get':
				$likes = get_post_meta($post_id, '_zolo_zilla_likes', true);
				if( !$likes ){
					$likes = 0;
					add_post_meta($post_id, '_zolo_zilla_likes', $likes, true);
				}
				
				if( $likes == 0 ) { $postfix = $zero_postfix; }
				elseif( $likes == 1 ) { $postfix = $one_postfix; }
				else { $postfix = $more_postfix; }
				
				return '<i class="fa fa-heart-o"></i> <span class="zilla-likes-count">'. $likes .'</span> <span class="zilla-likes-postfix">'. $postfix .'</span>';
				break;
				
			case 'update':
				$likes = get_post_meta($post_id, '_zolo_zilla_likes', true);
				if( isset($_COOKIE['zolo_zilla_likes_'. $post_id]) ) return $likes;
				
				$likes++;
				update_post_meta($post_id, '_zolo_zilla_likes', $likes);
				setcookie('zolo_zilla_likes_'. $post_id, $post_id, time()*20, '/');
				
				if( $likes == 0 ) { $postfix = $zero_postfix; }
				elseif( $likes == 1 ) { $postfix = $one_postfix; }
				else { $postfix = $more_postfix; }
				
				return '<i class="fa fa-heart-o"></i> <span class="zilla-likes-count">'. $likes .'</span> <span class="zilla-likes-postfix">'. $postfix .'</span>';
				break;
		
		}
	}
	
	function do_likes()
	{
		global $post;

        $options = get_option( 'zolo_zilla_likes_settings' );
		if( !isset($options['zero_postfix']) ) $options['zero_postfix'] = '';
		if( !isset($options['one_postfix']) ) $options['one_postfix'] = '';
		if( !isset($options['more_postfix']) ) $options['more_postfix'] = '';
		
		$output = $this->like_this($post->ID, $options['zero_postfix'], $options['one_postfix'], $options['more_postfix']);
  
  		$class = 'zilla-likes';
  		$title = __('Like this', 'writepress-core');
		if( isset($_COOKIE['zolo_zilla_likes_'. $post->ID]) ){
			$class = 'zilla-likes active';
			$title = __('You already like this', 'writepress-core');
		}
		
		return '<a href="#" class="'. $class .'" id="zilla-likes-'. $post->ID .'" title="'. $title .'">'. $output .'</a>';
	}
	
}
global $zolo_zilla_likes;
$zolo_zilla_likes = new ZillaLikes();

/**
 * Template Tag
 */
function zolo_zilla_likes()
{
	global $zolo_zilla_likes;
    echo $zolo_zilla_likes->do_likes(); 
}
