<?php
require('../../database/db_config.php');

$empId = $_GET['id'];
$sql = "SELECT * FROM employees WHERE id=$empId";

$result = $db->query($sql);

$row = $result->fetchArray(SQLITE3_ASSOC);
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

            <!-- Form show Employee data -->

            <form action="update-employee.php" method="POST">
                <div class="form-group">
                    <label>Employee ID</label>
                    <input type="number" name="id" class="form-control" value="<?= $row['id'] ?>" readonly placeholder="Employee ID" aria-label="Employee Number" aria-describedby="basic-addon1">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" required maxlength="100" class=" form-control" value="<?= $row['name'] ?>">
                </div>

                <div class="form-group">
                    <?php
                    /*
                    *
                    * Find the date 18 years before from today and store it in the DateTime object using 
                    * $date variable and use the date_formate function to spit the exact date out 18 years 
                    * before to the date time picker
                    */
                    $date = date_create("today");
                    date_sub($date, date_interval_create_from_date_string("18 years"));
                    ?>
                    <!-- end of date calculation -->

                    <label>Date Of Birth
                        <input type="date" name="dob" class="form-control" value="<?= $row['dob'] ?>" max="<?= date_format($date, "Y-m-d") ?>" required></label>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" required maxlength="100" class=" form-control" value="<?= $row['address']; ?>">
                </div>
                <div class="form-group">
                    <label>Telephone</label>
                    <input type="text" name="tele" class="form-control" maxlength="11" required pattern="[0-9]{3}-[0-9]{7}" value="<?= $row['tele']; ?>">
                </div>

                <!-- <button type="submit" class="btn btn-info mt-2">Save</button> -->

                <button type="submit" class="btn btn-warning mt-2">Update</button>



            </form>
            <!-- Form End of show Employee data -->



        </div>
    </main>

    <?php
    include('../include/footer.php');
    ?>

</body>

</html>