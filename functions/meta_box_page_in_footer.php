<?php

/**
 * Hooks
 */
add_action('do_meta_boxes', 'page_in_sidebar_box');
add_action('save_post', 'page_in_footer_update', 0);

function page_in_sidebar_box()
{
	add_meta_box('page_in_footer_sidebar', __('Show this page in footer sidebar'), 'page_in_footer_sidebar_func', 'page', 'side', 'high');
}

/**
 * Show "Page in footer sidebar" meta Box
 */
function page_in_footer_sidebar_func($post)
{
?>

	<p>
		<label for="page_in_footer"><?php _e('Page in footer'); ?></label>
		<?php
		if( get_post_meta($post->ID, 'page_in_footer', 1) == "on")
		{
			echo '<input type="checkbox" name="page_in_footer" checked>';
		}
		else
		{
			echo '<input type="checkbox" name="page_in_footer">';
		}
		
		?>		
	</p>	
	<p>
		<label for="anons_text"><?php _e('Anons text'); ?></label>
		<textarea name="anons_text" id="anons_text" cols="27" rows="10"><?php echo get_post_meta($post->ID, 'anons_text', 1); ?></textarea>		
	</p>

	<input type="hidden" name="page_in_footer_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php
}

/**
 * Update "Page in footer sidebat" Meta box
 */
function page_in_footer_update($post_id)
{
	if(!wp_verify_nonce($_POST['page_in_footer_nonce'], __FILE__)) return false; 
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return false; 
	if(!current_user_can('edit_post', $post_id)) return false; 
	
	if(!isset($_POST['page_in_footer']))
	{
		delete_post_meta($post_id, 'page_in_footer');
	}
	else
	{
		$page_in_footer = trim($_POST["page_in_footer"]);
		update_post_meta($post_id, 'page_in_footer', $page_in_footer);	
	}

	if(!isset($_POST['anons_text']) OR empty($_POST['anons_text']))
	{
		delete_post_meta($post_id, 'anons_text');
	}
	else
	{
		$anons_text = trim($_POST['anons_text']);
		update_post_meta($post_id, 'anons_text', $anons_text);
	}
	
	return $post_id;
}

/**
 * Get all carousel items
 */
function get_all_blocks($container = "div")
{	
	$str   = "";
	$args  = array(  
	   'numberposts'     => -1,  
       'offset'          => 0,  
       'category'        => '',  
       'orderby'         => 'post_date',  
       'order'           => 'DESC',  
       'include'         => '',  
       'exclude'         => '',  
       'meta_key'        => '',  
       'meta_value'      => '',  
       'post_type'       => 'page',  
       'post_mime_type'  => '',  
       'post_parent'     => '',  
       'post_status'     => array('publish')  
	);  
	  
	$posts = get_posts($args);  
	foreach($posts as $post)
	{  		
		if(get_post_meta($post->ID, "page_in_footer", 1) == "on")
		{
			$str.= "<$container class='block'>";
			$str.= '<div class="image-box">'.get_the_post_thumbnail($post->ID, "full").'</div>';	    
			$str.= "<h5><a href='".get_permalink($post->ID)."'>".$post->post_title."</a></h5>";	    
			$str.= get_post_meta($post->ID, 'anons_text', 1);	    	    
			$str.= '<p><a href="'.get_permalink($post->ID).'">Learn More »</a></p>';
			$str.= "</$container>";			
		}			
	}  	
	return $str;
}