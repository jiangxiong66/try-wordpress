<?php

function order_list(){
    
  $shop_edit_profile = get_option('shop_edit_profile'); 
  $shop_edit_url =get_page_link($shop_edit_profile);
  $shop_bbs_open=get_option('shop_bbs_open');
  $shop_profile = get_option('shop_profile');
   $shop_profile_url=get_page_link( $shop_profile );
	$bbs_my_page=get_option('bbs_my_page');
  $post_url_true=strstr($shop_profile_url,'?');
  if($post_url_true){$cart_url='&cart=ture';}else{$cart_url='?cart=ture';}
	 global $wpdb;
		
	  global $current_user;    get_currentuserinfo();
		     $user_ID = $current_user->id ;
              $url=get_permalink($shop_profile)."?page=alipay_list";
			    $shop_style = get_option('shop_style');
			  $total_trade   = $wpdb->get_var("SELECT COUNT(alipay_id)  FROM $wpdb->alipay WHERE  alipay_user='".$user_ID."' and alipay_status !='购物车'"); 
			  $total_trade_cart   = $wpdb->get_var("SELECT COUNT(alipay_id)  FROM $wpdb->alipay WHERE  alipay_user='".$user_ID."' and alipay_status ='购物车'"); 
			  $s_perpage = 5;
              $pages = ceil($total_trade / $s_perpage);
               $page=isset($_GET['pagenum']) ?intval($_GET['pagenum']) :1;
			  $offset = $s_perpage*($page-1);
	
    ?>

     <h3 class="per_title"><a class="info" href="<?php echo get_page_link( $shop_profile );  ?>">进行中的订单（<?php echo $total_trade; ?>）</a><a href="<?php echo get_page_link( $shop_profile ).$cart_url;  ?>">购物车（<?php echo $total_trade_cart; ?>）</a><?php if($shop_bbs_open){echo '<a href="'.get_page_link( $bbs_my_page ).'">我的帖子</a>';} ?></h3>
    <ul class="order_list">
    <p><?php 
       
             
			 if($_GET['alipay_stars']!=""){
		  
		   $expressid =$_GET['expressid'];
		    $alipay_stars=$_GET['alipay_stars'];
			$alipay_comment=$_GET['alipay_comment'];
			   $wpdb->query("update $wpdb->alipay set alipay_stars='".$alipay_stars."'  where alipay_num=".$expressid."");
			   $wpdb->query("update $wpdb->alipay set alipay_comment='".$alipay_comment."' where alipay_num=".$expressid."");
			
			
		  
		   echo "<script language='javascript' type='text/javascript'>window.location.href='".get_permalink()."' </script>'";  
		   }  
			  
			  

      if(isset($_GET['action']) && $_GET['action']=="editorder"){
		  $orderid =$_GET['numid'];
		  $list = $wpdb->get_results("SELECT * FROM $wpdb->alipay WHERE  alipay_num='".$orderid."' order by alipay_time DESC  limit $offset,$s_perpage"); 
		  }else{ $list = $wpdb->get_results("SELECT * FROM $wpdb->alipay WHERE  alipay_user='".$user_ID."' and alipay_status !='购物车' order by alipay_time DESC  limit $offset,$s_perpage"); }
	if($list) {
			foreach($list as $value)
			{	
			
			
			
                $postid=$value->alipay_post;
				$username=get_userdata( $value->alipay_user);
              
				$totalprice=$value->alipay_price;
				$alipay_nmbers=$value->alipay_nmbers;
			
				$alipay_body=$value->alipay_body;
				$last_name=$username->last_name;
			    $Address=$username->Address;
				$tell=$value->alipay_tell;
				$alipay_email=$value->alipay_email;
				$alipay_stars=$value->alipay_stars;
				$alipay_comment=$value->alipay_comment;
                $shop_download_pay=get_post_meta( $postid, 'shop_download_pay', true);
			$alipay_express =$value->alipay_express;
			$postage_nmber=get_post_meta( $postid, 'postage', true);
			
			$postage_shunfeng   = get_option('postage_shunfeng');
$postage_yuantong   = get_option('postage_yuantong');
$postage_yunda   = get_option('postage_yunda');
$postage_zhongtong   = get_option('postage_zhongtong');
$postage_debangwuliu  = get_option('postage_debangwuliu');
$postage_ems  = get_option('postage_ems');
$postage_p1   = get_option('postage_p1');
$postage_p_n1  = get_option('postage_p_n1');
$postage_p_j1   = get_option('postage_p_j1');
$postage_p2   = get_option('postage_p2');
$postage_p_n2  = get_option('postage_p_n2');
$postage_p_j2   = get_option('postage_p_j2');
$postway=get_post_meta($postid,"postage", true);
	  
	  switch ($postway){
		  case 'shunfeng':
		      $postage =  $postage_shunfeng ;
			  $postname ='顺丰快递';
		   break;
		   case 'yuantong' :
		      $postage =  $postage_yuantong  ;
			  $postname ='圆通快递';
		   break;
		    case 'yunda' :
		      $postage =  $postage_yunda  ;
			   $postname ='韵达快递';
		   break;
		    case 'zhongtong' :
		      $postage =  $postage_zhongtong  ;
			   $postname ='中通快递';
		   break;
		    case 'debangwuliu' :
		      $postage =  $postage_debangwuliu   ;
			   $postname ='德邦物流';
		   break;
		    case 'ems' :
		      $postage =  $postage_ems   ;
			  $postname ='EMS';
		   break;
		   
		     case $postage_p_n1  :
		      $postage =  $postage_p_j1;
			  $postname =$postage_p1;
		   break;
		   
		    case $postage_p_n2  :
		      $postage =  $postage_p_j2   ;
			  $postname =$postage_p2;	
		   break;
		   case ""  :
		      $postage = "0";
			  $postname ="包邮";	
		   break;
		   default: $postage ="0";$postname ="包邮";	
		   
		  }
			$unitprice=	($totalprice-$postage)/$alipay_nmbers;
				
				
			if($value->alipay_orderstatus!='0000-00-00 00:00:00')
			{
				
			    $startdate=$value->alipay_orderstatus;
				$enddate= date('Y-m-d H:i:s');
				$date=floor((strtotime($enddate)-strtotime($startdate))/86400);
				
				
				  if($date>10 ||$value->alipay_stars !=""){$alipay_orderstatus="<strong>交易完成</strong><br>发货时间：".$value->alipay_orderstatus;$gone="style='background: #e1e1e1'";}
				  
				  else
				  { $alipay_orderstatus="于".$value->alipay_orderstatus."已发货，还有".(10-$date)."天系统自动收货" ; $gone="style='background:#D2FFD2'"; }
				
				
			
			}
			
			else{$alipay_orderstatus="等待处理";$gone="style='background:#F9DDC6'";}
				
		if($shop_download_pay!=''){if($value->alipay_status=='等待卖家发货'||$value->alipay_status=='等待买家确认'){$gone="style='background:#D2FFD2'";}
		
		elseif($alipay_stars!=""||$value->alipay_status=='交易成功'){$gone="style='background: #e1e1e1'";}}	
		
	?>


   <li>
   <div class="order_top" style="background:#ECFFFF" ><b>订单号：<?php echo $value->alipay_num; ?></b>
             <?php if($alipay_express!="" &&$alipay_stars==""){ ?>
                <a class="pingfen"  <?php echo "href='".$url."&numid=".$value->alipay_num."&action=editorder'"; ?>>收货并评价</a>
              <?php }elseif( $shop_download_pay!=''&&$alipay_stars==""&&$value->alipay_status !='未付款'&&$value->alipay_status !='等待买家付款'){?>  <a class="pingfen"  <?php echo "href='".$url."&numid=".$value->alipay_num."&action=editorder'"; ?>>评价和评分</a><?php }
			  elseif( $shop_download_pay!=''&&$alipay_stars!=""){echo '<em>已评价 <a target="_blank"  href="'.get_permalink( $postid ).'#shop_comment"> [查看]</a></em>';}
			  elseif($alipay_express==""){echo "<em>等待发货</em>";}else{echo '<em>已评价 <a target="_blank"  href="'.get_permalink( $postid ).'#shop_comment"> [查看]</a></em>';} ?>
    </div>
       <a target="_blank" class="order_pic" href="<?php echo get_permalink( $postid ); ?>"><?php echo get_the_post_thumbnail($postid, 'thumbnail') ?></a>
       <div class="order_more">
            <a target="_blank"  class="order_post_name" href="<?php echo get_permalink( $postid ); ?>"> <?php echo get_post($postid)->post_title; ?></a>
            <p>[下单时间]  <?php echo $value->alipay_time; ?></p>
           <p>总价：<strong class="red"> ￥<?php echo $totalprice; ?></strong>[含邮1费]</p>
            <a id="more_info">[展开订单详细]</a>
            <div class="more_info">
             <p>单价：￥<?php echo $unitprice; ?>  |  数量：<?php echo $alipay_nmbers; ?>  |  邮费￥：<?php echo $postage ?></p>
            <p <?php echo $gone; ?> class="orderstatus">付款状态：<?php echo $value->alipay_status; ?><br />  <?php if( !$shop_download_pay){ ?>订单状态：<?php echo $alipay_orderstatus; ?><?php } ?>
           
              <?php if( $shop_download_pay ){ ?>
              <strong>下载地址：</strong><?php  if($value->alipay_status=='等待卖家发货'||$value->alipay_status=='等待买家确认'||$value->alipay_status=='交易成功'||$value->alipay_dl!=''){ ?>
              <a target="_blank" href="<?php
			  $user_info=wp_get_current_user();
			   echo WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)).'/download.php?id='.$user_info->ID.'&postid='.$postid.'&alipay_status='.$value->alipay_status; ?>"><?php echo '点击下载' ?></a><?php }else{?><a>付款成功后下载</a>
              <?php } } ?>
            <?php if( !$shop_download_pay ){ ?>
            <?php if($alipay_express){ ?>
            <br /><strong>快递单号： <?php echo $alipay_express."</strong>";  ?>
			<a target="_blank" <?php echo  "href='http://www.kuaidi100.com/chaxun?com=".$postage_nmber."&nu=".$alipay_express."'" ?>>[点击查询快递]</a><?php };?></p>
            <p>收货人：<?php echo $last_name; ?></p>
            <p>收货电话：<?php echo $tell; ?>  |  收货电子邮箱：<?php echo $alipay_email;?></p>
            <p>默认发货地址：<?php echo $Address; ?>  <a href="<?php echo $shop_edit_url  ?>">[修改]</a></p><?php } ?>
            <p>用户备注：<br /><?php echo $alipay_body; ?></p>
            </div>
   
   </li>







                       
    <?php
}}else{echo "<li><p class='nooder'>没有任何交易记录</p></li>";}?>

