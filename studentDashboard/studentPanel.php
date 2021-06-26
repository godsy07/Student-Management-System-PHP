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
                <form class="panel-form" action="" method="POST">
                    <!-- <button type="submit" name="view-details">View Details</button> -->
                    <button type="submit" name="edit-details">Edit Details</button>
                </form>
            </div>
            <div class="school-data">
                <!-- <p>
                    Hello, <?php //echo $_SESSION['name'] 
                            ?>. <br>
                    You can view your details and edit them in this panel by using the above buttons.
                </p> -->

                <h2>Hello, <?php echo $_SESSION['name'] ?> </h2>
                <p>Your details have been given below.<br>
                    To <strong>EDIT</strong> your details click of "Edit Details" button above.</p>


                <div class="view-box">
                    <div class="flex-box">
                        <div class="label-box">

                            <div class="input-items">
                                <label>Name: </label>
                                <input type="text" value="<?php echo $_SESSION['name'];
                                                            ?>" readonly />
                            </div>
                            <div class="input-items">
                                <label>Class: </label>
                                <input type="text" value="<?php echo $_SESSION['class'];
                                                            ?>" readonly />
                            </div>
                            <div class="input-items">
                                <label>RollNo: </label>
                                <input type="text" value="<?php echo $_SESSION['rollno'];
                                                            ?>" readonly />
                            </div>
                            <div class="input-items">
                                <label>Email ID: </label>
                                <input type="text" value="<?php echo $_SESSION['email'];
                                                            ?>" readonly />
                            </div>
                            <div class="input-items">
                                <label>User Name: </label>
                                <input type="text" value="<?php echo $_SESSION['username'];
                                                            ?>" readonly />
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- 
                <div class="view-student">
                    <div class="student-items">
                        <label>Name: </label>
                        <input type="text" value="<?php //echo $_SESSION['name']; 
                                                    ?>" readonly/>
                    </div>
                    <div class="student-items">
                        <label>Class: </label>
                        <input type="text" value="<?php //echo $_SESSION['class']; 
                                                    ?>" readonly/>
                    </div>
                    <div class="student-items">
                        <label>RollNo: </label>
                        <input type="text" value="<?php //echo $_SESSION['rollno']; 
                                                    ?>" readonly/>
                    </div>
                    <div class="student-items">
                        <label>Email ID: </label>
                        <input type="text" value="<?php //echo $_SESSION['email']; 
                                                    ?>" readonly/>
                    </div>
                    <div class="student-items">
                        <label>UserName: </label>
                        <input type="text" value="<?php //echo $_SESSION['username']; 
                                                    ?>" readonly/>
                    </div>
                </div> -->

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