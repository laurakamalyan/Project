<?php
    session_start();
    include_once("./header.php");

    if (isset($_SESSION['admin'])) {
        header("location: home.php");
    }
?>

<link rel="stylesheet" href="../Assets/css/login.css">

<div class="login">
    <!-- Login form -->
    <form action="../Controller/login_controller.php" method="POST">
        <div>
            <label for="login">Username</label>
            <input type="text" name="login" placeholder="Username" id="login"> 
        </div>
        <div class="input_password">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" id="password">
            <span class="show_pass">Show</span>
        </div> 
        <button name="login_btn" value="login_btn" id="login_btn">Login as Admin</button>
        <!-- If username or password incorrect -->
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

<script src="../Assets/js/login.js"></script>

<?php
    include_once("./footer.php");
?>