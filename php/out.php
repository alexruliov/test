<?php
setcookie('login', '', time()-(365*24*60*60));
setcookie('password', '', time()-(365*24*60*60));
header('Location: ../index.html');
