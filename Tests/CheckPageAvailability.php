<?php

// Search config
$url = "http://google.fr";
$str = "google";

// Mail config
$from = "server@example.com";
$to = array("to1@example.com", "to2@example.com");

// Mail content
$title = "Alerte sur $url";
$content = "Bonjour,<br>La phrase \"$str\" n'as pas été trouvée sur l'url \"$url\"";

// Get url content
$content = file_get_contents($url);

// Check if page contains str
if (strpos($content, $str) === false) {
	
	// Create header
	$headers = "From: " . $from . "\r\n";
	$headers .= "CC: ". implode(",", $to) . "\r\n";

	// Send mail to alert
	mail(null, $title, $content, $headers);
	
	echo "String [$str] was not found\n";

} else {
	
	echo "Found [$str] in $url\n";
}
