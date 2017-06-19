<?php 
$new_meta_boxes =
array(

    "hoturl" => array(
        "name" => "hoturl",
        "std" => "",
        "title" => "链接"),
		
   

	"hots_tlye" => array(
        "name" => "hots_tlye",
        "std" => "",
        "title" => "焦点图样式"),
		
		
	"title_images" => array(
        "name" => "title_images",
        "std" => "",
        "title" => "封面图片调整"),
		

);
function new_meta_boxes() {
    global $post, $new_meta_boxes;
  
        $meta_box_value = get_post_meta($post->ID,"hoturl", true);
	    $meta_box_value2 = get_post_meta($post->ID,"hots_tlye", true);
		$meta_box_value3 = get_post_meta($post->ID,"title_images", true);
	
       
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
			
        echo'
		
		<input type="hidden" name="title_images_noncename" id="title_images_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />
		<input type="hidden" name="hoturl_noncename" id="hoturl_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />
	<div style="  width:width:100%;padding:10px 0; display:block;overflow: hidden;">';


        echo'<label>替换链接：</label>'; 
   	 echo'<input  style="border:1px #ccc solid" name="hoturl" id="hoturl" value="'.$meta_box_value.'" /><em>[这个链接必须是带有“http://”可以是站内也可以是站外链接，会将默认的文章链接替换。]</em></div>';
	 
	  
	  
      echo '<input type="hidden" name="hots_tlye_noncename" id="hots_tlye_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	   echo'<div style=" width:100%; padding:10px 0;display:inline-block;overflow: hidden;"><label>链接目标：</label>'; 
	      	
	  ?>
      <select name="hots_tlye" id="hots_tlye">
	        
			 <option value=''<?php if ( $meta_box_value2 == '' ) {echo "selected='selected'";}?>>自身网页跳转</option>
             <option value='target="_blank"'<?php if ( $meta_box_value2 == 'target="_blank"') {echo "selected='selected'";}?>>新开页面跳转(站内)</option>
             <option value='target="_blank" rel="nofollow"'<?php if ( $meta_box_value2 == 'target="_blank" rel="nofollow"' ) {echo "selected='selected'";}?>>新开页面跳转（站外，no-follow）</option>
              <option value='rel="nofollow"'<?php if ( $meta_box_value2 == 'rel="nofollow"' ) {echo "selected='selected'";}?>>no-follow（首页有效）</option>

	</select>
    <em>[跳转的方式]</em>
      </div>
     
      <div style=" width:100%; padding:0 0 10px 0;display:inline-block;overflow: hidden;">
      
        <label>封面图片：</label>
        <input  style="border:1px #ccc solid"  name="title_images" id="title_images" value="<?php echo $meta_box_value3; ?>" />
        <input type="button" value="上传" id="images_up" class="button"/>
        <em>如果你使用的模块是<长方形图文切换模块>那么请在这里上传一张长方形图片，图片尺寸：890, 299<br />
        特色图片的尺寸统一上传 523, 349,尺寸。
        相册不限制尺寸大小，但是你上传的相册图像必须尺寸一致，点击放大的相册略缩图是正方形的，如果你输出一个相册到首页，那么这个略缩图也会显示正方形。
</em>
      </div>
      <?php if($meta_box_value3){ ?> <div  style=" width:100%; padding:10px 0 5px 0;display:inline-block;overflow: hidden;"> <a><img style="width:150px; height:111px;" src="<?php echo $meta_box_value3; ?>" /></a></div><?php }  ?>
    
      
      <?php  
	   
   wp_enqueue_script('kriesi_custom_fields_js', get_template_directory_uri(). '/js/metaup.js');  
 }

function create_meta_box() {
    global $theme_name;
  
    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new-meta-boxes', '文章公共选修。[这里设置之后，对首页、分类目录（列表）起作用]', 'new_meta_boxes', 'post', 'normal', 'high' );
    }
}

function save_postdata( $post_id ) {
    global $post, $new_meta_boxes;
  
    foreach($new_meta_boxes as $meta_box) {
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
add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

?>
