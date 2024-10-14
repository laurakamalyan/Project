<?php
    session_start();
    include "../Model/users_model.php";
    $action = isset($_POST['btn_reg']) ? $_POST['btn_reg'] : "";
    if ($action !== "") {
        if ($action === "btn") {
            $name = $_POST['name'];
            $login = $_POST['login'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $conf_pass = $_POST['conf_pass'];
            $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-_]).{8,}$/";

            if (empty($name) || empty($login) || empty($email) || empty($pass) || empty($conf_pass)) {
                $_SESSION['error'] = "Please fill all fields!";
                header("location: ../View/register.php");
                exit;
            } else {
                if ($pass !== $conf_pass) {
                    $_SESSION['error'] = "Passwords don't match!";
                    header("location: ../View/register.php");
                    exit;
                } else {
                    $reg_check = $user_model->check_user($email);
                    if ($reg_check > 0) {
                        $_SESSION['error'] = "Email address already exist!";
                        header("location: ../View/register.php");
                        exit;
                    } elseif(!preg_match($password_regex, $pass)) {
                        $_SESSION['error'] = "The password must contain at least one uppercase letter, at least one lowercase letter, at least one number, at least one special character, and must be at least 8 characters long!";
                        header("location: ../View/register.php");
                        exit;
                    } else {
                        $add_user = $user_model->add_user($name, $login, $pass, $email);
                        if ($add_user) {
                            $_SESSION['error'] = "Registration completed successfully!";
                            header("location: ../View/login.php");
                            exit;
                        } else {
                            $_SESSION['error'] = "Field to register user!";
                            header("location: ../View/register.php");
                            exit;
                        }
                     } 
                } 
            }
        }
    }
?>