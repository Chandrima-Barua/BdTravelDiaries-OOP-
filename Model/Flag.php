<?php
include 'config/Database.php';

class Flag extends Database
{
    public function insertFlag($username,$art_number,$abusive,$spam,$copyrighted,$publishtime,$record)
        {
            $query = "INSERT INTO `flags` (`username`,`articlenumber`,`flagabusive`, `flagspam`,`flagcopyright`,`time`, `recorded`) VALUES ('$username','$art_number','$abusive','$spam','$copyrighted','$publishtime','$record')";
            $database = new Database();
            $all = $database->Insert($query);
            return $all;


        }

    public function checkSpam($flag_id){

        $result = "select `flagspam` from `flags` where flagnumber=$flag_id";
        $connection = new Database();
        $data = $connection->Select($result);
        $spam = (int) $data[0]['flagspam'];
        if ($spam == 1) {
            return true;
        } else {
            return false;
        }

    }

    public function checkAbusive($flag_id){

        $result = "select `flagabusive` from `flags` where flagnumber=$flag_id";
        $connection = new Database();
        $data = $connection->Select($result);
        $abusive = (int) $data[0]['flagabusive'];
        if ($abusive == 1) {
            return true;
        } else {
            return false;
        }

    }

    public function checkCopy($flag_id){

        $result = "select `flagcopyright` from `flags` where flagnumber=$flag_id";
        $connection = new Database();
        $data = $connection->Select($result);
        $copyrighted = (int) $data[0]['flagcopyright'];

        if ($copyrighted == 1) {
            return true;
        } else {
            return false;
        }

    }

    public function checkRecord($flag_id){

        $result = "select recorded  from `flags`  where  recorded = 1 and flagnumber ='$flag_id'";
        $connection = new Database();
        $data = $connection->Select($result);

        if($data){
            $rec = (int) $data[0]['recorded'];
            if ($rec == 1) {
                return true;
            }
            else{
                return false;
            }
        }


    }

    public function recordSpam($flag_id){

        $result = "select flagspam from `flags` where flagnumber=$flag_id and flagspam=-1";
        $connection = new Database();
        $data = $connection->Select($result);
        if($data) {
            $record_spam = (int)$data[0]['flagspam'];
            if ($record_spam == -1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function recordAbusive($flag_id){

        $result = "select flagabusive from `flags` where flagnumber=$flag_id and flagabusive=-1";
        $connection = new Database();
        $data = $connection->Select($result);
        if($data) {
            $record_abusive = (int)$data[0]['flagabusive'];
            if ($record_abusive == -1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function recordCopy($flag_id){

        $result = "select flagcopyright  from `flags` where flagnumber=$flag_id and flagcopyright=-1";
        $connection = new Database();
        $data = $connection->Select($result);
        if($data) {
            $record_copy = (int)$data[0]['flagcopyright'];
            if ($record_copy == -1) {
                return true;
            } else {
                return false;
            }
        }
    }


}