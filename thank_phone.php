<?php
include(__DIR__ . "/content.php");
include(__DIR__ . "/code.php");
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang'] ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <title><?php echo($contentText["applicationName"][$lang]) ?></title>
    <link rel="stylesheet" href="/css/swiper.min.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/media.css">
    <script src="/js/jquery-3.0.0.min.js"></script>
    <script src="/js/swiper.min.js"></script>
    <script src="/js/script.js"></script>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header-wrap">
                <div class="header_star">
                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="21.7778" height="20" fill="url(#pattern0)" />
                        <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0" transform="translate(0 -0.0444444) scale(0.015625 0.0170139)" />
                            </pattern>
                            <image id="image0" width="64" height="64" xlink:href="data:image/png;base64,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" />
                        </defs>
                    </svg>
                    <span><?php echo $_SESSION['product'] ?></span>
                </div>
                <div class="header_logo">
                    <span class="logo"><?php echo($contentText["applicationName"][$lang]) ?></span>
                    <span class="sub"><?php echo($contentText["footerBrand"][$lang]) ?></span>
                </div>
                <div class="header_lang">
                    <a class="lang-link <?php if( $_SESSION['lang'] == 'ua') echo 'act'?>" href="/lang/ua" >UA</a>
                    <span>|</span>
                    <a class="lang-link <?php if( $_SESSION['lang'] == 'ru') echo 'act'?>" href="/lang/ru">RU</a>
                </div>
            </div>
        </div>
    </header>
    <div class="thank-sec">
        <div class="container">
            <div class="thank_wrap">
                <div class="tit"><?php echo($contentText["weReceivedRequest"][$lang]) ?>!</div>
                <div class="text">
                    <?php echo($contentText["requestWait"][$lang]) ?>
                </div>
                <div class="text3">
                    <div class="text-wrap">
                        <img src="/img/img-22.png" alt="">
                        <div class="text-right">
                            <p>
                                <?php echo($contentText["thanksText"][$lang]) ?>
                            </p>
                            <div class="strong"><?php echo($contentText["consultName"][$lang]) ?></div>
                            <div><?php echo($contentText["workingHours"][$lang]) ?></div>
                        </div>
                    </div>
                    <a href="/<?php echo $_SESSION['lang'] ?>/<?php echo $_SESSION['product'] ?>" class="btn-color"><?php echo($contentText["goBackOneStep"][$lang]) ?></a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
