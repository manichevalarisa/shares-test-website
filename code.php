<?php


$product = $products[$_SESSION['product'] ? $_SESSION['product']  : array_keys($products)[0]];
$lang = $_SESSION['lang'] ? $_SESSION['lang'] : 'ru';

