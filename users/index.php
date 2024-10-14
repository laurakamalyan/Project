<?php
    // session_start();
    include_once("./View/header.php");
    include("Model/users_model.php");

    $categories = $user_model->get_categories();
?>

    <main id="main">
        <!-- Home -->
        <section id="home">
            <div class="picture">
                <img src="./Assets/img/header_picture.png" alt="Online Shop">
            </div>
            <div class="text">
                <p class="p1">50% off <br> first order</p>
                <p class="p2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate libero accusantium veritatis perferendis fugit modi officiis enim voluptatum. Optio velit recusandae porro quibusdam explicabo dicta hic sapiente nesciunt ea perferendis!</p>
            </div>
        </section>
        <!-- End Home -->


        <!-- Categories -->
        <section id="categories">
            <div class="title">
                <h2>Categories</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur ut dolore placeat doloremque, quos mollitia? Quos repellendus repudiandae, fugit dicta numquam at soluta provident nobis sunt voluptatum debitis dolorum excepturi.</p>
            </div>
            <div class="shop_categories">
                <?php foreach($categories as $category) { ?>
                    <a class="category" href="./View/products.php?category_id=<?=$category['id']?>&category_name=<?=$category['name']?>">
                        <div class="div1"></div>
                        <p><img src="../admin/Assets/img/<?=$category['picture']?>" alt="Category picture"></p>
                        <h3><?=$category['name']?></h3>
                        <hr>
                    </a>
                <?php } ?>
            </div>
            <button class="btn" id="show_all_categories" type="button"><a href="./View/categories.php">Show All Categories</a></button>
        </section>
        <!-- End Categories -->


        <!-- About -->
        <section id="about">
            <div class="title">
                <h2>Why Shop With Us?</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur ut dolore placeat doloremque, quos mollitia? Quos repellendus repudiandae, fugit dicta numquam at soluta provident nobis sunt voluptatum debitis dolorum excepturi.</p>
            </div>
            <div class="about_us">
                <div>
                    <p><i class="fa fa-rocket" aria-hidden="true"></i></p>
                    <h4>Fast Delivery</h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet in culpa illum natus corporis. Assumenda?</p>
                </div>
                
                <div>
                    <p><i class="fa fa-truck" aria-hidden="true"></i></p>
                    <h4>Free Shiping</h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet in culpa illum natus corporis. Assumenda?</p>
                </div>
                
                <div>
                    <p><i class="fa fa-star" aria-hidden="true"></i></p>
                    <h4>Best Quality</h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet in culpa illum natus corporis. Assumenda?</p>
                </div>
            </div>
        </section>
        <!-- End About -->


        <!-- Contact -->
        <section id="contact">
            <div class="title">
                <h2>Get In Touch</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur ut dolore placeat doloremque, quos mollitia? Quos repellendus repudiandae, fugit dicta numquam at soluta provident nobis sunt voluptatum debitis dolorum excepturi.</p>
            </div>
            <div class="error">
                <?php
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                ?>
            </div>
            <div class="contact_info">
                <div class="info">
                    <h3>Contact Information</h3>
                    <p>Feel free to contact us any time. We will get back to you as soon as we can!</p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i> +123456789</p>
                    <p><i class="fa fa-envelope-o" aria-hidden="true"></i> support@gmail.com</p>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> Yerevan, Armenia</p>
                    <div class="circle"></div>
                </div>
                <div class="contact_form">
                    <p id="contact_error">Please input all fields!</p>
                    <input type="text" placeholder="Your Name" id="name_contact"> <br>
                    <input type="email" placeholder="Email Address" id="email_contact"> <br>
                    <textarea placeholder="Message" rows="6" id="message_contact"></textarea> <br>
                    <button class="btn send_message">Send Message</button>
                </div>
            </div>
            
            <div id="contact_modal">
                <div class="modal">
                    <p class="close"><i class="fa fa-times" aria-hidden="true"></i></p>
                    <p>Message Send!</p>
                </div>
            </div>
        </section>
        
        <!-- End Contact -->
    </main>

    <!-- Scripts -->
    <script src="./Assets/js/script.js"></script>

<!-- Footer -->
<?php
    include_once("./View/footer.php");
?>