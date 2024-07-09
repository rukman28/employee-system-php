<?php
require('../../database/db_config.php');

if (!empty($_POST['id'])) // restrict the block when the $_POST['id'] element is empty
{
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


        <div class="container">
            <h3 class="page-title">Search Employee
                <a href="index.php" class="btn btn-success float-end">Employee list</a>

            </h3>

            <form action="search-employee.php" method="post">
                <!-- Search box with button -->

                <div class="input-group mb-3 w-25">

                    <input type="number" name="id" class="form-control" placeholder="Employee ID" aria-label="Employee Number" aria-describedby="basic-addon1">
                    <button type="submit" class="btn btn-info btn-md">Search</button>

                </div>
                <!-- End of search box with button -->
            </form>


            <?php
            if (!empty($_POST['id'])) //
            {
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


            <!-- Form show Employee data -->

            <form action="delete-employee.php" method="post">
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
                <?php
                if (!empty($_POST['id'])) {
                ?>
                    <input type="text" name="id" id="" hidden value="<?= $_POST['id'] ?>">
                <?php
                }
                ?>
                <button type="submit" class="btn btn-danger mt-2" <?= empty($row) ? 'disabled' : '' ?>>Delete</button>



            </form>
            <!-- Form End of show Employee data -->



        </div>
    </main>

    <?php
    include('../include/footer.php');
    ?>

</body>

</html>