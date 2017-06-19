<?php 
 global $wp_query;
 $term_id = get_query_var('cat');

 $sidepark=get_option('catce_'.$term_id);

if(!$sidepark){ dynamic_sidebar('sidebar-widgets4');}
  elseif($sidepark==='modle1'){   
   dynamic_sidebar('catce_'.$term_id);
  }else{
	   dynamic_sidebar($sidepark);
	  }
?>
