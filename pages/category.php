<?php

use Application\App;
use Application\Table\Article;
use Application\Table\Category;

$category = Category::find($_GET['id']);

if ($category === false) {
    App::notFound();
}

$article = Article::lastByCategory($_GET['id']);

$categorys = Category::all();

?>

<h1><?= $category->title; ?> </h1>
<div class="row">
    <div class="col-sm-8">

        <?php foreach ($article as $post): ?>


            <h2><a href="<?= $post->url ?>"><?= $post->title; ?></a></h2>
            <p><em> <?= $post->category; ?></em></p>

            <p><?= $post->extract ?></p>


        <?php endforeach; ?>

    </div>

    <div class="col-sm-4">

        <ul>

            <?php foreach (Category::all() as $category): ?>

                <li><a href="<?= $category->url; ?>"><?= $category->title; ?></a></li>

            <?php endforeach; ?>

        </ul>


    </div>

</div>
