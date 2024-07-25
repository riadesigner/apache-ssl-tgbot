<?php

function send_telegram($method, $data, $token, $headers = []){
	$curl = curl_init();
	curl_setopt_array($curl, [
		CURLOPT_POST => 1,
		CURLOPT_HEADER => 0,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'https://api.telegram.org/bot' . $token . '/' . $method,
		CURLOPT_POSTFIELDS => json_encode($data, JSON_UNESCAPED_UNICODE),
		CURLOPT_HTTPHEADER => array_merge(["Content-Type: application/json"])
	]);
	$result = curl_exec($curl);
	curl_close($curl);
	return (json_decode($result, true) ?: $result);
}

function glog($msg, $script_file="", $pre="gLog:"){		
    $name = "log_dev_";
    $path = __DIR__."/logs/".$name.'_'.date('Y_m_d').'.log';		
    if (!file_exists($path)) { touch($path); }
    $log = date('Y-m-d H:i:s') . " $pre $msg";
    if(!empty($script_file)) $log = $log.", FILE: ".$script_file;
    file_put_contents($path, $log . PHP_EOL, FILE_APPEND);
}	


?>