<?php


$post = $db->prepare('SELECT * FROM article WHERE id = ?', [$_GET['id']],'Application\Table\Article', true);

?>

<h1><?= $post->title; ?></h1>

<p><?= $post->content ?></p>


