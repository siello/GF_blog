<?php

#Load blog posts

add_action('wp_ajax_get_blog_posts', 'get_blog_posts');

add_action('wp_ajax_nopriv_get_blog_posts', 'get_blog_posts');

if (!function_exists('get_blog_posts')) {

    function get_blog_posts()

    {

        $html_template = $_POST['html_template'];
		$style = $_POST['style'];
        $now_open_works = $_POST['now_open_works'];
        $works_per_load = $_POST['works_per_load'];
        $first_load = $_POST['first_load'];
		$layout_class = $_POST['layout_class'];
		$layoutstyle_class = $_POST['layoutstyle_class'];
		$blogstyle_thumb = $_POST['blogstyle_thumb'];
		
		$blgcrslcolprw = $_POST['blgcrslcolprw'];
		$blgcrslcolprw15 = $_POST['blgcrslcolprw15'];
		$blgcrslcolbg = $_POST['blgcrslcolbg'];
		$blgcrslcolbordep = $_POST['blgcrslcolbordep'];
		$blgcrslcolradi = $_POST['blgcrslcolradi'];
		$blgcrslcolpad = $_POST['blgcrslcolpad'];
		$blgcrsltitlesize = $_POST['blgcrsltitlesize'];
		$blgcrsltitlecolor = $_POST['blgcrsltitlecolor'];
		$blgstylemetacolor = $_POST['blgstylemetacolor'];
		$blgstylehovercolor = $_POST['blgstylehovercolor'];
		$blgcrslzoomicon = $_POST['blgcrslzoomicon'];
		$blgcrsllinkicon = $_POST['blgcrsllinkicon'];
		$blgshowfilter = $_POST['blgshowfilter'];
		$posttitleposition = $_POST['posttitleposition'];
		$posttitlealignment = $_POST['posttitlealignment'];
		$posttitleseparatorshowhide = $_POST['posttitleseparatorshowhide'];
		$titleseparatorimg = $_POST['titleseparatorimg'];
		$categoryposition = $_POST['categoryposition'];
		$categorydesign = $_POST['categorydesign'];
		$categorydesignimg = $_POST['categorydesignimg'];
		$continuereadingshowhide = $_POST['continuereadingshowhide'];
		$continuereadingmodify = $_POST['continuereadingmodify'];
		$socialsharingshowhide = $_POST['socialsharingshowhide'];
		$postdesign = $_POST['postdesign'];
		$postseparatorshowhide = $_POST['postseparatorshowhide'];
		$postseparatorimage = $_POST['postseparatorimage'];
		$titletoppadding = $_POST['titletoppadding'];
		$titlebottompadding = $_POST['titlebottompadding'];
		$postmetashowhide = $_POST['postmetashowhide'];
		$postcontentcolor = $_POST['postcontentcolor'];
		$excerptlength = $_POST['excerptlength'];
		$postdesign2 = $_POST['postdesign2'];
		$postmetashowhide2 = $_POST['postmetashowhide2'];
		$category_topmargin = $_POST['category_topmargin'];
		$fullheightpost = $_POST['fullheightpost'];
		$postcaptionwidth = $_POST['postcaptionwidth'];
		$postcaptionimg = $_POST['postcaptionimg'];
		
		$category = ($_POST['category']!=="all" ? $_POST['category'] : '');

if( $now_open_works == 0 ){

	if ( get_query_var('paged') ) {
			$paged = get_query_var('paged'); 
		}elseif ( get_query_var('page') ) {
				$paged = get_query_var('page'); 
			}else{ 
				$paged = 1;
			}
		if ($category!=="all" && $category!=="") {
			query_posts('category_name='.$category.'&posts_per_page=1');
		}else{
			query_posts('posts_per_page=1');			 
		}	
	
	global $more,$post;
	$more = 0;


}else {

	$last_post = $now_open_works-1;
	
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page'); 
			} else { 
				$paged = 1; 
				}
	if ($category!=="all" && $category!=="") {
		query_posts('offset='.$last_post.'&category_name='.$category.'&posts_per_page=1');
	}else{
		query_posts('offset='.$last_post.'&posts_per_page=1');	
	}	
	
	global $more,$post;
	$more = 0;

}
?>
<?php	

global $post;
$blgcrslcolpad = explode(",",$blgcrslcolpad);
$blgcrslcolpad4 = explode(",",$blgcrslcolpad4);
$wp_query = null;
$wp_query = new WP_Query();
$args = array(
	'post_type' => 'post',
	'order' => 'DESC',
	'offset' => $now_open_works,
	'posts_per_page' => $works_per_load,
	'post_status' => 'publish',
);
if ($category !== '' && $category !== "all") {
	$args['category_name']= $category;
}	   
$wp_query->query($args);

$i = 1;
while ($wp_query->have_posts()) : $wp_query->the_post();
 
if($blgshowfilter == 1){
	$terms = get_the_terms( @$post->ID, 'category' );  

if ( $terms && ! is_wp_error( $terms ) ) :   
	$links = array();  

	foreach ( $terms as $term )   
	{  
		$links[] = $term->name;  
	}  
	$links = str_replace(' ', '-', $links);   
	$tax = join( " ", $links );       
else :    
	$tax = '';    
endif; 
}
            
if($blgshowfilter == 1){$filterclasselector = strtolower($tax);}else{$filterclasselector='';}
	
if( $i % 4 == 0 )
	$class = 'last';
else
	$class = ''; 
?>
<?php 
// Custom Image Size
if($style == 'style_large' || $style == 'style12' || $style == 'style13'){
	$blog_thumb2 = 'writepress_thumb_blog_large';
	$default_image = '<img src="'.get_template_directory_uri().'/assets/images/post_thumb/blog_large.jpg" alt="writepress">';		
}elseif($style == 'style_medium' || $style == 'style_small' || $style == 'style15'){
	$blog_thumb2 = 'writepress_thumb_blog_medium';
	$default_image = '<img src="'.get_template_directory_uri().'/assets/images/post_thumb/blog_medium.jpg" alt="writepress">';
}else{
	$blog_thumb2 = '';
	$default_image ='';
}

if($style == 'style1' || $style == 'style2' || $style == 'style3' || $style == 'style4'){?>

<!--Blog Box Area Start-->

<div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class;?> <?php echo $animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]; ?>px <?php echo $blgcrslcolpad[1]; ?>px <?php echo $blgcrslcolpad[2]; ?>px <?php echo $blgcrslcolpad[3]; ?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">
<div class="zolo_blog_box" style="background:<?php echo $blgcrslcolbg;?>; border-color:<?php echo $blgcrslcolbordep;?>; border-radius:<?php echo $blgcrslcolradi; ?>px;">
  <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $blogstyle_thumb ); ?>
  <?php    
