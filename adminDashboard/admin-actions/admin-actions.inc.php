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
                $returnArray = [];
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
            $sql = "SELECT * FROM student";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                $returnArray = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['email'] == $email) {
                        $returnArray = $row;
                        break;
                    }
                }
                if (!empty($returnArray)) {
                    // print_r($returnArray);
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
        } else {
            header("Location: ../adminPanel.php?error=encountered");
            exit();
        }
    }

    //Handle Edit and Delete requests
    if (isset($_POST['edit-student-details'])) {
        $id = $_POST['id'];
        $fetch = "SELECT * FROM student WHERE id=$id";
        $fetchQuery = mysqli_query($conn, $fetch);
        if ($fetchQuery) {
            $returnArray = [];
            while ($row = mysqli_fetch_assoc($fetchQuery)) {
                $returnArray = $row;
            }
            $_SESSION['action-data'] = $returnArray;
            $_SESSION['page'] = '/pages/student-details.php';
            header("Location: ../adminPanel.php?page=edit-student");
            exit();
        } else {
            $_SESSION['message'] = "Something went wrong";
            header("Location: ../adminPanel.php?error=unexpected");
            exit();
        }
    }

    if (isset($_POST['edit-teacher-details'])) {
        $id = $_POST['id'];
        $fetch = "SELECT * FROM teachers WHERE id=$id";
        $fetchQuery = mysqli_query($conn, $fetch);
        if ($fetchQuery) {
            $returnArray = [];
            while ($row = mysqli_fetch_assoc($fetchQuery)) {
                $returnArray = $row;
            }
            $_SESSION['action-data'] = $returnArray;
            $_SESSION['page'] = '/pages/teacher-details.php';
            header("Location: ../adminPanel.php?page=edit-teacher");
            exit();
        } else {
            $_SESSION['message'] = "Something went wrong";
            header("Location: ../adminPanel.php?error=unexpected");
            exit();
        }
    }
    //Edit Teacher details submission
    if (isset($_POST['edit-teacher-submit'])) {
        print_r($_POST);
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subjects = $_POST['subjects'];
        $password = $_POST['password'];
        
        $sql = "UPDATE teachers 
            SET name='$name', email='$email', subjects='$subjects', password='$password' 
            WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // echo "Query Success";
            $fetch = "SELECT * FROM teachers WHERE id=$id";
            $res = mysqli_query($conn, $fetch);
            $row = mysqli_fetch_assoc($res);
            // print_r($row);
            $_SESSION['message'] = "Successfully Edited";
            $_SESSION['action-data'] = $row;
            header("Location: ../adminPanel.php?edit-teacher=success");
            exit();
        } else {
            // echo "Failed";
            $_SESSION['message'] = "Editing Failed Unexpectedly";
            header("Location: ../adminPanel.php?error=unexpected");
            exit();
        }
    }

    if (isset($_POST['delete-student-details'])) {
        $id = $_POST['id'];
        $delete= "DELETE FROM student WHERE id='$id'";
        if (mysqli_query($conn, $delete)) {
            $sql = "SELECT * FROM student";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            $returnArray = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $returnArray[] = $row;
                    break;
                }
            $_SESSION['action-data'] = $returnArray;
            $_SESSION['message'] = "Record successfully Deleted";
            header("Location: ../adminPanel.php?delete_student=success");
            exit();
        } else {
            $_SESSION['message'] = "Record Deletion FAILED";
            header("Location: ../adminPanel.php?delete_student=failed");
            exit();
        }
    }
    if (isset($_POST['delete-teacher-details'])) {
        $id = $_POST['id'];
        $delete= "DELETE FROM student WHERE id='$id'";
        if (mysqli_query($conn, $delete)) {
            $sql = "SELECT * FROM teachers";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            $returnArray = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $returnArray[] = $row;
                    break;
                }
            $_SESSION['action-data'] = $returnArray;
            $_SESSION['message'] = "Record successfully Deleted";
            header("Location: ../adminPanel.php?delete_student=success");
            exit();
        } else {
            $_SESSION['message'] = "Record Deletion FAILED";
            header("Location: ../adminPanel.php?delete_student=failed");
            exit();
        }
    }

    //Edit Student Details 
    if (isset($_POST['edit-info'])) {
        //Edit request to edit student details
        // print_r($_POST);
        $id = $_POST['id'];
        $name = $_POST['name'];
        $class = $_POST['class'];
        $rollno = $_POST['rollno'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "UPDATE student 
                SET name='$name', class='$class', rollno='$rollno', email='$email', username='$username', password='$password' 
                WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // echo "Query Success";
            $fetch = "SELECT * FROM student WHERE id=$id";
            $res = mysqli_query($conn, $fetch);
            $row = mysqli_fetch_assoc($res);
            // print_r($row);
            $_SESSION['message'] = "Successfully Edited";
            $_SESSION['action-data'] = $row;
            header("Location: ../adminPanel.php?edit-student=success");
            exit();
        } else {
            // echo "Failed";
            $_SESSION['message'] = "Editing Failed Unexpectedly";
            header("Location: ../adminPanel.php?error=unexpected");
            exit();
        }
    }

    //Adding teachers and students
    if (isset($_POST['add-teacher'])) {
        $_SESSION['page'] = '/pages/add-teacher.php';
        header("Location: ../adminPanel.php?page=add-teacher");
        exit();
    }
    if (isset($_POST['add-student'])) {
        $_SESSION['page'] = '/pages/add-student.php';
        header("Location: ../adminPanel.php?page=add-student");
        exit();
    }
    //Submit add Teacher data
    if (isset($_POST['submit-teacher'])) {
        $name = $_POST['name'];
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        // $email = $_POST['email'];
        $subject = $_POST['subject'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];

        if (empty($name) || empty($email) || empty($subject) || empty($password) || empty($confirmPassword)) {
            $_SESSION['message'] = 'Please Enter the details to submit';
            header("Location: ../adminPanel.php?input=empty");
            exit();
        } else {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($password == $confirmPassword) {
                    $fetch = "SELECT * FROM teachers";
                    $res = mysqli_query($conn, $fetch);
                    $array = [];
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $array = $row;
                        }
                    }
                    if (!empty($array)) {
                        if ($array['email'] == $email) {
                            $_SESSION['message'] = 'Email already exists';
                            header("Location: ../adminPanel.php?email=invalid");
                            exit();
                        }
                    }
                    $save = "INSERT INTO teachers (name, email, password, subjects)
                        VALUES ('$name', '$email', '$password', '$subject')";
                    if (mysqli_query($conn, $save)) {
                        $_SESSION['message'] = 'Data saved successfully';
                        header("Location: ../adminPanel.php?add-teacher=success");
                        exit();
                    } else {
                        $_SESSION['message'] = 'Something went wrong. Data could not be saved';
                        header("Location: ../adminPanel.php?unexpected_error");
                        exit();
                    }
                } else {
                    $_SESSION['message'] = 'Passwords do not match';
                    header("Location: ../adminPanel.php?password=not_same");
                    exit();
                }
            } else {
                $_SESSION['message'] = 'Invalid Email';
                header("Location: ../adminPanel.php?email=invalid");
                exit();
            }
        }
    }
    //Submit add Student data
    if (isset($_POST['submit-student'])) {
        $name = $_POST['name'];
        $class = $_POST['class'];
        $rollno = $_POST['rollno'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];

        if (empty($name) || empty($class) || empty($rollno) || empty($username) || empty($password) || empty($confirmPassword)) {
            $_SESSION['message'] = 'Please Enter the details to submit';
            header("Location: ../adminPanel.php?input=empty");
            exit();
        } else {
            $email = '';
            if (!empty($_POST['email'])) {
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['message'] = 'Invalid Email';
                    header("Location: ../adminPanel.php?email=invalid");
                    exit();
                }
            }
            if ($password == $confirmPassword) {
                $fetch = "SELECT * FROM students";
                $res = mysqli_query($conn, $fetch);
                $array = [];
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $array = $row;
                    }
                }
                if (!empty($array)) {
                    if (($array['email'] == $email) || ($array['username'] == $username)) {
                        $_SESSION['message'] = 'Email OR UserName already exists';
                        header("Location: ../adminPanel.php?email_or_username=invalid");
                        exit();
                    }
                }
                $save = "INSERT INTO student (name, rollno, class, email, username, password)
                    VALUES ('$name', '$rollno', '$class','$email', '$username','$password')";
                if (mysqli_query($conn, $save)) {
                    $_SESSION['message'] = 'Data saved successfully';
                    header("Location: ../adminPanel.php?add-student=success");
                    exit();
                } else {
                    $_SESSION['message'] = 'Something went wrong. Data could not be saved';
                    header("Location: ../adminPanel.php?unexpected_error");
                    exit();
                }
            } else {
                $_SESSION['message'] = 'Passwords do not match';
                header("Location: ../adminPanel.php?password=not_same");
                exit();
            }
        }
    }
} else {
    header("Location: ../login.php?authentication=error");
    exit();
}
