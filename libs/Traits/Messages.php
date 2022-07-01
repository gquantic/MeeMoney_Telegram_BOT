<?php

namespace Libs\Traits;

use Libs\Traits\Telegram;
use Libs\Traits\Db;

trait Messages
{
    use Telegram, Db;

    /**
     * @param string $message - сообщение
     */
    public static function getAnswer($id, $name, $message)
    {
        $collection = json_decode(self::getCollection(), true);
        var_dump($collection);

        $query = Db::query("SELECT * FROM `tg_answers` WHERE `message` LIKE '%%$message%%'");

        if (mysqli_num_rows($query) > 0) {
            $queryFetched = mysqli_fetch_assoc($query);
            var_dump($queryFetched);

            self::send($id, $queryFetched['answer']);
        } else {
            self::send($id, "Я тебя не понял :(");
        }
    }

    private static function send($id, $message)
    {
        Telegram::init('sendMessage', [
            'chat_id' => $id,
            'text' => $message
        ]);
    }

    private static function getCollection()
    {
        return file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/extends/messages.json');
    }
}