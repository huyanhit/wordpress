<?php
/**
 * Template Filter Functions
 * 
 * @package basic-themes
 */
add_filter( 'wp_get_attachment_image_attributes', function( $attr ){
    if( isset( $attr['class'] )  && 'custom-logo' === $attr['class'] )
        $attr['class'] = 'custom-logo img-responsive';
    return $attr;
});

function _remove_script_version( $src ){
    $parts = explode( '?', $src );
    return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
add_filter('widget_text', 'do_shortcode');

function login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'login_logo_url' );

function login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertitle', 'login_logo_url_title' );