<?php

error_reporting(E_ALL);
include 'Model/Article.php';

if (isset($_POST['username']) && isset($_POST['articletitle']) && isset($_POST['art']) && isset($_POST['update_publishtime']) && !empty($_POST['username']) && !empty($_POST['articletitle']) && !empty($_POST['art']) && !empty($_POST['update_publishtime'])) {
    $name = $_POST['username'];
    $title = $_POST['articletitle'];
    $art = $_POST['art'];
    $publishtime = $_POST['update_publishtime'];

    $article = new Article();
    $insertData = $article->insertData(addslashes($name), addslashes($title), addslashes($art), addslashes($publishtime));
    echo json_encode($insertData);

}
?>