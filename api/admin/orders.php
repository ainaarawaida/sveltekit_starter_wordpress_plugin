<?php

$posts = get_posts([
    'post_type' => 'shop_order',
    'post_status' => array('wc-pending', 'wc-processing', 'wc-on-hold', 'wc-completed', 'wc-cancelled', 'wc-refunded', 'wc-failed'),
    'numberposts' => -1,
  ]);

  foreach($posts as $key => $val){
    $posts[$key]->_order_total = get_post_meta( $val->ID, '_order_total', true ) ;
  }
$GLOBALS['mypwp_temp_data']['post'] = $posts;

?>