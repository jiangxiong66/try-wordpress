<?php 

class up_down_list extends WP_Widget {

	function up_down_list()
	{
		$widget_ops = array('classname'=>'up_down_list','description' => get_bloginfo('template_url').'/images/xuanxiang/22.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="up_down_list",$name='上下列表模块【滚轴专用】',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	
	
		 $left_right=esc_attr($instance['left_right']);
		 $first_mod = esc_attr($instance['first_mod']);
		 $my_images = esc_attr($instance['my_images']);
		 $my_b_images = esc_attr($instance['my_b_images']);
		 $my_b_images_ad = esc_attr($instance['my_b_images_ad']);
		 $my_images_up = esc_attr($instance['my_images_up']);
		 $my_images_lr = esc_attr($instance['my_images_lr']);
		 	 $my_mp4 = esc_attr($instance['my_mp4']);
		  $my_text_up = esc_attr($instance['my_text_up']);
		 $my_text_lr = esc_attr($instance['my_text_lr']);
		 $my_text1 = esc_attr($instance['my_text1']);
		 $title = esc_attr($instance['title']);
		 $my_text3 = esc_attr($instance['my_text3']);
		 $my_text4 = esc_attr($instance['my_text4']);
		 $my_url = esc_attr($instance['my_url']);
		 $my_text_align = esc_attr($instance['my_text_align']);
		 $my_text_color= esc_attr($instance['my_text_color']);
	     $my_text_alpha=esc_attr($instance['my_text_alpha']);
	 $my_btn_icon=esc_attr($instance['my_btn_icon']);
	?>
<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>模块属性设置</strong></p>
<p>   
    <label  for="<?php echo $this->get_field_id('first_mod'); ?>">初始化模块（这个模块是否是你放置的第一个模块？）：</label><br />
             <select id="<?php echo $this->get_field_id('first_mod'); ?>" name="<?php echo $this->get_field_name('first_mod'); ?>" >
              <option value=''<?php if ($first_mod == "" ) {echo "selected='selected'";}?> >这是中间的模块</option>
	          <option value='1'<?php if ($first_mod == "1" ) {echo "selected='selected'";}?>>是第一个模块</option>
              <option value='2'<?php if ($first_mod == "2" ) {echo "selected='selected'";}?>>是最后一个模块</option>
	</select><br />

<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">请注意：如果这个模块是你放置的第一个模块，那么请选择“是第一个模块”，这样这个模块在没有滚动时，才能在网站加载完成之后以动画显示出模块的内容，否则他们是隐藏的；若这个模块是动画区域最后一个模块，请选择“最后一个模块”让动画区滚动完成之后可以继续向下滚动</em>
</p>

<p>   
    <label  for="<?php echo $this->get_field_id('left_right'); ?>">图文显示顺序：</label><br />
             <select id="<?php echo $this->get_field_id('left_right'); ?>" name="<?php echo $this->get_field_name('left_right'); ?>" >
              <option value=''<?php if ($left_right == "" ) {echo "selected='selected'";}?> >图片显示在下文字显示在上</option>
	          <option value='1'<?php if ($left_right == "1" ) {echo "selected='selected'";}?>>图片显示在上文字显示在下</option>
	</select>

</p>



<p>
  <label  for="<?php echo $this->get_field_id('my_b_images'); ?>">背景图片:</label><br />
 <input type="text" size="40" value="<?php echo $my_b_images ; ?>" name="<?php echo $this->get_field_name('my_b_images'); ?>" id="<?php echo $this->get_field_id('my_b_images'); ?>"/>
 
 <a id="ashu_upload" class="left_right_upload_button button" href="#">上传</a>
 
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">pc和平板电脑的背景图片尺寸为1920*911（像素）. 平板电脑的背景图片会依据尺寸自动裁切为1024宽度，不需要另外上传，手机上的背景图片请上传700像素宽度的图片。</em>
</p> 

<p>
  <label  for="<?php echo $this->get_field_id('my_mp4'); ?>">背景视频:</label><br />
 <input type="text" size="40" value="<?php echo $my_mp4 ; ?>" name="<?php echo $this->get_field_name('my_mp4'); ?>" id="<?php echo $this->get_field_id('my_mp4'); ?>"/>
 
 <a id="ashu_upload" class="left_right_upload_button button" href="#">上传</a>
 
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">背景视频会在ie10以上浏览器上自动播放，尺寸为1280*720,并且必须为MP4格式</em>
</p> 

<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>悬浮图片设置</strong></p>
<p>

 
 <?php 	$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) ); ?>
   <label for="<?php echo $this->get_field_id('my_images'); ?>">选择一个产品菜单（支持多层菜单）</label>
			<select id="<?php echo $this->get_field_id('my_images'); ?>" name="<?php echo $this->get_field_name('my_images'); ?>">
				<option value="0"><?php _e( '&mdash; Select &mdash;' ) ?></option>
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $my_images, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
			</select>

</p>
 
 
 
</p> 


