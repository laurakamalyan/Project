<?php
    include_once("./header.php");
    include("../Model/users_model.php");

    $categories = $user_model->get_all_categories();
?>

<!-- CSS -->
<link rel="stylesheet" href="../Assets/css/menu2.css">

    <section id="categories">
        <h2 class="menu2_title">Categories</h2>
        <div class="shop_categories">
            <?php foreach($categories as $category) { 
                $id = $category['id'];
            ?>
                <a class="category" href="./products.php?category_id=<?=$category['id']?>&category_name=<?=$category['name']?>">
                    <div class="div1"></div>
                    <p><img src="http://localhost/Shop/admin/Assets/img/<?=$category['picture']?>" alt="Category picture"></p>
                    <h3><?=$category['name']?></h3>
                    <hr>
                </a>
            <?php } ?>
        </div>
    </section>

<script>
    // Add active link style
    $(`.menu1 li > a[href*= categories]`).addClass("active");

    // Change logo image
    $(".logo_pic").attr("src", "http://localhost/Shop/admin/Assets/img/logo.jpg");
</script>

<!-- Footer -->
<?php
    include_once("./footer.php");
?>