<?php include_once('class/User.php'); ?>
<?php echo "This is the main page."; ?>
<?php
$user = new User(1,'John','idk');
$user->setName('Carl');
echo $user->getName();
?>