<?php

error_reporting(E_ALL);
include 'Model/Flag.php';
if (isset($_POST['username']) && isset($_POST['art_number']) && isset($_POST['abusive']) && isset($_POST['spam']) && isset($_POST['copyrighted']) && isset($_POST['update_publishtime']) && isset($_POST['record']) && !empty($_POST['username']) && !empty($_POST['art_number']) && !empty($_POST['update_publishtime'])) {
    $username = $_POST['username'];
    $art_number = $_POST['art_number'];
    $abusive = $_POST['abusive'];
    $spam = $_POST['spam'];
    $copyrighted = $_POST['copyrighted'];
    $publishtime = $_POST['update_publishtime'];
    $record = $_POST['record'];

    $flag = new Flag();
    $insertFlag = $flag->insertFlag(addslashes($username), $art_number, $abusive, $spam,$copyrighted, $publishtime,$record);
    echo json_encode($insertFlag);

}
