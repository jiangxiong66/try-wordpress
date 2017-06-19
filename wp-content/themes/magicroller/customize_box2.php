<?php 
$customize_box2 =
array(

   

		
	"cebian" => array(
        "name" => "cebian",
        "std" => "",
        "title" => "侧边栏选择"),
			
	

);
function new_customize_box2() {
    global $post, $customize_box2;
  
       
	    $meta_box_value2 = get_post_meta($post->ID,"customize", true);
		 $meta_box_value3 = get_post_meta($post->ID,"cebian", true);
	
       
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
			

	 
	  
	  
  
	    echo '<input type="hidden" name="cebian_noncename" id="cebian_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	   echo'<div style=" width:100%; padding:10px 0;display:inline-block;overflow: hidden;">'; 
	      	
	  ?>
   
     
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
		 if ( $meta_box_value3 == 'catce_'.$category_id) {$selected= "selected='selected'";}else{$selected='';}
		  $catce=get_option('catce_'.$category_id);
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
    <a class="button" target="_blank" href="<?php bloginfo('url') ?>/wp-admin/customize.php?url=<?php echo get_permalink($_GET['post']) ?>">编辑侧边栏</a>
     </div>
   
      </div>
      
      <?php   
   wp_enqueue_script('kriesi_custom_fields_js', get_template_directory_uri(). '/js/metaup.js');  
 }

function create_meta_box_customize2() {
    global $theme_name;
  
    if ( function_exists('add_meta_box') ) {
      
		
		  add_meta_box( 'new_customize_box2', '注册和选择侧边栏', 'new_customize_box2', 'post', 'side', 'high' );
    }
}

function save_postdata_customize2( $post_id ) {
    global $post, $customize_box2;
  
    foreach($customize_box2 as $meta_box) {
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
add_action('admin_menu', 'create_meta_box_customize2');
add_action('save_post', 'save_postdata_customize2');

?>
