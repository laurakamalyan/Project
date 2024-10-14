<?php
    include("./header.php");
    include("../Model/users_model.php");
    if(!isset($_SESSION['user_id'])) {
        $_SESSION['error'] = 'Please log in first!';
        header('location: ./login.php');
    }

    $user_id = $_SESSION['user_id'];
    $all = $user_model->getOrder($user_id);
?>

    <!-- CSS -->
    <link rel="stylesheet" href="../Assets/css/menu2.css">

    <h2 class="menu2_title">Orders</h2>


    <div id="orders">
        <?php if (empty($all)) { ?>
                <div class='empty'>
                    <p>Orders is currently empty!</p>
                    <p>Check out the categories page to choose products</p>
                    <button><a href="./categories.php">Choose products</a></button>
                </div>
        <?php } else { ?>
        
        <table>
            <?php foreach($all as $value) {?>
                <tr id = "<?=$value['id']?>">
                    <td>
                        
                        <img src="../../admin/Assets/img/<?=$value['image']?>" alt="Order product">
                    </td>
                    
                    <td>
                        <p class="td_name"><?=$value['name']?></p>
                        <p><?=$value['description']?></p>
                    </td>
                    <td>Quantity: <?=$value['quantity']?></td>
                    <td><?=$value['create_date']?></td>
                </tr>
            <?php } ?>
        </table>

        <?php } ?>
    </div>

    <script>
        // Add active link style
        $(`.menu2 li > a[href*= orders]`).addClass("active");

        // Change logo image
        $(".logo_pic").attr("src", "http://localhost/Shop/admin/Assets/img/logo.jpg");
    </script>

<!-- Footer -->
<?php
    include_once("./footer.php");
?>
