<?php
class CMS_Flickr_Widget extends WP_Widget {
	function __construct() {
        parent::__construct(
            'cms_flickr_widget', // Base ID
            __('CMS Flickr', 'wp_haswell'), // Name
            array('description' => __('A widget that displays Flickr photos.', 'wp_haswell'),) // Args
        );
    }

    function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );

        $flickr_id = $instance['flickr_id'];
		$number = absint( $instance['number'] );
        $description = $instance['description'];

		/* Before widget (defined by themes). */
		echo $before_widget;
		if($title):
			echo $before_title;
				echo $title;
			echo $after_title;
		endif;

		/* Display Description */
		if($description != "")
			echo '<p>' . stripslashes($description) . '</p>';
		?>

        <script type="text/javascript"
            src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $flickr_id; ?>"
            xmlns="http://www.w3.org/1999/html">
        </script>
        <?php if (!empty($instance['stream_url'])) : ?>
        	<span class="flickr-brand"><a href="<?php echo $instance['stream_url'] ?>" target="_blank"><?php _e('View stream on flickr', 'wp_haswell'); ?></a></span>
        <?php endif; ?>
		<?php
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        /* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['flickr_id'] = strip_tags( $new_instance['flickr_id'] );
		$instance['description'] = strip_tags( $new_instance['description'] );
		$instance['number'] = strip_tags( $new_instance['number'] );
		$instance['stream_url'] = strip_tags( $new_instance['stream_url'] );

		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
			'title' => 'Flickr Photos',
			'description' =>'',
			'flickr_id' => '',
			'number' => '9',
			'stream_url' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'wp_haswell') ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
        </p>

		<!-- Description: Textarea Input -->
		<p>
            <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e('Description:', 'wp_haswell'); ?></label>
            <textarea class="widefat" type="text" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>"><?php echo $instance['description']; ?></textarea>
        </p>

		<!-- Flickr ID: Text Input -->
		<p>
            <label for="<?php echo $this->get_field_id( 'flickr_id' ); ?>"><?php _e('Flickr ID:', 'wp_haswell'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'flickr_id' ); ?>" name="<?php echo $this->get_field_name( 'flickr_id' ); ?>" type="text" value="<?php echo $instance['flickr_id']; ?>" />
            <?php $flirck_url = 'http://idgettr.com' ?>
            <br /><span class="helper"><?php _e('Look your ID here,', 'wp_haswell'); ?> <a href="<?php echo $flirck_url ?>" target="_blank">idGettr</a>.</span>
        </p>

		<p>

		<!-- Number of Photos: Text Input -->
		<p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>">
               <?php _e('Number of Photos:', 'wp_haswell'); ?>
            </label>
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
                <br /><span class="helper"><?php _e('Up to 10 photos allowed.', 'wp_haswell'); ?></span>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'stream_url' ); ?>"><?php _e('Stream url:', 'wp_haswell'); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'stream_url' ); ?>" name="<?php echo $this->get_field_name( 'stream_url' ); ?>" value="<?php echo $instance['stream_url']; ?>" />
        </p>

	<?php
	}
}

/**
* Class CMS_Flickr_Widget
*/

function register_flickr_widget() {
    register_widget('CMS_Flickr_Widget');
}

add_action('widgets_init', 'register_flickr_widget');
