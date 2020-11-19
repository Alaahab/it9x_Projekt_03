<?php

namespace Application\Table;
use Core\Table\Table;

class UserTable extends Table
{

    protected $table = "users";

    /**
     * @param $id
     *
     * @return mixed
     */

    public function userName($id) {

        return $this->query(" SELECT users.vorname, users.nachname
        From users
        
        WHERE users.id = ?
        
       ", [$id], true);

    }

}