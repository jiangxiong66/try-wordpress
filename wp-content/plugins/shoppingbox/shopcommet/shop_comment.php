<?php

function zdy_shop_comment($post_id){
		$zdy_shop_comment = get_post_meta($post_id ,"shop_comment", true);
	
	 if($zdy_shop_comment){
		   $arraylist=split("\n",$zdy_shop_comment); 
	
	 foreach ($arraylist as $a)
                     {
						 $arraylist3=  split("\|",$a); 
					  
					 $names_hiddens=  cut_str($arraylist3[0], 1, 0).'**'.cut_str($arraylist3[0], 1, -1);
							
							$tap.= ' <li id="load-li_shop"> 
            <p> <b>'.$names_hiddens.'</b>  <span>'. $arraylist3[1].'</span></p>
             <p title="'.$arraylist3[2].'星评价"id="order_stars" class="order_stars_'.$arraylist3[2].'"></p>
           
             <p>'. $arraylist3[3].'</p>
            </li>';
	
						 }
						
						 return $tap;
						 
						 } 
	
	}




function shop_comment(){
	global $wpdb;
	 $postid =get_the_ID();
	  $total_trade = $wpdb->get_var("SELECT COUNT(alipay_id)     FROM $wpdb->alipay  WHERE  alipay_post='".$postid ."' and alipay_comment !=''");
	  $s_perpage = 15;
      $pages_1 = ceil($total_trade / $s_perpage);
      $page_1=isset($_GET['star']) ?intval($_GET['star']) :1;
      $offset = $s_perpage*($page_1-1);
	  $list = $wpdb->get_results("SELECT * FROM $wpdb->alipay WHERE  alipay_post='".$postid ."' and alipay_comment !='' order by alipay_time DESC  limit $offset,$s_perpage");
	 $page_links = ( array(
    'base' =>  add_query_arg( 'star', '%#%' ),
    'format' => '',
	'mid_size'=> 9,
    'total' => $pages_1,
    'current' => $page_1
	
) );
	
	
	$commet_loop .='<div id="shop_comment" class="shop_comment"><b class="shop_comment_title" >用户评分：</b> <ul  id="comment_li_shop">';
    $commet_loop .=zdy_shop_comment($postid);
	if($list) {
			foreach($list as $value)
			{ 
			$username=get_userdata( $value->alipay_user);
			
			$str = $username->display_name;
			$startdate=$value->alipay_orderstatus;
			$alipay_express =$value->alipay_express;
			$enddate= date('Y-m-d H:i:s');
            $names_hidden=  cut_str($str, 1, 0).'**'.cut_str($str, 1, -1);
			if($value->alipay_comment!=""){$alipay_comment=$value->alipay_comment;}else{$alipay_comment="系统默认好评";}
			if($value->alipay_stars!=""){$star=$value->alipay_stars;}else{$star="5";}
			
			$date=floor((strtotime($enddate)-strtotime($startdate))/86400);
			if($value->alipay_stars ){ 
			 $commet_loop .= '
            
            <li id="load-li_shop"> 
            <p> <b>'.$names_hidden.'</b>  <span>'. $value->alipay_time.'</span></p>
             <p title="'.$star.'星评价"id="order_stars" class="order_stars_'.$star.'"></p>
           
             <p>'. $alipay_comment.'</p>
            </li>
            
			';
		 }
		 
		
	
			
			
			}
			
	
		
			
			

	$commet_loop .= '</ul></div>'; }elseif(zdy_shop_comment($postid)){$commet_loop = '<div class="shop_comment"> <ul>'.zdy_shop_comment($postid).'</ul></div>';}else{$commet_loop = '<div class="shop_comment"> <ul>'.zdy_shop_comment($postid).'</ul></div>';}
		 if($page_links){ $commet_loop .= '<div class="commnt-pagination">'.paginate_links($page_links).'</div>
		   
  <script type="text/javascript">
jQuery(document).ready(function($){
$(".commnt-pagination a").click( function(e){
      $(".commnt-pagination a").removeClass("now_c");
	   $(".commnt-pagination .current").removeClass("now_c");
	  $(this).addClass("now_c");
	  
	    e.preventDefault();
		
var link = $(this).attr("href");
$("#comment_li_shop").html("Loading…");
        $("#comment_li_shop").fadeOut(500).load(link + "#comment_li_shop #load-li_shop", function(){ $("#comment_li_shop").fadeIn(500); });
    });
	
	$(".commnt-pagination .current").click( function(e){
		$(".commnt-pagination a").removeClass("now_c");
		$(this).addClass("now_c");
     var link = "'.get_permalink( $postid ).'?star=1";
$("#comment_li_shop").html("Loading…");
        $("#comment_li_shop").fadeOut(500).load(link + "#comment_li_shop #load-li_shop", function(){ $("#comment_li_shop").fadeIn(500); });
    });
	
	});
	
	

</script> 
		 
		 
		 ';}
	return $commet_loop ;
	}
		
add_shortcode('comment_short', 'shop_comment');
	
	function shop_comment_number(){
   global $wpdb;
	    $postid =get_the_ID();
		$zdy_shop_comment = get_post_meta($postid ,"shop_comment", true);
	 if($zdy_shop_comment){
		   $arraylist=split("\n",$zdy_shop_comment); 
	$is=0;
	 foreach ($arraylist as $a)
                     {
						$is++;
 }
} 
		
		
        $list = $wpdb->get_results("SELECT * FROM $wpdb->alipay WHERE  alipay_post='".$postid ."'");
		$i=0;
	if($list) {
			foreach($list as $value)
			{ 
			
	
			if($value->alipay_stars){$i++;};
			}}
	return $i+$is;
	}
	
	
	function shop_comment_stars(){
	global $wpdb;
	 $postid =get_the_ID();
	 
	 		$zdy_shop_comment = get_post_meta($postid ,"shop_comment", true);
	 if($zdy_shop_comment){
		   $arraylist=split("\n",$zdy_shop_comment); 
	$is=0;
	 foreach ($arraylist as $a)
                     {
						 $arraylist3=  split("\|",$a);
						$is++;
						$star_zdy+=$arraylist3[2];
 }
} 
	  $list = $wpdb->get_results("SELECT * FROM $wpdb->alipay WHERE  alipay_post='".$postid ."'");
	 
        $sum=0;
		$i=0;
	if($list) {
			foreach($list as $value)
			{ 
			
			$sum+=$value->alipay_stars;
			if($value->alipay_stars){$i++;};
			}}
		
		$sums=$sum+$star_zdy;
		$iss=$i+$is;
		
		
		if($sums!=0){return ceil($sums/$iss);	}else{return $sums;}
		
		

		
	}

?>