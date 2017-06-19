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
	
	
	 $wp_customize->add_setting('mytheme_move_logo', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
         
    ));
      $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_move_logo', array(
        'label'    => __('移动版logo（若不上传继承pc版本）', 'mytheme_move_logo'),
        'section'  => 'mytheme_detects_scheme',
        'settings' => 'mytheme_move_logo',
     )
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
	
	  $wp_customize->add_setting('mytheme_detects_drop', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_detects_drop', array(
        'label'      => __('是否显示直向的导航项目', 'mytheme_detects_drop'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_detects_drop',
		'type'    => 'select',
		 'description' => '如果你的导航有的有子栏目，那么他们会折叠显示直向（一行一个），若数量上市奇数，那么会显示的不对其，你可以选择这里统一显示一栏一个的方式对齐他们。',
		 'choices'    => array(
            '' => '默认样式',
            'yes' => '一行一个',
           
        ),
    )); 
	
 $wp_customize->add_setting('mytheme_move_nav_img', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
         
    ));
      $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_move_nav_img', array(
        'label'    => __('移动版的背景图片（只对手机有效）', 'mytheme_move_nav_img'),
        'section'  => 'mytheme_detects_scheme',
        'settings' => 'mytheme_move_nav_img',
     )
    )); 
	

	 $wp_customize->add_setting('mytheme_move_nav2_img', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
         
    ));
      $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_move_nav2_img', array(
        'label'    => __('移动版导航的背景图片（由于移动版的特殊性，请上传一张能够平铺的图片）', 'mytheme_move_nav2_img'),
        'section'  => 'mytheme_detects_scheme',
        'settings' => 'mytheme_move_nav2_img',
     )
    )); 

		 $wp_customize->add_setting('mytheme_move_nav3_img', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
         
    ));
      $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_move_nav3_img', array(
        'label'    => __('移动版导航下拉菜单的背景图片（由于移动版的特殊性，请上传一张能够平铺的图片）', 'mytheme_move_nav3_img'),
        'section'  => 'mytheme_detects_scheme',
        'settings' => 'mytheme_move_nav3_img',
     )
    )); 
	
		
	  $wp_customize->add_setting('mytheme_3d_open', array(
        'default'        => 'value1',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_3d_open', array(
        'label'      => __('移动版导航顶部图标字体颜色', 'mytheme_3d_open'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_3d_open',
		'type'    => 'select',
		 'choices'    => array(
            'value1' => '默认白色',
            'value2' => '黑色字体',
			
           
        ),'description' => '你可以选择移动版顶部图标和字体是什么颜色，若背景是黑色（默认黑色半透明），那么选择默认，若背景是浅色，可选深色字体和图标',
    )); 
	
	
		 $wp_customize->add_setting('mytheme_navm_title', array(
	    'default'        => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_navm_title', array(
        'label'    => __('导航的主标题颜色', 'extraordinaryvision'),
         'section'  => 'mytheme_detects_scheme',
        'settings' => 'mytheme_navm_title',
    )));
	
	 $wp_customize->add_setting('mytheme_navm_title2', array(
	    'default'        => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mytheme_navm_title2', array(
        'label'    => __('导航的副题颜色', 'extraordinaryvision'),
         'section'  => 'mytheme_detects_scheme',
        'settings' => 'mytheme_navm_title2',
    )));	
	

	
	
	    $wp_customize->add_setting('mytheme_move_tel_name', array(
        'default'        => '电话',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_tel_name', array(
        'label'      => __('电话（按钮名称）', 'mytheme_move_tel_name'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_tel_name',
		'description' => '此处以及以下选项为手机版底部图标名称，你可以替换掉他们，以两个字为最佳，若需要不显示文字而显示纯图标，可以填写空格.',
    ));
	
	
	    $wp_customize->add_setting('mytheme_tell', array(
        'default'        => '0731-8578****',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_tell', array(
        'label'      => __('电话号码', 'mytheme_tell'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_tell',
		'description' => '填写电话号码',
    ));
	
	
	   $wp_customize->add_setting('mytheme_move_mail_name', array(
        'default'        => '邮箱',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_mail_name', array(
        'label'      => __('邮箱（按钮名称）', 'mytheme_move_mail_name'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_mail_name',
		
    ));
	
	
	   $wp_customize->add_setting('mytheme_mail', array(
        'default'        => '****@themepark.com.cn',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_mail', array(
        'label'      => __('邮箱地址', 'mytheme_mail'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_mail',
		
    ));
	
	
	   $wp_customize->add_setting('mytheme_move_qq_name', array(
        'default'        => '客服',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_qq_name', array(
        'label'      => __('客服（按钮名称）', 'mytheme_move_qq_name'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_qq_name',
		
    ));
	
	   $wp_customize->add_setting('mytheme_QQ', array(
        'default'        => '客服代码',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_QQ', array(
        'label'      => __('客服代码', 'mytheme_QQ'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_QQ',
		'description' => '进入qq互联或者其他skype等软件，获取代码，填写herf=里面的url，注意不要复制所有代码填写在此处，如不明白请咨询客服或者查看教程',
    ));
	
	
	   $wp_customize->add_setting('mytheme_move_wixin_name', array(
        'default'        => '微信',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_wixin_name', array(
        'label'      => __('微信（按钮名称）', 'mytheme_move_wixin_name'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_wixin_name',
		
    ));
	
	 $wp_customize->add_setting('mytheme_wixin', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
         
    ));
      $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_wixin', array(
        'label'    => __('请上传二维码图片', 'mytheme_wixin'),
        'section'  => 'mytheme_detects_scheme',
        'settings' => 'mytheme_wixin',
     )
    )); 
	
	
	   $wp_customize->add_setting('mytheme_move_nav_name', array(
        'default'        => '菜单',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_nav_name', array(
        'label'      => __('菜单(按钮名称)', 'mytheme_move_nav_name'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_nav_name',
		'description' => '点击按钮就会弹出菜单（移动版中）',
    ));
	
	
		
	   $wp_customize->add_setting('mytheme_move_my_name', array(
        'default'        => '我的',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_my_name', array(
        'label'      => __('我的（按钮名称）', 'mytheme_move_my_name'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_my_name',
		'description' => '安装购物盒子插件之后，点击这个按钮可以登录，登录之后可以进入个人中心和购物车',
    ));
	
	
	   $wp_customize->add_setting('mytheme_move_close_name', array(
        'default'        => '关闭',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_move_close_name', array(
        'label'      => __('关闭（按钮名称）', 'mytheme_move_close_name'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_move_close_name',
		
    ));
	
	
};
add_action('customize_register', 'mytheme_move_opion');		
?>