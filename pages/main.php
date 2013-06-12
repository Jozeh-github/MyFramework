<?php getClass('User'); ?>
<?php echo "This is the main page."; ?>
<?php
$user = new User(1,'John','idk');
$user->setName('Carl');
var_dump($user->getNamesList());
?>