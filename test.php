<?php
ini_set('display_errors', true);
require_once('TwitterAPIExchange.php');
 
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "1729028328-rarbqo5pDcyO5PX9h8aFTomld1nCUdgCiZNZ2ss",
    'oauth_access_token_secret' => "CBg7OaDOSzoomjmxWLdV5yPH2zJpbJrY5b8C1da7nOUCw",
    'consumer_key' => "zMeHTzkP104RxBAL6oqAyqabA",
    'consumer_secret' => "jNs6ReLrho3QH9lSOm48C0KQkahCrdv6zE58Isw1irWyC4SlpZ"
);
 
$url = "https://api.twitter.com/1.1/friends/list.json";
 
$requestMethod = "GET";
 
$getfield = '?screen_name=vijay08159801&count=100';
 
$twitter = new TwitterAPIExchange($settings);
$twitter_json=$twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
			 
			 $array_json = json_decode($twitter_json, true);
			 $array_count=count($array_json['users']);
			 
			 
			echo "<h1>You are following to :</h1>";
			 
			 for($i=0;$i<$array_count;$i++)
			 {
			 $array_image=$array_json['users']["$i"]['profile_image_url'];
			 echo "<img src=".$array_image.">";
			 }
			 
			 
			 
			 
			 echo "<h1>Total count of following :</h1>";
			 
			 
			 echo "<h2 style='background-color:#D8D8D8;padding:10px;border:2px solid blue;'>I am following to <span style='color:red;'>".$array_count."</span> people on twitter</h2>";
			 
			 
			 /*get tweets */
			 $url_1 = "https://api.twitter.com/1.1/statuses/user_timeline.json";
 
			$twitter = new TwitterAPIExchange($settings);
			$twitter_json_1=$twitter->setGetfield($getfield)
             ->buildOauth($url_1, $requestMethod)
             ->performRequest();
			 
			 
			 $array_json_1 = json_decode($twitter_json_1, true);
			 $array_count_1=count($array_json_1);
			 
			 echo "<h1>Your tweets are :</h1>";
			 
			 for($i=0;$i<$array_count_1;$i++)
			 {

			 $array_tweets=$array_json_1["$i"]['text'];
			 echo "<p style='color:white;background-color:black;padding:7px;'>$array_tweets</p>";
			 }
			 
			 
			 
			
			 
			 
			 

			 
			 

			 
?>

<h1>Twitter button for follow:</h1>

<a href="https://twitter.com/vijay08159801" class="twitter-follow-button" data-show-count="false"></a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

<?php


			 

?>