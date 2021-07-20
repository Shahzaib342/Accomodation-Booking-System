<?php

    include('../pages/db_conn.php');

    if (isset($_POST['register'])){
        $access=trim($_POST['access']);
        $firstname=trim($_POST['firstName']);
        $lastname =trim($_POST['lastName']);
        $email = trim($_POST['emailAddress']);
        $mobile = trim($_POST['mobileNumber']);
        $password = $_POST['pwd'];
        $salt = "KIT502";
        $encrypted_pwd = crypt($password,$salt);

        $abn = trim($_POST['abnNumber']);
        
        $uniqueSqlCheck = "SELECT email FROM users WHERE email='$email'";
        $result = $mysqli -> query($uniqueSqlCheck);
        $row = $result -> fetch_array(MYSQLI_ASSOC);

        echo $uniqueSqlCheck;
        echo $row;
        if(!is_null($row)){
            echo "<script type='text/javascript'>
            alert('This email has been used before, please use a different email');
            window.location='../pages/registration.php';
            </script>";
        } else {
            
            if($access == "Client"){
                $access=1;
            } else if ($access == "Host") {
                $access=2;
            } else if ($access == "Admin") {
                $access=3;
            };

            $register = "INSERT INTO users (`access`, `firstname`, `lastname`, `email`, `mobile`, `pwd`, `abn`) VALUES ('$access','$firstname','$lastname','$email','$mobile','$encrypted_pwd','$abn')";

            $mysqli->query($register);
            
                echo "<script type='text/javascript'>
                alert('You have successfully registered!');
                window.location='../pages/index.php';
                </script>";
        }
    }

 ?>
