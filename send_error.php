<!doctype html>
<html class="no-js" lang="<?php echo $_SESSION['lang'] ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo($contentText["sorryDidNotSend"][$lang]) ?>...</title>
    <style type="text/css">
        body{background:#F3F3F3;font-family:Arial}.main{text-align:center;font-size:30px;font-weight:700;color:#000;margin-top:150px}.main p{font-size:30px;line-height:1.7}.btn{display:block;width:280px;color:#fff;font-size:18px;text-align:center;background:#E34040;border-radius:20px;text-decoration:none;padding:12px 0;margin:20px auto;text-transform:uppercase}.btn:hover{background:red}b{color:red}
    </style>
</head>
<body>
<div class="main">
    <p><?php echo($contentText["sorrySendFull"][$lang]) ?><br></p>
    <a href="/<?php echo $_SESSION['lang'] ?>" class="btn"><?php echo($contentText["goBack"][$lang]) ?></a>
</div>
</body>
</html>
