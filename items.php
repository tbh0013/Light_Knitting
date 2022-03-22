<?php
session_start();

$products = array();
$categories = array();

$pdo = new PDO("mysql:dbname=knit_shop", "root");

if (isset($_GET['category_id'])) {
    $categories_id = $_GET['category_id'];
    $products_st = $pdo->query("SELECT * FROM products WHERE category_id=$categories_id");
    $products_st->setFetchMode(PDO::FETCH_ASSOC);
    $products = $products_st->fetchAll();

    $categories_st = $pdo->query("SELECT category_id, name FROM categories WHERE category_id = $categories_id");
    $categories_st->setFetchMode(PDO::FETCH_ASSOC);
    $categories = $categories_st->fetchAll();
} else {
    $categories[0]['name'] = "All Items";
    $products_st = $pdo->query("SELECT * FROM products");
    $products_st->setFetchMode(PDO::FETCH_ASSOC);
    $products = $products_st->fetchAll();
}

require_once 'views/v_items.php';