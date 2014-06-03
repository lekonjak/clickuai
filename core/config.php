<?php
/** General Config */
define('CONTROLLER','/controller/');
define('DIR_ADMIN','admin');
define('DATA_IMGS','/clickuai/data/images/');
define('VIEW','app/view/');
define('MODEL','app/model/');
define('ROOT','/clickuai/');
define('PAGINATION','20');
/** DB Connection Settings */
define('DB_DRIVER', 'pdo_mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'partyu');
define('DB_USER', 'root');
define('DB_PASSWORD', '71528860');
/** ORM Setup */
define('ENVIRONMENT', 'development');
$connections = array(
 	'development' => 'mysql://root:71528860@localhost/clickuai_dev',
 	'production' => 'mysql://root:71528860@localhost/clickuai',
 	'test' => 'mysql://root:71528860@localhost/clickuai_test'
 );
/** System defines */
define('SYSTEM_MAIL','contato@clickuai.com.br');
/** Smarty Framework Settings */
define('SMARTY_TEMPLATE', '/var/www/clickuai/app/view/theme/smarty');
define('SMARTY_TEMPLATE_C', '/var/www/clickuai/app/view/theme/smarty_c');
define('SMARTY_CACHE', '/var/www/clickuai/app/view/theme/cache');
define('SMARTY_CONFIG', '/var/www/clickuai/app/view/theme/config');
define('SMARTY_TEMPLATE_ADMIN', '/var/www/clickuai/app/admin/view/theme/elastic');
define('SMARTY_TEMPLATE_ADMIN_C', '/var/www/clickuai/app/admin/view/theme/elastic_c');
define('SMARTY_CACHE_ADMIN', '/var/www/clickuai/app/admin/view/theme/cache');
define('SMARTY_CONFIG_ADMIN', '/var/www/clickuai/app/admin/view/theme/config');
/** Backup Settings */
define("HAR_LOCK_TABLE",1);
define("HAR_FULL_SYNTAX",2); 
define("HAR_DROP_TABLE",4);
define("HAR_NO_STRUCT",8);
define("HAR_NO_DATA",16);
define("HAR_ALL_OPTIONS",HAR_LOCK_TABLE | HAR_FULL_SYNTAX | HAR_DROP_TABLE );

define("HAR_ALL_DB",1);
define("HAR_ALL_TABLES",1);

define('OS_Unix','u');
define('OS_Windows','w');
define('OS_Mac','m');

?>
