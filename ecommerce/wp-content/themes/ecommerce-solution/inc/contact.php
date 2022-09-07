<?php
/**
 * Custom Contact us Widget
 */

class Ecommerce_Solution_Contact_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'Ecommerce_Solution_Contact_Widget', 
			__('Contact Us', 'ecommerce-solution'),
			array( 'description' => __( 'Widget for Contact Us section', 'ecommerce-solution' ), ) 
		);
	}
	
	public function widget( $args, $instance ) {
		?>
		<div class="widget">
			<?php
			$heading = apply_filters('widget_heading', esc_html($instance['heading']));
			$phone = apply_filters('widget_phone', esc_html($instance['phone']));
			$email = apply_filters('widget_email', esc_html($instance['email']));
			$address = apply_filters('widget_address', esc_html($instance['address']));
			$timing = apply_filters('widget_timing', esc_html($instance['timing']));
			$longitude = apply_filters('widget_longitude', esc_html($instance['longitude']));
			$latitude = apply_filters('widget_latitude', esc_html($instance['latitude']));
			$contact_form = apply_filters('contact_form', esc_html($instance['contact_form']));

	        echo '<div class="custom-contact-us">';
	        if(!empty($heading) ){ ?><h3 class="custom_heading"><?php echo esc_html($instance['heading']); ?></h3><?php } ?>
	        <?php if(!empty($phone) ){ ?><p class="my-3 mx-0"><span class="custom_details"><?php esc_html_e('Phone No: ','ecommerce-solution'); ?></span><span class="custom_desc"><?php echo esc_html($instance['phone']); ?></span></p><?php } ?>
	        <?php if(!empty($email) ){ ?><p class="my-3 mx-0"><span class="custom_details"><?php esc_html_e('Email ID: ','ecommerce-solution'); ?></span><span class="custom_desc"><?php echo esc_html($instance['email']); ?></span></p><?php } ?>
	        <?php if(!empty($address) ){ ?><p class="my-3 mx-0"><span class="custom_details"><?php esc_html_e('Address: ','ecommerce-solution'); ?></span><span class="custom_desc"><?php echo esc_html($instance['address']); ?></span></p><?php } ?> 
	        <?php if(!empty($timing) ){ ?><p class="my-3 mx-0"><span class="custom_details"><?php esc_html_e('Opening Time: ','ecommerce-solution'); ?></span><span class="custom_desc"><?php echo esc_html($instance['timing']); ?></span></p><?php } ?>
	        <?php if(!empty($longitude) ){ ?><embed width="100%" height="200px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo esc_html($instance['longitude']); ?>,<?php echo esc_html($instance['latitude']); ?>&hl=es;z=14&amp;output=embed"></embed><?php } ?>
	        <?php if(!empty($contact_form) ){ ?><?php echo do_shortcode($instance['contact_form']); ?><?php } ?>
	        <?php echo '</div>';
			?>
		</div>
		<?php
	}
	
	public function form( $instance ) {

		$heading= ''; $phone= ''; $email = ''; $address = ''; $timing = ''; $longitude = ''; $latitude = ''; $contact_form = ''; 
		
		isset($instance['heading']) ? $heading = $instance['heading'] : null;
		isset($instance['phone']) ? $phone = $instance['phone'] : null;
		isset($instance['email']) ? $email = $instance['email'] : null;
		isset($instance['address']) ? $address = $instance['address'] : null;
		isset($instance['timing']) ? $timing = $instance['timing'] : null;
		isset($instance['longitude']) ? $longitude = $instance['longitude'] : null;
		isset($instance['latitude']) ? $latitude = $instance['latitude'] : null;
		isset($instance['contact_form']) ? $contact_form = $instance['contact_form'] : null;
		
		?>

		<p>
        	<label for="<?php echo esc_attr($this->get_field_id('heading')); ?>"><?php esc_html_e('Heading:','ecommerce-solution'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('heading')); ?>" name="<?php echo esc_attr($this->get_field_name('heading')); ?>" type="text" value="<?php echo esc_attr($heading); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone Number:','ecommerce-solution'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email id:','ecommerce-solution'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:','ecommerce-solution'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($address); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('timing')); ?>"><?php esc_html_e('Opening Time:','ecommerce-solution'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('timing')); ?>" name="<?php echo esc_attr($this->get_field_name('timing')); ?>" type="text" value="<?php echo esc_attr($timing); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('longitude')); ?>"><?php esc_html_e('Longitude:','ecommerce-solution'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('longitude')); ?>" name="<?php echo esc_attr($this->get_field_name('longitude')); ?>" type="text" value="<?php echo esc_attr($longitude); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('latitude')); ?>"><?php esc_html_e('Latitude:','ecommerce-solution'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('latitude')); ?>" name="<?php echo esc_attr($this->get_field_name('latitude')); ?>" type="text" value="<?php echo esc_attr($latitude); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('contact_form')); ?>"><?php esc_html_e('Contact Form Shortcode:','ecommerce-solution'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_form')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_form')); ?>" type="text" value="<?php echo esc_attr($contact_form); ?>">
    	</p>
		
		<?php 
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();	
		$instance['heading'] = (!empty($new_instance['heading']) ) ? strip_tags($new_instance['heading']) : '';
		$instance['phone'] = (!empty($new_instance['phone']) ) ? ecommerce_solution_sanitize_phone_number($new_instance['phone']) : '';
		$instance['email'] = (!empty($new_instance['email']) ) ? sanitize_email($new_instance['email']) : '';
		$instance['address'] = (!empty($new_instance['address']) ) ? strip_tags($new_instance['address']) : '';
		$instance['timing'] = (!empty($new_instance['timing']) ) ? strip_tags($new_instance['timing']) : '';
		$instance['longitude'] = (!empty($new_instance['longitude']) ) ? strip_tags($new_instance['longitude']) : '';
		$instance['latitude'] = (!empty($new_instance['latitude']) ) ? strip_tags($new_instance['latitude']) : '';
		$instance['contact_form'] = (!empty($new_instance['contact_form']) ) ? strip_tags($new_instance['contact_form']) : '';
        
		return $instance;
	}
}

function ecommerce_solution_contact_custom_load_widget() {
	register_widget( 'Ecommerce_Solution_Contact_Widget' );
}
add_action( 'widgets_init', 'ecommerce_solution_contact_custom_load_widget' );