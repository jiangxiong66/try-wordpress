<?php function shop_comment_zdy(){
	
$base_name = plugin_basename( __FILE__ );
$base_page = 'admin.php?page='.$base_name;
	
$themepark_comment_c = get_option('themepark_comment_c');	
	if($_POST['Submit2']) {
	$themepark_comment_c1111=trim($_POST['themepark_comment_c']);
	update_option('themepark_comment_c', $themepark_comment_c1111 );
	
	
	}
	
if($_POST['Submit']) {
	
	$themepark_comment_cs  = trim($_POST['themepark_comment_c1']).'|'. trim($_POST['themepark_comment_c2'])."|". trim($_POST['themepark_comment_c3'])."|". trim($_POST['themepark_comment_c4']);;
	
	if(!$themepark_comment_c){$themepark_comment_css=$themepark_comment_cs;}
	else{
		$themepark_comment_css= $themepark_comment_c."\n".$themepark_comment_cs;
		
		}
		$update_ali_queries = array();
	$update_ali_text    = array();
		
	 $update_ali_queries[] =update_option('themepark_comment_c', $themepark_comment_css );
	$i = 0;
	$text = '';
	foreach($update_ali_queries as $update_ali_query) {
		if($update_ali_query) {
			$text .= '<font color="green">'.$update_ali_text[$i].' 更新成功！</font><br />';
		}
		$i++;
	}
	if(empty($text)) {
		$text = '<font color="red">您对设置没有做出任何改动...</font>';
	}

	 
	 
	}	
	
	
	
	
	 ?>


<div class="wrap">
<?php if(!empty($text)) { echo '<!-- Last Action --><div id="message" class="updated fade"><p>'.$text.'</p></div>'; } ?>
 <h3>购物盒子评论生成器</h3>
 
   <div id="message" class="updated fade"><p>自定义评论生成器，你可以生成一些评论代码，复制粘贴到相应的文章评论代码下，一行一条评论，这样可以让你的一些没有购买记录的商品具有评论属性，从而增加用户的购买。
  <br />
在下面设置之后即可获得评论，你也可以根据现有评论代码直接修改填写。以|分开，第一个数据为评论人名称（中英文皆可），第二个数据为星级评价等级（纯数字），第三个数据为评价内容<br />
<a href="http://www.themepark.com.cn/?p=8179&preview=true" target="_blank">点击此处查看评论生成和应用的详细教程【点击弹出】</a><p></div>  


<form method="post" action="<?php echo admin_url('admin.php?page=shop_comment_zdy') ?>" style="width:70%;float:left;">


       <table class="form-table">
          
       
    
    
    
    
    
    
      <tr>
                <td valign="top" width="200px"><strong>评论人姓名</strong><br />
                </td>
                <td>
                 <input type="text" size="60"  name="themepark_comment_c1" id="themepark_comment_c1" value=""/>
                </td>
            </tr>
    
    
     <tr>
                <td valign="top" width="200px"><strong>评论时间（格式如：2016-8-22）</strong><br />
                </td>
                <td>
                 <input type="text" size="60"  name="themepark_comment_c2" id="themepark_comment_c2" value=""/>
                </td>
            </tr>
    
    
     <tr>
                <td valign="top" width="200px"><strong>评分星级</strong><br />
                </td>
                <td>
                 <select id="themepark_comment_c3" name="themepark_comment_c3">
                  <option value ="5" >5星</option>
                    <option value ="4" >4星</option>
                      <option value ="3" >3星</option>
                        <option value ="2" >2星</option>
                          <option value ="1" >1星</option>
        
                </select>
                </td>
            </tr>
    
    
      <tr>
                <td valign="top" width="200px"><strong>评论</strong><br />
                </td>
                <td>
                <textarea name="themepark_comment_c4" cols="60" rows="3" id="themepark_comment_c4"></textarea> 
                </td>
            </tr>
    
    
    
    
    
    
            
    </table>
        <br /> <br />
        <table> <tr>
        <td><p class="submit">
            <input type="submit" name="Submit" value="保存设置" class="button-primary"/>
            </p>
        </td>

        </tr> </table>


</form>
<form method="post" action="<?php echo admin_url('admin.php?page=shop_comment_zdy') ?>" style="width:70%;float:left;">
<table>

<tr>
	
      <tr>
        
        <td>
        <p>请注意保存的按钮是保存不同的内容的，请注意区分=========================================</p>      
           
        </td>

        </tr>
        
       
        
 <tr>
	
      <tr>
         <td valign="top" width="200px"><strong>调整顺序，这里你可以看到你所创建的表单类型，你可以通过剪切复制来调整他们的上下位置。</strong><br />
                </td>
        <td>
              <textarea name="themepark_comment_c" cols="86" rows="4" id="themepark_comment_c"><?php echo stripslashes(get_option('themepark_comment_c')); ?></textarea>    
           
        </td>

        </tr>
     <tr>
        <td><p class="submit3">
            <input type="submit" name="Submit2" value="保存顺序" class="button-primary"/>
            </p>
        </td>

        </tr>
        </table>
   </form>
 
 
</div>

<?php } ?>