if ( $thumb ){
$thumb_url = $thumb['0'];
}
else {
$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
} ?>
  
  <!--Thumb Area Start-->
  
  <div class="zolo_blog_thumb">
	<?php //zolo_zilla_likes
	if( function_exists('zolo_zilla_likes') ){ 
		echo '<span class="zolo_zilla_likes_box"> ';
	zolo_zilla_likes();
		echo '</span>';
	}?>
	<?php if($style != 'style1'){ ?>
	<a href="<?php the_permalink(); ?>">
	<?php } ?>
	<img src="<?php echo esc_url($thumb_url); ?>" alt="writepress"/> <span class="overlay"></span> 
	<!--Style 1 Icons Area Start-->
	<?php if($style == 'style1'){ ?>
	<span class="zolo_blog_icons"> 
	<?php if($blgcrslzoomicon){ ?>
	<a href="<?php echo $thumb_url;?>" class="fancybox"><span class="zolo_blog_icon blog_zoom_icon"> <i class="<?php echo $blgcrslzoomicon;?>"></i> </span></a>
	<?php }?>
	<?php if($blgcrsllinkicon){ ?>
	<a href="<?php the_permalink(); ?>"><span class="zolo_blog_icon blog_link_icon"> <i class="<?php echo $blgcrsllinkicon;?>"></i> </span></a>
	<?php }?>
	</span> 
	<?php }?>
	<!--Style 1 Icons Area End--> 
	
	<!--Style 3 Title Start-->
	<?php if($style == 'style3'){ ?>
	<h2 class="zolo_blog_title" style="color:<?php echo $blgcrsltitlecolor;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;"> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
	  <?php the_title(); ?>
	  </a> </h2>
	<?php }?>
	<!--Style 3 Title End--> 
	
	<!--Style 4 Blog Detail Area Start-->
	<?php if($style == 'style4'){ ?>
	<div class="zolo_blog_detail">
	  <h2 class="zolo_blog_title" style="color:<?php echo $blgcrsltitlecolor;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;"> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
		<?php the_title(); ?>
		</a> </h2>
	  <span class="zolo_blog_date" style="color:<?php echo $blgcrsltitlecolor;?>;">
	  <?php the_time('j F Y') ?>
	  </span> </div>
	<?php }?>
	<!--Style 4 Blog Detail Area End-->
	<?php if($style != 'style1'){ ?>
	</a>
	<?php } ?>
  </div>
  
  <!--Thumb Area End--> 
  
  <!--Style 1, 2 & 3 Blog Detail Area Start-->
  <?php if($style != 'style4'){ ?>
  <div class="zolo_blog_detail"> 
	
	<!--Style 1 & 2 Title Start-->
	<?php if($style == 'style1' || $style == 'style2'){ ?>
	<h2 class="zolo_blog_title" style="color:<?php echo $blgcrsltitlecolor;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;"> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
	  <?php the_title(); ?>
	  </a> </h2>
	<?php } ?>
	<!--Style 1 & 2 Title End--> 
	
	<!--Style 1 Meta Tag Start-->
	<?php if($style == 'style1'){ ?>
	<span class="zolo_blog_date" style="color:<?php echo $blgcrsltitlecolor;?>;">
	<?php the_time('F jS, Y') ?>
	</span>
	<?php } ?>
	<!--Style 1 Meta Tag End--> 
	
	<!--Style 2 Meta Tag Start-->
	<?php if($style == 'style2'){ ?>
	<span class="zolo_blog_date" style="color:<?php echo $blgstylemetacolor;?>;border-color:<?php echo $blgstylemetacolor;?>;"><span class="zolo_blog_day" style="border-color:<?php echo $blgstylemetacolor;?>;">
	<?php the_time('j') ?>
	</span><span class="zolo_blog_month_year"><span class="zolo_blog_month">
	<?php the_time('F') ?>
	</span><span class="zolo_blog_year">
	<?php the_time('Y') ?>
	</span></span></span>
	<?php } ?>
	<!--Style 2 Meta Tag End--> 
	<!--Style 2 Meta Tag Start-->
	<?php if($style == 'style3'){ ?>
	<span class="zolo_blog_author" style="color:<?php echo $blgstylemetacolor;?>;"><i class="fa fa-user"></i>
	<?php the_author(); ?>
	</span> <span class="zolo_blog_date" style="color:<?php echo $blgstylemetacolor;?>;"> <i class="fa fa-calendar"></i>
	<?php the_time('j M Y') ?>
	</span>
	<?php } ?>
  </div>
  <?php } ?>
  <!--Style 1 & 2 Blog Detail Area End--> 
  
