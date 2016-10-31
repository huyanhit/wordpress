<?php if (get_dynamic_sidebar('sidebar-left')  != '') { ?> 
	<div class="col-md-3 col-sm-3 col-xs-12" id="sidebar-left">
		<?php do_action('before_sidebar'); ?> 
		<?php dynamic_sidebar('sidebar-left'); ?> 
	</div>
<?php } ?> 