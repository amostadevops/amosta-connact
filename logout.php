<?php
    session_start();
    session_destroy();
    echo "you are logged out";
    header('location:index.php'); 
?>