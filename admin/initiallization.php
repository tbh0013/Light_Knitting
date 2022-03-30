<?php
session_start();

$pdo = new PDO("mysql:dbname=knit_shop", "root");
$errors = array();