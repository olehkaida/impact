<?php
# Database Configuration
define( 'DB_NAME', 'local' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );
define( 'DB_HOST_SLAVE', '127.0.0.1:3306' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '|kJ0*~~&`KL<kw+gp/qb)AK0/<mI1H`C/+-<Zy=v8?OW?3u6k]A^Lm&Q3ft?OW?=');
define('SECURE_AUTH_KEY',  '$-n}8tIK1- }->HS+!.TaA*wkZ~>%SN&8c9@^1u)a|%$+pz,E|[#%,d{jQ`me/w$');
define('LOGGED_IN_KEY',    'Ykc-C2]3:JZ<WgaUttoug!CIjOm8d#QMbqCX*<>sxPj>urW}38U}&D[Abcv>V->A');
define('NONCE_KEY',        '6ng_eLQnZs$}X NX!d2dfk`Nv3GSf)kow9?F<GC`Z ![Cwo#OMrXleMpyO;I9BA.');
define('AUTH_SALT',        '|qVJ3|=M>6[l;F0}+G/<Md=@*h9$c}buM;gcpFT!An+fH.w6znsO{@+|Yu#6qo(:');
define('SECURE_AUTH_SALT', 'sl[3yXjel[(H*{!*9S!*``0ZmW&,hs~ K=NIpBQ*LgG|gKNGEoy!Ui$_7G1+;A#l');
define('LOGGED_IN_SALT',   'BPvP?y&QDt+;u&T8^]Dv/,,NV/P{jou[+O6vs9o<~F|R]JvV(@S|i2?$wK*;2Ry~');
define('NONCE_SALT',       'mf;u0~w$7t9A/dJ7eHSLXtO.rTs9O$j.9*0<f,VzdSLgOVm@4ND[|d)Dk=T-,RE@');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'impactmstg' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'WPE_APIKEY', 'f83064e0451e0ba2a709c737dcadc6e9917cee99' );

define( 'WPE_CLUSTER_ID', '140987' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_SFTP_ENDPOINT', '' );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'impactmstg.wpengine.com', 1 => 'impactmstg.wpenginepowered.com', );

$wpe_varnish_servers=array ( 0 => 'pod-140987', );

$wpe_special_ips=array ( 0 => '34.69.87.234', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');
