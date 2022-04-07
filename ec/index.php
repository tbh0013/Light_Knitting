<?php
require_once 'initiallization.php';

$category_sql = "SELECT
                category_id,
                name
                FROM categories
                WHERE is_deleted = 0";
$category_st = $pdo->query($category_sql);
$category_st->setFetchMode(PDO::FETCH_ASSOC);
$categories = $category_st->fetchAll();

$lineup_sql = "SELECT
                products.product_id,
                products.is_line_up,
                products.image_path,
                categories.name
                FROM products
                LEFT JOIN categories
                ON products.category_id = categories.category_id
                WHERE products.is_line_up = 0
                AND products.is_deleted = 0";
$lineup_st = $pdo->query($lineup_sql);
$lineup_st->setFetchMode(PDO::FETCH_ASSOC);
$lineups = $lineup_st->fetchAll();

$top_news_sql = 'SELECT
                    DATE_FORMAT(date, "%Y-%m-%d") as t_date,
                    title,
                    url,
                    news_id
                    FROM news
                    WHERE is_deleted = 0
                    ORDER BY date DESC LIMIT 5';
$top_news_st = $pdo->query($top_news_sql);
$top_news_st->setFetchMode(PDO::FETCH_ASSOC);
$top_news = $top_news_st->fetchAll();

require_once 'views/v_index.php';