<?php
require_once 'initiallization.php';

$newslist = array();

$news_st = $pdo->query('SELECT DATE_FORMAT(date, "%Y-%m-%d") as t_date, news_id, text,url,image_path FROM news');
$news_st->setFetchMode(PDO::FETCH_ASSOC);
$newslist = $news_st->fetchAll();

require_once 'views/v_news.php';