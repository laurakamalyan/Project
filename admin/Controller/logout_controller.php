<?php
    session_start();
    header("location: ../View/login.php");
    session_destroy();
?>