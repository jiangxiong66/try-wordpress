<?php 
function extraordinaryvision_customize_css(){

	$index_blue=get_option('mytheme_index_blue');
	$buy_color=get_option('mytheme_buy_color');
	$tag_color=get_option('mytheme_tag_color');
	$search_color=get_option('mytheme_search_color');
	$ppc_color=get_option('mytheme_ppc_color');
	$link_color=get_option('mytheme_link_color');
	$textzise_color=get_option('mytheme_textzise_color');
	$textlinehight_color=get_option('mytheme_textlinehight_color');
	$enter_p=get_option('mytheme_enter_p');
	?>
<style id="extraordinaryvision_customize_css" type="text/css">
	 <?php 
	             
				  if($enter_p&&$enter_p=='suojin'){echo '.enter p{text-indent:2em; }';}
				  if($search_color&&$search_color!='#117dc2'){echo '.select,.nav_product_mu li .sub-menu li a:hover{background:'.$search_color.'}';}
				   if($textzise_color&&$textzise_color!='14'){echo '.enter p{font-size:'.$textzise_color.'px; line-height:'.$textlinehight_color.'px;}';}
				  if($link_color&&$link_color!='#117dc2'){echo '.enter a{color:'.$link_color.'}';}
                  if($ppc_color&&$ppc_color!='#ccc'){echo '.enter_cs a.cutyes{background:'.$ppc_color.'}';}
			     if($tag_color&&$tag_color!='#117dc2'){echo '.tag_pro a:hover{background:'.$tag_color.'}.infot a#tagss,.infot a{color:'.$tag_color.'}';}
		         if($buy_color&&$buy_color!='#117dc2'){echo '#product .buy_btn a.btn{background:'.$buy_color.'}';}
	             if($index_blue&&$index_blue!="#11a3c2"){echo '#nav_product_mue .title_page a,.footer_info .dack a{color:'.$index_blue.' } ';
				 echo '.fourq_title a.cues,.index_swipers .swiper-slide .news .news_tabs a.active, .index_swipers .swiper-slide .news .news_header h2,.index_swipers .swiper-slide .news .news_more_s a{background:'.$index_blue.';} ';
				 
				 }
	echo stripslashes(get_option('mytheme_zdycss'));
	
	
		
	  ?>
    </style>
<?php }
add_action( 'wp_head', 'extraordinaryvision_customize_css');
?>              