</div>
</div>
<!--Blog Box Area End-->

<?php }?>
<?php 
if($style == 'style5' || $style == 'style6' || $style == 'style7'){?>

<!--Blog Box Area Start-->
<div class="zolo_blog_col zolo_blog_col2 <?php echo $class.' '.$layout_class.' '.$filterclasselector;?> <?php echo $animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0];?>px <?php echo $blgcrslcolpad[1];?>px <?php echo $blgcrslcolpad[2];?>px <?php echo $blgcrslcolpad[3];?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">
<div class="zolo_blog_box"> <span class="zolo_blog_horizontal_box">
  <div class="zolo_blog_thumb"> <a href="<?php the_permalink(); ?>">
	<?php
if ( has_post_thumbnail() ) {
the_post_thumbnail($blogstyle_thumb);
}
else {
echo '<img src="' . get_stylesheet_directory_uri(). '/assets/images/post_thumb/no_thumb.jpg" alt="writepress"/>';
} ?>
	</a>
	<?php if($style == 'style5'){?>
	<span class="zolo_blog_date" style="background:<?php echo $blgstylemetacolor;?>;">
	<?php the_time('j M') ?>
	</span>
	<?php } ?>
  </div>
  <div class="zolo_blog_detail" style="border-color:<?php if($style == 'style6'){ echo $blgcrslcolbordep; }?>;">
	<?php if($style == 'style5' || $style == 'style7'){?>
	<h2 class="zolo_blog_title" style="color:<?php echo $blgcrsltitlecolor;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;"> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
	  <?php the_title(); ?>
	  </a> </h2>
	<?php }?>
	<?php if($style == 'style7'){?>
	<span class="zolo_blog_meta" style="color:<?php echo $blgcrsltitlecolor;?>;"> <span style="color:<?php echo $blgstylemetacolor;?>;">
	<?php the_time('j M Y') ?>
	</span>&nbsp; / &nbsp;<span class="add-comment"><a href="<?php the_permalink(); ?>#hello" style="color:<?php echo $blgstylemetacolor;?>;">
	<?php comments_number( '0 Comment' ); ?>
	</a></span>&nbsp; / &nbsp;
	<?php //zolo_zilla_likes
if( function_exists('zolo_zilla_likes') ){ 
echo '<span class="zolo_zilla_likes_box1"> ';
zolo_zilla_likes();
echo '&nbsp; / &nbsp;</span>';
}?>
	<a href="<?php the_permalink(); ?>" style="color:<?php echo $blgstylemetacolor;?>;">Read More</a> </span>
	<?php }?>
	<div class="zolo_blog_description" style="color:<?php echo $blgcrsltitlecolor;?>; border-color:<?php echo $blgcrslcolbordep;?>; background:<?php if($style == 'style6'){ echo $blgcrslcolbg; }?>;">
	  <?php if($style == 'style6'){?>
	  <h2 class="zolo_blog_title" style="color:<?php echo $blgcrsltitlecolor;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;"> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
		<?php the_title(); ?>
		</a> </h2>
	  <?php }?>
	  <?php //the_excerpt() ;?>
	  <?php if($style == 'style6'){
$content = wp_trim_words( get_the_content(), 16, '' );
echo  preg_replace( '/\[[^\]]+\]/', '', $content );	
}else{
$content = wp_trim_words( get_the_content(), 20, '' );
echo  preg_replace( '/\[[^\]]+\]/', '', $content );
}?>
	</div>
	<?php if($style == 'style5' || $style == 'style6'){?>
	<span class="zolo_blog_meta" style="color:<?php echo $blgcrsltitlecolor;?>;"> <span style="color:<?php echo $blgstylemetacolor;?>;">
	<?php the_time('j M Y') ?>
	</span>&nbsp; / &nbsp;<span class="add-comment"><a href="<?php the_permalink(); ?>#hello" style="color:<?php echo $blgstylemetacolor;?>;">
	<?php comments_number( '0 Comment' ); ?>
	</a></span>&nbsp; / &nbsp;
	<?php //zolo_zilla_likes
if( function_exists('zolo_zilla_likes') ){ 
echo '<span class="zolo_zilla_likes_box1"> ';
zolo_zilla_likes();
echo '&nbsp; / &nbsp;</span>';
}?>
	<a href="<?php the_permalink(); ?>" style="color:<?php echo $blgstylemetacolor;?>;">Read More</a> </span>
	<?php }?>
  </div>
  </span> </div>
</div>
<!--Blog Box Area End-->

<?php }?>
<?php 
if($style == 'style8'){?>

<!--Blog Box Area Start-->
<div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $class.' '.$layout_class.' '.$filterclasselector;?> <?php echo $animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0];?>px <?php echo $blgcrslcolpad[1];?>px <?php echo $blgcrslcolpad[2];?>px <?php echo $blgcrslcolpad[3];?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">
<div class="zolo_blog_box" style="border-color:<?php echo $blgcrslcolbordep;?>; border-radius:<?php echo $blgcrslcolradi; ?>px;">
  <div class="zolo_blog_thumb">
	<?php //zolo_zilla_likes
