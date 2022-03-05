<?php
    session_start();
    if(!isset($_SESSION['uname']))
    {
        echo "you are logged out";
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Customer Dashboard - Amosta ConnAct</title>
        <?php include 'header.php'; ?>
    </head>
    <body>
        <?php include 'top_bar_customer.php'; ?>
        <div class="container-fluid">
            <div class="row">
                
            </div>
        </div>
    </body>
</html>