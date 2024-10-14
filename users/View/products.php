<?php
    include("./header.php");
    include("../Model/users_model.php");

    if(isset($_GET['category_id'])) {
        $_SESSION['category_id'] = $_GET['category_id'];
    }
    
    $products = $user_model->get_products($_SESSION['category_id']);
?>

<!-- CSS -->
<link rel="stylesheet" href="../Assets/css/menu2.css">

<h2 class="menu2_title"><?=$_GET['category_name']?></h2>

<div id="products">
    <?php foreach($products as $product) { ?>
        <div class="product" id = "<?=$product['id']?>">
            <h3><?=$product['name'] ?></h3>
            <?php
                if (isset($_SESSION['user_id'])) {
                    $check_favorites = $user_model->check_favorites($_SESSION['user_id'], $product['id']);
                    if ($check_favorites) {
                        echo '<p class="favorites" title="Add to favorites"><i class="fa fa-heart" aria-hidden="true"></i></p>';
                    } else {
                        echo '<p class="favorites" title="Add to favorites"><i class="fa fa-heart-o" aria-hidden="true"></i></p>';
                    }
                } else {
                    echo '<p class="favorites" title="Add to favorites"><i class="fa fa-heart-o" aria-hidden="true"></i></p>';
                }
                
            ?>
            
            <p><img src="../../admin/Assets/img/<?=$product['image']?>" alt="<?=$product['name']?>"></p>
            <div class="description_bg">
                <p class="description"><?=$product['description']?></p>
            </div>
            <button class="add_to_cart">Add to cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
        </div>
    <?php } ?>
</div>

<div id="result_order">
    <div class="modal">
        <p class="close"><i class="fa fa-times" aria-hidden="true"></i></p>
        <p>Product added to cart!</p>
    </div>
</div>

<!-- Scripts -->
<script src="../Assets/js/products.js"></script>

<!-- Footer -->
<?php
    include_once("./footer.php");
?>