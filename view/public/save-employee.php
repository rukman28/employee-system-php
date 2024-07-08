<?php
header('Refresh:3;url=index.php');
//Include the database
require_once('../../database/db_config.php');
require('../include/html_head.php');


$name = $_POST['name'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$tele = $_POST['tele'];


$sql = "INSERT INTO employees(name,dob,address,tele) VALUES('$name','$dob','$address', '$tele')";

$ret = $db->exec($sql);

?>

<body>
    <?php
    include('../include/header.php');
    ?>

    <main>
        <?php

        if (!$ret) {
            echo $db->lastErrorMsg();
        } else {
            echo '<div class="alert alert-success" role="alert">';
            echo "Employee record created successfully..!\n";
            echo '</div>';
        }

        ?>

    </main>

</body>

</html>