<?php

require_once '../initiallization.php';

$posts['name'] = htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8');

$category_st = $pdo->prepare("INSERT INTO categories(name)VALUES(:name)");
$category_st->bindParam(':name', $posts['name']);
$category_st->execute();

header('location: category_list.php');

