<?php
/* *
购物车结算-支付宝和货到付款
 */
require_once("alipay_config.php");
if(!isset($_POST['cart_submit'])){
	wp_die("发生错误！请返回");
	
	
	}
$order_nubers = array(); 
if(isset($_POST['nunber_oder'])){
$order_nubers = $_POST['nunber_oder'];
} 	else{
	
	wp_die('请至少勾选一个商品进行结算');
	}
	
if(!isset($_POST['pay_way'])){
wp_die('请选择付款方式！');
} 	
	
$pay_way=$_POST['pay_way']	;
		
global $wpdb;	
foreach($order_nubers as $code){
	    $shop_ids = $wpdb->get_var("SELECT alipay_id FROM $wpdb->alipay WHERE alipay_num='".$code."' and alipay_status='购物车'");
		$post_shop_id = $wpdb->get_var("SELECT alipay_post FROM $wpdb->alipay WHERE alipay_num='".$code."' and alipay_status='购物车'");
	    $list =	$wpdb->get_var("SELECT alipay_price FROM $wpdb->alipay WHERE alipay_num='".$code."' and alipay_status='购物车'");
		
	if(!$list){
		wp_die('系统获取订单号不正确，请重试或者联系管理员！');}else{
		
		$lists +=$list;
		 $shop_id .= $shop_ids.'a';
		 $post_shop_title.= get_post($post_shop_id)->post_title.'+';
		}

	
	}
	 
$array =split("a",$shop_id) ;


	

if(get_option('ali_api')){
	$api = get_option('ali_api');
}else{
	$api = 'direct';
}
require_once("lib-".$api."/alipay_service.class.php");

/**************************请求参数**************************/



$unitprice=$lists;
$total_fee = $unitprice; //即时到账接口价格
if(empty($total_fee)){
	header('HTTP/1.1 403 Get Price Error');
	wp_die('错误！价格无法获取，请重新结算或者联系管理员');
	exit;	
}
$price     = $unitprice; //担保交易和双功能接口价格
$subject   =$post_shop_title.'合并付款';  //订单名称，显示在支付宝收银台里的"商品名称"里，显示在支付宝的交易管理的"商品名称"的列表里。
$out_trade_no = $shop_id;		//请与贵网站订单系统中的唯一订单号匹配
$body         = '合并付款';	//订单描述、订单详细、订单备注，显示在支付宝收银台里的"商品描述"里

$time         = date('Y-m-d H:i:s');

$description =$_POST['description'];

$logistics_fee		= "0.00";				//物流费用，即运费。
$logistics_type		= "EXPRESS";			//物流类型，三个值可选：EXPRESS（快递）、POST（平邮）、EMS（EMS）
$logistics_payment	= "SELLER_PAY";			//物流支付方式，两个值可选：SELLER_PAY（卖家承担运费）、BUYER_PAY（买家承担运费）

$quantity			= "1";					//商品数量，建议默认为1，不改变值，把一次交易看成是一次下订单而非购买一件商品。


$alipay_statuss='购物车';
	if($pay_way=='COD'){
foreach($order_nubers as $code){
		
					$wpdb->update( $wpdb->alipay, array( 'alipay_price' => $unitprice, 'alipay_time' => $time, 'alipay_status' => '货到付款','alipay_dl' => ''), array( 'alipay_num' => $code ) , array( '%f',  '%s', '%s' ), array( '%s' )) ;
			
}
$url=get_page_link( $shop_profile );
 header("Location: $url");	
		}

//扩展功能参数——默认支付方式//

//默认支付方式，取值见"即时到帐接口"技术文档中的请求参数列表
$paymethod    = 'directPay';
//默认网银代号，代号列表见"即时到帐接口"技术文档"附录"→"银行列表"
$defaultbank  = '';


//扩展功能参数——防钓鱼//

//防钓鱼时间戳
$anti_phishing_key  = '';
//获取客户端的IP地址，建议：编写获取客户端IP地址的程序
$exter_invoke_ip = '';
//注意：
//1.请慎重选择是否开启防钓鱼功能
//2.exter_invoke_ip、anti_phishing_key一旦被使用过，那么它们就会成为必填参数
//3.开启防钓鱼功能后，服务器、本机电脑必须支持SSL，请配置好该环境。
//示例：
//$exter_invoke_ip = '202.1.1.1';
//$ali_service_timestamp = new AlipayService($aliapy_config);
//$anti_phishing_key = $ali_service_timestamp->query_timestamp();//获取防钓鱼时间戳函数


//扩展功能参数——其他//

//商品展示地址，要用 http://格式的完整路径，不允许加?id=123这类自定义参数
$show_url			= get_permalink($postid);
//自定义参数，可存放任何内容（除=、&等特殊字符外），不会显示在页面上
$extra_common_param = '';

