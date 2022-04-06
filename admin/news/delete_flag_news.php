<?php

require_once '../initiallization.php';

if ($_SESSION['admin_login'] === false) {
    header("Location: ./../index.php");
    exit();
}

$news_id = htmlspecialchars($_GET['news_id'], ENT_QUOTES, 'utf-8');

$check_sql = "SELECT is_deleted FROM news WHERE news_id = $news_id";
$check_st = $pdo->query($check_sql);
$check_st->execute();
$checks = $check_st->fetchAll(PDO::FETCH_ASSOC);

foreach($checks as $check) {
    if($check['is_deleted'] === "0") {
        var_dump($check['is_deleted']);
        $deleted_sql = "UPDATE news SET
                        is_deleted=:is_deleted
                        WHERE news_id = $news_id";

        $deleted_st = $pdo->prepare($deleted_sql);
        $flag = 1;
        $deleted_st->bindParam(':is_deleted', $flag, PDO::PARAM_INT);
        $deleted_st->execute();
        header('location: news_list.php');
        exit();
    } else if($check['is_deleted'] === "1"){
        $deleted_sql = "UPDATE news SET
                        is_deleted=:is_deleted
                        WHERE news_id = $news_id";

        $deleted_st = $pdo->prepare($deleted_sql);
        $flag = 0;
        $deleted_st->bindParam(':is_deleted', $flag, PDO::PARAM_INT);
        $deleted_st->execute();
        header('location: news_list.php');
        exit();
    }
}
