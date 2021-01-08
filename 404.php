<?php
include(__DIR__ . "/content.php");
include(__DIR__ . "/code.php");
?>

<!doctype html>
<html class="no-js" lang="<?php echo $_SESSION['lang'] ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo($contentText["applicationName"][$lang]) ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/404.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    </head>
    <body class="bg-purple">

        <div class="stars">
            <div class="central-body">
                <img class="image-404" src="/img/404/404.png" width="300px">
                <a href="/<?php echo $_SESSION['lang'] ?>" class="btn-go-home"><?php echo($contentText["goBack"][$lang]) ?></a>
            </div>
            <div class="objects">
                <img class="object_rocket" src="/img/404/rocket.svg" width="40px">
                <div class="earth-moon">
                    <img class="object_earth" src="/img/404/earth.svg" width="100px">
                    <img class="object_moon" src="/img/404/moon.svg" width="80px">
                </div>
                <div class="box_astronaut">
                    <img class="object_astronaut" src="/img/404/astronaut.svg" width="140px">
                </div>
            </div>
            <div class="glowing_stars">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>

            </div>

        </div>

    </body>
</html>
