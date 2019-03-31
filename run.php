<?php
require_once('./twitteroauth/twitteroauth.php');

/* Config */
$ck = 'ISI_DISINI'; //CONSUMER_KEY
$cs = 'ISI_DISINI'; //CONSUMER_SECRET
$ot = 'ISI_DISINI'; //OAUTH_TOKEN
$ots = 'ISI_DISINI'; ////OAUTH_TOKEN_SECRET
$tweet = 'MRT'; //Keyword tweet yang dicari

$connection = new TwitterOAuth($ck, $cs, $ot, $ots);
$get = $connection->get('https://api.twitter.com/1.1/search/tweets.json?q='.$tweet);
foreach($get['statuses'] as $status){
	$tanggal = $status['created_at'];
	$statuses = $status['text'];
	$retweet = $status['retweet_count'];
	$fav = $status['favorite_count'];
	if(!empty($status['place']['full_name'])){
		$lokasi = $status['place']['full_name'];
	} else {
		$lokasi = "GADA";
	}
	
	
	echo "Tweet : ".$statuses."<br>
	Tanggal : ".$tanggal."<br>
	RT : ".$retweet."<br>
	FAV : ".$fav."<br>
	Lokasi : ".$lokasi."<br><br>";
}

/*echo "<pre>";
print_r($get);
echo "</pre>";*/
?>
