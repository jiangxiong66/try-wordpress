<?php 

class news_index extends WP_Widget {

	function news_index()
	{
		$widget_ops = array('classname'=>'news_index','description' => get_bloginfo('template_url').'/images/xuanxiang/4.gif');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="news_index",$name='调用一个两栏的图文模块【自定义排版模块】',$widget_ops,$control_ops);  

	}

	function form($instance) { 
	
	    	
	
		 $left_right=esc_attr($instance['left_right']);
		 $first_mod = esc_attr($instance['first_mod']);
		 $my_b_images = esc_attr($instance['my_b_images']);
		 $my_b_images_ad = esc_attr($instance['my_b_images_ad']);
      	 $nnmber = esc_attr($instance['nnmber']); 
		  $nnmber2 = esc_attr($instance['nnmber2']); 
	     $w_cat = esc_attr($instance['w_cat']);
		 $w_cat2 = esc_attr($instance['w_cat2']);
		 $w_cat3 = esc_attr($instance['w_cat3']);
		 $w_cat4 = esc_attr($instance['w_cat4']);
		 $w_cat5 = esc_attr($instance['w_cat5']);
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


<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>调用设置（左边模块）</strong></p>
 <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">这个模块的左边可以调用一个4栏目切换的滑块。4个栏目分别调用不同的分类下的文章，请在下面选好分类</em>
<p>
<label  for="<?php echo $this->get_field_id('w_cat'); ?>">选择分类1:</label><br />
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

</p>


<p>
<label  for="<?php echo $this->get_field_id('w_cat2'); ?>">选择分类2:</label><br />
             <select id="<?php echo $this->get_field_id('w_cat2'); ?>" name="<?php echo $this->get_field_name('w_cat2'); ?>" >
              <option value=''>请选择</option>
<?php 
		 $categorys = get_categories();
		
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $w_cat2== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>

</p>

<p>
<label  for="<?php echo $this->get_field_id('w_cat3'); ?>">选择分类3:</label><br />
             <select id="<?php echo $this->get_field_id('w_cat3'); ?>" name="<?php echo $this->get_field_name('w_cat3'); ?>" >
              <option value=''>请选择</option>
<?php 
		 $categorys = get_categories();
		
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $w_cat3== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>

</p>


<p>
<label  for="<?php echo $this->get_field_id('w_cat4'); ?>">选择分类2:</label><br />
             <select id="<?php echo $this->get_field_id('w_cat4'); ?>" name="<?php echo $this->get_field_name('w_cat4'); ?>" >
              <option value=''>请选择</option>
<?php 
		 $categorys = get_categories();
		
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $w_cat4== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>

</p>
<p><label for="<?php echo $this->get_field_id('nnmber'); ?>"><?php esc_attr_e('显示数量(默认9):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('nnmber'); ?>" name="<?php echo $this->get_field_name('nnmber'); ?>" type="text" value="<?php echo $nnmber; ?>" /></label></p>
<p style="display:block; width:100%; border-bottom:1px #333333 solid; padding:5px; margin:5px;"><strong>调用设置（右边）</strong></p>

 <p>
<label  for="<?php echo $this->get_field_id('w_cat5'); ?>">选择分类:</label><br />
             <select id="<?php echo $this->get_field_id('w_cat5'); ?>" name="<?php echo $this->get_field_name('w_cat5'); ?>" >
              <option value=''>请选择</option>
<?php 
		 $categorys = get_categories();
		
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $w_cat5== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>

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
		 $my_b_images  = apply_filters('widget_title', empty($instance['my_b_images']) ? __('') : $instance['my_b_images']);
        $my_b_images_ad  = apply_filters('widget_title', empty($instance['my_b_images_ad']) ? __('') : $instance['my_b_images_ad']);
	
	    $w_cat = apply_filters('widget_title', empty($instance['w_cat']) ? __('') : $instance['w_cat']);
		 $w_cat2 = apply_filters('widget_title', empty($instance['w_cat2']) ? __('') : $instance['w_cat2']);
		  $w_cat3= apply_filters('widget_title', empty($instance['w_cat3']) ? __('') : $instance['w_cat3']);
		   $w_cat4 = apply_filters('widget_title', empty($instance['w_cat4']) ? __('') : $instance['w_cat4']);
		    $w_cat5 = apply_filters('widget_title', empty($instance['w_cat5']) ? __('') : $instance['w_cat5']);
		
	$nnmber = apply_filters('widget_title', empty($instance['nnmber']) ? __('10') : $instance['nnmber']);
	$nnmber2 = apply_filters('widget_title', empty($instance['nnmber2']) ? __('7') : $instance['nnmber2']);
	
	 $args = array( 'cat' => $w_cat , 'showposts' => $nnmber , 'post__in' =>$post__in );     $query = new WP_Query( $args );  
	  $args2 = array( 'cat' => $w_cat2 , 'showposts' => $nnmber , 'post__in' =>$post__in );     $query2 = new WP_Query( $args2 ); 
	   $args3= array( 'cat' => $w_cat3 , 'showposts' => $nnmber , 'post__in' =>$post__in );     $query3 = new WP_Query( $args3 ); 
	    $args4 = array( 'cat' => $w_cat4 , 'showposts' => $nnmber , 'post__in' =>$post__in );     $query4 = new WP_Query( $args4 ); 
		  $args5 = array( 'cat' => $w_cat5 , 'showposts' => $nnmber2 , 'post__in' =>$post__in );     $query5 = new WP_Query( $args5 ); 
	 $detect = new Mobile_Detect();
      $mytheme_detects=get_option('mytheme_detects');
	if ($detect->isMobile()||$mytheme_detects!='value1'){ $slideTo='slideTo'; 	}else{$slideTo='swipeTo';  }
 ?> 




<div  class="swiper-slide  <?php if ($first_mod == "1" ) {echo "swiper-slide-active";}?>  news_tuoch"> 
                 <div class="swiper-slide_in news" id="news<?php echo $w_cat ?>">
                    
                       <div class="left_news">
                             <div class="news_tabs">
                               <?php if($w_cat){ ?> <a class="active"><?php echo get_cat_name($w_cat) ;?></a><?php } ?>
                                <?php if($w_cat2){ ?> <a><?php echo get_cat_name($w_cat2) ;?></a><?php } ?>
                                <?php if($w_cat4){ ?> <a><?php echo get_cat_name($w_cat3) ;?></a><?php } ?>
                               <?php if($w_cat4){ ?>  <a><?php echo get_cat_name($w_cat4) ;?></a><?php } ?>
                               
                             </div>
                             <div class="swiper-container news_info">
                                 
                               
                               
                                 <div class="swiper-wrapper">
                                    
                                  <?php if($w_cat){ ?>
                                   <ul class="swiper-slide">
                                   
                                 <?php  $ashu_i=0; while ( $query->have_posts() ) :$query->the_post(); $ashu_i++; ?>  
                                     <?php 
								  $tit= get_the_title();
		                          $id =get_the_ID(); 
	                              $content= get_the_content();
								   $linkss=get_post_meta($id,"hoturl", true); 
		    if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
								    if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
									 if($ashu_i==1){?>     
                                     <li class="news_first">
                                        <a  target="_blank" href="<?php echo $links1; ?>" class="news_pic">
                                     <?php  themepark_thumbnails('case'); ?>
                                         </a>
                                        <div class="news_texts">
                                           <b><a  href="<?php echo $links1;  ?>" target="_blank" >
										   <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,40,"..."); ?>
                                           </a>
                                           </b>
                                           <span class="infot_news"><em class="times"><?php echo get_the_time('Y/m/d') ; ?></em><em class="vei"><?php echo $getPostViews; ?> </em></span>
                                     <?php if (!$detect->isMobile()){ ?>      <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,420,"...",'utf-8'); ?></p>
                                        <?php } ?>
                                        </div>
                                     
                                     </li>
                                      <?php  }else {?>
                                     <li><b><a  href="<?php echo $links1;  ?>" target="_blank" >
										   <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,45,"..."); ?>
                                           </a></b></li>
                                    <?php } endwhile; ?>
                                     <li class="news_more_s"><a href="<?php echo get_category_link($w_cat); ?>" target="_blank">查看所有>></a></li>
                                   </ul>
                                <?php } ?>
                                 <?php if($w_cat2){ ?>
                                   <ul class="swiper-slide">
                                   
                                 <?php  $ashu_i=0; while ( $query2->have_posts() ) :$query2->the_post(); $ashu_i++; ?>  
                                     <?php 
								  $tit= get_the_title();
		                          $id =get_the_ID(); 
	                              $content= get_the_content();
								    $linkss=get_post_meta($id,"hoturl", true); 
		    if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
								    if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
									 if($ashu_i==1){?>     
                                     <li class="news_first">
                                        <a  target="_blank" href="<?php echo $links1 ?>" class="news_pic">
                                        <?php  themepark_thumbnails('case'); ?>
                                         </a>
                                        <div class="news_texts">
                                           <b><a href="<?php echo $links1;  ?>" target="_blank" >
										   <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,40,"..."); ?>
                                           </a>
                                           </b>
                                           <span class="infot_news"><em class="times"><?php echo get_the_time('Y/m/d') ; ?></em><em class="vei"><?php echo $getPostViews; ?> </em></span>
                                         <?php if (!$detect->isMobile()){ ?>   <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,420,"...",'utf-8'); ?></p>
                                        <?php } ?>
                                        </div>
                                     
                                     </li>
                                      <?php  }else {?>
                                     <li><b><a href="<?php echo $links1;  ?>" target="_blank" >
										   <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,45,"..."); ?>
                                           </a></b></li>
                                    <?php } endwhile; ?>
                                       <li class="news_more_s"><a href="<?php echo get_category_link($w_cat2); ?>" target="_blank">查看所有>></a></li>
                                   </ul>
                                <?php } ?>
                                  <?php if($w_cat3){ ?>
                                    <ul class="swiper-slide">
                                   
                                 <?php  $ashu_i=0; while ( $query3->have_posts() ) :$query3->the_post(); $ashu_i++; ?>  
                                     <?php 
								  $tit= get_the_title();
		                          $id =get_the_ID(); 
	                              $content= get_the_content();
								      $linkss=get_post_meta($id,"hoturl", true); 
		    if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
								    if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
									 if($ashu_i==1){?>     
                                     <li class="news_first">
                                        <a  target="_blank" href="<?php echo $links1 ?>" class="news_pic">
                                           <?php  themepark_thumbnails('case'); ?>
                                         </a>
                                        <div class="news_texts">
                                           <b><a href="<?php echo $links1;  ?>" target="_blank" >
										   <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,35,"..."); ?>
                                           </a>
                                           </b>
                                           <span class="infot_news"><em class="times"><?php echo get_the_time('Y/m/d') ; ?></em><em class="vei"><?php echo $getPostViews; ?> </em></span>
                                             <?php if (!$detect->isMobile()){ ?>   <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,420,"...",'utf-8'); ?></p>
                                        <?php } ?>
                                        
                                        </div>
                                     
                                     </li>
                                      <?php  }else {?>
                                     <li><b><a href="<?php echo $links1;  ?>" target="_blank" >
										   <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,35,"..."); ?>
                                           </a></b></li>
                                    <?php } endwhile; ?>
                                       <li class="news_more_s"><a href="<?php echo get_category_link($w_cat3); ?>" target="_blank">查看所有>></a></li>
                                   </ul>
                                <?php } ?>
                                  <?php if($w_cat4){ ?>
                                 
                                    <ul class="swiper-slide">
                                   
                                 <?php  $ashu_i=0; while ( $query4->have_posts() ) :$query4->the_post(); $ashu_i++; ?>  
                                     <?php 
								  $tit= get_the_title();
		                          $id =get_the_ID(); 
	                              $content= get_the_content();
								     $linkss=get_post_meta($id,"hoturl", true); 
		    if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
								    if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
									 if($ashu_i==1){?>     
                                     <li class="news_first">
                                        <a  target="_blank" href="<?php echo $links1;  ?>" class="news_pic">
                                         <?php  themepark_thumbnails('case'); ?>
                                         </a>
                                        <div class="news_texts">
                                           <b><a href="<?php echo $links1;  ?>" target="_blank" >
										   <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,35,"..."); ?>
                                           </a>
                                           </b>
                                           <span class="infot_news"><em class="times"><?php echo get_the_time('Y/m/d') ; ?></em><em class="vei"><?php echo $getPostViews; ?> </em></span>
                                             <?php if (!$detect->isMobile()){ ?>   <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,420,"...",'utf-8'); ?></p>
                                        <?php } ?>
                                        
                                        </div>
                                     
                                     </li>
                                      <?php  }else {?>
                                     <li><b><a href="<?php echo $links1;  ?>" target="_blank" >
										   <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,35,"..."); ?>
                                           </a></b></li>
                                    <?php } endwhile; ?>
                                       <li class="news_more_s"><a href="<?php echo get_category_link($w_cat4); ?>" target="_blank">查看所有>></a></li>
                                   </ul>
                                <?php } ?>
                               
                                 </div>
                                 
                                 
                                 
                                 
                             </div>
                       
                       </div>
                     
                  
             

 <script>
  var news_info = new Swiper('#news<?php echo $w_cat ?> .news_info',{
    speed:600,
	mode : 'vertical',
	cssWidthAndHeight: 'width',
	simulateTouch : false,
	calculateHeight : true,
    onSlideChangeStart: function(){
      $("#news<?php echo $w_cat ?> .news_tabs .active").removeClass('active')
      $("#news<?php echo $w_cat ?> .news_tabs a").eq(news_info.activeIndex).addClass('active')  
    }
  });
  $("#news<?php echo $w_cat ?> .news_tabs a").on('touchstart mousedown',function(e){
    e.preventDefault()
    $("#news<?php echo $w_cat ?> .news_tabs .active").removeClass('active')
    $(this).addClass('active');
	
     news_info.<?php echo $slideTo; ?>( $(this).index() ,1000, false );
  });
  $("#news<?php echo $w_cat ?> .news_tabs a").click(function(e){
    e.preventDefault()
  });
  </script>
  
  
  	<?php 	if ($detect->isMobile()&&$detect->isTablet()||!$detect->isMobile()){   ?>	
  
  <div class="right_news">
  
       <div class="news_header">  <h2 class="active" ><a href="<?php echo get_category_link($w_cat5); ?>"><?php echo get_cat_name($w_cat5) ;?></a></h2>  </div>
       <div class="news_info">
       <ul>
        <?php  $ashu_i=0; while ( $query5->have_posts() ) :$query5->the_post(); $ashu_i++; ?>  
                                     <?php 
								  $tit= get_the_title();
		                          $id =get_the_ID(); 
	                              $content= get_the_content();
								     $linkss=get_post_meta($id,"hoturl", true); 
		    if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
								    if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
									 if($ashu_i==1){?>     
                                     <li class="news_first">
                                        <a  target="_blank" href="<?php echo $links1;  ?>" class="news_pic">
                                          <?php  themepark_thumbnails('case'); ?>
                                         </a>
                                        <div class="news_texts">
                                           <b><a href="<?php echo $links1;  ?>" target="_blank" >
										   <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,35,"..."); ?>
                                           </a>
                                           </b>
                                           <span class="infot_news"><em class="times"><?php echo get_the_time('Y/m/d') ; ?></em><em class="vei"><?php echo $getPostViews; ?> </em></span>
                                           <?php if (!$detect->isMobile()){ ?>   <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,80,"...",'utf-8'); ?></p>
                                        <?php } ?>  
                                        
                                        </div>
                                     
                                     </li>
                                      <?php  }else {?>
                                     <li><b><a href="<?php echo $links1;  ?>" target="_blank" >
										   <?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,45,"..."); ?>
                                           </a></b></li>
                                    <?php } endwhile; ?>
       
       </ul>
  </div>
  </div>
  
  <?php } ?>
  
  
   <div class="news_bags"></div>
  
       </div>
                   <div class="index_mod_bag <?php if(!$my_b_images_ad){echo 'bag_animate'; } ?>"style=" background-image:url(<?php if($my_b_images){echo $my_b_images ;}else{ echo get_bloginfo('template_url').'/images/demo/5.jpg'; }?>)"></div> 
              </div>
 
        <?php
	}
}
register_widget('news_index');
?>