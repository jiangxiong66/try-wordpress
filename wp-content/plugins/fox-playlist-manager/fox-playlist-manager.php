<?php
/*
Plugin Name: Fox Audio Player
Description: Fox Audio Player WP插件为网站创建无限的音频播放列表。
Plugin URI: http://www.wpzt.cn/fox-audio-player.shtml
Author: Aive Team
Author URI: http://www.wpzt.cn
Version: 2.0
*/
if ( version_compare(PHP_VERSION, '5.3', '>') && version_compare(PHP_VERSION, '5.4', '<')){
  require_once( plugin_dir_path( __FILE__ ) . 'class-player-3.php');
}elseif ( version_compare(PHP_VERSION, '5.4', '>') && version_compare(PHP_VERSION, '5.5', '<')){
  require_once( plugin_dir_path( __FILE__ ) . 'class-player-4.php');
}elseif ( version_compare(PHP_VERSION, '5.5', '>') && version_compare(PHP_VERSION, '5.6', '<')){
  require_once( plugin_dir_path( __FILE__ ) . 'class-player-5.php');
}elseif ( version_compare(PHP_VERSION, '5.6', '>') && version_compare(PHP_VERSION, '5.7', '<')){
  require_once( plugin_dir_path( __FILE__ ) . 'class-player-6.php');
}