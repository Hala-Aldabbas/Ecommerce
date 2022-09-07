<?php

// Customizer slider control
class Ecommerce_Solution_Custom_Control extends WP_Customize_Control {
	public $type = 'slider_control';
	public function enqueue() {
		wp_enqueue_script( 'skyrocket-custom-controls-js', trailingslashit( esc_url(get_template_directory_uri()) ) . 'js/customizer.js', array( 'jquery', 'jquery-ui-core' ), '1.0', true );
		wp_enqueue_style( 'skyrocket-custom-controls-css', trailingslashit( esc_url(get_template_directory_uri()) ) . 'css/customizer.css', array(), '1.0', 'all' );
	}
	public function render_content() {
	?>
		<div class="slider-custom-control">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> />
			<div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
		</div>
	<?php
	}
}

// Customizer Images radio control
class Ecommerce_Solution_Image_Radio_Control extends WP_Customize_Control {
    public function render_content() {
 
        if (empty($this->choices))
            return;
 
        $name = '_customize-radio-' . $this->id;
        ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <ul class="controls" id='ecommerce-solution-img-container'>
            <?php
            foreach ($this->choices as $value => $label) :
                $class = ($this->value() == $value) ? 'ecommerce-solution-radio-img-selected ecommerce-solution-radio-img-img' : 'ecommerce-solution-radio-img-img';
                ?>
                <li style="display: inline;">
                    <label>
                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
                          	$this->link();
                          	checked($this->value(), $value);
                          	?> />
                        <img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
                    </label>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
        <?php
    }
}