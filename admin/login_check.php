<?php

require_once './initiallization.php';

$email = isset($_POST['email'])? htmlspecialchars($_POST['email'], ENT_QUOTES, 'utf-8') : '';
$password = isset($_POST['password'])? htmlspecialchars($_POST['password'], ENT_QUOTES, 'utf-8') : '';

if ($email === '') {
    header("Location: ./index.php");
    exit();
}

if ($password === '') {
    header("Location: ./index.php");
    exit();
}

if ($email === 'knit@admin.com' && $password === '0000') {
    $_SESSION['admin_login'] = true;
    header("Location: ./menu.php");
    exti();
} else {
    header("Location: ./index.php");
    exit();
}

