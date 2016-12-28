<?php
class CMS_Magazine_Widget extends WP_Widget {
	function __construct() {
        parent::__construct(
            'cms_magazine_widget', // Base ID
            __('CMS Magazine Lists', 'wp_haswell'), // Name
            array('description' => __('A widget that displays post.', 'wp_haswell')) // Args
        );
    }

    /**
     * Display Widget
     *
     * @param array $args
     * @param array $instance
     */
    function widget( $args, $instance ) {
        global $wp_query;

		extract( $args );
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$number = $instance['number'];
		$category = explode(',', $instance['category']);

		$args_query = array(
			'orderby' => 'ID',
            'order' => 'DESC',
			'posts_per_page' => $number,
			'category__in' => $category,
            'meta_query' => array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS'
                )
            )
		);
        $exclude_post = (isset($instance['exclude_post'])) ? $instance['exclude_post'] : '';
        if($exclude_post!=''){
            $exclude_post= explode(',',$exclude_post);
        }
        $args_query['post__not_in'] = $exclude_post;
        $wp_query = new WP_Query($args_query);

		/* Before widget (defined by themes). */
		echo $before_widget;
		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title ) {
			echo $before_title . esc_attr($title) . $after_title;
		}

		?>
		<?php if ($wp_query->have_posts()) : ?>
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); global $post; ?>
				bla bla bla
			<?php endwhile; ?>
		<?php
		endif;
        wp_reset_postdata();
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
     * Update Widget
     * @param array $new_instance
     * @param array $old_instance
     * @return array
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['number'] = $new_instance['number'];
        $instance['exclude_post'] = $new_instance['exclude_post'];
        $instance['orderby'] = $new_instance['orderby'];
        $instance['order'] = $new_instance['order'];
        $instance['category'] = implode(',', $new_instance['category']);

        return $instance;
    }

    /**
     * Widget Settings
     * Displays the widget settings controls on the widget panel.
     * Make use of the get_field_id() and get_field_name() function
     * when creating your form elements. This handles the confusing stuff.
     */

    function form( $instance ) {
        /* Set up some default widget settings. */
        $defaults = array(
            'title' => 'Recent Posts',
            'number' => '3',
            'category' => '',
            'type_view' => '',
            'exclude_post' => '',
            'orderby' => '',
            'order' => '',
            'display_paging' => 'n',
        );
        $instance = wp_parse_args( (array) $instance, $defaults );
        // Get category select list
        $of_categories 		= array();
        $of_categories_obj 	= get_categories('hide_empty=0');
        foreach ($of_categories_obj as $of_cat) {
            $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
        }
        ?>

        <!-- Widget Title: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'wp_haswell') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
        </p>
        <!-- Widget Number: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number posts in page:', 'wp_haswell') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e('Category:', 'wp_haswell') ?></label>
            <select multiple class="widefat" name="<?php echo $this->get_field_name('category'); ?>[]" style="height: 200px;">
                <option value=""><?php _e('Select category', 'wp_haswell'); ?></option>
                <?php
                $cats = explode(',', $instance['category']);
                foreach ( $of_categories as $key => $value ) {
                    echo '<option value="'.intval($key).'" '.$this->multiselect($cats, $key).'>'.$value."</option>\n";
                }
                ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'exclude_post' ); ?>"><?php _e('Exclude post: (Enter post IDs, separated by commas)', 'wp_haswell') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'exclude_post' ); ?>" name="<?php echo $this->get_field_name( 'exclude_post' ); ?>" value="<?php echo $instance['exclude_post']; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e('Orderby:', 'wp_haswell') ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name('orderby'); ?>">
                <option value="ID" <?php selected($instance['orderby'], 'ID', true) ?>><?php _e('ID', 'wp_haswell'); ?></option>
                <option value="author" <?php selected($instance['orderby'], 'author', true) ?>><?php _e('Author', 'wp_haswell'); ?></option>
                <option value="title" <?php selected($instance['orderby'], 'title', true) ?>><?php _e('Title', 'wp_haswell'); ?></option>
                <option value="name" <?php selected($instance['orderby'], 'name', true) ?>><?php _e('Name', 'wp_haswell'); ?></option>
                <option value="date" <?php selected($instance['orderby'], 'date', true) ?>><?php _e('Date', 'wp_haswell'); ?></option>
                <option value="rand" <?php selected($instance['orderby'], 'rand', true) ?>><?php _e('Random', 'wp_haswell'); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e('Order:', 'wp_haswell') ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name('order'); ?>">
                <option value="ASC" <?php selected($instance['order'], 'ASC', true) ?>><?php _e('ASC', 'wp_haswell'); ?></option>
                <option value="DESC" <?php selected($instance['order'], 'DESC', true) ?>><?php _e('DESC', 'wp_haswell'); ?></option>
            </select>
        </p>
    <?php
    }
    function multiselect($selected_array, $current) {
        $type = '';
        foreach ($selected_array  as $value) {
            if ((string)($value) === (string)($current)) {
                $type = 'selected = "selected"';
            }
        }

        return $type;
    }

} //End Class

/**
* Class CMS_Magazine_Widget
*/

function register_magazine_widget() {
    register_widget('CMS_Magazine_Widget');
}

add_action('widgets_init', 'register_magazine_widget');