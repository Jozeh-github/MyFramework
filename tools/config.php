<?php
/* Website main info */
define('SITE_NAME', 'Framework');
define('CONTENT_LANGUAGE', 'en');
define('META_DESCRIPTION', 'My own framework');
define('META_AUTHOR', 'Jos&eacute;');
define('PAGE_FAVICON', '');

/* General path definitions */
define('PATH_REL', '/framework/');
define('PATH_ABS', 'http://localhost'.PATH_REL);

/* Website resources path definitions */
define('PATH_LIBS_JS', serialize(array(
	'//ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools-yui-compressed.js'
)));
define('PATH_LIBS_CSS', serialize(array(
	'//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,700,600'
)));
define('PATH_PAGE_CSS', 'css/styles.php');
define('PATH_PAGE_JS', 'js/scripts.php');

/* Inner page custom data */
define('PAGE_NAME', serialize(array(
	'main' => 'main',
	'client-register' => 'clientRegister',
)));
define('PAGE_TITLE', serialize(array(
	'main' => 'Bienvenido!'
)));

/* Database configuration variables */
define('DB_TYPE_LIST', serialize(array(
	'mysql' => 'MySQL',
	'oracle' => 'Oracle',
	'sqlserver' => 'MsServer',
	'postgres' => 'PostgreSQL',
	'db2' => 'Db2'
)));
define('DB_HOST', 'localhost');
define('DB_SCHEMA', 'db_test');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_TYPE', 'mysql');

/* Blocks variables */
define('BLOCK_HEAD', 'head');
define('BLOCK_HEADER', 'header');
define('BLOCK_FOOTER', 'footer');
define('BLOCK_FOOT', 'foot');
?>