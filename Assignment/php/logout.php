<?php
    include("../pages/session.php");
    //destroy the sessions saved before.
    session_destroy();
    echo '<script type="text/javascript"> alert("You are now logged out") </script>';
    //automatically go back to previous page
    if(isset($_SERVER['HTTP_REFERER'])) {
        header('Location: '.$_SERVER['HTTP_REFERER']);  
       } else {
        header('Location: ../pages/index.php');
       }
?>