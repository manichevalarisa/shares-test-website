<?php

include __DIR__ . '/vendor/autoload.php';
include(__DIR__ . "/content.php");

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

$pre = '';

function processInput($uri)
{
    $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    $period_cookie = 2592000; // 30 дней (2592000 секунд)

    if ($_GET) {
        setcookie("utm_source", $_GET['utm_source'], time() + $period_cookie);
        setcookie("utm_medium", $_GET['utm_medium'], time() + $period_cookie);
        setcookie("utm_term", $_GET['utm_term'], time() + $period_cookie);
        setcookie("utm_content", $_GET['utm_content'], time() + $period_cookie);
        setcookie("utm_campaign", $_GET['utm_campaign'], time() + $period_cookie);
    }

    if (!isset($_SESSION['utms'])) {
        $_SESSION['utms'] = array();
        $_SESSION['utms']['utm_source'] = '';
        $_SESSION['utms']['utm_medium'] = '';
        $_SESSION['utms']['utm_term'] = '';
        $_SESSION['utms']['utm_content'] = '';
        $_SESSION['utms']['utm_campaign'] = '';
    }

    $_SESSION['utms']['utm_source'] = $_GET['utm_source'] ? $_GET['utm_source'] : $_COOKIE['utm_source'];
    $_SESSION['utms']['utm_medium'] = $_GET['utm_medium'] ? $_GET['utm_medium'] : $_COOKIE['utm_medium'];
    $_SESSION['utms']['utm_term'] = $_GET['utm_term'] ? $_GET['utm_term'] : $_COOKIE['utm_term'];
    $_SESSION['utms']['utm_content'] = $_GET['utm_content'] ? $_GET['utm_content'] : $_COOKIE['utm_content'];
    $_SESSION['utms']['utm_campaign'] = $_GET['utm_campaign'] ? $_GET['utm_campaign'] : $_COOKIE['utm_campaign'];

    return $uri;
}

function processOutput($response)
{
    return json_encode($response);
}

$router = new RouteCollector();

/**
 * Send the order data to admin email
 * @param string $adminEmail
 * @param string $product
 * @param string $size
 * @param string $color
 * @param string $phone
 * @param string $name
 * @param string $status
 * @param string $orderId
 * @param string $orderType
 * @param boolean $addPurchase
 * @param string $addPurchaseColor
 * @return boolean
 */
function sendOrderToEmail($adminEmail, $product, $size, $color, $phone, $name, $status, $orderId, $orderType, bool $addPurchase, $addPurchaseColor)
{
    $email2 = $adminEmail;
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: <no-reply@amoslook.com>' . "\r\n";
    $subject2 = "New Order";
    $message2 = "
        You have a new order. <br>
        <br> Order ID: " . $orderId . "
        <br> Order CRM Status: " . $status . "
        <br> Order Type: " . $orderType . "
        <br> Product: " . $product . "
        <br> Size: " . $size . "
        <br> Color: " . $color . "
        <br> Допродажа: " . ($addPurchase ? 'Да.' : 'Нет.') . ($addPurchase ? ("<br> Допродажа Цвет: " . $addPurchaseColor) : "") . "
        <br> Phone: " . $phone . "
	    <br> Name: " . $name;

    return $mail = mail($email2, $subject2, $message2, $headers);
}

/**
 * Send the order data to CRM
 * @param mixed $orderId
 * @param string $crmKey
 * @param string $product
 * @param string $size
 * @param string $color
 * @param string $phone
 * @param string $name
 * @param string $orderType
 * @param boolean $addPurchase
 * @param string $addPurchaseColor
 * @return boolean
 */
