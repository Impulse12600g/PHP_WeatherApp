<?php
	//Replace xxxx with your own key in the following url
	$location =
	'https://api.openweathermap.org/data/2.5/weather?q=,US&units=imperial&appid=xxxxxxxxx';
	$news_contents = file_get_contents ($location);
	$json = json_decode ($news_contents, true);
	
	//Display current weather
	echo '<p>Current Temperature: ' . $json['main']['temp'] . '</p>';
	echo '<p>Humidity: ' . $json['main']['humidity'] . '</p>';
	echo '<p>Condition: ' . $json['weather'][0]['description'] . '</p>';
	
	//Extract image
	$imagecode =  $json['weather'][0]['icon'];
	$image_url = 'http://openweathermap.org/img/wn/' . $imagecode . '.png';
	$image = file_get_contents($image_url);
	
	//Save it on local drive
	file_put_contents ('images/image.png', $image);
	//Display image
	echo '<img style="border:10px solid black;" src="images/image.png" width="300" height="300" />';
	
?>/.,