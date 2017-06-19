<?php 
$id =get_the_ID();
 $sidepark=get_post_meta($id, "cebian",true);
 
 if(!$sidepark){ dynamic_sidebar('sidebar-widgets4');}
  elseif($sidepark==='modle1'){   
   dynamic_sidebar('cebian_'.$id);
  }else{
	   dynamic_sidebar($sidepark);
	  }
?>
