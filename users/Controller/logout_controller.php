<?php
    session_start();
    setcookie('user_id', '', time()-3600, '/');
    setcookie('user_email', '', time()-3600, '/');
    header("location: ../index.php");
    session_destroy();
?>