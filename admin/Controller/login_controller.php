<?php
    session_start();
    include "../Model/admin_model.php";

    if (!isset($_POST['login_btn'])) {
        header("location: ../View/login.php");
        die;
    }

    if (empty($_POST['login']) || empty($_POST['password'])) {
        $_SESSION['error'] = "Empty login or password!";
        header("location: ../View/login.php");
        die;
    }

    $login = $_POST['login'];
    $password = $_POST['password'];

    $count = $model->admin($login, $password);
    if ($count > 0) {
        $_SESSION['admin'] = $login;
        header("location: ../View/home.php");
        die;
    } else {
        $_SESSION['error'] = "Wrong login or password!";
        header("location: ../View/login.php");
        die;
    }
?>