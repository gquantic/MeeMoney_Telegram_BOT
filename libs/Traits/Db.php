<?php

namespace Libs\Traits;

trait Db
{
    public static function query($query)
    {
        global $dbConfig;
        $connect = mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['password'], $dbConfig['database']);
        return mysqli_query($connect, $query);
    }
}