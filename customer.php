<?php
include "header.php";
if (!isset($_SESSION['loggedin']) && !isset($_SESSION['user']) || !$_SESSION['loggedin']) {
    // login form code
?>
    <div id="fh5co-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 animate-box">
                    <h3>Sign In</h3>
                    <form action="backend/request_handler.php" method="post">

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="email">Email</label> -->
                                <input type="text" name="email" class="form-control" placeholder="Your email address" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="subject">Subject</label> -->
                                <input type="password" id="sign-in-passwd" name="password" class="form-control" placeholder="Your Password" required>
                                <input type="checkbox" onclick="show_password('sign-in-passwd')"> Show Password
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sign-In" name="sign-in" class="btn btn-primary">
                        </div>

                    </form>
                </div>
                <div class="col-md-5 col-md-push-1 animate-box">

                    <div class="fh5co-contact-info">
                        <h3>Sign Up</h3>
                        <form action="backend/request_handler.php" method="post">

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <!-- <label for="email">Email</label> -->
                                    <input type="text" name="email" class="form-control" placeholder="Your email address" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <!-- <label for="subject">Subject</label> -->
                                    <input type="password" id="sign-up-passwd" name="password" class="form-control" placeholder="Your Password" required>
                                    <input type="checkbox" onclick="show_password('sign-up-passwd')"> Show Password
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <!-- <label for="subject">Subject</label> -->
                                    <input type="password" id="sign-up-passwd-cnf" name="cnf-password" class="form-control" placeholder="Confirm Your Password" required>
                                    <input type="checkbox" onclick="show_password('sign-up-passwd-cnf')"> Show Password
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Sign-Up" name="sign-up" class="btn btn-primary">
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
<?php
} else {
    // dashboard code
    require "backend/Main.php";
    $obj = new Main;
    $details = json_decode($obj->get_user_details($_SESSION['user']),true);
    // print_r($details);
?>
    <div class="container">
        <h3>Hi, <?php echo $_SESSION['user']; ?></h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Your Orders</th>
                    <!-- <th scope="col">Shipping Address</th> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>No Orders Yet, create one from <a href='index.php'>Home</a></td>
                </tr>
            </tbody>
        </table>
        <div class="feature-center animate-box" data-animate-effect="fadeIn">
            <span class="icon">
                <i class="icon-address"></i>
            </span>
            <h3>Your Details</h3>
            <form action="backend/request_handler.php" method="post">
                <div class="row form-group">
                    <div class="col-md-12">
                        <!-- <label for="fname">First Name</label> -->
                        <input type="text" name="user_name" class="form-control" placeholder="Your Full Name" value="<?php echo $details['user_name']; ?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <!-- <label for="email">Email</label> -->
                        <input type="email" name="user_email" class="form-control" placeholder="Your email address" value="<?php echo $details['user_email']; ?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <!-- <label for="email">Email</label> -->
                        <input type="text" name="company_name" class="form-control" placeholder="Your Company Name" value="<?php echo $details['company_name']; ?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <!-- <label for="email">Email</label> -->
                        <input type="text" name="company_email" class="form-control" placeholder="Your Company email address" value="<?php echo $details['company_email']; ?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <!-- <label for="email">Email</label> -->
                        <input type="text" name="gst_no" class="form-control" placeholder="Your GST No." value="<?php echo $details['gst_no']; ?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <!-- <label for="subject">Subject</label> -->
                        <input type="tel" name="user_mobile" class="form-control" placeholder="Your Contact/Mobile Number" value="<?php echo $details['user_mobile']; ?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <!-- <label for="message">Message</label> -->
                        <textarea name="user_address" cols="30" rows="10" class="form-control" placeholder="Full Address with Pincode"><?php echo $details['user_address']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Save Changes" name="save_user_details" class="btn btn-primary">
                </div>

            </form>
            <!-- <p><a href="#" class="btn btn-primary btn-outline">Save Changes</a></p> -->
        </div>
    </div>
<?php
}
include "footer.php";
?>