 <p>
 <label  for="<?php echo $this->get_field_id('my_images_up'); ?>">悬浮的图片上边距:</label>
 <input type="text" size="10" value="<?php echo $my_images_up ; ?>" name="<?php echo $this->get_field_name('my_images_up'); ?>" id="<?php echo $this->get_field_id('my_images_up'); ?>"/>
 <a>默认20像素（px）</a>
 
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">通过上面边距的选项，你可以调整悬浮图片的坐标,请注意不要太靠下方了，超过768像素的高度再平板电脑和小分辨率的pc上就无法显示完整了,<strong>注意后面的单位，像素（px）或者百分比（%）</strong>。</em>
 </p>

<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>文字模块设置</strong></p>

 <p>
 <label  for="<?php echo $this->get_field_id('title'); ?>">文字模块-标题:</label>
 <input type="text" size="40" value="<?php echo $title ; ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>"/>
 </p>
<p>
 <label  for="<?php echo $this->get_field_id('my_text3'); ?>">文字模块-文字段落:</label>
<textarea style="width:98%;" id="<?php echo $this->get_field_id('my_text3'); ?>" name="<?php echo $this->get_field_name('my_text3'); ?>"cols="52" rows="4" ><?php echo stripslashes($my_text3); ?></textarea>  
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;"><?php esc_attr_e('使用代码 <br />进行分行,也支持html代码');?></em>
</p>
 <p>
 <label  for="<?php echo $this->get_field_id('my_text4'); ?>">文字模块-按钮文字:</label>
 <input type="text" size="40" value="<?php echo $my_text4 ; ?>" name="<?php echo $this->get_field_name('my_text4'); ?>" id="<?php echo $this->get_field_id('my_text4'); ?>"/>
 </p>
 
 <p>
 <label  for="<?php echo $this->get_field_id('my_url'); ?>">链接url:</label>
 <input type="text" size="40" value="<?php echo $my_url ; ?>" name="<?php echo $this->get_field_name('my_url'); ?>" id="<?php echo $this->get_field_id('my_url'); ?>"/>
 </p> 
<p>   
    <label  for="<?php echo $this->get_field_id('my_btn_icon'); ?>">按钮图标：</label><br />
             <select id="<?php echo $this->get_field_id('my_btn_icon'); ?>" name="<?php echo $this->get_field_name('my_btn_icon'); ?>" >
              <option value=''<?php if ($my_btn_icon == "" ) {echo "selected='selected'";}?> >不显示图标</option>
	          <option value='buy'<?php if ($my_btn_icon == "buy" ) {echo "selected='selected'";}?>>显示图标</option>
	</select><br />

</p>

 <p>
 <label  for="<?php echo $this->get_field_id('my_text_up'); ?>">文字模块上边距:</label>
 <input type="text" size="10" value="<?php echo $my_text_up ; ?>" name="<?php echo $this->get_field_name('my_text_up'); ?>" id="<?php echo $this->get_field_id('my_text_up'); ?>"/>
 <a>默认150像素（px）</a>

 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">通过上面边距的选项，你可以调整悬浮文字模块的坐标，请注意不要太靠下方了，超过768像素的高度再平板电脑和小分辨率的pc上就无法显示完整了,<strong>注意后面的单位，像素（px）或者百分比（%）</strong>。</em>
 </p>
 


<p>   
    <label  for="<?php echo $this->get_field_id('my_text_color'); ?>">文字颜色选择：</label><br />
             <select id="<?php echo $this->get_field_id('my_text_color'); ?>" name="<?php echo $this->get_field_name('my_text_color'); ?>" >
              <option value=''<?php if ($my_text_color == "" ) {echo "selected='selected'";}?> >白色</option>
	          <option value='1'<?php if ($my_text_color == "1" ) {echo "selected='selected'";}?>>黑色</option>
	</select><br />

</p>

<p>   
    <label  for="<?php echo $this->get_field_id('my_text_alpha'); ?>">文字颜色透明度：</label><br />
             <select id="<?php echo $this->get_field_id('my_text_color_alpha'); ?>" name="<?php echo $this->get_field_name('my_text_alpha'); ?>" >
              <option value=''<?php if ($my_text_alpha == "" ) {echo "selected='selected'";}?> >100%</option>
	          <option value='90'<?php if ($my_text_alpha == "90" ) {echo "selected='selected'";}?>>90%</option>
               <option value='80'<?php if ($my_text_alpha == "80" ) {echo "selected='selected'";}?>>80%</option>
                <option value='70'<?php if ($my_text_alpha == "70" ) {echo "selected='selected'";}?>>70%</option>
                 <option value='60'<?php if ($my_text_alpha == "60" ) {echo "selected='selected'";}?>>60%</option>
                  <option value='50'<?php if ($my_text_alpha == "50" ) {echo "selected='selected'";}?>>50%</option>
	</select><br />

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
		$left_right = apply_filters('widget_title', empty($instance['left_right']) ? __('') : $instance['left_right']);
		$first_mod = apply_filters('widget_title', empty($instance['first_mod']) ? __('') : $instance['first_mod']);
		$my_images  = apply_filters('widget_title', empty($instance['my_images']) ? __('') : $instance['my_images']);
		$my_images_up  = apply_filters('widget_title', empty($instance['my_images_up']) ? __('') : $instance['my_images_up']);
		$my_images_lr  = apply_filters('widget_title', empty($instance['my_images_lr']) ? __('') : $instance['my_images_lr']);	
        $my_text1  = apply_filters('widget_title', empty($instance['my_text1']) ? __('') : $instance['my_text1']);
		$title  = apply_filters('widget_title', empty($instance['title']) ? __('') : $instance['title']);
		$my_text3  = apply_filters('widget_title', empty($instance['my_text3']) ? __('') : $instance['my_text3']);
	    $my_text4  = apply_filters('widget_title', empty($instance['my_text4']) ? __('') : $instance['my_text4']);
		$my_url  = apply_filters('widget_title', empty($instance['my_url']) ? __('') : $instance['my_url']);
		$my_text_up  = apply_filters('widget_title', empty($instance['my_text_up']) ? __('') : $instance['my_text_up']);
        $my_b_images  = apply_filters('widget_title', empty($instance['my_b_images']) ? __('') : $instance['my_b_images']);
        $my_b_images_ad  = apply_filters('widget_title', empty($instance['my_b_images_ad']) ? __('') : $instance['my_b_images_ad']);
	    $my_text_color  = apply_filters('widget_title', empty($instance['my_text_color']) ? __('') : $instance['my_text_color']);
        $my_text_alpha  = apply_filters('widget_title', empty($instance['my_text_alpha']) ? __('') : $instance['my_text_alpha']);
	  $my_mp4 = apply_filters('widget_title', empty($instance['my_mp4']) ? __('') : $instance['my_mp4']);
	  $my_btn_icon= apply_filters('my_btn_icon', empty($instance['my_btn_icon']) ? __('') : $instance['my_btn_icon']);
	if($my_text_color){$my_text_colors='dack_text_mod';};
		if($my_text_alpha){$my_text_alphas='class="alpha'.$my_text_alpha.'"';$my_text_alphass='  alpha'.$my_text_alpha;};
	 if($my_images_up){$up_xy='style="margin-top:'.$my_images_up.';"';}
	  if($my_text_up){$tup_xy='style=" margin-top:'.$my_text_up.';"';}
	   $detect = new Mobile_Detect();

