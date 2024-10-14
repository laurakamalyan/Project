<?php
    session_start();
    include "./header.php";
    include "./navbar.php";
    include "../Model/admin_model.php";

    if (!isset($_SESSION['admin'])) {
        header("location: login.php");
    }

    if (isset($_GET['category_id'])) { 
        $_SESSION['category_id'] = $_GET['category_id'];
        $_SESSION['category_name'] = $_GET['category_name'];
    }
?>

<!-- CSS -->
<link rel="stylesheet" href="../Assets/css/products.css">

<h2><?=$_SESSION['category_name']?> category</h2>

<!-- Add new product -->
<div class="add_new_product">
    <h3>ADD NEW PRODUCT</h3>
    <form action="../Controller/product_controller.php" method="post" enctype="multipart/form-data">
        <input type="text" name ="name" placeholder="Name">
        <input type="text" name ="desc" placeholder="Description">
        <input type="text" name ="price" placeholder="Price">
        <label for="file_inp" id="file_label">Choose Image</label>
        <input type="file" name ="img" id="file_inp"> <br>
        <button name="action" value="add">Add product</button>
        <p class="error">
            <?php
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
            ?>
        </p>
    </form>
</div>

<!-- Show all products -->
<?php
    $products = $model->get_products($_SESSION['category_id']);
?>

<div class="show_products">
    <p class="mess"></p>
    <table border='1' cellspacing='0'>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        
        <?php foreach($products as $product) { ?>
            <tr id="<?=$product['id']?>">
                <td><p contenteditable="true" class="td_name"><?=$product['name']?></p></td>
                <td><img src="../Assets/img/<?=$product['image']?>" alt="Image"></td>
                <td><p contenteditable="true" class="td_desc"><?=$product['description']?></p></td>        
                <td><p contenteditable="true" class="td_price"><?=$product['price']?>$</p></td>
                <td><button class="btn_update">Update</button></td>
                <td><button class="btn_delete">Delete</button></td>
            </tr>
        <?php } ?>

    </table>
</div>

<!-- JS -->
<script src="../Assets/js/product.js"></script>

<!-- Footer -->
<?php
    include_once("./footer.php");
?>