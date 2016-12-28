<?php

/**
 * Auto create .css file from Theme Options
 * @author Fox
 * @version 1.0.0
 */
class CMSSuperHeroes_StaticCss
{

    public $scss;
    
    function __construct()
    {
        global $smof_data;
        
        /* scss */
        $this->scss = new scssc();
        
        /* set paths scss */
        $this->scss->setImportPaths(get_template_directory() . '/assets/scss/');
             
        /* generate css over time */
        if (isset($smof_data['dev_mode']) && $smof_data['dev_mode']) {
            $this->generate_file();
        } else {
            /* save option generate css */
            add_action("redux/options/smof_data/saved", array(
                $this,
                'generate_file'
            ));
        }
    }

    /**
     * generate css file.
     *
     * @since 1.0.0
     */
    public function generate_file()
    {
        global $smof_data;
        if (! empty($smof_data)) {
            
            /* write options to scss file */
            file_put_contents(get_template_directory() . '/assets/scss/options.scss', $this->css_render(), LOCK_EX); // Save it
            
            /* minimize CSS styles */
            if (!$smof_data['dev_mode']) {
                $this->scss->setFormatter('scss_formatter_compressed');
            }
            
            /* compile scss to css */
            $css = $this->scss_render();
            
            $file = "static.css";
            
            if(!empty($smof_data['presets_color']) && $smof_data['presets_color']){
                $file = "presets-".$smof_data['presets_color'].".css";
            }
            
            /* write static.css file */
            file_put_contents(get_template_directory() . '/assets/css/' . $file, $css, LOCK_EX); // Save it
        }
    }
    
    /**
     * scss compile
     * 
     * @since 1.0.0
     * @return string
     */
    public function scss_render(){
        /* compile scss to css */
        return $this->scss->compile('@import "master.scss"');
    }
    
    /**
     * main css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data, $haswell_base;
        
        ob_start();
        
        /* google fonts. */
        if(isset($smof_data['google-font-1'])){
            $haswell_base->setGoogleFont($smof_data['google-font-1'], $smof_data['google-font-selector-1']);
        }
        if(isset($smof_data['google-font-2'])){
            $haswell_base->setGoogleFont($smof_data['google-font-2'], $smof_data['google-font-selector-2']);
        }
         if(isset($smof_data['google-font-3'])){
            $haswell_base->setGoogleFont($smof_data['google-font-3'], $smof_data['google-font-selector-3']);
        }
        /* forward options to scss. */
        
        if(!empty($smof_data['primary_color'])){
            echo '$primary_color:'.esc_attr($smof_data['primary_color']).';';
        }
        if ( !empty($smof_data['link_color']) ) {
            echo '$link_color:'.esc_attr($smof_data['link_color']).';';
        }
        if ( !empty($smof_data['link_color_hover']) ) {
            echo '$link_color_hover:'.esc_attr($smof_data['link_color_hover']).';';
        }

        if ($smof_data['sticky_border_bottom'] != 0) {
            echo '$sticky_border_bottom: block;';
        }
        else {
            echo '$sticky_border_bottom: none;';
        }

        /* style from Theme Option */
        if ( !empty($smof_data['header_height']['height']) ) {
            echo '$header_height:'.esc_attr($smof_data['header_height']['height']).';';
        }
        if ( !empty($smof_data['menu_sticky_height']['height']) ) {
            echo '$header_sticky_height:'.esc_attr($smof_data['menu_sticky_height']['height']).';';
        }
        if ( !empty($smof_data['link_color_hover']) ) {
            echo '$link_color_hover:'.esc_attr($smof_data['link_color_hover']).';';
        }

        /* Menu color */
        if ( !empty($smof_data['menu_color_first_level']) ) {
            echo '$menu_color_first_level:'.esc_attr($smof_data['menu_color_first_level']).';';
        }
        if ( !empty($smof_data['menu_color_first_level_hover']) ) {
            echo '$menu_color_first_level_hover:'.esc_attr($smof_data['menu_color_first_level_hover']).';';
        }
        
        /* Menu sticky color */
        if ( !empty($smof_data['sticky_menu_color_first_level']) ) {
            echo '$sticky_menu_color_first_level:'.esc_attr($smof_data['sticky_menu_color_first_level']).';';
        }
        if ( !empty($smof_data['sticky_menu_color_first_level_hover']) ) {
            echo '$sticky_menu_color_first_level_hover:'.esc_attr($smof_data['sticky_menu_color_first_level_hover']).';';
        }



        return ob_get_clean();
    }
}

new CMSSuperHeroes_StaticCss();