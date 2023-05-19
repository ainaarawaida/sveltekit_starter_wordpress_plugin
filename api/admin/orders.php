<?php

$posts = get_posts([
    'post_type' => 'shop_order',
    'post_status' => array('wc-pending'),
    'numberposts' => -1
    // 'order'    => 'ASC'
  ]);
$GLOBALS['mypwp_temp_data']['post'] = $posts;

?>