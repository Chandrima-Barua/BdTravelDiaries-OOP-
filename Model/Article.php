<?php

// namespace App\Model;

// use App\config\Database;

include 'config/Database.php';

class Article extends Database
{
    private $articlenumber;
    private $username;
    private $articletitle;
    private $articletext;
    private $publishtime;


     public function insertData($username, $articletitle, $articletext, $publishtime)
     {
         $query = "INSERT INTO `articles` (`username`,`articletitle`, `articletext`,`publishtime`) VALUES ('$username','$articletitle','$articletext','$publishtime')";
         $database = new Database();
         $all = $database->Insert($query);
         return $all;
     }
    public function getData()
    {

        $stmt = 'select * FROM `articles`';
        $database = new Database();
        $all = $database->Select($stmt);

        return $all;
    }

    public function abusiveChecked($username, $articlenumber)
    {
        $abusiveStmt = "select COUNT(`flagabusive`) as abusive from `flags`  where `username`= '$username' and flagabusive = 1 and articlenumber ='$articlenumber' ";
        $abusiveData = new Database();
        $data = $abusiveData->Select($abusiveStmt);
        $count = (int) $data[0]['abusive'];
        if ($count === 0) {
            return true;
        } else {
            return false;
        }
    }

    public function spamChecked($username, $articlenumber)
    {
        $spamStmt = "select COUNT(`flagspam`) as spam from `flags`  where `username`= '$username' and flagspam = 1 and articlenumber ='$articlenumber' ";
        $spamData = new Database();
        $data = $spamData->Select($spamStmt);
        $count = (int) $data[0]['spam'];
        if ($count === 0) {
            return true;
        } else {
            return false;
        }
    }

    public function copyChecked($username, $articlenumber)
    {
        $copyStmt = "select COUNT(`flagcopyright`) as copy from `flags`  where `username`= '$username' and flagcopyright = 1 and articlenumber ='$articlenumber'";
        $copyData = new Database();
        $data = $copyData->Select($copyStmt);
        $count = (int) $data[0]['copy'];
        if ($count === 0) {
            return true;
        } else {
            return false;
        }
    }
}
