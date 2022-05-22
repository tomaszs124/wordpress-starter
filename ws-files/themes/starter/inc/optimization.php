<?php
//hide wordpess version

remove_action('wp_head', 'wp_generator');
define('THE_CAMELS_FILE_VERSION', '0000001');
function rm_generator_filter() {
  return '';
}
if(!function_exists('thecamels_remove_wp_ver_css_js')) :
  function thecamels_remove_wp_ver_css_js($src) {
    if(strpos($src, 'ver=' . get_bloginfo( 'version'))) {
      $src = remove_query_arg( 'ver', $src );
    }
    if(!strpos($src, '?')) {
      $src .= '?ver=' . THE_CAMELS_FILE_VERSION;
    }
    return $src;
  }
endif;
add_filter('the_generator', 'rm_generator_filter');
add_filter('style_loader_src', 'thecamels_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'thecamels_remove_wp_ver_css_js', 9999);
add_filter('get_the_generator_html', 'rm_generator_filter');
add_filter('get_the_generator_xhtml', 'rm_generator_filter');
add_filter('get_the_generator_atom', 'rm_generator_filter');
add_filter('get_the_generator_rss2', 'rm_generator_filter');
add_filter('get_the_generator_comment', 'rm_generator_filter');
add_filter('get_the_generator_export', 'rm_generator_filter');
add_filter('wf_disable_generator_tags', 'rm_generator_filter');


//disble xmlrpc

function remove_xmlrpc_pingback_ping( $methods ) {
    unset($methods['pingback.ping']);
    unset($headers['X-Pingback']);
    return $methods;
  }
add_filter('xmlrpc_enabled', '__return_false');
add_filter('xmlrpc_methods', 'remove_xmlrpc_pingback_ping' );

//disable emojis

function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

        $urls = array_diff($urls, array($emoji_svg_url));
    }

    return $urls;
}

// disable comments

add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
    
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});