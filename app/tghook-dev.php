<?php

require_once '../vendor/autoload.php';
require_once './common.php';

$parent = dirname(__DIR__);
$dotenv = Dotenv\Dotenv::createImmutable($parent);
$dotenv->load();



// получили сообщение
$data = json_decode(file_get_contents('php://input'), TRUE);

// сохранили в лог
$logMessage = print_r($data, 1);
if(!empty($logMessage))
glog("tg cart dev bot answer: ".print_r($data, 1),__FILE__);
else
glog("empty message",__FILE__);

// отправляем ответ
$keyboard = "";
$message = "555";
$tg_user_id = getenv("TG_USER_ID");
$tg_token = getenv("TG_BOT_TOKEN");		
$method = 'sendMessage';
$send_data = [
    "text" => $message,
    "parse_mode" => "Markdown",
    "chat_id" => $tg_user_id,
    "disable_web_page_preview" => true
];		
if(!empty($keyboard)){
    $send_data["reply_markup"] = $keyboard;
}

// $res = send_telegram($method, $send_data, $tg_token);


echo "ok777";



?>