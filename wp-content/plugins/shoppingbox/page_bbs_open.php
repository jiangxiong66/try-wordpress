<?php 
$bbspage_box =
array(

   

	"bbs_cat_pages" => array(
        "name" => "bbs_cat_pages",
        "std" => "",
        "title" => "选择需要调用的论坛分类"),
		

	

);
function new_bbspage_box() {
    global $post, $bbspage_box;
  
       
	    $meta_box_value2 = get_post_meta($post->ID,"bbs_cat_pages", true);
	
	
       
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
			

	 
	  
	  
      echo '<input type="hidden" name="bbs_cat_pages_noncename" id="bbs_cat_pages_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

	   echo'<div style=" width:100%; padding:10px 0;display:inline-block;overflow: hidden;"><label>社区调用选项：</label>'; 
	      	
	  ?>
      <br />
<em>如果这个页面需要调用社区的版块，请在下面选择你所建立的社区分类<?php echo $meta_box_value2;; ?></em>
  <label>选择分类目录：</label>   
      <select name="bbs_cat_pages" id="bbs_cat_pages">
        <option value=''<?php if ( $meta_box_value2 == '' ) {echo "selected='selected'";}?>>不调用社区</option>

           
<?php 
  $categorys = get_categories(array('hide_empty' => 0));	
		
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		
		?>
		  <option <?php  if($meta_box_value2==$category_id){echo'selected="selected"';} ?>value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
		


<?php }?>

	</select>


 
     </div>
   
    
      
      <?php   

 }

function create_meta_box_bbspage_box() {
    global $theme_name;
  
    if ( function_exists('add_meta_box') ) {
      
		 add_meta_box( 'new_bbspage_box', '调用社区列表（购物盒子问答社区）', 'new_bbspage_box', 'page', 'side', 'high' );
		
    }
}

function save_postdata_bbspage_box( $post_id ) {
    global $post, $bbspage_box;
  
    foreach($bbspage_box as $meta_box) {
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
add_action('admin_menu', 'create_meta_box_bbspage_box');
add_action('save_post', 'save_postdata_bbspage_box');

?>
