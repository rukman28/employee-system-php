<?php
require('../../database/db_config.php');
if (isset($_POST['id'])) {
    $empId = $_POST['id'];

    $sql = "SELECT * FROM employees WHERE id=$empId";

    $result = $db->query($sql);
}
require('../include/html_head.php');
?>

<body>
    <?php
    include('../include/header.php');
    ?>
    <main>
        <!-- Search box with button -->

        <!-- End of search box with button -->

        <div class="container">
            <h3 class="page-title">Search Employee
                <a href="index.php" class="btn btn-success float-end">Employee list</a>

            </h3>
            <form action="search-employee.php" method="post">
                <div class="input-group mb-3 w-25">

                    <input type="text" name="id" class="form-control" placeholder="Employee ID" aria-label="Employee Number" aria-describedby="basic-addon1">
                    <button type="submit" class="btn btn-info btn-md">Search</button>

                </div>
                <?php
                if (isset($_POST['id'])) {
                    $row = $result->fetchArray(SQLITE3_ASSOC);
                    if ($row == false) {
                ?>
                        <div class="alert alert-danger">
                            <?php
                            echo "Employee ID <strong>" . $_POST['id'] . "</strong> does not exist..!";
                            ?>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="alert alert-success">
                            <?php
                            echo "Employee ID <strong>" . $_POST['id'] . "</strong> exist..!";
                            ?>
                        </div>
                <?php

                    }
                }
                ?>

            </form>

            <!-- Form Add an Employee -->

            <form action="save-employee.php" method="post">
                <?php var_dump(empty($row)) ?>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" disabled value="<?php echo empty($row) ? '' : $row['name']; ?>">
                </div>
                <div class="form-group">
                    <label>Date Of Birth</label>
                    <input type="text" name="dob" class="form-control" disabled value="<?php echo empty($row) ? '' : $row['dob']; ?>">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" disabled value="<?php echo empty($row) ? '' : $row['address']; ?>">
                </div>
                <div class="form-group">
                    <label>Telephone</label>
                    <input type="text" name="tele" class="form-control" disabled value=" <?php echo empty($row) ? '' : $row['tele']; ?>">
                </div>

                <!-- <button type="submit" class="btn btn-info mt-2">Save</button> -->

            </form>
            <!-- Form End of Add an Employee -->



        </div>
    </main>

    <?php
    include('../include/footer.php');
    ?>

</body>

</html>