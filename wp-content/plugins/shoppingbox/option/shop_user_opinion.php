<?php 

function shop_user_opinion(){
	
	if($_POST['Submit']) {
		$shop_login = trim($_POST['shop_login']);
		$shop_register = trim($_POST['shop_register']);
		$shop_profile = trim($_POST['shop_profile']);
		$shop_edit_profile = trim($_POST['shop_edit_profile']);
		$hidden_login = trim($_POST['hidden_login']);
		$error_login_time = trim($_POST['error_login_time']);
		$shop_style = trim($_POST['shop_style']);
		$shop_fogotpassword = trim($_POST['shop_fogotpassword']);
		$ajax_comment_open = trim($_POST['ajax_comment_open']);
	   	$update_shop_queries = array();
	    $update_shop_text    = array();
	    $update_shop_queries[] = update_option('shop_login', $shop_login);
		$update_shop_queries[] = update_option('shop_register', $shop_register);
		$update_shop_queries[] = update_option('shop_profile', $shop_profile);
		$update_shop_queries[] = update_option('shop_edit_profile', $shop_edit_profile);
		$update_shop_queries[] = update_option('hidden_login', $hidden_login);
		$update_shop_queries[] = update_option('error_login_time', $error_login_time);
		$update_shop_queries[] = update_option('shop_style', $shop_style);
			$update_shop_queries[] = update_option('shop_fogotpassword', $shop_fogotpassword);
			$update_shop_queries[] = update_option('ajax_comment_open', $ajax_comment_open);
		$update_shop_text[] = '登录页面指定';
	    $update_shop_text[] = '注册页面指定';
	    $update_shop_text[] = '个人中心页面指定';
	    $update_shop_text[] = '修改资料页面指定';
	    $update_shop_text[] = '隐藏默认登录链接';
		$update_shop_text[] = '再次登录时间';
		$update_shop_text[] = '默认样式和脚本';
		$update_shop_text[] = '找回密码页面指定';
		$update_shop_text[] = '开启ajax评论框';
		$i = 0;
	    $text = '';
		
		foreach($update_shop_queries as $update_shop_query) {
		if($update_shop_query) {
			$text .= '<font color="green">'.$update_shop_text[$i].' 更新成功！</font><br />';
		}
		$i++;
	}
	if(empty($text)) {
		$text = '<font color="red">您对设置没有做出任何改动...</font>';
	}
		
		
		}
	

        $shop_login = get_option('shop_login');
		$shop_register = get_option('shop_register');
		$shop_profile = get_option('shop_profile');
		$shop_edit_profile = get_option('shop_edit_profile');
		$hidden_login = get_option('hidden_login');
		$error_login_time = get_option('error_login_time');
	    $shop_style = get_option('shop_style');
		$shop_fogotpassword = get_option('shop_fogotpassword');
		 $ajax_comment_open = get_option('ajax_comment_open');
?>

<div class="wrap">
<?php if(!empty($text)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$text.'</p></div>'; } ?>
     <?php if (!function_exists( 'shoppingbox_theme_support' ) ) { echo ' <p class="update-nag"><strong>请注意：未检测到正在使用的主题已经支持购物盒子插件，最基本请确保您的主题有登陆和注册的入口，或者按照我们提供的提示进行制作支持！若无登录入口，请勿选择屏蔽默认入口，否则将会无法登录</strong><br /><a href="http://www.themepark.com.cn/tag/zxzf" target="_blank">获取兼容的主题</a>/<a href="http://www.themepark.com.cn/shoppingbox-wordpress-plugins.html" target="_blank">制作兼容的主题</a></p>';  }?>
   <h2>开放用户注册设置</h2>
    <p  class="update-nag">
                在准备开放注册之前，你需要建立好开放注册所需要的页面：注册、登录、我的个人中心、修改资料，这些页面需要你使用短代码来输出注册、登录、订单列表、修改资料等表单和内容，这款插
                件需要你了解好WordPress短代码的使用。手动建立好对应的页面，并在文章正文编辑框插入以下对应的短代码即可输出内容,短代码应用列表：<br />
                注册： [register_short]<br />
                登录： [login_short]<br />
                我的个人中心：  [profile_short]<br />
                修改资料：  [edit_profile]<br />
                找回密码： [fogotpassword]<br /><br />
<a href="http://www.themepark.com.cn/gwhz153xxbqgnfdspjc.html" target="_blank">[详细搭建教程]购物盒子WordPress支付插件功能介绍和使用教程</a><br /><br />

<?php echo '当前php版本为'.phpversion().'<strong>购物盒子必须在php5.3以上环境运行，请注意检查你的php版本，若使用PHP5.2以及以下版本，登录功能将不能正确的执行（点击登录注册无效）</strong>'; ?>
</p>
   <form method="post" action="<?php echo admin_url('admin.php?page=shop_user') ?>" style="width:70%;float:left;">
     <table class="form-table">
    
    <tr> <td> <h3>开放注册初始化选项</h3><br /><p>当你建立好了上面提示的页面，并且填写好短代码，检查好这些页面是否输出了正确的内容，那么你可以开始设置下面的选项了。</p></td> </tr>
    
           <tr>
         <td>是否屏蔽默认的插件样式和脚本：<input  type="checkbox" <?php if($shop_style=="yes"){echo 'checked="checked"';} ?> id="shop_style" name="shop_style" value="yes" /><em>
         <?php if (! function_exists( 'shoppingbox_theme_support' ) ) { ?>
         <strong>【请注意：如果你的主题已经兼容这款插件，那么你需要点选这个选项，以此避免样式和脚本重复并且减少服务器请求，<a href="http://www.themepark.com.cn/tag/zxzf" target="_blank">点击查看WEB主题公园中的兼容主题，用户体验更好，加载更快</a>】</strong>
         <?php }else{echo '<strong>您的主题已经支持购物盒子，请选中后保存。</strong>';}?>
         </em>
         </td>
      </tr>    
      
         <tr>
         <td>是否开启插件评论框？：<input  type="checkbox" <?php if($ajax_comment_open=="yes"){echo 'checked="checked"';} ?> id="ajax_comment_open" name="ajax_comment_open" value="yes" /><em>
      
         <strong>开启插件评论框即可替换掉默认的评论框，使用本地化的评论系统，并支持社会化登录是调用的本地化头像</strong>
        
         </em>
         </td>
      </tr>    
      
          
     <tr> <td>指定登录页面：
                         
             <select id="shop_login" name="shop_login" >
              <option value=''>请选择</option>
                    <?php 
		               $pages = get_pages();

	                   	foreach( $pages AS $page ) { 
		                $page_id=$page->ID;
		                $page_name=$page->post_title;
		               ?>
			<option 
				value='<?php echo  $page_id; ?>'
				<?php
					if ( $shop_login == $page_id ) {
						echo "selected='selected'";
					}
				?>><?php echo $page_name; ?></option>
		<?php } ?>
	</select>

     
         </td>
          </tr> 
         <tr>
         <td>指定注册页面：
                         
             <select id="shop_register" name="shop_register" >
              <option value=''>请选择</option>
                    <?php 
		               $pages = get_pages();
		
	                   	foreach( $pages AS $page ) { 
		                $page_id=$page->ID;
		                $page_name=$page->post_title;
		               ?>
			<option 
				value='<?php echo  $page_id; ?>'
				<?php
					if ( $shop_register == $page_id ) {
						echo "selected='selected'";
					}
				?>><?php echo $page_name; ?></option>
		<?php } ?>
	</select>

     
         </td>
      </tr>
            
       <tr>
         <td>指定我的个人中心页面：
                         
             <select id="shop_profile" name="shop_profile" >
              <option value=''>请选择</option>
                    <?php 
		               $pages = get_pages();
	                   	foreach( $pages AS $page ) { 
		                $page_id=$page->ID;
		                $page_name=$page->post_title;
		               ?>
			<option 
				value='<?php echo  $page_id; ?>'
				<?php
					if ( $shop_profile == $page_id ) {
						echo "selected='selected'";
					}
				?>><?php echo $page_name; ?></option>
		<?php } ?>
	</select>

     
         </td>
      </tr>     
      
      
      <tr>
         <td>指定找回密码页面：
                         
             <select id="shop_fogotpassword" name="shop_fogotpassword" >
              <option value=''>请选择</option>
                    <?php 
		               $pages = get_pages();
	                   	foreach( $pages AS $page ) { 
		                $page_id=$page->ID;
		                $page_name=$page->post_title;
		               ?>
			<option 
				value='<?php echo  $page_id; ?>'
				<?php
					if ( $shop_fogotpassword == $page_id ) {
						echo "selected='selected'";
					}
				?>><?php echo $page_name; ?></option>
		<?php } ?>
	</select>

     
         </td>
      </tr>     
              
          <tr>
         <td>指定修改资料页面：
                         
             <select id="shop_edit_profile" name="shop_edit_profile" >
              <option value=''>请选择</option>
                    <?php 
		                $pages = get_pages();

	                   	foreach( $pages AS $page ) { 
		                $page_id=$page->ID;
		                $page_name=$page->post_title;
		               ?>
			<option 
				value='<?php echo  $page_id; ?>'
				<?php
					if ( $shop_edit_profile == $page_id ) {
						echo "selected='selected'";
					}
				?>><?php echo $page_name; ?></option>
		<?php } ?>
	</select>

     
         </td>
      </tr>     
      
       <tr>
         <td>是否屏蔽WordPress默认登录地址：<input  type="checkbox" <?php if($hidden_login=="yes"){echo 'checked="checked"';} ?> id="hidden_login" name="hidden_login" value="yes" /><em><strong>【请注意：设置好了登录和注册页面才可以点选这个选项，否则将没有登录的入口,这个选项同时会关闭顶部的管理条，禁止非管理员进入后台】</strong></em>
         </td>
      </tr>    
      
       <tr>
         <td>登录5次错误之后：<input  type="text" id="error_login_time" name="error_login_time" value="<?php echo $error_login_time; ?>" />分钟之后才可以再次登录。<em>【安全性：登录三次错误时，需要填写验证码，登录五次错误之后你可以设置需要再次登录等待的时间，默认为15分钟，管理员有权限可以解锁或者锁定用户登录】</em>
         </td>
      </tr>     
             
            
        </table>
        
         <table> <tr>
        <td><p class="submit">
            <input type="submit" name="Submit" value="保存设置" class="button-primary"/>
            </p>
        </td>

        </tr> </table>      
   
   </form>
</div>
<?php 
}
?>