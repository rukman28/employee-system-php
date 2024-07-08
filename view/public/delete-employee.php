<?php
header('Refresh:3;url=index.php');

//Include Database

require_once('../../database/db_config.php');

$id = $_GET['id'];

$sql = "DELETE FROM employees where id=$id";
$ret = $db->exec($sql);

if (!$ret) {
    echo $db->lastErrorMsg();
} else {
    echo $db->changes(), " Rcord Deleted Successfully..!";
}
