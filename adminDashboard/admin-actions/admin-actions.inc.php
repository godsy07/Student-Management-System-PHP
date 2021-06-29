<?php

include_once('../../config/dbh.inc.php');

session_start();
if (!empty($_SESSION)) {
    // print_r($_SESSION);
    $returnDataStatus;  //If Data found then 1 else 0
    $page = $_SESSION['page'];

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

            header("Location: ../adminPanel.php");
            exit();
        }
    }
    //Check for View Teachers Queries
    if (isset($_POST['view-teachers'])) {
        //Code for viewing teacher info
    }
    //Check for Search Student Page
    if (isset($_POST['search-student'])) {
        //Code for Search student page redirect info
    }
    //Check for Seacrh Student Query
    if (isset($_POST['student'])) {
        //Code for viewing View a particular student info
    }
} else {
    header("Location: ../login.php?authentication=error");
    exit();
}
