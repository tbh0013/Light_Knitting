<?php
    session_start();

    $_SESSION['cart'] = array();
    $_SESSION['size'] = array();
    header('Location: cart.php');
?>