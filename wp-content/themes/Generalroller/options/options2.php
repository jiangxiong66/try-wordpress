

  <div class="xiaot">
                     <b class="bt">模板微调</b><br />
                    <p>这里你可以设定各个页面、分类目录的显示数量、顶部图片</p>
                 
  </div>
    <div class="xiaot">
                     <b class="bt">内页布局替换</b><br />
                 
                      <?php $left_right =get_option('mytheme_left_right') ?>
                    <label  for="left_right ">内页布局:</label>
                  <select name="left_right" id="left_right">
                   <option value=''<?php if ( $left_right ==="" ) {echo "selected='selected'";}?>>默认（右边显示主要内容）</option>
                    <option value='none'<?php if ( $left_right ==="none" ) {echo "selected='selected'";}?>>对调（左边显示主要内容）</option>
	             </select>  
                 
  </div>
  
  
    <div class="xiaot">
                     <b class="bt">相关文章图文尺寸选项</b><br />
                    
                      <?php $pic_size_singln= get_option('mytheme_pic_size_singln'); ?>
                    <label  for="pic_size_singln ">选择尺寸:</label>
                  <select name="pic_size_singln" id="pic_size_singln">
                  <option value='case'<?php if ($pic_size_singln == "case" ) {echo "selected='selected'";}?> >横向（287, 191）</option>
	          <option value='case_full'<?php if ($pic_size_singln == "case_full" ) {echo "selected='selected'";}?>>竖向（287, 320）</option>
               <option value='fang'<?php if ($pic_size_singln == "fang" ) {echo "selected='selected'";}?>>正方形（307, 307）</option>
	             </select>  
                 
  </div>
            
            <div class="xiaot">
            
            
              
 
             <label  for="fenxiang">文章底部的固定文字、图片以及连接等：</label> 
           
              
              <?php  echo wp_editor(stripslashes(get_option('mytheme_fenxiang')),  "fenxiang"); ?>
              <p>在这里编辑一些图文、链接等信息，可以是您的网站固定推荐信息，他们会显示在每一篇文章的结尾。</p><br />

         
                      <?php $show_page =get_option('mytheme_show_page'); ?>
                    <label  for="show_page">固定文字显示方式:</label>
                  <select name="show_page" id="show_page">
                   <option value=''<?php if ( $show_page ==="" ) {echo "selected='selected'";}?>>默认页面和文章都显示</option>
                    <option value='none'<?php if ( $show_page ==="none" ) {echo "selected='selected'";}?>>只在文章显示</option>
	             </select>  
                 

              
               <br />
