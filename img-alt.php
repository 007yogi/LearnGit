<?php
$postImg = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

$arr = explode('/', $postImg);

$img_with_ext = end($arr);

$broken = explode( '.', $img_with_ext);
$extension = array_pop($broken);
$img_alt_name = implode('.', $broken);