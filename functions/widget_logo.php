<?php
/**
 * Register "logo" widget
 */
add_action('widgets_init', create_function('', 'register_widget( "widget_logo" );'));

/**
 * Widget logo Class
 */
class widget_logo extends WP_Widget 
{ 
	public function __construct() 
	{
	    parent::__construct(
	        'widget_logo', 
	        'logo', 
	        array( 'description' => 'This widget shows logo' )
	    );
	} 
   
    /**
     * Print widget to page
     */
    public function widget($args, $instance)
    {
    	extract($args);	

		$title     			= $instance['title'];								
		$image_url 			= $instance['image_url'];
		$destination_url 	= $instance['destination_url'];		

		echo $before_widget;	
		?>
		<a href="<?php echo $destination_url; ?>" target="_blank"><img src="<?php echo $image_url; ?>" alt="<?php echo $title; ?>"></a>
		<?php	
    	echo $after_widget;
    }   
     
    /**
     * Update data
     */
    public function update( $new_instance, $old_instance )
    {
		$instance                    = array();
		$instance['title']           = $new_instance['title'];				
		$instance['image_url']       = $new_instance['image_url'];
		$instance['destination_url'] = $new_instance['destination_url'];
			
        return $instance;
    }

    /**
     * Create widget form on the admin panel
     */
    public function form( $instance )
    {
		$title           = isset( $instance[ 'title' ] )  ? $instance[ 'title' ] : '';		
		$image_url       = isset( $instance[ 'image_url' ] )  ? $instance[ 'image_url' ] : '';
		$destination_url = isset( $instance[ 'destination_url' ] )  ? $instance[ 'destination_url' ] : '';

		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'image_url' ); ?>"><?php _e( 'Image url:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" type="text" value="<?php echo esc_attr($image_url); ?>" />
		</p>	

		<p>
		<label for="<?php echo $this->get_field_id( 'destination_url' ); ?>"><?php _e( 'Destination url:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'destination_url' ); ?>" name="<?php echo $this->get_field_name( 'destination_url' ); ?>" type="text" value="<?php echo esc_attr($destination_url); ?>" />
		</p>
		
		<?php
    }    
}