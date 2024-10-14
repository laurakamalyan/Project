<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="http://localhost/Shop/users/Assets/css/header.css">
    <link rel="stylesheet" href="http://localhost/Shop/users/Assets/css/style.css">
    <link rel="stylesheet" href="http://localhost/Shop/users/Assets/css/form.css">
    <link rel="stylesheet" href="http://localhost/Shop/users/Assets/css/products.css">
    <link rel="stylesheet" href="http://localhost/Shop/users/Assets/css/cart.css">
    <link rel="stylesheet" href="http://localhost/Shop/users/Assets/css/footer.css">
    
    <!-- Title icon -->
    <link rel="shortcut icon" href="http://localhost/Shop/users/Assets/img/title_icon.png" type="image/x-icon">
    <title>TOMA - Kids Online Shop</title>
    
    <!-- JQuery -->
    <script src="http://localhost/Shop/users/Assets/js/jquery-3.7.1.js"></script>
</head>

<body>
    <?php
        session_start();
        function create_url($path) {
            $base_url = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . "/Shop/users/View/";
            return $base_url . $path;
        }

        $items_center = array(
            "HOME" => "http://localhost/Shop/users/index.php#home",
            "SHOP" => "http://localhost/Shop/users/index.php#categories",
            "ABOUT" => "http://localhost/Shop/users/index.php#about",
            "CONTACT" => "http://localhost/Shop/users/index.php#contact",
        );

        $items_right = array(
            "FAVORITES <i class='fa fa-heart' aria-hidden='true'></i>" => create_url("favorites.php"),
            "CART <i class='fa fa-shopping-cart' aria-hidden='true'></i>" => create_url("cart.php"),
            "ORDERS" => create_url("orders.php"),
        );

        if(isset($_SESSION['user_email'])) {
            $items_right[$_SESSION['user_email']] = "#";
            $items_right['LOG OUT'] = "http://localhost/Shop/users/Controller/logout_controller.php";
        } else {
            $items_right['LOG IN'] = create_url('login.php');
            $items_right['SIGN UP'] = create_url('register.php');
        }
    ?>

    <!-- Header -->
    <header id="header">
        <div class="toggler_menu"><i class="fa fa-bars" aria-hidden="true"></i></div>
        <!-- Navbar -->
        <nav class="navbar">
            <div class="flex-container">
                <div class="flex-item">
                    <a href="http://localhost/Shop/users/index.php" class="logo">
                        <img src="http://localhost/Shop/users/Assets/img/logo.png" alt="Logo" class="logo_pic">    
                    </a>
                </div>
                <div class="flex-item">
                    <ul class="menu1">
                        <?php foreach($items_center as $label=>$url) { ?>
                            <li><a href="<?=$url?>" class='item'><?=$label?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="flex-item">
                    <ul class="menu2">
                        <?php foreach($items_right as $label=>$url) { ?>
                            <li><a href="<?=$url?>" class='item'><?=$label?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
    </header>
    <!-- End Header -->

    