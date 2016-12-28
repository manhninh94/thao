<?php
	$post_in_page = (!empty($atts['post_in_page'])) ? $atts['post_in_page'] : '';
	$latest_title = (!empty($atts['latest_title'])) ? $atts['latest_title'] : '';
	$blog_link = (!empty($atts['blog_link'])) ? $atts['blog_link'] : '';
	$categories_name = (!empty($atts['categories_name'])) ? $atts['categories_name'] : '';

	$args = array(
	    'numberposts'   => $post_in_page,
	    'category_name' => $categories_name,
	    'orderby'       => 'post_date',
	    'order'         => 'DESC'
	);
	
	if(12 % $post_in_page == 0){
		$column = (12 / $post_in_page);
		$el_class = 'col-xs-12 col-sm-6 col-md-'.$column.'';
	}else{
		$el_class = 'no-boostrap';
	}

	$first_text = $last_text = '';
    $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
    $text_array = explode('|', $latest_title);
    $first_text = $text_array[0].' ';
    $last_text  = $text_array[1];
    ?>
    <div class="cms-latest-news-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    	<div class="row">
		    <div class="latest-title col-xs-12">
		    	<h2 class="section-title">
		    		<?php echo esc_attr($first_text)?>
		    		<span class="bold"><?php echo esc_attr( $last_text)?></span>
		    		<?php if(!empty($blog_link)):?>
		    			<a class="section-more " href="<?php echo esc_url($blog_link);?>">OUR BLOG</a>
		    		<?php endif;?>
		    	</h2>
		    </div>
	    </div>
	    <?php
	    foreach( $recent_posts as $recent ){
	    	echo '<div class="post-item row">';
	    		echo '<div class="col-md-4 blog2-post-title-cont">';
	    			echo '<div class="post-prev-date-cont">
	    				<span class="blog2-date-numb">'.get_the_date('d').'</span>
						<span class="blog2-month">'.get_the_date('F').'</span>';
	    			echo '</div>';
			    	echo '<div class="post-title">
			    	<h3><a href="'.get_permalink($recent["ID"]).'">'.$recent["post_title"].'</a></h3>';
			    	echo haswell_archive_detail_v2();
			    	echo '</div>';
		    	echo '</div>';
		    	echo '<div class="col-md-8">';
			    	echo '<div class="content-excrept"><p>'.wp_trim_words($recent["post_content"],40,'...').'</p>';
			    	echo '</div>';
		    	echo '</div>';
			echo "</div>";
		}
		?>
	</div>
	<?php
?>