<?php 
$new_meta_boxes_shop =
array(

    "shop_open" => array(
        "name" => "shop_open",
        "std" => "",
        "title" => "启用商品功能"),
		
    "shop_price" => array(
        "name" => "shop_price",
        "std" => "",
        "title" => "价格"),
		
    "original_price" => array(
        "name" => "original_price",
        "std" => "",
        "title" => "原价"),
		
    "postage" => array(
        "name" => "postage",
        "std" => "",
        "title" => "邮费选择"),
		
		
		 "shop_info" => array(
        "name" => "shop_info",
        "std" => "",
        "title" => "商品属性"),
		
		
		 "shop_info_price" => array(
        "name" => "shop_info_price",
        "std" => "",
        "title" => "对应价格"),
			
    "shop_way" => array(
        "name" => "shop_way",
        "std" => "",
        "title" => "支付方式"),
		
		  "shop_download_pay" => array(
        "name" => "shop_download_pay",
        "std" => "",
        "title" => "付费下载"),
		
		
		  "shop_download" => array(
        "name" => "shop_download",
        "std" => "",
        "title" => "登录下载"),
		
		  "time_piker_1" => array(
        "name" => "time_piker_1",
        "std" => "",
        "title" => "时间选择器1"),
		 "time_piker_2" => array(
        "name" => "time_piker_2",
        "std" => "",
        "title" => "时间选择器2"),
		
		 "shop_comment" => array(
        "name" => "shop_comment",
        "std" => "",
        "title" => "用户评论"),
		
);
function new_meta_boxes_shop() {
    global $post, $new_meta_boxes_shop;
  
        $meta_box_value  = get_post_meta($post->ID,"shop_open", true);
	    $meta_box_value2 = get_post_meta($post->ID,"shop_price", true);
		$meta_box_value3 = get_post_meta($post->ID,"original_price", true);
		$meta_box_value4 = get_post_meta($post->ID,"postage", true);
		$meta_box_value5 = get_post_meta($post->ID,"shop_way", true);
		
		$meta_box_value6 = get_post_meta($post->ID,"shop_download_pay", true);
		$meta_box_value7 = get_post_meta($post->ID,"shop_download", true);
		$meta_box_value8 = get_post_meta($post->ID,"shop_info", true);
		$meta_box_value88 = get_post_meta($post->ID,"shop_info_price", true);
		
		$meta_box_value9 = get_post_meta($post->ID,"time_piker_1", true);
		
		$meta_box_value0 = get_post_meta($post->ID,"time_piker_2", true);
		$meta_box_value111 = get_post_meta($post->ID,"shop_comment", true);
  
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
			
			
			
	 echo' <div style=" width:width:100%;padding:10px 0; display:block;overflow: hidden;">
	 
	 <input type="hidden" name="shop_open_noncename" id="shop_open_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />
<input type="hidden" name="shop_comment_noncename" id="shop_comment_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />

<input type="hidden" name="shop_price_noncename" id="shop_price_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />
<input type="hidden" name="original_price_noncename" id="original_price_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />
<input type="hidden" name="shop_way_noncename" id="shop_way_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />
 <input type="hidden" name="postage_noncename" id="postage_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />
  <input type="hidden" name="shop_download_pay_noncename" id="shop_download_pay_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />
   <input type="hidden" name="shop_download_noncename" id="shop_download_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />
    <input type="hidden" name="shop_info_noncename" id="shop_info_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />
	    <input type="hidden" name="shop_info_price_noncename" id="shop_info_price_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />
	    <input type="hidden" name="time_piker_1_noncename" id="time_piker_1_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />
		    <input type="hidden" name="time_piker_2_noncename" id="time_piker_2_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />
 '  	
      
		?>
        
       <p><strong>【提示】：</strong>如果你的主题没有明确支持此插件，你可以使用短代码来输出商品订单提交框、下载框。 商品订单提交框请在文章中插入短代码[shop_short]</p>
          <label>启用商品：</label>
   	 <input   type="checkbox" style="border:1px #ccc solid" name="shop_open" id="shop_open" <?php if($meta_box_value=='yes'){echo 'checked="checked"';} ?> value="yes" />
       <em>【启用商品化文章功能】</em>
   
       </div>
     <div style=" width:100%;padding:10px 0; display:block;overflow: hidden;">
       <label>付款方式：</label>
      <select name="shop_way" id="shop_way">
               <option  value='online'<?php if ( $meta_box_value5== "online" ) {echo "selected='selected'";}?>>支付宝付款</option>
              <option  value='no_online'<?php if ( $meta_box_value5== "no_online" ) {echo "selected='selected'";}?>>货到付款</option>
              <option  value='onlineadncod'<?php if ( $meta_box_value5== "onlineadncod" ) {echo "selected='selected'";}?>>支付宝和货到付款</option>
	          
	   </select>
       <em>【如果选择货到付款，那么将不会进入在线支付环节】</em> 
     
     
     </div>
     
      <div style=" width:100%;padding:10px 0; display:block;overflow: hidden;">
        <label>商品价格：</label>
        <input type="text" style="border:1px #ccc solid" name="shop_price" id="shop_price"  value="<?php echo  $meta_box_value2 ; ?>" />
        <em>【如果你填写了下面的商品原价，那么这个价格将会是折扣后的价格】</em>
     
     
     </div>
     
        <div style=" width:100%;padding:10px 0; display:block;overflow: hidden;">
         <label>商品原价：</label>
        <input type="text" style="border:1px #ccc solid" name="original_price" id="original_price"  value="<?php echo  $meta_box_value3 ; ?>" />
        <em>【商品原价必须大于商品价格，填写这个选项之后，商品启用折扣模式】</em>
     </div>
     
      <div style=" width:100%;padding:10px 0; display:block;overflow: hidden;">
         <label>时间选择器1：</label>
        <input type="text" style="border:1px #ccc solid" name="time_piker_1" id="time_piker_1"  value="<?php echo  $meta_box_value9 ; ?>" />
        <em>填写之后会出现时间选择器，可以填写如预定的开始时间等，不填写则不显示</em>
     </div>
     
      <div style=" width:100%;padding:10px 0; display:block;overflow: hidden;">
         <label>时间选择器2：</label>
        <input type="text" style="border:1px #ccc solid" name="time_piker_2" id="time_piker_2"  value="<?php echo  $meta_box_value0 ; ?>" />
        <em>填写之后会出现时间选择器，可以填写如预定的结束时间等，不填写则不显示</em>
     </div>
     
     
        <div style=" width:100%;padding:10px 0; display:block;overflow: hidden;">
         <label>商品属性：</label>
       <textarea style=" width:100%;"  name="shop_info" id="shop_info" ><?php echo  $meta_box_value8 ; ?></textarea>
        <em>【商品属性填写之后生成一个单选框让用户选择，比如颜色、尺寸，属性的条件使用英文输入法的逗号隔开，如： 红色,蓝色,绿色】</em>
     
     
     </div>
       <div style=" width:100%;padding:10px 0; display:block;overflow: hidden;">
         <label>商品属性对应价格：</label>
       <textarea style=" width:100%;"  name="shop_info_price" id="shop_info_price" ><?php echo  $meta_box_value88 ; ?></textarea>
        <em>【如果你设置了商品属性，那么可以单独设置某一个属性的价格，或者设置所有属性的价格，设置的方法如商品属性是“蓝色”，对应价格为300元，“红色”对应价格为400元，在上面填写：蓝色:300,红色:400 (<strong>请注意：多个使用英文半角逗号隔开，冒号也为英文半角,<b style="color:#F00">并且只在一列商品属性上增加价格，如果在多排属性增加价格会出现冲突的错误而导致价格无法确定!</b></strong>)】</em>
     
     
     </div>
 <?php $postage_p1   = get_option('postage_p1');
$postage_p_n1  = get_option('postage_p_n1');
$postage_p2   = get_option('postage_p2');
$postage_p_n2  = get_option('postage_p_n2');
$postage_shunfeng   = get_option('postage_shunfeng');
$postage_yuantong   = get_option('postage_yuantong');
$postage_yunda   = get_option('postage_yunda');
$postage_zhongtong   = get_option('postage_zhongtong');
$postage_debangwuliu  = get_option('postage_debangwuliu');
$postage_ems  = get_option('postage_ems');
	 ?>    

    <div style=" width:100%;padding:10px 0; display:block;overflow: hidden;">
         <label>邮费选择：</label>
        <select name="postage" id="postage">
   <?php if($postage_p_n1 ){?>  <option  <?php echo "value='".$postage_p_n1."'"; if ( $meta_box_value4== $postage_p_n1 ) {echo "selected='selected'";} echo ">".$postage_p1."" ; ?>></option><?php } ?>
   <?php if($postage_p_n2 ){?> <option  <?php echo "value='".$postage_p_n2."'"; if ( $meta_box_value4== $postage_p_n2) {echo "selected='selected'";} echo ">".$postage_p2."" ; ?>></option><?php } ?>
              <option  value='none' <?php if ( $meta_box_value4== "0" ) {echo "selected='selected'";}?>>包邮</option>
	           <?php if($postage_shunfeng ){?><option  value='shunfeng'<?php if ( $meta_box_value4== "shunfeng" ) {echo "selected='selected'";}?>>顺丰</option><?php } ?>
			  <?php if($postage_yuantong ){?> <option  value='yuantong'<?php if ( $meta_box_value4== "yuantong" ) {echo "selected='selected'";}?>>圆通</option><?php } ?>
               <?php if($postage_yunda  ){?><option  value='yunda'<?php if ( $meta_box_value4== "yunda" ) {echo "selected='selected'";}?>>韵达</option><?php } ?>
              <?php if($postage_zhongtong ){?> <option  value='zhongtong'<?php if ( $meta_box_value4== "zhongtong" ) {echo "selected='selected'";}?>>中通</option><?php } ?>
              <?php if($postage_debangwuli ){?> <option  value='debangwuliu'<?php if ( $meta_box_value4== "debangwuliu" ) {echo "selected='selected'";}?>>德邦物流</option><?php } ?>
              <?php if($postage_ems ){?> <option  value='ems'<?php if ( $meta_box_value4== "20" ) {echo "selected='selected'";}?>>EMS</option><?php } ?>
              
           
	   </select>
        <em>【你可以在插件选项中自定义邮费名称和价格】</em>
   </div>
   
     <div style=" width:100%;padding:10px 0; display:block;overflow: hidden;">
         <label>登录下载：</label>
        <input type="text" style="border:1px #ccc solid;width:500px" name="shop_download" id="shop_download"  value="<?php echo  $meta_box_value7 ; ?>" /><br /><br />

        <em>【请填写下载链接，并使用短代码输出到文章,这里注意可使用带有http的链接，也可以使用网盘】 短代码 ： [shop_download]</em>
     
     
     </div>
     <p><strong>【虚拟物品权限下载】：(如果你填写了付费下载的内容，那么这个商品就会自动进入虚拟商品模式，无需发货环节，付款之后即可下载，注意如果启用虚拟商品模式不支持货到付款的方式)</strong></p>
 
     
     <div style=" width:100%;padding:10px 0; display:block;overflow: hidden;">
         <label>付费下载：</label>
        <input type="text" style="border:1px #ccc solid; width:500px" name="shop_download_pay" id="shop_download_pay"  value="<?php echo  $meta_box_value6 ; ?>" />
        <br /> <br />
<em>【如果你填写了这个选项，那么就无需发货和收货，在个人中心中支付成功之后即可显示下载链接，这里链接必须是本地服务区的相对连接，如"/wp-content\uploads\2015\02\jack.zip"】</em>
     
     
     </div>
     
      <div style=" width:100%;padding:10px 0; display:block;overflow: hidden;">
         <label>自定义商品评论：</label>
       <textarea style=" width:100%;"  name="shop_comment" id="shop_comment" ><?php echo  $meta_box_value111 ; ?></textarea>
        <em>【你可以在购物盒子的商品评论生成器生成一些自定义的评论代码，这些评论会显示在产品评论和评分中，以此吸引用户购买】</em>
     
     
     </div>
      <?php 
	    
    }

function create_meta_box_shop() {
    global $theme_name;
  
    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new-meta-boxes-shop', '商品化文章选项', 'new_meta_boxes_shop', 'post', 'normal', 'high' );
    }
}

function save_postdata_shop( $post_id ) {
    global $post, $new_meta_boxes_shop;
  
    foreach($new_meta_boxes_shop as $meta_box) {
        if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) ))  {
            return $post_id;
        }
  
        if ( 'page' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ))
                return $post_id;
        }
        else {
            if ( !current_user_can( 'edit_post', $post_id ))
                return $post_id;
        }
  
        $data = $_POST[$meta_box['name']];
  
        if(get_post_meta($post_id, $meta_box['name']) == "")
            add_post_meta($post_id, $meta_box['name'], $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'], true))
            update_post_meta($post_id, $meta_box['name'], $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
    }
}
add_action('admin_menu', 'create_meta_box_shop');
add_action('save_post', 'save_postdata_shop');


?>
