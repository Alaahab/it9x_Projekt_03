<?php


namespace Application\Table;


use Application\App;

class Category  extends Table
{

    protected static $table = 'sportcategory';

    public function getURL() {
        return 'index.php?p=category&id=' . $this->id;
    }


}