 ?>




 <div  id="up_down_mod" class="swiper-slide  <?php if ($first_mod == "1" ) {echo "swiper-slide-active";}elseif($first_mod == "2"){echo " lastslide";}?> up_down" > 
                 
                  <div class="swiper-slide_in">
                  <?php if($my_images&&$left_right){wp_nav_menu(array( 'walker' => new header_menu(),'container' => false,'menu' => $my_images ,'items_wrap' => '<ul class="down_pic">%3$s</ul>' ) );} ?>
                  
                  
               
                   
                   <div class="up_text <?php echo $my_text_colors.$my_text_alphass ?>"  <?php echo $tup_xy; ?> >
                     <div id="alpha">
                      <?php if( $title) {?>  <h3><a  href="#"><?php echo html_entity_decode( $title); ?></a></h3><?php } ?>
                      <?php if( $my_text3) {?> <p> <?php echo html_entity_decode($my_text3); ?></p><?php } ?>
                       </div>
                      <?php if( $my_text4) {?>  <a target="_blank" href="<?php echo  $my_url; ?>" class="btn <?php echo   $my_btn_icon; ?>"><b><?php echo  $my_text4; ?></b><div class="btn_bag"></div></a><?php } ?>
                     
                   </div>
                   
                <?php if($my_images&&!$left_right){wp_nav_menu(array( 'walker' => new cunst(),'container' => false,'menu' => $my_images ,'items_wrap' => '<div class="'.$my_text_colors.' down_pic swiper-container"'.$up_xy.' ><div class="swiper-wrapper">%3$s</div><div class="pagination_down_pic" ></div></div>' ) );} ?>
                  
                   <?php  if($detect->isMobile()){?> 
   <script>
                   var cdown_pic = new Swiper('.down_pic',{
	                scrollbar: '.pagination_down_pic',
				
		            scrollbarHide:false,
					speed:800,
				<?php 	if ($detect->isTablet()){   ?>	
					slidesPerView: 3,
					initialSlide :1,
					   spaceBetween: 20,
					
						
					  
					<?php } ?>
			        centeredSlides: true,
					   }) ;
                  </script>
                  <?php } ?>
                  </div>
                   
                   
      <a href="<?php echo  $my_url; ?>"target="_blank" class="index_mod_bag <?php if(!$my_b_images_ad){echo 'bag_animate'; } ?> " style=" background-image:url(<?php if($my_b_images){echo $my_b_images ;}else{ echo get_bloginfo('template_url').'/images/demo/2.jpg'; }?>)">
       <?php if( !$detect->isMobile()&&$my_mp4) {?> <video autoplay="true" loop="true" preload="auto" muted="muted"  src="<?php echo $my_mp4 ; ?>"></video><?php } ?>
      </a> 
             </div>

 
        <?php
	}
}
register_widget('up_down_list');
?>