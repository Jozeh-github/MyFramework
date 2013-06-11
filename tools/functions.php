<?php
function makeRelPath($file) {
	return PATH_REL.$file;
}
function makeAbsPath($file) {
	return PATH_ABS.$file;
}
function checkActualPage($page) {
	global $actualPage, $pageTitle;
	if(!isset($page)) $page = 'main';
	$output = unserialize(PAGE_NAME);
	$actualPage = $output[$page];
	$output = unserialize(PAGE_TITLE);
	$pageTitle = $output[$page];
}
function getActualPage() {
	global $actualPage;
	return $actualPage;
}
function showActualPage() {
	global $actualPage;
	include_once('pages/'.$actualPage.'.php');
}
function loadActualPage() {
	global $actualPage;
	header('Location:'.makeRelPath('pages/'.$actualPage.'.php'));
}
function loadPage() {
	global $actualPage;
	header('Location:'.makeRelPath('pages/'.$actualPage.'.php'));
}
function checkSession() {
	if(!isset($_SESSION) && session_id() == '') {
		session_start();
	}
}
function setContentType($type) {
	header('Content-type:'.$type);
}
function printPageTitle() {
	global $pageTitle;
	echo isset($pageTitle) ? $pageTitle : SITE_NAME;
}
function getConnectionLibrary() {
	$dbTypes = unserialize(DB_TYPE_LIST);
	require_once('class/'.$dbTypes[DB_TYPE].'.php');
}
function getConnectionObject() {
	$connectionObject = NULL;
	$dbTypes = unserialize(DB_TYPE_LIST);
	eval('$connectionObject = new '.$dbTypes[DB_TYPE].';');
	return $connectionObject;
}
function getJSLibraries() {
	return unserialize(PATH_LIBS_JS);
}
function getCSSLibraries() {
	return unserialize(PATH_LIBS_CSS);
}
function getMainJS() {
	return makeRelPath(PATH_PAGE_JS);
}
function getMainCSS() {
	return makeRelPath(PATH_PAGE_CSS);
}
function importClass($className) {
	include_once('class/'.$className.'.php');
}
function substringBetween($string, $leftLimit, $rightLimit) {
	$il = strpos($string, $leftLimit, 0) + strlen($leftLimit);
	$ir = strpos($string, $rightLimit, $il);
	return substr($string, $il, ($ir-$il));
}
function getBlock($block) {
	$blockToInclude = trim(strtolower($block));
	include('blocks/'.$blockToInclude.'.php');
}
?>