<?php
add_action('widgets_init','cms_categories_widgets');

function cms_categories_widgets(){
		register_widget("Cms_Categories_Widget");
}

class Cms_Categories_Widget extends WP_widget{
	function __construct() {
		$widget_ops = array('classname' => 'cms_categories_widget widget_categories', 'description' => __('A widget that displays your categories with post counts.', 'wp_haswell') );
		$control_ops = array( 'id_base' => 'cms_categories_widget' );
		parent::__construct('cms_categories_widget', __('CMS Categories', 'wp_haswell'), $widget_ops, $control_ops);
	}
	
	function widget($args,$instance) {
		extract($args);

		$title = apply_filters('widget_title', $instance['title'] );
		$category = $instance['category'];

		/* Before widget (defined by themes). */
		echo $before_widget;
		if ( $title ) { echo $before_title . $title . $after_title; }
		?>
			
		<ul>
			<?php
				$args = array (
					'echo' => 0,
					'show_option_all'    => '',
					'orderby'            => 'name',
					'show_count' => 1,
					'title_li' => '',
					'exclude'  => '' . $category . '',
					'depth' => 1
				);
				$variable = wp_list_categories($args);
				$variable = str_replace ( "(" , "<small>", $variable );
				$variable = str_replace ( ")" , "</small>", $variable );
				echo $variable;
			?>
		</ul>
<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['category'] = $new_instance['category'];
		
		return $instance;
	}
	
	function form($instance){
		$defaults = array('title' => 'Categories', 'category' => '100, 101');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'wp_haswell') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e('Exclude Categories', 'wp_haswell') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name('category'); ?>" value="<?php echo $instance['category']; ?>" />
		</p>
		<?php
	}
}
?>