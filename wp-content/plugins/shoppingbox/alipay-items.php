<?php
 date_default_timezone_set('PRC');  
if(!class_exists('WP_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

function alipay_render_list_page(){
    
   
    ?>
    <div class="wrap">
        
  <style>
	.wp-post-image{ width:100%; height: auto;}
	td{ border-bottom:solid #CCC 1px;border-collapse:collapse; border-right: dashed 1px #ccc; }
	
	tr:hover{ background:#F2F2F2;}
	td p{ font-size:12px; line-height:14px; margin-bottom:1px !important;}
	td p.red{ color:#F00;}
	.tablenav a.current{ background:#2ea2cc !important; color:#FFF;}
</style>
     <?php if (!function_exists( 'shoppingbox_theme_support' ) ) { echo ' <p class="update-nag"><strong>请注意：未检测到正在使用的主题已经支持购物盒子插件，最基本请确保您的主题有登陆和注册的入口，或者按照我们提供的提示进行制作支持！若无登录入口，请勿选择屏蔽默认入口，否则将会无法登录</strong><br /><a href="http://www.themepark.com.cn/tag/zxzf" target="_blank">获取兼容的主题</a>/<a href="http://www.themepark.com.cn/shoppingbox-WordPress-plugins" target="_blank">制作兼容的主题</a></p>';  }?>
    <h2>订单查询</h2>
    <?php 
        global $wpdb;
		
       $total_trade   = $wpdb->get_var("SELECT COUNT(alipay_id)     FROM $wpdb->alipay");
       $total_success = $wpdb->get_var("SELECT COUNT(alipay_status) FROM $wpdb->alipay WHERE alipay_status = '交易成功'");
       $total_money   = $wpdb->get_var("SELECT SUM(alipay_price)    FROM $wpdb->alipay WHERE alipay_status = '交易成功'");
	

  
 	  $s_perpage = 10;
      $pages = ceil($total_trade / $s_perpage);
      $page=isset($_GET['p']) ?intval($_GET['p']) :1;
      $offset = $s_perpage*($page-1);
	  $list = $wpdb->get_results("SELECT * FROM $wpdb->alipay WHERE alipay_status != '购物车'  order by alipay_time DESC limit $offset,$s_perpage");
      $orderid= trim($_GET['orderid']);
	  $status=trim($_GET['status']);
	  $seach_v=trim($_GET['seach_v']);
	  $year=trim($_GET['year']);
	  $month=trim($_GET['month']);
	  if($orderid!=""){ $url =get_bloginfo('url').'/wp-admin/admin.php?page=alipay_list&seach_v='.$seach_v.'&orderid='.$orderid;  }
	  elseif($status !=""){ $url =get_bloginfo('url').'/wp-admin/admin.php?page=alipay_list&status='.$status;  }
	   elseif($month !=""){ $url =get_bloginfo('url').'/wp-admin/admin.php?page=alipay_list&year='.$year.'&month='.$month;  }
	  else{ $url =get_bloginfo('url').'/wp-admin/admin.php?page=alipay_list';  }
	  
	 if($month){
		 
		  $list = $wpdb->get_results("SELECT * FROM $wpdb->alipay WHERE  alipay_time LIKE '%".$year."-".$month."%' order by alipay_time DESC limit $offset,$s_perpage");
	 
	      $total_trade_times   = $wpdb->get_var("SELECT COUNT(alipay_id)     FROM $wpdb->alipay WHERE  alipay_time LIKE '%".$year."-".$month."%'" );
          $total_success_times = $wpdb->get_var("SELECT COUNT(alipay_status) FROM $wpdb->alipay WHERE alipay_status = '交易成功' and alipay_time LIKE '%".$year."-".$month."%'");
          $total_money_times  = $wpdb->get_var("SELECT SUM(alipay_price)    FROM $wpdb->alipay WHERE alipay_status = '交易成功' and alipay_time LIKE '%".$year."-".$month."%'"); 
	 
	  }
		
     if($orderid){ $list = $wpdb->get_results("SELECT * FROM $wpdb->alipay WHERE  ".$seach_v."='".$orderid."' order by alipay_time DESC limit $offset,$s_perpage"); }
		
$order_do =trim($_GET['order_do']);
 $order = $_GET['order'];
 if($status!=''){
	 $list = $wpdb->get_results("SELECT * FROM $wpdb->alipay WHERE alipay_status = '".$status."' order by alipay_time DESC  limit $offset,$s_perpage");
	 }
 
 
if($order_do ==1){
  
	 if($order){
                foreach($order as $i){
                    $wpdb->query("DELETE  FROM $wpdb->alipay WHERE alipay_num = '$i'");
                }
				
				echo "<script language='javascript' type='text/javascript'>window.location.href='".$url."' </script>'";  
				
				};
				
				
	}
	
	
	if(isset($_GET['action']) && $_GET['action']=="editorder"){
		
		$orderid =$_GET['numid'];
		 $list = $wpdb->get_results("SELECT * FROM $wpdb->alipay WHERE  alipay_num='".$orderid."'");
		
		 
		 }
		 
		  if($_GET['express']!=""){
		   $express =$_GET['express'];
		   $expressid =$_GET['expressid'];
		    $alipay_stars=$_GET['alipay_stars'];
			$alipay_comment=$_GET['alipay_comment'];
		   $time      = date('Y-m-d H:i:s');
		    $express_new=     $wpdb->get_var("SELECT  alipay_express FROM $wpdb->alipay WHERE  alipay_num='".$expressid."'");
			if($express !=$express_new){
		    $wpdb->query("update $wpdb->alipay set alipay_express='".$express."' where alipay_num=".$expressid."");
		    $wpdb->query("update $wpdb->alipay set alipay_orderstatus='".$time."' where alipay_num=".$expressid."");
			 }
			   $wpdb->query("update $wpdb->alipay set alipay_stars='".$alipay_stars."'  where alipay_num=".$expressid."");
			   $wpdb->query("update $wpdb->alipay set alipay_comment='".$alipay_comment."' where alipay_num=".$expressid."");
			
			
		  
		   echo "<script language='javascript' type='text/javascript'>window.location.href='".$url."' </script>'";  
		   }
		
 ?>
 	
<p class="update-nag"><strong>用户放入购物车的订单请单独查询，默认列表只显示正在进行中的交易</strong></p>  
<p><strong>查询结果：</strong>
<?php if($year!=""|| $month!=""){echo $year.'-'.$month ?>共有<?php echo number_format_i18n($total_trade_times ) ?>次交易，其中<?php echo number_format_i18n($total_success_times ) ?>完成了交易，收入<?php echo $total_money_times ;}else{ ?>
从第一笔交易以来，共有<?php echo number_format_i18n($total_trade) ?>次交易，其中<?php echo number_format_i18n($total_success) ?>完成了交易，收入<?php echo $total_money; }?>
  <?php  $localyear=date('Y',time());
          $localmonth=date('m',time());
  ?>
  
 
  <form action="admin.php" method="get">
       <label>按时间查询销量</label>
       <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
       <input type="text" name="year" size="10" value="<?PHP if($year!=""){echo $year;}else{echo  $localyear;} ?>" />年
       <input type="text" name="month"size="10"  value="<?PHP if($month!=""){echo $month;}else{echo  $localmonth;} ?>" />月
       <input type="submit" class="button"   value="查询"/> 
     </form>
     
  

   
</p>
    <div class="tablenav top">

  <div class="view-switch">
 
    <form action="admin.php" method="get">
    
	
    <label>订单查询</label>
	<input type="hidden" name="page" value="alipay_list" />
     <select name="seach_v" id="seach_v">
                   <option <?php if( $seach_v=='alipay_num'){echo 'selected="selected" ';} ?>  value='alipay_num'>订单号</option>
                   <option <?php if( $seach_v =='alipay_tell'){echo 'selected="selected" ';} ?>  value='alipay_tell'>手机号</option> 
                   <option <?php if( $seach_v =='alipay_email'){echo 'selected="selected" ';} ?>  value='alipay_email'>电子邮箱</option> 
                   <option <?php if( $seach_v =='alipay_title'){echo 'selected="selected" ';} ?>  value='alipay_title'>商品名称</option>  
	              </select>  
    
   <input type="text" name="orderid" />
   
	<input type="submit" class="button" value="搜索">
   <a style="width:auto; float:none;" class="button" href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=alipay_list">查看全部【不含购物车】</a>
	</form>
   
    </div> 
    

    
   

 <div class="alignleft actions "> 
   <form action="admin.php" method="get">
    	<input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
     <select name="status" id="status">
      <option  <?php if( $status =='购物车'){echo 'selected="selected" ';} ?> value='购物车'>购物车</option> 
                   <option  <?php if( $status =='交易成功'){echo 'selected="selected" ';} ?> value='交易成功'>交易成功</option>
                  
                   <option  <?php if( $status =='等待买家付款'){echo 'selected="selected" ';} ?> value='等待买家付款'>等待买家付款</option> 
                   <option  <?php if( $status =='等待卖家发货'){echo 'selected="selected" ';} ?> value='等待卖家发货'>等待卖家发货</option> 
                   <option  <?php if( $status =='等待买家确认'){echo 'selected="selected" ';} ?> value='等待买家确认'>等待买家确认</option>
        </select>
        <input type="submit" class="button" value="筛选">
   </form></div>
        <div class="alignleft actions "> 
           <form id="movies-filter" method="get">
          <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
            
            <select name="order_do" id="order_do">
                   <option value=''>批处理订单</option>
                   <option value='1'>删除</option>
               
	             </select>  
        <input type="submit" class="button"   value="应用"/> 
        
        </div>
     </div>
        <table class="wp-list-table widefat fixed posts" width="100%">
		<thead>
			<tr>
                <th width="2%"></th>
                <th width="6%">图片</th>
				<th width="7%">订单号</th>
				<th width="10%">商品名称</th>
				<th width="15%">价格</th>
                <th width="6%">用户名</th>
				<th width="25%">用户信息</th>	
                <th width="10%">评分和评论</th>	
                <th width="20%">订单状态</th>		
			</tr>
		</thead>
		<tbody>
        
        <?php
	$perpage=30;
	$offset = $perpage*($page-1);
	
		if($list) {
			foreach($list as $value)
			{
		$postid=$value->alipay_post;

				echo "<tr>\n";
				echo '<td><input type="checkbox" name="order[]" value="'.$value->alipay_num.'" /></td>';
			
				echo "<td><a target='_blank'  href='".get_permalink( $postid )."'>".get_the_post_thumbnail($postid, 'thumbnail')."</a></td>";
				echo "<td>$value->alipay_num</td>";
				echo "<td><a target='_blank'  href='".get_permalink( $postid )."'>".get_post($postid)->post_title."</a></td>\n";
				
				$shop_download_pay=get_post_meta( $postid, 'shop_download_pay', true);
				$totalprice=$value->alipay_price;
				$alipay_nmbers=$value->alipay_nmbers;
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
				echo "<td><p><strong>单价：</strong>".$unitprice."</p><p><strong>数量：</strong>".$alipay_nmbers."</p><p><strong>邮费：</strong>".$postage."</p><p class='red'><strong>总价：</strong>".$totalprice."</p></td>\n";
			
				$username=get_userdata( $value->alipay_user);
				echo  "<td>".$username->user_login."</td>\n";
				
			
			   
			           $alipay_body=$value->alipay_body;
				       $last_name=$username->last_name;
				       $Address=$username->Address;
					   $tell=$value->alipay_tell;
					   $alipay_email=$value->alipay_email;
				echo "<td><p><strong>下单时间：</strong>".$value->alipay_time."</p><p><strong>收货姓名：</strong>".$last_name."</p><p><strong>收货电话：</strong>".$tell."</p><p><strong>电子邮箱：</strong>".$alipay_email."</p><p><strong>默认地址：</strong>".$Address."</p><p class='red'><strong>用户备注：</strong><br />".$alipay_body."</p></td>\n";
				
				if($value->alipay_stars){$star=$value->alipay_stars.'星';}
				$alipay_comment=$value->alipay_comment;
	echo "<td><p><strong>用户评分：</strong>".$star."</p><p><strong>用户评论：</strong>".$alipay_comment."</p></td>\n";
	
	
	
			$alipay_express =$value->alipay_express;
			$postage_nmber=get_post_meta( $postid, 'postage', true);
			if($value->alipay_orderstatus!='0000-00-00 00:00:00')
			{
				
			    $startdate=$value->alipay_orderstatus;
				$enddate= date('Y-m-d H:i:s');
				$date=floor((strtotime($enddate)-strtotime($startdate))/86400);
				  if($date>10 ||$value->alipay_stars !=""){$alipay_orderstatus="<strong>交易完成</strong><br>发货时间：".$value->alipay_orderstatus;$gone="style='background:#e1e1e1'";}
			
				  else
				  { $alipay_orderstatus="于".$value->alipay_orderstatus."已发货，还有".(10-$date)."天系统自动收货" ; $gone="style='background:#D2FFD2'"; }
				
				
			
			}
			
			else{$alipay_orderstatus="等待处理";$gone="style='background:#F9DDC6'";}
			if($shop_download_pay!=''){if($value->alipay_status=='等待卖家发货'||$value->alipay_status=='等待买家确认')
			{$alipay_orderstatus="虚拟订单可下载无需处理";$gone="style='background:#D2FFD2'";}
			elseif($value->alipay_status=='交易成功'){$alipay_orderstatus="虚拟订单可下载无需处理";$gone="style='background:#e1e1e1'";}
			}	
			
			if($alipay_express !=""){$letsgo="<p>"."<strong>快递单号：</strong>".$alipay_express."</p><br /><p><a target='_blank'class='button' href='http://www.kuaidi100.com/chaxun?com=".$postage_nmber."&nu=".$alipay_express."'>查询快递</a></p><a target='_blank' ' href='".$url."&numid=".$value->alipay_num."&action=editorder'>修改订单</a></p>"; }elseif( !isset($_GET['action'])){$letsgo="<br /><p><a target='_blank' class='button-primary' href='".$url."&numid=".$value->alipay_num."&action=editorder'>点击处理</a></p>" ;}
				
				
					echo "<td ".$gone." ><p><strong>$value->alipay_status</strong></p><p>".$alipay_orderstatus."</p>".$letsgo."</td>";

				
				echo "</tr>";
			}
		}
		else
		{
			echo '<tr><td colspan="3" align="center"><strong>没有交易记录</strong></td></tr>';
		}
	?>
	</tbody>
	</table>
        
       </form> 
       <?php
	  
	   
	   if(isset($_GET['action']) && $_GET['action']=="editorder"){
		 
		 $orderid =$_GET['numid']; 
		  $alipay_stars=     $wpdb->get_var("SELECT  alipay_stars FROM $wpdb->alipay WHERE  alipay_num='".$orderid."'");
		  $alipay_comment = $wpdb->get_var("SELECT  alipay_comment FROM $wpdb->alipay WHERE  alipay_num='".$orderid."'");
		   $express_new=     $wpdb->get_var("SELECT  alipay_express FROM $wpdb->alipay WHERE  alipay_num='".$orderid."'");
		 ?> 
	
    <table class="wp-list-table widefat fixed posts" style="width:500px; float:right; margin-top:10px;">
		 <form action="admin.php" method="get">
    <tr><td><strong>编辑订单</strong></td></tr>	
   <tr> 
    <td><label for="express">快递单号：</label>
              <input type="text" name="express" id="express" value="<?php echo $express_new; ?>"/>
          </td>
           </tr> 
            <tr> 
                  <td>
                 <?php if($alipay_stars==""){echo "等待用户评分";}else{ ?> 
                  <label>用户评分</label>
                    <select name="alipay_stars" id="alipay_stars">
                      <option value='1' <?php if($alipay_stars==1){echo 'selected="selected" ';}?>>1星</option>
                      <option value='2' <?php if($alipay_stars==2){echo 'selected="selected" ';}?>>2星</option>
                      <option value='3' <?php if($alipay_stars==3){echo 'selected="selected" ';}?>>3星</option>
                      <option value='4' <?php if($alipay_stars==4){echo 'selected="selected" ';}?>>4星</option> 
                      <option value='5' <?php if($alipay_stars==5){echo 'selected="selected" ';}?>>5星</option>     
	              </select>  
                  <?php } ?>
               </td>
          </tr>
           <tr> 
              <td>
               <?php if($alipay_comment==""){echo "等待用户评论";}else{ ?> 
               <label>用户评价</label>
               <textarea style="width:98%;" name="alipay_comment" id="alipay_comment"><?php echo $alipay_comment; ?></textarea>
                 <?php } ?>
              </td>
          </tr>
           <tr> 
               <td align="right">
                <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
                <input type="hidden" name="expressid" id="expressid" value="<?php echo $orderid; ?>"/>
                 <input type="submit" class='button-primary' value="修改订单">
              </td>
          </tr>
   </tr>       
         
   </form>
    </table>
<?php } ?>
	    
       
       <div class="tablenav bottom"><div class="tablenav-pages" style="float:left;"><span class="pagination-links">一共有<?php echo $pages ?>页(<?php echo $page ?>/<?php echo $pages ?>)
      </span>
        <?php
		if($pages>1){
			echo '<a href="'.$url.'">第一页</a>';
		 for($i=1;$i<$pages+1;$i++) {
		   if($i<($page-3)||$i>($page+3)){echo  '<em>.</em>';} 
		   elseif($i==$page){ echo '<a class="current">'.$i.'</a>';}
		 
		   else{echo  '<a href="'.$url.'&p='.$i.'"> '.$i.' </a> ' ;} 
		   
              }
			
			
			  echo '<a href="'.$url.'&p='.$pages .'">最后一页</a>';
	  } 
	?>
    </div>
　　</div>   
    </div>

                       
    <?php
}