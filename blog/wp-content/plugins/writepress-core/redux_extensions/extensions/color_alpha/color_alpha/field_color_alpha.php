<?php
/**
 * Redux Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Redux Framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Redux Framework. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     ReduxFramework
 * @author      Dovy Paukstys
 * @version     3.1.5
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if( !class_exists( 'ReduxFramework_color_alpha' ) ) {

    /**
     * Main ReduxFramework_color_alpha class
     *
     * @since       1.0.0
     */
    class ReduxFramework_color_alpha extends ReduxFramework {
    
        /**
         * Field Constructor.
         *
         * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        function __construct( $field = array(), $value ='', $parent ) {
        
            
            $this->parent = $parent;
            $this->field = $field;
            $this->value = $value;
        }

        /**
         * Field Render Function.
         *
         * Takes the vars and outputs the HTML for the field in the settings
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        public function render() {

			echo '<div class="picker-wrap-cover">';
            echo '<input data-id="' . $this->field['id'] . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '" id="' . $this->field['id'] . '-color" class="redux-color redux-color-init ' . $this->field['class'] . ' color-alpha-picker" data-alpha="true"   type="text" value="' . $this->value . '" data-oldcolor=""  data-default-color="' . ( isset( $this->field['default'] ) ? $this->field['default'] : "" ) . '" />';
            echo '<input type="hidden" class="redux-saved-color" id="' . $this->field['id'] . '-saved-color' . '" value="">';

            if ( ! isset( $this->field['transparent'] ) || $this->field['transparent'] !== false ) {

                $tChecked = "";

                if ( $this->value == "transparent" ) {
                    $tChecked = ' checked="checked"';
                }

                echo '<label for="' . $this->field['id'] . '-transparency" class="color-transparency-check"><input type="checkbox" class="checkbox color-transparency ' . $this->field['class'] . '" id="' . $this->field['id'] . '-transparency" data-id="' . $this->field['id'] . '-color" value="1"' . $tChecked . '> ' . __( 'Transparent', 'redux-framework' ) . '</label>';
            }
			echo '</div>';
        }
    
        /**
         * Enqueue Function.
         *
         * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        public function enqueue() {
            if ($this->parent->args['dev_mode']) {
                wp_enqueue_style( 'redux-color-picker-css' );
            }
            
            //wp_enqueue_style( 'wp-color-picker' );
            
            wp_enqueue_script(
                'redux-field-color-alpha-js',
                trailingslashit( WRITEPRESS_EXTENSIONS_PLUGIN_URL ) . '/redux_extensions/extensions/color_alpha/color_alpha/field_color_alpha' . Redux_Functions::isMin() . '.js',
                array( 'jquery', 'wp-color-picker', 'redux-js' ),
                time(),
                true
            );
        }
        
        /**
         * Output Function.
         *
         * Used to enqueue to the front-end
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */        
        public function output() {
            $style = '';

            if ( ! empty( $this->value ) ) {
                $mode = ( isset( $this->field['mode'] ) && ! empty( $this->field['mode'] ) ? $this->field['mode'] : 'color' );

                $style .= $mode . ':' . $this->value . ';';

                if ( ! empty( $this->field['output'] ) && is_array( $this->field['output'] ) ) {
                    $css = Redux_Functions::parseCSS( $this->field['output'], $style, $this->value );
                    $this->parent->outputCSS .= $css;
                }

                if ( ! empty( $this->field['compiler'] ) && is_array( $this->field['compiler'] ) ) {
                    $css = Redux_Functions::parseCSS( $this->field['compiler'], $style, $this->value );
                    $this->parent->compilerCSS .= $css;

                }
            }
        }        
        
    }
}
