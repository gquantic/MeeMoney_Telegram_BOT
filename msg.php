<?php

// https://api.telegram.org/bot123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11/getMe

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once 'config.php';

use Libs\Controllers\Callback;

# Messages get
$data = json_decode(file_get_contents('php://input'), true);
file_put_contents($dump_file, "data:" . file_get_contents('php://input') . "\n", FILE_APPEND);

# Обрабатываем ручной ввод или нажатие на кнопку
$data = $data['callback_query']  ? $data['callback_query'] : $data['message'];

//$data['text'] = $_GET['text'];

# Записываем сообщение в нижнем регистре
$message = strtolower(($data['text'] ? $data['text'] : $data['data']));

$callback = new Callback($data['from']['id'], $data['from']['first_name'], $message);

$callback::init();