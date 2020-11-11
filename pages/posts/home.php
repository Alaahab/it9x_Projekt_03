

    <?php use Application\App;
    use Application\Table\Article;
    use Application\Table\Category;
    ?>
    <p>
        <a href="?p=admin.post.add" class="btn btn-success">Add Post</a>
    </p>

    <div class="row">
        <div class="col-sm-8">

                <?php foreach (\App::getInstance()->getTable('Post')->last() as $post): ?>

                    <h2><a href="<?= $post->url ?>"><?= $post->title; ?></a></h2>
                    <p><em> <?= $post->catergory; ?></em></p>
<!--                    <p><strong>Author: </strong><em> --><?//= $post->user; ?><!--</em></p>-->

                    <p><?= $post->extract ?></p>

                    <hr>

                <?php endforeach; ?>


        </div>

        <div class="col-sm-4">

            <ul>

                <?php foreach (\App::getInstance()->getTable('Category')->all() as $category): ?>

                    <li><a href="<?= $category->url; ?>"><?= $category->title; ?></a></li>

                <?php endforeach; ?>

            </ul>


        </div>

    </div>


