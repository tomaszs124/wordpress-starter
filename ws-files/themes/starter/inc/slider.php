<?php
function slide_setup_post_type() {
    $args = array(
        'public'    => true,
        'label'     => 'Slider',
        'menu_icon' => 'dashicons-tickets-alt',
        'hierarchical' => true,
        'supports' => ['title', 'revisions']
    );
    register_post_type( 'slide', $args );
}
// add_action( 'init', 'slide_setup_post_type' );