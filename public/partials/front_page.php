

<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="#">
	<?php wp_head(); ?>

    <?php

$dir    = SVELTEKITAUTH_PATH.'myapp/build/_app/immutable';
$files1 = scandir($dir);
$listlink = array(); 
$footerlink = array();
foreach ($files1 as $key => $value){
    if (in_array($value,array(".",".."))) continue ;
       
        if(in_array($value,array("chunks","entry"))){
            // deb($value);
            $files2 = scandir($dir.'/'.$value);
            foreach ($files2 as $key2 => $value2){
                if (in_array($value2,array(".",".."))) continue ;
                // deb($value2);
                $files3 = explode(".", $value2);
                if (!in_array($files3[0],array("start","index","singletons","parse","app"))) continue ;
                // deb($files3);
                $listlink[] = $value."/". $value2 ;
                if($value == 'entry' && in_array($files3[0],array("start","app"))){
                    $footerlink[] = SVELTEKIT_URL."/myapp/build/_app/immutable/".$value."/". $value2 ; 
                }
            }
        }
       
}




foreach($listlink AS $key => $val){
    ?>
    <link rel="modulepreload" href="<?php echo SVELTEKIT_URL ; ?>/myapp/build/_app/immutable/<?php echo $val ; ?>">

<?php

}


?>
   

</head>
<body data-sveltekit-preload-data="hover">

<?php wp_body_open(); ?>

        
          <?php  
    
                  if ( have_posts() ) :
              while ( have_posts() ) : the_post(); ?>

                  <?php the_content() ?>
              
              <?php endwhile;

          else :
              echo '<p>There are no posts!</p>';

          endif;

          ?>



<div style="display: contents">
<script>

    let footerlink = <?php echo json_encode($footerlink) ;  ?> ;

    let importlist = [];

    for(let a = footerlink.length ; a > 0 ; a--){
        importlist.push(import(footerlink[a-1])) ; 
    }

        {
            __sveltekit_1i8lks2 = {
                base: "",
                env: {}
            };

            const element = document.currentScript.parentElement;
            Promise.all(importlist).then(([kit, app]) => {
                    kit.start(app, element);
                });

            // try {
            //     Promise.all(importlist).then(([kit, app]) => {
            //         kit.start(app, element);
            //     });
            // }
            // catch(err) {
            // console.log(err)
            // }


           
        }
    </script>
</div>
  

<?php
wp_footer();

?>


</body>
</html>


