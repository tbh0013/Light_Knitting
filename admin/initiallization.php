<?php
session_start();

$db = parse_url(getenv("DATABASE_URL"));
$pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));
// $pdo = new PDO("mysql:dbname=knit_shop", "root");

$errors = array();

$category_list_st = $pdo->query("SELECT category_id, name FROM categories WHERE is_deleted = 0");
$category_list_st->setFetchMode(PDO::FETCH_ASSOC);
$category_list = $category_list_st->fetchAll();