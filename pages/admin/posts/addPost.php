<?php
use Core\HTML\BootstrapForm;

$postTable = App::getInstance()->getTable('Post');
if (!empty($_POST)) {
    $result = $postTable->create([
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'category_id' => $_POST['category_id'],
            'user_id' => $_SESSION['auth'],
            'date' => date('Y-m-d H:i:s'),
    ]);

    if ($result) {
        ?>
            <div class="alert alert-success"> Good </div>
        <?php
    }
}

$categorys = App::getInstance()->getTable('Category')->extract('id', 'title');
$form = new BootstrapForm($_POST);


?>


<form method="post">
    <?= $form->input('title', 'Post title'); ?>
    <?= $form->input('content', 'Content', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'category',  $categorys); ?>
    <button class="btn btn-primary">Speichern</button>
</form>
