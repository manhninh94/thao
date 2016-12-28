<?php

class HaswellBase
{
    /**
     * Page title
     * 
     * @since 1.0.0
     */
    public static function getPageTitle(){
        global $haswell_meta;
        if (!is_archive()){
            /* page. */
            if(is_page()) :
                /* custom title. */
                if(!empty($haswell_meta->_cms_page_title_text) && $haswell_meta->_cms_page_title_text):
                    echo esc_attr($haswell_meta->_cms_page_title_text);
                else :
                    the_title();
                endif;
            elseif (is_front_page()):
                _e('Blog', 'cms-theme-framework');
            /* search */
            elseif (is_search()):
                printf( __( 'Search Results for: %s', 'cms-theme-framework' ), '<span>' . get_search_query() . '</span>' );
            /* 404 */ 
            elseif (is_404()):
                _e( '404', 'cms-theme-framework');
            /* other */
            else :
                the_title();
            endif;
        } else { 
            /* category. */
            if ( is_category() ) :
                single_cat_title();
            elseif ( is_tag() ) :
            /* tag. */
                single_tag_title();
            /* author. */
            elseif ( is_author() ) :
                printf( __( 'Author: %s', 'cms-theme-framework' ), '<span class="vcard">' . get_the_author() . '</span>' );
            /* date */
            elseif ( is_day() ) :
                printf( __( 'Day: %s', 'cms-theme-framework' ), '<span>' . get_the_date() . '</span>' );
            elseif ( is_month() ) :
                printf( __( 'Month: %s', 'cms-theme-framework' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'cms-theme-framework' ) ) . '</span>' );
            elseif ( is_year() ) :
                printf( __( 'Year: %s', 'cms-theme-framework' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'cms-theme-framework' ) ) . '</span>' );
            /* portfolio tax */
            elseif (is_tax('category-portfolio')):
                $term = get_term_by( 'slug', get_query_var( 'category-portfolio' ), get_query_var( 'taxonomy' ) );
                echo apply_filters('the_title', $term->name);
            /* post format */
            elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                _e( 'Asides', 'cms-theme-framework' );
            elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                _e( 'Galleries', 'cms-theme-framework');
            elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                _e( 'Images', 'cms-theme-framework');
            elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                _e( 'Videos', 'cms-theme-framework' );
            elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                _e( 'Quotes', 'cms-theme-framework' );
            elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                _e( 'Links', 'cms-theme-framework' );
            elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
                _e( 'Statuses', 'cms-theme-framework' );
            elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
                _e( 'Audios', 'cms-theme-framework' );
            elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
                _e( 'Chats', 'cms-theme-framework' );
            /* woocommerce */
            elseif (class_exists('Woocommerce') && is_woocommerce()):
                woocommerce_page_title();
            else :
            /* other */
                the_title();
            endif;
        }
    }
    /**
     * Breadcrumb
     * 
     * @since 1.0.0
     */
    public static function getBreadCrumb($separator = '') {
        global $smof_data, $post;
        echo '<ul class="breadcrumbs">';
        /* not front_page */
        if ( !is_front_page() ) {
            echo '<li><a href="';
            echo esc_url( home_url( '/' ) );
            echo '">'.$smof_data['breacrumb_home_prefix'];
            echo "</a></li>";
        }
    
        $params['link_none'] = '';
    
        /* category */
        if (is_category()) {
            $category = get_the_category();
            $ID = $category[0]->cat_ID;
            echo is_wp_error( $cat_parents = get_category_parents($ID, TRUE, '', FALSE ) ) ? '' : '<li>'.$cat_parents.'</li>';
        }
        /* tax */
        if (is_tax()) {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            $link = get_term_link( $term );
            	
            if ( is_wp_error( $link ) ) {
                echo sprintf('<li>%s</li>', $term->name );
            } else {
                echo sprintf('<li><a href="%s" title="%s">%s</a></li>', esc_url($link), $term->name, $term->name );
            }
        }
        /* home */
        
        /* page not front_page */
        if(is_page() && !is_front_page()) {
            $parents = array();
            $parent_id = $post->post_parent;
            while ( $parent_id ) :
            $page = get_page( $parent_id );
            if ( $params["link_none"] )
                $parents[]  = get_the_title( $page->ID );
            else
                $parents[]  = '<li><a href="' . get_permalink( $page->ID ) . '" title="' . get_the_title( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a></li>' . $separator;
            $parent_id  = $page->post_parent;
            endwhile;
            $parents = array_reverse( $parents );
            echo join( '', $parents );
            echo '<li>'.get_the_title().'</li>';
        }
        /* single */
        if(is_single()) {
            $categories_1 = get_the_category($post->ID);
            if($categories_1):
            foreach($categories_1 as $cat_1):
            $cat_1_ids[] = $cat_1->term_id;
            endforeach;
            $cat_1_line = implode(',', $cat_1_ids);
            endif;
            if( isset( $cat_1_line ) && $cat_1_line ) {
                $categories = get_categories(array(
                    'include' => $cat_1_line,
                    'orderby' => 'id'
                ));
                if ( $categories ) :
                foreach ( $categories as $cat ) :
                $cats[] = '<li><a href="' . esc_url(get_category_link( $cat->term_id )) . '" title="' . $cat->name . '">' . $cat->name . '</a></li>';
                endforeach;
                echo join( '', $cats );
                endif;
            }
            echo '<li>'.get_the_title().'</li>';
        }
        /* tag */
        if( is_tag() ){ echo '<li>'."Tag: ".single_tag_title('',FALSE).'</li>'; }
        /* search */
        if( is_search() ){ echo '<li>'.__("Search", 'cms-theme-framework').'</li>'; }
        /* date */
        if( is_year() ){ echo '<li>'.get_the_time('Y').'</li>'; }
        /* 404 */
        if( is_404() ) {
            echo '<li>'.__("404 - Page not Found", 'cms-theme-framework').'</li>';
        }
        /* archive */
  		if( is_archive() && is_post_type_archive() ) {
  		    $title = post_type_archive_title( '', false );
  		    echo '<li>'. $title .'</li>';
  		}
        echo "</ul>";
    }
    
    /**
     * Get Shortcode From Content
     * 
     * @param string $shortcode
     * @param string $content
     * @return unknown
     */
    public static function getShortcodeFromContent($shortcode = '', $content = ''){
        
        preg_match("/\[".$shortcode."(.*)/", $content , $matches);
        
        return !empty($matches[0]) ? $matches[0] : null ;
    }
    
    /**
     * set google font for selecter.
     * 
     * @param array $googlefont
     * @param string $selecter
     */
    public static function setGoogleFont($googlefont = array(), $selecter = ''){
        
        if(isset($googlefont['font-family'])){
            /* add font selecter. */
            if($selecter){
                echo esc_attr($selecter)."{font-family:'".esc_attr($googlefont['font-family'])."';}";
            }
        }
    }
    
    /**
     * minimize CSS styles
     *
     * @since 1.1.0
     */
    public static function compressCss($buffer){
    
        /* remove comments */
        $buffer = preg_replace("!/\*[^*]*\*+([^/][^*]*\*+)*/!", "", $buffer);
        /* remove tabs, spaces, newlines, etc. */
        $buffer = str_replace("	", " ", $buffer); //replace tab with space
        $arr = array("\r\n", "\r", "\n", "\t", "  ", "    ", "    ");
        $rep = array("", "", "", "", " ", " ", " ");
        $buffer = str_replace($arr, $rep, $buffer);
        /* remove whitespaces around {}:, */
        $buffer = preg_replace("/\s*([\{\}:,])\s*/", "$1", $buffer);
        /* remove last ; */
        $buffer = str_replace(';}', "}", $buffer);
    
        return $buffer;
    }
}