if( function_exists('zolo_zilla_likes') ){ 
echo '<span class="zolo_zilla_likes_box"> ';
zolo_zilla_likes();
echo '</span>';
}?>
	<a href="<?php the_permalink(); ?>">
	<?php
if ( has_post_thumbnail() ) {
the_post_thumbnail($blogstyle_thumb);
}
else {
echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg" alt="writepress"/>';
} ?>
	</a> </div>
  <div class="zolo_blog_des_area" style="background:<?php echo $blgcrslcolbg;?>;">
	<div class="zolo_blog_detail" style="border-color:<?php echo $blgcrslcolbordep;?>;"> <a href="<?php the_permalink(); ?>">
	  <h2 class="zolo_blog_title" style="color:<?php echo $blgcrsltitlecolor;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;">
		<?php the_title(); ?>
	  </h2>
	  </a> <span class="zolo_blog_meta" style="color:<?php echo $blgcrsltitlecolor;?>;"> <span style="color:<?php echo $blgcrsltitlecolor;?>;">
	  <?php the_time('j F Y') ?>
	  </span>&nbsp; | &nbsp;<span class="add-comment"><a style="color:<?php echo $blgcrsltitlecolor;?>;" href="<?php the_permalink(); ?>#hello" >
	  <?php comments_number( '0 Comment' ); ?>
	  </a></span> </span> </div>
	<div class="zolo_blog_description" style="color:<?php echo $blgcrsltitlecolor;?>;border-color:<?php echo $blgstylehovercolor;?>;">
	  <?php //the_excerpt() ;?>
	  <?php 
$content = wp_trim_words( get_the_content(), 18, '' );
echo  preg_replace( '/\[[^\]]+\]/', '', $content );
?>
	</div>
  </div>
</div>
</div>
<!--Blog Box Area End-->

<?php }?>
<?php if($style == 'style9'){?>
<div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$animatedclass;?>" style="padding:0px 15px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">
<div <?php post_class(); ?>>
  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;">
	<div class="zolo_blog_box">
	  <?php
$img = wp_get_attachment_image_src($titleseparatorimg,'full');
$titleseparatorimg1 = $img[0];

$img = wp_get_attachment_image_src($categorydesignimg,'full');
$categorydesignimg1 = $img[0];

$format_quote = has_post_format( 'quote' );
$format_audio = has_post_format( 'audio' ); 
$post_video = get_post_meta( get_the_ID(), 'zt_video', true ); 	

if($format_quote != 1){
if($posttitleposition == 'above'){?>
	  <?php writepress_shortcodes_entry_meta($posttitlealignment,$posttitleposition, $titleseparatorimg1, $posttitleseparatorshowhide, $categoryposition, $categorydesign, $categorydesignimg1, $postmetashowhide); ?>
	  <?php }?>
	  <?php
if($format_audio != 1){?>
	  <div class="zolo_blog_thumb">
		<?php 
	//zolo_zilla_likes
	if( function_exists('zolo_zilla_likes') ){ 
		echo '<span class="zolo_zilla_likes_box"> ';
		zolo_zilla_likes();
		echo '</span>';
	}
	?>
		<?php if( writepress_number_of_featured_images() > 0 || $post_video ){?>
		<div class="post_flexslider">
		  <ul class="slides">
			<?php if($post_video){ ?>
			<li class="slide">
			  <div class="zolo_fluid_video_wrapper"> <?php echo $post_video; ?></div>
			</li>
			<?php } ?>
			<?php  
			if ( has_post_thumbnail() ) {
			$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $blogstyle_thumb); 
			?>
			<li class="slide"> <img src="<?php echo esc_url($attachment_image[0]); ?>" alt="writepress"/></li>
			<?php }?>
			<?php
					$i = 2;
					while($i <= 5): 
					$attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
					if($attachment_new_id){?>
			<?php $attachment_image = wp_get_attachment_image_src($attachment_new_id, $blogstyle_thumb); ?>
			<li class="slide"><img src="<?php echo esc_url($attachment_image[0]); ?>" alt="<?php echo get_post_meta($attachment_new_id, '_wp_attachment_image_alt', true); ?>" /> </li>
			<?php } $i++; endwhile; ?>
		  </ul>
		</div>
		<?php }else{
		  
		  
				echo '<div class="post_flexslider">';	
					echo '<ul class="slides">';				  
			  echo '<li class="slide"><img src="' . get_stylesheet_directory_uri() . '/assets/images/post_thumb/blog_medium.jpg" alt="writepress"/></li>';				  
			  
			 echo  '</ul></div>';
		  }?>
	  </div>
	  <?php }?>
	  <?php if($posttitleposition == 'below'){?>
	  <?php writepress_shortcodes_entry_meta($posttitlealignment,$posttitleposition, $titleseparatorimg1, $posttitleseparatorshowhide, $categoryposition, $categorydesign, $categorydesignimg1, $postmetashowhide); ?>
	  <?php }?>
	  <?php }?>
	  <div class="zolo_blog_description_area">
		<?php if($format_quote == 1){
	 //zolo_zilla_likes
	if( function_exists('zolo_zilla_likes') ){ 
		echo '<span class="zolo_zilla_likes_box"> ';
		zolo_zilla_likes();
		echo '</span>';
	} ?>
		<a href="<?php the_permalink(); ?>">
		<?php the_content(); ?>
		</a>
		<?php }elseif($format_audio == 1){
	 
	the_content();
 }else{?>
		<?php 
if($continuereadingshowhide == 'show'){
	$continuereadingmodifytext = '<span class="read_more_area"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
	$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext );
	echo  preg_replace( '/\[[^\]]+\]/', '', $content );
}else{
	$content = wp_trim_words( get_the_content(), $excerptlength, '' );
	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	
}
?>
		<?php }?>
		<?php if($format_quote != 1){if($socialsharingshowhide == 'show'){get_template_part('framework/social_sharing');}}?>
	  </div>
	</div>
  </div>
