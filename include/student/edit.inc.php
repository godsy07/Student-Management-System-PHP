<?php

session_start();
if (!empty($_SESSION)) {
    //check for edit operation

    
} else {
    header("Location: ../login.php?authentication=error");
    exit();
}

?>