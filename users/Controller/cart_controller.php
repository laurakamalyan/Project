<?php
    session_start();
    include("../Model/users_model.php");

    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success'=>false]);
        $_SESSION['error'] = 'Please log in first!';
        die;
    } else {
        $user_id = $_SESSION['user_id'];
    }

    // Add product to cart
    if (isset($_POST['action']) && $_POST['action'] === 'add') {
        $id = $_POST['id'];
        $check_cart = $user_model->check_cart($user_id, $id);
        if ($check_cart) {
            $quant = $user_model->check_cart_quantity($user_id, $id);
            
            $newquant = ++$quant[0]['quantity'];

            $user_model->update_cart_quantity($user_id, $id, $newquant);
            echo json_encode(['success'=>true]);
        } else {
            $user_model->add_to_cart($user_id, $id, 1);
            echo json_encode(['success'=>true]);
        }
    }

    // Update minus
    if (isset($_POST['action']) && $_POST['action'] === 'minus') {
        $id = $_POST['id'];
        $quant = $user_model->check_cart_quantity($user_id, $id);
        $newquant = --$quant[0]['quantity'];

        if ($quant[0]['quantity'] === 0) {
            $user_model->delete($user_id, $id);
            die;
        }
        $user_model->update_cart_quantity($user_id, $id, $newquant);
    }

    // Update plus
    if (isset($_POST['action']) && $_POST['action'] === 'plus') {
        $id = $_POST['id'];
        $quant = $user_model->check_cart_quantity($user_id, $id);        
        $newquant = ++$quant[0]['quantity'];
        $user_model->update_cart_quantity($user_id, $id, $newquant);
    }

    // Delete product
    if (isset($_POST['action']) && $_POST['action'] === 'remove') {
        $id = $_POST['id'];
        $user_model->delete($user_id, $id);
    }
?>