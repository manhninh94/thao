<?php
/**
 * Meta options
 * 
 * @author Fox
 * @since 1.0.0
 */
class CMSMetaOptions
{
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
    }
    /* add script */
    function admin_script_loader()
    {
        global $pagenow;
        if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
            wp_enqueue_style('metabox', get_template_directory_uri() . '/inc/options/css/metabox.css');
            
            wp_enqueue_script('easytabs', get_template_directory_uri() . '/inc/options/js/jquery.easytabs.min.js');
            wp_enqueue_script('metabox', get_template_directory_uri() . '/inc/options/js/metabox.js');
        }
    }
    /* add meta boxs */
    public function add_meta_boxes()
    {
        $this->add_meta_box('template_page_options', __('Setting', 'wp_haswell'), 'page');
        $this->add_meta_box('template_page_options', __('Setting', 'wp_haswell'), 'post');
        $this->add_meta_box('team_page_options', __('Team Position', 'wp_haswell'), 'team');
        $this->add_meta_box('team_page_social', __('Team Social', 'wp_haswell'), 'team');
        $this->add_meta_box('testimonial_page_options', __('Testimonial Position', 'wp_haswell'), 'testimonial');
        $this->add_meta_box('pricing_page_option', __('Pricing Option', 'wp_haswell'), 'pricing');
        $this->add_meta_box('template_page_options', __('Setting', 'wp_haswell'), 'portfolio');
        $this->add_meta_box('portfolio_single_option', __('Portfolio Options', 'wp_haswell'), 'portfolio');
    }
    
    public function add_meta_box($id, $label, $post_type, $context = 'advanced', $priority = 'default')
    {
        add_meta_box('_cms_' . $id, $label, array($this, $id), $post_type, $context, $priority);
    }
    /* --------------------- PAGE ---------------------- */

    function testimonial_page_options(){
        ?>
        <div class="team-position">
            <?php
                cms_options(array(
                    'id' => 'page_testimonial_position',
                    'label' => __('Testimonial Position','wp_haswell'),
                    'type' => 'text',
                ));
            ?>
        </div>
        <?php
    }

    function template_page_options() {
        ?>
        <div class="tab-container clearfix">
	        <ul class='etabs clearfix'>
	           <li class="tab"><a href="#tabs-general"><i class="fa fa-server"></i><?php _e('General', 'wp_haswell'); ?></a></li>
	           <li class="tab"><a href="#tabs-header"><i class="fa fa-diamond"></i><?php _e('Header', 'wp_haswell'); ?></a></li>
	           <li class="tab"><a href="#tabs-page-title"><i class="fa fa-connectdevelop"></i><?php _e('Page Title', 'wp_haswell'); ?></a></li>
               <li class="tab"><a href="#tabs-footer"><i class="fa fa-connectdevelop"></i><?php _e('Footer', 'wp_haswell'); ?></a></li>
               <li class="tab"><a href="#tabs-one-page"><?php _e('One Page', 'wp_haswell'); ?></a></li>
	        </ul>
	        <div class='panel-container'>
                <div id="tabs-general">
                <?php
                    cms_options(array(
                        'id' => 'full_width',
                        'label' => __('Full Width','wp_haswell'),
                        'type' => 'switch',
                        'options' => array('on'=>'1','off'=>''),
                    ));
                    cms_options(array(
                        'id' => 'page_general_padding',
                        'label' => __('None padding from #main','wp_haswell'),
                        'type' => 'switch',
                        'options' => array('on'=>'1','off'=>''),
                    ));
                    cms_options(array(
                        'id' => 'page_general_custom_class',
                        'label' => __('Body Custom Class','wp_haswell'),
                        'type' => 'text',
                    ));
                ?>
                </div>
                <div id="tabs-header">
                <?php
                /* header. */
                cms_options(array(
                    'id' => 'header',
                    'label' => __('Custom','wp_haswell'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                    'follow' => array('1'=>array('#page_header_enable'))
                ));
                ?>  <div id="page_header_enable"><?php
                cms_options(array(
                    'id' => 'header_topbar',
                    'label' => __('Topbar Area','wp_haswell'),
                    'type' => 'select',
                    'options' => array(
                        'inherit'=>'Inherit',
                        'hide'=>'Hide', 
                        'show' => 'Show'
                    ),
                    'default' => 'inherit',
                ));
                cms_options(array(
                    'id' => 'header_layout',
                    'label' => __('Layout','wp_haswell'),
                    'type' => 'imegesselect',
                    'options' => array(
                        '' => get_template_directory_uri().'/inc/options/images/header/h-default.png',
                        'side' => get_template_directory_uri().'/inc/options/images/header/side-menu.jpg',
                        'fullscreen' => get_template_directory_uri().'/inc/options/images/header/fullscreen-menu.jpg',
                        'leftmenu' => get_template_directory_uri().'/inc/options/images/header/left-menu.jpg'
                    ),
                    'follow' => array('side'=>array('#menu-localtion-select'))
                ));
                cms_options(array(
                    'id' => 'custom_page_header_bg_color',
                    'label' => __('Background Color','wp_haswell'),
                    'type' => 'color',
                    'default' => '#fff',
                    'rgba' => true
                ));
                cms_options(array(
                    'id' => 'custom_page_header_menu_color',
                    'label' => __('Menu Color - First Level','wp_haswell'),
                    'type' => 'color',
                    'default' => '',
                    'rgba' => true
                ));
                cms_options(array(
                    'id' => 'custom_page_header_menu_color_hover',
                    'label' => __('Menu Hover Color - First Level','wp_haswell'),
                    'type' => 'color',
                    'default' => '',
                    'rgba' => true
                ));

                cms_options(array(
                    'id' => 'enable_header_fixed',
                    'label' => __('Header Fixed','wp_haswell'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                    'follow' => array('1'=>array('#page_header_fixed_enable'))
                ));
                ?> <div id="page_header_fixed_enable"><?php
                cms_options(array(
                    'id' => 'page_header_bg_color',
                    'label' => __('Background Color','wp_haswell'),
                    'type' => 'color',
                    'default' => '#fff',
                    'rgba' => true
                ));
                cms_options(array(
                    'id' => 'page_header_menu_color',
                    'label' => __('Menu Color - First Level','wp_haswell'),
                    'type' => 'color',
                    'default' => '',
                    'rgba' => true
                ));
                cms_options(array(
                    'id' => 'page_header_menu_color_hover',
                    'label' => __('Menu Hover Color - First Level','wp_haswell'),
                    'type' => 'color',
                    'default' => '',
                    'rgba' => true
                ));

                cms_options(array(
                    'id' => 'page_header_sticky_bg_color',
                    'label' => __('Sticky Background Color','wp_haswell'),
                    'type' => 'color',
                    'default' => '#fff',
                    'rgba' => true
                ));
                cms_options(array(
                    'id' => 'page_header_sticky_menu_color',
                    'label' => __('Sticky Menu Color - First Level','wp_haswell'),
                    'type' => 'color',
                    'default' => '',
                    'rgba' => true
                ));
                cms_options(array(
                    'id' => 'page_header_sticky_color_hover',
                    'label' => __('Sticky Menu Hover Color - First Level','wp_haswell'),
                    'type' => 'color',
                    'default' => '',
                    'rgba' => true
                ));
                cms_options(array(
                    'id' => 'page_logo_custom',
                    'label' => __('Logo','wp_haswell'),
                    'type' => 'image',
                    'default' => '',
                    'desc' => __('This option only appear for Default Menu (the first menu)', 'wp_haswell')
                ));
                cms_options(array(
                    'id' => 'page_logo_custom_height',
                    'label' => __('Logo Height','wp_haswell'),
                    'type' => 'text',
                ));/*
                cms_options(array(
                    'id' => 'page_sticky_logo_custom',
                    'label' => __('Sticky Logo','wp_haswell'),
                    'type' => 'image',
                    'default' => ''
                ));
                cms_options(array(
                    'id' => 'page_sticky_logo_custom_height',
                    'label' => __('Sticky Logo Height','wp_haswell'),
                    'type' => 'text',
                ));*/
                ?></div>
                <?php
                cms_options(array(
                    'id' => 'enable_menu_border_first',
                    'label' => __('Enable Menu Border - First Level','wp_haswell'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                    'follow' => array('1'=>array('#page_border_menu'))
                ));
                ?> 

                <div id="page_border_menu">
                    <?php
                        cms_options(array(
                            'id' => 'confirm_menu_border_first',
                            'label' => __('Custom Menu Border','wp_haswell'),
                            'type' => 'select',
                            'options' => array(
                                'inherit'=>'Inherit',
                                'hide'=>'Hide', 
                                'show' => 'Show',
                                'hide_only_sticky' => 'Hide on sticky menu'
                            ),
                        ));
                        cms_options(array(
                            'id' => 'page_menu_border_color',
                            'label' => __('Menu Border - First Level','wp_haswell'),
                            'type' => 'color',
                            'default' => ''
                        ));
                    ?>
                </div>
                    <?php
                        $menus = array();
                        $menus[''] = 'Default';
                        $obj_menus = wp_get_nav_menus();
                        foreach ($obj_menus as $obj_menu){
                            $menus[$obj_menu->term_id] = $obj_menu->name;
                        }
                        $navs = get_registered_nav_menus();
                        foreach ($navs as $key => $mav){
                            cms_options(array(
                            'id' => $key,
                            'label' => $mav,
                            'type' => 'select',
                            'options' => $menus,
                            'desc' => __('This option only appear for Default Menu (the first menu)', 'wp_haswell')
                            ));
                        }
                    ?>
                </div>
                </div>
                <div id="tabs-page-title">
                <?php
                /* page title. */
                cms_options(array(
                    'id' => 'page_title',
                    'label' => __('Custom','wp_haswell'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                    'follow' => array('1'=>array('#page_title_enable'))
                ));
                ?> 
                <div id="page_title_enable">
                    <?php
                        /*cms_options(array(
                            'id' => 'enable_page_title',
                            'label' => __('Page title display','wp_haswell'),
                            'type' => 'select',
                            'options' => array(
                                'inherit' => __('Inherit','wp_haswell'),
                                'none' => __('Hide','wp_haswell'),
                            ),
                        ));*/
                        cms_options(array(
                            'id' => 'page_title_text',
                            'label' => __('Title','wp_haswell'),
                            'type' => 'text',
                        ));
                        cms_options(array(
                            'id' => 'page_title_sub_text',
                            'label' => __('Sub Title','wp_haswell'),
                            'type' => 'text',
                        ));
                        cms_options(array(
                            'id' => 'page_title_stye',
                            'label' => __('Page Title Style','wp_haswell'),
                            /*'type' => 'select',
                            'options' => array(
                                'default' => __('Default','wp_haswell'),
                                'small_white' => __('Small White','wp_haswell'),
                                'small_dark' => __('Small Dark','wp_haswell'),
                                'big_grey' => __('Big Grey','wp_haswell'),
                                'big_white' => __('Big White','wp_haswell'),
                                'big_dark' => __('Big Dark','wp_haswell'),
                                'big_image' => __('Big Image','wp_haswell'),
                                'large_image' => __('Large Image','wp_haswell'),
                            ),*/

                            'type' => 'imegesselect',
                            'options' => array(
                                'none' => get_template_directory_uri().'/inc/options/images/pagetitle/no-pagetitle.png',
                                'default' => get_template_directory_uri().'/inc/options/images/pagetitle/small-grey.png',
                                'big_grey' => get_template_directory_uri().'/inc/options/images/pagetitle/big-grey.png',
                                'small_white' => get_template_directory_uri().'/inc/options/images/pagetitle/small-white.png',
                                'big_white' => get_template_directory_uri().'/inc/options/images/pagetitle/big-white.png',
                                'small_dark' => get_template_directory_uri().'/inc/options/images/pagetitle/small-dark.png',
                                'big_dark' => get_template_directory_uri().'/inc/options/images/pagetitle/big-dark.png',
                                'big_image' => get_template_directory_uri().'/inc/options/images/pagetitle/big-image.png',
                                'large_image' => get_template_directory_uri().'/inc/options/images/pagetitle/large-image.png',
                            )
                        ));
                        cms_options(array(
                            'id' => 'page_title_color',
                            'label' => __('Page title color','wp_haswell'),
                            'type' => 'color',
                            'default' => '',
                            'rgba' => true
                        ));
                        cms_options(array(
                            'id' => 'page_sub_title_color',
                            'label' => __('Sub title color','wp_haswell'),
                            'type' => 'color',
                            'default' => '',
                            'rgba' => true
                        ));
                        cms_options(array(
                            'id' => 'page_title_color_hover',
                            'label' => __('Page title color hover','wp_haswell'),
                            'type' => 'color',
                            'default' => '',
                            'rgba' => true
                        ));
                        cms_options(array(
                            'id' => 'page_title_image',
                            'label' => __('Page Title Background Image (Only apply for Big Image and Large Image)','wp_haswell'),
                            'type' => 'image',
                            'default' => ''
                        ));
                        cms_options(array(
                            'id' => 'dis_pagetitle_border',
                            'label' => __('Hide Page Title Border','wp_haswell'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),
                        ));
                        cms_options(array(
                            'id' => 'page_title_padding_top',
                            'label' => __('Page Title Padding Top (Only apply for Big Image and Large Image - In pixel)','wp_haswell'),
                            'type' => 'text',
                        ));    
                    ?>
                    </div>
                </div>
                    
                <div id="tabs-footer">
                    <?php
                        /* Footer. */
                        cms_options(array(
                            'id' => 'footer',
                            'label' => __('Custom Footer','wp_haswell'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),
                            'follow' => array('1'=>array('#page_footer_enable'))
                        ));
                    ?>  
                    <div id="page_footer_enable">
                        <?php
                            cms_options(array(
                                'id' => 'disable_bottom',
                                'label' => __('Hide Bottom Area','wp_haswell'),
                                'type' => 'select',
                                'options' => array(
                                    'inherit' => __('Inherit','wp_haswell'),
                                    'hide' => __('Hide','wp_haswell'),
                                ),
                            ));
                            cms_options(array(
                                'id' => 'footer_layout',
                                'label' => __('Layout','wp_haswell'),
                                'type' => 'imegesselect',
                                'options' => array(
                                    '1' => get_template_directory_uri().'/inc/options/images/footer/footer1.png',
                                    '2' => get_template_directory_uri().'/inc/options/images/footer/footer2.png',
                                    '3' => get_template_directory_uri().'/inc/options/images/footer/footer3.png',
                                    '4' => get_template_directory_uri().'/inc/options/images/footer/footer4.png',
                                )
                            ));
                            
                        ?>
                    </div>
                </div>

                <div id="tabs-one-page">
                    <?php
                    cms_options(array(
                        'id' => 'one_page',
                        'label' => __('Enable','wp_haswell'),
                        'type' => 'switch',
                        'options' => array('on'=>'1','off'=>''),
                        'follow' => array('1'=>array('#one-page-enable'))
                    ));
                    ?>
                    <div id="one-page-enable">
                        <?php
                        cms_options(array(
                            'id' => 'one_page_speed',
                            'label' => __('Speed','wp_haswell'),
                            'type' => 'text',
                            'placeholder' => '1000'
                        ));
                        cms_options(array(
                            'id' => 'one_page_easing',
                            'label' => __('Easing','wp_haswell'),
                            'type' => 'select',
                            'options' => array(
                                '' => '',
                                'easeInQuad' => 'easeInQuad',
                                'easeOutQuad' => 'easeOutQuad',
                                'easeInOutQuad' => 'easeInOutQuad',
                                'easeInCubic' => 'easeInCubic',
                                'easeOutCubic' => 'easeOutCubic',
                                'easeInOutCubic' => 'easeInOutCubic',
                                'easeInQuart' => 'easeInQuart',
                                'easeOutQuart' => 'easeOutQuart',
                                'easeInOutQuart' => 'easeInOutQuart',
                                'easeInQuint' => 'easeInQuint',
                                'easeOutQuint' => 'easeOutQuint',
                                'easeInOutQuint' => 'easeInOutQuint',
                                'easeInSine' => 'easeInSine',
                                'easeOutQuad' => 'easeOutQuad',
                                'easeOutSine' => 'easeOutSine',
                                'easeInOutSine' => 'easeInOutSine',
                                'easeInExpo' => 'easeInExpo',
                                'easeOutExpo' => 'easeOutExpo',
                                'easeInOutExpo' => 'easeInOutExpo',
                                'easeInCirc' => 'easeInCirc',
                                'easeOutCirc' => 'easeOutCirc',
                                'easeInOutCirc' => 'easeInOutCirc',
                                'easeInElastic' => 'easeInElastic',
                                'easeOutElastic' => 'easeOutElastic',
                                'easeInOutElastic' => 'easeInOutElastic',
                                'easeInBack' => 'easeInBack',
                                'easeOutBack' => 'easeOutBack',
                                'easeInOutBack' => 'easeInOutBack',
                                'easeInBounce' => 'easeInBounce',
                                'easeOutBounce' => 'easeOutBounce',
                                'easeInOutBounce' => 'easeInOutBounce'
                            )
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /* Pricing Option */
    function pricing_page_option() {
        echo '<div class="pricing-option-wrap">';
        cms_options(array(
            'id' => 'price',
            'label' => __('Price','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'cents',
            'label' => __('Cents','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'time',
            'label' => __('Time','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'value',
            'label' => __('Value','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'option1',
            'label' => __('Option 1','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'option2',
            'label' => __('Option 2','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'option3',
            'label' => __('Option 3','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'option4',
            'label' => __('Option 4','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'option5',
            'label' => __('Option 5','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'option6',
            'label' => __('Option 6','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'option7',
            'label' => __('Option 7','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'option8',
            'label' => __('Option 8','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'option9',
            'label' => __('Option 9','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'option10',
            'label' => __('Option 10','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'button_url',
            'label' => __('Button Url','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'button_text',
            'label' => __('Button Text','wp_haswell'),
            'type' => 'text',
        ));
        cms_options(array(
            'id' => 'is_feature',
            'label' => __('Is feature','wp_haswell'),
            'type' => 'switch',
            'options' => array('on'=>'1','off'=>''),
        ));
        /*cms_options(array(
            'id' => 'best_value',
            'label' => __('Best Value','wp_haswell'),
            'type' => 'text',
        ));*/
        echo '</div>';
    }

    function team_page_options(){
        ?>
        <div class="team-position">
            <?php
                cms_options(array(
                    'id' => 'page_team_position',
                    'label' => __('Team Position','wp_haswell'),
                    'type' => 'text',
                ));
            ?>
        </div>
        <?php
    }
    function team_page_social(){
        ?>
        <div class="team-social">
            <?php
                cms_options(array(
                    'id' => 'icon1',
                    'label' => __('Icon 1','wp_haswell'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'link1',
                    'label' => __('Link 1','wp_haswell'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'icon2',
                    'label' => __('Icon 2','wp_haswell'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'link2',
                    'label' => __('Link 2','wp_haswell'),
                    'type' => 'text',
                )); 
                cms_options(array(
                    'id' => 'icon3',
                    'label' => __('Icon 3','wp_haswell'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'link3',
                    'label' => __('Link 3','wp_haswell'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'icon4',
                    'label' => __('Icon 4','wp_haswell'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'link4',
                    'label' => __('Link 4','wp_haswell'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'icon5',
                    'label' => __('Icon 5','wp_haswell'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'link5',
                    'label' => __('Link 5','wp_haswell'),
                    'type' => 'text',
                )); 
                cms_options(array(
                    'id' => 'icon6',
                    'label' => __('Icon 6','wp_haswell'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'link6',
                    'label' => __('Link 6','wp_haswell'),
                    'type' => 'text',
                ));
            ?>
        </div>
        <?php
    }

    function portfolio_single_option(){
        ?>
        <div class="single-portfolio">
            <?php
                cms_options(array(
                    'id' => 'single_portfolio_style',
                    'label' => __('Single Portfolio Style','wp_haswell'),
                    'type' => 'select',
                    'options' => array(
                        'style1'=>'Carousel Gallery',
                        'style2'=>'List Gallery',
                        'style3'=>'Special Gallery',
                    )
                ));
                cms_options(array(
                    'id' => 'single_portfolio_project_description',
                    'label' => __('Project Description','wp_haswell'),
                    'type' => 'textarea',
                ));
                cms_options(array(
                    'id' => 'single_portfolio_client',
                    'label' => __('Client','wp_haswell'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'single_portfolio_view_project',
                    'label' => __('View Project URL','wp_haswell'),
                    'type' => 'text',
                ));
                cms_options(array(
                    'id' => 'single_portf_media',
                    'label' => __('Gallery','wp_haswell'),
                    'type' => 'editor',
                ));
            ?>
        </div>
        <?php
    }
}

new CMSMetaOptions();