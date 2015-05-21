<?php
require_once("reddit.php");
$reddit = new reddit();

$reddit->addComment($_POST['name'], $_POST['comment']);
header('Location: Index.php');
?>
		
	