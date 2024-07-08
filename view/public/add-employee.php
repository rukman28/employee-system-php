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
                    <input type="text" name="name" class="form-control" required maxlength="20">
                </div>
                <div class="form-group">
                    <label>Date Of Birth</label>
                    <input type="date" name="dob" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" required maxlength="100">
                </div>
                <div class="form-group">
                    <label>Telephone</label>
                    <input type="text" placeholder="0786789772" name="tele" class="form-control" required pattern="^[0]{1}[7]{1}[01245678]{1}[0-9]{7}">
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