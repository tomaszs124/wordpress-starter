<?php
    if (array_key_exists('img_id', $args) || (array_key_exists('img', $args))):

        if (array_key_exists('img_id', $args)){
            $img_id = $args['img_id'];
            if ($img_id){

                $image_data = wp_get_attachment_image_src($img_id, 'full');
                
                $url = $image_data[0];
                $width = $image_data[1];
                $height = $image_data[2];
                
                $sizes = array(
                    'full' => wp_get_attachment_image_url( $img_id, 'full', false )
                );
                // add the additional image sizes
                foreach ( wp_get_additional_image_sizes() as $img_size => $values ) {
                    $sizes[$img_size]['url'] = wp_get_attachment_image_url($img_id, $img_size);
                    $sizes[$img_size]['width'] = $values['width'];
                    $sizes[$img_size]['height'] = $values['height'];
                }
                $img = [
                    'url' => $url,
                    'width' => $width,
                    'height' => $height,
                    'sizes' => $sizes,
                ];
            }else{
                $img = false;
            }


        }
        if (array_key_exists('img', $args)){
            $img = $args['img'];
        }
        if ($img){
            $ratio =  $img['height'] / $img['width'];
            $ratio_width = '50';
            $ratio_height = $ratio_width * $ratio;
            $placeholder = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 ". $ratio_width ." ". $ratio_height ."'%3E%3C/svg%3E";
            $final_img = $img['url'];
            $final_img_w = $img['width'];
            $final_img_h = $img['height'];
            $alt = '';

            if (array_key_exists('alt', $args)){
                $alt = $args['alt'];
            }

            if (array_key_exists('size', $args)){
                $size = $args['size'];
                $final_img = $img['sizes'][$size]['url'];
                $final_img_w = $img['sizes'][$size]['width'];
                $final_img_h = $img['sizes'][$size]['height'];
            }

            if (array_key_exists('zoom', $args)){
                $zoom_size = $args['zoom'];
                $zoom_img = $img['sizes'][$zoom_size]['url'];
            }
        }
    ?>
    <?php if ($img): ?>
        <div class="lazy__box" style="padding-bottom: <?= $ratio * 100 * 0 ?>%">
            <img class="lazy__img lazy img-fluid <?= isset($args['zoom']) ? 'zoom' : '' ?>" data-magnify-src="<?= isset($args['zoom']) ? $zoom_img : '' ?>" src="<?= $placeholder ?>" data-src="<?= $final_img ?>" alt="<?= $alt ?>" width="<?= $final_img_w ?>" height="<?= $final_img_h ?>">
        </div>
    <?php endif; ?>
<?php endif; ?>