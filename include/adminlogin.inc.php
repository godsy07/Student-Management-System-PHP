<?php 

    include_once '../config/dbh.inc.php';

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email)) {      //Check if username is empty
            header("Location: ../login.php?username=required");
            exit();
        } elseif (empty($password)) {   //Check if Password is empty
            header("Location: ../login.php?password=required");
            exit();
        } else {
            $sql = "SELECT * FROM admin";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['email'] == $email) {
                        if ($row['password'] == $password) {
                            session_start();
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['name'] = $row['name'];
                            $_SESSION['email'] = $email;
                            // $_SESSION['password'] = $password;

                            $_SESSION['page'] = "/pages/default-page.php";
                            header("Location: ../adminDashboard/adminPanel.php?login=success");
                            exit();
                        } else {
                            header("Location: ../adminLogin.php?password=invalid");
                            exit();
                        }
                    } else {
                        header("Location: ../adminLogin.php?email=invalid");
                        exit();
                    }
                }
            }
        }
    }
