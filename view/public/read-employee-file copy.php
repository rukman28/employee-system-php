<?php
$lines = file('../../employee_data.txt');

require('../include/html_head.php');
?>

<body>
    <?php
    include('../include/header.php');
    ?>
    <main>
        <div class="container">
            <h3 class="page-title">Add an Employee
                <a href="index.php" class="btn btn-success float-end">Employee list</a>
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