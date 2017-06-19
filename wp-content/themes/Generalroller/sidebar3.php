<?php 
 $id =get_the_ID(); 
$category = get_the_category($id );
$category_id = $category[0]->term_id;
 $category_sidbar=get_option('catce_'.$category_id );
 
 
 $sidepark=get_post_meta($id, "cebian",true);
 
 
  if($sidepark){    dynamic_sidebar($sidepark);  
  }elseif($category_sidbar){
            if ($category_sidbar==='modle1'){
				  dynamic_sidebar('catce_'.$category_id );}else{  dynamic_sidebar( $category_sidbar);  }
}else{
	  dynamic_sidebar('sidebar-widgets4');
	  }
?>
