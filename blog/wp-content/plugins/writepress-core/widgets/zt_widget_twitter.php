<?php
/**
 * Twitter Widget
*/
if( ! class_exists( 'zolo_twitter_widget' ) ) {
	
	add_action('widgets_init', 'twitter_load_widgets');
	
	function twitter_load_widgets()
	{
		register_widget('zolo_twitter_widget');
	}
	
	class zolo_twitter_widget extends WP_Widget {
	
		public function __construct() {
			$widget_ops = array('classname' => 'zt_widget_wrap zt_twitter_widget', 'description' => __( 'Adds support for your tweets.', 'writepress-core' ));
			$control_ops = array('id_base' => 'zt_twitter_widget');
			parent::__construct('zt_twitter_widget', 'Writepress: Twitter', $widget_ops, $control_ops);
			
			add_action( 'wp_footer', array($this,'zt_twitter_js'));
		}
		
		public function zt_twitter_js() {
			wp_enqueue_script('zt-twitter-js', WRITEPRESS_EXTENSIONS_PLUGIN_URL. '/widgets/js/twitter.js', array('jquery'));
		}
		
		
		public function widget($args, $instance)
		{			
			extract($args);
			$title 					= apply_filters('widget_title', $instance['title']);
			$class_wrap 			= isset( $instance['class_wrap'] ) ? $instance['class_wrap'] : '';
			$style 					= $instance['style'];
			$twitter_id 			= $instance['twitter_id'];
			$twitter_width 			= $instance['twitter_width'];
			$twitter_height 		= $instance['twitter_height'];
			$color_scheme 			= $instance['color_scheme'];
			$consumer_key 			= $instance['consumer_key'];
			$consumer_secret 		= $instance['consumer_secret'];
			$access_token 			= $instance['access_token'];
			$access_token_secret 	= $instance['access_token_secret'];
			$twitter_username 		= $instance['twitter_username'];
			$count 					= (int) $instance['count'];
			$widget_id 				= $args['widget_id'];
			
			// Class wrap
			if ( '' != $class_wrap ) {
			$class_widget = $class_wrap;
			}else{
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
			<h3 class="widget-title">
				<span><?php echo esc_attr( $title ); ?></span>
			</h3>
			<?php }
			
			if ('expand' == $style && $twitter_id) { ?>
			
			<a class="twitter-timeline" <?php if ('dark' == $color_scheme) { ?>data-theme="dark"<?php } ?> width="<?php echo esc_attr($twitter_width); ?>" height="<?php echo esc_attr($twitter_height); ?>" href="https://twitter.com/twitter" data-widget-id="<?php echo esc_attr($twitter_id); ?>">Tweets by @twitter</a>
			
			<?php } else if ('simple' == $style && $twitter_username && $consumer_key && $consumer_secret && $access_token && $access_token_secret && $count) {
			
			$transName = 'list_tweets_'.$widget_id;
			$cacheTime = 10;
			if(false === ($twitterData = get_transient($transName))) {
			
				$token = get_option('cfTwitterToken_'.$widget_id);
			
				// get a new token anyways
				delete_option('cfTwitterToken_'.$widget_id);
			
				// getting new auth bearer only if we don't have one
				if(!$token) {
					// preparing credentials
					$credentials = $consumer_key . ':' . $consumer_secret;
					$toSend = base64_encode($credentials);
			
					// http post arguments
					$args = array(
						'method' 		=> 'POST',
						'httpversion' 	=> '1.1',
						'blocking' 		=> true,
						'headers' 		=> array(
							'Authorization' => 'Basic ' . $toSend,
							'Content-Type' 	=> 'application/x-www-form-urlencoded;charset=UTF-8'
						),
						'body' => array( 'grant_type' => 'client_credentials' )
					);
			
					add_filter('https_ssl_verify', '__return_false');
					$response = wp_remote_post('https://api.twitter.com/oauth2/token', $args);
			
					$keys = json_decode(wp_remote_retrieve_body($response));
			
					if($keys) {
						// saving token to wp_options table
						update_option('cfTwitterToken_'.$widget_id, $keys->access_token);
						$token = $keys->access_token;
					}
				}
				// we have bearer token wether we obtained it from API or from options
				$args = array(
					'httpversion' 	=> '1.1',
					'blocking' 		=> true,
					'headers' 		=> array(
						'Authorization' => "Bearer $token"
					)
				);
			
				add_filter('https_ssl_verify', '__return_false');
				$api_url = "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=$twitter_username&count=$count";
				$response = wp_remote_get($api_url, $args);
			
				set_transient($transName, wp_remote_retrieve_body($response), 60 * $cacheTime);
			}
			@$twitter = json_decode(get_transient($transName), true);
			if($twitter && is_array($twitter)) { ?>
				<div class="twitter-box">
					<div class="twitter-holder">
						<div class="b">
							<div class="tweets-container" id="tweets_<?php echo esc_attr( $widget_id ); ?>">
								<ul class="zt-ul" id="zt_jtwt">
									<?php foreach($twitter as $tweet): ?>
									<li class="zt_jtwt_tweet">
										<p class="jtwt_tweet_text">
											<?php $latest_tweet = $this->tweet_get_html( $tweet ); ?>
											<?php if ( ! $latest_tweet ) : ?>
												<?php continue; ?>
											<?php endif; ?>
											<?php echo $latest_tweet; ?>
										</p>
										<?php
										$twitterTime = strtotime($tweet['created_at']);
										$timeAgo = $this->ago($twitterTime);
										?>
										<a href="http://twitter.com/<?php echo esc_attr( $tweet['user']['screen_name'] ); ?>/statuses/<?php echo esc_attr( $tweet['id_str'] ); ?>" class="zt_jtwt_date"><?php echo esc_attr( $timeAgo ); ?></a>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
					</div>
					<span class="arrow"></span>
				</div>
			
			<?php }
			}
			
			echo $after_widget;
			
		}
		/**
	 * Converts the tweet text into a HTML formatted string, incl. links for URLs, Hashtags and users.
	 *
	 * @param string $tweet      The tweet text
	 * @param boolean $links     Flag if link tags for URLs should be added.
	 * @param boolean $users     Flag if link tags for users should be added.
	 * @param boolean $hashtags  Flag if link tags for hashtags should be added.
	 * @param boolean $media     Flag if link tags for media should be added.
	 *
	 * @return string|false      The HTML formatted tweet text.
	 */
	function tweet_get_html( $tweet, $links = true, $users = true, $hashtags = true, $media = true ) {

		if ( array_key_exists( 'retweeted_status', $tweet ) ) {
			$tweet = $tweet['retweeted_status'];
		}

		if ( ! isset( $tweet['text'] ) ) {
			return false;
		}

		$return = $tweet['text'];

		$entities = array();
		$temp = array();

		if ( $links && is_array( $tweet['entities']['urls'] ) ) {

			foreach ( $tweet['entities']['urls'] as $e ) {
				$temp['start']       = $e['indices'][0];
				$temp['end']         = $e['indices'][1];
				$temp['replacement'] = '<a href="' . $e['expanded_url'] . '" target="_blank">' . $e['display_url'] . '</a>';
				$entities[]          = $temp;
			}
		}

		if ( $users && is_array( $tweet['entities']['user_mentions'] ) ) {

			foreach ( $tweet['entities']['user_mentions'] as $e ) {
				$temp['start']       = $e['indices'][0];
				$temp['end']         = $e['indices'][1];
				$temp['replacement'] = '<a href="https://twitter.com/' . $e['screen_name'] . '" target="_blank">@' . $e['screen_name'] . '</a>';
				$entities[]          = $temp;
			}
		}

		if ( $hashtags && is_array( $tweet['entities']['hashtags'] ) ) {

			foreach ( $tweet['entities']['hashtags'] as $e ) {
				$temp['start']       = $e['indices'][0];
				$temp['end']         = $e['indices'][1];
				$temp['replacement'] = '<a href="https://twitter.com/hashtag/' . $e['text'] . '?src=hash" target="_blank">#' . $e['text'] . '</a>';
				$entities[]          = $temp;
			}
		}

		if ( $media && array_key_exists( 'media', $tweet['entities'] ) ) {

			foreach (  $tweet['entities']['media'] as $e ) {
				$temp['start']       = $e['indices'][0];
				$temp['end']         = $e['indices'][1];
				$temp['replacement'] = '<a href="' . $e['url'] . '" target="_blank">' . $e['display_url'] . '</a>';
				$entities[]          = $temp;
			}
		}

		usort( $entities, array( $this, 'sort_tweets' ) );

		foreach ( $entities as $item ) {
			$return = $this->mb_substr_replace( $return, $item['replacement'], $item['start'], $item['end'] - $item['start'] );
		}

		return $return;
	}

	/*
	 * The PHP substr_replace equivalent for multibyte encoded strings.
	 *
	 * @param string $string         The string in which replacement should take place
	 * @param string $replacement    The replacement string
	 * @param int     $start         The index where the replacement should start
	 * @param int     $length        The length of $string that should be replaced
	 *
	 * @return array|string          The correctly replaced string. When the result is an array, it runs recursively.
	 */
	function mb_substr_replace( $string, $replacement, $start, $length = null ) {
		if ( is_array( $string ) ) {
			$num = count( $string );
			// $replacement
			$replacement = is_array( $replacement ) ? array_slice( $replacement, 0, $num ) : array_pad( array( $replacement ), $num, $replacement );

			// $start
			if ( is_array( $start ) ) {
				$start = array_slice( $start, 0, $num );
				foreach ( $start as $key => $value ) {
					$start[ $key ] = is_int( $value ) ? $value : 0;
				}
			} else {
				$start = array_pad( array( $start ), $num, $start );
			}

			// $length
			if ( ! isset( $length ) ) {
				$length = array_fill( 0, $num, 0 );
			} elseif ( is_array( $length ) ) {
				$length = array_slice( $length, 0, $num );
				foreach ( $length as $key => $value ) {
					$length[ $key ] = isset( $value ) ? ( is_int( $value ) ? $value : $num ) : 0;
				}
			} else {
				$length = array_pad( array( $length ), $num, $length );
			}

			// Recursive call
			return array_map( __FUNCTION__, $string, $replacement, $start, $length );
		}

		preg_match_all( '/./us', (string) $string, $smatches );
		preg_match_all( '/./us', (string) $replacement, $rmatches );
		if ( null === $length ) {
			$length = mb_strlen( $string );
		}
		array_splice( $smatches[0], $start, $length, $rmatches[0] );

		return join( $smatches[0] );
	}

	/*
	* Compare the start indices of two twitter entities
	*
	* @param array $a A twiiter entity
	* @param array $b A twiiter entity
	*
	* @return int The difference of the start indices
	*/
	function sort_tweets( $a, $b ) {
		return ( $b['start'] - $a['start'] );
	}
		function ago($time) {
			$periods 	= array( __( 'second', 'writepress-core' ), __( 'minute', 'writepress-core' ), __( 'hour', 'writepress-core' ), __( 'day', 'writepress-core' ), __( 'week', 'writepress-core' ), __( 'month', 'writepress-core' ), __( 'year', 'writepress-core' ), __( 'decade', 'writepress-core' ) );
			$lengths 	= array( '60', '60', '24', '7', '4.35', '12', '10' );
			$now 		= time();
			$difference = $now - $time;
			$tense 		= __( 'ago', 'writepress-core' );
			
			for( $j = 0; $difference >= $lengths[$j] && $j < count( $lengths )-1; $j++ ) {
				$difference /= $lengths[$j];
			}
			
			$difference = round( $difference );
			
			if( $difference != 1 ) {
				$periods[$j] .= __( 's', 'writepress-core' );
			}
			
			return sprintf('%s %s %s', $difference, $periods[$j], $tense );
		}
	
		public function update($new_instance, $old_instance)
		{
			$instance 							= $old_instance;
			$instance['title'] 					= strip_tags($new_instance['title']);
			$instance['class_wrap'] 			= strip_tags($new_instance['class_wrap']);
			$instance['style'] 					= $new_instance['style'];
			$instance['twitter_id'] 			= $new_instance['twitter_id'];
			$instance['twitter_width'] 			= $new_instance['twitter_width'];
			$instance['twitter_height'] 		= $new_instance['twitter_height'];
			$instance['color_scheme'] 			= $new_instance['color_scheme'];
			$instance['consumer_key'] 			= $new_instance['consumer_key'];
			$instance['consumer_secret'] 		= $new_instance['consumer_secret'];
			$instance['access_token'] 			= $new_instance['access_token'];
			$instance['access_token_secret'] 	= $new_instance['access_token_secret'];
			$instance['twitter_username'] 		= $new_instance['twitter_username'];
			$instance['count'] 					= $new_instance['count'];
			return $instance;
		}
	
		public function form($instance)
		{
			$instance = wp_parse_args((array) $instance, array(
			'title' 				=> __('Recent Tweets','writepress-core'),
			'class_wrap' 			=> '',
			'style' 				=> __('Light','writepress-core'),
			'twitter_id' 			=> '',
			'twitter_width' 		=> '320px',
			'twitter_height' 		=> '400px',
			'color_scheme' 			=> '',
			'consumer_key'			=> '',
			'consumer_secret' 		=> '',
			'access_token' 			=> '',
			'access_token_secret' 	=> '',
			'twitter_username' 		=> '',
			'count' 				=> 3
			)); ?>
			
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'writepress-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
			</p>
			
			<p>
			<label for="<?php echo $this->get_field_id('class_wrap'); ?>"><?php _e('Class Wrap (optional):', 'writepress-core'); ?></label>			
			<input class="widefat" id="<?php echo $this->get_field_id('class_wrap'); ?>" name="<?php echo $this->get_field_name('class_wrap'); ?>" type="text" value="<?php echo $instance['class_wrap']; ?>" />
			</p>
			
			<p>
			<label for="<?php echo $this->get_field_id('style'); ?>"><?php _e( 'Style:', 'writepress-core' ); ?></label>
			<select class='zt-select widefat' name="<?php echo $this->get_field_name('style'); ?>" id="zt-twitter-style-select">
				<option value="expand" <?php if($instance['style'] == 'expand') { ?>selected="selected"<?php } ?>><?php _e( 'Expand', 'writepress-core' ); ?></option>
				<option value="simple" <?php if($instance['style'] == 'simple') { ?>selected="selected"<?php } ?>><?php _e( 'Simple', 'writepress-core' ); ?></option>
			</select>
			</p>
			
			<div style="display: inline-block;">
			<h3 style="margin: 15px 0 0 0;clear: both;"><?php _e( 'Expand Style','writepress-core' ); ?></h3> 
			<p class="zt-left">
				<label for="<?php echo $this->get_field_id('twitter_id'); ?>"><?php _e('Twitter ID:', 'writepress-core'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" value="<?php echo $instance['twitter_id']; ?>" />
			</p>
			
			<p class="zt-right">
				<label for="<?php echo $this->get_field_id('twitter_width'); ?>"><?php _e('Width:', 'writepress-core'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('twitter_width'); ?>" name="<?php echo $this->get_field_name('twitter_width'); ?>" value="<?php echo $instance['twitter_width']; ?>" />
			</p>
			
			<p class="zt-left">
				<label for="<?php echo $this->get_field_id('twitter_height'); ?>"><?php _e('Height:', 'writepress-core'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('twitter_height'); ?>" name="<?php echo $this->get_field_name('twitter_height'); ?>" value="<?php echo $instance['twitter_height']; ?>" />
			</p>
			
			<p class="zt-right">
				<label for="<?php echo $this->get_field_id('color_scheme'); ?>"><?php _e( 'Color Scheme:', 'writepress-core' ); ?></label>
				<select class='zt-select widefat' name="<?php echo $this->get_field_name('color_scheme'); ?>" id="<?php echo $this->get_field_id('color_scheme'); ?>">
					<option value="light" <?php if($instance['color_scheme'] == 'light') { ?>selected="selected"<?php } ?>><?php _e( 'Light', 'writepress-core' ); ?></option>
					<option value="dark" <?php if($instance['color_scheme'] == 'dark') { ?>selected="selected"<?php } ?>><?php _e( 'Dark', 'writepress-core' ); ?></option>
				</select>
			</p>
			</div>
			
			<div style="display: inline-block;margin-top: 20px;">
			<h3 style="margin: 15px 0 0 0;clear: both;"><?php _e( 'Simple Style','writepress-core' ); ?></h3> 
			<p class="zt-left">
				<label for="<?php echo $this->get_field_id('consumer_key'); ?>"><?php _e('Consumer Key:', 'writepress-core'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('consumer_key'); ?>" name="<?php echo $this->get_field_name('consumer_key'); ?>" value="<?php echo $instance['consumer_key']; ?>" />
			</p>
			
			<p class="zt-right">
				<label for="<?php echo $this->get_field_id('consumer_secret'); ?>"><?php _e('Consumer Secret:', 'writepress-core'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('consumer_secret'); ?>" name="<?php echo $this->get_field_name('consumer_secret'); ?>" value="<?php echo $instance['consumer_secret']; ?>" />
			</p>
			
			<p class="zt-left">
				<label for="<?php echo $this->get_field_id('access_token'); ?>"><?php _e('Access Token:', 'writepress-core'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('access_token'); ?>" name="<?php echo $this->get_field_name('access_token'); ?>" value="<?php echo $instance['access_token']; ?>" />
			</p>
			
			<p class="zt-right">
				<label for="<?php echo $this->get_field_id('access_token_secret'); ?>"><?php _e('Access Token Secret:', 'writepress-core'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('access_token_secret'); ?>" name="<?php echo $this->get_field_name('access_token_secret'); ?>" value="<?php echo $instance['access_token_secret']; ?>" />
			</p>
			
			<p class="zt-left">
				<label for="<?php echo $this->get_field_id('twitter_username'); ?>"><?php _e('Twitter Username:', 'writepress-core'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('twitter_username'); ?>" name="<?php echo $this->get_field_name('twitter_username'); ?>" value="<?php echo $instance['twitter_username']; ?>" />
			</p>
			
			<p class="zt-right">
				<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Number of Tweets:', 'writepress-core'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo $instance['count']; ?>" />
			</p>
			</div>
			
			<?php
		}
	}
}
?>