function sendOrderToCMS($orderId, $crmKey, $product, $name, $phone, $size, $color, $orderType, bool $addPurchase, $addPurchaseColor, $productId)
{
    $client = new \RetailCrm\ApiClient(
        'https://amoslook.retailcrm.ru/',
        $crmKey,
        \RetailCrm\ApiClient::V5
    );

    try {

        $items = $size ? [
            [
                'offer' => [
                    "externalId" => $size
                ],
                "quantity" => 1,
            ],
        ] : [];
        $response = $client->request->ordersCreate(array(
            'firstName' => $name,
            'phone' => $phone,
            'items' => $items,
            'source' => [
                'source' => $_SESSION['utms']['utm_source'],
                'medium' => $_SESSION['utms']['utm_medium'],
                'keyword' => $_SESSION['utms']['utm_term'],
                'content' => $_SESSION['utms']['utm_content'],
                'campaign' => $_SESSION['utms']['utm_campaign'],
            ],
            'customerComment' => 'Страница заказа: продукт - ' . 'http://' . $_SERVER['HTTP_HOST'] . '/ru/' . $productId,
            'orderMethod' => 'land'
        ));
    } catch (\RetailCrm\Exception\CurlException $e) {
        return false;
    }

    if ($response->isSuccessful() && 201 === $response->getStatusCode()) {
        return $response->id;
    } else {
        return false;
    }
}

/**
 * Send the phone request data to CRM
 * @param mixed $orderId
 * @param string $crmKey
 * @param string $phone
 * @param string $name
 * @param string $product
 * @return boolean
 */
function sendPhoneRequestToCMS($orderId, $crmKey, $name, $phone, $product = '/')
{
    $client = new \RetailCrm\ApiClient(
        'https://amoslook.retailcrm.ru/',
        $crmKey,
        \RetailCrm\ApiClient::V5
    );

    try {

        $items = [];
        $response = $client->request->ordersCreate(array(
            'firstName' => $name,
            'phone' => $phone,
            'items' => $items,
            'source' => [
                'source' => $_SESSION['utms']['utm_source'],
                'medium' => $_SESSION['utms']['utm_medium'],
                'keyword' => $_SESSION['utms']['utm_term'],
                'content' => $_SESSION['utms']['utm_content'],
                'campaign' => $_SESSION['utms']['utm_campaign'],
            ],
            'customerComment' => 'Phone Request: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/ru/' . $product,
            'orderMethod' => 'land'
        ));
    } catch (\RetailCrm\Exception\CurlException $e) {
        return false;
    }

    if ($response->isSuccessful() && 201 === $response->getStatusCode()) {
        return $response->id;
    } else {
        return false;
    }
}

/**
 * Get Main Landing page (redirect to language)
 *
 * @return mixed
 */
$router->get($pre . '/', function () {
    header("Location: " . "http://amoslook.com/");
    exit();
});

/**
 * Get the landing page for the language
 *
 * @return mixed
 */
$router->get($pre . '/{lang}', function ($lang) {
    header("Location: " . "http://amoslook.com/");
    exit();
});

/**
 * Send the request for a new order
 *
 * @return mixed
 */
$router->post($pre . '/{lang}/{product}/request-order', function ($lang, $product) use ($languages, $products, $adminEmail, $crmKey) {
    if (!in_array($lang, $languages)) return include("404.php");
    else if (!in_array($product, array_keys($products))) return include("404.php");
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    $_SESSION['lang'] = $lang;

    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $addPurchase = $_POST['add-purchase'] == 'on' ? true : false;
    $addPurchaseColor = $_POST['add-purchase-color'];

    if (!empty($phone) && !is_null($phone)) {
        $orderId = number_format(round(microtime(true) * 10), 0, '.', '');
        $status = false;
        $orderType = !(isset($_SESSION['present_order_id']) && $_POST['is_present'] && $_POST['is_present'] == $_SESSION['present_order_id']) ? 'Main Order' : 'Present Order (Main Order ID = ' . $_SESSION['present_order_id'] . ')';
        try {
            $status = sendOrderToCMS($orderId, $crmKey, $color, $name, $phone, $size, $color, $orderType, $addPurchase, $addPurchaseColor, $product);
        } catch (Exception $exception) {
        }

        $mail = sendOrderToEmail($adminEmail, $product, $size, $color, $phone, $name, $status, $orderId, $orderType, $addPurchase, $addPurchaseColor);


        if ($mail === true) {

            $period_cookie = 2592000;
            setcookie("present_order_id", $orderId, time() + $period_cookie);
            $_SESSION['present_order_id'] = $orderId;
            $_SESSION['is_thanks_redirect'] = 1;

            header("Location: /" . $lang . "/" . $product . "/thanks");
            exit();
        } else return include('send_error.php');
    } else return include('send_error_data.php');
});

