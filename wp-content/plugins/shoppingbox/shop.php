<?php
/*
Plugin Name:购物盒子
Plugin slug :shoppingbox
Plugin URI:http://www.themepark.com.cn
Description:WEB主题公园为中文用户所开发的一款多功能免费插件，支持前端注册、登录，支持支付宝交易，货到付款交易，并加入邮费、折扣价格、商品属性、小型社区、以及ajax评论框等功能，可以建立小型问答社区与用户互动，使用完全使用中文国内本地化头像的免刷新评论系统，以及具有购物车功能的在线售卖系统。
Version: 1.64
Author: WEB主题公园
Author URI: http://www.themepark.com.cn
*/

/* plugin-update-checker */
session_start();
ob_start(); 
require 'plugin-updates/plugin-update-checker.php';
$MyUpdateChecker = new PluginUpdateChecker(
    'http://www.themepark.com.cn/upthemes_themepark/shoppingbox_up1/info.json',
    __FILE__,
    'shoppingbox'
);

include('login.php');
include('qq_login.php');
include('register.php');
if (!function_exists('add_action')) {
	$wp_root = '../../..';
	if (file_exists($wp_root.'/wp-load.php')) {
		require_once($wp_root.'/wp-load.php');
	} else {
		require_once($wp_root.'/wp-config.php');
	}
}
register_activation_hook(__FILE__, 'shoppingbox_activate');
add_action('admin_init', 'shoppingbox_redirect');
 
function shoppingbox_activate() {
    add_option('my_plugin_do_activation_redirect', true);
}
 
function shoppingbox_redirect() {
    if (get_option('my_plugin_do_activation_redirect', false)) {
        delete_option('my_plugin_do_activation_redirect');
        wp_redirect(admin_url('/admin.php?page=themes_sport' ));
		if ( function_exists( 'shoppingbox_theme_support()' ) ) {update_option('shop_style', $shop_style);}
    }
}
### Alipay Logs Table Name
global $wpdb;
$wpdb->alipay = $wpdb->prefix.'alipay';
 $shop_profile = get_option('shop_profile');
  $shop_login = get_option('shop_login');
  $hidden_login = get_option('hidden_login');
  $shop_pay_opens = get_option('shop_pay_opens');
### Function: Alipay Administration Menu
add_action('admin_menu', 'alipay_menu');
function alipay_menu() {
	if(function_exists('add_menu_page')) {
		add_menu_page('alipay', '交易中心', 'administrator', plugin_dir_path(__FILE__).'/alipay-settings.php', '', plugins_url('images/shop_icon.png', __FILE__ ));
	}
	if(function_exists('add_submenu_page')) {
	
		add_submenu_page(plugin_dir_path(__FILE__).'/alipay-settings.php', '在线交易设置','在线交易设置', 'administrator', plugin_dir_path(__FILE__).'/alipay-settings.php');
		add_submenu_page(plugin_dir_path(__FILE__).'/alipay-settings.php', '开放注册设置', '开放注册设置',  'administrator','shop_user', 'shop_user_opinion');
		add_submenu_page(plugin_dir_path(__FILE__).'/alipay-settings.php', '社区和社会化登录', '社区和社会化登录',  'administrator','shop_community', 'shop_community_opinion');
		if(!$shop_pay_opens){add_submenu_page(plugin_dir_path(__FILE__).'/alipay-settings.php', '订单中心', '订单中心',  'edit_posts','alipay_list', 'alipay_render_list_page');}
		add_submenu_page(plugin_dir_path(__FILE__).'/alipay-settings.php', '评论生成器', '评论生成器',  'administrator','shop_comment_zdy', 'shop_comment_zdy');
		add_submenu_page(plugin_dir_path(__FILE__).'/alipay-settings.php', '主题支持', '主题支持',  'administrator','themes_sport', 'themes_sport');
		
	}
}
include('functions.php');
include('wp-alipay.php');
include('orderlist.php');
include('cart.php');
include('my_bbs.php');
include('fogotpassword.php');
include('profiles.php');
include('edit_profile.php');

include('cat-bbs.php');

include('option/shop_user_opinion.php');
include('option/shop_community_opinion.php');
include('option/themes_sport.php');
include('post_bbs_page.php');
include('cat-bbs_sigon.php');

include('shopcommet/shop_comment.php');
include('page_bbs_open.php');
include('post_bush_page.php');
include('shop_comment_zdy.php');
?>