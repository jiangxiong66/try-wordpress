<?php
function mytheme_move_opion($wp_customize){
	
	  $wp_customize->add_section('mytheme_detects_scheme', array(
        'title'    => __('移动设备设置', 'mytheme'),
        'description' => ' 请注意！开启移动设备调试时，<strong>请使用非ie核心的浏览器</strong>，如火狐、谷歌，使用ie核心的浏览器（如360、uc等使用ie方式浏览）将无法正确显示</br>  <a href="http://www.themepark.com.cn" target="_blank">WEB主题公园开发提供</a>  </br>',
        'priority' => 79,
    ));
	
	 
	   $wp_customize->add_setting('mytheme_detects', array(
        'default'        => 'value1',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_detects', array(
        'label'      => __('开启移动端调试（手机）', 'mytheme_detects'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_detects',
		'type'    => 'select',
		 'choices'    => array(
            'value1' => '默认显示pc端效果',
            'value2' => '开启手机端显示效果',
			
           
        ),
    )); 
	
	
	
	   $wp_customize->add_setting('mytheme_detects_nav', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_detects_nav', array(
        'label'      => __('是否独立定制手机版导航', 'mytheme_detects_nav'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_detects_nav',
		'type'    => 'select',
		 'description' => ' 选择独立定制之后请去菜单新建一个菜单，并且勾选移动版菜单即可',
		 'choices'    => array(
            '' => '继承pc导航',
            'yes' => '独立定制（请去菜单设置）',
           
        ),
    )); 
	
	
	  $wp_customize->add_setting('mytheme_footer_open', array(
        'default'        => 'value1',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_footer_open', array(
        'label'      => __('手机端底部图标导航', 'mytheme_footer_open'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_footer_open',
		'type'    => 'select',
		 'choices'    => array(
            'value1' => '默认显示',
            'value2' => '缩进',
			
           
        ),'description' => '手机端是显示的一个图标导航，默认是开启的，如果你想要他缩进，那么可以选择这个选项',
    )); 
	
	
	
		
	  $wp_customize->add_setting('mytheme_3d_open', array(
        'default'        => 'value1',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_3d_open', array(
        'label'      => __('开启3D效果', 'mytheme_3d_open'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_3d_open',
		'type'    => 'select',
		 'choices'    => array(
            'value1' => '默认关闭',
            'value2' => '开启',
			
           
        ),'description' => '只有手机端能够开启3D翻页效果，但是请注意，3D效果对访问者的硬件要求较高，目前测试对于双核浏览器的手机有较为流畅的效果（iphone4s/iphone5以上设备流畅、在低配置手机会有卡顿的情况出现，是否开启3d效果请视您的用户群体而定，若用户群体定位为高端用户，可以开启，不确定的情况下不推荐开启3D效果）',
    )); 
	
	
	
	
	
	    $wp_customize->add_setting('mytheme_move_tel_name', array(
        'default'        => '电话',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_tel_name', array(
        'label'      => __('电话', 'mytheme_move_tel_name'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_tel_name',
		'description' => '此处以及以下选项为手机版底部图标名称，你可以替换掉他们，以两个字为最佳，若需要不显示文字而显示纯图标，可以填写空格.',
    ));
	
	
	   $wp_customize->add_setting('mytheme_move_mail_name', array(
        'default'        => '邮箱',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_mail_name', array(
        'label'      => __('邮箱', 'mytheme_move_mail_name'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_mail_name',
		
    ));
	
	
	   $wp_customize->add_setting('mytheme_move_qq_name', array(
        'default'        => '客服',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_qq_name', array(
        'label'      => __('客服', 'mytheme_move_qq_name'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_qq_name',
		
    ));
	
	
	   $wp_customize->add_setting('mytheme_move_wixin_name', array(
        'default'        => '微信',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_wixin_name', array(
        'label'      => __('微信', 'mytheme_move_wixin_name'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_wixin_name',
		
    ));
	
	
	   $wp_customize->add_setting('mytheme_move_nav_name', array(
        'default'        => '菜单',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_nav_name', array(
        'label'      => __('菜单', 'mytheme_move_nav_name'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_nav_name',
		
    ));
	
	
		
	   $wp_customize->add_setting('mytheme_move_my_name', array(
        'default'        => '我的',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_my_name', array(
        'label'      => __('我的', 'mytheme_move_my_name'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_my_name',
		
    ));
	
	
	   $wp_customize->add_setting('mytheme_move_my_lague', array(
        'default'        => '语言',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_my_lague', array(
        'label'      => __('语言', 'mytheme_move_my_lague'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_my_lague',
		
    ));
	
	   $wp_customize->add_setting('mytheme_move_close_name', array(
        'default'        => '关闭',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_close_name', array(
        'label'      => __('关闭', 'mytheme_move_close_name'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_close_name',
		
    ));

	
	
};
add_action('customize_register', 'mytheme_move_opion');		
?>