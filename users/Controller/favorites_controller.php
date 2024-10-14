<?php
    session_start();
    include("../Model/users_model.php");

    if(!isset($_SESSION['user_id'])) {
        echo json_encode(['success'=>false]);
        $_SESSION['error'] = 'Please log in first!';
        exit;
    } else {
        $user_id = $_SESSION['user_id'];
    }

    // Add product to favorites
    if (isset($_POST['action']) && $_POST['action'] === 'add_to_favorites') {
        $product_id = $_POST['id'];
        $user_model->add_to_favorites($user_id, $product_id);
        echo json_encode(['success'=>true]);
    }

    // Remove product to favorites
    if (isset($_POST['action']) && $_POST['action'] === "remove_from_favorites") {
        $product_id = $_POST['id'];

        $check_favorites = $user_model->check_favorites($user_id, $product_id);
        if ($check_favorites) {
            $user_model->remove_to_favorites($user_id, $product_id);
            echo json_encode(['success'=>true]);
        }        
    }
?>