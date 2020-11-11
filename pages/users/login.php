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
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    <form method="post" class="form-signin">
                        <div class="form-label-group">
                            <?= $form->input('username', 'pseudo'); ?>
                        </div>

                        <div class="form-label-group">
                            <?= $form->input('password', 'Password', ['type' => 'password']); ?>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>