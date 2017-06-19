<?php 
$customize_box =
array(

   

	"hots_tlye" => array(
        "name" => "customize",
        "std" => "",
        "title" => "相册模式"),
		
		
	"cebian" => array(
        "name" => "cebian",
        "std" => "",
        "title" => "侧边栏选择"),
		
		"script_on" => array(
        "name" => "script_on",
        "std" => "",
        "title" => "焦点图是否滚动"),
			
	"page_nav" => array(
        "name" => "page_nav",
        "std" => "",
        "title" => "菜单选择"),
		
			"fenxiangcode" => array(
        "name" => "fenxiangcode",
        "std" => "",
        "title" => "分享代码"),
						
	"page_nav2" => array(
        "name" => "page_nav2",
        "std" => "",
        "title" => "是否显示焦点图下的留言框"),
								
	"page_pic_hieght" => array(
        "name" => "page_pic_hieght",
        "std" => "",
        "title" => "焦点图高度"),
		
		"page_pic_hieght2" => array(
        "name" => "page_pic_hieght2",
        "std" => "",
        "title" => "焦点图高度（手机版）"),
		
			"page_pic_heng" => array(
        "name" => "page_pic_heng",
        "std" => "",
        "title" => "焦点图启用横向平移"),

);
function new_customize_box() {
    global $post, $customize_box;
  
       
	    $meta_box_value2 = get_post_meta($post->ID,"customize", true);
		 $meta_box_value3 = get_post_meta($post->ID,"cebian", true);
		  $meta_box_value4 = get_post_meta($post->ID,"script_on", true);
		  	  $meta_box_value8 = get_post_meta($post->ID,"page_nav", true);
			     $meta_box_value5 = get_post_meta($post->ID,"page_nav2", true);
			   $meta_box_value6 = get_post_meta($post->ID,"page_pic_hieght", true);
			      $meta_box_value7 = get_post_meta($post->ID,"page_pic_hieght2", true);
	  $fenxiangcode = get_post_meta($post->ID,"fenxiangcode", true);
	   $page_pic_heng = get_post_meta($post->ID,"page_pic_heng", true);
       
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
			

	 
	  
	      echo '<input type="hidden" name="fenxiangcode_noncename" id="fenxiangcode_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
      echo '<input type="hidden" name="customize_noncename" id="customize_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	    echo '<input type="hidden" name="cebian_noncename" id="cebian_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />'; 
		echo '<input type="hidden" name="script_on_noncename" id="script_on_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		 echo '<input type="hidden" name="page_nav_noncename" id="page_nav_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		   echo '<input type="hidden" name="page_nav2_noncename" id="page_nav2_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		     echo '<input type="hidden" name="page_pic_hieght_noncename" id="page_pic_hieght_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
			  echo '<input type="hidden" name="page_pic_hieght2_noncename" id="page_pic_hieght2_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
			    echo '<input type="hidden" name="page_pic_heng_noncename" id="page_pic_heng_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	   echo'<div style=" width:100%; padding:10px 0;display:inline-block;overflow: hidden;"><label>开启自定义排版模式：</label>'; 
	      	
	  ?>
      <br />
<em>如果你开启了自定义排版模式，那么页面本身就会变成和首页一样可以进行自定义排版了</em>
      <select name="customize" id="customize">
	        
			 <option value=''<?php if ( $meta_box_value2 == '' ) {echo "selected='selected'";}?>>不启用</option>
             <option value='modle1'<?php if ( $meta_box_value2 == 'modle1') {echo "selected='selected'";}?>>启用自定义模式</option>
           


	</select><br /><br />


    
    <em>如果你开启了自定义排版模式，你可以选择自定义模式下焦点图是否滚动</em>
      <select name="script_on" id="script_on">
	        
			 <option value=''<?php if (!$meta_box_value4) {echo "selected='selected'";}?>>正常滚动</option>
             <option value='on'<?php if ($meta_box_value4) {echo "selected='selected'";}?>>不滚动</option>
           


	</select><br /><br />
    
      <em>是否选择横向滚动模式</em>
      <select name="page_pic_heng" id="page_pic_heng">
	        
			 <option value=''<?php if (!$page_pic_heng) {echo "selected='selected'";}?>>竖向滚轴模式</option>
             <option value='on'<?php if ($page_pic_heng) {echo "selected='selected'";}?>>横向模式</option>
           


	</select><br /><br />
    
     <em>若你想要控制自定义页面的焦点图高度，你可以在此独立设置(pc)</em>
       <input type="text" size="30"  name="page_pic_hieght" id="page_pic_hieght" value="<?php echo $meta_box_value6; ?>"/>   <br /><br />
       
        <em>手机版焦点图高度（设置之后，手机版的自动全屏高度无效）</em>
       <input type="text" size="30"  name="page_pic_hieght2" id="page_pic_hieght2" value="<?php echo $meta_box_value7; ?>"/>   <br /><br />
    
 <?php 	$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) ); ?>
   <label for="page_nav">指定额外的导航菜单</label>
   
			<select id="page_nav" name="page_nav">
				<option value="">默认的导航菜单</option>
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $meta_box_value4, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
			</select>
            
      <br /><br />
   <label for="page_nav2">是否显示焦点图下的搜索和菜单</label>
			<select id="page_nav2" name="page_nav2">
				<option value=""<?php if ( !$meta_box_value5) {echo "selected='selected'";}?>>默认显示</option>
                <option value="no"<?php if ( $meta_box_value5) {echo "selected='selected'";}?>>不显示</option>
	
			</select>  
