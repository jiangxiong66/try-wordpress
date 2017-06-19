<?php
function mytheme_footer_options($wp_customize){
		$wp_customize->add_section('mytheme_footer_options', array(
        'title'    => __('网站底部设置', 'mytheme'),
        'description' => '设置您的网站底部的样式和内容</br>  <a href="http://www.themepark.com.cn" target="_blank">WEB主题公园开发提供</a>  </br>',
        'priority' => 80,
    ));



 $wp_customize->add_setting('mytheme_tell_name', array(
        'default'        => '联系我们<br />contact',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_tell_name', array(
        'label'      => __('联系我们的文字', 'mytheme_tell_name'),
        'section'    => 'mytheme_footer_options',
        'settings'   => 'mytheme_tell_name',
		'description' => '填写联系我们和contact us，空行用<br>分开',
    ));

 $wp_customize->add_setting('mytheme_tell', array(
        'default'        => ' ',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_tell', array(
        'label'      => __('电话号码', 'mytheme_tell'),
        'section'    => 'mytheme_footer_options',
        'settings'   => 'mytheme_tell',
		'description' => '主叫号码，手机版点击直接拨号的号码',
    ));
	
	
	$wp_customize->add_setting('mytheme_tell2', array(
        'default'        => ' ',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_tell2', array(
        'label'      => __('电话号码2', 'mytheme_tell2'),
        'section'    => 'mytheme_footer_options',
        'settings'   => 'mytheme_tell2',
    ));
	
	
	   $wp_customize->add_setting('mytheme_mail_name', array(
        'default'        => ' ',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_mail_name', array(
        'label'      => __('电子邮箱名称', 'mytheme_mail_name'),
        'section'    => 'mytheme_footer_options',
        'settings'   => 'mytheme_mail_name',
    ));
    $wp_customize->add_setting('mytheme_mail', array(
        'default'        => '电子邮箱',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_mail', array(
        'label'      => __('电子邮箱', 'mytheme_mail'),
        'section'    => 'mytheme_footer_options',
        'settings'   => 'mytheme_mail',
    ));
	
	
	
	
	
	    $wp_customize->add_setting('mytheme_QQ_name', array(
        'default'        => '在线客服',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_QQ_name', array(
        'label'      => __('QQ客服', 'mytheme_QQ_name'),
        'section'    => 'mytheme_footer_options',
        'settings'   => 'mytheme_QQ_name',
		
    ));
	
	
	    $wp_customize->add_setting('mytheme_QQ', array(
        'default'        => ' ',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_QQ', array(
        'label'      => __('QQ客服', 'mytheme_QQ'),
        'section'    => 'mytheme_footer_options',
        'settings'   => 'mytheme_QQ',
		'description' => '进入这个网站或者qq客服链接：http://connect.qq.com/intro/wpa',
    ));
	


	
	    $wp_customize->add_setting('mytheme_box_pic_n', array(
        'default'        => '关注微信',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_box_pic_n', array(
        'label'      => __('关注微信', 'mytheme_box_pic_n'),
        'section'    => 'mytheme_footer_options',
        'settings'   => 'mytheme_box_pic_n',
		
    ));

  $wp_customize->add_setting('mytheme_footer_box3_pic', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_footer_box3_pic', array(
        'label'    => __('二维码上传', 'mytheme_footer_b'),
        'section'  => 'mytheme_footer_options',
        'settings' => 'mytheme_footer_box3_pic',
		'description' => '上传一个正方形的图片，最合适的尺寸是120*120，可以是你的微信公众号',
     )
    )); 
	 
	 


	
};
add_action('customize_register', 'mytheme_footer_options');
?>