<?php
require "database.php";

class Main extends Database {
    private $conn;
    public $products = [];
    public $single_product = [];

    function __construct() {
        $database = new Database;
        $this->conn = $database->conn();
    }

    public function add_product(array $p_detail, array $p_images) {
        print_r($p_detail['p_id']);
    }

    public function get_products($limit) {
        if ($this->conn) {
            $get_products_query = "SELECT product_id,product_name,product_images,product_price,product_price FROM `tbl_products` WHERE product_tags LIKE '%all%' LIMIT 12 OFFSET $limit;";
            $run = $this->conn->query($get_products_query);
            if ($run->num_rows > 0) {
                while ($data = $run->fetch_assoc()) {
                    $this->products[] = $data;
                }
                return json_encode($this->products);
            }
        }
    }

    public function get_product_details($p_id) {
        if ($this->conn) {
            $get_product_query = "SELECT * FROM `tbl_products` WHERE product_id = '$p_id' LIMIT 1;";
            $run = $this->conn->query($get_product_query);
            if ($run->num_rows > 0) {
                while ($data = $run->fetch_assoc()) {
                    $this->single_product = $data;
                }
                return json_encode($this->single_product);
            }
        }
    }

    public function get_cart_items($cart) {
        if ($this->conn) {
            $items_in_cart = [];
            foreach ($cart as $p_id) {
                $p_id = explode(",", $p_id);
                $qty = $p_id[1];
                $p_id = $p_id[0];
                $get_product_query = "SELECT product_id,product_name,product_images,product_price FROM `tbl_products` WHERE product_id = '$p_id' LIMIT 1;";
                $run = $this->conn->query($get_product_query);
                if ($run->num_rows > 0) {
                    while ($data = $run->fetch_assoc()) {
                        $data['qty'] = $qty;
                        $items_in_cart[] = $data;
                    }
                }
            }
            return json_encode(array_merge($items_in_cart));
        }
    }

    public function get_total_amount($cart) {
        if ($this->conn) {
            $total_amount = 0;
            foreach ($cart as $p_id) {
                $p_id = explode(",", $p_id);
                $qty = $p_id[1];
                $p_id = $p_id[0];
                $get_product_query = "SELECT product_price FROM `tbl_products` WHERE product_id = '$p_id' LIMIT 1;";
                $run = $this->conn->query($get_product_query);
                if ($run->num_rows > 0) {
                    while ($data = $run->fetch_assoc()) {
                        $data['product_price'] *= $qty;
                        $total_amount += $data['product_price'];
                    }
                }
            }
            return $total_amount;
        }
    }

    public function authenticate($action, $email, $password) {
        if ($action == "Sign-Up") {
            $query = "SELECT user_email FROM tbl_users_login WHERE user_email = '$email' LIMIT 1;";
            $run = $this->conn->query($query);
            // return $run->num_rows;
            if ($run->num_rows > 0) {
                return -1;
            } else {
                $register_query = "INSERT INTO tbl_users_login (user_email,user_password,user_created_on) VALUES ('$email','$password',now());";
                $register_query2 = "INSERT INTO tbl_users_details (user_email) VALUES ('$email');";
                if ($this->conn->query($register_query) === true && $this->conn->query($register_query2) === true) {
                    return 1;
                } else {
                    return 0;
                }
            }
        } else if ($action == "Sign-In") {
            $query = "SELECT id FROM tbl_users_login WHERE user_password = '$password' AND user_email = '$email' LIMIT 1;";
            $run = $this->conn->query($query);
            if ($run->num_rows > 0) {
                return 2;
            } else {
                return 3;
            }
        } else {
        }
    }

    public function get_user_details($email) {
        $get_details_query = "SELECT * FROM tbl_users_details WHERE user_email = '$email' LIMIT 1;";
        // return json_encode(array("email"=>$get_details_query));
        $details = [];
        $run = $this->conn->query($get_details_query);
        if ($run->num_rows > 0) {
            while ($data = $run->fetch_assoc()) {
                $details = $data;
            }
            return json_encode($details);
        }
    }

    public function save_user_details($name, $email, $company, $company_email, $gst_no, $mobile, $address) {
        $save_user_query = "UPDATE tbl_users_details SET user_name='$name',company_name='$company',company_email='$company_email',gst_no='$gst_no',user_mobile='$mobile',user_address='$address' WHERE user_email = '$email';";
        // return $save_user_query;
        if ($this->conn->query($save_user_query) === TRUE) {
            // echo "Record updated successfully";
            return 1;
        } else {
            // echo "Error updating record: " . $thid->conn->error;
            return 0;
        }
    }

    function __destruct() {
        $this->conn->close();
    }
}