/**
 * Send the request for a phone call
 *
 * @return mixed
 */
$router->post($pre . '/{lang}/request-phone', function ($lang) use ($languages, $adminEmail, $crmKey) {
    if (!in_array($lang, $languages)) return include("404.php");
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    $_SESSION['lang'] = $lang;

    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $product = isset($_POST['form_product_id']) ? ( $_POST['form_product_id']) : '/';

    if (!empty($phone) && !is_null($phone)) {
        $email2 = $adminEmail;
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= 'From: <no-reply@amoslook.com>' . "\r\n";
        $subject2 = "New Phone Request";
        $message2 = "
        You have a new phone request. <br>
        <br> Phone: " . $phone . "
	    <br> Name: " . $name;

        $orderId = number_format(round(microtime(true) * 10), 0, '.', '');
        try {
            sendPhoneRequestToCMS($orderId, $crmKey, $name, $phone, $product);
        } catch (Exception $exception) {
        }

        $mail = mail($email2, $subject2, $message2, $headers);

        if ($mail === true) {
            header("Location: /" . $lang . "/thanks-phone"); /* Redirect browser */
            exit();
        } else return include('send_error.php');
    } else return include('send_error_data.php');
});

/**
 * Thanks page after phone request
 *
 * @return mixed
 */
$router->get($pre . '/{lang}/thanks-phone', function ($lang) use ($languages) {
    if (!in_array($lang, $languages)) return include("404.php");
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    $_SESSION['lang'] = $lang;
    return include("thank_phone.php");
});

/**
 * Thanks page after order creation
 *
 * @return mixed
 */
$router->get($pre . '/{lang}/{product}/thanks', function ($lang, $product) use ($languages, $products) {
    if (!in_array($lang, $languages)) return include("404.php");
    else if (!in_array($product, array_keys($products))) return include("404.php");
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    if (!isset($_SESSION['is_thanks_redirect']) || !$_SESSION['is_thanks_redirect']) return include("404.php");
    unset($_SESSION['is_thanks_redirect']);
    $_SESSION['lang'] = $lang;
    $_SESSION['product'] = $product;
    return include("thank.php");
});

/**
 * Change the language
 *
 * @return mixed
 */
$router->get($pre . '/lang/{lang}', function ($lang) use ($languages) {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    $_SESSION['lang'] = $lang;
    if (!in_array($lang, $languages)) return 3;
    $slug = $_GET['current_pathurl_lang'] ? $_GET['current_pathurl_lang'] : '';
    $parameters = $_SERVER['QUERY_STRING'];
    if (!empty($slug)) {
        $urlArray = explode('/', $slug);
        $url = '';
        if (count($urlArray) > 2) {
            for ($i = 2; $i < count($urlArray); $i++) {
                $url = '/' . $urlArray[$i];
            }
        }
        $redirectUrl = $lang . $url;
    } else {
        $redirectUrl = $lang;
    }
    $parametersString = '';
    foreach (explode('&', $parameters) as $parameter) {
        if (strpos($parameter, 'current_pathurl_lang') === false) $parametersString .= (strlen($parametersString) > 0 ? '&' : '') . $parameter;
    }
    header("Location: " . "/" . $redirectUrl . (strlen($parametersString) > 0 ? ('?' . $parametersString) : ''));
    exit();

});

/**
 * Get the product's page for the language
 *
 * @return mixed
 */
$router->get($pre . '/{lang}/{product}', function ($lang, $product) use ($languages, $products) {
    if (!in_array($lang, $languages)) return include("404.php");
    else if (!in_array($product, array_keys($products))) return include("404.php");

    if (session_status() !== PHP_SESSION_ACTIVE) session_start();

    $_SESSION['product'] = $product;
    $_SESSION['lang'] = $lang;

    $filename = './' . $product . '/landing.php';

    if (file_exists($filename)) return include($filename);
    else return include("landing.php");
});


$dispatcher = new Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], processInput($_SERVER['REQUEST_URI']));

processOutput($response);

?>
