<?php
$qq_tu=get_option('mytheme_qq_tu');
$weixin=get_option('mytheme_kefu_weixin');
$word_t56=get_option('mytheme_word_t56');
if(!get_option('mytheme_kefu_on')){
	$page_id =get_the_ID();
	if(get_post_meta($id, "customize",true)==='modle1'){$customize_page=true;}
 ?>


<div class="kefu "<?php  if(is_home()||$customize_page){echo 'id="kefu"';} ?>>
<img src="<?php if($qq_tu==""){ echo get_bloginfo('template_url').'/images/lianxi.png';}else{echo $qq_tu; } ?>" />

<div class="qq_kefu"> <?php echo stripslashes(get_option('mytheme_kefu_qq')); ?> </div>
         

 <img src="<?php if($weixin==""){ echo get_bloginfo('template_url').'/images/weixin2.png';}else{echo $weixin; } ?>" /> 
   

<a class="gotutop" href="#top"><i></i><?php if($word_t56!=""){echo $word_t56;}else{echo '回到顶部';}  ?></a>

</div> 
   <div id="show" <?php  if(is_home()||$customize_page){echo 'class="kefu_show"';} ?>></div>
<?php }; ?>