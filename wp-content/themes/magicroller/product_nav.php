<?php 

if(is_category()){ global $wp_query;$term_id = get_query_var('cat'); $nav_menu=get_option('navm_'.$term_id);}

if($nav_menu!='noshow'){	 
	 
$list_nmber_nav =get_option('mytheme_list_nmber_nav');
if(get_option('mytheme_move_index')!=""){$move_index=get_option('mytheme_move_index');}else{ $move_index= "none";};
if($list_nmber_nav ==""){

 ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cookie.js"></script>
<div id="nav_product_mue" <?php if(is_home||is_page($move_index)){echo 'class="index_search"';}; ?> style=" margin-bottom:15px;">
<?php       $word_t24=get_option('mytheme_word_t24');
			$word_t25=get_option('mytheme_word_t25');
			$word_t40=get_option('mytheme_word_t40');
			$word_t41=get_option('mytheme_word_t41');
			 ?>
<div class="title_page"><b><?php if($word_t24!=""){echo $word_t24;}else{echo '产品检索';}  ?></b><a><?php if($word_t25!=""){echo $word_t25;}else{echo '你可以选择下面的条件并可以输入关键词点击开始搜索进行筛选';}  ?></a>


</div>
<?php 


wp_nav_menu(array( 'theme_location' => 'tag-menu2','menu_class'=> 'nav_product_mu' ,'walker' => new check_walker(),) );?>


  <div class="s_search_ys">
     
        <a></a>  <input type="text" id="tagesname" name="tagesname"  value="" onfocus="javascript:if(this.value=='<?php if($word_t40!=""){echo $word_t40;}else{echo '请输入关键词：';}  ?>')this.value='';" />
          <input  type="text" id="tagesulg" name="tagesname" value="" />
          <input type="text" id="catsulg" name="tagesname" value="" />
       
          <input   type="hidden" name="tags_stp" value="ok" />
          <input type="submit" value="  " id="choose" />
  
  
  
    </div>  

</div>
<script>
<?php if(get_option('mytheme_tags_moshi')){  $jiaoji='.replace(/\,/g,"+")';}?>
$("#header_pic_nav li a").click(function(){$.cookie("tagsulg","",{expires:7,path:"/"});$.cookie("catsulg","",{expires:7,path:"/"});$.cookie("search_sulg","",{expires:7,path:"/"})});var ids="";var idc="";var idt="";var idall="";if($.cookie("tagsulg")){if($.cookie("catsulg")||$.cookie("search_sulg")){idt=$.cookie("tagsulg")+","}else{idt=$.cookie("tagsulg")}$("#tagesulg").val($.cookie("tagsulg"))}else{$.cookie("tagsulg","",{expires:7,path:"/"})}if($.cookie("catsulg")){if($.cookie("search_sulg")){idc=$.cookie("catsulg")+","}else{idc=$.cookie("catsulg")}$("#catsulg").val($.cookie("catsulg"))}else{$.cookie("catsulg","",{expires:7,path:"/"})}if($.cookie("search_sulg")){ids=$.cookie("search_sulg");}else{$.cookie("search_sulg","",{expires:7,path:"/"})}idall=idt+idc+ids;ids_on="#"+idall.replace(/,/g,",#"),$(ids_on).addClass("select");$(".nav_product_mu").children("li").children("ul").children("li").children("a").click(function(){var j=$("#tagesulg");var h=$("#catsulg");var f=$("#tagesname");var a=j.val();var u=h.val();var n=f.val();if($(this).hasClass("select")){$(this).parent("li").parent("ul").parent("li.dx_themepark").children("ul").children("li").siblings().children("a").removeClass("select");$(this).removeClass("select");if($(this).parent("li").hasClass("menu-item-object-post_tag")){var w=a.split(",");var d=[];var r=[];var p=$(this).attr("rel");for(s=0;s<w.length;s++){if(p!=w[s]){d.push(w[s])}}}if($(this).parent("li").hasClass("menu-item-object-category")){var b=u.split(",");var o=[];var e=$(this).attr("rel");for(s=0;s<b.length;s++){if(e!=b[s]){o.push(b[s])}}}}else{$(this).parent("li").parent("ul").parent("li.dx_themepark").children("ul").children("li").siblings().children("a").removeClass("select");$(this).addClass("select")}if($(this).parent("li").hasClass("menu-item-object-post_tag")){var l=new Array;var s=0;$(".nav_product_mu").children("li").children("ul").children("li.menu-item-object-post_tag").each(function(){if($(this).children("a").hasClass("select")){l[s]=$(this).children("a").attr("rel");s=s+1}});j.val(l)}if($(this).parent("li").hasClass("menu-item-object-category")){var k=new Array;var s=0;$(".nav_product_mu").children("li").children("ul").children("li.menu-item-object-category").each(function(){if($(this).children("a").hasClass("select")){k[s]=$(this).children("a").attr("rel");s=s+1}});h.val(k)}var g=$("#tagesulg").val()<?php echo $jiaoji; ?>;var m="";var q="";var v="";if($("#tagesulg").val()!=""){m="?tag="+g}if($("#catsulg").val()!=""){if($("#tagesulg").val()==""){v="?cat="+$("#catsulg").val()}else{v="&cat="+$("#catsulg").val()}}if($("#tagesname").val()!=""){if($("#tagesulg").val()==""){q="?s="+$("#tagesulg").val()}else{if($("#catsulg").val()==""){q="?s="+$("#tagesname").val()}else{q="&s="+$("#tagesname").val()}}}location.href="<?php bloginfo('url') ?>/"+m+v+q;$.cookie("tagsulg",$("#tagesulg").val(),{expires:7,path:"/"});$.cookie("catsulg",$("#catsulg").val(),{expires:7,path:"/"});$.cookie("search_sulg",$("#tagesname").val(),{expires:7,path:"/"})});$("input#choose").click(function(){var c="";var a="";if($("input#choose").val()){if($.cookie("catsulg")){c="&cat="+$.cookie("catsulg")}if($.cookie("tagsulg")){a="&tag="+$.cookie("tagsulg")<?php echo $jiaoji; ?>}var b="?s="+$("#tagesname").val();location.href="<?php bloginfo('url') ?>/"+b+a+c;$.cookie("tagsulg",$("#tagesulg").val(),{expires:7,path:"/"});$.cookie("catsulg",$("#catsulg").val(),{expires:7,path:"/"});$.cookie("search_sulg",$("#tagesname").val(),{expires:7,path:"/"})}else{alert("请输入关键词")}});
</script>
<?php }} ?>