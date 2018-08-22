<?php if ( ! defined( 'ABSPATH' ) ) {
    die;
} // Cannot access pages directly.

/**
 *
 * Field: Sorter
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_Sorter extends CSFramework_Options {

    public function __construct( $field, $value = '', $unique = '' ) {
        parent::__construct( $field, $value, $unique );
    }

    public function output() {

        echo wp_kses_post( $this->element_before() );

        $value          = $this->element_value();
        $value          = ( ! empty( $value ) ) ? $value : $this->field['default'];
        $enabled        = ( ! empty( $value['enabled'] ) ) ? $value['enabled'] : array();
        $disabled       = ( ! empty( $value['disabled'] ) ) ? $value['disabled'] : array();
        $enabled_title  = ( isset( $this->field['enabled_title'] ) ) ? $this->field['enabled_title'] : esc_html__( 'Enabled Modules', 'cs-framework' );
        $disabled_title = ( isset( $this->field['disabled_title'] ) ) ? $this->field['disabled_title'] : esc_html__( 'Disabled Modules', 'cs-framework' );

        echo '<div class="cs-modules">';
        echo '<h3>' . wp_kses_post( $enabled_title ) . '</h3>';
        echo '<ul class="cs-enabled">';
        if ( ! empty( $enabled ) ) {
            foreach ( $enabled as $en_id => $en_name ) {
                echo '<li><input type="hidden" name="' . esc_attr( $this->element_name( '[enabled][' . $en_id . ']' ) ) . '" value="' . esc_attr( $en_name ) . '"/><label>' . wp_kses_post( $en_name ) . '</label></li>';
            }
        }
        echo '</ul>';
        echo '</div>';

        echo '<div class="cs-modules">';
        echo '<h3>' . wp_kses_post( $disabled_title ) . '</h3>';
        echo '<ul class="cs-disabled">';
        if ( ! empty( $disabled ) ) {
            foreach ( $disabled as $dis_id => $dis_name ) {
                echo '<li><input type="hidden" name="' . esc_attr( $this->element_name( '[disabled][' . $dis_id . ']' ) ) . '" value="' . esc_attr( $dis_name ) . '"/><label>' . wp_kses_post( $dis_name ) . '</label></li>';
            }
        }
        echo '</ul>';
        echo '</div>';
        echo '<div class="clear"></div>';

        echo wp_kses_post( $this->element_after() );

    }

}
