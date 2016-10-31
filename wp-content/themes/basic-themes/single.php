<?php
/**
 * Template for displaying single post (read full post page).
 * 
 * @package base-themes
 */
get_header();

?> 
<section id="main-container" class="main-container">
	<div class="container">
		<div class="row">
			<?php get_sidebar('left'); ?> 
				<div id="main-column" class="<?php the_main_col(); ?>" >
					<?php 
						while (have_posts()) {
							the_post();
							get_template_part('templates/content', 'single');
						} 
					?> 
				</div>
			<?php get_sidebar('right'); ?> 
		</div>
	</div>
</section>

<?php get_footer(); ?> 