</div>
</div>
<?php }?>
<?php 	
   
if($style == 'style_large' || $style == 'style_medium' || $style == 'style_small'){?>
<div class="zolo_blog_col zolo_blog_col1 <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$animatedclass;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">
<div <?php post_class(); ?>>
  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;">
	<div class="zolo_blog_box">
<?php
$img = wp_get_attachment_image_src($titleseparatorimg,'full');
$titleseparatorimg1 = $img[0];

$img = wp_get_attachment_image_src($categorydesignimg,'full');
$categorydesignimg1 = $img[0];

$img = wp_get_attachment_image_src($postseparatorimage,'full');
$postseparatorimage1 = $img[0];

$format_quote = has_post_format( 'quote' );
$format_audio = has_post_format( 'audio' ); 

$post_video = get_post_meta( get_the_ID(), 'zt_video', true ); 	 
	
 if($format_quote != 1){
 if($posttitleposition == 'above'){?>
	  <?php writepress_shortcodes_entry_meta($posttitlealignment,$posttitleposition, $titleseparatorimg1, $posttitleseparatorshowhide, $categoryposition, $categorydesign, $categorydesignimg1, $postmetashowhide); ?>
	  <?php }?>
	  <?php if($format_audio != 1){?>
	  <div class="zolo_blog_thumb">
		<?php //zolo_zilla_likes
		if( function_exists('zolo_zilla_likes') ){ 
			echo '<span class="zolo_zilla_likes_box"> ';
			zolo_zilla_likes();
			echo '</span>';
		}
		?>
		<?php if( writepress_number_of_featured_images() > 0 || $post_video ){?>
		<div class="post_flexslider">
		  <ul class="slides">
			<?php if($post_video){ ?>
			<li class="slide">
			  <div class="zolo_fluid_video_wrapper"> <?php echo $post_video; ?></div>
			</li>
			<?php } ?>
			<?php  
			if ( has_post_thumbnail() ) {
			$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $blog_thumb2); 
			?>
			<li class="slide"> <img src="<?php echo esc_url($attachment_image[0]); ?>" alt="writepress"/></li>
			<?php }?>
			<?php
					$i = 2;
					while($i <= 5): 
					$attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
					if($attachment_new_id){?>
			<?php $attachment_image = wp_get_attachment_image_src($attachment_new_id, $blog_thumb2); ?>
			<li class="slide"><img src="<?php echo esc_url($attachment_image[0]); ?>" alt="<?php echo get_post_meta($attachment_new_id, '_wp_attachment_image_alt', true); ?>" /> </li>
			<?php } $i++; endwhile; ?>
		  </ul>
		</div>
		<?php }else{
					if($style == 'style_medium' || $style == 'style_small'){
						echo '<div class="post_flexslider"><ul class="slides"><li class="slide">'.$default_image.'</li></ul></div>';
					}
		  }?>
	  </div>
	  <?php }?>
	  <?php if($posttitleposition == 'below'){?>
	  <?php writepress_shortcodes_entry_meta($posttitlealignment,$posttitleposition, $titleseparatorimg1, $posttitleseparatorshowhide, $categoryposition, $categorydesign, $categorydesignimg1, $postmetashowhide); ?>
	  <?php } ?>
	  <?php }?>
	  <div class="zolo_blog_description_area">
		<?php if($format_quote == 1){
		 //zolo_zilla_likes
		if( function_exists('zolo_zilla_likes') ){ 
			echo '<span class="zolo_zilla_likes_box"> ';
			zolo_zilla_likes();
			echo '</span>';
		}?>
		<a href="<?php the_permalink(); ?>">
		<?php the_content();?>
		</a>
		<?php }elseif($format_audio == 1){
		the_content();
		}else{ ?>
		<?php 
	if($continuereadingshowhide == 'show'){
		$continuereadingmodifytext = '<span class="read_more_area"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
		$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext);
		echo  preg_replace( '/\[[^\]]+\]/', '', $content );		  
	}else{
		$content = wp_trim_words( get_the_content(), $excerptlength, '' );
		echo  preg_replace( '/\[[^\]]+\]/', '', $content );	
	}
	?>
		<?php }?>
		<?php if($format_quote != 1){if($socialsharingshowhide == 'show'){get_template_part('framework/social_sharing');}}?>
		<?php //echo wp_trim_words( get_the_content(), 18, '' ); ?>
	  </div>
	</div>
  </div>
