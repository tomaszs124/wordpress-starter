<?php

add_filter( 'auto_core_update_send_email', 'wpb_stop_auto_update_emails', 10, 4 );
  
function wpb_stop_update_emails( $send, $type, $core_update, $result ) {
if ( ! empty( $type ) && $type == 'success' ) {
return false;
}
return true;
}

add_filter( 'auto_plugin_update_send_email', '__return_false' );

add_filter( 'auto_theme_update_send_email', '__return_false' );