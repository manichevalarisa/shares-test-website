<?php
include( "./content.php");
include("product.php");
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang'] ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/favicon.png" type="image/png">
    <title><?php echo($contentText["applicationName"][$lang]) ?></title>
    <link rel="stylesheet" href="/css/swiper.min.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/flipclock.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/media.css">
    <script src="/js/jquery-3.0.0.min.js"></script>
    <script src="/js/swiper.min.js"></script>
    <script src="/js/flipclock.js"></script>
    <script src="/js/mask.js"></script>
    <script src="/js/script.js"></script>

    <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '896745741134003');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=896745741134003&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

    <style>
        .control-group {
            display: inline-block;
            vertical-align: top;
            background: #fff;
            text-align: left;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
            padding: 30px;
            width: 200px;
            height: 210px;
            margin: 10px;
        }
        .control {
            display: block;
            position: relative;
            padding-left: 30px;
            cursor: pointer;
            font-size: 18px;
        }
        .control input {
            position: absolute;
            z-index: -1;
            opacity: 0;
        }
        .control__indicator {
            position: absolute;
            top: 0px;
            left: 0;
            height: 20px;
            width: 20px;
            background: #e6e6e6;
            border-radius: 2px;
        }
        .control--radio .control__indicator {
            border-radius: 50%;
        }
        .control:hover input ~ .control__indicator,
        .control input:focus ~ .control__indicator {
            background: #ccc;
        }
        .control input:checked ~ .control__indicator {
            background: #e34040;
        }
        .control:hover input:not([disabled]):checked ~ .control__indicator,
        .control input:checked:focus ~ .control__indicator {
            background: #b32626;
        }
        .control input:disabled ~ .control__indicator {
            background: #e6e6e6;
            opacity: 0.6;
            pointer-events: none;
        }
        .control__indicator:after {
            content: '';
            position: absolute;
            display: none;
        }
        .control input:checked ~ .control__indicator:after {
            display: block;
        }
        .control--checkbox .control__indicator:after {
            left: 8px;
            top: 4px;
            width: 3px;
            height: 8px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        .control--checkbox input:disabled ~ .control__indicator:after {
            border-color: #7b7b7b;
        }
        .control--radio .control__indicator:after {
            left: 7px;
            top: 7px;
            height: 6px;
            width: 6px;
            border-radius: 50%;
            background: #fff;
        }
        .control--radio input:disabled ~ .control__indicator:after {
            background: #7b7b7b;
        }

        .nonvisible {
            display: none;
        }
    </style>

</head>

<body data-colorPage="">
<header class="header">
    <div class="container">
        <div class="header-wrap">
            <div class="header_star">
                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="21.7778" height="20" fill="url(#pattern0)"/>
                    <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0" transform="translate(0 -0.0444444) scale(0.015625 0.0170139)"/>
                        </pattern>
                        <image id="image0" width="64" height="64"
                               xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2AAAAdgB+lymcgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAWSSURBVHic7ZpdiFVVFMd/6+xzdZxBU+xDCo0mRtMZM9LAlwKhIp17HDMdpexDLAXroQ8hE9QhemhQSUQIhCAoKBwJZ86dMcIHoeghpsAHlZiawDKNCrHJcXTOOasHP5qZxuu9Z59zbsX8H+/ee63/Wnfttdde+8AYxjCGMVQI2rV4vHYtHl9JDk4llUdqno8id10lOUilFGv3+lx45nQPgmMkqJMlhy5WgkfFIiA6/fM64E6U6ZG6z1WKR0Ui4Mq//y1w15WfTpr+qjppbruUNZeKRED4y+ln+dt4gBlh9cDTleCSeQTo/pUmqB44IVA3YqjX1PTNkkVHgiz5ZB4B4YQLz4xiPEBt2D9xTdZ8Mo2Ay//+xeOCzrzOlO9NTd89WUZBphEQ1gw8WcR4gLvD85NWZ0aIDCNA9680wYSBYyLMKjoPetz+qtnS3BZmwSuzCAhrBlbdyHgAgbqwZqA5C06QkQO0pcUR5Y2S5ytbtaUlE26ZKAnnd69UaCh1vsDs8IGvV6TJ6SpSd4AqIo5sKXedKNuyiILUFYRd3nJV7i13nUJ9uOCbZWlwGopUHaCKiErJe38kBN2mmu5JlaoDwoLXpOj8uOsV5oVd3tIkOY1EKt5VP39HAHWOyG6FeTayBI5Gqi+70CNe4VRSHIfIjwctNE4ZhFoHUytorSr1IjJHL1d6ExPkOBQXgVMox1U45iC9EdLrEvTS2PmDCFquwKIO+IeRUAvUc/lIuymeDalhQKFX4JhC7zXnuOaYPPbJ6estGuaAQd97VGANUIdQB0xNm3VG+B2lB+hR+DDn+Z9dHRiWBF34AmEawkL+P8YDTEVYiMMM90LVl0MHhjlAPL/fOIEH2pEtv0zwqTlftVia2/4c+uOoOUD3rxwXVl/8GPTxbLiljk5T07dCFh0ZGDkwah0gzW2XzLRpq0AOpM8tZQi+cYInRjMeihRCsmDfoOkfvxrlg/TYpY79prpvebE3h6KVoDS3heZC1Vrg/aSZZYCPTE3fUzdqr5VUCKkiYae3F9iYCLX08Z7pnr9eWlqiG00s6S4ggppG/yVV9thzSx37SjUeyiyFVZGg09sl8Eo8bqnjXdPov1hOSVzWbVAEzeX9V1XlrfK5pQuFnW7e31jufSD2ZSgseK8rvB13fZJQaM3l/c1x1sbuB5i83yoQS2mSENGWuMZDAv2AsOBtUthhKycORHSraSxYbcdEGiKDBW+nwGtJyCoVCrtyeX+TrZxkWmKimbzijEAi74eJOEBUSu75JwUp452hGJJqimbugKR0WucAbV86MTR6LglZ5ao2TjBZlhz6w0aIdQQETtRAZb41kkHcObZCrB2Q1F6MA0ftdVs7QB3qbWXE1q32uu0joAInwDXdaOUjgApuAbB3vpUD1PduBm6zJWGBadq1+BYbAVYOCETmWiz/SnEeUeVBkM9jcwiNVR5wbRY7aEO5j3EKJwTZbho7Dgy5uz80WGh62EF3KHpfeRycBuBImTSGrLeAUlYWPinIBre/aq6b72gb2bjI5dsPO933zwdpBr4rmYPlKWQVAZSWAH8V2OU4we4bfRJ/pY/Xpt3rD0ZnzqxVdDtwe1HpancSWFVwQcE7C0y+zvBZVdnjRuySpo6+OPLV96oj5AVFtyDcep1p50yjPyXO0zjYfB9wsGl66EYnRxk6r7DXJWqVfOfZuPKH6WpfOjEyulFhCzBp5Lhxgumy5NBPcWTHzgHhuGhk6A0C+4ybq8vl/c1JGQ8gTR19Ju+3GuVuhVZg2DNXoLnY2yC2AyS6lnwioM04Zrab9zcU+xjBFuL5v+Xy/mYTODOBfVxpijgWJXHsJHj5BNDDkbJpnFc4GldOHMiy9h+BDep774TCm0pkfSssG9q+tHh2zhD/Ji5jGMMY/lv4C5Rx0rmw1t82AAAAAElFTkSuQmCC"/>
                    </defs>
                </svg>
                <span><?php echo $_SESSION['product'] ?></span>
            </div>
            <div class="header_logo">
                <span class="logo"><?php echo($contentText["applicationName"][$lang]) ?></span>
                <span class="sub"><?php echo($contentText["footerBrand"][$lang]) ?></span>
            </div>
            <div class="header_lang">
                <a class="lang-link <?php if ($_SESSION['lang'] == 'ua') echo 'act' ?>" href="/lang/ua">UA</a>
                <span>|</span>
                <a class="lang-link <?php if ($_SESSION['lang'] == 'ru') echo 'act' ?>" href="/lang/ru">RU</a>
            </div>
        </div>
    </div>
</header>
<div class="top-section">
    <div class="container">
        <div class="top_wrap">
            <div class="left-sec">
                <h1><?php echo($product["name"][$lang]) ?></h1>
                <div class="wrapper">
                    <div class="top_text-block">
                        <div class="item-block">
                            <div class="svg-wrap">
                                <svg width="27" height="55" viewBox="0 0 27 55" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.666631 33C0.666631 38.445 2.41746 48.7392 6.32246 54.5875C6.49111 54.8436 6.77665 54.9984 7.0833 55H19.9166C20.2233 54.9984 20.5088 54.8436 20.6775 54.5875C24.5825 48.7392 26.3333 38.445 26.3333 33C26.4347 28.7284 24.7777 24.6024 21.75 21.5875V17.8384C22.9136 16.7975 23.5801 15.3112 23.5833 13.75V7.39752L24.5 1.04502C24.5708 0.53876 24.2179 0.0708977 23.7116 2.11671e-05C23.2054 -0.0708554 22.7375 0.282093 22.6666 0.788354L21.8508 6.47169C18.6778 6.79993 15.7216 8.23425 13.5 10.5234C11.276 8.23233 8.31618 6.79784 5.13996 6.47169L4.3333 0.788354C4.26242 0.282093 3.79456 -0.0708554 3.2883 2.11671e-05C2.78204 0.0708977 2.42909 0.53876 2.49996 1.04502L3.41663 7.39752V13.75C3.41979 15.3112 4.0863 16.7975 5.24996 17.8384V21.5875C2.22218 24.6024 0.56518 28.7284 0.666631 33ZM24.5 33C24.5 37.9408 22.8866 47.6667 19.4216 53.1667H7.57829C4.1133 47.6667 2.49996 37.9408 2.49996 33C2.39748 29.2723 3.81347 25.6628 6.4233 22.9992C7.04663 23.1367 8.25663 23.375 9.65913 23.5675L8.12829 26.1159C7.9225 26.3988 7.89574 26.7743 8.05934 27.0836C8.22294 27.3929 8.54834 27.5821 8.89808 27.5712C9.24781 27.5604 9.56086 27.3514 9.70496 27.0325L11.6666 23.7692L12.5833 23.8334V29.3333C12.5833 29.8396 12.9937 30.25 13.5 30.25C14.0062 30.25 14.4166 29.8396 14.4166 29.3333V23.8334L15.3333 23.7875L17.3041 27.0692C17.4482 27.388 17.7613 27.597 18.111 27.6079C18.4607 27.6187 18.7861 27.4296 18.9497 27.1203C19.1133 26.811 19.0866 26.4355 18.8808 26.1525L17.35 23.6042C18.78 23.4117 19.9533 23.1733 20.5766 23.0359C23.163 25.6998 24.5758 29.2879 24.5 33ZM8.91663 19.25C9.42289 19.25 9.83329 18.8396 9.83329 18.3334C9.83329 17.8271 9.42289 17.4167 8.91663 17.4167C6.89158 17.4167 5.24996 15.7751 5.24996 13.75V8.33252C8.19738 8.71093 10.8909 10.1953 12.785 12.485C12.9589 12.7019 13.2219 12.8281 13.5 12.8281C13.778 12.8281 14.041 12.7019 14.215 12.485C16.1144 10.2017 18.8051 8.71886 21.75 8.33252V13.75C21.75 15.7751 20.1083 17.4167 18.0833 17.4167C17.577 17.4167 17.1666 17.8271 17.1666 18.3334C17.1666 18.8396 17.577 19.25 18.0833 19.25C18.7082 19.248 19.3282 19.1395 19.9166 18.9292V21.2667C15.694 22.2385 11.3059 22.2385 7.0833 21.2667V18.9292C7.67174 19.1395 8.29173 19.248 8.91663 19.25Z"
                                          fill="#252525"/>
                                </svg>
                            </div>
                            <span class="mob"><?php echo($textAdvantages["text1Mobile"][$lang]) ?></span>
                            <span class="des"><?php echo($textAdvantages["text1"][$lang]) ?></span>
                        </div>
                        <div class="item-block">
                            <div class="svg-wrap">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.2572 34.7935C9.03445 34.9245 4.74579 34.322 5.3734 30.8644C6.15791 26.5424 18.1217 29.0963 16.3566 34.7935C14.9444 39.3512 10.0151 39.3119 7.72695 38.7226C4.78503 38.1332 -0.588866 35.3828 1.45086 29.0962M1.45086 29.0962C3.49059 22.8097 8.05383 10.1056 10.0805 4.53932C10.9957 3.09865 14.2058 0.906963 17.5333 1.00306C20.6508 1.09308 23.3531 2.0091 25.1823 4.53932C29.301 10.2365 38.519 10.2365 38.519 10.2365L33.8119 38.7226C31.1315 39.1155 24.9862 38.8798 21.8481 34.7935C17.9256 29.6856 19.8869 26.5423 12.2379 24.9707C6.1187 23.7133 2.49688 27.1972 1.45086 29.0962Z"
                                          stroke="#252525" stroke-width="1.68354" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <span class="mob"><?php echo($textAdvantages["text2Mobile"][$lang]) ?></span>
                            <span class="des"><?php echo($textAdvantages["text2"][$lang]) ?></span>
                        </div>
                        <div class="item-block">
                            <div class="svg-wrap">
                                <svg width="32" height="50" viewBox="0 0 32 50" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M31.6666 20C31.6666 15.0586 29.391 10.6395 25.8333 7.73359V0.833301C25.8333 0.37334 25.4608 0 25 0H6.6666C6.20576 0 5.8333 0.37334 5.8333 0.833301V7.73359C2.27559 10.6395 0 15.0586 0 20C0 24.9414 2.27559 29.3605 5.8333 32.2664V49.1667C5.8333 49.5033 6.03584 49.8075 6.34746 49.9367C6.65908 50.065 7.01748 49.9942 7.25576 49.7559L15.8333 41.1783L24.4108 49.7559C24.57 49.915 24.7833 50 25 50C25.1075 50 25.2158 49.9792 25.3191 49.9367C25.6308 49.8075 25.8333 49.5034 25.8333 49.1667V32.2664C29.391 29.3605 31.6666 24.9414 31.6666 20ZM7.5 1.6667H24.1667V6.54287C23.2463 5.9708 22.2636 5.49004 21.2307 5.11445C21.2068 5.10576 21.1827 5.09766 21.1588 5.08906C21.0362 5.04521 20.9131 5.00283 20.7892 4.96182C20.731 4.94258 20.6728 4.92354 20.6144 4.90498C20.5175 4.87422 20.42 4.84473 20.3224 4.81582C20.2182 4.78486 20.1137 4.75527 20.0089 4.72656C19.9222 4.70283 19.8354 4.6791 19.748 4.65684C19.6649 4.63564 19.5815 4.61553 19.498 4.5957C19.4292 4.5793 19.3602 4.56348 19.291 4.54805C19.2061 4.529 19.1211 4.50996 19.0358 4.49238C18.9387 4.47236 18.8409 4.454 18.7432 4.43574C18.6303 4.41475 18.5171 4.39502 18.4035 4.37646C18.3222 4.36309 18.2407 4.35 18.159 4.33799C18.0826 4.32676 18.0061 4.31592 17.9295 4.30576C17.8317 4.29277 17.7337 4.28115 17.6353 4.26992C17.5761 4.26318 17.5169 4.25557 17.4575 4.24951C17.3052 4.23389 17.152 4.221 16.9984 4.20977C16.9446 4.20586 16.8906 4.20283 16.8367 4.19951C16.7193 4.19209 16.6016 4.18604 16.4835 4.18125C16.432 4.1792 16.3807 4.17695 16.3292 4.17539C16.1645 4.17031 15.9993 4.16689 15.8333 4.16689C15.6673 4.16689 15.5021 4.17031 15.3374 4.17539C15.2859 4.17695 15.2345 4.1792 15.1831 4.18125C15.065 4.18604 14.9474 4.19219 14.8299 4.19951C14.776 4.20283 14.722 4.20586 14.6682 4.20977C14.5145 4.221 14.3615 4.23398 14.2092 4.24951C14.1497 4.25557 14.0905 4.26318 14.0312 4.26992C13.933 4.28115 13.835 4.29277 13.7372 4.30576C13.6605 4.31592 13.5841 4.32666 13.5077 4.33799C13.426 4.3501 13.3445 4.36318 13.2633 4.37646C13.1494 4.39512 13.0359 4.41484 12.9228 4.43594C12.8253 4.4541 12.7278 4.47246 12.631 4.49238C12.5456 4.50996 12.4606 4.5291 12.3756 4.54814C12.3064 4.56357 12.2375 4.57939 12.1687 4.5957C12.0853 4.61562 12.0018 4.63564 11.9187 4.65693C11.8314 4.6792 11.7447 4.70293 11.658 4.72666C11.5531 4.75537 11.4485 4.78506 11.3443 4.81602C11.2467 4.84492 11.1493 4.87441 11.0525 4.90518C10.9941 4.92373 10.9358 4.94277 10.8775 4.96211C10.7537 5.00303 10.6306 5.04541 10.508 5.08926C10.4841 5.09785 10.46 5.10596 10.4361 5.11465C9.40322 5.49033 8.42051 5.97109 7.5001 6.54307L7.5 1.6667ZM24.1666 47.155L16.4225 39.4108C16.26 39.2483 16.0466 39.1667 15.8333 39.1667C15.6199 39.1667 15.4066 39.2483 15.2441 39.4108L7.5 47.155V33.4571C8.42041 34.0291 9.40303 34.5099 10.4358 34.8855C10.46 34.8943 10.4844 34.9025 10.5086 34.9112C10.6308 34.955 10.7536 34.9973 10.8771 35.0381C10.9354 35.0574 10.9938 35.0765 11.0523 35.0951C11.1491 35.1259 11.2465 35.1553 11.3441 35.1842C11.4483 35.2151 11.5529 35.2448 11.6578 35.2735C11.7445 35.2973 11.8312 35.3209 11.9185 35.3433C12.0016 35.3646 12.0851 35.3846 12.1686 35.4045C12.2373 35.4208 12.3062 35.4366 12.3754 35.452C12.4604 35.4711 12.5454 35.4901 12.6308 35.5078C12.7276 35.5278 12.8251 35.5461 12.9226 35.5643C13.0357 35.5854 13.1493 35.6051 13.2631 35.6237C13.3444 35.6371 13.4258 35.6501 13.5075 35.6622C13.5839 35.6734 13.6603 35.6843 13.737 35.6944C13.8347 35.7074 13.9328 35.719 14.0311 35.7303C14.0904 35.737 14.1495 35.7446 14.209 35.7507C14.3613 35.7663 14.5145 35.7792 14.668 35.7904C14.7218 35.7943 14.7758 35.7974 14.8297 35.8007C14.9471 35.8081 15.0648 35.8142 15.1829 35.8189C15.2344 35.821 15.2857 35.8232 15.3372 35.8248C15.502 35.8299 15.6671 35.8333 15.8331 35.8333C15.9991 35.8333 16.1643 35.8299 16.329 35.8248C16.3805 35.8232 16.4319 35.821 16.4833 35.8189C16.6014 35.8142 16.719 35.808 16.8365 35.8007C16.8904 35.7974 16.9444 35.7943 16.9982 35.7904C17.1519 35.7792 17.3049 35.7662 17.4573 35.7507C17.5168 35.7446 17.5759 35.737 17.6352 35.7303C17.7334 35.719 17.8315 35.7074 17.9293 35.6944C18.006 35.6843 18.0824 35.6735 18.1588 35.6622C18.2405 35.6501 18.322 35.637 18.4033 35.6237C18.5168 35.6052 18.6301 35.5854 18.743 35.5645C18.8407 35.5462 18.9385 35.5278 19.0356 35.5078C19.121 35.4902 19.2059 35.4711 19.2908 35.4521C19.36 35.4367 19.429 35.4209 19.4978 35.4045C19.5813 35.3847 19.6647 35.3645 19.7478 35.3434C19.8352 35.3211 19.9219 35.2974 20.0087 35.2736C20.1135 35.2449 20.218 35.2152 20.3222 35.1844C20.4198 35.1555 20.5172 35.126 20.6141 35.0952C20.6726 35.0766 20.7309 35.0576 20.7892 35.0383C20.9128 34.9975 21.0356 34.9552 21.1579 34.9114C21.1821 34.9027 21.2064 34.8945 21.2307 34.8857C22.2636 34.5101 23.2462 34.0294 24.1665 33.4573L24.1666 47.155ZM24.5811 31.1359C24.5497 31.1542 24.5191 31.1741 24.4899 31.1967C23.2592 32.1496 21.912 32.8814 20.487 33.3806C20.4565 33.3912 20.4264 33.4023 20.3958 33.4127C20.3606 33.4247 20.3252 33.436 20.2899 33.4478C20.2166 33.4721 20.1433 33.4963 20.0694 33.5195C20.0451 33.5271 20.0208 33.5346 19.9965 33.5421C19.9079 33.5693 19.819 33.596 19.7297 33.6216C19.7159 33.6255 19.7022 33.6295 19.6885 33.6334C19.1353 33.79 18.5687 33.914 17.9906 34.0026L17.9857 34.0034C17.6419 34.0561 17.2939 34.0961 16.9426 34.1234C16.9207 34.1251 16.8988 34.1266 16.8769 34.1281C16.7883 34.1346 16.6994 34.1402 16.6103 34.145C16.5781 34.1468 16.5459 34.1484 16.5137 34.15C16.4312 34.1539 16.3484 34.1569 16.2655 34.1595C16.2337 34.1604 16.2019 34.1616 16.1699 34.1624C16.0579 34.165 15.9457 34.1667 15.8332 34.1667C15.7206 34.1667 15.6084 34.165 15.4964 34.1624C15.4645 34.1616 15.4326 34.1604 15.4008 34.1595C15.3179 34.1569 15.2352 34.1539 15.1526 34.15C15.1204 34.1484 15.0882 34.1468 15.056 34.145C14.9669 34.1401 14.8781 34.1346 14.7895 34.1281C14.7676 34.1266 14.7456 34.1251 14.7237 34.1234C14.3723 34.0961 14.0244 34.0561 13.6806 34.0034L13.6757 34.0026C13.0976 33.914 12.5309 33.7899 11.9777 33.6333C11.9641 33.6294 11.9504 33.6255 11.9367 33.6216C11.8474 33.596 11.7584 33.5693 11.6698 33.542C11.6455 33.5345 11.6212 33.5271 11.597 33.5195C11.5231 33.4964 11.4497 33.4722 11.3765 33.4478C11.3412 33.436 11.3058 33.4247 11.2706 33.4127C11.24 33.4022 11.2099 33.3911 11.1794 33.3806C9.75439 32.8814 8.40723 32.1495 7.17647 31.1967C7.14697 31.1737 7.11592 31.1534 7.08418 31.135C3.78721 28.5389 1.6665 24.5125 1.6665 20C1.6665 15.4893 3.78565 11.4643 7.08047 8.86807C7.11357 8.84893 7.1458 8.82744 7.17647 8.80332C8.40723 7.85039 9.75439 7.11855 11.1794 6.61943C11.2099 6.60879 11.24 6.59766 11.2706 6.58731C11.3058 6.57529 11.3412 6.56396 11.3765 6.55225C11.4498 6.52793 11.5231 6.50371 11.597 6.48047C11.6212 6.47285 11.6456 6.46543 11.6698 6.45801C11.7585 6.43066 11.8474 6.404 11.9367 6.37842C11.9504 6.37451 11.9641 6.37061 11.9777 6.3667C12.5309 6.21006 13.0975 6.08613 13.6757 5.99736L13.6806 5.99658C14.0244 5.94395 14.3724 5.90391 14.7237 5.87656C14.7456 5.8749 14.7675 5.87344 14.7895 5.87187C14.878 5.86543 14.9669 5.85977 15.056 5.85498C15.0882 5.85322 15.1204 5.85156 15.1526 5.85C15.2352 5.84609 15.3179 5.84307 15.4008 5.84053C15.4326 5.83955 15.4645 5.83838 15.4964 5.8376C15.6084 5.83496 15.7206 5.8333 15.8332 5.8333C15.9458 5.8333 16.058 5.83496 16.1699 5.8376C16.2019 5.83838 16.2337 5.83955 16.2655 5.84053C16.3484 5.84307 16.4312 5.84609 16.5137 5.85C16.5459 5.85156 16.5781 5.85322 16.6103 5.85498C16.6994 5.85986 16.7882 5.86543 16.8769 5.87187C16.8987 5.87344 16.9207 5.8749 16.9426 5.87656C17.294 5.90391 17.6419 5.94395 17.9857 5.99658L17.9906 5.99736C18.5687 6.08603 19.1354 6.21006 19.6885 6.3666C19.7022 6.37051 19.7159 6.37441 19.7297 6.37842C19.819 6.404 19.9078 6.43066 19.9965 6.45791C20.0208 6.46543 20.0452 6.47275 20.0694 6.48047C20.1433 6.50361 20.2167 6.52783 20.2899 6.55225C20.3252 6.56396 20.3606 6.57529 20.3958 6.58731C20.4264 6.59775 20.4565 6.60889 20.487 6.61943C21.912 7.11855 23.2592 7.85049 24.4899 8.80332C24.5194 8.82637 24.5504 8.84648 24.5821 8.86494C27.8792 11.461 29.9999 15.4874 29.9999 19.9999C30 24.513 27.8788 28.5398 24.5811 31.1359Z"
                                          fill="#252525"/>
                                    <path d="M26.6234 16.4009C26.5242 16.1067 26.2684 15.8909 25.9617 15.8434L19.5817 14.8484L16.58 8.79669C16.2984 8.22921 15.3684 8.22921 15.0867 8.79669L12.085 14.8484L5.70502 15.8434C5.39838 15.8908 5.14252 16.1067 5.0434 16.4009C4.94506 16.6959 5.01752 17.0209 5.23344 17.245L9.75512 21.9342L8.35346 28.15C8.28432 28.4559 8.3935 28.775 8.6351 28.975C8.8768 29.1759 9.2101 29.2225 9.49926 29.0975L15.8333 26.3408L22.1675 29.0975C22.2742 29.1442 22.3875 29.1666 22.5 29.1666C22.6909 29.1666 22.8792 29.1008 23.0317 28.9749C23.2734 28.7749 23.3826 28.4558 23.3133 28.1499L21.9117 21.9341L26.4333 17.2449C26.6492 17.0208 26.7217 16.6958 26.6234 16.4009ZM20.4 21.1C20.2059 21.3026 20.125 21.5884 20.1875 21.8616L21.3259 26.9133L16.166 24.6683C16.0593 24.6225 15.9468 24.5991 15.8334 24.5991C15.7201 24.5991 15.6076 24.6225 15.5009 24.6683L10.341 26.9133L11.4793 21.8616C11.5418 21.5883 11.461 21.3025 11.2668 21.1L7.54682 17.2425L12.7685 16.4283C13.036 16.3866 13.2668 16.2175 13.386 15.975L15.8333 11.0417L18.2808 15.975C18.3999 16.2175 18.6308 16.3867 18.8983 16.4283L24.12 17.2425L20.4 21.1Z"
                                          fill="#252525"/>
                                </svg>
                            </div>
                            <span class="mob"><?php echo($textAdvantages["text3Mobile"][$lang]) ?></span>
                            <span class="des"><?php echo($textAdvantages["text3"][$lang]) ?></span>
                        </div>
                    </div>
                    <div class="top-price des">
                        <div class="old-price">
                            <span class="text"><?php echo($contentText["regularPrice"][$lang]) ?>:</span>
                            <span class="value"><?php echo($product['topImages']["oldPrice"]) ?></span>
                        </div>
                        <div class="discount">
                            <span class="text"><?php echo($contentText["sale"][$lang]) ?></span>
                            <span class="value"><?php echo($product['topImages']["sale"]) ?></span>
                        </div>
                        <div class="current-price">
                            <span class="text"><?php echo($contentText["todayPrice"][$lang]) ?>:</span>
                            <span class="value"><?php echo($product['topImages']["newPrice"]) ?></span>
                        </div>
                    </div>
                </div>
                <div class="timer-wrap top">
                    <div class="tit"><?php echo($contentText["discountExpires"][$lang]) ?>:</div>
                    <div class="timer">
                        <div class="timer_item">
                            <div class="count hours"></div>
                            <div class="text"><?php echo($contentText["hours"][$lang]) ?></div>
                        </div>
                        <span class="toc">:</span>
                        <div class="timer_item">
                            <div class="count minutes"></div>
                            <div class="text"><?php echo($contentText["minutes"][$lang]) ?></div>
                        </div>
                        <span class="toc">:</span>
                        <div class="timer_item">
                            <div class="count seconds"></div>
                            <div class="text"><?php echo($contentText["seconds"][$lang]) ?></div>
                        </div>
                    </div>
                </div>
                <div class="btn-color"><?php echo($contentText["chooseColor"][$lang]) ?></div>
                <div class="top_count"><?php echo($contentText["left"][$lang]) ?>
                    <span><?php echo($product['topImages']["quantity"]) ?></span> <?php echo($contentText["itemsSale"][$lang]) ?>
                    !
                </div>
            </div>
            <div class="right-sec">
                <div class="title-mob"><?php echo($product["name"][$lang]) ?></div>
                <div class="wrap-img">
                    <img src="/<?php echo($product['topImages']["topImgUrl"]) ?>" alt="">
                    <div class="label"><?php echo($product['topImages']["textLabel"][$lang]) ?></div>
                    <div class="table-size">
                        <div class="text"><?php echo($contentText["sizes"][$lang]) ?></div>
                        <div class="num"><?php echo($product['topImages']["textSizeVal"]) ?></div>
                    </div>
                </div>
                <div class="top-price mobile">
                    <div class="old-price">
                        <span class="text"><?php echo($contentText["regularPrice"][$lang]) ?>:</span>
                        <span class="value"><?php echo($product['topImages']["oldPrice"]) ?></span>
                    </div>
                    <div class="discount">
                        <span class="text"><?php echo($contentText["sale"][$lang]) ?></span>
                        <span class="value"><?php echo($product['topImages']["sale"]) ?></span>
                    </div>
                    <div class="current-price">
                        <span class="text"><?php echo($contentText["todayPrice"][$lang]) ?></span>
                        <span class="value"><?php echo($product['topImages']["newPrice"]) ?></span>
                    </div>
                </div>
                <div class="tabs-img-wrap swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img data-color="0" class="url-load"
                                 data-way="/<?php echo($product['topImages']["topImgUrl"]) ?>"
                                 src="" alt="">
                        </div>
                        <?php foreach ($product['topImages']['imgs'] as $key => $img) { ?>
                            <div class="swiper-slide">
                                <img data-color="<?php echo($key) ?>" class="url-load" data-way="/<?php echo($img) ?>"
                                     src="" alt="">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="arrows">
                        <div class="svg next">
                            <svg width="24" height="14" viewBox="0 0 24 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.4695 12.5588L12.1141 3L1.7588 12.5588" stroke="#252525"
                                      stroke-opacity="0.5" stroke-width="3"/>
                            </svg>
                        </div>
                        <div class="svg prev">
                            <svg width="24" height="13" viewBox="0 0 24 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.31763 1.38385L11.673 10.9426L22.0283 1.38385" stroke="#252525"
                                      stroke-opacity="0.5" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sec-style">
    <div class="container">
        <div class="sec-style_wrap">
            <div class="style-slider">
                <div class="title-mob"><?php echo($contentText["liveDress"][$lang]) ?></div>
                <div class="style-slider-item swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($product['colors'] as $color) { ?>
                            <div class="swiper-slide" data-num="<?php echo($color["number"]) ?>">
                                <video controls="true" width="100%" height="100%" loop="" muted="" playsinline
                                       poster="/<?php echo($color['videoImgUrl']) ?>">
                                    <source class="video_source" data-way="/<?php echo($color['videoUrl']) ?>"
                                            src="/<?php echo($color['videoUrl']) ?>"
                                            type="video/mp4">
                                </video>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="arrows">
                    <div class="svg next">
                        <svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.0637 1.85168L2.63208 9.0179L10.0637 16.1841" stroke="#252525"
                                  stroke-opacity="0.5" stroke-width="3"/>
                        </svg>
                    </div>
                    <div class="svg prev">
                        <svg width="12" height="17" viewBox="0 0 12 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.59017 1.28497L9.23413 8.45119L1.59017 15.6174" stroke="#252525"
                                  stroke-opacity="0.5" stroke-width="3"/>
                        </svg>
                    </div>
                </div>
                <div class="paginations swiper-pagination">
                </div>
            </div>
            <div class="style-content">
                <h2><?php echo($contentText["recommends"][$lang]) ?></h2>
                <div class="content-img">
                    <img class="img url-load" data-way="/img/img-6.png" src="" alt="">
                    <div class="item-text">
                        <div class="name"><?php echo($contentText["styleName"][$lang]) ?></div>
                        <div class="position"><?php echo($contentText["stylePosition"][$lang]) ?></div>
                        <div class="logo">
                            <img class="url-load" data-way="/<?php echo($contentText['styleImgUrl']) ?>" src="" alt="">
                        </div>
                    </div>
                </div>
                <div class="sub"><?php echo($contentText["subText"][$lang]) ?></div>
                <div class="text"><?php echo($contentText["styleText"][$lang]) ?></div>
            </div>
        </div>
    </div>
</div>
<div class="sec-colors">
    <div class="container">
        <div class="sec-color_wrap">
            <h2><?php echo($contentText["chooseYourColor"][$lang]) ?></h2>
            <div class="list-colors">
                <?php foreach ($product['colors'] as $color) { ?>
                    <div class="item-color">
                        <div class="item-color-img">
                            <div class="wrap-img">
                                <img class="url-load" data-way="/<?php echo($color['imgs']['img1']) ?>" src="" alt=""
                                     style="max-height: 700px">
                                <div class="label"><?php echo($color["sale"]) ?></div>
                                <div class="table-size">
                                    <div class="text"><?php echo($contentText["sizes"][$lang]) ?></div>
                                    <div class="num"><?php echo($color["sizeText"]) ?></div>
                                </div>
                            </div>
                            <div class="color-slider color-slider-<?php echo($color['number']) ?> swiper-container">
                                <div class="swiper-wrapper">
                                    <?php foreach ($color['imgs'] as $img) { ?>
                                        <div class="swiper-slide">
                                            <div class="label"><?php echo($color["sale"]) ?></div>
                                            <div class="table-size">
                                                <div class="text"><?php echo($contentText["sizes"][$lang]) ?></div>
                                                <div class="num"><?php echo($color["sizeText"]) ?></div>
                                            </div>
                                            <img class="url-load" data-way="/<?php echo($img) ?>" src="" alt="">
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="arrows">
                                    <div class="svg next">
                                        <svg width="24" height="14" viewBox="0 0 24 14" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.4695 12.5588L12.1141 3L1.7588 12.5588" stroke="#252525"
                                                  stroke-opacity="0.5" stroke-width="3"/>
                                        </svg>
                                    </div>
                                    <div class="svg prev">
                                        <svg width="24" height="13" viewBox="0 0 24 13" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.31763 1.38385L11.673 10.9426L22.0283 1.38385" stroke="#252525"
                                                  stroke-opacity="0.5" stroke-width="3"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="paginations swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="item-color-text">
                            <div class="wrapper-item">
                                <div class="wrapper-one">
                                    <div class="color"><?php echo($color["name"][$lang]) ?></div>
                                    <div class="akcia">
                                        <?php if ($color["present"][$lang]) { ?>
                                            <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.7643 3.16754H9.28284C9.46088 3.04597 9.61381 2.92519 9.72048 2.81696C10.3526 2.1809 10.3526 1.14564 9.72048 0.509585C9.10638 -0.108434 8.03504 -0.109219 7.42016 0.509585C7.08056 0.85075 6.17784 2.23973 6.30255 3.16754H6.24608C6.36999 2.23973 5.46806 0.85075 5.12846 0.509585C4.51358 -0.109219 3.44224 -0.108434 2.82815 0.509585C2.19601 1.14564 2.19601 2.1809 2.82736 2.81696C2.93481 2.92519 3.08775 3.04597 3.26578 3.16754H0.784289C0.352146 3.16754 0 3.51968 0 3.95183V5.91255C0 6.12901 0.175681 6.30469 0.392144 6.30469H0.784289V11.0104C0.784289 11.4426 1.13643 11.7947 1.56858 11.7947H10.98C11.4122 11.7947 11.7643 11.4426 11.7643 11.0104V6.30469H12.1565C12.3729 6.30469 12.5486 6.12901 12.5486 5.91255V3.95183C12.5486 3.51968 12.1965 3.16754 11.7643 3.16754ZM3.38421 1.06251C3.54342 0.902513 3.75439 0.814673 3.9787 0.814673C4.20222 0.814673 4.41319 0.902513 4.5724 1.06251C5.10101 1.59426 5.62649 2.95264 5.44375 3.14166C5.44375 3.14166 5.41081 3.16754 5.29866 3.16754C4.75671 3.16754 3.72223 2.60442 3.38421 2.26404C3.05559 1.93307 3.05559 1.39348 3.38421 1.06251ZM5.88217 11.0104H1.56858V6.30469H5.88217V11.0104ZM5.88217 5.5204H0.784289V3.95183H5.29866H5.88217V5.5204ZM7.97622 1.06251C8.29464 0.743303 8.84678 0.744087 9.16442 1.06251C9.49303 1.39348 9.49303 1.93307 9.16442 2.26404C8.82639 2.60442 7.79191 3.16754 7.24997 3.16754C7.13781 3.16754 7.10487 3.14244 7.10409 3.14166C6.92213 2.95264 7.44761 1.59426 7.97622 1.06251ZM10.98 11.0104H6.66645V6.30469H10.98V11.0104ZM11.7643 5.5204H6.66645V3.95183H7.24997H11.7643V5.5204Z"
                                                      fill="#E34040"/>
                                            </svg>
                                            <span><?php echo($color["present"][$lang]) ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="wrapper-two">
                                    <div class="old-price"><?php echo($color["oldPrice"]) ?></div>
                                    <div class="new-price"><?php echo($color["newPrice"]) ?></div>
                                </div>
                            </div>
                            <div class="btn-color" data-num="<?php echo($color["id"]) ?>"
                                 data-color="<?php echo($color["id"]) ?>"><?php echo($contentText["orderText"][$lang]) ?></div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (key_exists('add_purchase', $product)) { ?>
                <div class="item-color">
                  <div class="item-color-img">
                      <div class="wrap-img">
                          <img class="url-load" data-way="/<?php echo($product['add_purchase']['imgs']['img1']) ?>" src="" alt=""
                               style="max-height: 700px">
                          <div class="label"><?php echo($product['add_purchase']["sale"]) ?></div>
                          <div class="table-size">
                              <div class="text"><?php echo($contentText["sizes"][$lang]) ?></div>
                              <div class="num"><?php echo($product['add_purchase']["sizeText"]) ?></div>
                          </div>
                      </div>
                      <div class="color-slider color-slider-<?php echo($product['add_purchase']['number']) ?> swiper-container">
                          <div class="swiper-wrapper">
                              <?php foreach ($product['add_purchase']['imgs'] as $img) { ?>
                                  <div class="swiper-slide">
                                      <div class="label"><?php echo($product['add_purchase']["sale"]) ?></div>
                                      <div class="table-size">
                                          <div class="text"><?php echo($product['add_purchase']["sizes"][$lang]) ?></div>
                                          <div class="num"><?php echo($product['add_purchase']["sizeText"]) ?></div>
                                      </div>
                                      <img class="url-load" data-way="/<?php echo($img) ?>" src="" alt="">
                                  </div>
                              <?php } ?>
                          </div>
                          <div class="arrows">
                              <div class="svg next">
                                  <svg width="24" height="14" viewBox="0 0 24 14" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                      <path d="M22.4695 12.5588L12.1141 3L1.7588 12.5588" stroke="#252525"
                                            stroke-opacity="0.5" stroke-width="3"/>
                                  </svg>
                              </div>
                              <div class="svg prev">
                                  <svg width="24" height="13" viewBox="0 0 24 13" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                      <path d="M1.31763 1.38385L11.673 10.9426L22.0283 1.38385" stroke="#252525"
                                            stroke-opacity="0.5" stroke-width="3"/>
                                  </svg>
                              </div>
                          </div>
                          <div class="paginations swiper-pagination"></div>
                      </div>
                  </div>
                    <div class="item-color-text">
                        <div class="wrapper-item">
                            <div class="wrapper-one">
                                <div class="color"><?php echo($product['add_purchase']["color"]["name"][$lang]) ?></div>
                                <div class="akcia">
                                    <?php if ($product['add_purchase']['color']["present"][$lang]) { ?>
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.7643 3.16754H9.28284C9.46088 3.04597 9.61381 2.92519 9.72048 2.81696C10.3526 2.1809 10.3526 1.14564 9.72048 0.509585C9.10638 -0.108434 8.03504 -0.109219 7.42016 0.509585C7.08056 0.85075 6.17784 2.23973 6.30255 3.16754H6.24608C6.36999 2.23973 5.46806 0.85075 5.12846 0.509585C4.51358 -0.109219 3.44224 -0.108434 2.82815 0.509585C2.19601 1.14564 2.19601 2.1809 2.82736 2.81696C2.93481 2.92519 3.08775 3.04597 3.26578 3.16754H0.784289C0.352146 3.16754 0 3.51968 0 3.95183V5.91255C0 6.12901 0.175681 6.30469 0.392144 6.30469H0.784289V11.0104C0.784289 11.4426 1.13643 11.7947 1.56858 11.7947H10.98C11.4122 11.7947 11.7643 11.4426 11.7643 11.0104V6.30469H12.1565C12.3729 6.30469 12.5486 6.12901 12.5486 5.91255V3.95183C12.5486 3.51968 12.1965 3.16754 11.7643 3.16754ZM3.38421 1.06251C3.54342 0.902513 3.75439 0.814673 3.9787 0.814673C4.20222 0.814673 4.41319 0.902513 4.5724 1.06251C5.10101 1.59426 5.62649 2.95264 5.44375 3.14166C5.44375 3.14166 5.41081 3.16754 5.29866 3.16754C4.75671 3.16754 3.72223 2.60442 3.38421 2.26404C3.05559 1.93307 3.05559 1.39348 3.38421 1.06251ZM5.88217 11.0104H1.56858V6.30469H5.88217V11.0104ZM5.88217 5.5204H0.784289V3.95183H5.29866H5.88217V5.5204ZM7.97622 1.06251C8.29464 0.743303 8.84678 0.744087 9.16442 1.06251C9.49303 1.39348 9.49303 1.93307 9.16442 2.26404C8.82639 2.60442 7.79191 3.16754 7.24997 3.16754C7.13781 3.16754 7.10487 3.14244 7.10409 3.14166C6.92213 2.95264 7.44761 1.59426 7.97622 1.06251ZM10.98 11.0104H6.66645V6.30469H10.98V11.0104ZM11.7643 5.5204H6.66645V3.95183H7.24997H11.7643V5.5204Z"
                                                  fill="#E34040"/>
                                        </svg>
                                        <span><?php echo($product['add_purchase']['color']["present"][$lang]) ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="wrapper-two">
                                <div class="old-price"><?php echo($product['add_purchase']["oldPrice"]) ?></div>
                                <div class="new-price"><?php echo($product['add_purchase']["newPrice"]) ?></div>
                            </div>
                        </div>
                        <div onclick="var el = document.getElementById('add-purchase-checkbox'); if(!el.checked) {el.click()} " class="btn-color" data-num="<?php echo($product['add_purchase']["id"]) ?>"
                             data-color="<?php echo($product['add_purchase']["id"]) ?>"><?php echo($contentText["orderText"][$lang]) ?></div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="info-sec">
    <div class="container">
        <div class="info-sec_wrap">
            <div class="item-info">
                <img class="url-load" data-way="/img/img-13.svg" src="" alt="">
                <div class="text-info">
                    <div class="title"><?php echo($product['features']["text1Name"][$lang]) ?></div>
                    <div class="content"><?php echo($product['features']["text1val"][$lang]) ?></div>
                </div>
            </div>
            <div class="item-info">
                <img class="url-load" data-way="/img/img-15.svg" src="" alt="">
                <div class="text-info">
                    <div class="title"><?php echo($product['features']["text2Name"][$lang]) ?></div>
                    <div class="content"><?php echo($product['features']["text2val"][$lang]) ?></div>
                </div>
            </div>
            <div class="item-info">
                <img class="url-load" data-way="/img/img-17.svg" src="" alt="">
                <div class="text-info">
                    <div class="title"><?php echo($product['features']["text3Name"][$lang]) ?></div>
                    <div class="content"><?php echo($product['features']["text3val"][$lang]) ?></div>
                </div>
            </div>
            <div class="item-info">
                <img class="url-load" data-way="/img/img-14.svg" src="" alt="">
                <div class="text-info">
                    <div class="title"><?php echo($product['features']["text4Name"][$lang]) ?></div>
                    <div class="content"><?php echo($product['features']["text4val"][$lang]) ?></div>
                </div>
            </div>
            <div class="item-info">
                <img class="url-load" data-way="/img/img-16.svg" src="" alt="">
                <div class="text-info">
                    <div class="title"><?php echo($product['features']["text5Name"][$lang]) ?></div>
                    <div class="content"><?php echo($product['features']["text5val"][$lang]) ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sec-table">
    <div class="container">
        <div class="sec-table_wrap">
            <div class="content des">
                <div class="tabs">
                    <div data-tab="table" class="tab active" id="data-tab-table"
                         onclick="document.getElementById('data-tab-table').classList.add('active'); document.getElementById('data-tab-info').classList.remove('active');"><?php echo($contentText["sizesTable"][$lang]) ?></div>
                    <div data-tab="info" class="tab" id="data-tab-info"
                         onclick="document.getElementById('data-tab-table').classList.remove('active'); document.getElementById('data-tab-info').classList.add('active');"><?php echo($contentText["howToSize"][$lang]) ?>
                        ?
                    </div>
                </div>
                <div class="content-tabs">
                    <div data-tab="table" class="block-tab table">
                        <table>
                            <tbody>
                            <?php foreach ((key_exists('table', $product) ? $product['table'] : $table) as $nameTr => $tr) { ?>
                                <tr>
                                    <?php foreach ($tr as $td) { ?>
                                        <td><?php echo($nameTr == 'row1' ? $td[$lang] : $td) ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div data-tab="info" class="block-tab info">
                        <div class="info_wrapper">
                            <img src="/<?php echo($info["img"]) ?>" alt="">
                            <div>
                                <?php echo($info["text"][$lang]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content mob">
                <div class="content-tabs">
                    <div class="block-tab table">
                        <div class="tit-tab">
                            <span><?php echo($contentText["sizesTable"][$lang]) ?></span>
                            <svg class="arrow-tab" width="10" height="7" viewBox="0 0 10 7" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.08984 0.999869L5.04484 5.00879L0.999844 0.999869" stroke="#252525"
                                      stroke-opacity="0.8" stroke-width="2"/>
                            </svg>
                        </div>
                        <div class="wrap-hide">
                            <table>
                                <tbody>
                                <?php foreach ((key_exists('table', $product) ? $product['table'] : $table) as $nameTr => $tr) { ?>
                                    <tr>
                                        <?php foreach ($tr as $td) { ?>
                                            <td><?php echo($nameTr == 'row1' ? $td[$lang] : $td) ?></td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="line-tab"></div>
                    <div class="block-tab info">
                        <div class="tit-tab">
                            <span><?php echo($contentText["howToSize"][$lang]) ?>?</span>
                            <svg class="arrow-tab" width="10" height="7" viewBox="0 0 10 7" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.08984 0.999869L5.04484 5.00879L0.999844 0.999869" stroke="#252525"
                                      stroke-opacity="0.8" stroke-width="2"/>
                            </svg>
                        </div>
                        <div class="wrap-hide">
                            <div class="info_wrapper">
                                <img src="/<?php echo($info["img"]) ?>" alt="">
                                <div>
                                    <?php echo($info["text"][$lang]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="help-info">
                <div class="title"><?php echo($contentText["helpSize"][$lang]) ?></div>
                <div class="img-wrap">
                    <img class="url-load" data-way="/img/img-13.png" src="" alt="">
                    <div class="div-text">
                        <div><?php echo($contentText["consult"][$lang]) ?></div>
                        <img class="url-load" data-way="/img/img-14.png" src="" alt="">
                    </div>
                </div>
                <div class="text"><?php echo($infoHello[$lang]) ?></div>
            </div>
        </div>
        <div class="btn-color to-form"><?php echo($contentText["getConsult"][$lang]) ?></div>
    </div>
</div>
<div class="reviews">
    <div class="container">
        <div class="reviews_wrap">
            <div class="top">
                <div class="title"><?php echo($contentText["customersReviews"][$lang]) ?></div>
                <div class="text">
                    <?php echo($contentText["moreThanStart"][$lang]) ?>
                    <span>94,5%</span> <?php echo($contentText["moreThanEnd"][$lang]) ?>
                </div>
                <div class="rating">
                    <img class="url-load" data-way="/img/img-15.png" src="" alt="">
                    <div class="coutn">102 <?php echo($contentText["reviews"][$lang]) ?></div>
                </div>
            </div>
            <div class="reviews-list_wrap">
                <div class="reviews-list swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($reviews as $review) { ?>
                            <div class="swiper-slide"><img class="review-load" src="" data-way="/<?php echo($review) ?>"
                                                           alt=""></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="arrows">
                    <div class="svg next">
                        <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L3 10.5L12 19" stroke="#E34040" stroke-width="3"/>
                        </svg>
                    </div>
                    <div class="svg prev">
                        <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 2L11 10.5L2 19" stroke="#E34040" stroke-width="3"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sec-ask">
    <div class="container">
        <div class="ask-wrap">
            <div class="left">
                <div class="title"><?php echo($contentText["howToDress"][$lang]) ?>?</div>
                <div class="btn-color to-form"><?php echo($contentText["orderText"][$lang]) ?></div>
                <div class="text">
                    <img class="url-load" data-way="/img/img-18.svg" src="" alt="">
                    <span><?php echo($contentText["getOrders"][$lang]) ?> 24/7</span>
                </div>
            </div>
            <div class="list-icons_wrap">
                <div class="title-mob"><?php echo($contentText["howToDress"][$lang]) ?>?</div>
                <div class="list-icons">
                    <div class="icon-item">
                        <div class="img-wrap">
                            <img class="url-load" data-way="/img/img-19.svg" src="" alt="">
                            <span>1</span>
                        </div>
                        <div class="tit"><?php echo($contentText["request"][$lang]) ?></div>
                        <div class="text"><?php echo($contentText["sendRequest"][$lang]) ?></div>
                    </div>
                    <div class="icon-item">
                        <div class="img-wrap">
                            <img class="url-load" data-way="/img/img-20.svg" src="" alt="">
                            <span>2</span>
                        </div>
                        <div class="tit"><?php echo($contentText["call"][$lang]) ?></div>
                        <div class="text"><?php echo($contentText["managerDetails"][$lang]) ?></div>
                    </div>
                    <div class="icon-item tr qqq">
                        <div class="img-wrap">
                            <img class="url-load" data-way="/img/img-21.svg" src="" alt="">
                            <span>3</span>
                        </div>
                        <div class="tit"><?php echo($contentText["shipment"][$lang]) ?></div>
                        <div class="text"><?php echo($contentText["howToShip"][$lang]) ?></div>
                    </div>
                    <div class="icon-item tr">
                        <div class="img-wrap">
                            <img class="url-load" data-way="/img/img-22.svg" src="" alt="">
                            <span>4</span>
                        </div>
                        <div class="tit"><?php echo($contentText["getProduct"][$lang]) ?></div>
                        <div class="text"><?php echo($contentText["howToGet"][$lang]) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="advantages">
    <div class="container">
        <div class="advantages_wrap">
            <div class="title"><?php echo($contentText["whyWe"][$lang]) ?>
            </div>
            <div class="list-advantages">
                <div class="advantages-item">
                    <img class="url-load" data-way="/img/img-23.svg" src="" alt="">
                    <div class="content">
                        <div class="tit"><?php echo($textAdvantagesAll["text1Name"][$lang]) ?></div>
                        <div class="text"><?php echo($textAdvantagesAll["text1Val"][$lang]) ?></div>
                    </div>
                </div>
                <div class="advantages-item">
                    <img class="url-load" data-way="/img/img-24.svg" src="" alt="">
                    <div class="content">
                        <div class="tit"><?php echo($textAdvantagesAll["text2Name"][$lang]) ?></div>
                        <div class="text"><?php echo($textAdvantagesAll["text2Val"][$lang]) ?></div>
                    </div>
                </div>
                <div class="advantages-item">
                    <img class="url-load" data-way="/img/img-25.svg" src="" alt="">
                    <div class="content">
                        <div class="tit"><?php echo($textAdvantagesAll["text3Name"][$lang]) ?></div>
                        <div class="text"><?php echo($textAdvantagesAll["text3Val"][$lang]) ?></div>
                    </div>
                </div>
                <div class="advantages-item">
                    <img class="url-load" data-way="/img/img-26.svg" src="" alt="">
                    <div class="content">
                        <div class="tit"><?php echo($textAdvantagesAll["text4Name"][$lang]) ?></div>
                        <div class="text"><?php echo($textAdvantagesAll["text4Val"][$lang]) ?></div>
                    </div>
                </div>
                <div class="advantages-item">
                    <img class="url-load" data-way="/img/img-27.svg" src="" alt="">
                    <div class="content">
                        <div class="tit"><?php echo($textAdvantagesAll["text5Name"][$lang]) ?></div>
                        <div class="text"><?php echo($textAdvantagesAll["text5Val"][$lang]) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sec-form">
    <div class="container">
        <div class="form_wrap">
            <div class="title main"><?php echo($contentText["buy"][$lang]) ?> <?php echo($product["buyName"][$lang]) ?>
                <span><?php echo($contentText["withSale"][$lang]) ?><?php echo($product['topImages']["sale"]) ?></span>
            </div>
            <div class="content">
                <div class="content-slider">
                    <div class="slider swiper-container">
                        <div class="swiper-wrapper">
                            <?php foreach ($product['topImages']['imgs'] as $key => $img) { ?>
                                <div class="swiper-slide">
                                    <img data-color="<?php echo($key) ?>" class="url-load"
                                         data-way="/<?php echo($img) ?>" src="" alt="" style="max-height: 700px">
                                </div>
                            <?php } ?>
                        </div>
                        <div class="arrows">
                            <div class="svg next">
                                <svg width="24" height="14" viewBox="0 0 24 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.4695 12.5588L12.1141 3L1.7588 12.5588" stroke="#252525"
                                          stroke-opacity="0.5" stroke-width="3"/>
                                </svg>
                            </div>
                            <div class="svg prev">
                                <svg width="24" height="13" viewBox="0 0 24 13" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.31763 1.38385L11.673 10.9426L22.0283 1.38385" stroke="#252525"
                                          stroke-opacity="0.5" stroke-width="3"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="wrap-img">
                        <img class="url-load" data-way="/<?php echo($product['topImages']['topImgUrl']) ?>" src=""
                             alt="">
                        <div class="label"><?php echo($product['topImages']["textLabel"][$lang]) ?></div>
                        <div class="table-size">
                            <div class="text"><?php echo($contentText["sizes"][$lang]) ?></div>
                            <div class="num"><?php echo($product['topImages']["textSizeVal"]) ?></div>
                        </div>
                        <div class="price">
                            <div class="price-wrap">
                                <div class="price-old">
                                    <div class="text"><?php echo($contentText["regularPrice"][$lang]) ?>:</div>
                                    <div class="val"><?php echo($product['topImages']["oldPrice"]) ?></div>
                                </div>
                                <div class="price-new">
                                    <div class="text"><?php echo($contentText["todayPrice"][$lang]) ?>:</div>
                                    <div class="val"><?php echo($product['topImages']["newPrice"]) ?></div>
                                </div>
                                <div class="disc">
                                    <div class="text"><?php echo($contentText["sale"][$lang]) ?></div>
                                    <div class="value"><?php echo($product['topImages']["sale"]) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-text mob">
                    <div class="item-block">
                        <span class="mob"><?php echo($textAdvantages["text1Mobile"][$lang]) ?></span>
                    </div>
                    <div class="item-block">
                        <span class="mob"><?php echo($textAdvantages["text2Mobile"][$lang]) ?></span>
                    </div>
                    <div class="item-block">
                        <span class="mob"><?php echo($textAdvantages["text3Mobile"][$lang]) ?></span>
                    </div>
                </div>
                <div class="form-wrap">
                    <div class="title"><?php echo($contentText["discountExpires"][$lang]) ?>:</div>
                    <div class="timer">
                        <div class="timer_item">
                            <div class="count hours"></div>
                            <div class="text"><?php echo($contentText["hours"][$lang]) ?></div>
                        </div>
                        <span class="toc">:</span>
                        <div class="timer_item">
                            <div class="count minutes"></div>
                            <div class="text"><?php echo($contentText["minutes"][$lang]) ?></div>
                        </div>
                        <span class="toc">:</span>
                        <div class="timer_item">
                            <div class="count seconds"></div>
                            <div class="text"><?php echo($contentText["seconds"][$lang]) ?></div>
                        </div>
                    </div>
                    <form action="/<?php echo $_SESSION['lang'] ?>/<?php echo $_SESSION['product'] ?>/request-order"
                          method="post">
                        <input type="text" class="hidden" value="" name="is_present" id="is_present_field">
                        <label class="size">
                            <img class="url-load" data-way="/img/img-28.svg" src="" alt="">
                            <select class="field" id="select-color" name="color" required="" onchange="changedColor()">
                                <option selected="" disabled=""><?php echo($contentText["chooseColorDress"][$lang]) ?></option>
                                <?php foreach ($product['colors'] as $color) { ?>
                                    <option data-val="<?php echo($color['id']) ?>"
                                            value="<?php echo($color['id']) ?>"><?php echo($color['name'][$lang]) ?></option>
                                <?php } ?>
                            </select>
                        </label>
                        <label class="size">
                            <img class="url-load" data-way="/img/img-28.svg" src="" alt="">
                            <select class="field" id="select-size" name="size" required="" disabled>
                                <option selected="" disabled=""><?php echo($contentText["chooseSize"][$lang]) ?></option>
                            </select>
                        </label>
                        <label class="name">
                            <img class="url-load" data-way="/img/img-21.png" src="" alt="">
                            <input class="inp" type="text" name="name"
                                   placeholder="<?php echo($contentText["nameInput"][$lang]) ?>" required="">
                        </label>
                        <label class="phone" style="margin-bottom: 25px;">
                            <img class="url-load" data-way="/img/img-30.svg" src="" alt="">
                            <input class="inp inp-phone" type="tel" name="phone"
                                   placeholder="<?php echo($contentText["phoneInput"][$lang]) ?>"
                                   required="">
                        </label>
                        <?php if (key_exists('add_purchase', $product)) { ?>
                        <label class="size" style="background: white; padding: 22px 0">
                            <div class="control control--checkbox">
                                <b style='font-family: "MontserratMedium"; padding-left: 22px; font-weight: normal; font-size: 16px; line-height: 20px; color: rgb(116, 116, 116);'><?php echo($contentText["orderTextAddPurchase"][$lang]) ?></b>
                                <input id="add-purchase-checkbox" type="checkbox" onchange="var el = document.getElementById('add-purchase-color'); el.classList.contains('nonvisible') ? el.classList.remove('nonvisible') : el.classList.add('nonvisible')" name="add-purchase"/>
                                <div class="control__indicator" style="left: 18px;"></div>
                            </div>
                        </label>
                        <label class="size nonvisible" id="add-purchase-color">
                            <img class="url-load" data-way="/img/img-28.svg" src="" alt="">
                            <select class="field" name="add-purchase-color">
                                <option selected="" disabled=""><?php echo($contentText["chooseColorDressAddPurchase"][$lang]) ?></option>
                                <?php foreach ($product['add_purchase']['colors'] as $color) { ?>
                                    <option data-val="<?php echo($color['id']) ?>"
                                            value="<?php echo($color['id']) ?>"><?php echo($color['name'][$lang]) ?></option>
                                <?php } ?>
                            </select>
                        </label>
                        <?php } ?>

                        <input class="btn-color" type="submit" value="<?php echo($contentText["orderText"][$lang]) ?>">
                    </form>
                    <div class="top_count"><?php echo($contentText["left"][$lang]) ?>
                        <span><?php echo($product['topImages']["quantity"]) ?></span> <?php echo($contentText["itemsSale"][$lang]) ?>!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popap-table sec-table table">
    <div class="popap-table-wrap content-tabs">
        <div class="popap-table-wrapper content">
            <div class="popap-table-item">
                <svg class="close-popap table" width="17px" height="17px" viewBox="0 0 17 17" version="1.1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: Sketch 41.2 (35397) - http://www.bohemiancoding.com/sketch -->
                    <title>ic_cancel</title>
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round">
                        <g id="24-px-Icons" transform="translate(-364.000000, -124.000000)" stroke="#000000">
                            <g id="ic_cancel" transform="translate(360.000000, 120.000000)">
                                <g id="cross">
                                    <g transform="translate(5.000000, 5.000000)" stroke-width="2">
                                        <path d="M0,0 L14.1421356,14.1421356" id="Line"></path>
                                        <path d="M14,0 L1.77635684e-15,14" id="Line"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                <div class="tit-tab">
                    <span> <?php echo($contentText["sizesTable"][$lang]) ?> </span>
                </div>
                <div class="wrapper_tabs">
                    <div class="block-tab table">
                        <div>
                            <table>
                                <tbody>
                                <?php foreach ((key_exists('table', $product) ? $product['table'] : $table) as $nameTr => $tr) { ?>
                                    <tr>
                                        <?php foreach ($tr as $td) { ?>
                                            <td><?php echo($nameTr == 'row1' ? $td[$lang] : $td) ?></td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="line-tab"></div>
                    <div class="block-tab info">
                        <div class="tit-tab">
                            <span><?php echo($contentText["howToSize"][$lang]) ?>?</span>
                        </div>
                        <div style="margin-left:10px">
                            <div class="info_wrapper">
                                <img src="/<?php echo($info["img"]) ?>" alt="">
                                <div>
                                    <?php echo($info["text"][$lang]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popap-table form">
    <div class="popap-table-wrap">
        <div class="popap-table-wrapper">
            <div class="popap-table-item">
                <svg class="close-popap form" width="17px" height="17px" viewBox="0 0 17 17" version="1.1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round">
                        <g id="24-px-Icons" transform="translate(-364.000000, -124.000000)" stroke="#000000">
                            <g id="ic_cancel" transform="translate(360.000000, 120.000000)">
                                <g id="cross">
                                    <g transform="translate(5.000000, 5.000000)" stroke-width="2">
                                        <path d="M0,0 L14.1421356,14.1421356" id="Line"></path>
                                        <path d="M14,0 L1.77635684e-15,14" id="Line"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                <div class="title"><?php echo($contentText["orderPhone"][$lang]) ?></div>
                <form action="/<?php echo $_SESSION['lang'] ?>/request-phone" method="post">
                    <input type="text" class="hidden" value="<?php echo $_SESSION['product'] ?>" name="form_product_id" id="form_product_id">
                    <label class="name">
                        <img class="url-load" data-way="/img/img-21.png" src="" alt="">
                        <input class="inp" type="text" name="name"
                               placeholder="<?php echo($contentText["nameInput"][$lang]) ?>" required="">
                    </label>
                    <label class="phone" style="margin-bottom: 25px;">
                        <img class="url-load" data-way="/img/img-30.svg" src="" alt="">
                        <input class="inp inp-phone" type="tel" name="phone"
                               placeholder="<?php echo($contentText["phoneInput"][$lang]) ?>"
                               required="">
                    </label>
                    <input class="btn-color" type="submit"
                           value="<?php echo($contentText["waitingForPhone"][$lang]) ?>">
                </form>
                <div class="text"><?php echo($contentText["workTime"][$lang]) ?></div>
            </div>
        </div>
    </div>
</div>
<div id="popup__toggle" class="popup__toggle">
    <div class="circle-fill" style="transform-origin: center;"></div>
    <div class="img-circle" style="transform-origin: center;">
        <div class="img-circleblock" style="transform-origin: center;">
            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24.9941 19.0254L21.653 15.5684C21.6499 15.5652 21.6467 15.562 21.6435 15.5589C20.7162 14.6315 19.2152 14.6314 18.2878 15.5589L16.7624 17.0842C16.0599 17.7867 14.9228 17.7868 14.2202 17.0842C14.2199 17.0839 14.2196 17.0836 14.2193 17.0832L8.91459 11.904C8.21207 11.2015 8.21196 10.0644 8.91459 9.36179L10.4399 7.83645C11.3652 6.91128 11.3652 5.40587 10.4399 4.4807L7.08419 1.12496C6.15896 0.199843 4.65361 0.199843 3.72844 1.12496C3.72812 1.12528 2.60963 2.24382 2.60989 2.24351C2.60963 2.24382 2.50848 2.34491 2.50822 2.34523C-0.835555 5.68895 -0.836768 11.1012 2.50875 14.4467L11.678 23.4906C15.0144 26.8269 20.4175 26.8393 23.7673 23.5023C23.7856 23.4854 24.9711 22.3935 24.9887 22.3758C25.9121 21.4524 25.9139 19.951 24.9941 19.0254ZM4.84704 2.24351C5.15543 1.93512 5.6572 1.93512 5.96559 2.24351L9.32133 5.59925C9.63046 5.90843 9.63051 6.40867 9.32133 6.71785L8.76208 7.2771L4.28774 2.80281L4.84704 2.24351ZM12.796 22.3715L3.62677 13.3277C1.04289 10.7437 0.920339 6.66918 3.19029 3.9425L7.64892 8.40113C6.48112 9.72692 6.52968 11.7562 7.79699 13.0235L13.1026 18.2037C14.3707 19.4708 16.3936 19.523 17.7232 18.35L22.1815 22.8082C19.4279 25.0956 15.3779 24.9532 12.796 22.3715ZM23.8795 21.2477L23.348 21.7375L18.8471 17.2366L19.4063 16.6774C19.7145 16.3693 20.2118 16.3684 20.521 16.6734C20.5272 16.6798 23.8639 20.1323 23.8701 20.1386C24.1754 20.4439 24.1785 20.9386 23.8795 21.2477Z"
                      fill="#252525"/>
            </svg>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="footer_wrap">
            <div class="tit"><?php echo($contentText["footerPartner"][$lang]) ?></div>
            <div class="list-logo">
                <img class="url-load" data-way="/img/img-17.png" src="" alt="">
                <img class="url-load" data-way="/img/img-18.png" src="" alt="">
                <img class="url-load" data-way="/img/img-19.png" src="" alt="">
            </div>
            <div class="bottom">
                <div class="logo">
                    <span class="logo"><?php echo($contentText["applicationName"][$lang]) ?></span>
                    <span class="sub"><?php echo($contentText["footerBrand"][$lang]) ?></span>
                </div>
                <div class="cont">
                    <?php echo($contentText["footerAddress"][$lang]) ?>
                </div>
                <div class="links">
                    <a href=""><?php echo($contentText["footerPolitics"][$lang]) ?></a>
                    <a href=""><?php echo($contentText["footerOff"][$lang]) ?></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Script for UTM -->
<script>
    $(document).ready(function () {
        var queryString = window.location.search;

        if (queryString.includes("is_present")) document.getElementById('is_present_field').value = '<?php echo($_SESSION['present_order_id']) ?>';

        var pathString = window.location.pathname;
        console.log(pathString);
        console.log(queryString);
        var utmLinks = document.getElementsByClassName('utm-link');
        var langLinks = document.getElementsByClassName('lang-link');
        for (var i = 0; i < utmLinks.length; i++) {
            utmLinks[i].href += queryString;
        }
        for (i = 0; i < langLinks.length; i++) {
            langLinks[i].href += queryString + (queryString.length > 0 ? '&' : '?') + 'current_pathurl_lang=' + pathString;
            console.log(langLinks[i].href);
        }
    });

    const colorSizes = {
      <?php foreach ($product['colors'] as $color) { ?>
           "<?php echo($color['id']) ?>" : {
             <?php foreach ($color['sizes'] ?? [] as $size) { ?>
                 "<?php echo($size['id']) ?>" : "<?php echo($size['value']) ?>",
             <?php } ?>
           },
      <?php } ?>
    };

    const sizeText = "<?php echo($contentText['chooseSize'][$lang]) ?>";

    function changedColor()
    {
        console.log('changed!');
        let color = document.getElementById('select-color').value;
        let size = document.getElementById('select-size');
        let sizes = colorSizes[color];
        console.log(sizes);
        if(sizes) {
           size.disabled = false;
           size.innerHTML = getOptionsText(sizes);
           console.log( getOptionsText(sizes) );
       } else {
           size.disabled = true;
           size.innerHTML = '<option selected="" disabled="">' + sizeText + '</option>';
        }
    }

    function getOptionsText(sizes) {
       let text  = '<option selected="" disabled="">' + sizeText + '</option>';
       for(let k in sizes) {
           if(sizes.hasOwnProperty(k)) text += '<option value="' + k + '">' + sizes[k] + '</option>'
       }
       return text;
    }

</script>

</body>

</html>