</div>
<?php if($postseparatorshowhide == 'show'){echo '<div class="post_separator"><img src="'.esc_url($postseparatorimage1).'" alt="writepress"/></div>';} ?>
</div>
<?php }?>
<?php if($style == 'style10'){?>
<div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$postdesign2.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php echo $blgcrslcolpad[2]?>px <?php echo $blgcrslcolpad[3]?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">
<div <?php post_class(); ?>>
  <?php

$attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

$img = wp_get_attachment_image_src($titleseparatorimg,'full');
$titleseparatorimg1 = $img[0];

$img = wp_get_attachment_image_src($categorydesignimg,'full');
$categorydesignimg1 = $img[0];

$format_quote = has_post_format( 'quote' );
$format_audio = has_post_format( 'audio' ); 

$post_video = get_post_meta( get_the_ID(), 'zt_video', true );
?>
  <?php if($format_quote != 1){?>
  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;">
	<div class="zolo_blog_box">
	  <?php writepress_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
	  <h2 class="zolo_blog_title" style="font-size:<?php echo $blgcrsltitlesize; ?>px; padding-top:<?php echo $titletoppadding; ?>px; padding-bottom:<?php echo $titlebottompadding; ?>px;"> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
		<?php the_title(); ?>
		</a> </h2>
	  <?php if($posttitleseparatorshowhide == 'show'){
	 if($titleseparatorimg1){ 
		echo '<div class="post_title_separator"><img src="'.esc_url($titleseparatorimg1).'" alt="writepress"></div>'; 
	 }
	 
	 }?>
	  <div class="zolo_blog_description_area">
		<?php 
	 $content = wp_trim_words( get_the_content(), $excerptlength, '' );
		echo  preg_replace( '/\[[^\]]+\]/', '', $content );
	 ?>
	  </div>
	  <?php if( $postmetashowhide == 'show'){
writepress_shortcodes_entry_meta_for_shortcode(0, 0 , 0, 1, 1, 1, 1, $categorydesign, $posttitlealignment, $categorydesignimg1 );
}?>
	</div>
  </div>
  <?php }else{?>
  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;background:#333333 url('<?php echo $attachment_image[0]; ?>') no-repeat center center; -moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover; font-size:18px; line-height:26px;"> <a href="<?php the_permalink(); ?>">
	<div class="zolo_blog_box">
	  <div class="zolo_blog_description_area">
		<?php the_content();?>
	  </div>
	</div>
	</a> </div>
  <?php }?>
</div>
</div>
<?php } ?>
<?php  //Style 11
if($style == 'style11'){
if($postseparatorshowhide == 'show'){
	$postseparator = 'postseparator_show';
}
?>
<div class="zolo_blog_col zolo_blog_col1 <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$postdesign2.' '.$postseparator.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php if($postseparatorshowhide != 'show'){echo $blgcrslcolpad[2];}else{echo '0';}?>px <?php echo $blgcrslcolpad[3]?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">
<div <?php post_class(); ?>>
  <?php
$attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

$img = wp_get_attachment_image_src($postseparatorimage,'full');
$postseparatorimage1 = $img[0];

$img = wp_get_attachment_image_src($titleseparatorimg,'full');
$titleseparatorimg1 = $img[0];

$img = wp_get_attachment_image_src($categorydesignimg,'full');
$categorydesignimg1 = $img[0];

$format_quote = has_post_format( 'quote' );
$format_audio = has_post_format( 'audio' ); 

$post_video = get_post_meta( get_the_ID(), 'zt_video', true );
?>
  <?php if($format_quote != 1){?>
  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;">
	<div class="zolo_blog_box">
	  <h2 class="zolo_blog_title" style="font-size:<?php echo $blgcrsltitlesize; ?>px; padding-top:<?php echo $titletoppadding; ?>px; padding-bottom:<?php echo $titlebottompadding; ?>px;">
		<?php writepress_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
		<a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
		<?php the_title(); ?>
		</a> </h2>
	  <?php if($posttitleseparatorshowhide == 'show'){
	 if($titleseparatorimg1){?>
	  <div class="post_title_separator"><img src="<?php echo esc_url($titleseparatorimg1);?>" alt="writepress"></div>
	  <?php } }?>
	  <div class="zolo_blog_description_area">
		<?php 
	 $content = wp_trim_words( get_the_content(), $excerptlength, '' );
		echo  preg_replace( '/\[[^\]]+\]/', '', $content );
	 ?>
	  </div>
	  <?php if( $postmetashowhide == 'show'){
	writepress_shortcodes_entry_meta_for_shortcode(0, 0 , 0, 1, 1, 1, 1, $categorydesign, $posttitlealignment, $categorydesignimg1 );
}?>
	</div>
	<?php }else{?>
	<div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;background:#333333 url('<?php echo $attachment_image[0]; ?>') no-repeat center center; -moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover; font-size:18px; line-height:26px;"> <a href="<?php the_permalink(); ?>">
	  <div class="zolo_blog_box">
		<div class="zolo_blog_description_area">
		  <?php the_content();?>
		</div>
	  </div>
	  </a> </div>
	<?php }?>
  </div>
</div>
<?php if($postseparatorshowhide == 'show'){?>
<div class="post_separator" style="padding-top:<?php echo $blgcrslcolpad[2];?>px;"><img src="<?php echo esc_url($postseparatorimage1); ?>" alt="writepress"/></div>
<?php }?>
</div>
<?php }?>
<?php //Style 12 & 13
if($style == 'style12' || $style == 'style13'){
if($postseparatorshowhide == 'show'){
	$postseparator = 'postseparator_show';
}
?>
<div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$postdesign2.' '.$postseparator.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php if($postseparatorshowhide != 'show'){echo $blgcrslcolpad[2];}else{echo '0';}?>px <?php echo $blgcrslcolpad[3]?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">
<div <?php post_class(); ?>>
  <?php
$attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

$img = wp_get_attachment_image_src($postseparatorimage,'full');
$postseparatorimage1 = $img[0];

$img = wp_get_attachment_image_src($titleseparatorimg,'full');
$titleseparatorimg1 = $img[0];

$img = wp_get_attachment_image_src($categorydesignimg,'full');
$categorydesignimg1 = $img[0];

$post_video = get_post_meta( get_the_ID(), 'zt_video', true );
$format_quote = has_post_format( 'quote' );
?>
  <?php if($format_quote != 1){?>
  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;">
	<div class="zolo_blog_box">
	  <div class="zolo_blog_thumb">
		<?php //zolo_zilla_likes
		if( function_exists('zolo_zilla_likes') ){ 
			echo '<span class="zolo_zilla_likes_box"> ';
			zolo_zilla_likes();
			echo '</span>';
		}
		?>
		<?php if( writepress_number_of_featured_images() > 0 || $post_video ){?>
		<div class="post_flexslider">
		  <ul class="slides">
			<?php if($post_video){ ?>
			<li class="slide">
			  <div class="zolo_fluid_video_wrapper"> <?php echo $post_video; ?></div>
			</li>
			<?php } ?>
			<?php  
			if ( has_post_thumbnail() ) {
			$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $blog_thumb2); 
			?>
			<li class="slide"> <img src="<?php echo esc_url($attachment_image[0]); ?>" alt="writepress"/></li>
			<?php }?>
			<?php
					$i = 2;
					while($i <= 5): 
					$attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
					if($attachment_new_id){?>
			<?php $attachment_image = wp_get_attachment_image_src($attachment_new_id, $blog_thumb2); ?>
			<li class="slide"><img src="<?php echo esc_url($attachment_image[0]); ?>" alt="<?php echo get_post_meta($attachment_new_id, '_wp_attachment_image_alt', true); ?>" /> </li>
			<?php } $i++; endwhile; ?>
		  </ul>
		</div>
		<?php }else{
				echo '<div class="post_flexslider"><ul class="slides"><li class="slide">'.$default_image.'</li></ul></div>';
		  }?>
	  </div>
	  <div class="post_content_area">
		<div class="post_content_box" style="margin-top:-10%">
		  <div style="margin-top:<?php echo $category_topmargin;?>px;">
			<?php writepress_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
			<h2 class="zolo_blog_title" style="font-size:<?php echo $blgcrsltitlesize; ?>px; padding-top:<?php echo $titletoppadding; ?>px; padding-bottom:<?php echo $titlebottompadding; ?>px;"> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
			  <?php the_title(); ?>
			  </a> </h2>
			<?php if($posttitleseparatorshowhide == 'show'){ if($titleseparatorimg1){?>
			<div class="post_title_separator"><img src="<?php echo esc_url($titleseparatorimg1);?>" alt="writepress"></div>
			<?php } }?>
			<?php if($style == 'style12' && $postmetashowhide2 == 'show'){ writepress_shortcodes_entry_meta_for_shortcode(1, 0 , 0, 1, 0, 0, 0); }?>
			<div class="zolo_blog_description_area">
			<?php 
			if($continuereadingshowhide == 'show'){
				$continuereadingmodifytext = '<span class="read_more_area"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
				$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext);
				echo  preg_replace( '/\[[^\]]+\]/', '', $content );
			}else{
				$content = wp_trim_words( get_the_content(), $excerptlength, '' );
				echo  preg_replace( '/\[[^\]]+\]/', '', $content );
			}
			?>
			</div>
		  </div>
		</div>
	  </div>
	  <?php if($style == 'style12'){?>
	  <div class="blog_entry_footer">
		<?php writepress_shortcodes_entry_meta_for_shortcode(0, 0 , 1, 0, 0, 0, 0);
 get_template_part('framework/social_sharing');?>
	  </div>
	  <?php }?>
	  <?php if($style == 'style13' && $postmetashowhide == 'show'){?>
	  <div class="blog_entry_footer">
		<?php writepress_shortcodes_entry_meta_for_shortcode(0, 0 , 0, 1, 0, 0, 1);?>
		<div class="social_sharing_icon_box"><span class="social_sharing_icon"><span>Share</span> <i class="fa fa-share-alt"></i></span>
		  <?php get_template_part('framework/social_sharing');?>
		</div>
	  </div>
	  <?php }?>
	</div>
  </div>
  <?php }else{?>
  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;background:#333333 url('<?php echo $attachment_image[0]; ?>') no-repeat center center; -moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover; font-size:18px; line-height:26px;"> <a href="<?php the_permalink(); ?>">
	<div class="zolo_blog_box">
	  <div class="zolo_blog_description_area">
		<?php the_content();?>
	  </div>
	</div>
	</a> </div>
  <?php }?>
