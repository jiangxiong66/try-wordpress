<?php
add_action('activate_shoppingbox/shop.php', 'create_alipay_table');
function create_alipay_table() {
	global $wpdb;
	if(@is_file(ABSPATH.'/wp-admin/upgrade-functions.php')) {
		include_once(ABSPATH.'/wp-admin/upgrade-functions.php');
	} elseif(@is_file(ABSPATH.'/wp-admin/includes/upgrade.php')) {
		include_once(ABSPATH.'/wp-admin/includes/upgrade.php');
	} else {
		die('We have problem finding your \'/wp-admin/upgrade-functions.php\' and \'/wp-admin/includes/upgrade.php\'');
	}
	$charset_collate = '';
	if($wpdb->supports_collation()) {
		if(!empty($wpdb->charset)) {
			$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
		}
		if(!empty($wpdb->collate)) {
			$charset_collate .= " COLLATE $wpdb->collate";
		}
	}
	// Create alipay Table
	$create_alipaylogs_sql = "CREATE TABLE $wpdb->alipay (".
			"alipay_id BIGINT(11) NOT NULL auto_increment,".
			"alipay_num BIGINT(18) NOT NULL,".
			"alipay_post INT(10) NOT NULL,".
			"alipay_price double(10,2) NOT NULL,".
			"alipay_tell BIGINT(15),".
			"alipay_user VARCHAR(100),".
			"alipay_email VARCHAR(50),".
			"alipay_nmbers BIGINT(15),".
			"alipay_time datetime NOT NULL ,".
			"alipay_status VARCHAR(25),".
			"alipay_body  VARCHAR(155),".
			"alipay_dl VARCHAR(10),".
			"alipay_orderstatus datetime,".
			"alipay_express VARCHAR(200),".
			"alipay_stars VARCHAR(25),".
			"alipay_comment VARCHAR(500),".
			"PRIMARY KEY (alipay_id)) $charset_collate;";
	maybe_create_table($wpdb->alipay, $create_alipaylogs_sql);
}

