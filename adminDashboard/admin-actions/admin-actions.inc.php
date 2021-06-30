<?php

include_once('../../config/dbh.inc.php');

session_start();
if (!empty($_SESSION)) {
    // print_r($_SESSION);
    $returnDataStatus;  //If Data found then 1 else 0
    // $page = $_SESSION['page'];

    //Check for Home option
    if (isset($_POST['view-home'])) {
        // $page = '/pages/default-page.php';
        $_SESSION['page'] = '/pages/default-page.php';
        header("Location: ../adminPanel.php");
        exit();
    }

    //Check for View Students Queries
    if (isset($_POST['view-students'])) {
        $sql = "SELECT * FROM student";
        $res = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($res);
        // echo $resultCheck;
        if ($resultCheck > 0) {

            $returnArray = [];
            while ($row = mysqli_fetch_assoc($res)) {
                $returnArray[] = $row;
            }
            // print_r($data);
            $returnDataStatus = 1;      //Data fetched successfully
            $_SESSION['returnData'] = $returnDataStatus;
            $_SESSION['action-data'] = $returnArray;
            $_SESSION['page'] = '/pages/view-students.php';
            header("Location: ../adminPanel.php");
            exit();
        } else {
            $returnDataStatus = 0;      //Data not found
            $_SESSION['returnData'] = $returnDataStatus;

            $_SESSION['page'] = '/pages/view-students.php';
            header("Location: ../adminPanel.php");
            exit();
        }
    }


    //Check for View Teachers Queries
    if (isset($_POST['view-teachers'])) {
        //Code for viewing teacher info
        $sql = "SELECT * FROM teachers";
        $res = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($res);
        // echo $resultCheck;
        if ($resultCheck > 0) {

            $returnArray = [];
            while ($row = mysqli_fetch_assoc($res)) {
                $returnArray[] = $row;
            }
            // print_r($data);
            $returnDataStatus = 1;      //Data fetched successfully
            $_SESSION['returnData'] = $returnDataStatus;
            $_SESSION['action-data'] = $returnArray;
            $_SESSION['page'] = '/pages/view-teachers.php';
            header("Location: ../adminPanel.php");
            exit();
        } else {
            $returnDataStatus = 0;      //Data not found
            $_SESSION['returnData'] = $returnDataStatus;

            $_SESSION['page'] = '/pages/view-teachers.php';
            header("Location: ../adminPanel.php");
            exit();
        }
    }
    //Check for Search Student Page
    if (isset($_POST['search-student'])) {
        //Code for Search student page redirect info
        $_SESSION['page'] = '/pages/search-student.php';
        header("Location: ../adminPanel.php?page=search-student");
        exit();
    }
    //Check for Seacrh Student Query
    if (isset($_POST['search-student-action'])) {
        //Code for viewing View a particular student info
        // print_r($_POST);

        if ((empty($_POST['rollno']) or empty($_POST['class'])) and empty($_POST['email'])) {
            //No value entered, So return error
            // $_SESSION['page'] = '/pages/search-student.php';
            header("Location: ../adminPanel.php?search-student=empty-fields");
            exit();
        } elseif (!empty($_POST['rollno']) and !empty($_POST['class'])) {
            $rollno = $_POST['rollno'];
            $class = $_POST['class'];
            $sql = "SELECT * FROM student";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                $returnArray;
                while ($row = mysqli_fetch_assoc($result)) {
                    if (($row['rollno'] == $rollno) and ($row['class'] == $class)) {
                        $returnArray = $row;
                        break;
                    }
                }
                if (!empty($returnArray)) {
                    $_SESSION['action-data'] = $returnArray;
                    $_SESSION['page'] = '/pages/student-details.php';
                    header("Location: ../adminPanel.php");
                    exit();
                } else {
                    //Invalid Entry so data not found
                    header("Location: ../adminPanel.php?search-student=invalid-entry");
                    exit();
                }
            } else {
                //Data could not be fetched
                header("Location: ../adminPanel.php?search-student=no-data");
                exit();
            }
        } elseif (!empty($_POST['email'])) {
            $email = $_POST['email'];
        }
    }
} else {
    header("Location: ../login.php?authentication=error");
    exit();
}
