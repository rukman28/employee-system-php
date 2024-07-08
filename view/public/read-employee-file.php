<?php
require('../include/html_head.php');

?>


<body>
    <?php
    require('../include/header.php')
    ?>
    <main>
        <div class="container">
            <h3 class="page-title">Employee list
                <a href="index.php" class="btn btn-success float-end">Employee List</a>
            </h3>

            <!-- Table Start Employee data -->
            <div class="scrollable">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>EmpNo</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Address</th>
                            <th>Tele</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $filePath = "../../employee_data.txt";

                        $file = fopen($filePath, "r");

                        if ($file) {
                            while (($line = fgets($file)) !== false) {
                                $split = explode("\t", $line);
                        ?>
                                <tr>
                                    <td><?= $split[0] ?></td>
                                    <td><?= $split[1] ?></td>
                                    <td><?= $split[2] ?></td>
                                    <td><?= $split[3] ?></td>
                                    <td><?= $split[4] ?></td>
                                </tr>
                        <?php
                            }
                            fclose($file);
                        } else {
                            echo "The file is empty..!";
                        }

                        ?>

                    </tbody>

                </table>

    </main>

    <?php
    include('../include/footer.php');
    ?>


</body>



</html>