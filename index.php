<?php
session_start();

$pdo = new PDO("mysql:dbname=knit_shop", "root");

$products_st = $pdo->query("SELECT * FROM products");
$products_st->setFetchMode(PDO::FETCH_ASSOC);
$products = $products_st->fetchAll();

$news_st = $pdo->query("SELECT * FROM news");
$news_st->setFetchMode(PDO::FETCH_ASSOC);
$news_s = $news_st->fetchAll();

$lineup_join_category = "SELECT
                        products.product_id,
                        products.is_line_up,
                        products.image_path,
                        categories.name
                        FROM products
                        LEFT JOIN categories
                        ON products.category_id = categories.category_id
                        WHERE products.is_line_up = 1";
$lineup_st = $pdo->query($lineup_join_category);

$lineup_st->setFetchMode(PDO::FETCH_ASSOC);
$lineups = $lineup_st->fetchAll();

$top_news_st = $pdo->query('SELECT DATE_FORMAT(date, "%Y-%m-%d") as t_date,text,url,news_id FROM news ORDER BY date DESC LIMIT 5');
$top_news_st->setFetchMode(PDO::FETCH_ASSOC);
$top_news = $top_news_st->fetchAll();

require_once 'views/v_index.php';