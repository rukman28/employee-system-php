<?php
require('../../database/db_config.php');
header('Refresh:3;url=index.php');

require('../include/html_head.php');



$row = $_POST;
$id = $row['id'];
$name = $row['name'];
$dob = $row['dob'];
$address = $row['address'];
$tele = $row['tele'];

$sql = "UPDATE employees SET name='$name',dob='$dob',address='$address',tele='$tele' WHERE id='$id' ";

?>

<body>

    <?php
    include('../include/header.php');
    ?>
    <main>
        <?php
        $ret = $db->exec($sql);
        if (!$ret) {
            $db->lastErrorMsg();
        } else {
            echo '<div class="alert alert-success" role="alert">';
            echo $db->changes(), " Rcord Updated Successfully..!";
            echo '</div>';
        }


        ?>
    </main>

</body>

</html>