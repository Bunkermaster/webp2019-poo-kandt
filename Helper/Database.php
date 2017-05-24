<?php

namespace Bunkermaster\Helper;

/**
 * Class Database
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Bunkermaster\Helper
 */
class Database
{
    private static $db = null;

    public static function get()
    {
        if (is_null(self::$db)) {
            try {
                self::$db = new \PDO(
                    'mysql:host='.APP_DB_HOST.';dbname='.APP_DB_NAME.';port='.APP_DB_PORT,
                    APP_DB_USER,
                    APP_DB_PSWD
                );
                self::$db->exec("SET NAMES UTF8");
            } catch (\PDOException $exception) {
                die("Argghhhhhh mamannnnn... X_x");
            }
        }

        return self::$db;
    }
}
