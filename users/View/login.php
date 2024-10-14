<?php
    include("./header.php");
    include("../Model/users_model.php");
?>

<style> 
    .active_login {
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
            <p>Welcome back!</p>
            <h2>Login Your Account</h2>

            <div class="error">
                <?php
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                ?>
            </div>

            <form action="../Controller/login_controller.php" method="POST">
                <div class="input_email">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" placeholder="Email address" id="email"> 
                </div>

                <div class="input_password">
                    <label for="password">Password</label>
                    <a href="#" class="forgot_password">Forgot your password?</a>
                    <input type="password" name="pass" placeholder="Password" id="password">
                    <span class="show_pass" style="top: 30px;">Show</span>
                </div>

                <div class="remember_checkbox">
                    <label for="remember">
                        <input type="checkbox" name="inp_check" class="checkbox" id="remember">
                        Remember
                    </label>
                </div>
                
                <button name="btn_login" value="btn">Login</button>
                
                <p>Don't have an account? <a href="./register.php">Sign Up Here</a></p>
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