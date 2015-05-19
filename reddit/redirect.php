<?php
require_once("reddit.php");
$reddit = new reddit("redditprojector", "password");


$user = $reddit->getUser();
$listing = $reddit->getListing("funny", 3);
$subscriptions = $reddit->getSubscriptions();

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