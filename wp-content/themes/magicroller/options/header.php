<?php
function mytheme_header_options($wp_customize){
		$wp_customize->add_section('mytheme_header_options', array(
        'title'    => __('网站顶部设置', 'mytheme'),
        'description' => '通过这个选项设置顶部的样式和内容</br>  <a href="http://www.themepark.com.cn" target="_blank">WEB主题公园开发提供</a>',
        'priority' => 60,
    ));

	class Ari_Customize_Textarea_Control extends WP_Customize_Control {
  public $type = 'textarea';
  public function render_content() {

 ?>
  <label>
    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value()); ?></textarea>
  </label>
  <p></p>
<?php 
  }
}


	class Ari_Customize_fengexian_Control extends WP_Customize_Control {
  public $type = 'fengexian';
  public function render_content() {

 ?>
 <div style="width:100%; background:#333; margin:15px 0; height:1px;"></div>
  
<?php 
  }
}


  $wp_customize->add_setting('mytheme_logo', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mytheme_logo', array(
        'label'    => __('logo上传[尺寸高度：73px，宽度不要超过200px]', 'mytheme_logo'),
        'section'  => 'mytheme_header_options',
        'settings' => 'mytheme_logo',
     )
    )); 


   $wp_customize->add_setting('mytheme_nav_updown', array(
        'default'        => 'value1',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_nav_updown', array(
        'label'      => __('顶部导航默认状态', 'mytheme_nav_updown'),
             'section'  => 'mytheme_header_options',
        'settings'   => 'mytheme_nav_updown',
		'type'    => 'select',
		 'choices'    => array(
            'value1' => '默认完全打开示',
            'value2' => '默认仅显示图标',
			'value3' => '默认折叠不显示',
			'value4' => '停止动画（默认打开）',
			
           
        ),'description' => '注意，这个选项只能针对pc版和平板电脑，手机版由于整体高度较小，所以菜单默认是折叠的。',
    )); 

	
	 $wp_customize->add_setting('mytheme_product_name', array(
        'default'        => '产品目录',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_product_name', array(
        'label'      => __('产品目录', 'mytheme_product_name'),
             'section'  => 'mytheme_header_options',
        'settings'   => 'mytheme_product_name',
		'description' => '产品目录菜单，会显示一个可以放置较多内容的菜单，若不想要显示这个菜单，填写1即可',
    ));
	
	
   
};
add_action('customize_register', 'mytheme_header_options');
?>