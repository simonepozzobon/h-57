<?php
/**
 * @package   The_Grid
 * @author    Themeone <themeone.master@gmail.com>
 * @copyright 2015 Themeone
 */

// Exit if accessed directly
if (!defined('ABSPATH')) { 
	exit;
}

$tg_area_elements = $tg_grid_data['area_top1_elements'];

if (!empty($tg_area_elements)) {

	$area  = '<!-- The Grid Area Top 1 -->';
	$area .= '<div class="tg-grid-area-top1">';
		foreach($tg_area_elements as $tg_area_element) {
			$area .= $tg_area_element;
		}
	$area .= '</div>';
	
	echo $area;

}
