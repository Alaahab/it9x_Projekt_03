<?php


namespace Application\Table;


use Core\Table\Table;

class ZieldataTable extends Table
{

    protected $table = "zieldata";

    public function zielUserData($id) {

        return $this->query("SELECT * FROM {$this->table} WHERE user_id = ? ", [$id], true);
    }

}