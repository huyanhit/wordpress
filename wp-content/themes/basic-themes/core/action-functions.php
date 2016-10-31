<?php
/**
 * Template action functions
 * 
 * @package basic-themes
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 

if (!function_exists('themes_add_css_js')) {
    function themes_add_css_js() 
    {
        global $wp_scripts;
        wp_enqueue_script('jquery');
        /* Bootstrap Lib Css Js*/
        wp_enqueue_style('bootstrap-style', THEME_URL_ASSETS . '/css/bootstrap.min.css', array(), '3.3.7');
        wp_enqueue_style('bootstrap-theme', THEME_URL_ASSETS . '/css/bootstrap-theme.min.css', array(), '3.3.7');
        wp_enqueue_script('bootstrap-script', THEME_URL_ASSETS . '/js/vendor/bootstrap.min.js', array(), '3.3.7', true);
        /* Owl Carosel Lib */
        wp_enqueue_style('carousel-style', THEME_URL_ASSETS . '/css/owl.carousel.css', array(), '4.6.3');
        wp_enqueue_style('carousel-style', THEME_URL_ASSETS . '/css/owl.theme.css', array(), '4.6.3');
        wp_enqueue_style('carousel-style', THEME_URL_ASSETS . '/css/owl.transitions.css', array(), '4.6.3');
        wp_enqueue_script('owl-script', THEME_URL_ASSETS . '/js/vendor/owl.carousel.min.js', array(), '3.3.7', true);
        /* Font */
        wp_enqueue_style('fontawesome-style', THEME_URL_ASSETS . '/css/font-awesome.min.css', array(), '4.6.3'); 

        wp_enqueue_style('colorbox', THEME_URL_ASSETS . '/css/colorbox.css',array(),''); 
        wp_enqueue_script('colorbox-script', THEME_URL_ASSETS.'/js/vendor/colorbox-min.js', array(), false, true);
        /* Style Themes */
        wp_enqueue_style('theme-style', THEME_URL.'/style.css');
        wp_enqueue_script('theme-script', THEME_URL_ASSETS.'/js/main.js', array(), false, true);
        wp_enqueue_style('main-style', THEME_URL_ASSETS.'/css/main.css', array(), '2.0'); 
        wp_enqueue_style('reponsive', THEME_URL_ASSETS.'/css/reponsive.css', array(), '2.0'); 
        
    }
}
add_action('wp_enqueue_scripts', 'themes_add_css_js');

/**
 * Setup theme and register support wp features.
 */
if (!function_exists('theme_setup')) {
    function theme_setup() 
    {
        add_theme_support('post-thumbnails');
        add_theme_support('custom-logo');
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'basic-themes'),
            'footer' => __('Footer Menu', 'basic-themes'),
        ));
    }
}
add_action('after_setup_theme', 'theme_setup');

function admin_bar_remove() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('wp-logo');
        $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'admin_bar_remove', 0);

/**
 * Register widget areas
 */
if (!function_exists('theme_witget_init')) {
    function theme_witget_init() 
    {
        register_sidebar(array(
            'name'          => __('Sidebar left', 'basic-themes'),
            'id'            => 'sidebar-left',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));

        register_sidebar(array(
            'name'          => __('Sidebar right', 'basic-themes'),
            'id'            => 'sidebar-right',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
        register_sidebar(array(
            'name'          => __('Header', 'basic-themes'),
            'id'            => 'header',
            'before_widget' => '<div id="%1$s" class="block_header %2$s">',
            'after_widget'  => '</div>',
        ));

        register_sidebar(array(
            'name'          => __('Navbar', 'basic-themes'),
            'id'            => 'navbar',
            'before_widget' => '<div id="%1$s" class="block_menu %2$s">',
            'after_widget'  => '</div>',
        ));
        register_sidebar(array(
            'name'          => __('Footer Top', 'basic-themes'),
            'id'            => 'footer-top',
            'before_widget' => '<aside id="%1$s" class="widget %2$s ">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));

        register_sidebar(array(
            'name'          => __('Footer Bottom', 'basic-themes'),
            'id'            => 'footer-bottom',
            'before_widget' => '<aside id="%1$s" class="widget %2$s ">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
    }
}
add_action('widgets_init', 'theme_witget_init');

/* Auto add plugin in active themes */
add_action( 'tgmpa_register', 'themes_required_plugins' );
function themes_required_plugins() {
    $plugins = array(
        array(
            'name'      => 'Quick remove menu item',
            'slug'      => 'quick-remove-menu-item',
            'required'  => false,
        ),
        array(
            'name'      => 'Post Clone',
            'slug'      => 'duplicate-post',
            'required'  => false,
        ),
        array(
            'name'      => 'Wordpress Importer',
            'slug'      => 'wordpress-importer',
            'required'  => false,
        ),
        array(
            'name'      => 'Custom Post Type',
            'slug'      => 'custom-post-type-ui',
            'required'  => false,
        ), 
    );
    $config = array(
        'id'           => 'tgmpa',  
        'default_path' => '',    
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',           
        'capability'   => 'edit_theme_options',    
        'has_notices'  => true,              
        'dismissable'  => true,         
        'dismiss_msg'  => '',           
        'is_automatic' => false,         
        'message'      => '',  
    );
    tgmpa( $plugins, $config );
}



/*function login_stylesheet() {
    wp_enqueue_style( 'custom-login',THEME_URL.'/assets/css/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'login_stylesheet' );*/


