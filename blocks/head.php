<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php printPageTitle(); ?></title>
	<meta name="description" content="<?php echo META_DESCRIPTION; ?>" />
	<meta name="author" content="<?php echo META_AUTHOR; ?>" />
	<meta http-equiv="content-language" content="<?php echo CONTENT_LANGUAGE; ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo PAGE_FAVICON; ?>" />
	<link rel="icon" type="image/x-icon" href="<?php echo PAGE_FAVICON; ?>" />
	<?php foreach(getCSSLibraries() as $path) : ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $path; ?> ">
	<?php endforeach; ?>
	<link rel="stylesheet" type="text/css" href="<?php echo getMainCSS() ?>">
	<?php foreach(getJSLibraries() as $path) : ?>
	<script type="text/javascript" src="<?php echo $path; ?>"></script>
	<?php endforeach; ?>
	<script type="text/javascript" src="<?php echo getMainJS() ?>"></script>
</head>
<?php flush(); ?>
<body>