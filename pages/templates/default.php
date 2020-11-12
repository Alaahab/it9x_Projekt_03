
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="generator" content="Jekyll v4.1.1">
    <title><?= App::getInstance()->title; ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">


    <div  style="margin: 0" class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Forum </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?p=training">Meine Statistik </a>
            </li>
            <li style="position: relative; left: 400%;" class="nav-item active">
                <a class="nav-link" href="index.php?p=login">Sign out</a>
            </li>

        </ul>

    </div>
</nav>

<main role="main" class="container">

    <div class="starter-template" style="padding-top: 100px">
        <?= $content; ?>
    </div>

</main><!-- /.container -->
</html>
