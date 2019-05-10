<?php 
/**
 * template part for Header. views/header/styles
 *
 * @author      Artbees
 * @package     jupiter/views
 * @version     5.0.0
 */
global $mk_options;

    /*
    * These options comes from header shortcode and will only be used to override the header options through shortcode.
    */
    $header_class = array(
        'sh_id' => isset($view_params['id']) ? $view_params['id'] : Mk_Static_Files::shortcode_id(),
        'is_shortcode' => isset($view_params['is_shortcode']) ? $view_params['is_shortcode'] : false,
        'sh_toolbar' => isset($view_params['toolbar']) ? $view_params['toolbar'] : '',
        'sh_is_transparent' => isset($view_params['is_transparent']) ? $view_params['is_transparent'] : '',
        'sh_header_style' => isset($view_params['header_styles']) ? $view_params['header_styles'] : '',
        'sh_header_align' => isset($view_params['header_align']) ? $view_params['header_align'] : '',
        'sh_hover_styles' => isset($view_params['hover_styles']) ? $view_params['hover_styles'] : $mk_options['main_nav_hover'],
        'el_class' => isset($view_params['el_class']) ? $view_params['el_class'] : '',
    );
    
    $is_transparent = (isset($view_params['is_transparent'])) ? ($view_params['is_transparent'] == 'false' ? false : is_header_transparent()) : is_header_transparent();
    $is_shortcode = $header_class['is_shortcode'];
    $menu_location = isset($view_params['menu_location']) ? $view_params['menu_location'] : '';
    
    $show_logo = isset($view_params['logo']) ? $view_params['logo'] : false;
    $seconday_show_logo = isset($view_params['burger_icon']) ? $view_params['burger_icon'] : false;
    $show_cart = isset($view_params['woo_cart']) ? $view_params['woo_cart'] : false;
    $search_icon = isset($view_params['search_icon']) ? $view_params['search_icon'] : false;

?> 
<?php if(is_header_and_title_show($is_shortcode)) : ?>
    <header <?php echo get_header_json_data($is_shortcode, $header_class['sh_header_style']); ?> <?php echo mk_get_header_class($header_class); ?> <?php echo get_schema_markup('header'); ?>>
        <?php if (is_header_show($is_shortcode)): ?>
            <div class="mk-header-holder">
                <?php mk_get_header_view('holders', 'toolbar', ['is_shortcode' => $is_shortcode]); ?>
                <div class="mk-header-inner add-header-height">

                    <div class="mk-header-bg <?php echo mk_get_bg_cover_class($mk_options['header_size']); ?>"></div>

                    <?php if (is_header_toolbar_show($is_shortcode) == 'true') { ?>
                        <div class="mk-toolbar-resposnive-icon"><?php Mk_SVG_Icons::get_svg_icon_by_class_name(true, 'mk-icon-chevron-down'); ?></div>
                    <?php } ?>

                    <?php if($mk_options['header_grid'] == 'true'){ ?>
                            <div class="mk-grid header-grid">
                    <?php } ?>

                            <div class="mk-header-nav-container one-row-style menu-hover-style-<?php echo $header_class['sh_hover_styles']; ?>" <?php echo get_schema_markup('nav'); ?>>
                                <?php
                                mk_get_header_view('master', 'main-nav', ['menu_location' => $menu_location, 'logo_middle' => $mk_options['logo_in_middle']]);
                                
                                if($search_icon != 'false') { 
                                    mk_get_header_view('global', 'nav-side-search', ['header_style' => 1]);
                                }
                                if($show_cart != 'false') { 
                                    mk_get_header_view('master', 'checkout', ['header_style' => 1]);
                                }
                                if($seconday_show_logo != 'false') {
                                    mk_get_header_view('global', 'secondary-menu-burger-icon', ['is_shortcode' => $is_shortcode, 'header_style' => 1]);
                                }
                                ?>
                            </div>
                            <?php    
                                mk_get_header_view('global', 'main-menu-burger-icon', ['header_style' => 1]);                            
                                if($show_logo != 'false') { 
                                    mk_get_header_view('master', 'logo');
                                }
                            ?>

                    <?php if($mk_options['header_grid'] == 'true'){ ?>
                        </div>
                    <?php } ?>

                    <div class="sp-header-right">
                        <?php //if ( is_front_page() ) { ?>
                            <div class="sp-color-wrapper">
                            <svg id="Livello_1" data-name="Livello 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 50">
                                <polygon class="cls-1 sp-text-color-picker blue" points="53.38 16.08 49.82 22.24 53.38 28.41 60.49 28.41 64.05 22.24 60.49 16.08 53.38 16.08"/>
                                <polygon class="cls-2 sp-text-color-picker brown" points="74.74 16.08 71.18 22.24 74.74 28.41 81.85 28.41 85.41 22.24 81.85 16.08 74.74 16.08"/>
                                <polygon class="cls-3 sp-text-color-picker gray" points="64.06 22.24 60.5 28.41 64.06 34.57 71.17 34.57 74.73 28.41 71.17 22.24 64.06 22.24"/>
                                <polygon class="cls-4 sp-color-picker red" points="85.42 22.24 81.86 28.41 85.42 34.57 92.53 34.57 96.09 28.41 92.53 22.24 85.42 22.24"/>
                                <polygon class="cls-5 sp-color-picker brown" points="96.1 16.08 92.54 22.24 96.1 28.41 103.21 28.41 106.77 22.24 103.21 16.08 96.1 16.08"/>
                                <polygon class="cls-6 sp-color-picker orange" points="117.46 16.08 113.9 22.24 117.46 28.41 124.57 28.41 128.13 22.24 124.57 16.08 117.46 16.08"/>
                                <polygon class="cls-7 sp-color-picker gray" points="138.82 16.08 135.26 22.24 138.82 28.41 145.93 28.41 149.49 22.24 145.93 16.08 138.82 16.08"/>
                                <polygon class="cls-8 sp-color-picker blue" points="106.78 22.24 103.22 28.41 106.78 34.57 113.89 34.57 117.45 28.41 113.89 22.24 106.78 22.24"/>
                                <polygon class="cls-9 sp-color-picker green" points="128.14 22.24 124.58 28.41 128.14 34.57 135.25 34.57 138.81 28.41 135.25 22.24 128.14 22.24"/>
                            </svg>
                            </div>
                        <?php //} ?>
                        <?php if ( is_active_sidebar( 'sp-translate' ) ) : ?>
                            <div id="sp-translate-widget" class="widget-area" role="complementary">
                                <?php dynamic_sidebar( 'sp-translate' ); ?>
                            </div><!-- #primary-sidebar -->
                        <?php endif; ?>
                    </div>

                </div>
                <?php mk_get_header_view('global', 'responsive-menu', ['menu_location' => $menu_location, 'is_shortcode' => $is_shortcode]); ?>        
            </div>
        <?php endif;// End for option to disable header ?>

        <?php mk_get_header_view('global', 'header-sticky-padding', ['is_shortcode' => $is_shortcode]); ?>
        <?php if(!$is_transparent) mk_get_view('layout', 'title', false, ['is_shortcode' => $is_shortcode]); ?>
        
    </header>
<?php endif; // End to disale whole header