<?php


namespace Application\Table;


use Core\Table\Table;

class DailydataTable extends Table
{

    protected $table = 'dailydata';

    /**
     * @param $id
     * @param $date
     *
     * @return mixed
     */

    public function findUserData($id, $date) {

        return $this->query("SELECT * FROM {$this->table} WHERE user_id = ? AND date = '$date'", [$id], true);
    }

    /**
     * @param $id
     * @param $date
     *
     * @return mixed
     */

    public function distanceSum($id, $date) {

        return $this->query("SELECT sum(entfernung) as distance FROM {$this->table} WHERE user_id = ? AND date = '$date'", [$id], true);
    }
    /**
     * @param $id
     * @param $date
     *
     * @return mixed
     */

    public function timeSum($id, $date) {

        return $this->query("SELECT sum(zeit) as time FROM {$this->table} WHERE user_id = ? AND date = '$date'", [$id], true);
    }


}