//扩展功能参数——分润(若要使用，请按照注释要求的格式赋值)
$royalty_type		= "";			//提成类型，该值为固定值：10，不需要修改
$royalty_parameters	= "";
//注意：
//提成信息集，与需要结合商户网站自身情况动态获取每笔交易的各分润收款账号、各分润金额、各分润说明。最多只能设置10条
//各分润金额的总和须小于等于total_fee
//提成信息集格式为：收款方Email_1^金额1^备注1|收款方Email_2^金额2^备注2
//示例：
//royalty_type 		= "10"
//royalty_parameters= "111@126.com^0.01^分润备注一|222@126.com^0.01^分润备注二"

/************************************************************/
//构造要请求的参数数组
if($api=='direct'){
$parameter = array(
		"service"			=> "create_direct_pay_by_user",
		"payment_type"		=> "1",
		
		"partner"			=> trim($aliapy_config['partner']),
		"_input_charset"	=> trim(strtolower($aliapy_config['input_charset'])),
        "seller_email"		=> trim($aliapy_config['seller_email']),
        "return_url"		=> trim($aliapy_config['return_url']),
        "notify_url"		=> trim($aliapy_config['notify_url']),
		
		"out_trade_no"		=> $out_trade_no,
		"subject"			=> $subject,
		"body"				=> $body,
		"total_fee"			=> $total_fee,
		
		"paymethod"			=> $paymethod,
		"defaultbank"		=> $defaultbank,
		
		"anti_phishing_key"	=> $anti_phishing_key,
		"exter_invoke_ip"	=> $exter_invoke_ip,
		
		"show_url"			=> $show_url,
		"extra_common_param"=> $extra_common_param,
		
		"royalty_type"		=> $royalty_type,
		"royalty_parameters"=> $royalty_parameters
);
//构造即时到帐接口
$alipayService = new AlipayService($aliapy_config);
$html_text = $alipayService->create_direct_pay_by_user($parameter);
}elseif($api=='escow'){
	$parameter = array(
		"service"			=> "create_partner_trade_by_buyer",
		"payment_type"		=> "1",
		
		"partner"			=> trim($aliapy_config['partner']),
		"_input_charset"	=> trim(strtolower($aliapy_config['input_charset'])),
        "seller_email"		=> trim($aliapy_config['seller_email']),
        "return_url"		=> trim($aliapy_config['return_url']),
        "notify_url"		=> trim($aliapy_config['notify_url']),

        "out_trade_no"		=> $out_trade_no,
        "subject"			=> $subject,
        "body"				=> $body,
        "price"				=> $price,
		"quantity"			=> $quantity,
		
		"logistics_fee"		=> $logistics_fee,
		"logistics_type"	=> $logistics_type,
		"logistics_payment"	=> $logistics_payment,
		
		"receive_name"		=> $receive_name,
		"receive_address"	=> $receive_address,
		"receive_zip"		=> $receive_zip,
		"receive_phone"		=> $receive_phone,
		"receive_mobile"	=> $receive_mobile,
		
        "show_url"			=> $show_url
	);
//构造担保交易接口
$alipayService = new AlipayService($aliapy_config);
$html_text = $alipayService->create_partner_trade_by_buyer($parameter);
}else{
	$parameter = array(
		"service"		=> "trade_create_by_buyer",
		"payment_type"	=> "1",
		
		"partner"		=> trim($aliapy_config['partner']),
		"_input_charset"=> trim(strtolower($aliapy_config['input_charset'])),
		"seller_email"	=> trim($aliapy_config['seller_email']),
		"return_url"	=> trim($aliapy_config['return_url']),
		"notify_url"	=> trim($aliapy_config['notify_url']),

		"out_trade_no"	=> $out_trade_no,
		"subject"		=> $subject,
		"body"			=> $body,
		"price"			=> $price,
		"quantity"		=> $quantity,
		
		"logistics_fee"		=> $logistics_fee,
		"logistics_type"	=> $logistics_type,
		"logistics_payment"	=> $logistics_payment,
		
		"receive_name"		=> $receive_name,
		"receive_address"	=> $receive_address,
		"receive_zip"		=> $receive_zip,
		"receive_phone"		=> $receive_phone,
		"receive_mobile"	=> $receive_mobile,
		
		"show_url"		=> $show_url
);

//构造标准双接口
$alipayService = new AlipayService($aliapy_config);
$html_text = $alipayService->trade_create_by_buyer($parameter);
}

?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>正在前往支付宝...</title>
    </head>
    <body>
<?php
	echo '<div  style="display:none">'.$html_text.'</div>'; 
?>
    </body>
</html>