</div>
<?php if($postseparatorshowhide == 'show'){?>
<div class="post_separator" style="padding-top:<?php echo $blgcrslcolpad[2];?>px;"><img src="<?php echo esc_url($postseparatorimage1); ?>" alt="writepress"/></div>
<?php }?>
</div>
<?php }?>
<?php //Style 14
if($style == 'style14'){?>
<div class="zolo_blog_col zolo_blog_col1 <?php echo $layout_class.' '.$filterclasselector.' '.$animatedclass;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">
<div <?php post_class(); ?>>
<?php	
$attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
if($attachment_image[0]){
	$attachment_image_src = $attachment_image[0];
	}else{
		$attachment_image_src = get_template_directory_uri().'/assets/images/post_thumb/blog_large.jpg';
}
$img = wp_get_attachment_image_src($titleseparatorimg,'full');
$titleseparatorimg1 = $img[0];

$img = wp_get_attachment_image_src($categorydesignimg,'full');
$categorydesignimg1 = $img[0];

$postcaptionbgimg = wp_get_attachment_image_src($postcaptionimg,'full');
$postcaptionbgurl = $postcaptionbgimg[0];
?>
  <div class="zolo_blogcontent_bg <?php echo $fullheightpost;?>" style=" width:100%; float:left;color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;background-image:url('<?php echo $attachment_image_src; ?>'); background-position:center center; -moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover;">
	<div class="zolo_blog_box"> <span class="overlay"></span> 
	  <!--Start-->
	  
	  <div class="post_content_area" style="max-width:<?php echo $postcaptionwidth; ?>px">
		<div class="post_content_box" style=" background:url('<?php echo $postcaptionbgurl; ?>') center center no-repeat;-moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover;">
		  <?php writepress_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
		  <h2 class="zolo_blog_title" style="font-size:<?php echo $blgcrsltitlesize; ?>px; padding-top:<?php echo $titletoppadding; ?>px; padding-bottom:<?php echo $titlebottompadding; ?>px;"> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
			<?php the_title(); ?>
			</a> </h2>
		  <?php if($posttitleseparatorshowhide == 'show'){ if($titleseparatorimg1){?>
		  <div class="post_title_separator"><img src="<?php echo esc_url($titleseparatorimg1);?>" alt="writepress"></div>
		  <?php } }?>
		  <?php  if( $postmetashowhide == 'show'){ writepress_shortcodes_entry_meta_for_shortcode(1, 0 , 0, 1, 0, 0, 0); } ?>
		  <div class="zolo_blog_style14_description">
			<?php 
if($continuereadingshowhide == 'show'){
	$continuereadingmodifytext = '<span class="read_more_area" style="text-align:'.$posttitlealignment.';"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
	$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext);
	echo  preg_replace( '/\[[^\]]+\]/', '', $content );
}else{
	$content = wp_trim_words( get_the_content(), $excerptlength, '' );
	echo  preg_replace( '/\[[^\]]+\]/', '', $content );
}
?>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>
</div>
<?php }?>
<?php //Style 15
if($style == 'style15'){?>
<div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw15;?> <?php echo $layout_class.' '.$filterclasselector.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php echo $blgcrslcolpad[2]?>px <?php echo $blgcrslcolpad[3]?>px" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">

<div <?php post_class(); ?>>
  <?php	
$img = wp_get_attachment_image_src($titleseparatorimg,'full');
$titleseparatorimg1 = $img[0];

$img = wp_get_attachment_image_src($categorydesignimg,'full');
$categorydesignimg1 = $img[0];
?>
  <div class="zolo_blogcontent_bg" style=" width:100%; float:left;color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;">
	<div class="zolo_blog_box">
	  <div class="zolo_blogcontent">
		<div class="post_content_area">
		  <div class="post_thumbnail">
			<?php  
			if ( has_post_thumbnail() ) {
			$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $blog_thumb2);
				echo '<img src="'.esc_url($attachment_image[0]).'" alt="writepress"/>';
			}else{
				echo $default_image;
				}?>
		  </div>
		  <div class="post_content_wrapper">
			<div class="post_content_box">
			  <?php writepress_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
			  <h2 class="zolo_blog_title" style="font-size:<?php echo $blgcrsltitlesize; ?>px; padding-top:<?php echo $titletoppadding; ?>px; padding-bottom:<?php echo $titlebottompadding; ?>px;"> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
				<?php the_title(); ?>
				</a> </h2>
			  <?php if($posttitleseparatorshowhide == 'show'){ if($titleseparatorimg1){?>
			  <div class="post_title_separator"><img src="<?php echo esc_url($titleseparatorimg1);?>" alt="writepress"></div>
			  <?php } }?>
			  <div class="zolo_blog_style15_description">
				<?php 
				if($continuereadingshowhide == 'show'){
					$continuereadingmodifytext = '<span class="read_more_area" style="text-align:'.$posttitlealignment.';"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
					}else{
						$continuereadingmodifytext = '';
					 }
	 
				//$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext);
				//echo  preg_replace( '/\[[^\]]+\]/', '', $content );
				
				$content = wp_trim_words( get_the_content(), $excerptlength, '');
				echo  '<span class="zolo_blog_description_text">'.preg_replace( '/\[[^\]]+\]/', '', $content ).'</span>'.$continuereadingmodifytext;
				?>
			  </div>
			  <?php  if( $postmetashowhide == 'show'){ writepress_shortcodes_entry_meta_for_shortcode(1, 0 , 0, 1, 0, 0, 0, $posttitlealignment); }?>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>
</div>
<?php }?>

<?php
#END Masonry
$now_open_works = 1;


$i++;
endwhile;

?>
<?php
        die();

    }

}


