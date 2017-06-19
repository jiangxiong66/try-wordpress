
<div class="xiaot">
 <input type="checkbox" value="cache_open" name="cache_open" id="cache_open" <?php if(get_option('mytheme_cache_open')=="cache_open"){echo "checked='checked'";} ?> />
 <label for="cache_open">开启内存缓存菜单功能</label>
 <p>若你的服务器没有支持memcache应用，请勿开启,否则在菜单处保存时会出现报错，但不影响使用，若服务器支持memcache，开启此应用之后会缓存菜单，大大降低查数据库询次数。服务器是否开启此应用请咨询你的服务器商，或者开启这个功能去菜单处保存一次菜单，如果没有报错警告，那么就是可用的。</p>
</div>

<div class="xiaot">

    <input type="checkbox" value="shop_ok" name="theme_shop_open" id="theme_shop_open" <?php if(get_option('mytheme_theme_shop_open')=="shop_ok"){echo "checked='checked'";} ?> />
    <label for="theme_shop_open">开启兼容购物盒子插件</label>
    <p>开启购物盒子插件之后，首页调用文章模块中如果文章启用了插件中的是商品模式，会显示价格、原价、包邮等信息。分类目录中的《大图文列表》《图片列表》以及内页《产品展示模板（一栏模式以及默认模式）》均会显示商品信息，内页模板点击购买按钮会出现提交订单表单和商品评分和评价模块。 <br />
购物盒子（shoppingbox）是WEB主题公园开发的一款能够支持在线付款的插件，本主题已经优化兼容，详情请见购物盒子的使用教程：<a target="_blank" href="http://www.themepark.com.cn/shoppingbox-WordPress-plugins">点击弹出查看</a><br />
<strong>请第一次使用这个插件的用户参考教程设置，购物盒子自带前端用户注册、登录和个人中心，需要初始化手动设置之后才能生效。</strong></p>
<p><strong>注意，现在分类目录模板的“图片列表（大图一栏）”和“大图文列表”支持商品模式！ 内页的两个产品模板支持商品模式！</strong></p>

  <b class="bt">社区内页模板选择</b>
               <p>开启社区功能之后，默认是内页模板《默认模板》你可以在这里选择全屏一栏模板</p>
              <?php $bbs_mo =get_option('mytheme_bbs_mo') ?>
              <p>
            <label  for="bbs_mo ">社区模板选择:</label>
                  <select name="bbs_mo" id="bbs_mo">
                   <option value=''<?php if ( $bbs_mo ==="" ) {echo "selected='selected'";}?>>默认模板</option>
                    <option value='none'<?php if ( $bbs_mo ==="none" ) {echo "selected='selected'";}?>>一栏模板</option>
	             </select>  

 </div>

 <div class="xiaot">
 
              <b class="bt">多重筛选模块功能控制</b>
               <p>多重筛选模块，添加了这个模块请在菜单的“<strong>搜索菜单（搜索和标签页面显示）</strong>”中按照要求建立好菜单，教程请看：<a target="_blank" href="http://www.themepark.com.cn/wordpressdzsxgnjs.html">WEB主题公园多筛选功能教程</a></p>
              <?php $list_nmber_nav =get_option('mytheme_list_nmber_nav') ?>
              <p>
            <label  for="list_nmber_nav ">是否显示多重筛选:</label>
                  <select name="list_nmber_nav" id="list_nmber_nav">
                   <option value=''<?php if ( $list_nmber_nav ==="" ) {echo "selected='selected'";}?>>显示</option>
                    <option value='none'<?php if ( $list_nmber_nav ==="none" ) {echo "selected='selected'";}?>>不显示</option>
	             </select>  
</p>

