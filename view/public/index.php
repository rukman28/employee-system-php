<?php
require_once('../../database/db_config.php');
require('../include/html_head.php');
?>

<body>
    <?php
    include('../include/header.php');
    ?>

    <main>
        <div class="container">
            <h3 class="page-title">Employee list
                <a href="search-employee.php" class="btn btn-info float-end ms-2">Search</a>
                <a href="read-employee-file.php" class="btn btn-info float-end ms-2">Read</a>
                <a href="download.php" class="btn btn-info float-end ms-2">download</a>
                <a href="add-employee.php" class="btn btn-success float-end">Add Employee</a>
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
                            <th>Telephone</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT * FROM employees";

                        $results = $db->query($sql);
                        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
                        ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['dob'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td><?= $row['tele'] ?></td>
                                <td>
                                    <a href="delete-employee.php?id=<?= $row['id']; ?>" class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Table end of Employee data -->
        </div>
    </main>

    <?php
    include('../include/footer.php');
    ?>

</body>

</html>