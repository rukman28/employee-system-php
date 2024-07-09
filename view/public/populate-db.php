<?php
header('Refresh:3;url=index.php');
require_once('../../database/db_config.php');
require('../include/html_head.php');


//check if the file read is a clean load or append load to the employees table using the radio button values.
if ($_POST['db'] === 'clean') {
    $sql = 'DELETE FROM employees';

    $ret = $db->exec($sql);
    if (!$ret) {
        echo $db->lastErrorMsg();
    }
}


//Open the file employee_data.txt to load employee data to the database
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

fclose($file); //Close the open file

echo "Employee data have been loaded successfully..!";
