<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?>
<label class="hidden" for="page_template">内页模版选择</label>
<?php if ( $templates ) : ?>

	<input type="hidden" name="custom_post_template_present" value="1" />
	<select name="custom_post_template" id="custom_post_template">
		<option 
			value='default'
			<?php
				if ( ! $custom_template ) {
					echo "selected='selected'";
				}
			?>><?php _e( 'Default Template' ); ?></option>
		<?php foreach( $templates AS $filename => $name ) { ?>
			<option 
				value='<?php echo $filename; ?>'
				<?php
					if ( $custom_template == $filename ) {
						echo "selected='selected'";
					}
				?>><?php echo $name; ?></option>
		<?php } ?>
	</select>

	<p><?php printf( __( '请选择内页主题模版，如果你不清楚模版的样式，请进入 <a href="%s" target="_blank">WEB主题公园官网</a> 查看此主题的详细介绍，结合主题演示，您可以更加清楚了解模版的样式', 'custom-post-templates' ), 'http://www.themepark.com.cn/' ); ?></p>

<?php else : ?>

	<p><?php printf( __( 'This theme has no available <a href="%s" target="_blank">custom post templates</a>.', 'custom-post-templates' ), 'http://wordpress.org/extend/plugins/custom-post-template/' ); ?></p>

<?php endif; ?>