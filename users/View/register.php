<?php
    include("./header.php");
    include("../Model/users_model.php");
?>

<style> 
    .active_register {
        border-color: #ac687a !important;
    }
</style>

<div id="form">
    <div class="flex-container">
        <div class="form_img">
            <p>
                <img src="../Assets/img/header_picture.png" alt="pic">
            </p>
        </div>
        <div class="form">
            <p>Sign up now!</p>
            <h2>Create Account</h2>

            <div class="error">
                <?php
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                ?>
            </div>
            
            <form action="../Controller/register_controller.php" method="POST">
                <input type="text" name="name" placeholder="Name" id="name"> <br>
                <input type="text" name="login" placeholder="Login" id="login"> <br>
                <input type="email" name="email" placeholder="Email address" id="email"> 

                <div class="input_password">
                    <input type="password" name="pass" placeholder="Password" id="password">
                    <span class="show_pass">Show</span>
                </div>

                <div class="input_password">
                    <input type="password" name="conf_pass" placeholder="Confirm password" id="conf_pass">
                    <span class="show_pass">Show</span>
                </div>
                
                <button name="btn_reg" value="btn">Sign up</button>
                
                <p>Have an account? <a href="./login.php">Log In Here</a></p>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="../Assets/js/form.js"></script>

<!-- Footer -->
<?php
    include_once("./footer.php");
?>