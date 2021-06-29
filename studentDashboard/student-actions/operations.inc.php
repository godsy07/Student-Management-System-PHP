<?php

session_start();
require('../../config/dbh.inc.php');

if (!empty($_SESSION)) {
    $page = '';
    $id = $_SESSION['id'];


    //Check for Default Page operations
    // print_r($_POST);
    if (isset($_POST['home-student'])) {
        $page = 'default.php';
        $_SESSION['page'] = $page;
        // echo $page;
        header('Location: ../../studentDashboard/studentPanel.php?page=Home');
        exit();
    }


    //Check for View Page operation
    if (isset($_POST['view-details'])) {
        // echo "view-details";
        $page = 'view.php';

        $sql = "SELECT * FROM student WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            $row = mysqli_fetch_assoc($result);
            // print_r($row);
            $_SESSION['page'] = $page;

            $_SESSION['rollno'] = $row['rollno'];
            $_SESSION['class'] = $row['class'];
            $_SESSION['username'] = $row['username'];
            // print_r($_SESSION);
            header('Location: ../../studentDashboard/studentPanel.php?page=view-details');
            exit();
        } else {
            header('Location: ../../studentDashboard/studentPanel.php?error=unexpected');
            exit();
        }
    }


    //check for Edit Page operation
    if (isset($_POST['edit-details'])) {
        echo "edit-details";
        $page = 'edit.php';

        $sql = "SELECT * FROM student WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            $row = mysqli_fetch_assoc($result);
            // print_r($row);
            $_SESSION['page'] = $page;

            $_SESSION['rollno'] = $row['rollno'];
            $_SESSION['class'] = $row['class'];
            $_SESSION['username'] = $row['username'];
            // $_SESSION['password'] = $row['password'];
            // print_r($_SESSION);
            header('Location: ../../studentDashboard/studentPanel.php?page=edit-details');
            exit();
        } else {
            header('Location: ../../studentDashboard/studentPanel.php?error=unexpected');
            exit();
        }
    }
    //check for Edit Submit operation
    if (isset($_POST['edit'])) {
        // echo "edit-submission";
        $page = 'edit.php';

        $name = $_POST['name'];
        $class = $_POST['class'];
        $rollno = $_POST['rollno'];
        $email = $_POST['email'];
        $username = $_POST['username'];

        $sql = "UPDATE student 
                SET name='$name', class='$class', rollno='$rollno', email='$email', username='$username'
                WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        
        //Fetching data to check if code works fine
        // $query = "SELECT * FROM student WHERE id=$id";
        // $fetch = mysqli_query($conn, $query);
        // $fetchRun = mysqli_fetch_assoc($fetch);
        // print_r($fetchRun);
        // echo "<br>";
        // echo $sql;
        if ($result) {
            $_SESSION['page'] = $page;

            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            // $_SESSION['name'] $name;
            $_SESSION['rollno'] = $rollno;
            $_SESSION['class'] = $class;
            $_SESSION['username'] = $username;
            // print_r($_SESSION);


            $_SESSION['message'] = "Details UPDATED Sucessfully...!!!";
            // $_SESSION['status'] = 1;
            header('Location: ../../studentDashboard/studentPanel.php?edit-submission=success');
            exit();
        } else {
            //Something went wrong
            // $page = 'edit.php';
            $_SESSION['page'] = $page;

            $_SESSION['message'] = "Something went wrong";
            // $_SESSION['status'] = 0;
            header('Location: ../../studentDashboard/studentPanel.php?edit-submission=failed');
            exit();
        }
    }
} else {
    header("Location: ../../login.php?authentication=error");
    exit();
}
