<?php
require_once 'initiallization.php';

$newslist = array();

$news_sql = "SELECT
                to_char(date,'YYYY-MM-DD') as t_date,
                news_id,
                title,
                text,
                url,
                image_path
                FROM news
                WHERE is_deleted = 0
                ORDER BY date DESC";

$news_st = $pdo->query($news_sql);
$news_st->setFetchMode(PDO::FETCH_ASSOC);
$newslist = $news_st->fetchAll();

require_once 'views/v_news.php';