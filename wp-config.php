<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'bdm246300342_db');

/** MySQL数据库用户名 */
define('DB_USER', 'bdm246300342');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'china102');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'A5~fl01d{O_GM2ouh+qwM||$8Inx]P#~35nztzm^ld7:W}$O]ElU&6Y]L(5?P~S,');
define('SECURE_AUTH_KEY',  'x*|ml~nVm8uv[2#)W{ti8w^;Q x<499/d)d>.H1_sPbffTJiAr-xcFT1.mHgwUM)');
define('LOGGED_IN_KEY',    '}R-B+QdmUL-5E:X )Qmm^BAPvC6.O9`8W7c>8po#B[a1w9r2MY=Vtx_&b|b=F@_P');
define('NONCE_KEY',        'HTNIaQ3oz*O)JNM2Nqc0U+V[?w?keL;^pCWop%}|,.J` #MJp4QRw.yYMk+by{0 ');
define('AUTH_SALT',        'bwh:R1}=]Sf+2q0fl(51qzvNvutfQ|68B8&MCsphsFa^{iw^deedc<[adhY/?C#U');
define('SECURE_AUTH_SALT', 'PF3PS04* R[vpFKngN3HyXn|yeU}+l*0yMB7nomLx5b<9!l#19 0NY`kiKU1QUlM');
define('LOGGED_IN_SALT',   'aS $(k+L9f0)SyN&59l3GVknD{,/):FruFaF#=|5U6P7)N]aqnKm|)$aM;[+Q /g');
define('NONCE_SALT',       'i@(!Y +/M]* CJJ+9Yp&jRf!j)y+)_t`3~B6Mhh4vLgG}bd/I]e$F9}e#$ds5DN%');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
/** 修复插件代码 */
define('WP_ALLOW_REPAIR', true);
