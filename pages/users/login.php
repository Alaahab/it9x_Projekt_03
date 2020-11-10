<?php

use Core\HTML\BootstrapForm;

if (!empty($_POST)) {
    $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
    if ($auth->login($_POST['username'], $_POST['password'])) {
        header('Location: index.php');
    } else {
        ?>

        <div class="alert alert-danger">
            false identifiant
        </div>


        <?php
    }
}

$form = new BootstrapForm($_POST)
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $('.fixed-top').css({
        'display' : 'none'
    });
</script>

<form method="post">
<?= $form->input('username', 'pseudo'); ?>
<?= $form->input('password', 'Password', ['type' => 'password']); ?>

    <button class="btn btn-primary">Send</button>


</form>
