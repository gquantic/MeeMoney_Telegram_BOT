<?php

// https://api.telegram.org/bot123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11/getMe

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once 'config.php';

# Messages get
$data = json_decode(file_get_contents('php://input'), true);
file_put_contents($dump_file, "data:" . print_r($data, 1) . "\n", FILE_APPEND);

# Обрабатываем ручной ввод или нажатие на кнопку
$data = $data['callback_query']  ? $data['callback_query'] : $data['message'];

# Записываем сообщение в нижнем регистре
$message = strtolower(($data['text'] ? $data['text'] : $data['data']), 'utf-8');