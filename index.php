<?php
require_once("reddit.php");
$reddit = new reddit();

//$reddit->addComment("t3_36libt", "another");

$user = $reddit->getUser();
$username = $user->name;

$subscriptions = $reddit->getSubscriptions();
$subscriptionCount = $subscriptions->data->children;

//echo $subscriptions->data->children[0]->data->display_name;

echo "Your subreddit Subscriptions:<br>";

for($i=0; $i<count($subscriptionCount); $i++){
	$subreddit = $subscriptions->data->children[$i]->data;
	$name = $subreddit->display_name;
	$url = $subreddit->url;
	$title = $subreddit->title;
	$description = html_entity_decode($subreddit->description_html);
	$subscribers = $subreddit->subscribers;


	?>
		
		<form action="index.php" method="post">
		<input type="hidden" name="subreddit" value="<?php echo $name; ?>">
		<input type="submit" name="submit" value="<?php echo $url; ?>: <?php echo $title; ?>">
		<h4><?php echo $description; ?></h4>
		<h5><?php echo $subscribers; ?> subscribers</h5>
		</form><br>

	<?php
}

if(isset($_POST['submit']))
{	
	$subreddit = $_POST['subreddit'];
	echo $subreddit;

	$listing = $reddit->getListing($subreddit, 10);
	$listingCount = $listing->data->children;
	
	for($j=0; $j<count($listingCount); $j++){
		$content = $listing->data->children[$j]->data;

		$title = $content->title;
		$url = $content->url;
		$author = $content->author;

		$text = html_entity_decode($content->selftext_html);
		$thumbnail = $content->thumbnail;
		if($thumbnail == "self"){
			$thumbnail = "https://c.thumbs.redditmedia.com/kbhF0cKlJ7BY4DGD.png";
		}
		$name = $content->name;


		?>
		
		<?php echo $name; ?>
		<br><br><img src="<?php echo $thumbnail; ?>"><br>
		<a href="<?php echo $url; ?>"><?php echo $title; ?>"</a><br>
		<h5>by <?php echo $author; ?></h5>
		<p><?php echo $text; ?></p>


		<form action="comment process.php" method="post">
		<input type="hidden" name="name" value="<?php echo $name; ?>">
		<input type="text" name="comment">
		<input type="submit" value="save">
		</form>
		<br><br><br>
			<?php

		


	}


	//echo $listing->data->children[1]->data->title;

	/*echo "<pre>";
	print_r($listing);
	echo "</pre>";
*/
/*title <a href="url">title</a>
author
selftext_html if null no box

thumbnail if  self mister reddit
url

name to comment*/


}

/*echo "<pre>";
print_r($user);
echo "</pre><br><br><br><br><br>";*/


/*echo "<pre>";
print_r($subscriptions);
echo "</pre>";*/


/*$title = "test of the ages";
$link = "http://www.example.com/";
$subreddit = "test";
$response = $reddit->createStory($title, $link, $subreddit);

*/

/*
//Comment List
$response = $reddit->getHistory($username, "comments");
echo "<pre>";
print_r($response);
echo "</pre>";
*/
?>