<?php
namespace Application\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity{

    public function getUrl() {
        return 'index.php?p=posts.show&id=' . $this->id;
    }

    public function getExtract() {
        $html = '<p>' . substr($this->content, 0, 250) . '...</p>';
        $html .= '<button class="btn btn-info pull-right"><a style="text-decoration: none; color: white" href="' . $this->getURL() . '"> READ MORE </a></button>';

        return $html;
    }

}
?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">