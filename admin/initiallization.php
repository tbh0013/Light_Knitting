<?php
session_start();

$pdo = new PDO("mysql:dbname=knit_shop", "root");
$errors = array();

$category_list_st = $pdo->query("SELECT category_id, name FROM categories WHERE is_deleted = 0");
$category_list_st->setFetchMode(PDO::FETCH_ASSOC);
$category_list = $category_list_st->fetchAll();