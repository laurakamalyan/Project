<?php 
	session_start();	
	include "../Model/users_model.php";

	$action = isset($_POST['action']) ? $_POST['action'] : "";
	$user_id = $_SESSION['user_id'];
	
	if($action === "order-item"){
		$carts = $user_model->get_cart_items($user_id);
		if(count($carts)>0){
			$order = $user_model->add_to_order($user_id);
			if($order){
				$returnArr['action']="1";
				$returnArr['message']="Order created Successfully";

                $user_model->clear_cart($user_id);
            }else{
				$returnArr['action']="0";
				$returnArr['message']="Failed to order";
			}
		}else{
			$returnArr['action']="0";
			$returnArr['message']="Nothing to order";
		}
		echo json_encode($returnArr);
		die;
	}
?>