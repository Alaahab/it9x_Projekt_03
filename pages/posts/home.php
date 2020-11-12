

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
                    <p><strong>Author: </strong><em> <?= $post->user; ?></em><em style="float: right"> <?= $post->date; ?></em></p>

                    <p><?= $post->extract ?></p>

                    <hr>

                <?php endforeach; ?>


        </div>

        <div class="col-sm-4">

            <ul>

                <?php foreach (\App::getInstance()->getTable('Category')->all() as $category): ?>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="<?= $category->url; ?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><?= $category->title; ?></a>
                </div>
                <?php endforeach; ?>

            </ul>

        </div>

    </div>


