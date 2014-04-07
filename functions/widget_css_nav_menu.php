<?php
/**
 * Register "CSS Navigation Menu" widget
 */
add_action('widgets_init', create_function('', 'register_widget( "widget_css_navigation_menu" );'));

/**
 * Widget css navigation menu Class
 */
class widget_css_navigation_menu extends WP_Widget 
{ 
	public function __construct() 
	{
	    parent::__construct(
	        'widget_css_navigation_menu', 
	        'Custom CSS menu', 
	        array( 'description' => 'This widget shows custom css menu' )
	    );
	} 
   
    /**
     * Print widget to page
     */
    public function widget($args, $instance)
    {
    	extract($args);	

		$css_class = $instance['css_class'];

		$nav_menu = !empty($instance['nav_menu']) ? wp_get_nav_menu_object($instance['nav_menu']) : false;
		if (!$nav_menu)return;


		wp_nav_menu( array( 'fallback_cb' => '', 'menu' => $nav_menu, 'container' => 'ul', 'menu_class' => $css_class ) );
    }   
     
    /**
     * Update data
     */
    public function update( $new_instance, $old_instance )
    {
		$instance              = array();
		$instance['css_class'] = $new_instance['css_class'];				
		$instance['nav_menu'] = (int) $new_instance['nav_menu'];		
			
        return $instance;
    }

    /**
     * Create widget form on the admin panel
     */
    public function form( $instance )
    {
		$css_class     = isset( $instance[ 'css_class' ] )  ? $instance[ 'css_class' ] : '';		
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';		

		// Get menus
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

		// If no menus exists, direct the user to go and create some.
		if ( !$menus ) {
			echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
			return;
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'css_class' ); ?>"><?php _e( 'CSS Class:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'css_class' ); ?>" name="<?php echo $this->get_field_name( 'css_class' ); ?>" type="text" value="<?php echo esc_attr( $css_class ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
			<select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $nav_menu, $menu->term_id, false )
					. '>'. $menu->name . '</option>';
			}
		?>
			</select>
		</p>
		
		<?php
    }    
}