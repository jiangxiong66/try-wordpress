<?php 

function shop_community_opinion(){
	
	if($_POST['Submit']) {
		$qq_app_id  = trim($_POST['qq_app_id']);
		$qq_app_secret = trim($_POST['qq_app_secret']);
		$shop_qqlogin_open = trim($_POST['shop_qqlogin_open']);
		$cat_bbs_id=trim($_POST['cat_bbs_id']);
		$bbs_post_page =trim($_POST['bbs_post_page']);
		$bbs_post_avatar =trim($_POST['bbs_post_avatar']);
		$bbs_cat_page =trim($_POST['bbs_cat_page']);
		$bbs_post_zd_n =trim($_POST['bbs_post_zd_n']);
		$bbs_post_nzd_n =trim($_POST['bbs_post_nzd_n']);
			$bbs_admin_avatar =trim($_POST['bbs_admin_avatar']);
				$bbs_admin =trim($_POST['bbs_admin']);
				$shop_bbs_open =trim($_POST['shop_bbs_open']);
				$bbs_my_page =trim($_POST['bbs_my_page']);
			$bbs_my_nav  = trim($_POST['bbs_my_nav']);
			$bbs_img_upload  = trim($_POST['bbs_img_upload']);	
			$bbs_user_push  = trim($_POST['bbs_user_push']);
			$post_push  = trim($_POST['post_push']);
				$comment_shop_bbs_registration =trim($_POST['comment_shop_bbs_registration']);
	   	$update_shop_queries = array();
	    $update_shop_text    = array();
		$update_shop_queries[] = update_option('shop_qqlogin_open', $shop_qqlogin_open);
			$update_shop_queries[] = update_option('bbs_img_upload', $bbs_img_upload);
	    $update_shop_queries[] = update_option('qq_app_id', $qq_app_id );
		$update_shop_queries[] = update_option('qq_app_secret', $qq_app_secret);
		$update_shop_queries[] = update_option('cat_bbs_id', $cat_bbs_id);
		$update_shop_queries[] = update_option('bbs_post_page', $bbs_post_page);
	    $update_shop_queries[] = update_option('bbs_post_avatar', $bbs_post_avatar);
			$update_shop_queries[] = update_option('bbs_cat_page', $bbs_cat_page);
			$update_shop_queries[] = update_option('bbs_post_zd_n', $bbs_post_zd_n);
			$update_shop_queries[] = update_option('bbs_post_nzd_n', $bbs_post_nzd_n);
			$update_shop_queries[] = update_option('bbs_admin_avatar', $bbs_admin_avatar);
			$update_shop_queries[] = update_option('bbs_admin', $bbs_admin);
			$update_shop_queries[] = update_option('shop_bbs_open', $shop_bbs_open);
			$update_shop_queries[] = update_option('bbs_my_page', $bbs_my_page);
				$update_shop_queries[] = update_option('comment_shop_bbs_registration', $comment_shop_bbs_registration);
			$update_shop_queries[] = update_option('bbs_my_nav', $bbs_my_nav);
	$update_shop_queries[] = update_option('bbs_user_push', $bbs_user_push);
	$update_shop_queries[] = update_option('post_push', $post_push);
	
		$update_shop_text[] = '开启社会化登录';
		$update_shop_text[] = '【QQ】app_id';
	    $update_shop_text[] = '【QQ】app_secret';
		 $update_shop_text[] = '指定社区分类';
		  $update_shop_text[] = '指定发帖页面';
		   $update_shop_text[] = '社区默认头像';
	    $update_shop_text[] = '指定社区页面';
		 $update_shop_text[] = '显示置顶数量';
		  $update_shop_text[] = '显示帖子数量（非置顶）';
		  $update_shop_text[] = '管理员头像';
		   $update_shop_text[] = '管理员名称'; 
		   $update_shop_text[] = '小型社区开启'; 
		   $update_shop_text[] = '指定我的帖子页面';
		   $update_shop_text[] = '是否允许游客评论';
		   $update_shop_text[] = '社区版块菜单';
           $update_shop_text[] = '审核帖子';
		    $update_shop_text[] = '默认投稿分类';
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
	
       $bbs_img_upload = get_option('bbs_img_upload');
        $qq_app_id = get_option('qq_app_id');
		$qq_app_secret = get_option('qq_app_secret');
		$shop_qqlogin_open= get_option('shop_qqlogin_open');
		$cat_bbs_id=get_option('cat_bbs_id');
		$bbs_post_page=get_option('bbs_post_page');
		$bbs_post_avatar=get_option('bbs_post_avatar');
		$bbs_cat_page=get_option('bbs_cat_page');
		$bbs_post_zd_n =get_option('bbs_post_zd_n');
		$bbs_post_nzd_n =get_option('bbs_post_nzd_n');
		$bbs_admin_avatar=get_option('bbs_admin_avatar');
		$bbs_admin=get_option('bbs_admin');
		$shop_bbs_open=get_option('shop_bbs_open');
		$bbs_my_page=get_option('bbs_my_page');
		$comment_shop_bbs_registration=get_option('comment_shop_bbs_registration');
		$bbs_my_nav  = get_option('bbs_my_nav');
		$bbs_user_push  = get_option('bbs_user_push');
		$post_push  = get_option('post_push');
?>

<div class="wrap">
<?php if(!empty($text)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$text.'</p></div>'; } ?>
     <?php if (!function_exists( 'shoppingbox_theme_support' ) ) { echo ' <p class="update-nag"><strong>请注意：未检测到正在使用的主题已经支持购物盒子插件，最基本请确保您的主题有登陆和注册的入口，或者按照我们提供的提示进行制作支持！若无登录入口，请勿选择屏蔽默认入口，否则将会无法登录</strong><br /><a href="http://www.themepark.com.cn/tag/zxzf" target="_blank">获取兼容的主题</a>/<a href="http://www.themepark.com.cn/shoppingbox-WordPress-plugins" target="_blank">制作兼容的主题</a></p>';  }?>
   <h2>社区和社会化登录选项</h2>
    <p  class="update-nag">
               插件提供社会化登录以及小型问答社区的功能，如果你需要进行社会化登录，那么需要去qq开放平台申请一个授权，这样才能成功的进行社会化登录，申请流程：
<a href="http://www.themepark.com.cn/gwhz153xxbqgnfdspjc.html" target="_blank">[弹出查看]购物盒子WordPress插件社会化登录以及小型社区的建立</a><br />
开放小型问答社区以及社会化登录之后，请在WordPress的设置--讨论中将默认头像关闭，社会化登录会自动获取用户在qq、新浪微博等提供商的社区头像作为本地头像，速度大大加快。<br />
<br />
这里和注册登录的建立一样，你需要先建立好页面，然后使用短代码来输出出来。<br />
<br />
短代码：
<br />
<br />
发帖页面（指定发帖页面时，将短代码输入正文）：[post_bbs_page_short]<br />
<br />
社区列表（指定社区页面时，将短代码输入正文）：[bbs_list_short]<br />
<br />
我的帖子（指定社区页面时，将短代码输入正文）：[my_bbs_short]
<br />
社区版块（如果你开启了社区多板块系统的话）：[cat_bbs_nav_short]
<br />
投稿（如果你开启了投稿功能的话）：[post_page]



</p>
   <form method="post" action="<?php echo admin_url('admin.php?page=shop_community') ?>" style="width:70%;float:left;">
     <table class="form-table">
    
    <tr> <td> <h3>社会化登录</h3><br /><p>你需要去社交媒体的开放平台申请他们的权限，获取key权限填写到下面即可。</p></td> </tr>
    
           <tr>
         <td>开启社会化登录：<input  type="checkbox" <?php if($shop_qqlogin_open=="yes"){echo 'checked="checked"';} ?> id="shop_qqlogin_open" name="shop_qqlogin_open" value="yes" /><em>开启之后在登录和注册页面的下方会显示使用社会化登录的按钮</em>
         </td>
      </tr>    
          
     <tr> <td>【QQ】app_id：<input  type="text" id="qq_app_id" name="qq_app_id" value="<?php echo $qq_app_id; ?>" /><em>在QQ开放平台申请，填写到这里，必须申请成功之后qq登录才会有效</em>

     
         </td>
          </tr> 
         <tr>
         <td>【QQ】app_secret：<input  type="text" id="qq_app_secret" name="qq_app_secret" value="<?php echo $qq_app_secret; ?>" /><em>在QQ开放平台申请，填写到这里，必须申请成功之后qq登录才会有效</em>

     
         </td>
           </tr>
         <tr> <td> <h3>投稿功能</h3><br /><p>你可以指定一个默认投稿的分类</p></td> </tr>  
           <tr>
         
         
          <tr>
         <td>指定投稿默认分类：
                         
             <select id="post_push" name="post_push" >
              <option value=''>请选择</option>
<?php $args = array(
	'hide_empty'=> 0,


);
		 $categorys = get_categories($args);
		
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $post_push== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>
    <em>指定社区分类之后，相关帖子发布会归纳到社区的分类中</em>

     
         </td>
      </tr>     
      
         
      </tr>
         <tr> <td> <h3>小型社区</h3><br /><p>社区是通过WordPress默认的分类和文章所构成的，所以你在开始下面的设定之前，请建立好一个分类目录，并取名为你的社区或者论坛名称。、。</p></td> </tr>  
           <tr>
         <td>开启社区功能：<input  type="checkbox" <?php if($shop_bbs_open=="yes"){echo 'checked="checked"';} ?> id="shop_bbs_open" name="shop_bbs_open" value="yes" /><em>开启之后在我的个人中心会显示我的帖子</em>
         </td>
      </tr>    
            
       <tr>
         <td>指定社区分类：
                         
             <select id="cat_bbs_id" name="cat_bbs_id" >
              <option value=''>请选择</option>
<?php $args = array(
	'hide_empty'=> 0,


);
		 $categorys = get_categories($args);
		
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $cat_bbs_id == $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>
    <em>指定社区分类之后，相关帖子发布会归纳到社区的分类中</em>

     
         </td>
      </tr>     
      
        <tr>
         <td>指定社区页面
                         
             <select id="bbs_cat_page" name="bbs_cat_page" >
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
					if ( $bbs_cat_page == $page_id ) {
						echo "selected='selected'";
					}
				?>><?php echo $page_name; ?></option>
		<?php } ?>
	</select>
    <em>建立好社区分类，可以将社区分类的帖子调用到一个页面中显示。</em>

     
         </td>
      </tr>     
      
      <tr>
         <td>指定发帖页面
                         
             <select id="bbs_post_page" name="bbs_post_page" >
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
					if ( $bbs_post_page == $page_id ) {
						echo "selected='selected'";
					}
				?>><?php echo $page_name; ?></option>
		<?php } ?>
	</select>

     
         </td>
      </tr>     
      
      
         
      <tr>
         <td>指定我的帖子页面
                         
             <select id="bbs_my_page" name="bbs_my_page" >
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
					if ( $bbs_my_page == $page_id ) {
						echo "selected='selected'";
					}
				?>><?php echo $page_name; ?></option>
		<?php } ?>
	</select>

     
         </td>
      </tr>     
             
      <tr>
         <td>指定一个社区版块菜单，如果你有多个社区版块的话
                         
             <select id="bbs_my_nav" name="bbs_my_nav" >
              <option value=''>默认没有版块</option>
               
		<?php
		$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $bbs_my_nav, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
		
	</select>

     
         </td>
      </tr>  
      
      
 <tr>
   <td>社区帖子是否需要审核<?php echo $bbs_user_push;?>
                         
             <select id="bbs_user_push" name="bbs_user_push" >
              <option value='' <?php if ( !$bbs_user_push ) {echo "selected='selected'";} ?>>不需要审核</option>
              <option value='all' <?php if ($bbs_user_push=='all' ) {echo "selected='selected'";} ?>>所有的帖子都需要审核</option>
              <option value='push' <?php if ($bbs_user_push=='push' ) {echo "selected='selected'";} ?>>用户发布的第一篇帖子需要审核</option>

	</select>
