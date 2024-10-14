<?php
    include("./header.php");
    include("../Model/users_model.php");
    if(!isset($_SESSION['user_id'])) {
        $_SESSION['error'] = 'Please log in first!';
        header('location: ./login.php');
    } else {
        $user_id = $_SESSION['user_id'];
        $all = $user_model->get_favorites($user_id);
    }
?>

<!-- CSS -->
<link rel="stylesheet" href="../Assets/css/menu2.css">

<h2 class="menu2_title">Favorites</h2>
<?php if (empty($all)) { ?>
        <div class='empty'>
            <p>Favorites is currently empty!</p>
            <p>Check out the categories page to choose products</p>
            <button><a href="./categories.php">Choose products</a></button>
        </div>
    <?php } ?>
<div id="favorites">
    <?php foreach($all as $value) { ?>
        <div class="product" id = "<?=$value['product_id']?>">
            <h3><?=$value['name'] ?></h3>
            <p><img src="../../admin/Assets/img/<?=$value['image']?>" alt="<?=$value['name']?>"></p>
            <div class="description_bg">
                <p class="description"><?=$value['description']?></p>
            </div>
            <button class="add_to_cart">Add to cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
            <button class="remove_from_favorites">Remove <i class="fa fa-trash" aria-hidden="true"></i></button>
        </div>   
    <?php } ?>
</div>

<div id="result_order">
    <div class="modal">
        <p class="close"><i class="fa fa-times" aria-hidden="true"></i></p>
        <p>Product added to cart!</p>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Add active link style
        $(`.menu2 li > a[href*= favorites]`).addClass("active");

        // Change logo image
        $(".logo_pic").attr("src", "http://localhost/Shop/admin/Assets/img/logo.jpg");

        // Add product to cart
        $('.add_to_cart').click(function(){
            let id = $(this).parent('div').attr('id');
            
            $.ajax({
                url: "../Controller/cart_controller.php",
                method: "post",
                dataType: "json",
                data: {
                    id, 
                    action: 'add'
                },
                success: function(res) {
                    if (!res.success) {
                        location.href = "../View/login.php";             
                    } else {
                        // Show modal window
                        $("#result_order").css("display", "block");
                    }
                }
            });
        });

        // Remove product from favorites
        $('.remove_from_favorites').click(function(){
            let id = $(this).parent('div').attr('id');
            
            $.ajax({
                url: "../Controller/favorites_controller.php",
                method: "post",
                data: {
                    id,
                    action: "remove_from_favorites",
                },
                dataType: "json",
                success: function(res) {
                    if (res.success) {
                        location.reload();
                    }
                },
            });
        });

        // Close modal window
        $(".close").on("click", function() {
            $("#result_order").css("display", "none");
            location.reload();
        });
    });
</script>

<!-- Footer -->
<?php
    include_once("./footer.php");
?>