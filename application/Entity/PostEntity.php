<?php
namespace Application\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity{

    public function getUrl() {
        return 'index.php?p=posts.show&id=' . $this->id;
    }

    public function getExtract() {
        $html = '<p>' . substr($this->content, 0, 250) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '"> see more </a></p>';

        return $html;
    }

}
