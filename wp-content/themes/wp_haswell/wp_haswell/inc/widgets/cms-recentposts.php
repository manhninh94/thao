<?php
/**
 * Class CmsRecentPosts
 */
class CmsRecentPosts extends WP_Widget {
    /**
     * Widget Setup
     */
    function __construct() {
        $widget_ops = array('classname' => 'cms-recent-posts', 'description' => __('A widget that displays recent posts.', 'wp_haswell') );
        $control_ops = array('id_base' => 'cms_recent_posts');
        parent::__construct('cms_recent_posts', __('CMS Recent Posts', 'wp_haswell'), $widget_ops, $control_ops);
    }

    /**
     * Display Widget
     * @param array $args
     * @param array $instance
     */
    function widget($args, $instance) {
        extract($args);
        $title = $instance['title'];
        $posts = $instance['posts'];

        $args_query = array(
            'orderby' => 'ID',
            'order' => 'DESC',
            'posts_per_page' => $posts
        );
        $cms_recentposts = new WP_Query($args_query);

        echo $before_widget;
        if($title) {
            echo $before_title.esc_attr($title).$after_title;
        }
        ?>
        <?php if ($cms_recentposts->have_posts()) : ?>
            <?php while($cms_recentposts->have_posts()): $cms_recentposts->the_post(); global $post; ?>
                <article <?php post_class('recent-post-item clearfix'); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="featured-image">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="post-element">
                        <header><h5 class="entry-widget-title" style="margin: 0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5></header>
                        <div class="entry-meta">
                            <span class="entry-time"><?php the_time('d F') ?></span>
                            <span class="entry-author"><?php the_author(); ?></span>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
        <!-- END WIDGET -->
        <?php
        echo $after_widget;
        wp_reset_postdata();
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['posts'] = $new_instance['posts'];
        
        return $instance;
    }

    function form($instance) {


        $defaults = array('title' => 'Recent Posts', 'categories' => 'all', 'posts' => 3, 'show_featured' => true, 'show_author' => true, 'date_fomat' => '');
        $instance = wp_parse_args((array) $instance, $defaults); ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'wp_haswell') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Number of posts:', 'wp_haswell') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" />
        </p>
    <?php
    }
}

register_widget('CmsRecentPosts');
?>