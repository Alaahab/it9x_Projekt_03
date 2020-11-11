<?php

//use Application\App;
//use Application\Database;
//use Core\Table;

define('ROOT', dirname(__DIR__));


require ROOT . '/application/App.php';
App::load();


if(isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'home';
}

ob_start();
if ($page === 'home') {
    require ROOT . '\pages\posts\home.php';
} elseif ($page === 'posts.category') {
    require ROOT . '\pages\posts\category.php';
}elseif ($page === 'posts.show') {
    require ROOT . '\pages\posts\show.php';
}
elseif ($page === 'login') {
    require ROOT . '\pages\users\login.php';
}
elseif ($page === 'registration') {
    require ROOT . '\pages\users\registration.php';
}
elseif ($page === 'training') {
    require ROOT . '/pages/users/TrainingstagebuchNew.php';
}

elseif ($page === 'admin.post.add') {
    require ROOT . '\pages/admin/posts/addPost.php';
}

$content = ob_get_clean();
require  ROOT . '/pages/templates/default.php';
