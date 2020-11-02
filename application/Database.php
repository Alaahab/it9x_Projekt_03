<?php

namespace Application;
use \PDO;

/**
 * Class Database
 *
 * @package Application
 */

class Database {

    private $db_name;
    private $db_user;
    private $db_password;
    private $db_host;
    private $pdo;

    /**
     * Database constructor.
     *
     * @param string $db_name
     * @param string $db_user
     * @param string $db_password
     * @param string $db_host
     */

    public function __construct($db_name = 'trainingplan', $db_user = 'root', $db_password = '', $db_host='localhost') {

        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_host = $db_host;
        $this->db_password = $db_password;

    }

    /**
     * @return PDO
     */

    private function getPDO() {

        if ($this->pdo === null) {

            $pdo = new PDO('mysql:dbname=trainingplan;host=localhost', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    /**
     * @param $statement
     *
     * @return array
     */

    public function query($statement, $class_name, $one = false) {

        $request = $this->getPDO()->query($statement);

        $request->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ($one) {
            $data = $request->fetch();
        } else {

            $data = $request->fetchAll();
        }


        return $data;

    }

    /**
     * @return mixed
     */
    public function prepare($statment, $attributes, $class_name,$one = false)
    {
        $request = $this->getPDO()->prepare($statment);
        $request->execute($attributes);

        $request->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ($one) {
            $data = $request->fetch();
        } else {

            $data = $request->fetchAll();
        }

        return $data;

    }
}