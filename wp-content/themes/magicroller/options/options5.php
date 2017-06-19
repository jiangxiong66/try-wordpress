
<div class="xiaot">
 <b class="bt">移动版菜单设置</b>
 <p>
<?php 	
$menus_move =get_option('mytheme_menus_move') ;

$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) ); ?>
   <label for="menus_move">选择一个菜单</label>
			<select id="menus_move" name="menus_move">
				<option value="">默认移动版继承pc版导航</option>
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $menus_move, $menu->term_id, false )
					. '>'. esc_html( $menu->name ) . '</option>';
			}
		?>
			</select>
            </p>
<p>你可以在此处选择一个移动版的菜单，这可以覆盖掉默认继承的pc版导航菜单，选择好菜单你就可以独立设置移动版的菜单了</p>

<p>全新的移动设备兼容系统，可以让你的首页无差别实现移动设备兼容，你可以在外观--自定义---小工具中设置模块是否在移动版中显示。这样可以大大增加网站编辑的效率</p>


</div>
