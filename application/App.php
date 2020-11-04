<?php


namespace Application;


class App
{

    public $title = 'TrainingTagBuch';

    private static $_instance;

//    private static $title = 'TraingsTagbuch';
//
//    public static function getDb() {
//
//        if (self::$database === null) {
//
//            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_HOST, self::DB_PASSWORD );
//        }
//
//        return self::$database;
//
//    }
//
//    public static function notFound() {
//        header("HTTP/1.0 404 Not Found");
//        header('Location:index.php?p=404');
//    }
//
//    public static function getTitle() {
//
//        return self::$title;
//    }
//
//    public function setTitle($title) {
//
//        self::$title = $title;
//    }
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }

        return self::$_instance;

    }


}