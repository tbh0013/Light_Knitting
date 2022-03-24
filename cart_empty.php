<?php
require_once 'initiallization.php';

$_SESSION['cart'] = array();
$_SESSION['size'] = array();
header('Location: cart.php');