<?php
    class Model {
        public $conn;

        public function __construct() {
            $this->conn = mysqli_connect('localhost', 'root', '', 'toma_online_shop');
            if (!$this->conn) {
                die(mysqli_connect_error($this->conn));
            }
        }

        // Register new user
        public function add_user($name, $login, $pass, $email) {
            $query = "INSERT INTO users VALUES('null', '$name', '$login', '$pass', '$email')";
            $res = mysqli_query($this->conn, $query);
            return $res;
        }

        public function check_user($email) {
            $query = "SELECT * from users where email = '$email'";
            $res = mysqli_query($this->conn, $query);
            return mysqli_num_rows($res);
        }

        // Login
        public function check_login($email, $pass) {
            $query = "SELECT * from users where email = '$email' AND password = '$pass'";
            $res = mysqli_query($this->conn, $query);
            return mysqli_fetch_assoc($res);
        }

        // Show categories
        public function get_categories() {
            $query = "SELECT * FROM categories LIMIT 8";
            $res = mysqli_query($this->conn, $query);
            $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
            return $result;
        }

        // Show all categories
        public function get_all_categories() {
            $query = "SELECT * FROM categories";
            $res = mysqli_query($this->conn, $query);
            $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
            return $result;
        }

        // Show products
        public function get_products($category_id) {
            $query = "SELECT * FROM products WHERE category_id = $category_id";
            $res = mysqli_query($this->conn, $query);
            $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
            return $result;
        }

        // Add product to cart
        public function add_to_cart($user_id, $product_id, $quantity) {
            $query = "INSERT INTO cart VALUES(NULL, '$user_id', '$product_id', '$quantity')";
            mysqli_query($this->conn, $query);
        }

        public function check_cart($user_id, $prod_id) {
            $query = "SELECT * FROM cart WHERE user_id = '$user_id' AND product_id = '$prod_id'";
            $res = mysqli_query($this->conn, $query);
            $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
            return $result;
        }

        public function check_cart_quantity($user_id, $prod_id) {
            $query = "SELECT quantity FROM cart WHERE user_id = '$user_id' AND product_id = '$prod_id'";
            $res = mysqli_query($this->conn, $query);
            $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
            return $result;
        }

        public function update_cart_quantity($user_id, $prod_id, $newquant) {
            $query = "UPDATE cart SET quantity = '$newquant' WHERE user_id = '$user_id' AND product_id = '$prod_id'";
            $res = mysqli_query($this->conn, $query);
        }

        // Show cart
        public function get_cart_items($user_id) {
            $query = "SELECT name, price, image, quantity, description, cart.id, product_id, user_id FROM cart 
            JOIN products ON product_id = products.id WHERE user_id = '$user_id'";
            $res = mysqli_query($this->conn, $query);
            $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
            return $result;
        }
        
        // Delete product to cart
        public function delete($user_id, $id) {
            $query = "Delete FROM `cart` WHERE user_id = '$user_id' AND product_id = '$id'";
            $res = mysqli_query($this->conn, $query);
        }

        // Buy product
        public  function add_to_order($user_id){
            $today = date("Y-m-d");
            $query = "SELECT * FROM cart WHERE user_id = '$user_id'";
            $res = mysqli_query($this->conn, $query);
            $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
            
            foreach($result as $row){
                $prod_id = $row['product_id'];
                $quantity = $row['quantity'];
                $user_id = $row['user_id'];
                $query = "INSERT INTO orders VALUES(NULL, '$user_id','$prod_id','$quantity', '$today')";
                $res = mysqli_query($this->conn, $query);
            }

            return $res;
        }

        public function clear_cart($user_id) {
            $query = "DELETE FROM cart WHERE user_id = '$user_id'";
            $res = mysqli_query($this->conn, $query);
        }

        // Show orders
        public function getOrder($user_id) {
            $query = "SELECT ord.*, pr.* from orders as ord 
            left join products as pr on ord.product_id = pr.id 
            where ord.user_id = '$user_id'";

            $res = mysqli_query($this->conn, $query);
            $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
            return $result;
        }

        // Add to favorites
        public function add_to_favorites($user_id, $product_id) {
            $query = "INSERT INTO favorites VALUES(NULL, $user_id, $product_id)";
            $res = mysqli_query($this->conn, $query);
        }

        public function check_favorites($user_id, $product_id) {
            $query = "SELECT * FROM favorites WHERE user_id = '$user_id' AND product_id = '$product_id'";
            $res = mysqli_query($this->conn, $query);
            $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
            return $result;
        }

        // Remove to favorites
        public function remove_to_favorites($user_id, $product_id) {
            $query = "DELETE FROM `favorites` WHERE user_id = '$user_id' AND product_id = '$product_id'";
            $res = mysqli_query($this->conn, $query);
        }

        // Show favorites products
        public function get_favorites($user_id) {
            $query = "SELECT * FROM products
            JOIN favorites on products.id = favorites.product_id 
            WHERE favorites.user_id = $user_id";
            
            $res = mysqli_query($this->conn, $query);
            $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
            return $result;
        }


        public function __destruct() {
            mysqli_close($this->conn);
        }

    }
    $user_model = new Model();
?>