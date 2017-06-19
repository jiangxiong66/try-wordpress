<?php
### Alipay Variables
$base_name = plugin_basename( __FILE__ );
$base_page = 'admin.php?page='.$base_name;

### If Form Is Submitted
if($_POST['Submit']) {
	$shop_pay_opens       = trim($_POST['shop_pay_opens']);
	$ali_partner        = trim($_POST['ali_partner']);
	$ali_security_code  = trim($_POST['ali_security_code']);
	$ali_seller_email   = trim($_POST['ali_seller_email']);
	$ali_api            = trim($_POST['ali_api']);
	$ali_return_url    = $_POST['ali_return_url'];
	
	$postage_shunfeng   = trim($_POST['postage_shunfeng']);
	$postage_yuantong   = trim($_POST['postage_yuantong']);
	$postage_yunda   = trim($_POST['postage_yunda']);
	$postage_zhongtong   = trim($_POST['postage_zhongtong']);
	$postage_debangwuliu  = trim($_POST['postage_debangwuliu']);
	$postage_ems  = trim($_POST['postage_ems']);
	$postage_p1   = trim($_POST['postage_p1']);
	$postage_p_n1  = trim($_POST['postage_p_n1']);
	$postage_p_j1   = trim($_POST['postage_p_j1']);
	$postage_p2   = trim($_POST['postage_p2']);
	$postage_p_n2  = trim($_POST['postage_p_n2']);
	$postage_p_j2   = trim($_POST['postage_p_j2']);	
	$pay_way_p   = trim($_POST['pay_way_p ']);	

	$update_ali_queries = array();
	$update_ali_text    = array();
	$update_ali_queries[] = update_option('pay_way_p', $pay_way_p);
	$update_ali_queries[]      =update_option('shop_pay_opens', $shop_pay_opens); 
	$update_ali_queries[] = update_option('ali_partner', $ali_partner);
	$update_ali_queries[] = update_option('ali_security_code', $ali_security_code);
	$update_ali_queries[] = update_option('ali_seller_email', $ali_seller_email);
	$update_ali_queries[] = update_option('ali_api', $ali_api);
	$update_ali_queries[] = update_option('ali_return_url', $ali_return_url);
	

	$update_ali_queries[] = update_option('postage_shunfeng', $postage_shunfeng);
	$update_ali_queries[] = update_option('postage_yuantong', $postage_yuantong);
	$update_ali_queries[] = update_option('postage_yunda', $postage_yunda);
	$update_ali_queries[] = update_option('postage_zhongtong', $postage_zhongtong);
	$update_ali_queries[] = update_option('postage_debangwuliu', $postage_debangwuliu);
	$update_ali_queries[] = update_option('postage_ems', $postage_ems);
	$update_ali_queries[] = update_option('postage_p1', $postage_p1);
	$update_ali_queries[] = update_option('postage_p_n1', $postage_p_n1);
	$update_ali_queries[] = update_option('postage_p_j1', $postage_p_j1);
	$update_ali_queries[] = update_option('postage_p2', $postage_p2);
	$update_ali_queries[] = update_option('postage_p_n2', $postage_p_n2);
	$update_ali_queries[] = update_option('postage_p_j2', $postage_p_j2);
	$update_ali_text[]     ='付款方式';
	$update_ali_text[]     ='在线购物订单系统关闭';
	$update_ali_text[] = '合作者身份(Partner ID)';
	$update_ali_text[] = '安全校验码(Key)';
	$update_ali_text[] = '支付宝收款账号';
	$update_ali_text[] = '接口类型';
	$update_ali_text[] = '交易完成返回页面';
	
	$update_ali_text[] = '顺丰快递';
	$update_ali_text[] = '圆通快递';
	$update_ali_text[] = '韵达快递';
	$update_ali_text[] = '中通快递';
	$update_ali_text[] = '德邦物流';
	$update_ali_text[] = 'EMS';
	$update_ali_text[] = '自定义快递1名称';
	$update_ali_text[] = '自定义快递1代码';
	$update_ali_text[] = '自定义快递1价格';
	$update_ali_text[] = '自定义快递2名称';
	$update_ali_text[] = '自定义快递2代码';
	$update_ali_text[] = '自定义快递2价格';
	$i = 0;
	$text = '';
	foreach($update_ali_queries as $update_ali_query) {
		if($update_ali_query) {
			$text .= '<font color="green">'.$update_ali_text[$i].' 更新成功！</font><br />';
		}
		$i++;
	}
	if(empty($text)) {
		$text = '<font color="red">您对设置没有做出任何改动...</font>';
	}

}
### Needed Variables
$pay_way_p   = get_option('pay_way_p');;		
$shop_pay_opens = get_option('shop_pay_opens');
$ali_partner       = get_option('ali_partner');
$ali_security_code = get_option('ali_security_code');
$ali_seller_email  = get_option('ali_seller_email');
$ali_api           = get_option('ali_api');
$ali_return_url    = get_option('ali_return_url');
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
?>
<div class="wrap">

