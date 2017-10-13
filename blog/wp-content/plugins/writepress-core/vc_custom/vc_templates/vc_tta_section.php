<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $content - shortcode content
 * @var $this WPBakeryShortCode_VC_Tta_Section
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
$this->resetVariables( $atts, $content );
WPBakeryShortCode_VC_Tta_Section::$self_count ++;
WPBakeryShortCode_VC_Tta_Section::$section_info[] = $atts;
$isPageEditable = vc_is_page_editable();


$active_title_color = empty($atts['active_title_color'])?'':$atts['active_title_color'];
$active_bg_color = empty($atts['active_bg_color'])?'':$atts['active_bg_color'];
$active_border_color = empty($atts['active_border_color'])?'':$atts['active_border_color'];

$output = '';
$output .= '<div class="'.'accordion'.$atts['tab_id'] .' '. esc_attr( $this->getElementClasses() ) . '"';
$output .= ' id="' . esc_attr( $this->getTemplateVariable( 'tab_id' ) ) . '"';
$output .= ' data-vc-content=".vc_tta-panel-body">';

$output .= '<div class="vc_tta-panel-heading">';
$output .= $this->getTemplateVariable( 'heading' );
$output .= '</div>';
$output .= '<div class="vc_tta-panel-body"><div class="vc_tta-panel-body-content">';
if ( $isPageEditable ) {
	$output .= '<div data-js-panel-body>'; // fix for fe - shortcodes container, not required in b.e.
}
$output .= $this->getTemplateVariable( 'content' );
if ( $isPageEditable ) {
	$output .= '</div>';
}
$output .= '</div></div>';
$output .= '</div>';

echo $output;
?>
<style>
.vc_tta-container .vc_tta.vc_general <?php echo '.accordion'.$atts['tab_id'];?>.vc_active .vc_tta-panel-heading .vc_tta-panel-title.vc_tta-controls-icon-position-left > a:before{border-color:<?php echo $active_border_color;?>!important;}

.vc_tta-container .vc_tta.vc_general <?php echo '.accordion'.$atts['tab_id'];?>.vc_active .vc_tta-panel-heading{background:<?php echo $active_bg_color;?>!important;border-color:<?php echo $active_border_color;?>!important;}
.vc_tta-container .vc_tta.vc_general <?php echo '.accordion'.$atts['tab_id'];?>.vc_active .vc_tta-panel-heading .vc_tta-panel-title > a{color:<?php echo $active_title_color;?>!important;}
.vc_tta-container .vc_tta.vc_general <?php echo '.accordion'.$atts['tab_id'];?> .vc_tta-panel-body-content{ display:block !important;}
</style>