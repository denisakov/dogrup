<?php 

/**
 * All the settings for the Wordpress theme customizer
 * 
 * @package awesome
 */


function themetacular_customizer_settings( $wp_customize ) {

/**************************************
*   Header Background Colour
***************************************/

$wp_customize->add_setting( 'header_textcolor' , array(
    'default'     => '#333e49',
    'transport'   => 'refresh',
    ) );


$wp_customize->add_section( 'header_bg_section' , array(
    'title'      => __( 'Header Background Color', 'mccallister' ),
    'priority'   => 30,
    ) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor', array(
    'label'        => __( 'Header Color', 'mccallister' ),
    'section'    => 'header_bg_section',
    'settings'   => 'header_textcolor',
    ) ) );




/**************************************
*   Body Background Colour
***************************************/

$wp_customize->add_setting( 'body_background_color' , array(
    'default'     => '#FFF',
    'transport'   => 'refresh',
    ) );


$wp_customize->add_section( 'body_bg_section' , array(
    'title'      => __( 'Background Color', 'mccallister' ),
    'priority'   => 30,
    ) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_background_color', array(
    'label'        => __( 'Background Colour', 'mccallister' ),
    'section'    => 'body_bg_section',
    'settings'   => 'body_background_color',
    ) ) );



/**************************************
*   Paragraph Colour
***************************************/



$wp_customize->add_setting( 'paragraph_colour' , array(
    'default'     => '#111',
    'transport'   => 'refresh',
    ) );


$wp_customize->add_section( 'paragraph_colour_section' , array(
    'title'      => __( 'Paragraph Color', 'mccallister' ),
    'priority'   => 30,
    ) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'paragraph_colour', array(
    'label'        => __( 'Paragraph Colour', 'mccallister' ),
    'section'    => 'paragraph_colour_section',
    'settings'   => 'paragraph_colour',
    ) ) );



}

add_action( 'customize_register', 'themetacular_customizer_settings' );




/**************************************
*   Add styles to head of theme
***************************************/
function themetacular_customizer_styles()
{
    ?>
    <style type="text/css">
        body { background-color:<?php echo get_theme_mod('body_background_color'); ?>; }
        header { background-color:<?php echo "#". get_theme_mod('header_textcolor'); ?>; }
        p       { color:<?php echo get_theme_mod('paragraph_colour'); ?>; }
    </style>
    <?php
}

add_action( 'wp_head', 'themetacular_customizer_styles');

?>