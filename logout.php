<?php 
    session_start();
    session_destroy();
    echo "Thank you! click <a href='login.php'>here!</a> to continue.";
?>