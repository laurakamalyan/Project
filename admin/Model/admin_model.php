<?php
    class Model {
        public $conn;

        public function __construct() {
            $this->conn = mysqli_connect('localhost', 'root', '', 'toma_online_shop');
            if (!$this->conn) {
                die(mysqli_connect_error($this->conn));
            }
        }

        // Login admin
        public function admin($login, $pass) {
            $query = "SELECT * FROM admin WHERE login = '$login' AND password = '$pass'";
            $res = mysqli_query($this->conn, $query);
            return mysqli_num_rows($res);
        }

        // Add category
        public function add_category($category, $img) {
            $query = "INSERT INTO categories VALUES('null', '$category', '$img')";
            $res = mysqli_query($this->conn, $query);
        }

        // Get categories
        public function get_categories() {
            $query = "SELECT * FROM categories";
            $res = mysqli_query($this->conn, $query);
            $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
            return $result;
        }

        // Update category name
        public function update($id, $new_text) {
            $query = "UPDATE categories SET name = '$new_text' WHERE id = '$id'";
            $res = mysqli_query($this->conn, $query);
        }

        // Delete category
        public function delete($id) {
            $query = "DELETE FROM categories WHERE id=$id";
            $res = mysqli_query($this->conn, $query);
        }

        // Add product
        public function add_product($name, $description, $category_id, $img, $price) {
            $query = "INSERT INTO products VALUES(NULL, '$name', '$description', '$category_id', '$img', '$price')";
            $res = mysqli_query($this->conn, $query);
        }

        // Get products
        public function get_products($category_id) {
            $query = "SELECT * FROM products WHERE category_id = $category_id ORDER BY id DESC";
            $res = mysqli_query($this->conn, $query);
            $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
            return $result;
        }
        
        // Update product
        public function update_product($name, $desc, $price, $id) {
            $query = "UPDATE products SET name = '$name', description='$desc', price = '$price' WHERE id = '$id'";
            $res = mysqli_query($this->conn, $query);
            return $res;
        }

        // Delete product
        public function delete_product($id) {
            $query = "DELETE FROM products WHERE id = '$id'";
            $res = mysqli_query($this->conn, $query);
            return $res;
        }

        // Show orders
        public function get_orders() {
            $query = "SELECT users.*, orders.*, products.* from orders
            join products on orders.product_id = products.id 
            join users on users.id = orders.user_id";
            
            $res = mysqli_query($this->conn, $query);
            $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
            return $result;
        }

        public function __destruct() {
            mysqli_close($this->conn);
        }
    }

    $model = new Model();
?>