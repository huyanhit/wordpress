<?php
/**
 * The theme footer
 * @package basic-themes
 */
?>
		<footer id="footer" class="footer" role="contentinfo">
			<?php if (is_active_sidebar('footer-top')): ?>
				<div id="footer-top" class="footer-top">
					<div class="container">
						<?php dynamic_sidebar('footer-top'); ?> 
					</div>
				</div>
			<?php endif; ?>

			<?php if (is_active_sidebar('footer-bottom')): ?>
				<div id="footer-bottom" class="footer-bottom">
					<div class="container">
						<?php dynamic_sidebar('footer-bottom'); ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="container">
				<div class="copyright"> &copy; <?php echo date("Y");?> Copyright <a href="<?php print get_site_url(); ?>" title="<?php print get_bloginfo('name'); ?>"><?php print get_bloginfo('name'); ?></a>. All rights reserved.</div>
			</div> 
		</footer>
		<?php wp_footer(); ?> 
	</body>
</html>