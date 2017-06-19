<?php 

class case_index extends WP_Widget {

	function case_index()
	{
		$widget_ops = array('classname'=>'case_index','description' => get_bloginfo('template_url').'/images/xuanxiang/3.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="case_index",$name='调用一个图文的模块【自定义排版模块】',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	
	
		 $left_right=esc_attr($instance['left_right']);
		 $first_mod = esc_attr($instance['first_mod']);
		 $my_images = esc_attr($instance['my_images']);
		 $my_b_images = esc_attr($instance['my_b_images']);
		 $my_b_images_ad = esc_attr($instance['my_b_images_ad']);
		 $my_images_up = esc_attr($instance['my_images_up']);
		 $my_images_lr = esc_attr($instance['my_images_lr']);
		 
		  $my_text_up = esc_attr($instance['my_text_up']);
		 $my_text_lr = esc_attr($instance['my_text_lr']);
		 $my_text2 = esc_attr($instance['my_text2']);
		 $my_text3 = esc_attr($instance['my_text3']);
		
	 $nnmber = esc_attr($instance['nnmber']);
		 $my_text_color= esc_attr($instance['my_text_color']);
	     $my_text_alpha=esc_attr($instance['my_text_alpha']);
	 $w_cat = esc_attr($instance['w_cat']);
	 $zhiding = esc_attr($instance['zhiding']);
	?>
<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>模块属性设置</strong></p>
<p>   
    <label  for="<?php echo $this->get_field_id('first_mod'); ?>">初始化模块（这个模块是否是你放置的第一个模块？）：</label><br />
             <select id="<?php echo $this->get_field_id('first_mod'); ?>" name="<?php echo $this->get_field_name('first_mod'); ?>" >
              <option value=''<?php if ($first_mod == "" ) {echo "selected='selected'";}?> >不是第一个模块</option>
	          <option value='1'<?php if ($first_mod == "1" ) {echo "selected='selected'";}?>>是第一个模块</option>
	</select><br />

<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">请注意：如果这个模块是你放置的第一个模块，那么请选择“是第一个模块”，这样这个模块在没有滚动时，才能在网站加载完成之后以动画显示出模块的内容，否则他们是隐藏的。</em>
</p>



<p>   
    <label  for="<?php echo $this->get_field_id('my_b_images_ad'); ?>">是否使用背景图片镜头推进效果</label><br />
             <select id="<?php echo $this->get_field_id('my_b_images_ad'); ?>" name="<?php echo $this->get_field_name('my_b_images_ad'); ?>" >
              <option value=''<?php if ($my_b_images_ad == "" ) {echo "selected='selected'";}?> >使用</option>
	          <option value='1'<?php if ($my_b_images_ad == "1" ) {echo "selected='selected'";}?>>不使用</option>
	</select>
<em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">镜头推进效果是css3动画，只支持在谷歌、火狐等非ie浏览器中显示（国产的某些浏览器，如360、猎豹、uc等浏览器若使用ie核心浏览也无法显示）</em>
</p>

<p>
  <label  for="<?php echo $this->get_field_id('my_b_images'); ?>">背景图片:</label><br />
 <input type="text" size="40" value="<?php echo $my_b_images ; ?>" name="<?php echo $this->get_field_name('my_b_images'); ?>" id="<?php echo $this->get_field_id('my_b_images'); ?>"/>
 
 <a id="ashu_upload" class="left_right_upload_button button" href="#">上传</a>
 
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">pc和平板电脑的背景图片尺寸为1920*911（像素）. 平板电脑的背景图片会依据尺寸自动裁切为1024宽度，不需要另外上传，手机上的背景图片请上传700像素宽度的图片。</em>
</p> 

<p>
<label  for="<?php echo $this->get_field_id('w_cat'); ?>">请选择:</label><br />
             <select id="<?php echo $this->get_field_id('w_cat'); ?>" name="<?php echo $this->get_field_name('w_cat'); ?>" >
              <option value=''>请选择</option>
<?php 
		 $categorys = get_categories();
		$sigk_cat2= $w_cat;
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $sigk_cat2 == $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">这个模块是调用一个分类的文章而形成的一个滑块，必须选择上面的分类，并且分类下至少需要有3篇以上的文章才能形成列表滑块</em>
</p>

<p><label for="<?php echo $this->get_field_id('nnmber'); ?>"><?php esc_attr_e('显示数量(默认9):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('nnmber'); ?>" name="<?php echo $this->get_field_name('nnmber'); ?>" type="text" value="<?php echo $nnmber; ?>" /></label></p>
<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>标题设置</strong></p>

<p>   
    <label  for="<?php echo $this->get_field_id('zhiding'); ?>">文章排序:</label><br />
             <select id="<?php echo $this->get_field_id('zhiding'); ?>" name="<?php echo $this->get_field_name('zhiding'); ?>" >
              <option value=''<?php if ($zhiding == "" ) {echo "selected='selected'";}?> >显示最新文章</option>
	          <option value='1'<?php if ($zhiding == "1" ) {echo "selected='selected'";}?>>只显示置顶的文章(至少4篇置顶)</option>
              <option value='2'<?php if ($zhiding == "2" ) {echo "selected='selected'";}?>>显示随机文章</option>
		
	</select>

</p>

 <p>
 <label  for="<?php echo $this->get_field_id('my_text2'); ?>">文字模块-标题:</label>
 <input type="text" size="40" value="<?php echo $my_text2 ; ?>" name="<?php echo $this->get_field_name('my_text2'); ?>" id="<?php echo $this->get_field_id('my_text2'); ?>"/>
 </p>
<p>
 <label  for="<?php echo $this->get_field_id('my_text3'); ?>">文字模块-文字段落:</label>
<textarea style="width:98%;" id="<?php echo $this->get_field_id('my_text3'); ?>" name="<?php echo $this->get_field_name('my_text3'); ?>"cols="52" rows="4" ><?php echo stripslashes($my_text3); ?></textarea>  
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;"><?php esc_attr_e('使用代码 <br />进行分行,也支持html代码');?></em>
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


<?php    wp_enqueue_media(); ?>
 <script language="javascript">jQuery(document).ready(function(){var b;var a;jQuery(".left_right_upload_button").on("click",function(c){a=jQuery(this).prev("input");b=wp.media({title:"选择图片",button:{text:"选择"},multiple:false});if(b){b.open()}b.on("select",function(){attachment=b.state().get("selection").first().toJSON();jQuery(a).val(attachment.url);jQuery(".supports-drag-drop").remove()})})});</script>   
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
        $my_text2  = apply_filters('widget_title', empty($instance['my_text2']) ? __('') : $instance['my_text2']);
		$my_text3  = apply_filters('widget_title', empty($instance['my_text3']) ? __('') : $instance['my_text3']);
		$my_text_up  = apply_filters('widget_title', empty($instance['my_text_up']) ? __('') : $instance['my_text_up']);
        $my_b_images  = apply_filters('widget_title', empty($instance['my_b_images']) ? __('') : $instance['my_b_images']);
        $my_b_images_ad  = apply_filters('widget_title', empty($instance['my_b_images_ad']) ? __('') : $instance['my_b_images_ad']);
	    $my_text_color  = apply_filters('widget_title', empty($instance['my_text_color']) ? __('') : $instance['my_text_color']);
        $my_text_alpha  = apply_filters('widget_title', empty($instance['my_text_alpha']) ? __('') : $instance['my_text_alpha']);
	    $w_cat = apply_filters('widget_title', empty($instance['w_cat']) ? __('') : $instance['w_cat']);
		$zhiding  = apply_filters('widget_title', empty($instance['zhiding']) ? __('') : $instance['zhiding']);
	if($my_text_color){$my_text_colors='dack_text_mod';};
	if($my_text_alpha){$my_text_alphas='class="alpha'.$my_text_alpha.'"';};
	$nnmber = apply_filters('widget_title', empty($instance['nnmber']) ? __('9') : $instance['nnmber']);
	if( $zhiding =="1" ){ $post__in = get_option('sticky_posts');}
if( $zhiding =="2" ){ $oder="rand";}else{ $oder="ASC";}
	 $args = array( 'cat' => $w_cat , 'showposts' => $nnmber ,  'post__in' =>$post__in ,'orderby' => $oder );     $query = new WP_Query( $args );  
	 $detect = new Mobile_Detect();
      $mytheme_detects=get_option('mytheme_detects');
 ?>




<div  class="swiper-slide  <?php if ($first_mod == "1" ) {echo "swiper-slide-active";}?>  case_index_mod"> 
                 <div class="swiper-slide_in">
                    <div class="case_up <?php echo $my_text_colors ?>">
                      <div <?php echo $my_text_alphas ?> id="alpha">
                      <?php if($my_text2){ ?> <h3><a href="<?php echo get_category_link($w_cat); ?>"> <?php echo $my_text2; ?></a></h3><?php } ?>
                      <?php if($my_text3){ ?>  <p><?php echo html_entity_decode( $my_text3); ?></p><?php } ?>
                      </div>
                     </div>
                     <div class="case_index  swiper-container case<?php echo $w_cat ?> ">
                        <div class="swiper-wrapper"> 
                     
                     <?php  while ( $query->have_posts() ) :$query->the_post();  
					 $tit= get_the_title();
		             $id =get_the_ID(); 
	                 $content= get_the_content();
					    $linkss=get_post_meta($id,"hoturl", true); 
		    if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
					  ?>     
                     
                            <div  class="swiper-slide">
                            <a href="<?php echo $links1; ?>" target="_blank"  class="case_pic"> 
							<?php  themepark_thumbnails('pic_r' ); ?>
                            </a>
                            <div class="case_text"> <b> <a href="<?php echo $links1; ?>" target="_blank" ><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,35,"..."); ?></a></b> </div>
                            <div class="case_bag"></div> 
                            </div>
                            
                      <?php endwhile; ?>
                     
                        <div  class="swiper-slide" style=" opacity:0;">
                         
                            </div>
                     
                         </div>
                         
                     </div>
                     
                     
                      <?php 
	if ($detect->isMobile()||$mytheme_detects!='value1'){  ?>
                 <div class="swiper-scrollbar scrollbar_case pagination_case<?php echo $w_cat ?>"></div>
                       <?php }else{?>
                       <div class="pagination pagination_case pagination_case<?php echo $w_cat ?>"></div>
                       <?php } ?>
                       
                       
                 </div>
                   <div class="index_mod_bag <?php if(!$my_b_images_ad){echo 'bag_animate'; } ?>"style=" background-image:url(<?php if($my_b_images){echo $my_b_images ;}else{ echo get_bloginfo('template_url').'/images/demo/3.jpg'; }?>)"></div> 
              </div>
                   <?php
	if ($detect->isMobile()||$mytheme_detects!='value1'){  
 ?> 
 
 
   <script>
                   var case_index = new Swiper('.case<?php echo $w_cat ?>',{
	                scrollbar: '.pagination_case<?php echo $w_cat ?>',
                   
					effect : 'coverflow',
		            scrollbarHide:false,
                 
					speed:800,
				<?php 	if ($detect->isMobile()&&$detect->isTablet()||!$detect->isMobile()){   ?>	
					slidesPerView: 3,
					initialSlide :2,
					   spaceBetween: 20,
					<?php }else{ ?>
						slidesPerView: 2,
                        initialSlide :1,
					
					<?php } ?>
			        centeredSlides: true,
					   }) ;
                  </script>
 
 
  <?php }else{?>
                     <script>
                   var case_index = new Swiper('.case<?php echo $w_cat ?>',{
	                  pagination: '.pagination_case<?php echo $w_cat ?>',
                      paginationClickable: true,
                      cssWidthAndHeight : true,
					  freeMode : true,
                      slidesPerView : 3,
                      slidesPerGroup : 3,
					  paginationAsRange : true,
					   }) ;
					   $(".pagination_case<?php echo $w_cat ?> span:gt(-3)").css("display","none");
                  </script>
        <?php
	}}
}
register_widget('case_index');
?>