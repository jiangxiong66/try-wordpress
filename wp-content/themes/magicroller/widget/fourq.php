<?php 

class fourq extends WP_Widget {

	function fourq()
	{
		$widget_ops = array('classname'=>'fourq','description' =>get_bloginfo('template_url').'/images/xuanxiang/66.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="fourq",$name='三栏目切换',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	
		 $cat =esc_attr($instance['cat']);
		  $cat2 =esc_attr($instance['cat2']);
		   $cat3 =esc_attr($instance['cat3']);
		 $id =esc_attr($instance['id']);
		 $target = esc_attr($instance['target']);
		  $title = esc_attr($instance['title']);
		   $title2 = esc_attr($instance['title2']);
		 
		  $fourqs = esc_attr($instance['fourqs']); 
		   $fourqs_pic = esc_attr($instance['fourqs_pic']);
		    $fourqs_link = esc_attr($instance['fourqs_link']);
		 $nunber = esc_attr($instance['nunber']);
		 $location = esc_attr($instance['location']);
		 $jcar = esc_attr($instance['jcar']);
         $timess =esc_attr($instance['timess']);
			 $zhiding = esc_attr($instance['zhiding']);
	$showmove =esc_attr($instance['showmove']);
	?>

<br />


<p>   

    <label  for="<?php echo $this->get_field_id('location'); ?>">模块位置:</label><br />
             <select id="<?php echo $this->get_field_id('location'); ?>" name="<?php echo $this->get_field_name('location'); ?>" >
              <option value='2'<?php if ($location == "" ) {echo "selected='selected'";}?>>两栏27%宽度</option>
	          <option value='1'<?php if ($location == "1" ) {echo "selected='selected'";}?>>两栏70%宽度</option>
              
		
	</select>
<em><strong>这个模块只能存在于上面的两个宽度，如果放置进入100%宽度，他会自动呈现27%的宽度效果</strong>（请选择放置的模块位置，因为模块的宽度不同，所以在每一个宽度所呈现的样式是不同的，请在此选择一下，你可以观察一下小工具标题，进行选择）</em>
</p>




<p><br />请选择调用的分类1</p>
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


<p><br />请选择调用的分类2</p>
<label  for="<?php echo $this->get_field_id('cat2'); ?>">请选择分类:</label><br />
             <select id="<?php echo $this->get_field_id('cat2'); ?>" name="<?php echo $this->get_field_name('cat2'); ?>" >
              <option value=''>请选择</option>
<?php 
		$categorys2 = get_categories(array('hide_empty' => 0));
		
		foreach( $categorys2 AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $cat2 == $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>

<p>

<p><br />请选择调用的分类3</p>
<label  for="<?php echo $this->get_field_id('cat3'); ?>">请选择分类:</label><br />
             <select id="<?php echo $this->get_field_id('cat3'); ?>" name="<?php echo $this->get_field_name('cat3'); ?>" >
              <option value=''>请选择</option>
<?php 
		$categorys3 = get_categories(array('hide_empty' => 0));
		
		foreach( $categorys3 AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $cat3 == $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>

<p>
<p><label for="<?php echo $this->get_field_id('nunber'); ?>"><?php esc_attr_e('显示数量(默认8):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('nunber'); ?>" name="<?php echo $this->get_field_name('nunber'); ?>" type="text" value="<?php echo $nunber; ?>" /></label></p>
 


<br />
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
		$cat2 = apply_filters('widget_title', empty($instance['cat2']) ? __('') : $instance['cat2']);
		$cat3 = apply_filters('widget_title', empty($instance['cat3']) ? __('') : $instance['cat3']);
		$location= apply_filters('widget_title', empty($instance['location']) ? __('') : $instance['location']);
		$id = apply_filters('widget_title', empty($instance['id']) ? __('1') : $instance['id']);
	    $fourqs = apply_filters('widget_title', empty($instance['fourqs']) ? __('') : $instance['fourqs']);
		 $fourqs_pic = apply_filters('widget_title', empty($instance['fourqs']) ? __('') : $instance['fourqs_pic']);
	    $zhiding  = apply_filters('widget_title', empty($instance['zhiding']) ? __('') : $instance['zhiding']);
		$jcar = apply_filters('widget_title', empty($instance['jcar']) ? __('2') : $instance['jcar']);
        $target  = apply_filters('widget_title', empty($instance['target']) ? __('2') : $instance['target']);
		$nunber =apply_filters('widget_title', empty($instance['nunber']) ? __('8') : $instance['nunber']);
		$timess=apply_filters('widget_title', empty($instance['timess']) ? __('7') : $instance['timess']);
        $fourqs_link=apply_filters('widget_title', empty($instance['fourqs_link']) ? __('7') : $instance['fourqs_link']);
		$showmove=apply_filters('widget_title', empty($instance['showmove']) ? __('') : $instance['showmove']);
		if( $target  =="1" ){ $tagerts = 'target="_blank"';}
if( $zhiding =="1" ){ $post__in = get_option('sticky_posts');}
if( $zhiding =="2" ){ $oder="rand";}else{ $oder="ASC";}
	 $detect = new Mobile_Detect();	
	 $args = array( 'cat' =>$cat, 'showposts' => $nunber, 'post__in' =>$post__in,'orderby' => $oder);    	
 $query = new WP_Query( $args ); 
 if(!$query->have_posts()) { get_template_part( 'index/fourq' ); }else{
	if($location==1||$detect->isMobile()||$detect->isTablet()){ $zi='50';}else{$zi=40;}
	
		if($showmove&&$detect->isMobile()||$showmove&&$detect->isTablet()){}else{
		?>
        
        
<div class="fourq  box">

 <div class="fourq_title">
 <a class="ouf_1 cues"><?php echo get_cat_name($cat) ;?></a><a class="ouf_2"><?php echo get_cat_name($cat2) ;?></a><a class="ouf_3"><?php echo get_cat_name($cat3) ;?></a>
 </div>
<?php  if($cat){ ?>
 <ul class="ulf_1">
   <?php
     
 $ashu_i=0; while ( $query->have_posts() ) :$query->the_post(); $ashu_i++; 
 
   $id=get_the_ID(); 
  $tit= get_the_title($id);
  $title_images= get_post_meta($id,"title_images", true);
  $linkss=get_post_meta($id,"hoturl", true); 
  $attachment_id = get_attachment_id_from_src(  $title_images );
 if($ashu_i==1){?>           

<li class="fourq_first">
    <a <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="four_pic">
    
   <?php  themepark_thumbnails('twox');?></a>
    <span>
      <b><a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" ><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,$zi,"...",'utf8'); ?></a></b>
      <p><a>发布时间：<?php echo get_the_time('Y/m/d') ; ?></a></p>
      <?php if($location==1||$detect->isTablet()){ ?> <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,420,"...",'utf-8'); ?></p><?php } ?>
    </span>
 
 </li>
   <?php }else{ ?>
   <li class="text_fp"> <b><a <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>">
   <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,$zi,"...",'utf8'); ?></a></b> </li>
   

  <?php }; endwhile; wp_reset_query();     ?>
     <li class="fourq_more"><a target="_blank" href="<?php echo get_category_link($cat) ?>">查看全部</a></li>
    </ul>
  <?php } ?>

<?php  if($cat2){ ?>
 <ul class="ulf_2">
   <?php
 $args = array( 'cat' =>$cat2, 'showposts' => $nunber, 'post__in' =>$post__in,'orderby' => $oder);    	
 $query = new WP_Query( $args );      
 $ashu_i=0; while ( $query->have_posts() ) :$query->the_post(); $ashu_i++; 
 
   $id=get_the_ID(); 
  $tit= get_the_title($id);
  $title_images= get_post_meta($id,"title_images", true);
  $linkss=get_post_meta($id,"hoturl", true); 
  $attachment_id = get_attachment_id_from_src(  $title_images );
 if($ashu_i==1){?>           

<li class="fourq_first">
    <a <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="four_pic">
    
   <?php  themepark_thumbnails('twox' );?></a>
    <span>
      <b><a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" ><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,$zi,"...",'utf8'); ?></a></b>
      <p><a>发布时间：<?php echo get_the_time('Y/m/d') ; ?></a></p>
     <?php if($location==1||$detect->isTablet()){ ?> <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,420,"...",'utf-8'); ?></p><?php } ?>
    </span>
 
 </li>
   <?php }else{ ?>
   <li class="text_fp"> <b><a <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>">
   <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,$zi,"...",'utf8'); ?></a></b> </li>
   

  <?php }; endwhile; wp_reset_query();     ?>
    <li class="fourq_more"><a target="_blank" href="<?php echo get_category_link($cat2) ?>">查看全部</a></li>
    </ul>
  <?php } ?>
<?php  if($cat3){ ?>
 <ul class="ulf_3">
   <?php
 $args = array( 'cat' =>$cat3, 'showposts' => $nunber, 'post__in' =>$post__in,'orderby' => $oder);    	
 $query = new WP_Query( $args );      
 $ashu_i=0; while ( $query->have_posts() ) :$query->the_post(); $ashu_i++; 
 
   $id=get_the_ID(); 
  $tit= get_the_title($id);
  $title_images= get_post_meta($id,"title_images", true);
  $linkss=get_post_meta($id,"hoturl", true); 
  $attachment_id = get_attachment_id_from_src(  $title_images );
 if($ashu_i==1){?>           

<li class="fourq_first">
    <a <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="four_pic">
    
   <?php  themepark_thumbnails('twox');?></a>
    <span>
      <b><a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" ><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,$zi,"...",'utf8'); ?></a></b>
      <p><a>发布时间：<?php echo get_the_time('Y/m/d') ; ?></a></p>
      <?php if($location==1||$detect->isTablet()){ ?> <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,420,"...",'utf-8'); ?></p><?php } ?>
    </span>
 
 </li>
   <?php }else{ ?>
   <li class="text_fp"> <b><a <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>">
   <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,$zi,"...",'utf8'); ?></a></b> </li>
   

  <?php }; endwhile; wp_reset_query();     ?>
 <li class="fourq_more"><a target="_blank" href="<?php echo get_category_link($cat3) ?>">查看全部</a></li>
    </ul>
  <?php } ?>
  
</div>

 
        <?php
	}}}
}
register_widget('fourq');
?>