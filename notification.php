<?php

include 'Model/Notification.php';

function sortByTime($a, $b)
{
    $a = $a['flagnumber'];
    $b = $b['flagnumber'];

    if ($a == $b) return 0;
    return ($a < $b) ? -1 : 1;
}
if (!empty($flags)) {
    usort($flags, 'sortByTime');
}

$ff = new Notification();
$flags = $ff->get_flags();
for ($x = 0; $x < 3; $x++) {

    $result = "select MAX(flagnumber) FROM flags";
    $database = new Database();
    $data = $database->Select($result);
    $db_row = (int)($_POST['table_row']);

    if (count($data) > $db_row) {
        sort($flags);
    }
        sleep(5);
}
if (!empty($flags)) {
    echo json_encode($flags);
}

?>