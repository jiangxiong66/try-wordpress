$(document).ready(function(){ 



$("body").on("click",'.smiley_btn',function(data){ $('.smiley_kuang').fadeIn(600)});
$("body").on("click",'.smiley_close_btn',function(data){$(this).parent('span').parent('.smiley_kuang').fadeOut(600)});
$("body").on("click",'.img_c_btn',function(data){ 
var img_html = '<img src="填写图片地址" alt="link_pic"  />';
 var str = $('#comment_ajax').val() + img_html;
 $('#comment_ajax').val(str);

});


$("body").on("click",'#submit_ajax',function(data){	
if($('#author').val()==''){ alert("用户名必填！");return false }
if($('#email').val()==''){ alert("电子邮箱必填！"); return false}
if($('#comment_ajax').val()==''){ alert("请填写留言内容！"); return false}

$(this).next('.ajax_loading').fadeIn(600); 
var options = {
	    
	    success: function() {
	     
              $('.ajax_loading').fadeOut(600);
			
			  var link =$('#url_ajax').attr('href');
			    $('#commentlist').load(link + ' .commentlist', function(){ $('.commentlist').fadeIn(1000); });
				 $('#previous_ajax').load(link + ' .previous_ajax', function(){ $('.previous_ajax').fadeIn(1000); });
				  $('#commentform_out').load(link + ' #commentform', function(){ $('#commentform').fadeIn(1000); });
	    },
		error: function() { 
		   
		  alert("请勿重复提交留言！"); return false;
		   $('.ajax_loading').fadeOut(600);               
		 } 
		};

$("form#commentform").ajaxForm(options);


});



	var form_ajax =$('#commentform_out').html();
	var locationurl = window.location.href;


$("body").on("click",'.caser_reply',function(data){  
$(this).parent('#commentform').remove();   
$('#commentform_out').append(form_ajax );

 });
	
$('.commentlist li div span a.hfpl').each(function() {

$("body").on("click",'.hfpl',function(data){	
		$('#commentform_out').html('');
		$('#url_ajax').attr('href',locationurl);
     $('.commentlist').find('#commentform').remove();
	
	 $(this).fadeOut(0);
	 $('.hfpl').fadeIn(0)
	$(this).parent('span').parent('#ajax_commont_tex_li').append(form_ajax );
	$('#comment_parent').val($(this).attr('rel'));
	

	
	
	 });
    
});


});