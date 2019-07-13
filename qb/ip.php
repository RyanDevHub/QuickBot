<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://whatismyip.org");
	curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:9050");
	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, 0);
	$response = curl_exec($ch);
	echo $response;
?>