<?php
require_once('../../database/db_config.php');

$sql = "SELECT * FROM employees";

$results = $db->query($sql);

if (!$results) {
    echo $db->lastErrorMsg();
} else {

    $handle = fopen("../../employee_data.txt", "w");

    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        fwrite($handle, $row['id'] . "\t");
        fwrite($handle, $row['name'] . "\t");
        fwrite($handle, $row['dob'] . "\t");
        fwrite($handle, $row['address'] . "\t");
        fwrite($handle, $row['tele'] . "\n");
    }

    fclose($handle);

    header('Refresh:3;url=index.php');
    echo "Employee data write is successful..!\n";
}
