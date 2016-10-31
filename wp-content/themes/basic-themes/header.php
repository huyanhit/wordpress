<?php
/**
 * The theme header
 * @package basic-themes
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="format-detection" content="telephone=no">
	<!--[if lt IE 9]>
	  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php do_action('before'); ?> 
	<header id="header" role="header">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-4 col-xs-12 ">
					<?php 
						if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
							the_custom_logo();
						}else{
							print '<img src="'.THEME_URL_ASSETS.'/images/logo.png" width="300" />';
						}	
					?>
				</div>
				<div class="col-md-9 col-sm-8 col-xs-12">
					<div class="header-right">
						<?php dynamic_sidebar('header'); ?>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section id="navbar" class="navbar">
		<div class="container">
			<nav class="menu-top " role="navigation">
				<?php 
					wp_nav_menu(array(
				            'theme_location' => 'primary', 
				            'container' => false, 
		                    'menu_class'        => 'main-menu',
		                    'menu_id'           => 'main-menu')
				    );
					dynamic_sidebar('navbar'); 
				?> 
			</nav>
		</div>
	</section>
