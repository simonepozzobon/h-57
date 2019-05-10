<?php

/**
 * template part for blog single bold style header heading single.php. views/blog/components
 *
 * @author      Artbees
 * @package     jupiter/views
 * @version     5.1
 */

global $mk_options;

if (mk_get_blog_single_style() != 'bold') return false;

$image_array = wp_get_attachment_image_src(get_post_thumbnail_id() , 'full');
$hero_image_background = $image_array[0];
$hero_image_background_css = (!Mk_Image_Resize::is_default_thumb($hero_image_background)) ? 'background-image:url('.$hero_image_background.');' : '';


$blog_type_theme_options = $mk_options['single_blog_style'];

// Option to set hero image full height or custom
$full_height = !empty($mk_options['single_bold_hero_full_height']) ? $mk_options['single_bold_hero_full_height'] : 'true';
$full_height_attr = ($full_height == 'true') ? 'data-mk-component="FullHeight"' : '';

// Option to set the hero image height when full height option is disabled
$hero_custom_height = !empty($mk_options['bold_single_hero_height']) ? $mk_options['bold_single_hero_height'] : 800;
$hero_custom_height_css = ($full_height == 'false') ? ('height:'.$hero_custom_height.'px') : '';


$blog_type = get_post_meta($post->ID, '_single_blog_style', true);


if ( $blog_type == '' || $blog_type == 'default' ) {
	$blog_style = $blog_type_theme_options;
}else {
	$blog_style = $blog_type;
}
?>
