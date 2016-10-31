<?php
 if (get_dynamic_sidebar('sidebar-right') != '') { ?> 
	<div class="col-md-3 col-sm-3 col-xs-12" id="sidebar-right">
		<?php do_action('before_sidebar'); ?> 
		<?php dynamic_sidebar('sidebar-right'); ?> 
	</div>
<?php } ?> 