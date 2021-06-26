<?php

include_once '../config/dbh.inc.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {      //Check if username is empty
        header("Location: ../login.php?username=required");
        exit();
    } elseif (empty($password)) {   //Check if Password is empty
        header("Location: ../login.php?password=required");
        exit();
    } else {
        $sql = "SELECT * FROM student";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (($row['email'] == $email) || ($row['username'] == $email)) {
                    if ($row['password'] == $password) {
                        session_start();
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['rollno'] = $row['rollno'];
                        $_SESSION['class'] = $row['class'];
                        $_SESSION['username'] = $row['username'];
                        // $_SESSION['password'] = $row['password'];
                        header("Location: ../studentDashboard/studentPanel.php?login=success");
                        exit();
                    } else {
                        header("Location: ../login.php?password=invalid");
                        exit();
                    }
                } else {
                    header("Location: ../login.php?email=invalid");
                    exit();
                }
            }
        }
    }
}
