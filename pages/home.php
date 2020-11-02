

    <?php use Application\App;
    use Application\Table\Article;
    use Application\Table\Category;

    ?>
    <div class="row">
        <div class="col-sm-8">

            <?php foreach (Article::getLast() as $post): ?>


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


