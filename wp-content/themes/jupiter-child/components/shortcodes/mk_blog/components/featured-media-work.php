<?php

// To let Visual Composer load shortcodes through ajax.
if(method_exists('WPBMap', 'addAllMappedShortcodes')) {
        WPBMap::addAllMappedShortcodes();
}


$image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id() , 'full');

$image_permalink = isset($view_params['single_post']) ? $image_src_array[0] : get_permalink();
$image_permalink_class = isset($view_params['single_post']) ? 'mk-lightbox' : '';

// Do not output random placeholder images in single post if the post does not have a featured image!
$dummy = isset($view_params['single_post']) ? false : true;

$featured_image_src = Mk_Image_Resize::resize_by_id_adaptive( get_post_thumbnail_id(), $view_params['image_size'], $view_params['image_width'], $view_params['image_height'], $crop = false, $dummy);
$image_size_atts = Mk_Image_Resize::get_image_dimension_attr(get_post_thumbnail_id(), $view_params['image_size'], $view_params['image_width'], $view_params['image_height']);

if (!Mk_Image_Resize::is_default_thumb($image_src_array[0])) {
            echo '<a class="full-cover-link '.$image_permalink_class.'" title="' .  the_title_attribute(array('echo' => false)) . '" href="' . $image_permalink . '">&nbsp;</a>';
            echo '<img alt="' . the_title_attribute(array('echo' => false)) . '" title="' . the_title_attribute(array('echo' => false)) . '" src="'.$featured_image_src['dummy'].'" '.$featured_image_src['data-set'].' width="'.esc_attr($image_size_atts['width']).'" height="'.esc_attr($image_size_atts['height']).'" itemprop="image" />';
            echo '<div class="image-hover-overlay"></div>';
            echo '<div class="post-type-badge" href="' . get_permalink() . '">'.Mk_SVG_Icons::get_svg_icon_by_class_name(false, 'mk-li-' . $view_params['post_type']).'</div>';
        }

?>