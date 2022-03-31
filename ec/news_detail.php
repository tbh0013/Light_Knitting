<?php

$pdo = new PDO("mysql:dbname=knit_shop", "root");
$news_id = $_GET['news_id'];

$news_st = $pdo->query("SELECT DATE_FORMAT(date, '%Y-%m-%d') as t_date, news_id,title, text, url, image_path, product_id, is_deleted FROM news WHERE news_id = $news_id AND is_deleted = 0");
$news_st->setFetchMode(PDO::FETCH_ASSOC);
$newslist = $news_st->fetchAll();

if($newslist === array()) {
    header('location: no_page.php');
    exit();
}

require_once 'views/v_news_detail.php';