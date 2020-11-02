<?php

namespace Application\Table;

class Article
{

    public function __get($key) {

        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();

        return $this->$key;
    }


    public function getURL() {
        return 'index.php?p=article&id=' . $this->id;
    }

    public function getExtract() {
        $html = '<p>' . substr($this->content, 0, 250) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '"> see more </a></p>';

        return $html;
    }

}