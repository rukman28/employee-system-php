<?php
header('Refresh:3;url=index.php');
require_once('../../database/db_config.php');
require('../include/html_head.php');



$filePath = "../../employee_data.txt";

$file = fopen($filePath, "r");
if ($file) {
    while (($line = fgets($file)) !== false) {
        $split = explode("\t", $line);
        $sql = "INSERT INTO employees(name,dob,address,tele) VALUES('$split[1]','$split[2]','$split[3]', '$split[4]')";

        $ret = $db->exec($sql);

        if (!$ret) {
            echo $db->lastErrorMsg();
        }
    }
}

fclose($file);

echo "Employee data have been loaded successfully..!";
