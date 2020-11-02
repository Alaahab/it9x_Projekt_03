<?php

use Application\App;
use Application\Table\Category;
use Application\Table\Article;

$post = Article::find($_GET['id']);
if ($post === false) {
    App::notFound();
}

App::setTitle($post->title);

?>

<h1><?= $post->title; ?></h1>


<p><em><?= $post->category; ?></em></p>

<p><?= $post->content ?></p>


