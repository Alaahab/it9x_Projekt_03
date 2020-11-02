<?php

use Application\Database;

require '../application/Autoload.php';
Application\Autoload::register();


if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}


$db = new Database('trainingplan');

ob_start();
if ($p === 'home') {
    require '../pages/home.php';
} elseif ($p === 'article') {
    require '../pages/single.php';
}


$content = ob_get_clean();
require '../pages/templates/default.php';