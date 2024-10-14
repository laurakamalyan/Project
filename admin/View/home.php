<?php
    session_start();
    include("../Model/admin_model.php");
    include_once("./header.php");
    include_once("./navbar.php");

    if (!isset($_SESSION['admin'])) {
        header("location: login.php");
    }

    $categories = $model->get_categories();
?>

<!-- CSS -->
<link rel="stylesheet" href="../Assets/css/home.css">


<!-- Add new category -->
<div class="add_new_category">
    <h2>ADD NEW CATEGORY</h2>
    <form action="../Controller/category_controller.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="new_category" placeholder="Category Name" class="new_category_inp">
        <label for="file_inp" id="file_label">Choose Image</label>
        <input type="file" name="img" id="file_inp">
        <br>
        <button name="action" value="add" data-buttonText="Your label here.">Add Category</button>
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


<!-- Show all categories -->
<div class="categories">
    <?php 
        foreach($categories as $category) { 
        $id = $category['id'];
    ?>
        <div class="category">
            <h3 contenteditable="true"><?=$category['name']?></h3>
            <p><img src="../Assets/img/<?=$category['picture']?>" alt="Category picture"> </p>
            <button class="update" data-id="<?=$id?>">Update</button>
            <button class="delete" data-id="<?=$id?>">Delete</button>
            <button><a href="./products.php?category_id=<?=$id?>&category_name=<?=$category['name']?>">Show</a></button>
        </div>
    <?php } ?>
</div>

<!-- JS -->
<script src="../Assets/js/category.js"></script>

<!-- Footer -->
<?php
    include_once("./footer.php");
?>