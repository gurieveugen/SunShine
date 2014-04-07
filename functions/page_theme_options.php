<?php

/**
 * Create new sub menu on Appearance page
 */
add_action('admin_menu', 'omr_create_menu');
function omr_create_menu() 
{	
	add_submenu_page( 'themes.php', 'Theme Options', 'Theme Options', 'administrator', __FILE__, 'omr_settings_page', 'favicon.ico' );
	add_action( 'admin_init', 'register_mysettings' );
}

/**
 * Register our settings
 */
function register_mysettings() 
{
	register_setting('sunshine_group', 's_phone');	
}
/**
 * Show Theme options page on WP Admin
 */
function omr_settings_page() 
{
?>
	<div class="wrap">		
		<form method="post" action="options.php">
			<h2>Main Settings</h2>
			<?php settings_fields('sunshine_group'); ?>			
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e('Phone'); ?></th>
					<td><input type="text" name="s_phone" value="<?php echo get_option('s_phone')?>"></td>	
				</tr>				

			</table>			

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>	
<? 
}  