<?php   if(isset($_GET['action']) && $_GET['action']=="editorder"){
	     $orderid =$_GET['numid']; 
		 if(!$alipay_comment){
	?>
	
    <li>
    <div class="order_comment">
    <?php 
	$permalink_structure =get_option('permalink_structure');
	if($permalink_structure){
	$url_f=get_permalink($shop_profile)."?page=alipay_list";}else{$url_f=WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__))."/get_comment.php";} ?>
       <form action="<?php echo $url_f; ?>" method="get">
      <p id="order_stars">
         <a title="1"  class="order_star"></a>
         <a title="2"  class="order_star"></a>
         <a title="3"  class="order_star"></a>
         <a title="4"  class="order_star"></a>
         <a title="5"  class="order_star"></a> 
         <em>(5)</em>分</p>
       <p>
    <label>评价</label>
    <textarea  name="alipay_comment" id="alipay_comment"><?php echo $alipay_comment; ?></textarea>
    </p>
    <p>
    <input type="hidden"  name="alipay_stars" id="alipay_stars" value="5" />
   
                <input type="hidden" name="expressid" id="expressid" value="<?php echo $orderid; ?>"/>
                 <input type="submit" class='button-primary' value="提交评价">
    </p>
    </form>
    </div>
    </li>

    <script language="javascript">
	
     $("#order_stars").children("a").mouseenter(function() {
	
		 var index = $(this).attr('title');
		 var yes = "order_stars_"+index
		 $("#order_stars").removeClass().addClass(yes);
		 $("#alipay_stars").val($(this).attr('title'));
		 $("#order_stars").children("em").html($(this).attr('title'))
	 });
	 
    
    </script>	
<?php   }}?>
   <script>
   
   $('a#more_info').click(function() { 
	    if($(this).hasClass('more_open')){
				   $(this).removeClass('more_open')
			$(this).next('.more_info').slideUp(500);
	
		    $(this).html('[展开订单详细]');
			  }else{
			 $(this).addClass('more_open')
	       $(this).next('.more_info').slideDown(500);
	
		     $(this).html('[关闭订单详细]');
			  } 	 
	 });
   
   </script> 
</ul>
<div class="order-pagination">
<span class="pagination-links">一共有<?php echo $pages ?>页(<?php echo $page ?>/<?php echo $pages ?>)
      </span>
        <?php
	
	$page_links = ( array(
    'base' =>  add_query_arg( 'pagenum', '%#%' ),
    'format' => '',
	'mid_size'=> 10,
	'prev_next'    => true,
    'prev_text' => __( '上一页' ),
    'next_text' => __( '下一页' ),
    'total' => $pages,
	'add_args'     => False,
    'current' => $page
	
) );
echo  paginate_links($page_links);
	?>

</div>
<?php };?>