<br />
<br />
<label  for="fenxiang2">文章底部的分享代码：</label> 
              
               <textarea name="fenxiang2" cols="86" rows="4" id="fenxiang2"><?php echo stripslashes(get_option('mytheme_fenxiang2')); ?></textarea>    
               
              <p>此处是文章内页和单页的百度分享代码替换框，若你想要使用其他的分享代码，可以获取代码粘贴到此处（如台湾、香港、澳门地区和海外地区用户不需要分享中国大陆的社交网站，可以使用此功能粘贴本地的分享代码，若不想使用此功能，可以打一些空格在里面即可）留空则显示默认的百度分享 </p>  
           
           
           <b class="bt">内页顶部以及底部图片文字设定</b>
            
            <p><strong>内页（分类目录、文章页以及页面）的顶部图片设定</strong></p>
            <div class="up">
            <label  for="top_pic">【pc以及平板电脑端的顶部图片】(尺寸：1920*320)</label> 
              <input type="text" size="60"  name="top_pic" id="top_pic" value="<?php echo get_option('mytheme_top_pic'); ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
            
             <div class="up">
            <label  for="top_pic_move">【手机端的顶部图片】(尺寸：700*158)</label> 
              <input type="text" size="60"  name="top_pic_move" id="top_pic_move" value="<?php echo get_option('mytheme_top_pic_move'); ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div>
            
      <div class="up">
            <label  for="btn_url">联系咨询按钮统一链接</label> 
              <input type="text" size="60"  name="btn_url" id="btn_url" value="<?php echo get_option('mytheme_btn_url'); ?>"/>   
                <p>首页的案例展示模块、分类目录的一栏和两栏图片排版模式以及产品内页有一个联系咨询的按钮，你可以统一设置咨询的qq链接，或者跳入到一个页面中。</p>  
            </div>
                
                
            </div>  
           
                      
              <div class="xiaot">
            <p>1.26版本之后更新了翻页方式，现在所有的翻页均在各个分类目录编辑处可设置具体的翻页，默认翻页为wordpress后台--设置--阅读处的数量</p>
            
            </div>          
                      
           <div class="xiaot">
              
              
                <b class="bt">各尺寸略缩图默认图片</b>
            
            <p><strong>在首页、侧边栏和列表页有的列表会调用一个封面图片，如果没有设置，而你的文章中也没有图片，那么将会调用一张默认的图片，你可以在此处上传各个尺寸的默认图片。</strong></p>
            
    <?php if(get_option('mytheme_case_thumbnails')){$case_thumbnails=get_option('mytheme_case_thumbnails');}else{$case_thumbnails= get_bloginfo('template_url').'/thumbnails/case.jpg';} 
		  if(get_option('mytheme_fang_thumbnails')){$fang_thumbnails=get_option('mytheme_fang_thumbnails');}else{$fang_thumbnails= get_bloginfo('template_url').'/thumbnails/fang.jpg';}
		  if(get_option('mytheme_four_s_thumbnails')){$four_s_thumbnails=get_option('mytheme_four_s_thumbnails');}else{$four_s_thumbnails= get_bloginfo('template_url').'/thumbnails/four_s.jpg';}
		  if(get_option('mytheme_news_thumbnails')){$news_thumbnails=get_option('mytheme_news_thumbnails');}else{$news_thumbnails= get_bloginfo('template_url').'/thumbnails/news.jpg';}
		  if(get_option('mytheme_case_full_thumbnails')){$case_full_thumbnails=get_option('mytheme_case_full_thumbnails');}else{$case_full_thumbnails= get_bloginfo('template_url').'/thumbnails/case_full.jpg';}
			
			
			
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
            
             
            
            
               <div class="up">      <img style="width:100px; height:auto;" src="<?php echo $news_thumbnails; ?>"/><br />
            <label  for="news_thumbnails">图片：400, 266</label> 
      
              <input type="text" size="60"  name="news_thumbnails" id="news_thumbnails" value="<?php echo $news_thumbnails; ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
            
               <div class="up">
               
                <img style="width:100px; height:auto;" src="<?php echo $case_full_thumbnails; ?>"/><br />
            <label  for="case_full_thumbnails">图片：287, 320</label> 
           
              <input type="text" size="60"  name="case_full_thumbnails" id="case_full_thumbnails" value="<?php echo $case_full_thumbnails; ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
              
              </div>
            
             <div class="xiaot">
                <b class="bt">侧边栏悬浮模块设置</b><br />
                <?php $kefu_on =  get_option('mytheme_kefu_on'); ?>
                 <label  for="kefu_on">是否显示悬浮:</label>
                  <select name="kefu_on" id="kefu_on">
                   <option value=''<?php if ( $kefu_on ==="" ) {echo "selected='selected'";}?>>显示</option>
                    <option value='none'<?php if ( $kefu_on ==="none" ) {echo "selected='selected'";}?>>不显示</option>
	             </select>   
                  <div class="up">
                      <label  for="about_pic">二维码上传（尺寸：210*210）</label> 
                      <input type="text" size="40"  name="kefu_weixin" id="kefu_weixin" value="<?php echo get_option('mytheme_kefu_weixin'); ?>"/>   
                      <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
                  </div> 
                  
                   <div class="up">
                      <label  for="qq_tu">客服头部图片替换(180宽度)</label> 
                      <input type="text" size="40"  name="qq_tu" id="qq_tu" value="<?php echo get_option('mytheme_qq_tu'); ?>"/>   
                      <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
                  </div> 
                    <div class="up">
                    <label  for="kefu_qq">客服qq代码添加</label>
                    <textarea name="kefu_qq" cols="86" rows="4" id="kefu_qq"><?php echo stripslashes(get_option('mytheme_kefu_qq')); ?></textarea>
                    <p>登录QQ，并且进入QQ互联<a href="http://connect.qq.com/intro/wpa" target="_blank">http://shang.qq.com/widget/consult.php</a>,将获取的代码粘贴进来，支持多个qq客服代码添加</p>
                      </div>    
               </div>                                        
            
           
                   
                     
           
                   
                     