      <?php  $detect = new Mobile_Detect();
      $mytheme_detects=get_option('mytheme_detects');
	 $footer_b=get_option('mytheme_footer_b');
if($footer_b){ $footer_bs='style="background:url('.$footer_b.')"';}
 $footer_d=get_option('mytheme_footer_d');
if($footer_d){ $footer_ds='style="background:url('.$footer_d.')"';}
$word_t2=get_option('mytheme_word_t2');
         $themepark= get_option('mytheme_themepark');
         $icp_b=get_option('mytheme_icp_b'); 

	    $language1=get_option('mytheme_language1');
			$language2=get_option('mytheme_language2');
			$language_link1=get_option('mytheme_language_link1');
			$language_link2=get_option('mytheme_language_link2');	
			 $language3=get_option('mytheme_language3');
			$language4=get_option('mytheme_language4');
			$language_link3=get_option('mytheme_language_link3');
			$language_link4=get_option('mytheme_language_link4');		
	  $language_title=get_option('mytheme_language_title');		
	  	if ($detect->isMobile()&&$detect->isTablet()||!$detect->isMobile()){  
           if($mytheme_detects=='value2'){get_template_part( 'move/footer' );}else{
		   ?>
<div class="footer" <?php echo $header_over; ?>>
    <div class="footer_in"> 
    
        <div class="footer_contact">
           <div class="footer_tell  dack">
               <a class="dack"><b><?php if(get_option('mytheme_tell_name')){echo get_option('mytheme_tell_name');}else{ echo '联系我们<br />contact';} ?></b></a>
               <p><?php  if(get_option('mytheme_tell')){echo get_option('mytheme_tell');} ?><br /><?php  if(get_option('mytheme_tell2')){echo get_option('mytheme_tell2');} ?></p>
           
           </div>
           
     
           <div class="footer_tell  dack contaccc">
             <?php if(get_option('mytheme_footer_box3_pic')){ ?>    <a id="onlie_weixin"><?php if(get_option('mytheme_box_pic_n')){echo get_option('mytheme_box_pic_n');}else{ echo '关注微信';} ?></a><?php } ?>
               <a id="onlie_qq" target="_blank" href="<?php if(get_option('mytheme_QQ')){echo get_option('mytheme_QQ');} ?>"><?php if(get_option('mytheme_QQ_name')){echo get_option('mytheme_QQ_name');}else{ echo '在线客服';} ?></a>
           
           </div>
           
           
            <?php if($language_link1||$language_link2||$language_link3||$language_link4){  ?>
                 <div class="footer_tell  dack " id="languge_out">
                 
                 <a class="languges"><?php if( $language_title){echo  $language_title;}else{echo '语言选择';} ?></a><br />
                 <span  id="languge">
           <?php if($language_link1){ ?>
             <a class="language" target="_blank" href="<?php echo $language_link1 ;?>">
             <img src="<?php if($language1){ echo $language1;}else{echo get_bloginfo('template_url').'/images/china.gif';}  ?>" alt="language" />
             </a>
             <?php  }  if($language_link2){ ?>
              <a  class="language" target="_blank" href="<?php echo $language_link2 ;?>">
             <img src="<?php if($language2){ echo $language2;}else{echo get_bloginfo('template_url').'/images/usa.gif';}  ?>" alt="language" />
             </a>
              <?php  }  if($language_link3){ ?>
              <a  class="language" target="_blank" href="<?php echo $language_link3 ;?>">
             <img src="<?php if($language3){ echo $language3;}else{echo get_bloginfo('template_url').'/images/usa.gif';}  ?>" alt="language" />
             </a>
             <?php  }  if($language_link4){ ?>
              <a  class="language" target="_blank" href="<?php echo $language_link4 ;?>">
             <img src="<?php if($language4){ echo $language4;}else{echo get_bloginfo('template_url').'/images/usa.gif';}  ?>" alt="language" />
             </a>
			<?php  
			 }
		 ?>
                
              </span>
              </div>
                 <?php } ?>
           
            <div class="footer_tell">
               <p><?php if(get_option('mytheme_mail_name')){echo get_option('mytheme_mail_name');}else{ echo '邮件联系';} ?>
               <br /> <?php if(get_option('mytheme_mail')){echo get_option('mytheme_mail');} ?></p>
           
           </div>
  
        
        </div>
    
        <div class="footer_info ">
           <p class="dack"> <?php  if($word_t2!=""){echo $word_t2;}else{echo '版权所有';}  ?> &copy;<?php echo date("Y"); echo " "; echo '湖南鸣艺瑞克文化传播有限公司'; 
		   if($icp_b !=="") {echo '    <a rel="nofollow" target="_blank" href="http://www.miitbeian.gov.cn/">'.$icp_b.'</a>'; };
		   if($themepark =="") {echo ' <br> 技术支持： <a target="_blank" href="http://www.themepark.com.cn">WEB主题公园</a>'; }
		   else if($themepark =="en") {echo '   Theme by ： <a target="_blank" href="http://www.themepark.com.cn">themepark</a>'; }
		     ?></p>
        
        </div>
    
    
    </div>
    <div class="footer_background"></div>
</div>
      <?php }}else{get_template_part( 'move/footer' ); ?> 
      <?php } ?>
      
    <?php 
	if( !is_home())	{
	 $id =get_the_ID();
	   $mytheme_bottom_pic=get_option('mytheme_bottom_pic');
	  $mytheme_bottom_pic_move=get_option('mytheme_bottom_pic_move');
	  if(get_option('mytheme_bottom_pic_text')){$mytheme_bottom_pic_text=get_option('mytheme_bottom_pic_text');}else{$mytheme_bottom_pic_text='为你提供最为便捷的WordPress中文原创主题<br>www.themepark.com';}
	    if($mytheme_bottom_pic){
	  	if ($detect->isMobile()&&$detect->isTablet()||!$detect->isMobile()){  
	    if($mytheme_detects=='value2'){$backgroud=$mytheme_bottom_pic_move; }else{
$backgroud=$mytheme_bottom_pic;
}}else{$backgroud=$mytheme_bottom_pic_move;}
$bottom_pic_back= 'style="background:url('.$backgroud.')"';
}

	 if(!get_post_meta($id, "customize",true)){echo '<div id="page_bottom" '.$bottom_pic_back.'><p>'.$mytheme_bottom_pic_text.'</p></div> ';}
	
	}
	
	 ?> 
      
       <?php if(get_option('mytheme_footer_box3_pic')){ ?> 
 <div class="erweima_weixin">
<div class="weixn_closed"></div>
 <img src="<?php echo get_option('mytheme_footer_box3_pic'); ?>" />
 <div class="header_background"></div>
 </div><?php } ?>
<?php ?>
</body>
 <!--<?php echo get_num_queries() . ' queries in ' . timer_stop(0) . ' seconds.'; ?>-->	

	<?php   wp_footer();echo stripslashes(get_option('mytheme_analytics')); ?>
  
</html>
