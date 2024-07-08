<?php
header('Refresh:3;url=index.php');

//Include Database

require_once('../../database/db_config.php');
require('../include/html_head.php');
?>

<body>
    <?php
    include('../include/header.php');
    ?>

    <main>
        <?php

        $id = $_GET['id'];

        $sql = "DELETE FROM employees where id=$id";
        $ret = $db->exec($sql);

        if (!$ret) {
            echo $db->lastErrorMsg();
        } else {
            echo '<div class="alert alert-success" role="alert">';
            echo $db->changes(), " Rcord Deleted Successfully..!";
            echo '</div>';
        }

        ?>

    </main>

</body>

</html>