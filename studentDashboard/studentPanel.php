<?php

session_start();
if (!empty($_SESSION)) {
    // print_r($_SESSION);

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">

        <?php
        //Success of Fail message for Edit option
        if (!empty($_SESSION['message'])) {
            $message = $_SESSION['message'];
        ?>
            <script>
                alert("<?php echo $message; ?>")
            </script>
        <?php
            unset($_SESSION['message']);
        }
        ?>
        <title>Student Dashboard</title>
    </head>

    <body>

        <span class="welcome">
            Welcome, <?php echo $_SESSION['name'] ?>
        </span>

        <form action="../include/student/logout.inc.php" method="POST">
            <button class="sign-out" name="sign-out" type="submit">Sign Out</button>
        </form>

        <div class="panel">
            <h1>Student Dashboard</h1>
            <div class="student-panel">
                <form class="panel-form" action="../include/student/operations.inc.php" method="POST">
                    <button type="submit" name="home-student" value="home">Home</button>
                    <button type="submit" name="view-details" value="view">View Details</button>
                    <button type="submit" name="edit-details" value="edit">Edit Details</button>
                </form>
            </div>

            <!-- start of Div -->
            <div class="school-data">
                <?php

                $page = $_SESSION['page'];
                // echo $page;
                require("../studentDashboard/$page");
                ?>

            </div>
        </div> -->
        </div>
        <!-- End of Div -->

        </div>
        </div>

    </body>

    </html>


<?php

} else {
    header("Location: ../login.php?authentication=error");
    exit();
}
?>