function shop_form(){
	
	global $current_user;    get_currentuserinfo();
	$user =$current_user->ID;
	$id = get_the_ID();
	$price = get_post_meta($id, 'shop_price', true);
	$original_price=get_post_meta($id,"original_price", true);
	if($original_price){$original=  '原价：￥'.get_post_meta($id,"original_price", true);}
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
$postway=get_post_meta($id,"postage", true);
	  
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
		
	$shopinfo=get_post_meta($id,"shop_info", true);
	$shop_info_price=get_post_meta($id,"shop_info_price", true);
	
	$time_piker_1=get_post_meta($id,"time_piker_1", true);
	$time_piker_2=get_post_meta($id,"time_piker_2", true);
	 
	    $shop_infos= split("\n",$shopinfo); 
		 $shop_info_prices= split(",",$shop_info_price);
		 if( $shop_info_prices){
			 $pirec_script .=' var attribute =$.trim($(this).children("font").html()); ;switch (attribute){';
			  foreach ($shop_info_prices as $b){	
			   $shop_info_pricess=split(":",$b);
			 $pirec_script .='case "'.$shop_info_pricess[0].'" :  xx="'.$shop_info_pricess[1].'"  ;  break;';
			 
			 
			 }
			 $pirec_script .=' } ;$("#price_now span").html(xx) ;
			 var price_now = $("#price_now span").html();
	var postage ='.$postage.';
	var nmbers=$("#nmbers").val();
	var price_alls=(price_now*nmbers)+postage;
    $("#price_all").text(price_alls);';
			 
			 }
		  
		 $name=0;
		 if($shopinfo!=''){
			 foreach ($shop_infos as $a){	
				$shop_infoss= split(",",$a); 
				$name++;	
				$shop_infoc.='<div id="chact_box_div"><label>'.$shop_infoss[0].':</label><span>';
				 for($i=1;$i<count($shop_infoss);$i++) {	 
					 $shop_infoc.='
				 <label class="checbox" for="radio'.$name.$i.'"> <input type="radio"  name="shop_info'.$name.'" value="'.$shop_infoss[$i].'" id="radio'.$name.$i.'" /><font>'.$shop_infoss[$i].'</font></label>';  
					 }		 
				 $shop_infoc.='</span></div>';
				 } 
		 }
				 
		if($time_piker_1){
			$time_piker_box.='<div><label  for="time_piker_1"> '.$time_piker_1.'</label>
			<input type="text"  name="time_piker_1" value="" id="time_piker" class="time_piker" />
			</div>'
			;
			}	
			if($time_piker_2){
			$time_piker_box.='<div><label  for="time_piker_2"> '.$time_piker_2.'</label>
			<input type="text"  name="time_piker_2" value="" id="time_piker" class="time_piker" />
			</div>'
			;
			}		 
				  
	

	
	
	
	
	
	  $shop_profile = get_option('shop_profile');
	$shop_profile_url=  get_page_link( $shop_profile );
	$shop_way =  get_post_meta($id,"shop_way", true);
	if($shop_way=="online"){$actionurl= plugins_url('alipayto.php', __FILE__ );$tishiwenzi='直接去支付宝付款？';
$gotoalipay='$("#post_buy_cart").submit();';
	 }elseif($shop_way=="no_online"){$actionurl= plugins_url('cod.php', __FILE__ );$tishiwenzi='马上添加至货到付款？';$gotoalipay='$("#post_buy_cart").submit();';}
	 else{
		 $gotoalipay='$("#post_buy_cart").submit();';
		$actionurl= plugins_url('alipayto.php', __FILE__ );$tishiwenzi='直接去支付宝付款？';
		 $chosepay='<div class="pay_way_box"><label>支付方式:</label><a id="alipay_go" class="choseed"></a><a id="cod_go"></a></div>';
		 $chosepay_script='
		 
		 $("#alipay_go").click(function(){$(this).addClass("choseed");$("#cod_go").removeClass("choseed");$("#post_buy_cart").attr("action","'.plugins_url('alipayto.php', __FILE__ ).'");  tishiwenzi="直接去支付宝付款？"   });
		 $("#cod_go").click(function(){
			 $(this).addClass("choseed");$("#alipay_go").removeClass("choseed")
			 $("#post_buy_cart").attr("action","'.plugins_url('cod.php', __FILE__ ).'");  tishiwenzi="马上添加至货到付款？"   });
		 
		 ';
		 
		 }
	 
	$link = get_permalink($id);
	$date = date(Ymdhis);
	 $shop_qqlogin_open = get_option('shop_qqlogin_open');
    $shop_open = get_post_meta($id, 'shop_open', true);
	  $shop_style = get_option('shop_style');
	  	$shop_login = get_option('shop_login');
 $shop_register = get_option('shop_register');
		 				
  $post_url_true=strstr($shop_profile_url,'?');
  if($post_url_true!=''){$login_qq_url=' href="'.get_permalink().'&qqlogin=ok'.'"';}else{$login_qq_url=' href="'.get_permalink().'?qqlogin=ok'.'"';}
		  
		  if($time_piker_1||$time_piker_2){
			  $time_scripts_load='
			   <link rel="stylesheet" href="'. plugins_url( 'css/jquery.datetimepicker.css' , __FILE__ ).'" type="text/css" />
  <script type="text/javascript" src="'.plugins_url( 'js/jquery.datetimepicker.js' , __FILE__ ).'"></script>  
			  ';
			  $time_scripts='
			    $(function(){
$(".time_piker").datetimepicker({
  format:"Y-m-d",

  timepicker:false
 });

});
			  
			  ';
			  
			  }
		  $shop_script ='
		  
	
		  <script language="javascript">
		  var tishiwenzi="'.$tishiwenzi.'";
	'.$chosepay_script.$time_scripts.'
var price_allnone='.$price.'+'.$postage.';
  $("#price_all").text(price_allnone);

$("#nmbers").keyup(function(){
	var price_now = $("#price_now span").html();
	var postage ='.$postage.';
	var nmbers=$(this).val();
	var price_alls=(price_now*nmbers)+postage;
    $("#price_all").text(price_alls);
	
});
$("#submit_buy").click(function(){ if( confirm(tishiwenzi) ){'.$gotoalipay.' }else{ return false;}});
		
$("#submit_cart").click(function() {
	var options = {
	    
	    success: function() {
	        $(this).ajaxSubmit();
                $("#submit_cart").val("加入成功！") 
			 	    var data = "cart_chect=OK"; 	
	   $.getJSON("'.plugins_url('get_cart_nuber.php', __FILE__ ).'",data, function(json){  
	   $("#cart_nunber_ajax").html(json.id+"个商品等待结算");
	   $("#add_cart_b").animate({
            bottom: "200px",
            opacity: 1
        }, 800,"easeOutBack");
		
	   $("#add_cart_b").animate({
            bottom: "32px",
            opacity: 0
			
        }, 800,"easeOutBounce"
);
	   
	    });   
	    },
		error: function() { 
		 $("#submit_cart").val("提交错误！")    
		  alert("订单号错误，请刷新后提交！"); return false;
		                   
		 } 
		};
	
	
	
	
	if( confirm("确认加入购物车吗？") ){  $(this).val("正在放入.."); $("form#post_buy_cart").ajaxForm(options); }else{ return false;} }); 		
  
	
	$("#info_box").children("#chact_box_div").children("span").children(".checbox").click(function() {  
   $(this).parent("span").parent("#chact_box_div").children("span").children(".checbox").removeClass("onchatct")
   $(this).addClass("onchatct");
   '.$pirec_script.'
  });

</script>';

	 
   
		
		
	    if($shop_open == 'yes'){
			 
	$shop.='<div class="shop_form  shop_form_ibn  hidden_block">';
	if (!is_user_logged_in()){
		$newuserbuild=' 
		<div class="per"><strong>由于您还没有登录，因此请在下面补充完整您的信息，提交订单之后会自动为您生成一个本站账户以便您查询物流进度，登录用户名是上面填写的邮箱地址</strong></div>
		 <div><label>收货姓名：</label><input  type="text"  name="last_name" id="last_name" value=""></div>
		 <div>  <label>收货地址:</label>
        
          <textarea id="Address" name="Address"></textarea></div>
		 <div><label>输入密码:</label><input  type="password" name="user_pwd1" id="user_pwd1" value=""></div>
		<div><label>重复密码:</label><input " type="password" name="user_pwd2" id="user_pwd2" value=""></div>
		  <div>
     <label for="CAPTCHA">验 证 码：</label>
    <input id="CAPTCHA" style="width:110px;*float:left;" class="input" type="text" tabindex="24" size="10" value="" name="captcha_code" />
    </div>
     <div class="captcha">
    <a href="javascript:void(0)" onclick="document.getElementById(\'captcha_img\').src= \''.WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)).'/captcha/captcha.php?\' +Math.random();document.getElementById(\'CAPTCHA\').focus();return false;"><img id="captcha_img" src="'. WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)).'/captcha/captcha.php" /></a>
  <em>  看不清楚？点击图片换一张</em>
  </div>
   <input type="hidden" name="notlogin" id="notlogin" value="yes">
		';
	
	
	}else {$loginuserbuild='<input type="hidden" name="user" id="shop_user" value="'. $user.'">'; $cartbtn='<input type="submit" id="submit_cart" name="cart"  value="加入购物车" />'; } 
		 $shop.='


<b class="per">提交订单<a class="close_order">关闭订单</a></b>
    <form name="alipayment" action="'.$actionurl.'" method="post" target="_blank" id="post_buy_cart">
	<div id="shop_price"><label>单价：</label><em id="original">'.$original.'</em><b id="price_now">现价：￥<span>'. $price .'</span> </b> <em>（邮费：'.$postage.'）</em></div>
	<div id="shop_price_all"><label>总价:</label><b id="price_all"></b><em>(含运费)</em></div>
	<div id="info_box">'.$shop_infoc.'</div>
	'.$time_piker_box.'
	 <div><label>购买数量:</label>
          <input type="text" name="nmbers" id="nmbers"value="1">
        </div>
	
          <div><label>联系电话:</label>
          <input type="text" name="tell" id="shop_tell" value="'. $current_user->Phone.'">
      </div>
          
          <div><label>电子邮箱:</label>
          <input type="text" id="shop_email" name="email" value="'. $current_user->user_email.'">
		  </div>
		  <div>
		   <label>备  注:</label>
        
          <textarea id="shop_description" name="description"></textarea>
		   <p>备注：如果您有新的收货地址或者有一些特别的要求可以填写在此处，若不填写我们则会按照您的个人中心中填写的默认地址发货</p>
		    </div>
          '.$newuserbuild.$chosepay.$cartbtn.'
		  
          <input type="submit" id="submit_buy"  value="立即购买" /> 
      <input type="hidden" name="postage" id="postage" value="'. $postage.'">
      <input type="hidden" name="from_url" value="'. $link.'">
      <input type="hidden" maxLength=10 size=30 name="id" id="shop_id"  value="'.  $id .'"/>
      <input type="hidden" name="time" id="shop_time" value="'. $date .'">
     '.$loginuserbuild.'
      <input type="hidden" name="pay_bank" value="directPay">
	 
    </form>
   
	</div> 
  '.$time_scripts_load.$shop_script.'
';
  }
  return $shop;
  }

add_shortcode('shop_short', 'shop_form');
include('alipay-items.php');
$shop_bbs_open = get_option('shop_bbs_open');
$shop_pay_opens = get_option('shop_pay_opens');
if(!$shop_bbs_open){include('meta-box2.php');}
if(!$shop_pay_opens){include('meta_boxe_wright.php');}


?>
