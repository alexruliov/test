<?php
function validate($user, $pass) {
    /* Заменить соответствующей проверкой имени пользователя
    и пароля - например, проверкой по базе данных */
    $users = array('admin' => '1234',
        'adam' => '8HEj838');
    if (isset($users[$user]) && ($users[$user] === $pass)) {
        return true;
    } else {
        return false;
    }
}
$secret_word = 'if i ate spinach';
if (validate($_POST['login'],$_POST['pass'])) {
    setcookie('login',
        $_POST['login'].','.md5($_POST['login'].$secret_word));
}
unset($username);
if (isset($_COOKIE['login'])) {
    list($c_username, $cookie_hash) = split(',', $_COOKIE['login']);
    if (md5($c_username.$secret_word) == $cookie_hash) {
        $username = $c_username;
    } else {
        print "You have sent a bad cookie.";
    }
}
if (isset($username)) {
    print "Welcome, $username.";
} else {
    header("Location: ../index.html");;
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <title>Чысцiня i парадак</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../css/style.css" rel="stylesheet">
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script>
$(document).ready(function(){
    $("#img1").click (function () {
        $("#load").load("1.html")})
        })
    </script>
</head>

<body>

<div class="wrapper">

    <header class="header">
        <div class="sitebrand"><p class="clin">Чысцiня i парадак</p></div>
        <ul class="nav">
            <li><a href="../index.html">Главная</a></li>
            <li><a href="contacts.html">Контакты</a></li>
            <li><a href="2.html">Прайс</a></li>
            <li><a href="3.html">Отзывы</a></li>
            <li><a href="4.html">Empty</a></li>
            <li><a href="5.html">Empty</a></li>
            <li><a href="5.html">Empty</a></li>
        </ul>
    </header><!-- .header-->

    <div class="middle">

        <div class="container">
            <main class="content">

            </main><!-- .content -->
        </div><!-- .container-->



    </div><!-- .middle-->

</div><!-- .wrapper -->

<footer class="footer">
    <strong>Footer:</strong> Mus elit Morbi mus enim lacus at quis Nam eget morbi. Et semper urna urna non at cursus dolor vestibulum neque enim. Tellus interdum at laoreet laoreet lacinia lacinia sed Quisque justo quis. Hendrerit scelerisque lorem elit orci tempor tincidunt enim Phasellus dignissim tincidunt. Nunc vel et Sed nisl Vestibulum odio montes Aliquam volutpat pellentesque. Ut pede sagittis et quis nunc gravida porttitor ligula.
</footer><!-- .footer -->
<!-- <img src="images/clin.jpg" class="img" alt="Картинка с моющими средствами"> -->
</body>
</html>