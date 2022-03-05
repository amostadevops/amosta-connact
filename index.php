<?php
    session_start();
?>
<?php
    include 'connect.php';
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $user_search = "select * from user where username = '$username' and password = '$password' limit 1";
        $query = mysqli_query($conn, $user_search);
        $user_count = mysqli_num_rows($query);
        if($user_count)
        {
            $row = mysqli_fetch_assoc($query);
            $_SESSION['uname'] = $row['username'];
            $_SESSION['user_type'] = $row['usertype'];
            if($_SESSION['user_type'] == 'Admin')
            {
                header('location:admin_dashboard.php');
            }
            if(  $_SESSION['usertype'] == 'L1 Manager')
            {                 
                header('location:l1manager_dashboard.php');
                
            }
            if(  $_SESSION['usertype'] == 'L2 Manager')
            {
                header('location:l2manager_dashboard.php');
                
            }
            if(  $_SESSION['usertype'] == 'Verification Executive')
            {
                header('location:verification_executive_dashboard.php');
                
            }
            if(  $_SESSION['usertype'] == 'Client')
            {
                header('location:client_dashboard.php');
                
            }
        }            
        else
        {
            echo '<script>
            alert("Invalid User")
            </script>';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Amosta Identity Management Solutions</title>
        <?php include 'header.php'; ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center login-main-card">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <p></p>
                                    <img class="home-banner login-left-card shadow" src="assets/images/banners/home-banner.jpg">
                                </p>                                    
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <p>
                                            <img class="img-fluid px-1" src="assets/images/logos/acp-logo.png">
                                            <img class="img-fluid px-1" src="assets/images/logos/amosta-logo-website2.png">
                                            <img class="img-fluid px-1" src="assets/images/logos/hum-hai-web.png">
                                        </p>
                                        <form method="POST">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                                                <label for="floatingInput">Username</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                            <!-- <p class="text-danger invalid-login" style="display: none;">Invalid Username/Password</p> -->
                                            <div class="d-grid gap-2 mx-auto my-3">
                                                <input class="btn btn-success amosta-button btn-block" type="submit" value="LOGIN" name="submit">
                                            </div>
                                            <div class="d-grid gap-2 mx-auto my-3">
                                                <input class="btn btn-warning btn-block" type="reset" value="RESET">
                                            </div>
                                            <p>Forgot Password? <a href="forgot_password.php">Click Here.</a></p>
                                            <div class="container-fluid py-3">
                                                <div class="row">
                                                    <div class="col-md-5th-1 col-sm-4 col-md-offset-0 col-sm-offset-2">
                                                        <img class="img-fluid" src="assets/images/logos/facebook-logo.png">
                                                    </div>
                                                    <div class="col-md-5th-1 col-sm-4">
                                                        <img class="img-fluid" src="assets/images/logos/twitter-logo.png">
                                                    </div>
                                                    <div class="col-md-5th-1 col-sm-4">
                                                        <img class="img-fluid" src="assets/images/logos/instagram-logo.png">
                                                    </div>
                                                    <div class="col-md-5th-1 col-sm-4">
                                                        <img class="img-fluid" src="assets/images/logos/linkedin-logo.png">
                                                    </div>
                                                    <div class="col-md-5th-1 col-sm-4">
                                                        <img class="img-fluid" src="assets/images/logos/youtube-logo.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>                                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>