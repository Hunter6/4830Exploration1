<?php include "library/twitteroauth.php";?>
<?php 
	//apply for your api authorize information and fill them into the following variable
	$APIkey = "";
	$APIsecret="";
	$accesstoken="";
	$accesstokensecret="";
	
	$twitter= new TwitterOAuth($APIkey,$APIsecret,$accesstoken,$accesstokensecret);
?>
<html>
<head>
	<meta charset= "UTF-8"/>
	<title>Twitter_API_Test</title>
</head>
<body>
	<form action="" method="post">
	<label>Search users:<input type="text" name ="keyword"/><br></label>
	<?php
		if(isset($_POST['keyword'])){
			$tweets=$twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$_POST['keyword'].'&lang=tr&result_type=recent&count=50');
			foreach($tweets as $tweet){
				foreach($tweet as $t){
					echo '.<img src="'.$t->user->profile_image_url.'"/>  '.$t->text.'<br>';
				}
			}
		}
	?>
	</form>
</body>
</html>