<?php

namespace Libs\Controllers;

use Libs\Traits\Messages;
use Libs\Traits\Telegram;

class Callback
{
    use Messages;

    /**
     * @var string
     */
    protected static $name;

    /**
     * @var int
     */
    protected static $id;

    /**
     * @var string
     */
    protected static $message;
    protected static $idToSend;

    /**
     * @param string $name - Имя собеседника
     * @param integer $id - ID собеседника
     */
    public function __construct($id, $name, $message)
    {
        self::$id = $id;
        self::$name = $name;
        self::$message = $message;
    }

    /**
     * Инициация работы с ответом
     * @return void
     */
    public static function init()
    {
        Messages::getAnswer(self::$id, self::$name, self::$message);
    }
}