<?php
    session_start();
    include("../Model/admin_model.php");

    $action = $_POST['action'];

    // Add category
    if ($action === 'add') {
        $category = $_POST['new_category'];
        $img = $_FILES['img']['name'];
        if (empty($category) || empty($img)) {
            $_SESSION['error'] = "<b>Input all fields!</b>";
            header("location: ../View/home.php");
            die;
        }
        move_uploaded_file($_FILES['img']['tmp_name'], "../Assets/img/$img");
        $model->add_category($category, $img);
        header("location: ../View/home.php");
    }

    // Update category
    if ($action === "update" && $new_text !== "") {
        $id = $_POST['id'];
        $new_text = $_POST['new_text'];
        $model->update($id, $new_text);
    }

    // Delete category    
    if ($action === 'delete') {
        $id = $_POST['id'];
        $model->delete($id);
    }
?>