<br /><br />
<p>启用自定义排版模式<strong>并保存页面</strong>之后，点击下面的按钮进入自定义开始排版</p>
<a class="button" target="_blank" href="<?php bloginfo('url') ?>/wp-admin/customize.php?url=<?php echo get_page_link($_GET['post']) ?>">开始自定义排版</a>
      </div>
     <br /><br />
  <div style=" width:100%; padding:10px 0;display:inline-block;overflow: hidden;"><label>选择侧边栏：<?php echo $meta_box_value3; ?></label>   
      <select name="cebian" id="cebian">
	        
			 <option value=''<?php if ( $meta_box_value3 == '' ) {echo "selected='selected'";}?>>默认的侧边栏目</option>
             <option value='modle1'<?php if ( $meta_box_value3 == 'modle1') {echo "selected='selected'";}?>>创建新的侧边栏并使用</option>
             
             
             
             
           
<?php 
  $categorys = get_categories(array('hide_empty' => 0));	
		
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		 $catce=get_option('catce_'.$category_id);
		 if ( $meta_box_value3 == 'catce_'.$category_id) {$selected= "selected='selected'";}
		 if($catce==='modle1'){
		 echo' <option value="catce_'.$category_id.'"'.$selected.'>'.$category_name.'_侧边栏</option>';}
		 }


$pages = get_pages();
		foreach( $pages AS $page ) { 
		 $page_id=$page->ID;
		  $page_name=$page->post_title;
		
		   if(get_post_meta($page_id, "cebian",true)==='modle1'){ 
		?>
		   <option value='<?php echo 'cebian_'.$page_id; ?>'<?php if ( $meta_box_value3 == 'cebian_'.$page_id) {echo "selected='selected'";}?>><?php echo $page_name.'-侧边栏' ?></option>
	<?php	}} ?>

	</select><br />
<em>在这里你可以选择已经建立好的侧边栏，也可以创建一个侧边栏，并点击下面的按钮进行侧边栏的编辑<br />
<strong style="color:red">如果创建了一个侧边栏，请勿选择其他选项，否则此创建的侧边栏将会被删除！</strong></em><br />
<?php if(is_post) ?>
    <a class="button" target="_blank" href="<?php bloginfo('url') ?>/wp-admin/customize.php?url=<?php echo get_page_link($_GET['post']) ?>">编辑侧边栏</a>
     </div>
    <div style=" width:100%; padding:10px 0;display:inline-block;overflow: hidden;"><label for="fenxiangcode">分享代码：</label> <br />
  
      <textarea name="fenxiangcode" cols="86" rows="4" id="fenxiangcode"><?php echo stripslashes($fenxiangcode); ?></textarea>   
      </div> 
      <em>若启用了自定义模式，分享代码在小工具的html模块输出可能会遇到一些问题，那么你可以从此处输出分享代码，我们也放置了一段预留的代码才此处，若想要使用预留的百度分享代码，上方填写1即可,若不填写则不显示任何代码。</em>
      
      <?php   
   wp_enqueue_script('kriesi_custom_fields_js', get_template_directory_uri(). '/js/metaup.js');  
 }

function create_meta_box_customize() {
    global $theme_name;
  
    if ( function_exists('add_meta_box') ) {
      
		 add_meta_box( 'new_customize_box', '自定义排版和注册侧边栏', 'new_customize_box', 'page', 'normal', 'high' );
		
    }
}

function save_postdata_customize( $post_id ) {
    global $post, $customize_box;
  
    foreach($customize_box as $meta_box) {
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
add_action('admin_menu', 'create_meta_box_customize');
add_action('save_post', 'save_postdata_customize');

?>
