<?php 

class nav_poket extends WP_Widget {

	function nav_poket()
	{
		$widget_ops = array('classname'=>'nav_poket','description' => get_bloginfo('template_url').'/images/xuanxiang/9.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="nav_poket",$name='魔术菜单模块（图片并排和图片幻灯片）',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	
		
		 $id =esc_attr($instance['id']);
		
		  $title = esc_attr($instance['title']);
		   $title2 = esc_attr($instance['title2']);
	
	 $nav_poket = esc_attr($instance['nav_poket']);
	 $radius = esc_attr($instance['radius']);
	 $my_images = esc_attr($instance['my_images']);
	  $my_text_color= esc_attr($instance['my_text_color']);
	     $my_text_alpha=esc_attr($instance['my_text_alpha']);
		  $imagesfixed=esc_attr($instance['imagesfixed']);
		  $modle_bee=esc_attr($instance['modle_bee']);
		   $modle_bees=esc_attr($instance['modle_bees']);
		      $modle_bees_t=esc_attr($instance['modle_bees_t']);
			  $my_b_images=esc_attr($instance['my_b_images']);
			   $bakes=esc_attr($instance['bakes']);
			  
			   $titleseo= esc_attr($instance['titleseo']);
			 $titleseo2= esc_attr($instance['titleseo2']);
	?>

<br />





<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

<p><label for="<?php echo $this->get_field_id('title2'); ?>"><?php esc_attr_e('副标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title2'); ?>" name="<?php echo $this->get_field_name('title2'); ?>" type="text" value="<?php echo $title2; ?>" /></label></p>


<p>   
<?php 	$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) ); ?>
   <label for="<?php echo $this->get_field_id('nav_poket'); ?>">选择一个菜单</label>
			<select id="<?php echo $this->get_field_id('nav_poket'); ?>" name="<?php echo $this->get_field_name('nav_poket'); ?>">
				<option value="0"><?php _e( '&mdash; Select &mdash;' ) ?></option>
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $nav_poket, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
			</select>

</p> 

<p>   
    <label  for="<?php echo $this->get_field_id('modle_bees'); ?>">并排数量：</label><br />
             <select id="<?php echo $this->get_field_id('modle_bees'); ?>" name="<?php echo $this->get_field_name('modle_bees'); ?>" >
              <option value=''<?php if ($modle_bees == "" ) {echo "selected='selected'";}?> >默认一排5个</option>
               <option value='2'<?php if ($modle_bees == "2" ) {echo "selected='selected'";}?> >一排4个</option>
	          <option value='1'<?php if ($modle_bees == "1" ) {echo "selected='selected'";}?>>一排3个</option>
          
	</select>
</p>


<p>   
    <label  for="<?php echo $this->get_field_id('modle_bees_t'); ?>">标题显示：</label><br />
             <select id="<?php echo $this->get_field_id('modle_bees_t'); ?>" name="<?php echo $this->get_field_name('modle_bees_t'); ?>" >
              <option value=''<?php if ($modle_bees_t == "" ) {echo "selected='selected'";}?> >默认标题颜色</option>
               <option value='2'<?php if ($modle_bees_t == "2" ) {echo "selected='selected'";}?> >白色</option>
               <option value='3'<?php if ($modle_bees_t == "3" ) {echo "selected='selected'";}?> >黑色</option>
	          
          
	</select>
     <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">你可以选择这个模块输出的三种预设样式，以此将这个模块作为不同的功能使用</em>
</p>

<p>   
    <label  for="<?php echo $this->get_field_id('bakes'); ?>">每个小模块是否含有背景：</label><br />
             <select id="<?php echo $this->get_field_id('bakes'); ?>" name="<?php echo $this->get_field_name('bakes'); ?>" >
              <option value=''<?php if ($bakes == "" ) {echo "selected='selected'";}?> >没有背景</option>
               <option value='2'<?php if ($bakes == "2" ) {echo "selected='selected'";}?> >白色透明背景</option>
               <option value='3'<?php if ($bakes == "3" ) {echo "selected='selected'";}?> >黑色透明背景</option>
	          
          
	</select>
     <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">你可以选择这个模块输出的三种预设样式，以此将这个模块作为不同的功能使用</em>
</p>

<p>
  <label  for="<?php echo $this->get_field_id('my_b_images'); ?>">背景图片:</label><br />
 <input type="text" size="40" value="<?php echo $my_b_images ; ?>" name="<?php echo $this->get_field_name('my_b_images'); ?>" id="<?php echo $this->get_field_id('my_b_images'); ?>"/>
 
 <a id="ashu_upload" class="left_right_upload_button button" href="#">上传</a>
 
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">（尺寸宽度为1920，高度取决于你的图片和文字大小，若选择了表单模式高度为640px,建议上传可以无限重复的背景图片）</em>
 
</p> 

<b>seo标签设置</b><br />
   
    <label  for="<?php echo $this->get_field_id('titleseo'); ?>">模块标题seo标签</label><br />
             <select id="<?php echo $this->get_field_id('titleseo'); ?>" name="<?php echo $this->get_field_name('titleseo'); ?>" >
              <option value=''<?php if ($titleseo == "" ) {echo "selected='selected'";}?> > div标签</option>
              <option value='h2'<?php if ($titleseo == "h2" ) {echo "selected='selected'";}?> > 	H2标签</option>
              <option value='h3'<?php if ($titleseo == "h3" ) {echo "selected='selected'";}?> > H3标签</option>
               <option value='h4'<?php if ($titleseo == "h4" ) {echo "selected='selected'";}?> > H4标签</option>
                  <option value='h5'<?php if ($titleseo == "h5" ) {echo "selected='selected'";}?> > H5标签</option>
                <option value='strong'<?php if ($titleseo == "strong" ) {echo "selected='selected'";}?> > strong标签</option>
	          
