<?php
require_once("reddit.php");
$reddit = new reddit();


$user = $reddit->getUser();
 
$listing = $reddit->getListing("test", 3);
$subscriptions = $reddit->getSubscriptions();

$reddit->addComment("t3_3615s3", "test comment");
//$reddit->addVote("t3_3615s3");

echo "<pre>";
print_r($user);
echo "</pre>";

echo "<pre>";
print_r($subscriptions);
echo "</pre>";

echo "<pre>";
print_r($listing);
echo "</pre>";


?>