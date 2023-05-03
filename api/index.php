<?php

add_action( 'rest_api_init', 'mypwp_check_user');
function mypwp_check_user(){
    global $wpdb ; 

    if(isset($_POST['user_email']) && $_POST['user_email']){
        $user = get_user_by('email', $_POST['user_email']);
    }else{
        return;
    }

    
    $GLOBALS['mypwp_temp_data']['mypwp_user'] = array();
    // deb($user->ID);exit();
    $GLOBALS['mypwp_temp_data']['mypwp_user']['ID'] = $user; 
    $GLOBALS['mypwp_temp_data']['mypwp_user']['MyTempData'] = get_user_meta( $user->ID, 'MyTempData', true ) ; 

    
    if($_POST['action'] && $_POST['action'] === 'UploadCagamasDataScreen2'){
        require_once MYPLUGINWP_PATH . 'api/UploadCagamasDataScreen2.php' ;
    }


    //http://demo.test/wp-json/api/v1/data
    //  register_rest_route( 'api/v1', '/data', array(
    
    //http://demo.test/wp-json/jwt-auth/data
    register_rest_route( 'jwt-auth', '/data', array(
        'methods' => 'POST',
        'callback' => 'mypwp_check_user_callback'
    ));

    // register_rest_route( 'api', '/data', array(
    //     'methods' => 'POST',
    //     'callback' => 'mypwp_check_user_callback'
    // ));



}

function mypwp_check_user_callback(){
    return json_encode($GLOBALS['mypwp_temp_data']); 
    // return json_encode("salam"); 
}



  
?>