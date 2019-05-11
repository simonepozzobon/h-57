<!DOCTYPE html>
<html <?php echo language_attributes();?> >
<head>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>-->
        <?php wp_head(); ?>

</head>
<body <?php body_class(mk_get_body_class(global_get_post_id())); ?> <?php echo get_schema_markup('body'); ?> data-adminbar="<?php echo is_admin_bar_showing() ?>">
	<?php do_action('theme_after_body_tag_start'); ?>
	<div id="top-of-page"></div>

		<div id="mk-boxed-layout">

			<div id="mk-theme-container" <?php echo is_header_transparent('class="trans-header"'); ?>>
				<?php mk_get_header_view('styles', 'header-'.get_header_style());
