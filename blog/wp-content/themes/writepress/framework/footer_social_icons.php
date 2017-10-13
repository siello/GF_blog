<?php 
global $writepress_data;  

$footer_social_links_boxed = isset($writepress_data['footer_social_links_boxed']) ? $writepress_data['footer_social_links_boxed'] : 'No';
$boxed_icons = ($footer_social_links_boxed == 'Yes') ? 'boxed-icons' : '';
	
echo '<div class="zolo-social '.$boxed_icons.'">';
?>
    <ul class="social-icon">
        <?php if(isset($writepress_data['facebook_link']) && $writepress_data['facebook_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['facebook_link']); ?>" ><i class="fa fa-facebook"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['flickr_link']) && $writepress_data['flickr_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['flickr_link']); ?>" ><i class="fa fa-flickr"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['rss_link']) && $writepress_data['rss_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['rss_link']); ?>" ><i class="fa fa-rss"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['twitter_link']) && $writepress_data['twitter_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['twitter_link']); ?>" ><i class="fa fa-twitter"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['vimeo_link']) && $writepress_data['vimeo_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['vimeo_link']); ?>"><i class="fa fa-vimeo-square"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['youtube_link']) && $writepress_data['youtube_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['youtube_link']); ?>"><i class="fa fa-youtube"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['instagram_link']) && $writepress_data['instagram_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['instagram_link']); ?>"><i class="fa fa-instagram"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['pinterest_link']) && $writepress_data['pinterest_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['pinterest_link']); ?>"><i class="fa fa-pinterest"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['tumblr_link']) && $writepress_data['tumblr_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['tumblr_link']); ?>"><i class="fa fa-tumblr"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['google_link']) && $writepress_data['google_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['google_link']); ?>"><i class="fa fa-google-plus"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['dribbble_link']) && $writepress_data['dribbble_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['dribbble_link']); ?>"><i class="fa fa-dribbble"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['digg_link']) && $writepress_data['digg_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['digg_link']); ?>"><i class="fa fa-digg"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['linkedin_link']) && $writepress_data['linkedin_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['linkedin_link']); ?>"><i class="fa fa-linkedin"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['skype_link']) && $writepress_data['skype_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['skype_link']); ?>"><i class="fa fa-skype"></i></a></li>
        <?php endif; ?>        
        
		<?php if(isset($writepress_data['deviantart_link']) && $writepress_data['deviantart_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['deviantart_link']); ?>"><i class="fa fa-deviantart"></i></a></li>
        <?php endif; ?>
                
        <?php if(isset($writepress_data['yahoo_link']) && $writepress_data['yahoo_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['yahoo_link']); ?>"><i class="fa fa-yahoo"></i></a></li>
        <?php endif; ?>  
        
        <?php if(isset($writepress_data['reddit_link']) && $writepress_data['reddit_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['reddit_link']); ?>" ><i class="fa fa-reddit"></i></a></li>
        <?php endif; ?>

        <?php if(isset($writepress_data['dropbox_link']) && $writepress_data['dropbox_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['dropbox_link']); ?>" ><i class="fa fa-dropbox"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['soundcloud_link']) && $writepress_data['soundcloud_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['soundcloud_link']); ?>" ><i class="fa fa-soundcloud"></i></a></li>
        <?php endif; ?>
                
        <?php if(isset($writepress_data['vk_link']) && $writepress_data['vk_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="<?php echo esc_url($writepress_data['vk_link']); ?>" ><i class="fa fa-vk"></i></a></li>
        <?php endif; ?>
        
        <?php if(isset($writepress_data['email_link']) && $writepress_data['email_link']): ?>
        <li class="social_icon_list"><a target="_blank" href="mailto:<?php echo esc_attr($writepress_data['email_link']); ?>" ><i class="fa fa-envelope-o"></i></a></li>
        <?php endif; ?>
        
      </ul>

<?php 
	echo '</div>';

?>