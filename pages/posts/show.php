<?php

$app = App::getInstance();

$post = $app->getTable('Post')->readMore($_GET['id']);
if ($post === false) {
    $app->notFound();
}

//$app->title = $post->title;

foreach ($post as $item);


?>

<h1><?= $item->title; ?></h1>


<p><em><?= $item->catergory; ?></em></p>

<p><?= $item->content ?></p>


