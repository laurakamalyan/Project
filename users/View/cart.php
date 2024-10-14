<?php
    include("./header.php");
    include '../Model/users_model.php';
    
    if(!isset($_SESSION['user_id'])) {
        $_SESSION['error'] = 'Please log in first!';
        header('location: ./login.php');
    }

    $user_id = $_SESSION['user_id'];
    $all = $user_model->get_cart_items($user_id);
?>

<!-- CSS -->
<link rel="stylesheet" href="../Assets/css/menu2.css">

<h2 class="menu2_title">Cart</h2>

<div id="cart">

    <?php if (empty($all)) { ?>
        <div class='empty'>
            <p>Your cart is currently empty!</p>
            <p>Check out the categories page to choose products</p>
            <button><a href="./categories.php">Choose products</a></button>
        </div>
    <?php } else { ?>

        <table class="cart_products">
            <?php

                $sum = 0;
                $total = 0;
                foreach($all as $value) {
                    $price = $value['price'];
                    $quantity = $value['quantity'];
                    $sum = $price * $quantity;
                    $total += $sum; 
            ?>

                <tr id = "<?=$value['id']?>">
                    <td><img src="../../admin/Assets/img/<?=$value['image']?>" alt="Cart image"></td>
                    <td>
                        <h4 class="td_name"><?=$value['name']?></h4>
                        <p class="td_desc"><?=$value['description']?></p>
                        <p class="td_price"><?=$value['price']?>$</p>
                        <div class ="<?=$value['product_id']?>">
                            <button class="btn_remove"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </div>
                    </td>
                    
                    <td id="<?=$value['product_id']?>" class="td_update_quantity">
                        <button class="minus">-</button>
                        <span><?=$value['quantity']?></span>
                        <button class="plus">+</button>
                    </td>
                    <td class="td_sum"><p class='sum'><?=$sum?>$</td>
                    
                </tr>

            <?php } 
                $_SESSION['total'] = $total;        
            ?>        
        </table>

        <div class="buy_products">
            <div>
                <p>Total</p>
                <p><?=$total?>$</p>
            </div>
            <button class="order">Buy</button>
        </div>

    <?php } ?>
</div>



<div id="result_order">
    <div class="modal">
        <p class="close"><i class="fa fa-times" aria-hidden="true"></i></p>
        <p class="success"></p>
        <p class="error" style="color: red;"></p>
    </div>
</div>

<!-- Scripts -->
<script src="../Assets/js/cart.js"></script>

<!-- Footer -->
<?php
    include_once("./footer.php");
?>