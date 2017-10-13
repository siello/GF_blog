<?php 
/*-----------------------------------------------------------------------------------*/
/* Blog shortcode
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Zolo_Blog_Styles_Module')) {
	class Zolo_Blog_Styles_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'zolo_blog_styles_init' ) );
			add_shortcode( 'zolo_blog_styles', array( &$this, 'zolo_blog_styles' ) );
		}
		
		function zolo_blog_styles_init() {
			$available_categories  = array('all');
			$args = array(
				'type'                     => 'post',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'category'
			);
			$categories = get_categories( $args );
			
			if (is_array($categories)) {
				foreach ($categories as $category) {
					array_push($available_categories, $category->slug);
				}
			}
			
			if ( function_exists( 'vc_map' ) ) {

			vc_map( array(
			"name" => __("Blog Styles", 'writepress-core'),
			"base" => "zolo_blog_styles",
			"class" => "",
			"category" => __( "ZOLO", "writepress"),
			"icon"		=> get_template_directory_uri() . "/assets/images/vc_icons/vc-icon-blog.png",
			"params" => array(		
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __("Choose Style",'writepress-core'),
					"param_name" => "style",
					'value' => array(__("Style 1",'writepress-core') => "style1",__("Style 2",'writepress-core') => "style2",__("Style 3",'writepress-core') => "style3",__("Style 4",'writepress-core') => "style4",__("Style 5",'writepress-core') => "style5",__("Style 6",'writepress-core') => "style6",__("Style 7",'writepress-core') => "style7",__("Style 8",'writepress-core') => "style8",__("Style 9",'writepress-core') => "style9",__("Style 10",'writepress-core') => "style10",__("Style 11",'writepress-core') => "style11",__("Style 12",'writepress-core') => "style12",__("Style 13",'writepress-core') => "style13",__("Style 14",'writepress-core') => "style14",__("Style 15",'writepress-core') => "style15",__("Large",'writepress-core') => "style_large",__("Medium",'writepress-core') => "style_medium",__("Small",'writepress-core') => "style_small"),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Category",'writepress-core'),
					"param_name" => "category",
					"value" => $available_categories, 
					"description" => __("Choose the category to show (optional)",'writepress-core'),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Choose Layout",'writepress-core'),
					"param_name" => "layoutstyle",
					'value' => array(__("Grid",'writepress-core') => "fitRows",__("Masonry",'writepress-core') => "masonry"),
					'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style8', 'style9', 'style12', 'style13')),
					),
			
				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Number of Posts",'writepress-core'),
					"param_name" => "num",
					"value" => "4", 
					"description" => __("Leave blank or -1 to show all.",'writepress-core')   
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Number of Items per row",'writepress-core'),
					"param_name" => "blgcrslcolprw",
					"value" => array(__("Default",'writepress-core') => "default",__("Four",'writepress-core') => "Four",__("Three",'writepress-core') => "Three",__("Two",'writepress-core') => "Two", __("One",'writepress-core') => "One"),
					'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style8', 'style9', 'style10', 'style12', 'style13'))
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Number of Items per row",'writepress-core'),
					"param_name" => "blgcrslcolprw15",
					"value" => array(__("One",'writepress-core') => "One", __("Two",'writepress-core') => "Two"),
					'dependency' => array( 'element' => 'style', 'value' => array('style15'))
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Box Background Color",'writepress-core'),
					"param_name" => "boxbackgroundcolor3",
					'value' => '#fff',
					'dependency' => array( 'element' => 'style', 'value' => array('style12', 'style13', 'style15')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Box Border Color",'writepress-core'),
					"param_name" => "boxbordercolor3",
					'value' => '#eee',
					'dependency' => array( 'element' => 'style', 'value' => array('style12', 'style13', 'style15')),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Post Caption Width",'writepress-core'),
					"param_name" => "postcaptionwidth",
					"value" => "800", 
					'dependency' => array( 'element' => 'style', 'value' => array('style14')),
					),
				array(
					"type" => "attach_image",
					"class" => "",
					"heading" => __("Post Caption Background Image", "writepress"),
					"param_name" => "postcaptionimg",
					"value" => "",
					'dependency' => array( 'element' => 'style', 'value' => array('style14')),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Post title position",'writepress-core'),
					"param_name" => "posttitleposition",
					'value' => array(__("Above",'writepress-core') => "above",__("Below",'writepress-core') => "below"),
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9')),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Post title alignment",'writepress-core'),
					"param_name" => "posttitlealignment",
					'value' => array(__("Default",'writepress-core') => "default",__("Left",'writepress-core') => "left",__("Center",'writepress-core') => "center",__("Right",'writepress-core') => "right"),
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Box Background Color",'writepress-core'),
					"param_name" => "blgcrslcolbg",
					"value" => '#f9f9f9',
					'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3','style6','style8'))
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Box Border Color",'writepress-core'),
					"param_name" => "blgcrslcolbordep",
					"value" => '#e6e6e6',
					'dependency' => array( 'element' => 'style', 'value' => array('style1','style2','style3','style5','style6','style8'))
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Box Border Radius",'writepress-core'),
					"param_name" => "blgcrslcolradi",
					'value' => '0', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style8'))
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Box Padding(Top, Right, Bottom, Left)",'writepress-core'),
					"param_name" => "blgcrslcolpad",
					'value' => '', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style5', 'style6', 'style7', 'style8', 'style10', 'style11', 'style12', 'style13', 'style15')),
					"description" => __("e.g - 15,15,15,15",'writepress-core')
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Box Inner Padding",'writepress-core'),
					"param_name" => "blgcrslcolinnerpad",
					'value' => '35', 
					'dependency' => array( 'element' => 'style', 'value' => array('style10')),
					"description" => __("e.g - 35",'writepress-core')
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Title Font Size",'writepress-core'),
					"param_name" => "blgcrsltitlesize",
					'value' => '24',			
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Title Text Color",'writepress-core'),
					"param_name" => "blgcrsltitlecolor",
					"value" => '', 
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Title Top Padding",'writepress-core'),
					"param_name" => "titletoppadding",
					'value' => '0', 
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15'))
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Title Bottom Padding",'writepress-core'),
					"param_name" => "titlebottompadding",
					'value' => '20',
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15'))
					),					
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Post title separator Show/Hide",'writepress-core'),
					"param_name" => "posttitleseparatorshowhide",
					'value' => array(__("Hide",'writepress-core') => "hide",__("Show",'writepress-core') => "show"),
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15')),
					),				
				array(
					"type" => "attach_image",
					"class" => "",
					"heading" => __("Post title separator Image", "writepress"),
					"param_name" => "titleseparatorimg",
					"value" => "",
					'dependency' => array( 'element' => 'posttitleseparatorshowhide', 'value' => array('show')),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Excerpt Length",'writepress-core'),
					"param_name" => "excerptlength",
					'value' => '40',
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15'))
					),					
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Category position",'writepress-core'),
					"param_name" => "categoryposition",
					'value' => array(__("Above",'writepress-core') => "above",__("Below",'writepress-core') => "below"),
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9')),
					),
							
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Category design",'writepress-core'),
					"param_name" => "categorydesign",
					'value' => array(__("Box",'writepress-core') => "box",__("Rounded",'writepress-core') => "rounded",__("Image",'writepress-core') => "image",__("None",'writepress-core') => "none"),
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15')),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Category Item Top Margin",'writepress-core'),
					"param_name" => "category_topmargin",
					'value' => '0',
					'dependency' => array( 'element' => 'style', 'value' => array('style12', 'style13'))
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Category Item font Color",'writepress-core'),
					"param_name" => "categoryfontcolor",
					'value' => '#757575',
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Category Item Hover font Color",'writepress-core'),
					"param_name" => "categoryfontcolorhover",
					'value' => '#549ffc',
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Category Item Background Color",'writepress-core'),
					"param_name" => "categorybackgroundcolor",
					'value' => '#ffffff',
					'dependency' => array( 'element' => 'categorydesign', 'value' => array('box','rounded')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Category Item hover Background Color",'writepress-core'),
					"param_name" => "categorybackgroundcolorhover",
					'value' => '#ffffff',
					'dependency' => array( 'element' => 'categorydesign', 'value' => array('box','rounded')),
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Category Item Border Color",'writepress-core'),
					"param_name" => "categorybordercolor",
					'value' => '#757575',
					'dependency' => array( 'element' => 'categorydesign', 'value' => array('box','rounded')),
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Category Item hover Border Color",'writepress-core'),
					"param_name" => "categorybordercolorhover",
					'value' => '#549ffc',
					'dependency' => array( 'element' => 'categorydesign', 'value' => array('box','rounded')),
					),
					
				array(
					"type" => "attach_image",
					"class" => "",
					"heading" => __("Image for category design", "writepress"),
					"param_name" => "categorydesignimg",
					//"admin_label" => true,
					"value" => "",
					'dependency' => array( 'element' => 'categorydesign', 'value' => array('image')),
					),
					
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Continue Reading Show/Hide",'writepress-core'),
					"param_name" => "continuereadingshowhide",
					'value' => array(__("Show",'writepress-core') => "show", __("Hide",'writepress-core') => "hide"),
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style12', 'style13', 'style14', 'style15')),
					),
					
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Modify the Continue Reading text",'writepress-core'),
					"param_name" => "continuereadingmodify",
					'value' => 'Подробнее',
					'dependency' => array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
					),
		
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button font Color",'writepress-core'),
					"param_name" => "buttonfontcolor",
					'value' => '#757575',
					'dependency' => array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Hover font Color",'writepress-core'),
					"param_name" => "buttonfontcolorhover",
					'value' => '#549ffc',
					'dependency' => array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
					),					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Background Color",'writepress-core'),
					"param_name" => "buttonbackgroundcolor",
					'value' => '#ffffff',
					'dependency' => array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Hover Background Color",'writepress-core'),
					"param_name" => "buttonbackgroundcolorhover",
					'value' => '#ffffff',
					'dependency' => array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button border Color",'writepress-core'),
					"param_name" => "buttonbordercolor",
					'value' => '#757575',
					'dependency' => array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Hover border Color",'writepress-core'),
					"param_name" => "buttonbordercolorhover",
					'value' => '#549ffc',
					'dependency' => array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
					),		
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Post social sharing Show/Hide",'writepress-core'),
					"param_name" => "socialsharingshowhide",
					'value' => array(__("Show",'writepress-core') => "show",__("Hide",'writepress-core') => "hide"),
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9')),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Social Icon Border Radius",'writepress-core'),
					"param_name" => "socialiconborderradius",
					'value' => '0',
					'dependency' => array( 'element' => 'socialsharingshowhide', 'value' => array('show')),
					),					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Social Icon Color",'writepress-core'),
					"param_name" => "socialiconcolor",
					'value' => '#757575',
					'dependency' => array( 'element' => 'socialsharingshowhide', 'value' => array('show')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Social Icon Hover Color",'writepress-core'),
					"param_name" => "socialiconcolorhover",
					'value' => '#549ffc',
					'dependency' => array( 'element' => 'socialsharingshowhide', 'value' => array('show')),
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Social Icon Background Color",'writepress-core'),
					"param_name" => "socialiconbackgroundcolor",
					'value' => '#ffffff',
					'dependency' => array( 'element' => 'socialsharingshowhide', 'value' => array('show')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Social Icon Hover Background Color",'writepress-core'),
					"param_name" => "socialiconbackgroundcolorhover",
					'value' => '#ffffff',
					'dependency' => array( 'element' => 'socialsharingshowhide', 'value' => array('show')),
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Social Icon border Color",'writepress-core'),
					"param_name" => "socialiconbordercolor",
					'value' => '#757575',
					'dependency' => array( 'element' => 'socialsharingshowhide', 'value' => array('show')),
					),					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Social Icon Hover border Color",'writepress-core'),
					"param_name" => "socialiconbordercolorhover",
					'value' => '#549ffc',
					'dependency' => array( 'element' => 'socialsharingshowhide', 'value' => array('show')),
					),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Post meta Show/Hide",'writepress-core'),
					"param_name" => "postmetashowhide",
					'value' => array(__("Show",'writepress-core') => "show",__("Hide",'writepress-core') => "hide"),
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style13', 'style14', 'style15')),
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Post meta Color",'writepress-core'),
					"param_name" => "postmetacolor",
					'value' => '#818181',
					'dependency' => array( 'element' => 'postmetashowhide', 'value' => array('show')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Post meta hover Color",'writepress-core'),
					"param_name" => "postmetacolorhover",
					'value' => '#549ffc',
					'dependency' => array( 'element' => 'postmetashowhide', 'value' => array('show')),
					),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Post meta Show/Hide",'writepress-core'),
					"param_name" => "postmetashowhide2",
					'value' => array(__("Show",'writepress-core') => "show",__("Hide",'writepress-core') => "hide"),
					'dependency' => array( 'element' => 'style', 'value' => array('style12')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Post meta Color",'writepress-core'),
					"param_name" => "postmetacolor2",
					'value' => '#818181',
					'dependency' => array( 'element' => 'style', 'value' => array('style12'))
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Post meta hover Color",'writepress-core'),
					"param_name" => "postmetacolorhover2",
					'value' => '#549ffc',
					'dependency' => array( 'element' => 'style', 'value' => array('style12'))
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Meta Border Color",'writepress-core'),
					"param_name" => "postmetabordercolor2",
					'value' => '#f6f5f5',
					'dependency' => array( 'element' => 'style', 'value' => array('style12', 'style13')),
					),
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Post content Color",'writepress-core'),
					"param_name" => "postcontentcolor",
					'value' => '#818181',
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9','style10','style11','style12', 'style13', 'style14')),
					),
						
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Blog Post Design",'writepress-core'),
					"param_name" => "postdesign",
					'value' => array(__("None",'writepress-core') => "none",__("Box",'writepress-core') => "box",__("Box Without Padding",'writepress-core') => "box_withoutpadding"),
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Box Background Color",'writepress-core'),
					"param_name" => "boxbackgroundcolor",
					'value' => '#fff',
					'dependency' => array( 'element' => 'postdesign', 'value' => array('box','box_withoutpadding')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Box Border Color",'writepress-core'),
					"param_name" => "boxbordercolor",
					'value' => '#eee',
					'dependency' => array( 'element' => 'postdesign', 'value' => array('box','box_withoutpadding')),
					),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Blog Post Design",'writepress-core'),
					"param_name" => "postdesign2",
					'value' => array(__("None",'writepress-core') => "none",__("Box",'writepress-core') => "box",__("Box With Separator",'writepress-core') => "box_withseparator"),
					'dependency' => array( 'element' => 'style', 'value' => array('style10', 'style11')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Box Background Color",'writepress-core'),
					"param_name" => "boxbackgroundcolor2",
					'value' => '#fff',
					'dependency' => array( 'element' => 'postdesign2', 'value' => array('box','box_withseparator')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Box Border Color",'writepress-core'),
					"param_name" => "boxbordercolor2",
					'value' => '#eee',
					'dependency' => array( 'element' => 'postdesign2', 'value' => array('box','box_withseparator')),
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Meta Border Color",'writepress-core'),
					"param_name" => "postmetabordercolor",
					'value' => '#f6f5f5',
					'dependency' => array( 'element' => 'postdesign2', 'value' => array('box_withseparator')),
					),				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Post separator Show/Hide",'writepress-core'),
					"param_name" => "postseparatorshowhide",
					'value' => array(__("Hide",'writepress-core') => "hide",__("Show",'writepress-core') => "show"),
					'dependency' => array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small', 'style11', 'style12')),
					),
				array(
					"type" => "attach_image",
					"class" => "",
					"heading" => __("Post separator Image", "writepress"),
					"param_name" => "postseparatorimage",
					"value" => "",
					'dependency' => array( 'element' => 'postseparatorshowhide', 'value' => array('show')),
					),					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Meta Text Color",'writepress-core'),
					"param_name" => "blgstylemetacolor",
					"value" => '#ffffff', 
					'dependency' => array( 'element' => 'style', 'value' => array('style2', 'style3', 'style5', 'style6', 'style7'))	
					),				
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Image Overlay Color",'writepress-core'),
					"param_name" => "blgcrslimgoverlay",
					"value" => '#000000', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style14'))
					),	
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Image Overlay Opacity",'writepress-core'),
					"param_name" => "blgstyleoverlayopac",
					'value' => '0.1', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style14'))
					),	
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Title Hover Color",'writepress-core'),
					"param_name" => "blgstylehovercolor",
					"value" => '#0187a0', 
					'dependency' => array( 'element' => 'style', 'value' => array('style8'))
					),		
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Hover Background",'writepress-core'),
					"param_name" => "blgcrslhovercolor",
					"value" => '#000000', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style14'))
					),	
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Hover Opacity",'writepress-core'),
					"param_name" => "blgcrslhoveropac",
					'value' => '0.8', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style14'))
					),
				array(
					"type" => "checkbox",
					"class" => "",
					"heading" => __("Full Height Post",'writepress-core'),
					"param_name" => "fullheightpost",
				   'value' => array(  'Yes'  => true ),
				   'dependency' => array( 'element' => 'style', 'value' => array('style14'))
				   ),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Post Top Padding",'writepress-core'),
					"param_name" => "posttoppadding",
					'value' => '120', 
					'dependency' => array( 'element' => 'style', 'value' => array('style14'))
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Post Bottom Padding",'writepress-core'),
					"param_name" => "postbottompadding",
					'value' => '120',
					'dependency' => array( 'element' => 'style', 'value' => array('style14'))
					),
				
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Font Awesome Zoom Icon",'writepress-core'),
					"param_name" => "blgcrslzoomicon",
					'value' => 'fa fa-search-plus',
					'dependency' => array( 'element' => 'style', 'value' => array('style1'))
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Font Awesome Link Icon",'writepress-core'),
					"param_name" => "blgcrsllinkicon",
					'value' => 'fa fa-link',
					'dependency' => array( 'element' => 'style', 'value' => array('style1'))
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Background",'writepress-core'),
					"param_name" => "blgcrslbuttonbg",
					"value" => '#00c8ec', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1'))
					),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Button Hover Background",'writepress-core'),
					"param_name" => "blgcrslbuttonhovbg",
					"value" => '#0187a0', 
					'dependency' => array( 'element' => 'style', 'value' => array('style1'))
					),	
				
				array(
					"type" => "checkbox",
					"class" => "",
					"heading" => __("Show filter",'writepress-core'),
					"param_name" => "blgshowfilter",
				   'value' => array(  'Yes'  => true ),
				   //'dependency' => array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style8'))
				   ),
				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Filter button Font Size",'writepress-core'),
					"param_name" => "filter_fontsize",
					'value' => '16', 
					'dependency' => array( 'element' => 'blgshowfilter', 'not_empty' => true),
					),
				 array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Filter button alignment",'writepress-core'),
					"param_name" => "filter_button_align",
					'value' => array(__("Left",'writepress-core') => "left",__("Center",'writepress-core') => "center",__("Right",'writepress-core') => "right"),
					'dependency' => array( 'element' => 'blgshowfilter', 'not_empty' => true),
					),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Filter Button Border Radius",'writepress-core'),
					"param_name" => "filter_buttonborradi",
					'value' => '0', 
					'dependency' => array( 'element' => 'blgshowfilter', 'not_empty' => true),
					),
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Filter button text color",'writepress-core'),
					"param_name" => "filter_button_text_color",
					"value" => '#fff',
					"description" => __("Filter button text color",'writepress-core'),	
					'dependency' => array( 'element' => 'blgshowfilter', 'not_empty' => true),		
				 ),
				 
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Filter button background color",'writepress-core'),
					"param_name" => "filter_button_bg_color",
					"value" => '#549ffc',
					"description" => __("Filter button background color",'writepress-core'),	
					'dependency' => array( 'element' => 'blgshowfilter', 'not_empty' => true),		
				 ),
				 
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Filter button border color",'writepress-core'),
					"param_name" => "filter_button_border_color",
					"value" => '#3174c8',
					"description" => __("Filter button border color",'writepress-core'),	
					'dependency' => array( 'element' => 'blgshowfilter', 'not_empty' => true),		
				 ),	
					
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Filter button hover text color",'writepress-core'),
					"param_name" => "filter_button_text_hover_color",
					"value" => '#fff',
					"description" => __("Filter button hover text color",'writepress-core'),	
					'dependency' => array( 'element' => 'blgshowfilter', 'not_empty' => true),		
				 ),
				 
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Filter button hover background color",'writepress-core'),
					"param_name" => "filter_button_bg_hover_color",
					"value" => '#3174c8',
					"description" => __("Filter button hover background color",'writepress-core'),	
					'dependency' => array( 'element' => 'blgshowfilter', 'not_empty' => true),		
				 ),
					
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Navigation type",'writepress-core'),
					"param_name" => "blog_navigation",
					'value' => array(__("None",'writepress-core') => "none",__("Default",'writepress-core') => "default",__("Classic navigation",'writepress-core') => "classic_nav",__("Load more button",'writepress-core') => "loadmore_nav"),
					),
				
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Navigation text color",'writepress-core'),
					"param_name" => "nav_color",
					"value" => '#000000',
					"description" => __("navigation text color",'writepress-core'),			
					'dependency' => array( 'element' => 'blog_navigation', 'value' => array('classic_nav'))
				 ),		
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Navigation background",'writepress-core'),
					"param_name" => "nav_bg",
					"value" => '#eeeeee',
					"description" => __("navigation background",'writepress-core'),			
					'dependency' => array( 'element' => 'blog_navigation', 'value' => array('classic_nav'))
				 ),	 			 
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Navigation border color",'writepress-core'),
					"param_name" => "nav_border",
					"value" => '#eeeeee',
					"description" => __("navigation border color",'writepress-core'),			
					'dependency' => array( 'element' => 'blog_navigation', 'value' => array('classic_nav'))
				 ),	 
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Current navigation text color",'writepress-core'),
					"param_name" => "nav_hover_color",
					"value" => '#ffffff',
					"description" => __("Current navigation text color",'writepress-core'),			
					'dependency' => array( 'element' => 'blog_navigation', 'value' => array('classic_nav'))
				 ),				 
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Current navigation background color",'writepress-core'),
					"param_name" => "nav_hover_bg",
					"value" => '#549ffc',
					"description" => __("Current navigation background color",'writepress-core'),			
					'dependency' => array( 'element' => 'blog_navigation', 'value' => array('classic_nav'))
				 ),				
				 array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Number of post to load on click",'writepress-core'),
					"param_name" => "blog_click",
					"value" => __("4",'writepress-core'),
					"description" => __("Number of post loaded when Load more clicked",'writepress-core'),			
					'dependency' => array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav'))
				 ),
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Loadmore button background color",'writepress-core'),
					"param_name" => "button_bg",
					"value" => '#549ffc',
					"description" => __("button background color",'writepress-core'),			
					'dependency' => array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav'))
				 ),	 
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Loadmore button text color",'writepress-core'),
					"param_name" => "button_title",
					"value" => '#fff',
					"description" => __("button text color",'writepress-core'),			
					'dependency' => array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav'))
				 ),				 
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Loadmore button border color",'writepress-core'),
					"param_name" => "button_border",
					"value" => '#549ffc',
					"description" => __("button border color",'writepress-core'),			
					'dependency' => array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav'))
				 ),
					 
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Loadmore button text color hover",'writepress-core'),
					"param_name" => "button_hover_title",
					"value" => '#fff',
					"description" => __("Text color on hover",'writepress-core'),			
					'dependency' => array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav'))
				 ),				 
				 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Loadmore button background color hover",'writepress-core'),
					"param_name" => "button_hover_bg",
					"value" => '#549ffc',
					"description" => __("Background color on hover",'writepress-core'),			
					'dependency' => array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav'))
				 ),	
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("CSS Animation",'blogera'),
					"param_name" => "data_animation",
					'value' => writepress_data_animations(),
					"description" => __("Select type of animation. Note: Works only in modern browsers.",'blogera')
				),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __("Delay",'writepress-core'),
					"param_name" => "data_delay",
					"value" => '500',
					"description" => __("Delay",'writepress-core'), 
					),
			),
		) );
			}
		}

		function zolo_blog_styles( $atts, $content=null ){
		   extract(shortcode_atts(array(
					'style'									=> 'style1',
					'category'								=> 'all',
					'layoutstyle'							=> 'fitRows',
					'num' 									=> '4',
					'blgcrslcolprw' 						=> '',
					'blgcrslcolprw15' 						=> 'One',
					'blgshowfilter'							=> '0',
					'blgcrslcolbg'							=> '#f9f9f9',
					'blgcrslcolbordep'						=> '#e6e6e6',
					'blgcrslcolradi'						=> '0',
					'blgcrslcolpad'							=> '',
					'blgcrsltitlesize'						=> '',
					'blgcrsltitlecolor'						=> '',
					'blgstylemetacolor'						=> '',
					'blgcrslimgoverlay'						=> '#000000',
					'blgstyleoverlayopac'					=> '0.1',
					'blgstylehovercolor'					=> '#0187a0',
					'blgcrslhovercolor'						=> '#000000',
					'blgcrslhoveropac'						=> '0.8',
					'blgcrslzoomicon'						=> 'fa fa-search-plus',
					'blgcrsllinkicon'						=> 'fa fa-link',
					'blgcrslbuttonbg'						=> '#00c8ec',
					'blgcrslbuttonhovbg'					=> '#0187a0',				
					'blog_navigation'						=> 'none',
					'blog_click'							=> '4',
					'nav_bg'								=> '#eeeeee',
					'nav_color'								=> '#000000',
					'nav_border'							=> '#eeeeee',
					'nav_hover_color'						=> '#ffffff',
					'nav_hover_bg'							=> '#549ffc',
					'button_bg'								=> '#549ffc',
					'button_title'							=> '#fff',
					'button_border'							=> '#549ffc',
					'button_hover_title'					=> '#fff',
					'button_hover_bg'						=> '#549ffc',				
					'filter_button_align'					=> 'left',
					'filter_fontsize'						=> '16',
					'filter_buttonborradi'					=> '0',
					'filter_button_text_color'				=> '#fff',
					'filter_button_bg_color'				=> '#549ffc',
					'filter_button_border_color'			=> '#3174c8',
					'filter_button_text_hover_color'		=> '#fff',
					'filter_button_bg_hover_color'			=> '#3174c8',				
					'data_animation'						=>'No Animation',
					'data_delay'							=>'500',
					'posttitleposition'						=>'above',
					'posttitlealignment'					=>'',
					'posttitleseparatorshowhide'			=>'hide',
					'titleseparatorimg'						=>'',
					'categoryposition'						=>'above',
					'categorydesign'						=>'box',
					'categorydesignimg'						=>'',
					'continuereadingshowhide'				=>'show',
					'continuereadingmodify'					=>'Подробнее',
					'socialsharingshowhide'					=>'show',
					'socialiconborderradius'				=>'0',				
					'postdesign'							=>'none',				
					'postseparatorshowhide'					=>'hide',
					'postseparatorimage'					=>'',
					'titletoppadding'						=>'0',
					'titlebottompadding'					=>'20',
					'postmetashowhide'						=>'show',
					'postmetacolor'							=>'#818181',
					'postmetacolorhover'					=>'#549ffc',
					'postcontentcolor'						=>'#818181',
					'categoryfontcolor'						=>'#757575',
					'categoryfontcolorhover'				=>'#549ffc',
					'categorybackgroundcolor'				=>'#ffffff',
					'categorybackgroundcolorhover'			=>'#ffffff',
					'categorybordercolor'					=>'#757575',
					'categorybordercolorhover'				=>'#549ffc',
					'buttonfontcolor'						=>'#757575',
					'buttonfontcolorhover'					=>'#549ffc',
					'buttonbackgroundcolor'					=>'#ffffff',
					'buttonbackgroundcolorhover'			=>'#ffffff',
					'buttonbordercolor'						=>'#757575',
					'buttonbordercolorhover'				=>'#549ffc',
					'socialiconcolor'						=>'#757575',
					'socialiconcolorhover'					=>'#549ffc',
					'socialiconbackgroundcolor'				=>'#ffffff',
					'socialiconbackgroundcolorhover'		=>'#ffffff',
					'socialiconbordercolor'					=>'#757575',
					'socialiconbordercolorhover'			=>'#549ffc',
					'boxbackgroundcolor'					=>'#ffffff',
					'boxbackgroundcolor2'					=>'#ffffff',
					'boxbackgroundcolor3'					=>'#ffffff',
					'boxbordercolor'						=>'#eeeeee',
					'boxbordercolor2'						=>'#eeeeee',
					'boxbordercolor3'						=>'#eeeeee',
					'excerptlength'							=>'40',
					'blgcrslcolinnerpad'					=>'35',
					'postdesign2'							=>'none',				
					'postmetabordercolor'					=>'#f9f9f9',
					//style 12
					'postmetabordercolor2'					=>'#f9f9f9',
					'postmetashowhide2'						=>'show',
					'postmetacolor2'						=>'#818181',
					'postmetacolorhover2'					=>'#549ffc',
					'category_topmargin'					=>'0',
					'posttoppadding'						=>'120',
					'postbottompadding'						=>'120',
					'fullheightpost'						=>'',
					'postcaptionwidth'						=>'800',
					'postcaptionimg'						=>''
						
				), $atts));
		
				ob_start();
				$id = RandomString(20);
				
				// Blog row count
				if($style == 'style12' && $blgcrslcolprw == '' || $style == 'style13' && $blgcrslcolprw == '' || $style == 'style15' && $blgcrslcolprw == ''){
						$blgcrslcolprw = 1;
					}elseif($blgcrslcolprw == ''){
						$blgcrslcolprw = 4;
					}else{
						if($blgcrslcolprw == 'Four'){
							$blgcrslcolprw = 4;
						}elseif($blgcrslcolprw == 'Three'){
							$blgcrslcolprw = 3;
						}elseif($blgcrslcolprw == 'Two'){
							$blgcrslcolprw = 2;
						}elseif($blgcrslcolprw == 'One'){
							$blgcrslcolprw = 1;
						}
				}
					
				if($blgcrslcolprw15 == 'Two'){
					$blgcrslcolprw15 = 2;
				}elseif($blgcrslcolprw15 == 'One'){
					$blgcrslcolprw15 = 1;
				}
					
					
				if($fullheightpost == 1){
					$fullheightpost = 'fullheightpost';				
					}else{
						$fullheightpost = '';
						}
					
				// Title Alignment
				if($style == 'style12' && $posttitlealignment == '' || $style == 'style13' && $posttitlealignment == ''){
					$posttitlealignment = 'center';
				}elseif($posttitlealignment == ''){
					$posttitlealignment = 'left';
				}else{
					$posttitlealignment = $posttitlealignment;
				}
					
				// Title Color
				if($style == 'style4' && $blgcrsltitlecolor == '' || $style == 'style3' && $blgcrsltitlecolor == ''){
					$blgcrsltitlecolor = '#ffffff';
				}elseif($style == 'style6' && $blgcrsltitlecolor == ''){
					$blgcrsltitlecolor = '#777777';
				}elseif($blgcrsltitlecolor == ''){
					$blgcrsltitlecolor = '#4c4c4c';
				}else{
					$blgcrsltitlecolor = $blgcrsltitlecolor;
				}
					
				// Column Padding
				if($style == 'style4' && $blgcrslcolpad == ''){
					$blgcrslcolpad = '0,0,0,0';
				}elseif($blgcrslcolpad == ''){
					$blgcrslcolpad = '15,15,15,15';
				}else{
					$blgcrslcolpad = $blgcrslcolpad;
				}
					
				// Title font size
				if($style == 'style5' && $blgcrsltitlesize == '' || $style == 'style6' && $blgcrsltitlesize == '' || $style == 'style7' && $blgcrsltitlesize == '' || $style == 'style10' && $blgcrsltitlesize == '' || $style == 'style11' && $blgcrsltitlesize == ''){
					$blgcrsltitlesize = '20';
				}elseif($blgcrsltitlesize == ''){
					$blgcrsltitlesize = '24';
				}else{
					$blgcrsltitlesize = $blgcrsltitlesize;
				}
				
				// Meta color 2,3,5,6,7
				if($style == 'style2' && $blgstylemetacolor == ''){
					$blgstylemetacolor = '#ffffff';				
				}elseif($style == 'style3' && $blgstylemetacolor == ''){
					$blgstylemetacolor = '#4c4c4c';
				}elseif($style == 'style5' && $blgstylemetacolor == '' || $style == 'style6' && $blgstylemetacolor == '' || $style == 'style7' && $blgstylemetacolor == ''){
					$blgstylemetacolor = '#016797';
				}else{
					$blgstylemetacolor = $blgstylemetacolor;
				}
					
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
				
				//Animation
				if($data_animation == 'No Animation'){
						$animatedclass = 'noanimation';
					}else{
						$animatedclass = 'animated hiding';
					}
				static $c = 1;
		
				if($style == 'style1'){
					$class = 'zolo_blog_style1 zolo_blog_vertical';	
				}elseif($style == 'style2'){
					$class = 'zolo_blog_style2 zolo_blog_vertical';
				}elseif($style == 'style3'){
					$class = 'zolo_blog_style3 zolo_blog_vertical';
				}elseif($style == 'style4'){
					$class = 'zolo_blog_style4 zolo_blog_vertical';
				}elseif($style == 'style5'){
					$class = 'zolo_blog_style5 zolo_blog_horizontal';
				}elseif($style == 'style6'){
					$class = 'zolo_blog_style6 zolo_blog_horizontal';
				}elseif($style == 'style7'){
					$class = 'zolo_blog_style7 zolo_blog_horizontal';
				}elseif($style == 'style8'){
					$class = 'zolo_blog_style8 zolo_blog_vertical';
				}elseif($style == 'style_large'){
					$class = 'zolo_blog_large';
				}elseif($style == 'style_medium'){
					$class = 'zolo_blog_medium';
				}elseif($style == 'style_small'){
					$class = 'zolo_blog_small';
				}elseif($style == 'style9'){
					$class = 'zolo_blog_large zolo_blog_style9 zolo_blog_vertical';
				}elseif($style == 'style10'){
					$class = 'zolo_blog_style10';
				}elseif($style == 'style11'){
					$class = 'zolo_blog_style11';
				}elseif($style == 'style12'){
					$class = 'zolo_blog_style12';
				}elseif($style == 'style13'){
					$class = 'zolo_blog_style13';
				}elseif($style == 'style14'){
					$class = 'zolo_blog_style14 zolo_blog_vertical';
				}elseif($style == 'style15'){
					$class = 'zolo_blog_style15';
				}
				
				
				$layoutstyle_class = '';
				
				if($layoutstyle == 'fitRows'){
					$layoutstyle_class = 'layoutstyle_normal';
					$layout_class = 'grid-item';
					
					if($style == 'style9'){
						$blogstyle_thumb = 'writepress_thumb_blog_medium';
					}else{
						$blogstyle_thumb = 'writepress_blogstyle_thumb';
					}
				}else if($layoutstyle == 'masonry'){
					$layoutstyle_class = 'shortcode_blog_layout_masonry';
					$layout_class = 'masonry-item';
					$blogstyle_thumb = 'full';
					
				}else{
					$layoutstyle_class = 'default_layout';
					$layout_class = 'element-item';
					$blogstyle_thumb = '';
					
					}
		
		?>
		<?php
				
				if($blog_navigation == 'loadmore_nav'){		
					$items_on_start = $num; 
					$items_per_click = $blog_click;
					$view_type = $layoutstyle;    
					$category = $category;
						
					?>
		<script>
			jQuery.noConflict();
			var j$ = jQuery;
			"use strict";
			j$(document).ready(function(){
			
			var html_template = "<?php echo esc_js($view_type); ?>";
			var cat = "<?php echo esc_js($category); ?>";
			var now_open_works = 0;
			var first_load = true;
			var style = "<?php echo esc_js($style); ?>";
			var blgcrslcolprw = "<?php echo esc_js($blgcrslcolprw); ?>";
			var blgcrslcolprw15 = "<?php echo esc_js($blgcrslcolprw15); ?>";
			var blgshowfilter = "<?php echo $blgshowfilter; ?>";
			var blgcrslcolbg = "<?php echo esc_js($blgcrslcolbg); ?>";
			var blgcrslcolbordep = "<?php echo esc_js($blgcrslcolbordep); ?>";
			var blgcrslcolradi = "<?php echo esc_js($blgcrslcolradi); ?>";
			var blgcrslcolpad = "<?php echo $blgcrslcolpad; ?>";
			var blgcrsltitlesize = "<?php echo esc_js($blgcrsltitlesize); ?>";
			var blgcrsltitlecolor = "<?php echo esc_js($blgcrsltitlecolor); ?>";
			var blgstylemetacolor = "<?php echo esc_js($blgstylemetacolor); ?>";
			var blgstylehovercolor = "<?php echo esc_js($blgstylehovercolor); ?>";
			var blgcrslzoomicon = "<?php echo esc_js($blgcrslzoomicon); ?>";
			var blgcrsllinkicon = "<?php echo esc_js($blgcrsllinkicon); ?>";
			var layout_class = "<?php echo esc_js($layout_class); ?>";
			var layoutstyle_class = "<?php echo esc_js($layoutstyle_class); ?>";
			var blogstyle_thumb = "<?php echo esc_js($blogstyle_thumb); ?>";
			var posttitleposition = "<?php echo esc_js($posttitleposition); ?>";
			var posttitlealignment = "<?php echo esc_js($posttitlealignment); ?>";
			var posttitleseparatorshowhide = "<?php echo esc_js($posttitleseparatorshowhide); ?>";
			var titleseparatorimg = "<?php echo esc_js($titleseparatorimg); ?>";
			var categoryposition = "<?php echo esc_js($categoryposition); ?>";
			var categorydesign = "<?php echo esc_js($categorydesign); ?>";
			var categorydesignimg = "<?php echo esc_js($categorydesignimg); ?>";
			var continuereadingshowhide = "<?php echo esc_js($continuereadingshowhide); ?>";
			var continuereadingmodify = "<?php echo esc_js($continuereadingmodify); ?>";
			var socialsharingshowhide = "<?php echo esc_js($socialsharingshowhide); ?>";
			var postdesign = "<?php echo esc_js($postdesign); ?>";
			var postseparatorshowhide = "<?php echo esc_js($postseparatorshowhide); ?>";
			var postseparatorimage = "<?php echo esc_js($postseparatorimage); ?>";
			var titletoppadding = "<?php echo esc_js($titletoppadding); ?>";
			var titlebottompadding = "<?php echo esc_js($titlebottompadding); ?>";
			var postmetashowhide = "<?php echo esc_js($postmetashowhide); ?>";
			var postcontentcolor = "<?php echo esc_js($postcontentcolor); ?>";
			var excerptlength = "<?php echo esc_js($excerptlength); ?>";
			var postdesign2 = "<?php echo esc_js($postdesign2); ?>";
			var postmetashowhide2 = "<?php echo esc_js($postmetashowhide2); ?>";
			var category_topmargin = "<?php echo esc_js($category_topmargin); ?>";
			var fullheightpost = "<?php echo esc_js($fullheightpost); ?>";
			var postcaptionwidth = "<?php echo esc_js($postcaptionwidth); ?>";
			var postcaptionimg = "<?php echo esc_js($postcaptionimg); ?>";
			
			function get_blog_posts () {
			
				if (first_load == true) {		
					works_per_load = <?php echo esc_js($items_on_start); ?>;
					first_load = false;		
				} else {		
					works_per_load = <?php echo esc_js($items_per_click); ?>;		
				}
			
				j$.ajax({
				
				type: "POST",
				url: zt_post.ajaxurl,
				data: "html_template="+html_template+"&style="+style+"&layout_class="+layout_class+"&layoutstyle_class="+layoutstyle_class+"&blogstyle_thumb="+blogstyle_thumb+"&now_open_works="+now_open_works+"&action=get_blog_posts"+"&works_per_load="+works_per_load+"&first_load="+first_load+"&category="+cat+"&blgcrslcolprw="+blgcrslcolprw+"&blgcrslcolprw15="+blgcrslcolprw15+"&blgcrslcolbg="+blgcrslcolbg+"&blgcrslcolbordep="+blgcrslcolbordep+"&blgcrslcolradi="+blgcrslcolradi+"&blgcrslcolpad="+blgcrslcolpad+"&blgcrsltitlesize="+blgcrsltitlesize+"&blgcrsltitlecolor="+blgcrsltitlecolor+"&blgstylemetacolor="+blgstylemetacolor+"&blgstylehovercolor="+blgstylehovercolor+"&blgcrslzoomicon="+blgcrslzoomicon+"&blgcrsllinkicon="+blgcrsllinkicon+"&blgshowfilter="+blgshowfilter+"&posttitleposition="+posttitleposition+"&posttitlealignment="+posttitlealignment+"&posttitleseparatorshowhide="+posttitleseparatorshowhide+"&titleseparatorimg="+titleseparatorimg+"&categoryposition="+categoryposition+"&categorydesign="+categorydesign+"&categorydesignimg="+categorydesignimg+"&continuereadingshowhide="+continuereadingshowhide+"&continuereadingmodify="+continuereadingmodify+"&socialsharingshowhide="+socialsharingshowhide+"&postdesign="+postdesign+"&postseparatorshowhide="+postseparatorshowhide+"&postseparatorimage="+postseparatorimage+"&titletoppadding="+titletoppadding+"&titlebottompadding="+titlebottompadding+"&postmetashowhide="+postmetashowhide+"&postcontentcolor="+postcontentcolor+"&excerptlength="+excerptlength+"&postdesign2="+postdesign2+"&postmetashowhide2="+postmetashowhide2+"&category_topmargin="+category_topmargin+"&fullheightpost="+fullheightpost+"&postcaptionwidth="+postcaptionwidth+"&postcaptionimg="+postcaptionimg+"",
				success: function(result){
				//alert(result);
				if(result.length<1){
				j$(".blog_load_more_cont").hide("fast");
				}
				
				now_open_works = now_open_works + works_per_load;
				first_load = false;
				//alert(result);
				var $newItems = j$(result);
				
				var $container = j$(".site-content.<?php echo $id.$layoutstyle_class; ?>");
				
				
				setTimeout(function(i) {
				$container.imagesLoaded( function() {
					
				// init Isotope
				$container.isotope( 'insert', $newItems, function() {
					j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").ready(function(){
						j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").isotope('layout');		
					});
					
					
					j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").isotope('layout');
					
					j$(window).trigger('resize');
					
						})
				});
				
				  },3000);		
					}   		
				});	
			}
			
				j$(".get_blog_posts_btn").click(function(){
					get_blog_posts();						
					j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").isotope('layout');
					return false;
				});
			
			
			/* load at start */	
				j$(window).load(function(){
					get_blog_posts();
					var $container = j$(".site-content.<?php echo $id.$layoutstyle_class; ?>");	
					var $grid = $container.imagesLoaded( function() {
							// init Isotope
							$container.isotope({
		
							// options
								itemSelector : '<?php echo '.'.$layout_class;?>',
								layoutMode : '<?php echo $layoutstyle; ?>'
							})
						});
						// filter functions
						  var filterFns = {
							// show if number is greater than 50
							numberGreaterThan50: function() {
							  var number = j$(this).find('.number').text();
							  return parseInt( number, 10 ) > 50;
							},
							// show if name ends with -ium
							ium: function() {
							  var name = j$(this).find('.name').text();
							  return name.match( /ium$/ );
							}
						  };
						  // bind filter button click
						  j$('.postfilter-<?php echo $id; ?>').on( 'click', 'button', function() {
							var filterValue = j$( this ).attr('data-filter');
							// use filterFn if matches value
							filterValue = filterFns[ filterValue ] || filterValue;
							$grid.isotope({ filter: filterValue });
						  });
						  // change is-checked class on buttons
						  j$('.button-group').each( function( i, buttonGroup ) {
							var $buttonGroup = j$( buttonGroup );
							$buttonGroup.on( 'click', 'button', function() {
							  $buttonGroup.find('.is-checked').removeClass('is-checked');
							  j$( this ).addClass('is-checked');
							});
						  });				
					});
			
			});
		</script>
		<?php	}else{	?>
		<script type="text/javascript" charset="utf-8">
			jQuery.noConflict();
			var j$ = jQuery;
			"use strict";
			j$(window).load(function() {
			var $container = j$(".site-content.<?php echo $id.$layoutstyle_class; ?>");	
			var $grid = $container.imagesLoaded( function() {
					// init Isotope
					$container.isotope({
					// options
						itemSelector : '<?php echo '.'.$layout_class;?>',
						layoutMode : '<?php echo $layoutstyle; ?>'
					})
				});
				// filter functions
				  var filterFns = {
					// show if number is greater than 50
					numberGreaterThan50: function() {
					  var number = j$(this).find('.number').text();
					  return parseInt( number, 10 ) > 50;
					},
					// show if name ends with -ium
					ium: function() {
					  var name = j$(this).find('.name').text();
					  return name.match( /ium$/ );
					}
				  };
				  // bind filter button click
				  j$('.postfilter-<?php echo $id; ?>').on( 'click', 'button', function() {
					var filterValue = j$( this ).attr('data-filter');
					// use filterFn if matches value
					filterValue = filterFns[ filterValue ] || filterValue;
					$grid.isotope({ filter: filterValue });
				  });
				  // change is-checked class on buttons
				  j$('.button-group').each( function( i, buttonGroup ) {
					var $buttonGroup = j$( buttonGroup );
					$buttonGroup.on( 'click', 'button', function() {
					  $buttonGroup.find('.is-checked').removeClass('is-checked');
					  j$( this ).addClass('is-checked');
					});
				  });				
			});
		</script>
		<?php	}
		
				global $post;
				$blgcrslcolpad = explode(",",$blgcrslcolpad);
				
				if ( get_query_var('paged') ) { 
					$paged = get_query_var('paged'); 
					}elseif ( get_query_var('page') ) { 
						$paged = get_query_var('page'); 
						}else{ 
							$paged = 1; 
							}
				
				if ($category!=="all" && $category!=="") {
					query_posts( 'category_name='.$category.'&post_type=post&ignore_sticky_posts=1&posts_per_page='.$num.'&paged='. $paged .'&post_status=publish');
				}else{
					query_posts( 'post_type=post&ignore_sticky_posts=1&&posts_per_page='.$num.'&paged='. $paged .'&post_status=publish');
				}
				
				
				if($style == 'style_large' || $style == 'style_medium' || $style == 'style_small' || $style == 'style9'){ 
					$postdesign = 'blog_layout_'.$postdesign;
				}
				if($style == 'style10' || $style == 'style11'){ 
					$postdesign2 = 'blog_layout_'.$postdesign2;
				}
		?>
		
		<!--Blog Row Start-->
		
		<div class="zolo_blog_area <?php echo ' zoloblogstyle'.$c.' '.$class.' '.$postdesign;?> ">
		<?php
			if($blgshowfilter == 1){
			echo '<div class="filter_button_area filter_button_align-'.$filter_button_align.'">';
				echo isotope_categories($id);
			echo '</div>';
			}
			
			//$default = array('body_font_size' => '60px',);
		
		?>
		<?php 
			if($style == 'style_large' || $style == 'style_medium' || $style == 'style_small'){?>
		<div class="zolo_blog_row">
		  <?php }else{?>
		  <div class="zolo_blog_row" style="margin:0px -<?php echo $blgcrslcolpad[1]; ?>px 0 -<?php echo $blgcrslcolpad[3]; ?>px;">
			<?php } ?>
			<?php 
			if($style == 'style5' || $style == 'style6' || $style == 'style7'){
					$site_wrapper = 'site-content '.$id.$layoutstyle_class;
				}else{
					$site_wrapper = 'site-content '.$id.$layoutstyle_class;
					}
			?>
			<div class="zolo_row <?php echo $site_wrapper;?>">
			  <?php if($blog_navigation != 'loadmore_nav'){?>
			  <?php
				$i = 1;
				while (have_posts()) : the_post(); ?>
			  <?php  
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
					?>
			  <?php if($blgshowfilter == 1){$filterclasselector = strtolower($tax);}else{$filterclasselector='';} ?>
			  <?php 
			  if( $i % 4 == 0 )
				$class = 'last';
				else
				$class = '';  ?>
			  <?php 
			if($style == 'style1' || $style == 'style2' || $style == 'style3' || $style == 'style4'){?>
			  
			  <!--Blog Box Area Start-->
			  
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class;?> <?php echo $animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]; ?>px <?php echo $blgcrslcolpad[1]; ?>px <?php echo $blgcrslcolpad[2]; ?>px <?php echo $blgcrslcolpad[3]; ?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
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
					<img src="<?php echo esc_url($thumb_url);?>" alt="writepress"/> <span class="overlay"></span> 
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
			  <div class="zolo_blog_col zolo_blog_col2 <?php echo $class.' '.$layout_class.' '.$filterclasselector;?> <?php echo $animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0];?>px <?php echo $blgcrslcolpad[1];?>px <?php echo $blgcrslcolpad[2];?>px <?php echo $blgcrslcolpad[3];?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
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
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $class.' '.$layout_class.' '.$filterclasselector;?> <?php echo $animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0];?>px <?php echo $blgcrslcolpad[1];?>px <?php echo $blgcrslcolpad[2];?>px <?php echo $blgcrslcolpad[3];?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
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
					<div class="zolo_blog_detail" style="border-color:<?php echo $blgcrslcolbordep;?>;"><a href="<?php the_permalink(); ?>">
					  <h2 class="zolo_blog_title" style="color:<?php echo $blgcrsltitlecolor;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;">
						<?php the_title(); ?>
					  </h2>
					  </a> <span class="zolo_blog_meta" style="color:<?php echo $blgcrsltitlecolor;?>;"> <span style="color:<?php echo $blgcrsltitlecolor;?>;">
					  <?php the_time('j M Y') ?>
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
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$animatedclass;?>" style="padding:0px 15px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
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
			  <div class="zolo_blog_col zolo_blog_col1 <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$animatedclass;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
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
					  
					  <?php //thumb image code start
					   if($format_audio != 1){?>
						<?php if( writepress_number_of_featured_images() > 0 || $post_video ){?>
						
						<div class="zolo_blog_thumb">
						<?php //zolo_zilla_likes
						if( function_exists('zolo_zilla_likes') ){ 
							echo '<span class="zolo_zilla_likes_box"> ';
							zolo_zilla_likes();
							echo '</span>';
						}
						?>
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
						</div>
						<?php }else{?>
									<?php if($style == 'style_medium' || $style == 'style_small'){?>
										<div class="zolo_blog_thumb">
											<?php //zolo_zilla_likes
											if( function_exists('zolo_zilla_likes') ){ 
											echo '<span class="zolo_zilla_likes_box"> ';
											zolo_zilla_likes();
											echo '</span>';
											} ?>
											
										<?php echo '<div class="post_flexslider"><ul class="slides"><li class="slide">'.$default_image.'</li></ul></div>'; ?>
										
										</div>
									<?php }
								}?>
					  
					  
					  
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
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$postdesign2.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php echo $blgcrslcolpad[2]?>px <?php echo $blgcrslcolpad[3]?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
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
				}else{$postseparator = '';}
				?>
			  <div class="zolo_blog_col zolo_blog_col1 <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$postdesign2.' '.$postseparator.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php if($postseparatorshowhide != 'show'){echo $blgcrslcolpad[2];}else{echo '0';}?>px <?php echo $blgcrslcolpad[3]?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
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
				}else{$postseparator = '';}
				?>
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$postdesign2.' '.$postseparator.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php if($postseparatorshowhide != 'show'){echo $blgcrslcolpad[2];}else{echo '0';}?>px <?php echo $blgcrslcolpad[3]?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
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
						
						<?php if( writepress_number_of_featured_images() > 0 || $post_video ){?>
						<div class="post_flexslider">
						<?php //zolo_zilla_likes
						if( function_exists('zolo_zilla_likes') ){ 
							echo '<span class="zolo_zilla_likes_box"> ';
							zolo_zilla_likes();
							echo '</span>';
						}
						?>
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
						<?php }?>
					  </div>
					  <div class="post_content_area">
					  <?php if( writepress_number_of_featured_images() > 0 || $post_video ){?>
						<div class="post_content_box" style="margin-top:-10%">
						<?php }else{?>
						<div class="post_content_box">
						<?php }?>
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
				  
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;background:#333333 url('<?php echo $attachment_image[0]; ?>') no-repeat center center; -moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover; font-size:18px; line-height:26px;"> 
				  
					<?php //zolo_zilla_likes
						if( function_exists('zolo_zilla_likes') ){ 
							echo '<span class="zolo_zilla_likes_box"> ';
							zolo_zilla_likes();
							echo '</span>';
						}
						?>
						<a href="<?php the_permalink(); ?>">
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
			  <div class="zolo_blog_col zolo_blog_col1 <?php echo $layout_class.' '.$filterclasselector.' '.$animatedclass;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
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
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw15;?> <?php echo $layout_class.' '.$filterclasselector.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php echo $blgcrslcolpad[2]?>px <?php echo $blgcrslcolpad[3]?>px" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
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
							<?php //zolo_zilla_likes
								if( function_exists('zolo_zilla_likes') ){ 
									echo '<span class="zolo_zilla_likes_box"> ';
										zolo_zilla_likes();
									echo '</span>';
								}?>
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
			  <?php $i++; endwhile; 
			}
			?>
			</div>
		  </div>
		  <!-- .navigation -->
		  
		  <?php 
				if($blog_navigation != 'none'){
					if($blog_navigation == 'classic_nav'){ 
						writepress_pagination(); 
					}elseif($blog_navigation == 'default'){
						writepress_paging_nav();
					}elseif($blog_navigation == 'loadmore_nav'){
							echo '<div class="blog_load_more_cont"><a class="btn_load_more get_blog_posts_btn" href="#">'.__('Еще','writepress-core').' </a></div>'; 
						} 
					}?>
		  
		  <!-- .navigation END --> 
		</div>
		<style>
		<?php echo '.zolo_blog_style14.zoloblogstyle'.$c;?> .zolo_blog_box{ padding:<?php if($fullheightpost != 'fullheightpost'){echo $posttoppadding;}?>px 0 <?php if($fullheightpost != 'fullheightpost'){echo $postbottompadding;}?>px 0;}
		
		<?php echo '.zolo_blog_style11.zoloblogstyle'.$c;?> .blog_layout_none .format-quote .zolo_blogcontent .zolo_blog_box,
		<?php echo '.zolo_blog_style10.zoloblogstyle'.$c;?> .blog_layout_none .format-quote .zolo_blogcontent .zolo_blog_box,
		<?php echo '.zolo_blog_style11.zoloblogstyle'.$c;?> .zolo_blogcontent .zolo_blog_box,
		<?php echo '.zolo_blog_style10.zoloblogstyle'.$c;?> .zolo_blogcontent .zolo_blog_box{ padding:<?php echo $blgcrslcolinnerpad;?>px;}
		
		<?php echo '.zolo_blog_style11.zoloblogstyle'.$c;?> .blog_layout_none .zolo_blogcontent .zolo_blog_box,
		<?php echo '.zolo_blog_style10.zoloblogstyle'.$c;?> .blog_layout_none .zolo_blogcontent .zolo_blog_box{ padding:0;}
		
		<?php echo '.zoloblogstyle'.$c;?>.blog_layout_box_withoutpadding .zolo_blogcontent,
		<?php echo '.zoloblogstyle'.$c;?>.blog_layout_box .zolo_blogcontent{background:<?php echo $boxbackgroundcolor;?>;box-shadow: 0 0 2px <?php echo $boxbordercolor;?>;}
		<?php echo '.zoloblogstyle'.$c;?>.blog_layout_box_withoutpadding .zolo_blogcontent:hover,
		<?php echo '.zoloblogstyle'.$c;?>.blog_layout_box .zolo_blogcontent:hover{box-shadow: 0 0 7px <?php echo $boxbordercolor;?>;}
		
		<?php echo '.zolo_blog_style11.zoloblogstyle'.$c;?> .blog_layout_box_withseparator .zolo_blogcontent,
		<?php echo '.zolo_blog_style10.zoloblogstyle'.$c;?> .blog_layout_box_withseparator .zolo_blogcontent,
		<?php echo '.zolo_blog_style11.zoloblogstyle'.$c;?> .blog_layout_box .zolo_blogcontent,
		<?php echo '.zolo_blog_style10.zoloblogstyle'.$c;?> .blog_layout_box .zolo_blogcontent{background:<?php echo $boxbackgroundcolor2;?>;box-shadow: 0 0 2px <?php echo $boxbordercolor2;?>;}
		
		<?php echo '.zolo_blog_style11.zoloblogstyle'.$c;?> .blog_layout_box_withseparator .zolo_blogcontent:hover,
		<?php echo '.zolo_blog_style10.zoloblogstyle'.$c;?> .blog_layout_box_withseparator .zolo_blogcontent:hover,
		<?php echo '.zolo_blog_style11.zoloblogstyle'.$c;?> .blog_layout_box .zolo_blogcontent:hover,
		<?php echo '.zolo_blog_style10.zoloblogstyle'.$c;?> .blog_layout_box .zolo_blogcontent:hover{box-shadow: 0 0 7px <?php echo $boxbordercolor2;?>;}
		
		<?php echo '.zolo_blog_style15.zoloblogstyle'.$c;?> .post_content_wrapper:after{ border-color:<?php echo $boxbackgroundcolor3;?>;}
		<?php echo '.zolo_blog_style15.zoloblogstyle'.$c;?> .zolo_blogcontent,
		<?php echo '.zolo_blog_style13.zoloblogstyle'.$c;?> .zolo_blogcontent,
		<?php echo '.zolo_blog_style12.zoloblogstyle'.$c;?> .zolo_blogcontent{background:<?php echo $boxbackgroundcolor3;?>;box-shadow: 0 0 2px <?php echo $boxbordercolor3;?>;}
		<?php echo '.zolo_blog_style15.zoloblogstyle'.$c;?> .zolo_blogcontent:hover,
		<?php echo '.zolo_blog_style13.zoloblogstyle'.$c;?> .zolo_blogcontent:hover,
		<?php echo '.zolo_blog_style12.zoloblogstyle'.$c;?> .zolo_blogcontent:hover{box-shadow: 0 0 7px <?php echo $boxbordercolor3;?>;}
		<?php echo '.zolo_blog_style13.zoloblogstyle'.$c;?> .blog_entry_footer,
		<?php echo '.zolo_blog_style12.zoloblogstyle'.$c;?> .blog_entry_footer{ border-top:1px solid <?php echo $postmetabordercolor2;?>;}
		<?php echo '.zolo_blog_style13.zoloblogstyle'.$c;?> .post_content_box,
		<?php echo '.zolo_blog_style12.zoloblogstyle'.$c;?> .post_content_box{background:<?php echo $boxbackgroundcolor3;?>;}
		
		
		<?php echo '.zolo_blog_style12.zoloblogstyle'.$c;?> .blog_entry_footer .share-box li a,
		<?php echo '.zolo_blog_style12.zoloblogstyle'.$c;?> ul.writepress_postmeta li a,
		<?php echo '.zolo_blog_style12.zoloblogstyle'.$c;?> ul.writepress_postmeta li{color:<?php echo $postmetacolor2;?>;}
		<?php echo '.zolo_blog_style12.zoloblogstyle'.$c;?> .blog_entry_footer .share-box li a:hover,
		<?php echo '.zolo_blog_style12.zoloblogstyle'.$c;?> ul.writepress_postmeta li a:hover{color:<?php echo $postmetacolorhover2;?>;}
		
		
		<?php echo '.zoloblogstyle'.$c;?> .categories-links a{color:<?php echo $categoryfontcolor;?>; }
		<?php echo '.zoloblogstyle'.$c;?> .categories-links a:hover{color:<?php echo $categoryfontcolorhover;?>;}
		<?php echo '.zoloblogstyle'.$c;?> .categories-links.rounded a,
		<?php echo '.zoloblogstyle'.$c;?> .categories-links.box a{ background:<?php echo $categorybackgroundcolor;?>; border:1px solid <?php echo $categorybordercolor;?>;}
		<?php echo '.zoloblogstyle'.$c;?> .categories-links.rounded a:hover,
		<?php echo '.zoloblogstyle'.$c;?> .categories-links.box a:hover{ background:<?php echo $categorybackgroundcolorhover;?>; border:1px solid <?php echo $categorybordercolorhover;?>;}
		
		<?php echo '.zoloblogstyle'.$c;?> .read_more_area a.read-more{ color:<?php echo $buttonfontcolor;?>;background:<?php echo $buttonbackgroundcolor;?>; border:1px solid <?php echo $buttonbordercolor;?>;}
		<?php echo '.zoloblogstyle'.$c;?> .read_more_area a.read-more:hover{ color:<?php echo $buttonfontcolorhover;?>;background:<?php echo $buttonbackgroundcolorhover;?>; border:1px solid <?php echo $buttonbordercolorhover;?>;}
		
		<?php echo '.zoloblogstyle'.$c;?> .read_more_area,
		<?php echo '.zoloblogstyle'.$c;?> .share-box,
		<?php echo '.zoloblogstyle'.$c;?> .post_title_area{text-align:<?php echo $posttitlealignment; ?>;}
		
		<?php echo '.zoloblogstyle'.$c;?> .share-box li a{color:<?php echo $socialiconcolor;?>;background:<?php echo $socialiconbackgroundcolor;?>; border:1px solid <?php echo $socialiconbordercolor;?>;
		-moz-border-radius:<?php echo $socialiconborderradius;?>px;
		-webkit-border-radius:<?php echo $socialiconborderradius;?>px;
		-ms-border-radius:<?php echo $socialiconborderradius;?>px;
		-o-border-radius:<?php echo $socialiconborderradius;?>px;
		border-radius:<?php echo $socialiconborderradius;?>px;}
		<?php echo '.zoloblogstyle'.$c;?> .share-box li a:hover{color:<?php echo $socialiconcolorhover;?>;background:<?php echo $socialiconbackgroundcolorhover;?>; border:1px solid <?php echo $socialiconbordercolorhover;?>;}
		
		<?php echo '.zoloblogstyle'.$c;?> .share-box h4,
		<?php echo '.zoloblogstyle'.$c;?> .post_title_area h2,
		<?php echo '.zoloblogstyle'.$c;?> .post_title_area h2 a{ color:<?php echo $blgcrsltitlecolor;?>; }
		<?php echo '.zoloblogstyle'.$c;?> .post_title_area h2{font-size:<?php echo $blgcrsltitlesize;?>px;padding-top:<?php echo $titletoppadding;?>px; padding-bottom:<?php echo $titlebottompadding;?>px;}
		
		<?php echo '.zolo_blog_style13.zoloblogstyle'.$c;?> .blog_entry_footer,
		<?php echo '.zolo_blog_style13.zoloblogstyle'.$c;?> .blog_entry_footer .share-box li a,
		<?php echo '.zoloblogstyle'.$c;?> ul.writepress_postmeta li a,
		<?php echo '.zoloblogstyle'.$c;?> ul.writepress_postmeta li,
		<?php echo '.zoloblogstyle'.$c;?> ul.entry_meta_list li a,
		<?php echo '.zoloblogstyle'.$c;?> ul.entry_meta_list li{ color:<?php echo $postmetacolor;?>;}
		
		<?php echo '.zolo_blog_style13.zoloblogstyle'.$c;?> .blog_entry_footer .share-box li a:hover,
		<?php echo '.zoloblogstyle'.$c;?> ul.writepress_postmeta li a:hover,
		<?php echo '.zoloblogstyle'.$c;?> ul.entry_meta_list li a:hover{ color:<?php echo $postmetacolorhover;?>;}
		
		
		.zolo_blog_vertical<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_box .overlay{background:<?php echo $blgcrslimgoverlay;?>; opacity:<?php echo $blgstyleoverlayopac; ?>;}
		
		.zolo_blog_vertical<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_box:hover .overlay{background:<?php echo $blgcrslhovercolor;?>; opacity:<?php echo $blgcrslhoveropac; ?>;}
		
		.zolo_blog_vertical<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_box .zolo_blog_icons .zolo_blog_icon{background:<?php echo $blgcrslbuttonbg; ?>;}
		
		.zolo_blog_vertical<?php echo '.zoloblogstyle'.$c;?>  .zolo_blog_box .zolo_blog_icons .zolo_blog_icon:hover{background:<?php echo $blgcrslbuttonhovbg; ?>;}
		
		.zolo_blog_style8<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_box:hover .zolo_blog_title{ color:<?php echo $blgstylehovercolor;?>!important;}
		
		.zolo_blog_style8<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_box .zolo_blog_thumb img,
		.zolo_blog_style3<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_box .zolo_blog_thumb .overlay,
		.zolo_blog_style3<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_box .zolo_blog_thumb img,
		.zolo_blog_style2<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_box .zolo_blog_thumb .overlay,
		.zolo_blog_style2<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_box .zolo_blog_thumb img,
		.zolo_blog_style1<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_box .zolo_blog_thumb .overlay,
		.zolo_blog_style1<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_box .zolo_blog_thumb img{ border-top-left-radius:<?php echo $blgcrslcolradi; ?>px;border-top-right-radius:<?php echo $blgcrslcolradi; ?>px;}
		
		.zolo_blog_style4<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_box .zolo_blog_thumb .overlay,
		.zolo_blog_style4<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_box .zolo_blog_thumb img{ border-radius:<?php echo $blgcrslcolradi; ?>px;}
		
		.zolo_blog_style7<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_meta .zilla-likes:hover,
		.zolo_blog_style7<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_meta .zilla-likes.active,
		.zolo_blog_style7<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_meta a.zilla-likes,
		.zolo_blog_style6<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_meta .zilla-likes:hover,
		.zolo_blog_style6<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_meta .zilla-likes.active,
		.zolo_blog_style6<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_meta a.zilla-likes,
		.zolo_blog_style5<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_meta .zilla-likes:hover,
		.zolo_blog_style5<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_meta .zilla-likes.active,
		.zolo_blog_style5<?php echo '.zoloblogstyle'.$c;?> .zolo_blog_meta a.zilla-likes{color:<?php echo $blgstylemetacolor;?>;}
		
		<?php echo '.zoloblogstyle'.$c;?> .blog_load_more_cont a.btn_load_more{background:<?php echo $button_bg; ?>;  color:<?php echo $button_title; ?>;border:1px solid <?php echo $button_border; ?>;}
		<?php echo '.zoloblogstyle'.$c;?> .blog_load_more_cont a.btn_load_more:hover{ background:<?php echo $button_hover_bg; ?>; color:<?php echo $button_hover_title; ?>;border:1px solid <?php echo $button_border; ?>;}
		
		<?php echo '.zoloblogstyle'.$c;?> .page-numbers li a{background:<?php echo $nav_bg; ?>!important;  color:<?php echo $nav_color; ?>!important;border:1px solid <?php echo $nav_border; ?>!important;}
		<?php echo '.zoloblogstyle'.$c;?> .page-numbers li span,
		<?php echo '.zoloblogstyle'.$c;?> .page-numbers li a:hover{background:<?php echo $nav_hover_bg; ?>!important;color:<?php echo $nav_hover_color; ?>!important;border:1px solid <?php echo $nav_border; ?>!important;}
		
		<?php echo '.zoloblogstyle'.$c;?> .blog_layout_box_withseparator .writepress_postmeta_area{ border-top:1px solid <?php echo $postmetabordercolor;?>;}
		
		<?php /*?><?php echo '.zolo_blog_style12.zoloblogstyle'.$c;?> .share-box{ text-align:center;}<?php */?>
		
		/*Filters CSS Start*/
		<?php echo '.zoloblogstyle'.$c;?> .filters-button-group{ text-align:<?php echo $filter_button_align; ?>;}
		<?php echo '.zoloblogstyle'.$c;?> .filters-button-group button.button{background:<?php echo $filter_button_bg_color; ?>;color:<?php echo $filter_button_text_color; ?>;border:1px solid <?php echo $filter_button_border_color; ?>; font-size:<?php echo $filter_fontsize;?>px; line-height:<?php echo $filter_fontsize;?>px;
		-moz-border-radius:<?php echo $filter_buttonborradi;?>px;
		-webkit-border-radius:<?php echo $filter_buttonborradi;?>px;
		-ms-border-radius:<?php echo $filter_buttonborradi;?>px;
		-o-border-radius:<?php echo $filter_buttonborradi;?>px;
		border-radius:<?php echo $filter_buttonborradi;?>px;
		}
		
		<?php echo '.zoloblogstyle'.$c;?> .filters-button-group button.button.is-checked,
		<?php echo '.zoloblogstyle'.$c;?> .filters-button-group button.button:hover{background:<?php echo $filter_button_bg_hover_color; ?>;color:<?php echo $filter_button_text_hover_color; ?>;border:1px solid <?php echo $filter_button_border_color; ?>; opacity:1}
		/*Filters CSS End*/
		
		@media (max-width:767px) {
		<?php echo '.zolo_blog_style15.zoloblogstyle'.$c;?> .post_content_wrapper:after{ border-bottom-color:<?php echo $boxbackgroundcolor3;?>!important;}
		}
		</style>
		<?php
			$c++;
			wp_reset_query();
			$demolp_output = ob_get_clean();
			return $demolp_output;
			}
	}
	
	$Zolo_Blog_Styles_Module = new Zolo_Blog_Styles_Module;
}
