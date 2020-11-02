<?php


namespace Application;


class App
{

    const DB_NAME = 'trainingplan';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const DB_HOST = 'localhost';

    private static $database;
    private static $title = 'TraingsTagbuch';

    public static function getDb() {

        if (self::$database === null) {

            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_HOST, self::DB_PASSWORD );
        }

        return self::$database;

    }

    public static function notFound() {
        header("HTTP/1.0 404 Not Found");
        header('Location:index.php?p=404');
    }

    public static function getTitle() {

        return self::$title;
    }

    public function setTitle($title) {

        self::$title = $title;
    }


}