<?php
/**
 * Hooks
 */
add_theme_support( 'post-thumbnails' );
add_action( 'init', 'create_post_type' );
add_action('do_meta_boxes', 'meta_boxes');
add_action('save_post', 'additional_options_update', 0);

/**
 * Add meta boxes
 */
function meta_boxes() 
{
	remove_meta_box( 'postimagediv', 'slides', 'side' );
	add_meta_box('postimagediv', __('Carousel Image'), 'post_thumbnail_meta_box', 'carousel_item', 'side', 'high');
	add_meta_box('additional_options', __('Additional options'), 'additional_options_func', 'carousel_item', 'normal', 'high');
}

/**
 * Create Carousel Item post type
 */
function create_post_type() 
{
	register_post_type('carousel_item', array(
		'labels' => array(
			'name'          => __( 'Carousel Items' ),
			'singular_name' => __( 'Carousel Item' )
			),
		'public'      => true,
		'has_archive' => true,
		'supports'    => array( 'title', 'thumbnail', 'editor'),
		'rewrite'     => array( 'slug' => 'carousel_item' )
		)
	);
}

/**
 * Show "Additional options" meta Box
 */
function additional_options_func( $post )
{
?>

	<p>
		<label for="signature_image" style="display: block;"><?php _e('Signature Image'); ?></label>
		<input type="text" name="signature_image" value="<?php echo get_post_meta($post->ID, 'signature_image', 1); ?>" style="width: 50%; ">
	</p>
	
	<p>
		<label for="destination_url" style="display: block;"><?php _e('Destination URL'); ?></label>
		<input type="text" name="destination_url" value="<?php echo get_post_meta($post->ID, 'destination_url', 1); ?>" style="width: 50%;">
	</p>

	<input type="hidden" name="additional_options_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php
}

/**
 * Update "Additional options" Meta box
 */
function additional_options_update($post_id)
{
	if(!wp_verify_nonce($_POST['additional_options_nonce'], __FILE__)) return false; 
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return false; 
	if(!current_user_can('edit_post', $post_id)) return false; 
	
	if(isset($_POST['signature_image']))
	{
		$signature_image = trim($_POST["signature_image"]);
		if(empty($signature_image))
		{
			delete_post_meta($post_id, 'signature_image');
		}
		update_post_meta($post_id, 'signature_image', $signature_image);
	}

	if(isset($_POST['destination_url']))
	{
		$destination_url = trim($_POST["destination_url"]);
		if(empty($destination_url))
		{
			delete_post_meta($post_id, 'destination_url');
		}
		update_post_meta($post_id, 'destination_url', $destination_url);
	}
	
	return $post_id;
}


/**
 * Get all carousel items
 */
function get_all_carousel_items($container = "li")
{
	$first = TRUE;
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
       'post_type'       => 'carousel_item',  
       'post_mime_type'  => '',  
       'post_parent'     => '',  
       'post_status'     => array('publish')  
	);  
	  
	$posts = get_posts($args);  
	foreach($posts as $post)
	{  
		$calsses[$post->ID][] = "item";
		$calsses[$post->ID][] = "item".$post->ID;
	    if($first) 
	    {
	    	$calsses[$post->ID][] = "active";
	    	$first = FALSE;
	    }	    	
	    $class = implode(" ", $calsses[$post->ID]);

	    $str = "<$container class='$class'>";
	    $str.= get_the_post_thumbnail($post->ID, "full");
	    $str.= "<div class='text'>";
	    $str.= "<h1>".$post->post_title."</h1>";
	    $str.= "<blockquote>";
	    $str.= $post->post_content;
	    $str.= "<div class='clearfix'>";
	    $str.= '<cite><img src="'.get_post_meta($post->ID, "signature_image", 1).'" alt="" /></cite>';
	    $str.= '<a href="'.get_post_meta($post->ID, "destination_url", 1).'" class="btn-read-more">Read more reviews »</a>';
	    $str.= "</div>";
	    $str.= "</blockquote>";
	    $str.= "</div>";
	    $str.= "</$container>";
	    $items[] = $str;
	}  	
	return $items;
}