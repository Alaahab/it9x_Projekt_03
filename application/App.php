<?php

use Core\Config;
use Core\Database\MysqlDatabase;

class App
{

    public $title = 'TrainingTagBuch';

    private $db_instance;

    private static $_instance;

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }

        return self::$_instance;

    }

    public static function load() {

        session_start();
        require ROOT . '/application/Autoload.php';
        Application\Autoload::register();
        require ROOT . '/core/Autoload.php';
        Core\Autoload::register();
    }

    public function getTable($name) {

        $class_name = '\\Application\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    public function getDb() {
        $config = Config::getInstance(ROOT . '/config/config.php');

        if (is_null($this->db_instance)) {

            return new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_host'), $config->get('db_password'));
        }

        return $this->db_instance;


    }

    public function forbidden() {
        header('HTTP/1.0.403 Forbidden');
        die('Acces interdit');
    }

    public function notFound() {
        header('HTTP/1.0 404 Not Found');
        die('Page not Found');
    }


}