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
    echo  "<div class='velcome'> Welcome, $username! </div>";
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
    <link href="../css/style1.css" rel="stylesheet">
    </head>
<body>
<div class="wrapper">

    <header class="header">
    </header><!-- .header-->

    <div class="middle">

        <div class="container">

            <main class="content">

                <table border="2" width="100%">
                <caption>Оказываемые услуги</caption>
                    <tr>
                    <th>Услуги</th>
                    <th>Цена</th>
                    <th>Очистить</th>
                    </tr>
                    <tr><td>Уборка квартир, домов, офисных , складских, торговых и других помещений после ремонта.</td><td id="ono">$1000000</td><td id="ono"><a href="1.php"><img src="../images/del.png" width="50" height="50"></a></td></tr>
                    <tr><td>Генеральная уборка помещений</td><td id="ono">4</td><td id="ono"><a href="1.php"><img src="../images/del.png" width="50" height="50"></a></td></tr>
                    <tr><td>Ежедневная или периодическая поддерживающая уборка помещений</td><td id="ono">4,5</td><td id="ono"><a href="1.php"><img src="../images/del.png" width="50" height="50"></a></td></tr>
                    <tr><td>Мытье окон, элементов остекления балконов и лоджий</td><td id="ono">5</td><td id="ono"><a href="1.php"><img src="../images/del.png" width="50" height="50"></a></td></tr>
                    <tr><td>Химчистка мягкой мебели и ковровых покрытий</td><td id="ono">5,5</td><td id="ono"><a href="1.php"><img src="../images/del.png" width="50" height="50"></a></td></tr>
                    <tr><td></td><td id="ono">0</td><td id="ono"><a href="1.php"><img src="../images/del.png" width="50" height="50"></a></td></tr>
                    <tr><td></td><td id="ono">0</td><td id="ono"><a href="../php/out.php"><img src="../images/del.png" width="50" height="50"></a></td></tr>
                    </table>
                <br>
                <form method="post" action="../php/out.php">
                <input type="submit" class="butt" value="Выйти">
                </form>
                <form method="post" action="">
                <input type="submit" class="butt" value="Сoхранить">
                </form>
            </main><!-- .content -->
        </div><!-- .container-->



    </div><!-- .middle-->
</div>
</div><!-- .wrapper -->
<footer class="footer">
    <strong>Footer:</strong> Mus elit Morbi mus enim lacus at quis Nam eget morbi. Et semper urna urna non at cursus dolor vestibulum neque enim. Tellus interdum at laoreet laoreet lacinia lacinia sed Quisque justo quis. Hendrerit scelerisque lorem elit orci tempor tincidunt enim Phasellus dignissim tincidunt. Nunc vel et Sed nisl Vestibulum odio montes Aliquam volutpat pellentesque. Ut pede sagittis et quis nunc gravida porttitor ligula.
</footer><!-- .footer -->
<!-- <img src="images/clin.jpg" class="img" alt="Картинка с моющими средствами"> -->
</body>
</html>