<?php 
	$counter = 0;
	require_once("twitteroauth/twitteroauth.php");
	$consumer_key = "xNmveqgGppTMpT5TJt33OBUFg";
	$consumer_secret = "ob0EaHfuwtG7ZFMWvUvFOkfzBkYIZ6EonRZA88oYJJJ5bAQNEL";
	$access_token = "1691902524-fPZSJWW4VJgvtsQ5PUsxDoR6fdBpCXIsj14DdXw";
	$access_token_secret = "uKXMzYlaYwy2YL1FNClCbMx7xwYYLQenobGDXzYUxvVmE";

	$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

	//$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=%23trump&since%3A2018-04-30&result_type=recent&lang=en&include_entities=true&count=500');
	$tweets = $twitter->get('search/tweets',array('q' => '@AJArabic', 'count' => 500,'result_type' => 'recent', 'since' => '2018-04-30', 'include_entities' => 'true'));
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" http-equiv="refresh" content="5">
		<title>Twitter COUNTER</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<style>
		</style>
	</head>
	
	<body class="tbody">
		<center>
			<h1>see your tweet in the stream LIVE!!</h1><br><br><span data-shadow-text="Text-Shadow">@AJArabic</span><br>
		</center><br>

	<?php 
		if(isset($tweets->statuses)) { 
			foreach ($tweets->statuses as $key => $tweet) { 
				$counter++ 
	?>
    <blockquote class="twitter-tweet" lang="en"><br><img src="<?=$tweet->user->profile_image_url;?>" />&mdash;<?=$tweet->user->name; ?><br><p><?=$tweet->text; ?></p></blockquote>
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
	<?php } } ?>
	<center><br>Counts to <?php echo $counter; ?></center>

	</body>
</html>