<p>多重筛选结果模板选择<strong>[小贴士：可以进行多重筛选的分类目录最好统一使用一个分类目录模板，并且你可以在下方指定多重筛选结果模板，将这些需要进行多重筛选的页面统一模板，这样多重筛选将会更加统一规范，给用户带来更加专业的感受！]</strong></p>
<p><?php $tags_m= get_option('mytheme_tags_m');  ?>  
 <label  for="tags_m">多重筛选结果模板选择（搜索结果和标签结果显示模式）:</label>
                  <select name="tags_m" id="tags_m">
                   <option value=''<?php if ( $tags_m ==="" ) {echo "selected='selected'";}?>>默认模板</option>
                    <option value='category-pic_001_full'<?php if ( $tags_m ==="category-pic_001_full" ) {echo "selected='selected'";}?>>横向图片列表（大图一栏）</option>
                    <option value='category-pic_002_full'<?php if ( $tags_m ==="category-pic_002_full" ) {echo "selected='selected'";}?>>横向图片列表（大图两栏）</option>
                   
                      <option value='category-pic_003_full'<?php if ( $tags_m ==="category-pic_003_full" ) {echo "selected='selected'";}?>>竖向小图的图片列表（两栏）</option>
                    <option value='category-pic_004_full'<?php if ( $tags_m ==="category-pic_004_full" ) {echo "selected='selected'";}?>>竖向小图的图片列表（一栏）</option>
                    <option value='category-pic_text'<?php if ( $tags_m ==="category-pic_text" ) {echo "selected='selected'";}?>>大图文列表</option>
                 
                       <option value='category-text'<?php if ( $tags_m ==="category-text" ) {echo "selected='selected'";}?>>纯文字列表</option> 
                       <option value='category-fang'<?php if ( $tags_m ==="category-fang" ) {echo "selected='selected'";}?>>正方形列表</option>
	             </select>  

</p>
     <p><?php $tags_moshi= get_option('mytheme_tags_moshi');  ?>  
 <label  for="tags_moshi">多重筛标签筛选模式选项:</label>
                  <select name="tags_moshi" id="tags_moshi">
                   <option value=''<?php if ( $tags_moshi ==="" ) {echo "selected='selected'";}?>>并集</option>
                    <option value='jiao'<?php if ( $tags_moshi ==="jiao" ) {echo "selected='selected'";}?>>交集</option>
                   
	             </select> <br />
 
<em>选择标签并集之后，比如筛选两个标签，那么只要文章拥有其中一个标签就会显示，选择标签越多，显示文章越多，选择标签交集，比如选择2个标签，那么文章必须带有这2个标签才会显示，标签选择越多，文章显示越少</em>
</p>         

  <p><?php $shaixuancat= get_option('mytheme_shaixuancat');  ?>  
 <label  for="shaixuancat">多重筛选清空返回分类:</label>
                  <select name="shaixuancat" id="shaixuancat">
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
					if ( $shaixuancat== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
                   
	             </select> <br />
 
<em>当所有筛选结果清空之将会跳转的分类，如果不设置则跳转首页</em>
</p>       





  <p><?php $stickys= get_option('mytheme_stickys');  ?>  
 <label  for="tags_moshi">置顶是否显示“推荐”图标:</label>
                  <select name="stickys" id="stickys">
                   <option value=''<?php if ( $stickys ==="" ) {echo "selected='selected'";}?>>显示</option>
                    <option value='jiao'<?php if ( $stickys ==="jiao" ) {echo "selected='selected'";}?>>不显示</option>
                   
	             </select> <br />
 
<em>主题在1.08版本增加了置顶功能，现在WordPress默认的置顶会优先显示在列表的最前面，并默认显示“推荐”字样的小图标，你可以选择显示或者不显示，如果你想要更改小图标，可以在自定义css中id为tuijian_loop的css类添加自己的样式。（默认为css类，我们为你预留了id类以覆盖。）</em>
</p>        
              </div>
 
               
                <div class="up">
                 
                     
                    <b class="bt">ICO图标上传</b>
                    <input type="text" size="80"  name="ico" id="ico" value="<?php echo get_option('mytheme_ico'); ?>"/>   
                    <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                    <p><a href="http://www.themepark.com.cn/icotpssmrhzzicowj.html" target="_blank">ico是什么？ico图片制作教程</a></p>
                </div>     
                
                        
                
     
              
                              
   
             
                
                
                <div class="up">
                    <b class="bt">自定义样式</b>
                    <textarea name="zdycss" cols="86" rows="3" id="zdycss"><?php echo stripslashes(get_option('mytheme_zdycss')); ?></textarea>   
                    <p>你可以在此处自定义某些样式，直接输入css样式代码即可发送到网站顶部以实现（注意！这个样式在网站所有的状态和页面均可实现，包括移动版）</p>
                </div>   
              
              
              
              <div class="up">
                 
                     
                    <b class="bt">横向滚动时是否自动播放</b>
                    <input type="text" size="80"  name="heng_gun" id="heng_gun" value="<?php echo get_option('mytheme_heng_gun'); ?>"/>   
                   
                    <p>填写数字，1则一秒滚动一次，不填写则不自动滚动</p>
                </div>   
     
    </div>
    
                 
            
            
            
           
                   
                         
           
                   
                     