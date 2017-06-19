<?php
/*购物车列表，结算*/
function order_list_cart(){
     $pay_way_p= get_option('pay_way_p');
  $shop_edit_profile = get_option('shop_edit_profile'); 
  $shop_edit_url =get_page_link($shop_edit_profile);
  $shop_bbs_open=get_option('shop_bbs_open');
  $shop_profile = get_option('shop_profile');
   $shop_profile_url=get_page_link( $shop_profile );
  $bbs_my_page=get_option('bbs_my_page');
  $post_url_true=strstr($shop_profile_url,'?');
  if($post_url_true){$cart_url='&cart=ture';}else{$cart_url='?cart=ture';}
  $delit='&del=';
	  global $wpdb;
		
	  global $current_user;    get_currentuserinfo();
		     $user_ID = $current_user->id ;
              $url=get_permalink($shop_profile)."?page=alipay_list";
			    $shop_style = get_option('shop_style');
			  $total_trade   = $wpdb->get_var("SELECT COUNT(alipay_id)     FROM $wpdb->alipay WHERE  alipay_user='".$user_ID."' and alipay_status='购物车'");
			    $total_trade_oder   = $wpdb->get_var("SELECT COUNT(alipay_id)  FROM $wpdb->alipay WHERE  alipay_user='".$user_ID."' and alipay_status !='购物车'"); 
			  $s_perpage = 5;
              $pages = ceil($total_trade / $s_perpage);
               $page=isset($_GET['pagenum']) ?intval($_GET['pagenum']) :1;
			  $offset = $s_perpage*($page-1);
			  
			   if($_GET['del']!=""){
				  $ids_del= $_GET['del'];
				     if($wpdb->query("DELETE  FROM $wpdb->alipay WHERE alipay_num = '$ids_del'"))
					{ echo '<script>window.location.href="'.get_page_link( $shop_profile ).$cart_url.'"</script>'; }
				   }
			  
			  
    ?>

    <h3 class="per_title"><a href="<?php echo get_page_link( $shop_profile );  ?>">进行中的订单（<?php echo  $total_trade_oder; ?>）</a><a class="info" href="<?php echo get_page_link( $shop_profile ).$cart_url;  ?>">我的购物车(<?php echo $total_trade; ?>)</a><?php if($shop_bbs_open){echo '<a href="'.get_page_link( $bbs_my_page ).'">我的帖子</a>';} ?></h3>
   
   <p class="pay_title">结算方式[注意，某些商品只支持一种结算方式，你可以在下面的按钮切换查看详细]</p>
   <form  method="post" target="_blank" action="<?php echo plugins_url('cartto.php', __FILE__ ); ?>" id="cart_jiesuan">
  
<div class="payway">

<?php 

if($pay_way_p=='cod'){$chosedesw='choseed';}
if($pay_way_p=='alipay'||!$pay_way_p){$chosedesw1='choseed';}

if($pay_way_p!='cod'){ ?>
<label for="alipay" class="alipay <?php echo $chosedesw1; ?>">
<input type="radio" name="pay_way" id="alipay" value="alipay" checked="checked" />
</label>
<?php }if($pay_way_p!='alipay'){ ?>
<label for="cod" class="cod <?php echo $chosedesw; ?>">
<input type="radio" name="pay_way"id="cod"  value="COD" />
</label>
<?php } ?>
</div>
 

 <p class="pay_title">结算列表</p>
   
    <ul class="order_list">
    
     
    <?php 
      
             
			 if($_GET['alipay_stars']!=""){
		  
		   $expressid =$_GET['expressid'];
		    $alipay_stars=$_GET['alipay_stars'];
			$alipay_comment=$_GET['alipay_comment'];
			   $wpdb->query("update $wpdb->alipay set alipay_stars='".$alipay_stars."'  where alipay_num=".$expressid." and alipay_status='购物车'");
			   $wpdb->query("update $wpdb->alipay set alipay_comment='".$alipay_comment."' where alipay_num=".$expressid." and alipay_status='购物车'");
			
			
		  
		   echo "<script language='javascript' type='text/javascript'>window.location.href='".get_permalink()."' </script>'";  
		   }  
			  
			  

      if(isset($_GET['action']) && $_GET['action']=="editorder"){
		  $orderid =$_GET['numid'];
		  $list = $wpdb->get_results("SELECT * FROM $wpdb->alipay WHERE  alipay_num='".$orderid."'  and alipay_status='购物车' order by alipay_time DESC  limit $offset,$s_perpage"); 
		  }else{ $list = $wpdb->get_results("SELECT * FROM $wpdb->alipay WHERE  alipay_user='".$user_ID."'  and alipay_status='购物车' order by alipay_time DESC  limit $offset,$s_perpage"); }
	if($list) {
		$i=0;
			foreach($list as $value)
			{	
                $postid=$value->alipay_post;
				$username=get_userdata( $value->alipay_user);
                $unitprice=get_post_meta( $postid, 'shop_price', true);
				$totalprice=$value->alipay_price;
				$alipay_nmbers=$value->alipay_nmbers;
				$postage =$totalprice-($unitprice*$alipay_nmbers); 
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
			
		$shop_way_box=get_post_meta($postid,"shop_way", true);
		
				
				
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


   <li class="<?php echo $shop_way_box; ?>">
  
   
   <div class="order_top" style="background:#ECFFFF"><b> <input type="checkbox" name="nunber_oder[]" alt="<?php echo $totalprice; ?>" value="<?php echo $value->alipay_num; ?>" />订单号：<?php echo $value->alipay_num; ?></b>
   <em><a class="delit" href="<?php echo get_page_link( $shop_profile ).$cart_url.$delit.$value->alipay_num;;  ?>">删除订单</a></em>
            
    </div>
       <a target="_blank" class="order_pic" href="<?php echo get_permalink( $postid ); ?>"><?php echo get_the_post_thumbnail($postid, 'thumbnail') ?></a>
       <div class="order_more">
            <a target="_blank"  class="order_post_name" href="<?php echo get_permalink( $postid ); ?>"> <?php echo get_post($postid)->post_title; ?></a>
            
            <p>单价：￥<?php echo $unitprice; ?>  |  数量：<?php echo $alipay_nmbers; ?>  |  邮费￥：<?php echo $postage ?>    |  下单时间:  <?php echo $value->alipay_time; ?>   <br />总价：<strong class="red"> ￥<?php echo $totalprice; ?></strong>[含邮费]   </p>
           
            
     
          
            <p>用户备注： <br /><?php echo $alipay_body; ?></p>
            
       </div>
   </li>







                       
    <?php
}}else{echo "<li><p class='nooder'>没有任何交易记录</p></li>";}?>
<script language="javascript">

<?php  if($pay_way_p=="cod"){ ?>
$('.online').hide();
<?php }else{ ?>
$('.no_online').hide();
<?php } ?>
 $(".alipay").click(function(){
	 $(this).addClass("choseed");
	 $(".cod").removeClass("choseed");
	 $('.online').slideDown(300);
	 $('.no_online').slideUp(300);
	 });
	 
 $(".cod").click(function(){
			 $(this).addClass("choseed");$(".alipay").removeClass("choseed")
			 $('.online').slideUp(300);
	         $('.no_online').slideDown(300);
 });

    Array.prototype.sum = function ()
{
	for (var sum = i = 0; i < this.length; i++)
	sum += parseInt(this[i]);
	return sum;
};
$('.order_top').children('b').children('input').bind("click", function () {
var result = new Array();
var  sums =0;
	var   nunbe=1; 
$.each($(":checkbox[name='nunber_oder[]']"),function(){
	
	   if ($(this).is(":checked")) {
	   result.push($(this).attr("alt"));
	}
	});
money=result.sum();
$('#jiesuan').html('共计'+money+'元')
            });
$('.delit').click(function(){ if( confirm("确认要删除吗") ){ }else{ return false;}});	


</script>
 
 <div class="payway">
  <p class="pay_title">结算总计</p>
<b id="jiesuan">还没有选择需要结算的商品</b>


</div>
 <p class="pay_title">收货信息</p> 
 
<div class="payway">
<?php global $current_user;    get_currentuserinfo();
		 $user_ID = $current_user->id ;
					 $user_email =$current_user->user_email;
					 $last_name =$current_user->last_name;
	                 $Address = $current_user->Address ;
	                 $Phone = $current_user->Phone;
	                 $QQ = $current_user->QQ;	
					  $shop_edit_profile = get_option('shop_edit_profile'); 
					  $shop_edit_url =get_page_link($shop_edit_profile);
 ?>
<p><strong>收货人：<?php echo  $last_name; ?></strong><br />
<strong>收货电话：<?php echo   $Phone; ?></strong><br />
<strong>收货地址：<?php echo   $Address; ?></strong><br />
<a href="<?php echo $shop_edit_url ; ?>" target="_blank">点击修改收货人信息</a>
</p>
</div>
 
<input type="submit" name="cart_submit" id="cart_submit"  value="现在结算" onclick="return confirm('确认结算吗?');"/>
</form>
<?php   if(isset($_GET['action']) && $_GET['action']=="editorder"){
	     $orderid =$_GET['numid']; 
		 if(!$alipay_comment){
	?>
	
  

  
<?php   }}?>

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