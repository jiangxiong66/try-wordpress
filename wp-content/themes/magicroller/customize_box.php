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
			
	

);
function new_customize_box() {
    global $post, $customize_box;
  
       
	    $meta_box_value2 = get_post_meta($post->ID,"customize", true);
		 $meta_box_value3 = get_post_meta($post->ID,"cebian", true);
	
       
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
			

	 
	  
	  
      echo '<input type="hidden" name="customize_noncename" id="customize_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	    echo '<input type="hidden" name="cebian_noncename" id="cebian_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	   echo'<div style=" width:100%; padding:10px 0;display:inline-block;overflow: hidden;"><label>开启自定义排版模式：</label>'; 
	      	
	  ?>
      <br />
<em>如果你开启了自定义排版模式，那么页面本身就会变成和首页一样可以进行自定义排版了</em>
      <select name="customize" id="customize">
	        
			 <option value=''<?php if ( $meta_box_value2 == '' ) {echo "selected='selected'";}?>>不启用</option>
             <option value='modle1'<?php if ( $meta_box_value2 == 'modle1') {echo "selected='selected'";}?>>启用自定义模式</option>
           


	</select><br />

<p>启用自定义排版模式<strong>并保存页面</strong>之后，点击下面的按钮进入自定义开始排版</p>
<a class="button" target="_blank" href="<?php bloginfo('url') ?>/wp-admin/customize.php?url=<?php echo get_page_link($_GET['post']) ?>">开始自定义排版</a>
      </div>
     
  <div style=" width:100%; padding:10px 0;display:inline-block;overflow: hidden;"><label>选择侧边栏：</label>   
      <select name="cebian" id="cebian">
	        
			 <option value=''<?php if ( $meta_box_value3 == '' ) {echo "selected='selected'";}?>>默认的侧边栏目</option>
             <option value='modle1'<?php if ( $meta_box_value3 == 'modle1') {echo "selected='selected'";}?>>创建新的侧边栏并使用</option>
           
<?php 
  $categorys = get_categories(array('hide_empty' => 0));	
		
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		 $catce=get_option('catce_'.$category_id);
		 if($catce==='modle1'){
		 echo' <option value="catce_'.$category_id.'">'.$category_name.'_侧边栏</option>';}
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
   
    
      
      <?php   
   wp_enqueue_script('kriesi_custom_fields_js', get_template_directory_uri(). '/js/metaup.js');  
 }

function create_meta_box_customize() {
    global $theme_name;
  
    if ( function_exists('add_meta_box') ) {
      
		 add_meta_box( 'new_customize_box', '自定义排版和注册侧边栏', 'new_customize_box', 'page', 'side', 'high' );
		
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
