<?php
require('../../database/db_config.php');
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

            <!-- Form Add an Employee -->

            <form action="save-employee.php" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required maxlength="50" pattern="[A-Za-z ]{1,50}">
                </div>
                <div class="form-group">

                    <?php
                    /*
                    *
                    * Find the date 18 years before from today and store it in the DateTime object $date and use the date_formate function to spit the date 18 years before to the date * time picker
                    */
                    $date = date_create("today");
                    date_sub($date, date_interval_create_from_date_string("18 years"));
                    ?>
                    <!-- end of date calculation -->

                    <label>Date Of Birth
                        <input type="date" name="dob" class="form-control" max="<?= date_format($date, "Y-m-d") ?>" required></label>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" required maxlength="100">
                </div>
                <div class="form-group">
                    <label>Telephone</label>
                    <input type="tel" placeholder="078-6789772" name="tele" class="form-control" required pattern="[0-9]{3}-[0-9]{7}">
                </div>

                <button type="submit" class="btn btn-info mt-2">Save</button>

            </form>
            <!-- Form End of Add an Employee -->



        </div>
    </main>

    <?php
    include('../include/footer.php');
    ?>

</body>

</html>