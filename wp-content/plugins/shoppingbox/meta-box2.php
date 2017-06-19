<?php 

$new_meta_boxes_shopsp =
array(

    "jinghua" => array(
        "name" => "jinghua",
        "std" => "",
        "title" => "加精"),
		
   
    "huitie" => array(
        "name" => "huitie",
        "std" => "",
        "title" => "回复:"),
);
function new_meta_boxes_shopsp() {
    global $post, $new_meta_boxes_shopsp;
  
        $meta_box_value = get_post_meta($post->ID,"huitie", true);
	    $meta_box_value2 = get_post_meta($post->ID,"jinghua", true);
	
  
        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];
			
	 echo '<input type="hidden" name="jinghua_noncename" id="jinghua_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
	 echo'<div style=" width:200px; display:inline-block;overflow: hidden;"><h4>按钮的链接目标选择：</h4>'; 
	      	
	  ?>
 
     <label for="jinghua">是否加入精品帖子</label>
     <input type="checkbox" value="ok" name="jinghua" id="jinghua" <?php if($meta_box_value2=="ok"){echo "checked='checked'";} ?> />
      </div>
      <?php 
	  
  
	  
	    echo'
	<input type="hidden" name="huitie_noncename" id="huitie_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';


        echo'<h4>回复帖子（此回复将会显示在内容下方，区分一般回帖）</h4>'; 
     echo wp_editor(get_post_meta($post->ID, "huitie", true),  "huitie", $settings = array('wpautop' =>  true,) );
	  
	    
    }

function create_meta_boxs_shopsp() {
    global $theme_name;
  
    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new_meta_boxes_shopsp', '小型社区控制面板', 'new_meta_boxes_shopsp', 'post', 'normal', 'high' );
    }
}

function save_postdatas_shopsp( $post_id ) {
    global $post, $new_meta_boxes_shopsp;
  
    foreach($new_meta_boxes_shopsp as $meta_box) {
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
add_action('admin_menu', 'create_meta_boxs_shopsp');
add_action('save_post', 'save_postdatas_shopsp');


?>
