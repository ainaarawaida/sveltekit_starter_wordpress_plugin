<?php


if(isset($_POST['process']) && $_POST['process']== "updateOrder"){

  $my_post = array(
    'ID' =>  $_POST['orderid'],
    'post_title'    =>'Order',
    'post_content'  => '',
    'post_status'   => $_POST['order_status'],
    'post_type'   => 'shop_order',
    'post_author'   => $user->ID,
  );
  $id = wp_update_post( $my_post );
  $GLOBALS['mypwp_temp_data']['post'] = $id;
}
else if(isset($_POST['process']) && $_POST['process']== "getOrder"){

  $my_post = get_post($_POST['postId']);
  $id = $my_post->ID ;

  $customers = get_users();

  $args = array(
    'post_type'   => 'product'
  );

  $getProduct = get_posts( $args );
  foreach($getProduct AS $key => $val){
    $getProduct[$key]->cost = get_post_meta( $val->ID, '_price', true ) ;
  }

  $GLOBALS['mypwp_temp_data']['post'] = $id;
  $GLOBALS['mypwp_temp_data']['customers'] = $customers;
  $GLOBALS['mypwp_temp_data']['getProduct'] = $getProduct;
}else{
  // Create post object
  $my_post = array(
    'post_title'    =>'Order',
    'post_content'  => '',
    'post_status'   => 'auto-draft',
    'post_type'   => 'shop_order',
    'post_author'   => $user->ID,
  );
  $id = wp_insert_post( $my_post );

  // $customers = get_users( array( 'role__in' => array( 'administrator', 'subscriber' ) ) );
  $customers = get_users();

  $args = array(
    'post_type'   => 'product'
  );

  $getProduct = get_posts( $args );
  foreach($getProduct AS $key => $val){
    $getProduct[$key]->cost = get_post_meta( $val->ID, '_price', true ) ;
  }

  $GLOBALS['mypwp_temp_data']['post'] = $id;
  $GLOBALS['mypwp_temp_data']['customers'] = $customers;
  $GLOBALS['mypwp_temp_data']['getProduct'] = $getProduct;
}


?>