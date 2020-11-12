<?php

$app = App::getInstance();

$category = $app->getTable('Category')->find($_GET['id']);
if ($category === false) {
    $app->notFound();
}

$article = $app->getTable('Post')->find($_GET['id']);

$categorys = $app->getTable('Category')->all();
//var_dump($categorys);

?>
<?php foreach ($category as $item): ?>
<h1><?= $item->title ?> </h1>
<?php endforeach; ?>
<div class="row">
    <div class="col-sm-8">

        <?php foreach ($article as $post): ?>


            <h2><a href="<?= $post->url ?>"><?= $post->title; ?></a></h2>

            <p><?= $post->extract ?></p>


        <?php endforeach; ?>

    </div>

    <div class="col-sm-4">

        <ul>

            <?php foreach ($categorys as $category): ?>

                <li><a href="<?= $category->url; ?>"><?= $category->title; ?></a></li>

            <?php endforeach; ?>

        </ul>


    </div>

</div>
