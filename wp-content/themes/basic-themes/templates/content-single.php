<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-header">
		<h1 class="post-title"><?php the_title(); ?></h1>
		<div class="post-meta">
			<?php //GetPostOn(); ?> 
		</div>
	</div>
	<div class="post-content">
		<?php the_content(); ?> 
	</div>
</article>