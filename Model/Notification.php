<?php
include 'Model/Flag.php';
class Notification extends Flag
{
    public function get_flags()
        {
            $last = [];

            $flag = new Flag();
            $connection = new Database();

            $stmt_secs = "select i.flagnumber,i.username,i.articlenumber,i.flagabusive,i.flagspam,i.flagcopyright, i.time,i.recorded , s.articletitle  as articletitle, s.username as postedby From flags as i JOIN articles as s ON i.articlenumber = s.articlenumber";
            $records = $connection->Select($stmt_secs);
            foreach ($records as $value => $key) {
                $last[$value]['flagnumber'] = $key['flagnumber'];
                $last[$value]['reportedby'] = $key['username'];
                $last[$value]['articlenumber'] = $key['articlenumber'];
                $last[$value]['flagabusive'] = $flag->checkAbusive($key['flagnumber']);
                $last[$value]['flagspam'] = $flag->checkSpam($key['flagnumber']);;
                $last[$value]['flagcopyright'] = $flag->checkCopy($key['flagnumber']);
                $last[$value]['uncheck_flagabusive'] = $flag->recordSpam($key['flagnumber']);
                $last[$value]['uncheck_flagspam'] = $flag->recordAbusive($key['flagnumber']);
                $last[$value]['uncheck_flagcopyright'] = $flag->recordCopy($key['flagnumber']);
                $last[$value]['time'] = $key['time'];;
                $last[$value]['recorded'] = $flag->checkRecord($key['flagnumber']);
                $last[$value]['title'] = $key['articletitle'];
                $last[$value]['postedby'] = $key['postedby'];
            }
            return $last;

        }

}

