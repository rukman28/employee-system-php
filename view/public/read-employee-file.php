<?php
require('../include/html_head.php');

?>


<body>
    <?php
    require('../include/header.php')
    ?>
    <main>
        <div class="container">
            <div class="page-title">
                <div class="d-flex justify-content-between border border-danger border-3">
                    <div class="border border-primary border-3">
                        <h3>Employee list </h3>
                    </div>

                    <div class="d-flex border border-info border-3">
                        <div>
                            <form action="" class="d-flex justify-content-around ">
                                <div class="form-check d-flex align-items-center form-check-inline">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label me-3" for="flexRadioDefault1 ">
                                        Default radio
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center form-check-inline">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="form-check-label me-2" for="flexRadioDefault2">
                                        Default checked radio
                                    </label>
                                </div>
                                <div>
                                    <a href="populate-db.php" class="btn btn-info float-end me-3">Load</a>
                                </div>
                            </form>
                        </div>
                        <div>
                            <a href="index.php" class="btn btn-success float-end">Employee List</a>
                        </div>
                    </div>
                </div>
            </div>


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