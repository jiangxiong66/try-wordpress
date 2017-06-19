<?php 

class pic_l extends WP_Widget {

	function pic_l()
	{
		$widget_ops = array('classname'=>'pic_l','description' => get_bloginfo('template_url').'/images/xuanxiang/7.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="pic_l",$name='图片列表模块【侧边栏】',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	 $showmove =esc_attr($instance['showmove']);
		 $cat =esc_attr($instance['cat']);
		 $id =esc_attr($instance['id']);
		 $target = esc_attr($instance['target']);
		  $title = esc_attr($instance['title']);
		   $title2 = esc_attr($instance['title2']);
		 
		  $pic_ls = esc_attr($instance['pic_ls']); 
		   $pic_ls_pic = esc_attr($instance['pic_ls_pic']);
		    $pic_ls_link = esc_attr($instance['pic_ls_link']);
		 $nunber = esc_attr($instance['nunber']);
		 $location = esc_attr($instance['location']);
		 $jcar = esc_attr($instance['jcar']);
         $timess =esc_attr($instance['timess']);
			 $zhiding = esc_attr($instance['zhiding']);
	
	?>

<br />




<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

<p><label for="<?php echo $this->get_field_id('title2'); ?>"><?php esc_attr_e('副标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title2'); ?>" name="<?php echo $this->get_field_name('title2'); ?>" type="text" value="<?php echo $title2; ?>" /></label></p>


<p><br />请选择调用的分类</p>
<label  for="<?php echo $this->get_field_id('cat'); ?>">请选择分类:</label><br />
             <select id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" >
              <option value=''>请选择</option>
<?php 
		 $categorys = get_categories(array('hide_empty' => 0));
		
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $cat == $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>

<p>


<p><label for="<?php echo $this->get_field_id('nunber'); ?>"><?php esc_attr_e('显示数量(默认6):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('nunber'); ?>" name="<?php echo $this->get_field_name('nunber'); ?>" type="text" value="<?php echo $nunber; ?>" /></label></p>
 
 


<p>   
    <label  for="<?php echo $this->get_field_id('zhiding'); ?>">文章排序:</label><br />
             <select id="<?php echo $this->get_field_id('zhiding'); ?>" name="<?php echo $this->get_field_name('zhiding'); ?>" >
              <option value=''<?php if ($zhiding == "" ) {echo "selected='selected'";}?> >显示最新文章</option>
	          <option value='1'<?php if ($zhiding == "1" ) {echo "selected='selected'";}?>>只显示置顶的文章</option>
              <option value='2'<?php if ($zhiding == "2" ) {echo "selected='selected'";}?>>显示随机文章</option>
		
	</select>

</p>

<p>   

    <label  for="<?php echo $this->get_field_id('target'); ?>">链接方式:</label><br />
             <select id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" >
              <option value=''<?php if ($target == "" ) {echo "selected='selected'";}?> >自身页面转换</option>
	          <option value='1'<?php if ($target == "1" ) {echo "selected='selected'";}?>>打开新窗口</option>
		
	</select>

</p>

<p>   

    <label  for="<?php echo $this->get_field_id('showmove'); ?>">移动版是否显示:</label><br />
             <select id="<?php echo $this->get_field_id('showmove'); ?>" name="<?php echo $this->get_field_name('showmove'); ?>" >
              <option value=''<?php if ($showmove== "" ) {echo "selected='selected'";}?> >显示</option>
	          <option value='1'<?php if ($showmove == "1" ) {echo "selected='selected'";}?>>不显示</option>
		
	</select>

</p>



 <script language="javascript">(function(a){a(function(){a(".color-field_w").wpColorPicker();a(".customize-control-widget_form .widget-control-save").fadeIn()})})(jQuery);jQuery(document).ready(function(){var b;var a;jQuery(".upload_button_w").on("click",function(c){a=jQuery(this).prev("input");b=wp.media({title:"选择图片",button:{text:"选择"},multiple:false});if(b){b.open()}b.on("select",function(){attachment=b.state().get("selection").first().toJSON();jQuery(a).val(attachment.url);jQuery(".supports-drag-drop").remove()})})});</script>   
	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
	     $id =$instance['id'];
        $before_content = $instance['before_content'];
        $after_content = $instance['after_content'];
		$title= apply_filters('widget_title', empty($instance['title']) ? __('') : $instance['title']);
		$title2= apply_filters('widget_title', empty($instance['title2']) ? __('') : $instance['title2']);
		$cat = apply_filters('widget_title', empty($instance['cat']) ? __('') : $instance['cat']);
		$id = apply_filters('widget_title', empty($instance['id']) ? __('1') : $instance['id']);
	    $pic_ls = apply_filters('widget_title', empty($instance['pic_ls']) ? __('') : $instance['pic_ls']);
		 $pic_ls_pic = apply_filters('widget_title', empty($instance['pic_ls']) ? __('') : $instance['pic_ls_pic']);
	    $zhiding  = apply_filters('widget_title', empty($instance['zhiding']) ? __('') : $instance['zhiding']);
		$jcar = apply_filters('widget_title', empty($instance['jcar']) ? __('2') : $instance['jcar']);
        $target  = apply_filters('widget_title', empty($instance['target']) ? __('2') : $instance['target']);
		$nunber =apply_filters('widget_title', empty($instance['nunber']) ? __('6') : $instance['nunber']);
		$timess=apply_filters('widget_title', empty($instance['timess']) ? __('7') : $instance['timess']);
        $pic_ls_link=apply_filters('widget_title', empty($instance['pic_ls_link']) ? __('7') : $instance['pic_ls_link']);
		$showmove=apply_filters('widget_title', empty($instance['showmove']) ? __('') : $instance['showmove']);
		 
	    $location= apply_filters('widget_title', empty($instance['location']) ? __('') : $instance['location']);
	
	    $detect = new Mobile_Detect();
		if( $target  =="1" ){ $tagerts = 'target="_blank"';}
if( $zhiding =="1" ){ $post__in = get_option('sticky_posts');}
if( $zhiding =="2" ){ $oder="rand";}else{ $oder="ASC";}
 $args = array( 'cat' =>$cat, 'showposts' => $nunber, 'post__in' =>$post__in,'orderby' => $oder);    
 	
 $query = new WP_Query( $args );  
 
		
			
				if(!$query->have_posts()) { get_template_part( 'index/pic_l' ); }else{
					if($showmove&&$detect->isMobile()||$showmove&&$detect->isTablet()){}else{
		?>
        
<div class="pic_l  box">
 <?php if(is_home()){$hbq='2';}else{$hbq='3';} ?>
<h<?php echo $hbq; ?>  class="m_title"><?php if($title){?><a target="_blank" href="<?php echo get_category_link($cat) ?>"><b><?php echo $title ?></b><?php echo $title2 ?></a><?php } ?></h<?php echo $hbq; ?>>



<div class="pic_l_in">
<ul>
   <?php
    

 $ashu_i=0; while ( $query->have_posts() ) :$query->the_post(); $ashu_i++; 
 
   $id=get_the_ID(); 
  $tit= get_the_title($id);
  $title_images= get_post_meta($id,"title_images", true);
  $linkss=get_post_meta($id,"hoturl", true); 
    $price = get_post_meta($id, 'shop_price', true);
    $original_price=get_post_meta($id,"original_price", true);
?>           



     
  
  <li> <div class="vedio_over_li"><a <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>">
 <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,40,"...",'utf8'); ?></a></div>
         <a <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>"><?php   themepark_thumbnails('twox');?>
		  </a>
     </li>
   

  <?php    endwhile; wp_reset_query();     ?>
     
    </ul>
  
  </div>
  
</div>

 
        <?php
	}}}
}
register_widget('pic_l');
?>