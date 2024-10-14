<?php
    session_start();
    include("../Model/admin_model.php");
    include_once("./header.php");
    include_once("./navbar.php");

    if (!isset($_SESSION['admin'])) {
        header("location: login.php");
        die;
    }

    $all = $model->get_orders();
?>

<!-- CSS -->
<link rel="stylesheet" href="../Assets/css/orders.css">

<h2>Orders</h2>

<div class="show_order_products">
    <table border='1' cellspacing = '0'>
        <tr>
            <th>User</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Image</th>
            <th>Date</th>
        </tr>
        <?php foreach($all as $value) {?>
            <tr id = "<?=$value['id']?>">
                <td class="td_email"><?=$value['email']?></td>
                <td><?=$value['name']?></td>
                <td><?=$value['description']?></td>
                <td><span class='quantity'>Quantity: </span><?=$value['quantity']?></td>
                <td><img src="../Assets/img/<?=$value['image']?>" alt="Order product"></td>
                <td><?=$value['create_date']?></td>
            </tr>
        <?php } ?>
    </table>
</div>

<!-- Footer -->
<?php
    include_once("./footer.php");
?>