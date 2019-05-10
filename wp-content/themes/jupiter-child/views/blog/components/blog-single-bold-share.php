<?php

/**
 * template part for blog single bold style social share single.php. views/blog/components
 *
 * @author      Artbees
 * @package     jupiter/views
 * @version     5.0.0
 */

if(mk_get_blog_single_style() != 'bold') return false;

global $mk_options;

$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id() , 'full', true)[0];

if($mk_options['single_blog_social'] == 'true' ) : ?>
<div class="mk-social-share layout-social-share">
	<h2 class="layout-social-title"><span>// Share</span></h2>
	<ul>
		<li><div class="layout-social-box">
			<a class="mk-blog-print layout-social-share-icon mk-button" onClick="window.print()" href="#" title="<?php _e('Print', 'mk_framework'); ?>">
			<span class="fa fa-print" aria-hidden="true"></span><span>PRINT</span>
			</a>
		</div></li>

		<?php if($mk_options['blog_single_comments'] == 'true') : if ( get_post_meta( $post->ID, '_disable_comments', true ) != 'false' ) { ?>
		<li><div class="layout-social-box">
			<a href="<?php echo get_permalink(); ?>#comments" class="blog-bold-comment layout-social-share-icon mk-button">
            <span class="fa fa-comment" aria-hidden="true"></span><span>COMMENT</span>
			</a>
		</div></li>
		<?php } endif; ?>

		<li><div class="layout-social-box">
			<a class="facebook-share layout-social-share-icon mk-button" data-title="<?php the_title_attribute(); ?>" data-url="<?php echo get_permalink(); ?>" href="#" title="facebook">
			<span class="fa fa-facebook" aria-hidden="true"></span><span>FACEBOOK</span>
			</a>
		</div></li>
		<li><div class="layout-social-box">
			<a class="twitter-share layout-social-share-icon mk-button" data-title="<?php the_title_attribute(); ?>" data-url="<?php echo get_permalink(); ?>" href="#" title="twitter">
            <span class="fa fa-twitter" aria-hidden="true"></span><span>TWITTER</span>
			</a>
		</div></li>
	</ul>
	<div class="clearboth"></div>
</div>
<?php endif; ?>