<?php if(!empty($text)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$text.'</p></div>'; } ?>
        <?php if (!function_exists( 'shoppingbox_theme_support' ) ) { echo ' <p class="update-nag"><strong>请注意：未检测到正在使用的主题已经支持购物盒子插件，最基本请确保您的主题有登陆和注册的入口，或者按照我们提供的提示进行制作支持！若无登录入口，请勿选择屏蔽默认入口，否则将会无法登录</strong><br /><a href="http://www.themepark.com.cn/tag/zxzf" target="_blank">获取兼容的主题</a>/<a href="http://www.themepark.com.cn/shoppingbox-WordPress-plugins" target="_blank">制作兼容的主题</a></p>';  }?>
               

<form method="post" action="<?php echo admin_url('admin.php?page='.plugin_basename(__FILE__)); ?>" style="width:70%;float:left;">

	
        <h3>支付宝API设置</h3>
  <div id="message" class="updated fade"><p>购物盒子是WEB主题公园所开发的一款应用于在线交易、小型社区、QQ登陆以及ajax评论框集合为一体的多功能插件，你可以在每一个功能菜单选择开启或者关闭，以便使用这些功能，对于该插件，可以通过短代码进行输出内容，具体的教程请参考<a href="http://www.themepark.com.cn/gwhz153xxbqgnfdspjc.html" target="_blank">[弹出]购物盒子WordPress支付插件功能介绍和使用教程</a></p></div>    
        <table class="form-table">

         <tr>
                <td valign="top" width="200px"><strong>是否关闭购物功能</strong><br />
                </td>
                <td>
               <input  type="checkbox" <?php if($shop_pay_opens){echo 'checked="checked"';} ?> id="shop_pay_opens" name="shop_pay_opens" value="yes" /><em>关闭此项目，购物功能将不会启用</em>
                </td>
            </tr>
        
         <tr>
                <td valign="top" width="200px"><strong>选择付款方式</strong><br />
                </td>
                <td>
              <select id="pay_way_p" name="pay_way_p">
                  <option value ="direct" <?php if($pay_way_p=='all') echo 'selected="selected"';?>>支付宝和货到付款</option>
                  <option value ="escow" <?php if($pay_way_p=='alipay') echo 'selected="selected"';?>>只有支付宝付款</option>
                  <option value ="dualfun" <?php if($pay_way_p=='cod') echo 'selected="selected"';?>>只有货到付款</option>
                </select>
                </td>
            </tr>
        
        
        
            <tr>
                <td valign="top" width="200px"><strong>合作者身份(Partner ID)</strong><br />
                </td>
                <td>
                <input type="text" id="ali_partner" name="ali_partner" value="<?php echo $ali_partner ; ?>" maxlength="50" size="50" />
                </td>
            </tr>
            <tr>
                <td valign="top" width="200px"><strong>安全校验码(Key)</strong><br />
                </td>
                <td>
                <input type="text" id="ali_security_code" name="ali_security_code" value="<?php echo $ali_security_code; ?>" maxlength="50" size="50" />
                </td>
            </tr>
                        <tr>
                <td valign="top" width="200px"><strong>支付宝收款账号</strong><br />
                </td>
                <td>
                <input type="text" id="ali_seller_email" name="ali_seller_email" value="<?php echo $ali_seller_email; ?>" maxlength="100" size="50" />
                </td>
            </tr>
                        <tr>
                <td valign="top" width="200px"><strong>支付宝接口类型</strong><br />
                </td>
                <td>
                <select id="ali_api" name="ali_api">
                  <option value ="direct" <?php if($ali_api=='direct') echo 'selected="selected"';?>>即时到帐</option>
                  <option value ="escow" <?php if($ali_api=='escow') echo 'selected="selected"';?>>担保交易</option>
                  <option value ="dualfun" <?php if($ali_api=='dualfun') echo 'selected="selected"';?>>双功能</option>
                </select>
                </td>
            </tr>                           <tr>
                <td valign="top" width="200px"><strong>交易完成跳转页面</strong><br />
                </td>
                <td>
                <input type="text" id="ali_return_url" name="ali_return_url" value="<?php echo $ali_return_url; ?>" maxlength="200" size="50" />
                不允许加?id=123这类自定义参数(默认跳转个人中心页面，如果你的主机不支持伪静态链接，那么返回将会有误，你可以使用html进行返回)</td>
            </tr>
            
             <tr>
                 <td>   <h3>交易设置</h3></td>
            </tr>
            <tr>
                <td valign="top" width="200px"><strong>邮费设置</strong><br />
                </td>
                <td>
               
                <p>【请注意】默认提供以下快递和物流公司名称，并且增加2个自定义快递公司名称和运费设置，快递查询中的快递公司代码请在官网下载对比填写，如果填写错误，将无法查询快递。只有填写了下面的邮费信息，所对应的快递公司才会在商品设置面板中出现。<a href=" http://www.themepark.com.cn/shoppingbox-WordPress-plugins" target="_blank">[快递公司代码查询]</a></p>
                </td>
            </tr>
            
             <tr>
                <td valign="top" width="200px">顺丰快递<br />
                </td>
                <td>
               
                <input type="text" id="postage_shunfeng" name="postage_shunfeng" value="<?php echo $postage_shunfeng; ?>" maxlength="50" size="20" />元
                </td>
            </tr>
            
            
             <tr>
                <td valign="top" width="200px">圆通快递<br />
                </td>
                <td>
               
                <input type="text" id="postage_yuantong" name="postage_yuantong" value="<?php echo $postage_yuantong; ?>" maxlength="50" size="20" />元
                </td>
            </tr>
            
            
            <tr>
                <td valign="top" width="200px">韵达快递<br />
                </td>
                <td>
               
                <input type="text" id="postage_yunda" name="postage_yunda" value="<?php echo $postage_yunda; ?>" maxlength="50" size="20" />元
                </td>
            </tr>
            
             <tr>
                <td valign="top" width="200px">中通快递<br />
                </td>
                <td>
               
                <input type="text" id="postage_zhongtong" name="postage_zhongtong" value="<?php echo $postage_zhongtong; ?>" maxlength="50" size="20" />元
                </td>
            </tr>
            
             <tr>
                <td valign="top" width="200px">德邦物流<br /></td>
                <td>  <input type="text" id="postage_debangwuliu" name="postage_debangwuliu" value="<?php echo $postage_debangwuliu; ?>" maxlength="50" size="20" />元</td>
            </tr>
            
             <tr>
                <td valign="top" width="200px">EMS<br /> </td>
                <td> <input type="text" id="postage_ems" name="postage_ems" value="<?php echo $postage_ems; ?>" maxlength="50" size="20" />元</td>
              </tr>
            
             <tr>
               <tr> <td valign="top" width="200px">自定义快递公司1<br />
                </td>
                <td> 名称： <input type="text" id="postage_p1" name="postage_p1" value="<?php echo $postage_p1; ?>" maxlength="50" size="20" /></td></tr>
               <tr> <td valign="top" width="200px"></td><td>代码：<input type="text" id="postage_p_n1" name="postage_p_n1" value="<?php echo $postage_p_n1; ?>" maxlength="50" size="20" /></td></tr>
               <tr> <td valign="top" width="200px"></td><td>价格：<input type="text" id="postage_p_j1" name="postage_p_j1" value="<?php echo $postage_p_j1; ?>" maxlength="50" size="20" /></td></tr>
            </tr>
            
              <tr> <td valign="top" width="200px">自定义快递公司2<br />
                </td>
                <td> 名称： <input type="text" id="postage_p2" name="postage_p2" value="<?php echo $postage_p2; ?>" maxlength="50" size="20" /></td></tr>
               <tr> <td valign="top" width="200px"></td><td>代码：<input type="text" id="postage_p_n2" name="postage_p_n2" value="<?php echo $postage_p_n2; ?>" maxlength="50" size="20" /></td></tr>
               <tr> <td valign="top" width="200px"></td><td>价格：<input type="text" id="postage_p_j2" name="postage_p_j2" value="<?php echo $postage_p_j2; ?>" maxlength="50" size="20" /></td></tr>
            </tr>
            
    </table>
        <br /> <br />
        <table> <tr>
        <td><p class="submit">
            <input type="submit" name="Submit" value="保存设置" class="button-primary"/>
            </p>
        </td>

        </tr> </table>

</form>
	