<em>这是防止广告刷帖的一个机制，你可以选择所有的用户发布的帖子都需要审核，也可以只限制用户发布的第一篇帖子需要审核，当用户有了一篇通过审核的帖子，那么以后的帖子就不需要再审核了。</em>
     
         </td>
      </tr>     
              
          <tr>
         <td>
 <label>社区默认头像：</label>
        <input  style="border:1px #ccc solid"  name="bbs_post_avatar" id="bbs_post_avatar" value="<?php echo $bbs_post_avatar; ?>" />
        <input type="button" value="上传" id="images_up" class="button"/>
     
         </td>
      </tr>     
      
         <tr>
         <td>
 <label>回复帖子时，管理员的头像（80X80）：</label>
        <input  style="border:1px #ccc solid"  name="bbs_admin_avatar" id="bbs_admin_avatar" value="<?php echo $bbs_admin_avatar; ?>" />
        <input type="button" value="上传" id="images_up" class="button"/>
     
         </td>
      </tr>     
      
        <tr>
         <td>
 <label>回复帖子时，管理员的名称（如：责任编辑1132）：</label>
        <input  style="border:1px #ccc solid"  name="bbs_admin" id="bbs_admin" value="<?php echo $bbs_admin; ?>" />
       
     
         </td>
      </tr>    
      
         </tr>     
              
          <tr>
         <td>
 <label>显示置顶帖子数量（默认5）：</label>
        <input  style="border:1px #ccc solid"  name="bbs_post_zd_n" id="bbs_post_zd_n" value="<?php if($bbs_post_zd_n){echo $bbs_post_zd_n;}else{echo "5";}; ?>" />
     
     
         </td>
      </tr>    
      
         <tr>
         <td>
 <label>显示帖子数量（非置顶）（默认15）：</label>
        <input  style="border:1px #ccc solid"  name="bbs_post_nzd_n" id="bbs_post_nzd_n" value="<?php if($bbs_post_nzd_n){echo $bbs_post_nzd_n;}else{echo "15";}; ?>" />
     
     
         </td>
      </tr>    
             
              <tr>
         <td>
 <label>是否允许游客回帖：</label>
        <input  type="checkbox" <?php if($comment_shop_bbs_registration=="yes"){echo 'checked="checked"';} ?> id="comment_shop_bbs_registration" name="comment_shop_bbs_registration" value="yes" />
     
     
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
<?php wp_enqueue_script('kriesi_custom_fields_js',WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)). '/js/metaup.js');   ?>
<?php
 
}
?>