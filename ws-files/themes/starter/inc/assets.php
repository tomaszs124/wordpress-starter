<?php
function get_svg($name){
    @$asset = file_get_contents(get_stylesheet_directory() . '/img/' . $name . '.svg');
    if ($asset){
        return $asset;
    }else{
        return false;
    }
}

function get_img($name){
    return get_stylesheet_directory_uri() . '/img/' . $name;
}
function image_sizes(){
    add_image_size('w5120', 5120,0, false);
    add_image_size('w2560', 3320,0, false);
    add_image_size('w3840', 4400,0, false);
    add_image_size('w1920', 2400,0, false);
    add_image_size('w1440', 1900,0, false);
    add_image_size('w960', 1200,0, false);
    add_image_size('w720', 860,0, false);

    add_image_size('940x666', 940,666, true);
    add_image_size('1400x1000', 1400,1000, true);
    add_image_size('700x500', 700,500, true);

    add_image_size('1440x540', 1440,540, true);
    add_image_size('2880x1080', 2880,1080, true);
    add_image_size('1920x720', 1920,720, true);
    add_image_size('900x640', 900,660, true);

    add_image_size('1080x1080', 1080,1080, true);

}

add_action( 'after_setup_theme', 'image_sizes' );

add_filter( 'jpeg_quality', function(){ return 95; } );
add_filter( 'big_image_size_threshold', '__return_false' );
