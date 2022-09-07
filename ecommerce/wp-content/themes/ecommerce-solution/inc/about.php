<?php
/**
 * Custom About us Widget
 */

class Ecommerce_Solution_About_Widget extends WP_Widget {
	function __construct() { parent::__construct( 
		'Ecommerce_Solution_About_Widget',__('About us', 'ecommerce-solution'),
			array( 'description' => __( 'Display short information about yourself in sidebar or in footer of your website.', 'ecommerce-solution' ), )
		);
	}
	
	public function widget( $args, $instance ) { ?>
		<div class="widget">
			<?php
			$author = apply_filters('widget_title', esc_html($instance['author']));
			$description = apply_filters('widget_description', esc_html($instance['description']));
			$facebook = $instance['facebook'];
        	$twitter = $instance['twitter'];
			$linkedin = $instance['linkedin'];
			$pinterest = $instance['pinterest'];
			$instagram = $instance['instagram'];
			$read_more_text = $instance['read_more_text'];
			$read_more_url = $instance['read_more_url'];
			$upload_image = $instance['upload_image'];

	        echo '<div class="custom-about-us">';
		        if(!empty($author) ){ ?><h3 class="custom_title text-center"><?php echo esc_html($instance['author']); ?></h3><?php } ?>
		        <div class="about-widget-image px-5">
			        <?php if($upload_image): ?>
		      			<img src="<?php echo esc_url($upload_image); ?>" alt="">
					<?php endif; ?>
				</div>
		        <?php if(!empty($description) ){ ?><p class="custom_desc text-center p-4"><?php echo esc_html($instance['description']); ?></p><?php } ?>
		        <div class="about-social_links text-center">
			        <?php if(!empty($facebook) ){ ?><a href="<?php echo esc_url($instance['facebook']); ?>"><i class="fab fa-facebook-f me-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','ecommerce-solution' );?></span></a><?php } ?>
	        		<?php if(!empty($twitter) ){ ?><a href="<?php echo esc_url($instance['twitter']); ?>"><i class="fab fa-twitter me-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','ecommerce-solution' );?></span></a><?php } ?>
					<?php if(!empty($linkedin) ){ ?><a href="<?php echo esc_url($instance['linkedin']); ?>"><i class="fab fa-linkedin-in me-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','ecommerce-solution' );?></span></a><?php } ?>
					<?php if(!empty($pinterest) ){ ?><a href="<?php echo esc_url($instance['pinterest']); ?>"><i class="fab fa-pinterest-p me-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Pinterest','ecommerce-solution' );?></span></a><?php } ?>
					<?php if(!empty($instagram) ){ ?><a href="<?php echo esc_url($instance['instagram']); ?>"><i class="fab fa-instagram me-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','ecommerce-solution' );?></span></a><?php } ?>
				</div>
				<div class="custom_read_more text-center mt-4 mx-0 mb-3">
		        	<?php if(!empty($read_more_url) ){ ?><a href="<?php echo esc_url($instance['read_more_url']); ?>" class="p-3"><?php if(!empty($read_more_text) ){ ?><?php echo esc_html($instance['read_more_text']); ?><?php } ?></a><?php } ?>
		        </div>
	        <?php echo '</div>';
			?>
		</div>
	<?php }
	
	// Widget Backend 
	public function form( $instance ) {

		$author = ''; $description= ''; $facebook = ''; $twitter = ''; $linkedin = ''; $pinterest = ''; $instagram = ''; $read_more_text = ''; $read_more_url = ''; $upload_image = ''; 
		
		isset($instance['author']) ? $author = $instance['author'] : null;
		isset($instance['description']) ? $description = $instance['description'] : null;
		isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
		isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
		isset($instance['instagram']) ? $instagram = $instance['instagram'] : null;        
 		isset($instance['linkedin']) ? $linkedin = $instance['linkedin'] : null;
        isset($instance['pinterest']) ? $pinterest = $instance['pinterest'] : null;
		isset($instance['read_more_text']) ? $read_more_text = $instance['read_more_text'] : null;
		isset($instance['read_more_url']) ? $read_more_url = $instance['read_more_url'] : null;
		isset($instance['upload_image']) ? $upload_image = $instance['upload_image'] : null;
		?>

		<p>
        <label for="<?php echo esc_attr($this->get_field_id('author')); ?>"><?php esc_html_e('Author Name:','ecommerce-solution'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author')); ?>" name="<?php echo esc_attr($this->get_field_name('author')); ?>" type="text" value="<?php echo esc_attr($author); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Description:','ecommerce-solution'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text" value="<?php echo esc_attr($description); ?>">
    	</p>
    	<p>
		<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php esc_html_e('Facebook:','ecommerce-solution'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e('Twitter:','ecommerce-solution'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php esc_html_e('Linkedin:','ecommerce-solution'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php esc_html_e('Instagram:','ecommerce-solution'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($instagram); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php esc_html_e('Pinterest:','ecommerce-solution'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>">
		</p>
    	<p>
		<label for="<?php echo esc_attr($this->get_field_id('read_more_text')); ?>"><?php esc_html_e('Button Text:','ecommerce-solution'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more_text')); ?>" name="<?php echo esc_attr($this->get_field_name('read_more_text')); ?>" type="text" value="<?php echo esc_attr($read_more_text); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('read_more_url')); ?>"><?php esc_html_e('Button Url:','ecommerce-solution'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more_url')); ?>" name="<?php echo esc_attr($this->get_field_name('read_more_url')); ?>" type="text" value="<?php echo esc_attr($read_more_url); ?>">
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'upload_image' )); ?>"><?php esc_html_e( 'Image Url:','ecommerce-solution'); ?></label>
		<?php
			if ( $upload_image != '' ) :
			echo '<img class="custom_media_image" src="' . esc_url($upload_image) . '" style="margin:10px 0;padding:0;max-width:100%;float:left;display:inline-block" /><br />';
			endif;
		?>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'upload_image' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'upload_image' )); ?>" type="text" value="<?php echo esc_url( $upload_image ); ?>" />
	   	</p>
	<?php }
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['author'] = ( ! empty( $new_instance['author'] ) ) ? $new_instance['author'] : '';
		$instance['description'] = (!empty($new_instance['description']) ) ? strip_tags($new_instance['description']) : '';
		$instance['facebook'] = (!empty($new_instance['facebook']) ) ? esc_url_raw($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter']) ) ? esc_url_raw($new_instance['twitter']) : '';
		$instance['instagram'] = (!empty($new_instance['instagram']) ) ? esc_url_raw($new_instance['instagram']) : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin']) ) ? esc_url_raw($new_instance['linkedin']) : '';
        $instance['pinterest'] = (!empty($new_instance['pinterest']) ) ? esc_url_raw($new_instance['pinterest']) : '';
        $instance['read_more_text'] = (!empty($new_instance['read_more_text']) ) ? strip_tags($new_instance['read_more_text']) : '';
        $instance['read_more_url'] = (!empty($new_instance['read_more_url']) ) ? esc_url_raw($new_instance['read_more_url']) : '';
        $instance['upload_image'] = ( ! empty( $new_instance['upload_image'] ) ) ? $new_instance['upload_image'] : '';
		return $instance;
	}
}
// Register and load the widget
function ecommerce_solution_about_custom_load_widget() {
	register_widget( 'Ecommerce_Solution_About_Widget' );
}
add_action( 'widgets_init', 'ecommerce_solution_about_custom_load_widget' );