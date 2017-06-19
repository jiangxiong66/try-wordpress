<?php 
$gallery_box =
array(

   

	"hots_tlye" => array(
        "name" => "gallery_tlye",
        "std" => "",
        "title" => "相册模式"),
		
	

);
function new_gallery_box() {
    global $post, $gallery_box;
  
       
	    $meta_box_value2 = get_post_meta($post->ID,"gallery_tlye", true);
		
	
       
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
			

	 
	  
	  
      echo '<input type="hidden" name="gallery_tlye_noncename" id="gallery_tlye_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	   echo'<div style=" width:100%; padding:10px 0;display:inline-block;overflow: hidden;"><label>相册模式选择：</label>'; 
	      	
	  ?>
      <em>在左边建立一个相册，你可以选择相册显示的模式，请注意：选择左右旋转模式和带有略缩图模式的相册时，务必图片尺寸保持统一，否则会出现空白</em>
      <select name="gallery_tlye" id="gallery_tlye">
	        
			 <option value=''<?php if ( $meta_box_value2 == '' ) {echo "selected='selected'";}?>>点击放大的图片列表</option>
             <option value='modle1'<?php if ( $meta_box_value2 == 'modle1') {echo "selected='selected'";}?>>左右旋转的大图</option>
             <option value='modle2'<?php if ( $meta_box_value2 == 'modle2' ) {echo "selected='selected'";}?>>带有略缩图的切换</option>


	</select>

      </div>
     
     
      <?php if($meta_box_value3){ ?> <div  style=" width:100%; padding:10px 0 5px 0;display:inline-block;overflow: hidden;"> <a><img style="width:150px; height:111px;" src="<?php echo $meta_box_value3; ?>" /></a></div><?php }  ?>
    
      
      <?php   
   wp_enqueue_script('kriesi_custom_fields_js', get_template_directory_uri(). '/js/metaup.js');  
 }

function create_meta_box_gallery() {
    global $theme_name;
  
    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new_gallery_box', '相册模式选择', 'new_gallery_box', 'post', 'side', 'high' );
		 add_meta_box( 'new_gallery_box', '相册模式选择', 'new_gallery_box', 'page', 'side', 'high' );
    }
}

function save_postdata_gallery( $post_id ) {
    global $post, $gallery_box;
  
    foreach($gallery_box as $meta_box) {
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
add_action('admin_menu', 'create_meta_box_gallery');
add_action('save_post', 'save_postdata_gallery');

?>
