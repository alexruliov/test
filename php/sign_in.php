<?php
$realm = 'Запретная зона';

//user => password
$users = array('admin' => 'mypass', 'guest' => 'guest');


if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
        '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');

    die('Текст, отправляемый в том случае, если пользователь нажал кнопку Cancel');
}


// анализируем переменную PHP_AUTH_DIGEST
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($users[$data['username']]))
    die('Неправильные данные!');


// генерируем корректный ответ
$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

if ($data['response'] != $valid_response)
    die('Неправильные данные!');

// ok, логин и пароль верны
echo 'Вы вошли как: ' . $data['username'];


// функция разбора заголовка http auth
function http_digest_parse($txt)
{
    // защита от отсутствующих данных
    $needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
    $data = array();
    $keys = implode('|', array_keys($needed_parts));

    preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

    foreach ($matches as $m) {
        $data[$m[1]] = $m[3] ? $m[3] : $m[4];
        unset($needed_parts[$m[1]]);
    }

    return $needed_parts ? false : $data;
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