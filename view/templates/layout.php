<?php
require('../../database/db_config.php');
require('../include/html_head.php');
?>

<body>
    <?php
    include('../include/header.php');
    ?>


    <main>
        <?php echo $content ?>
    </main>

    <?php
    include('../include/footer.php');
    ?>

</body>

</html>