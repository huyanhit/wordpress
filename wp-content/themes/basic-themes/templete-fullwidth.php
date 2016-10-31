<?php
/**
 * Template Name: Page Full Width
 * @package basic-themes
 */
	get_header();
?> 
<section id="main-container" class="main-container">
	<?php get_sidebar('left'); ?> 
		<div id="main-column" class="<?php the_main_col(); ?>" >
			<?php 
				if (have_posts()) {
					while (have_posts()) {
						the_post();
						get_template_part('templates/content','page');
					}
				}else { 
					get_template_part('no-results', 'index');
				}  
			?> 
		</div>
	<?php get_sidebar('right'); ?> 
</section>
<?php get_footer(); ?> 