	</select>

</p>

<p>

    <label  for="<?php echo $this->get_field_id('titleseo2'); ?>">模块副标题seo标签</label><br />
             <select id="<?php echo $this->get_field_id('titleseo2'); ?>" name="<?php echo $this->get_field_name('titleseo2'); ?>" >
              <option value=''<?php if ($titleseo2 == "" ) {echo "selected='selected'";}?> > H2标签（默认）</option>
              <option value='h3'<?php if ($titleseo2 == "h3" ) {echo "selected='selected'";}?> > H3标签</option>
                <option value='h4'<?php if ($titleseo2 == "h4" ) {echo "selected='selected'";}?> > H4标签</option>
                  <option value='h5'<?php if ($titleseo2 == "h5" ) {echo "selected='selected'";}?> > H5标签</option>
                <option value='strong'<?php if ($titleseo2 == "strong" ) {echo "selected='selected'";}?> > strong标签</option>
                 <option value='div'<?php if ($titleseo2 == "div" ) {echo "selected='selected'";}?> > div标签</option>
             
             
           
                 
	          
	</select>
<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">由于这款主题的模块可以显示在不同的区域，因此不同的区域的seo标签是可以自定义的，以此增强你的权重递归性，如果不明白如何使用，可以<a href=" http://www.themepark.com.cn/wordpresswzseobqdgxjy.html" target="_blank">点击查看分析文章</a></em>
</p>

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
        $nav_poket = apply_filters('widget_title', empty($instance['nav_poket']) ? __('') : $instance['nav_poket']);
	    $radius = apply_filters('widget_title', empty($instance['radius']) ? __('') : $instance['radius']);
		$my_images  = apply_filters('widget_title', empty($instance['my_images']) ? __('') : $instance['my_images']); 
		$my_text_color  = apply_filters('widget_title', empty($instance['my_text_color']) ? __('') : $instance['my_text_color']);
        $my_text_alpha  = apply_filters('widget_title', empty($instance['my_text_alpha']) ? __('') : $instance['my_text_alpha']);
		$imagesfixed = apply_filters('widget_title', empty($instance['imagesfixed']) ? __('') : $instance['imagesfixed']);
		$modle_bee= apply_filters('widget_title', empty($instance['modle_bee']) ? __('') : $instance['modle_bee']);
		$modle_bees=apply_filters('widget_title', empty($instance['modle_bees']) ? __('') : $instance['modle_bees']);
		$modle_bees_t=apply_filters('widget_title', empty($instance['modle_bees_t']) ? __('') : $instance['modle_bees_t']);
		$my_b_images=apply_filters('widget_title', empty($instance['my_b_images']) ? __('') : $instance['my_b_images']);
		  $titleseo=  apply_filters('widget_title', empty($instance['titleseo']) ? __('') : $instance['titleseo']);
		$titleseo2=  apply_filters('widget_title', empty($instance['titleseo2']) ? __('') : $instance['titleseo2']); 
		$bakes=  apply_filters('widget_title', empty($instance['bakes']) ? __('') : $instance['bakes']); 
		
		
		
		if ($modle_bees == "2" ) {$modle_beeskk='id="nav_poket_list4"';}else if($modle_bees == "1"){$modle_beeskk='id="nav_poket_list3"';}
		
		if ($modle_bees_t == "2" ){$modle_bees_tssd='id="nav_poket_white"'; }elseif($modle_bees_t == "3"){$modle_bees_tssd='id="nav_poket_black"';}
		
		if ($bakes == "2" ){$bakess='nav_poket_b_white'; }elseif($bakes == "3"){$bakess='nav_poket_b_black';}
		?>
    
    
<div <?php echo $modle_bees_tssd; ?> class="nav_poket nav_poket<?php echo $nav_poket; ?>" <?php if($my_b_images){echo 'style="background:url('.$my_b_images.')"';} ?> >
 <?php if($title2||$title){ ?>
<div class="about_ttile_line">
 <div class="about_title">
    <?php if($titleseo){echo '<'.$titleseo.'  class="mantitle">';}else{echo '<div  class="mantitle">';} ?>
	<?php echo $title ; ?>
	<?php if($titleseo){echo '</'.$titleseo.'>';}else{echo '</div>';} ?>
    
     <?php if($titleseo2){echo '<'.$titleseo2.'  class="sectitle">';}else{echo '<h2  class="sectitle">';} ?>
   <?php echo $title2 ; ?>
   <?php if($titleseo2){echo '</'.$titleseo2.'>';}else{echo '</h2>';} ?>
     <div class="about_title_line_in line_left"></div>
      <div class="about_title_line_in line_right"></div>
 </div>

</div>
 <?php } ?>
   <div class="nav_poket_in"  >
  
     
     
<div class="nav_poket_ul <?php echo $bakess; ?>" <?php echo $modle_beeskk; ?>>
 <?php  ob_start(); wp_nav_menu(array( 'walker' => new header_menu(),'container' => false,'menu' => $nav_poket ,'items_wrap' => '%3$s' ) ); ?>
 </div>
   </div> 
 </div>
 <?php 
  $page_id =get_the_ID();if(get_post_meta($page_id, "customize",true)==='modle1'){$donghuaopens="ys";}
 if(is_home()||is_page()&&$donghuaopens){ if(!get_option("mytheme_donghuaopen")){ ?>
 <script> $(window).scroll(function () {$(".donghuaopen .nav_poket<?php echo $nav_poket;?>").severs();}); </script>  
        <?php
	}}}
}
register_widget('nav_poket');
?>



