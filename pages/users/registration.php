<?php


use Core\HTML\BootstrapForm;

$registration = App::getInstance()->getTable('User');
if (!empty($_POST['username']) && !empty($_POST['vorname']) && !empty($_POST['nachname']) && !empty($_POST['password']) && !empty($_POST['confirmpassword']) && !empty($_POST['email']) && !empty($_POST['sex'])) {
    if ($_POST['password'] === $_POST['confirmpassword']) {
        $result = $registration->create([
            'username' => $_POST['username'],
            'vorname' => $_POST['vorname'],
            'nachname' => $_POST['nachname'],
            'password' => sha1($_POST['password']),
            'confirmpassword' => sha1($_POST['confirmpassword']),
            'email' => $_POST['email'],
            'sex' => $_POST['sex']
        ]);
        header('Location: index.php?p=login');
    } else {
        ?>
        <div class="alert alert-danger">
            Falsch Password
        </div>
        <?php
    }

} else {
    ?>
    <div class="alert alert-danger">
        Alle Felder soll auffüllen
    </div>
    <?php
}

$form = new BootstrapForm($_POST);
$sex = array(0 => '',
             1 => 'Mann',
             2 => 'Frau');
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<script>
    $('.fixed-top').css({
    'display' : 'none'
    });
</script>
<body>
<style>
    body {
        /*background-image: url("../public/image/sport-im-park-hp.jpg");*/
        /*background-repeat: no-repeat;*/
    }
</style>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="" alt=""/>
                        <h1>Willkommen</h1>
                        <h4>Training Tag Buch</h4>
                        <p>
                            <a href="?p=login"><input type="submit" value="Login"/></a>
                        </p>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Herzlich Willkomen</h3>
                                <form method="post">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?= $form->input('vorname', 'vorname'); ?>
                                        </div>
                                        <div class="form-group">
                                            <?= $form->input('email', 'email'); ?>
                                        </div>

                                        <div class="form-group">
                                            <?= $form->input('password', 'password', ['type' => 'password']); ?>
                                        </div>


                                        <div class="form-group">
                                            <div class="maxl">
                                                <?= $form->select('sex', 'sex', $sex); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?= $form->input('nachname', 'nachname'); ?>
                                        </div>
                                        <div class="form-group">
                                            <?= $form->input('username', 'pseudo'); ?>
                                        </div>
                                        <div class="form-group">
                                            <?= $form->input('confirmpassword', 'confirmpassword', ['type' => 'password']); ?>
                                        </div>


                                        <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                                </form>
                            </div>
                </div>
            </div>
</body>