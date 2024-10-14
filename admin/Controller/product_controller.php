<?php
    session_start();
    include("../Model/admin_model.php");

    $action = $_POST['action'];
    
    // Add product
    if ($action === "add") {
        $category_id = $_SESSION['category_id'];
        $name = $_POST['name'];
        $description = $_POST['desc'];
        $price = $_POST['price'];
        $img = $_FILES['img']['name'];

        if (empty($category_id) || empty($name) || empty($price) || empty($description) || empty($img)) {
            $_SESSION['error'] = "<b>Input all fields!</b>";
            header("location: ../View/products.php");
            die;
        } 

        move_uploaded_file($_FILES['img']['tmp_name'], "../Assets/img/$img");
        $model->add_product($name, $description, $category_id, $img, $price);
        header("location: ../View/products.php");
    }

    // Update product
    if (isset($action) && $action === "update_prod") {
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $id = $_POST['id'];
        $model->update_product($name, $desc, $price, $id);
    }

    // Delete product
    if (isset($action) && $action === "delete_prod") { 
        $id = $_POST['id'];
        $model->delete_product($id);
    }
?>