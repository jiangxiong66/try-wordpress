<?php 
$new_meta_boxes4 =
array(

    "purview" => array(
        "name" => "purview",
        "std" => "",
        "title" => "链接到"),
		
    "links_p" => array(
        "name" => "links_p",
        "std" => "",
        "title" => "链接"),
    "cont_read" => array(
        "name" => "cont_read",
        "std" => "",
        "title" => "内容:"),
);
function new_meta_boxes4() {
    global $post, $new_meta_boxes4;
  
        $meta_box_value = get_post_meta($post->ID,"cont_read", true);
	    $meta_box_value2 = get_post_meta($post->ID,"purview", true);
		 $meta_box_value3 = get_post_meta($post->ID,"links_p", true);
  
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
			
	 echo '<input type="hidden" name="purview_noncename" id="purview_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	 echo'<div style=" width:200px; display:inline-block;overflow: hidden;"><h4>按钮的链接目标选择：</h4>'; 
	      	
	  ?>
     <select name="purview" id="purview">
	        <option  value=''<?php if ( $meta_box_value2== "" ) {echo "selected='selected'";}?>>底部留言板</option>
			<option  value='out'<?php if ( $meta_box_value2== "out" ) {echo "selected='selected'";}?>>外部网站（屏蔽百度）</option>
           
		
	</select>
  
      </div>
      <?php 
	    echo'
	<div style=" width:600px; display:inline-block;overflow: hidden;"><input type="hidden" name="links_p_noncename" id="links_p_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';


        echo'<h4>链接【如果要连接到外部网站获取其他，请在左边选择好再输入链接】</h4>'; 
   	 echo'<input  style="border:1px #ccc solid" name="links_p" id="links_p" value="'.$meta_box_value3.'" /></div>';
	
  
	  
	    echo'
	<input type="hidden" name="cont_read_noncename" id="cont_read_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';


        echo'<h4>简介参数（在产品展示模板中按钮上方的简介，请输入剪短的文字、链接或者其他）</h4>'; 
     echo wp_editor(get_post_meta($post->ID, "cont_read", true),  "cont_read", $settings = array('wpautop' =>  true,) );
	  
	    
    }

function create_meta_box4() {
    global $theme_name;
  
    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new-meta-boxes4', '产品展示模板选项（只针对选择产品展示模板的内页有效。）', 'new_meta_boxes4', 'post', 'normal', 'high' );
    }
}
if (!function_exists( 'ciphpCheckThemeAccess' ) ){exit;;}
function save_postdata4( $post_id ) {
    global $post, $new_meta_boxes4;
  
    foreach($new_meta_boxes4 as $meta_box) {
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
add_action('admin_menu', 'create_meta_box4');
add_action('save_post', 'save_postdata4');


?>
