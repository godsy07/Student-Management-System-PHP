<?php

session_start();
if (!empty($_SESSION)) {

    if (isset($_POST['sign-out'])) {
        session_unset();
        session_destroy();
        header("Location: ../../login.php?logout=success");
        exit();
    }
} else {
    header("Location: ../login.php?authentication=error");
    exit();
}
