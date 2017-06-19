<?php 

function themes_sport(){
	?>
    
    
<div class="wrap" style=" background:#FFF; width:100%; text-align:center;">
 <style>
 .wap_in{ width:100%; height:auto; display:inline-block; overflow:hidden; background:#FFF; max-width:800px; padding:20px 0; text-align:center;}
  .wap_in h1{ font-size:36px; color:#000; font-weight:normal; line-height:38px;}
  .wap_in h4{ font-size:14px; margin:50px 0 15px 0; text-transform:uppercase;}
  .wap_in b{ font-size:18px; line-height:26px;}
  .wap_in img{ display:inline-block; overflow:hidden; margin-top:20px; max-width:100%; height:auto;}
  .theme_titles{ width:100%; text-align:center; height:375px; margin:20px 0; background: repeat center url("<?php echo  plugins_url('images/11_02.jpg', __FILE__ ) ?>")}
  .wap_in p span{ font-size:14px; color:#F00; font-weight:bold; display: inline-block; padding:10px; border:solid 1px #FF0000;}
  .wap_in p #yes{ color:#668700; border:solid 1px #69ac00;}
  .wap_in a{ margin-right:10px !important;}
 </style>
  <div class="theme_titles">
   <img style="margin-top:110px; width:386px; height:148px;" src="<?php echo  plugins_url('images/index_03.png', __FILE__ ) ?>" />
  </div>
 <div class="wap_in">

 <img src="<?php echo  plugins_url('images/theme_sport2.jpg', __FILE__ ) ?>" />
  <h1>你需要一款精致的主题支持购物者的用户体验</h1>
  <h3>我们提供主题支持插件，并提供了制作支持插件的主题制作方法</h3>

    <?php if (!function_exists( 'shoppingbox_theme_support' ) ) { echo ' <p><span>系统检测到您的主题并不支持购物盒子插件，你可以</span></p>
	<a  href="http://www.themepark.com.cn/tag/zxzf" target="_blank"class="button-primary">获取主题</a><a class="button"  href="http://www.themepark.com.cn/shoppingbox-WordPress-plugins" target="_blank">制作一个支持的主题</a>	';  }else{echo '<p><span id="yes">检测到您的主题支持购物盒子插件，可以放心使用，也可以</span></p>
	
	<a  href="http://www.themepark.com.cn/tag/zxzf" target="_blank"class="button-primary">获取主题</a><a class="button"    href="http://www.themepark.com.cn/shoppingbox-wordpress-plugins.html" target="_blank">制作一个支持的主题</a>';}?>
    
  
  <h4>1.The first item</h4>
  <b>主题中加载脚本和样式表，让服务器请求更少，速度更快</b>
    <img src="<?php echo  plugins_url('images/theme_sport5.jpg', __FILE__ ) ?>" />
   
   <h4>2.The Second item</h4>
     <b>令人愉快的订单展现方式和购买者评分展示</b>
   <img src="http://themepark.qiniudn.com/oder.gif" />
    <h4>3.The Third item</h4>
  
     <b>移动端无缝兼容，更好的响应各个设备来访用户</b>
   <img src="http://themepark.qiniudn.com/1.gif" />
   
   
    <h4>4.The Fourth item</h4>
<b>在列表中显示评分、折扣和价格</b>
   <img src="<?php echo  plugins_url('images/theme_sport4.jpg', __FILE__ ) ?>" />
  
   <h4>5.The Fifth item</h4>
 
   <b>登录入口： 主题的登录入口需要判断用户是否登录，以及便捷的进入个人中心查看订单</b>
   <img src="<?php echo  plugins_url('images/theme_sport3.jpg', __FILE__ ) ?>" /><br />
<br />
<br />

  <a  href="http://www.themepark.com.cn/tag/zxzf" target="_blank"class="button-primary">现在获取支持的主题</a><br /><br />
<br />
<br />

   <b>WEB主题公园-themepark荣誉出品</b>
<br />
<br />
<br />

</div>
 
 
 
 
  
    </div>
<?php 
}
?>