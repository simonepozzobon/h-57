<?php

    // Add defer to scripts loaded
    // add_filter('clean_url', function ($url) {
    //     if (false === strpos($url, '.js')) { // not our file
    //     return $url;
    //     }
    // // Must be a ', not "!
    // return "$url' defer='defer";
    // }, 11, 1);

    function add_theme_scripts()
    {
        wp_enqueue_script('script', get_template_directory_uri() . '-child/assets/js/custom.min.js', array( 'jquery' ), 1.1, true);
    }
    add_action('wp_enqueue_scripts', 'add_theme_scripts');

// Custom Login Setup

    function my_custom_login()
    {
        echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
    }
    add_action('login_head', 'my_custom_login');

    function my_login_logo_url()
    {
        return get_bloginfo('url');
    }
    add_filter('login_headerurl', 'my_login_logo_url');

    function my_login_logo_url_title()
    {
        return 'H-57 - Creative Station';
    }
    add_filter('login_headertitle', 'my_login_logo_url_title');

    function login_error_override()
    {
        return 'Incorrect login details.';
    }
    add_filter('login_errors', 'login_error_override');

// Translate position

    function sp_Translate()
    {
        register_sidebar(array(
            'name'          => 'Translate',
            'id'            => 'sp-translate',
            'before_widget' => '<div class="sp-translate">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="rounded">',
            'after_title'   => '</h2>',
        ));
    }
    add_action('widgets_init', 'sp_Translate');

// Add Color Picker files

    function add_theme_color_picker()
    {
        wp_enqueue_script("jquery-ui-core");
        wp_enqueue_script("jquery-effects-core");
    }
    add_action('wp_enqueue_scripts', 'add_theme_color_picker');

// Preloader Function
    function mk_preloader_body_overlay() {
        global $mk_options;
        $preloader_check = '';
        $post_id = global_get_post_id();

        $singular_preloader = ($post_id) ? get_post_meta($post_id, 'page_preloader', true) : '';

        if ($singular_preloader == 'true') {
            $preloader_check = 'enabled';
        }
        else {
            if ($mk_options['preloader'] == 'true') {
                $preloader_check = 'enabled';
            }
        }
        if ($preloader_check == 'enabled') {
            echo '<div class="mk-body-loader-overlay page-preloader" style="background-color:'.$mk_options['preloader_bg_color'].';">';
            $loaderStyle = isset($mk_options['preloader_animation']) ? $mk_options['preloader_animation'] : 'ball_pulse';

            if (!empty($mk_options['preloader_logo'])) {
                $preloader_logo_id = mk_get_attachment_id_from_url($mk_options['preloader_logo']);
                if ( !empty($preloader_logo_id) ) {
                    $preloader_logo_array = wp_get_attachment_image_src($preloader_logo_id, 'full', true);
                    $prelaoder_logo_width = $preloader_logo_array[1];
                    $prelaoder_logo_height = $preloader_logo_array[2];
                } else {
                    $preloader_logo_array = mk_getimagesize($mk_options['preloader_logo']);
                    $prelaoder_logo_width = $preloader_logo_array[0];
                    $prelaoder_logo_height = $preloader_logo_array[1];
                }

                if ( $mk_options['retina_preloader'] == 'true' ) {
                    $prelaoder_logo_width = absint($prelaoder_logo_width/2);
                    $prelaoder_logo_height = absint($prelaoder_logo_height/2);
                }
                echo '<img alt="'.get_bloginfo('name').'" class="preloader-logo" src="'.$mk_options['preloader_logo'].'" width="' . $prelaoder_logo_width . '" height="' . $prelaoder_logo_height . '" >';

            }

            echo ' <div id="preloader-area" class="preloader-preview-area">';
            if($loaderStyle == "ball_pulse"){
                // echo '<div class="element"></div>';
                echo '<img src="'.get_template_directory_uri().'-child/assets/img/loading.gif" width="170" height="113">'; // here generates the code for the custom animation   </div>'; // here generates the code for the custom animation


            }else if($loaderStyle == "ball_clip_rotate_pulse") {
                echo '  <div class="ball-clip-rotate-pulse">
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="border-color: '.$mk_options['preloader_icon_color'].' transparent '.$mk_options['preloader_icon_color'].' transparent;"></div>
                        </div>';
            }else if($loaderStyle == "square_spin") {
                echo '  <div class="square-spin">
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                        </div>';
            }else if($loaderStyle == "cube_transition") {
                echo '  <div class="cube-transition">
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                        </div>';
            }else if($loaderStyle == "ball_scale") {
                echo '  <div class="ball-scale">
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                        </div>';
            }else if($loaderStyle == "line_scale") {
                echo '  <div class="line-scale">
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                        </div>';
            }else if($loaderStyle == "ball_scale_multiple") {
                echo '  <div class="ball-scale-multiple">
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                        </div>';
            }else if($loaderStyle == "ball_pulse_sync") {
                echo '  <div class="ball-pulse-sync">
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                        </div>';
            }else if($loaderStyle == "transparent_circle") {
                echo '  <div class="transparent-circle" style="
                                border-top-color: '.mk_hex2rgba($mk_options['preloader_icon_color'], 0.2).';
                                border-right-color: '.mk_hex2rgba($mk_options['preloader_icon_color'], 0.2).';
                                border-bottom-color: '.mk_hex2rgba($mk_options['preloader_icon_color'], 0.2).';
                                border-left-color: '.$mk_options['preloader_icon_color'].';">
                        </div>';
            }else if($loaderStyle == "ball_spin_fade_loader") {
                echo '  <div class="ball-spin-fade-loader">
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                            <div style="background-color: '.$mk_options['preloader_icon_color'].'"></div>
                        </div>';
            }
            echo "  </div>";
            echo "</div>";
        }
    }

    add_action('theme_after_body_tag_start', 'mk_preloader_body_overlay');

    // Remove Woocommerce Reviews
    add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
    function wcs_woo_remove_reviews_tab($tabs) {
      unset($tabs['reviews']);
      return $tabs;
    }

    /* Remove Meta */
    //Remove All Meta Generators
    function remove_meta_generators($html) {
        $pattern = '/<meta name(.*)=(.*)"generator"(.*)>/i';
        $html = preg_replace($pattern, '', $html);
        return $html;
    }
    function clean_meta_generators($html) {
        ob_start('remove_meta_generators');
    }
    add_action('get_header', 'clean_meta_generators', 100);
    remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
    remove_action('wp_head', 'wp_generator');
