<?php
require_once('tools/config.php');
require_once('tools/functions.php');
checkActualPage(@$_GET['page']);
getBlock(BLOCK_HEAD);
getBlock(BLOCK_HEADER);
showActualPage();
getBlock(BLOCK_FOOTER);
getBlock(BLOCK_FOOT);
?>