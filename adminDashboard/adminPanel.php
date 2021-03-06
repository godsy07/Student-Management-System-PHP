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

        <title>Admin Dashboard</title>
    </head>

    <body>

        <span class="welcome">
            Welcome, <?php echo $_SESSION['name']; ?>
        </span>

        <form action="admin-actions/logout.inc.php" method="POST">
            <button class="sign-out" name="sign-out" type="submit">Sign Out</button>
        </form>

        <div class="panel">
            <h1>Admin Dashboard</h1>
            <div class="admin-panel">
                <form class="panel-form" action="admin-actions/admin-actions.inc.php" method="POST">
                    <button type="submit" name="view-home">Home</button>
                    <button type="submit" name="view-students">View Students</button>
                    <button type="submit" name="view-teachers">View Teachers</button>
                    <button type="submit" name="search-student">Search Student</button>
                </form>
            </div>
            <div class="school-data">
                <?php
                $page = $_SESSION['page'];
                // echo $page;
                include("../adminDashboard" . $page);
                ?>
            </div>
        </div>

        <script>
            <?php

            if (!empty($_SESSION['message'])) {
                echo "alert('" . $_SESSION['message'] . "')";
                unset($_SESSION['message']);
            }

            ?>
        </script>

    </body>

    </html>

<?php

} else {
    header("Location: ../login.php?authentication=error");
    exit();
}
?>