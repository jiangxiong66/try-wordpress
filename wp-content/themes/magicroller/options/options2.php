

  <div class="xiaot">
                     <b class="bt">模板微调</b><br />
                    <p>这里你可以设定各个页面、分类目录的显示数量、顶部图片</p>
                 
  </div>
    <div class="xiaot">
                     <b class="bt">内页布局替换</b><br />
                    <p>你可以调换内页布局左右的位置</p>
                      <?php $left_right =get_option('mytheme_left_right') ?>
                    <label  for="left_right ">是否显示多重筛选:</label>
                  <select name="left_right" id="left_right">
                   <option value=''<?php if ( $left_right ==="" ) {echo "selected='selected'";}?>>默认（右边显示主要内容）</option>
                    <option value='none'<?php if ( $left_right ==="none" ) {echo "selected='selected'";}?>>对调（左边显示主要内容）</option>
	             </select>  
                 
  </div>
            
            <div class="xiaot">
            
            
              
 
             <label  for="fenxiang">文章底部的固定文字、图片以及连接等：</label> 
           
              
              <?php  echo wp_editor(stripslashes(get_option('mytheme_fenxiang')),  "fenxiang"); ?>
              <p>在这里编辑一些图文、链接等信息，可以是您的网站固定推荐信息，他们会显示在每一篇文章的结尾。</p>
              
              
               <label  for="fenxiang2">文章底部的分享代码：</label> 
              
               <textarea name="fenxiang2" cols="86" rows="4" id="fenxiang2"><?php echo stripslashes(get_option('mytheme_fenxiang2')); ?></textarea>    
               
              <p>此处是文章内页和单页的百度分享代码替换框，若你想要使用其他的分享代码，可以获取代码粘贴到此处（如台湾、香港、澳门地区和海外地区用户不需要分享中国大陆的社交网站，可以使用此功能粘贴本地的分享代码，若不想使用此功能，可以打一些空格在里面即可）留空则显示默认的百度分享 </p>  
           
           
           <b class="bt">内页顶部以及底部图片文字设定</b>
            
            <p><strong>内页（分类目录、文章页以及页面）的顶部图片设定</strong></p>
            <div class="up">
            <label  for="top_pic">【pc以及平板电脑端的顶部图片】(尺寸：1920*331)</label> 
              <input type="text" size="60"  name="top_pic" id="top_pic" value="<?php echo get_option('mytheme_top_pic'); ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
            
             <div class="up">
            <label  for="top_pic_move">【手机端的顶部图片】(尺寸：700*231)</label> 
              <input type="text" size="60"  name="top_pic_move" id="top_pic_move" value="<?php echo get_option('mytheme_top_pic_move'); ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div>
            
            
              <p><strong>内页（分类目录、文章页以及页面）的底部图片设定</strong></p>
            <div class="up">
            <label  for="bottom_pic">【pc以及平板电脑端的底部图片】(尺寸：1920*331)</label> 
              <input type="text" size="60"  name="bottom_pic" id="bottom_pic" value="<?php echo get_option('mytheme_bottom_pic'); ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
            
             <div class="up">
            <label  for="bottom_pic_move">【手机端的底部图片】(尺寸：700*231)</label> 
              <input type="text" size="60"  name="bottom_pic_move" id="bottom_pic_move" value="<?php echo get_option('mytheme_bottom_pic_move'); ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div>
                
                   <div class="up">
            <label  for="bottom_pic_text">【底部的文字】</label> 
             <textarea name="bottom_pic_text" cols="86" rows="4" id="bottom_pic_text"><?php echo stripslashes(get_option('mytheme_bottom_pic_text')); ?></textarea>  
             <em><?php  esc_attr_e('使用<br>空行'); ?></em>  
            </div>
                
                
            </div>  
             <?php
		    $list_nmber1=get_option('mytheme_list_nmber1');
			$list_nmber2=get_option('mytheme_list_nmber2');
			$list_nmber3=get_option('mytheme_list_nmber3');
			$list_nmber4=get_option('mytheme_list_nmber4');
			$list_nmber5=get_option('mytheme_list_nmber5');
			
			$list_nmber_k1=get_option('mytheme_list_nmber_k1');
			$list_nmber_k2=get_option('mytheme_list_nmber_k2');
			$list_nmber_k3=get_option('mytheme_list_nmber_k3');
			$list_nmber_k4=get_option('mytheme_list_nmber_k4');
			$list_nmber_k5=get_option('mytheme_list_nmber_k5');
			

		    ?>    
                      
              <div class="xiaot">
            <p>显示文章数量自定义，在设定分类目录的列表页现实的数量时，记得要把默认的WordPress数量设为1，否则会出现404错误，设置方法请在 “设置” -- “阅读”中 ，将现实的文章数量设为1，即可。</p>
              <p> <label  for="list_nmber1">纯文字列表模板：</label> 
                <input type="text" size="20"  name="list_nmber1" id="list_nmber1" value="<?php if($list_nmber1!=""){echo $list_nmber1;}else{echo '12';}  ?>"/  /> 
                
                    
              </p>  
              
               <p> <label  for="list_nmber2">默认模板（小图片加上文字）：</label> 
                <input type="text" size="20"  name="list_nmber2" id="list_nmber2" value="<?php if($list_nmber2!=""){echo $list_nmber2;}else{echo '12';}  ?>"/  />
                
                      
              </p> 
              
               <p> <label  for="list_nmber3">大图文列表：</label> 
                <input type="text" size="20"  name="list_nmber3" id="list_nmber3" value="<?php if($list_nmber3!=""){echo $list_nmber3;}else{echo '12';}  ?>"/  />  
                 
              </p> 
              
             
              
               <p> <label  for="list_nmber5">图片列表（大图一栏）：</label> 
                <input type="text" size="20"  name="list_nmber5" id="list_nmber5" value="<?php if($list_nmber5!=""){echo $list_nmber5;}else{echo '12';}  ?>"/  />   
                
              
            </div>          
                      
           
            
           <div class="xiaot">
              
              
                <b class="bt">各尺寸略缩图默认图片</b>
            
            <p><strong>在首页、侧边栏和列表页有的列表会调用一个封面图片，如果没有设置，而你的文章中也没有图片，那么将会调用一张默认的图片，你可以在此处上传各个尺寸的默认图片。</strong></p>
            
    <?php if(get_option('mytheme_case_thumbnails')){$case_thumbnails=get_option('mytheme_case_thumbnails');}else{$case_thumbnails= get_bloginfo('template_url').'/thumbnails/case.jpg';} 
		  if(get_option('mytheme_fang_thumbnails')){$fang_thumbnails=get_option('mytheme_fang_thumbnails');}else{$fang_thumbnails= get_bloginfo('template_url').'/thumbnails/fang.jpg';}
		  if(get_option('mytheme_fang_s_thumbnails')){$fang_s_thumbnails=get_option('mytheme_fang_s_thumbnails');}else{$fang_s_thumbnails= get_bloginfo('template_url').'/thumbnails/fang_s.jpg';}
		  if(get_option('mytheme_twox_thumbnails')){$twox_thumbnails=get_option('mytheme_twox_thumbnails');}else{$twox_thumbnails= get_bloginfo('template_url').'/thumbnails/twox.jpg';}
		  if(get_option('mytheme_pic_r_thumbnails')){$pic_r_thumbnails=get_option('mytheme_pic_r_thumbnails');}else{$pic_r_thumbnails= get_bloginfo('template_url').'/thumbnails/pic_r.jpg';}
			
			
			
			?>
            <div class="up"><img style="width:100px; height:auto;"  src="<?php echo $case_thumbnails; ?>"/><br />

            <label  for="case_thumbnails">图片：287, 191</label> 
            
              <input type="text" size="60"  name="case_thumbnails" id="case_thumbnails" value="<?php echo $case_thumbnails; ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
            
             <div class="up"><img  style="width:100px; height:auto;"src="<?php echo $fang_thumbnails; ?>"/><br />
            <label  for="case_thumbnails">图片：287, 287</label> 
            
              <input type="text" size="60"  name="fang_thumbnails" id="fang_thumbnails" value="<?php echo $fang_thumbnails; ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
            
             
            
            
               <div class="up">      <img style="width:100px; height:auto;" src="<?php echo $twox_thumbnails; ?>"/><br />
            <label  for="twox_thumbnails">图片：400, 266</label> 
      
              <input type="text" size="60"  name="twox_thumbnails" id="twox_thumbnails" value="<?php echo $twox_thumbnails; ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
            
               <div class="up">
               
                <img style="width:100px; height:auto;" src="<?php echo $pic_r_thumbnails; ?>"/><br />
            <label  for="pic_r_thumbnails">图片：287, 320</label> 
           
              <input type="text" size="60"  name="pic_r_thumbnails" id="pic_r_thumbnails" value="<?php echo $pic_r_thumbnails; ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
              
              </div> 
           
                   
                     