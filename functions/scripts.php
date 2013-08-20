<?php
/**
 * Enqueue scripts and stylesheets
 */
function viral_scripts($DEVELOPMENT) {

	if (!is_admin() && current_theme_supports('jquery-cdn')) {
		wp_deregister_script('jquery');
		//wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, null, false);
	}

	if (is_single() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('jquery', get_bloginfo('template_url') . '/js/jquery-1.9.1.min.js',false,false,true);
	wp_enqueue_script('bootstrap', get_bloginfo('template_url') . '/js/bootstrap/bootstrap.min.js',false,false,true);
	wp_enqueue_script('datepicker', get_bloginfo('template_url') . '/js/min/bootstrap-datepicker.min.js',false,false,true);
	wp_enqueue_script('swipe', get_bloginfo('template_url') . '/js/min/touchSwipe.min.js',false,false,true);
	wp_enqueue_script('custom', get_bloginfo('template_url') . '/js/min/custom.min.js',false,false,true);
}
add_action('wp_enqueue_scripts', 'viral_scripts', 100);