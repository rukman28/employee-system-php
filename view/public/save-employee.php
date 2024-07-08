<?php
header('Refresh:3;url=index.php');
//Include the database
require_once('../../database/db_config.php');

$name = $_POST['name'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$tele = $_POST['tele'];


$sql = "INSERT INTO employees(name,dob,address,tele) VALUES('$name','$dob','$address', '$tele')";

$ret = $db->exec($sql);

if (!$ret) {
    echo $db->lastErrorMsg();
} else {
    echo "Employee record created successfully..!\n";
}
