<?php
session_start();
require_once "Main.php";
$obj = new Main;

if(isset($_GET['checkout'])) {
    if(!$_SESSION['loggedin']) {
        header('location:../customer.php?alert=SignIn%20Required');
    } else {
        // payment gateway
    }

}

if(isset($_GET['pagination']) && isset($_GET['limit'])) {
    if($_GET['pagination'] == 'next') {
        $limit = $_GET['limit'];
        $current_page = $_GET['current_page'];
        $current_page += 1;
        $limit = 12*$current_page-12;
        header('location:../index.php?current_page='.$current_page.'&limit='.$limit);
    } else if($_GET['pagination'] == 'previous') {
        $limit = $_GET['limit'];
        $current_page = $_GET['current_page'];
        $current_page -= 1;
        $limit = 12*$current_page-12;
        if($current_page <= 0 || $limit < 0) {
            header('location:../index.php?current_page=1&limit=0');
        } else {
            header('location:../index.php?current_page='.$current_page.'&limit='.$limit);
        }
    }
}

if(isset($_POST['save_user_details'])) {
    $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
    $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
    $company_name = isset($_POST['company_name']) ? $_POST['company_name'] : '';
    $company_email = isset($_POST['company_email']) ? $_POST['company_email'] : '';
    $gst_no = isset($_POST['gst_no']) ? $_POST['gst_no'] : '';
    $user_mobile = isset($_POST['user_mobile']) ? $_POST['user_mobile'] : '';
    $user_address = isset($_POST['user_address']) ? $_POST['user_address'] : '';
    // echo $obj->save_user_details($user_name,$user_email,$company_name,$company_email,$gst_no,$user_mobile,$user_address);
    if($obj->save_user_details($user_name,$user_email,$company_name,$company_email,$gst_no,$user_mobile,$user_address) == 1) {
        header('location:../customer.php?alert=Deatils%20Updated%20Successfuly');
    }
    header('location:../customer.php');
}

if(isset($_GET['sign_out'])) {
    if($_GET['sign_out'] == 1) {
        unset($_SESSION['user']);
        $_SESSION['loggedin'] = false;
        header('location:../customer.php');
    }
}

if(isset($_POST['sign-up']) || isset($_POST['sign-in'])) {
    $action = isset($_POST['sign-in']) ? $_POST['sign-in'] : $_POST['sign-up'];
    $email = !empty($_POST['email']) ? $_POST['email'] : 0;
    $password = !empty($_POST['password']) ? $_POST['password'] : 0;
    $cnf_password = !empty($_POST['cnf-password']) ? $_POST['cnf-password'] : 0;
    if($cnf_password != 0) {
        if($password != $cnf_password) {
            header("location:../customer.php?alert=Password%20Does%20Not%20Match");
        }
        else {
            $password = $cnf_password;
            $response = $obj->authenticate($action,$email,$password);
            if($response == 1) {
                header('location:../customer.php?alert=Registered%20Successfuly%20Sign-In%20Now');
            } else if($response == -1) {
                header('location:../customer.php?alert=User%20with%20this%20email%20already%20registered');
            }
        }
    } else {
        // echo "sign in";
        $response = $obj->authenticate($action,$email,$password);
            if($response == 2) {
                $_SESSION['user'] = $email;
                $_SESSION['loggedin'] = true;
                header('location:../customer.php?alert=Successfuly%20Signed%20In');
            } else if($response == 3) {
                header('location:../customer.php?alert=Incorrect%20Email%20or%20Password');
            }
    }
}

if (isset($_GET['add_to_cart'])) {
    if (!$_SESSION['cart']) {
        $_SESSION['cart'] = [];
    }
    if (!in_array($_GET['add_to_cart'].",1", $_SESSION['cart'])) {
        array_push($_SESSION['cart'], $_GET['add_to_cart'] . ",1");
        header('location:../index.php?alert=Product%20Added%20to%20Cart');
    } else {
        header("location:../index.php?alert=Already%20Added%20to%20Cart");
    }
}

// cart
if (isset($_GET['qty']) && isset($_GET['p_id'])) {
    $item = [];
    $count = -1;
    if ($_GET['qty'] == "addOne") {
        foreach ($_SESSION['cart'] as $items) {
            $count++;
            $item = explode(",", $items);
            if ($item[0] == $_GET['p_id']) {
                $item[1] += 1;
                $item = implode(",", $item);
                $_SESSION['cart'][$count] = $item;
            }
        }
        header('location:../cart.php');
    } else if ($_GET['qty'] == "minusOne") {
        foreach ($_SESSION['cart'] as $items) {
            $count++;
            $item = explode(",", $items);
            if ($item[0] == $_GET['p_id']) {
                // echo $item[1];
                if ($item[1] <= 1) {
                    \array_splice($_SESSION['cart'], $count, 1);
                    header('location:../cart.php');
                    // print_r($_SESSION['cart']);
                } else {
                    $item[1] -= 1;
                    $item = implode(",", $item);
                    $_SESSION['cart'][$count] = $item;
                }
            }
        }
        header('location:../cart.php');
    }
}

if (isset($_GET['clear_cart'])) {
    $_SESSION['cart'] = [];
    header('location:../index.php');
}