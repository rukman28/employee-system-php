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
                            <form action="populate-db.php" method="post" class="d-flex justify-content-around ">
                                <div class="form-check d-flex align-items-center form-check-inline">
                                    <input class="form-check-input" value="clean" type="radio" name="db" id="flexRadioDefault1">
                                    <label class="form-check-label me-3" for="db">
                                        Clean Load
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center form-check-inline">
                                    <input class="form-check-input" value="append" type="radio" name="db" id="flexRadioDefault2" checked>
                                    <label class="form-check-label me-2" for="db">
                                        Append Load
                                    </label>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-info float-end me-3">Load</button>
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