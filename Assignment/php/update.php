<?php
include ('../pages/db_conn.php');
include ('../pages/session.php');

if(isset($_POST['firstname'])){
    $firstname=trim($_POST['firstname']);
    $lastname=trim($_POST['lastname']);
    $email=trim($_POST['email']);
    $mobile=trim($_POST['mobile']);
    $abn=trim($_POST['abn']);
    $address=trim($_POST['address']);

    $sql ="UPDATE users SET firstname='$firstname',lastname='$lastname',email='$email',mobile='$mobile',abn='$abn',userAddress='$address' WHERE id=$session_id";
    $result = $mysqli->query($sql);

    $_SESSION['session_user']=$firstname;
    $_SESSION['session_lastname']=$lastname;
    $_SESSION['session_email']=$email;
    $_SESSION['session_mobile']=$mobile;
    
    header('Location: ../pages/accountpage.php?updated');
    //echo '<script type="text/javascript">$("#updateConf").html("<span style="color:green;">Account Updated</span>") </script>';
    //echo '<script type="text/javascript"> alert("Account Updated!") </script>';
    //echo '<script type="text/javascript"> window.location.reload() </script>';
}

    
if(isset($_POST['newpwd'])){
    $password=trim($_POST['oldpwd']);
    $newpwd=trim($_POST['newpwd']);
    $salt="KIT502";
    $encrypted_pwd = crypt($password,$salt);
    $tmpSql = "SELECT pwd FROM users WHERE id=$session_id";
    $tmpresult = $mysqli->query($tmpSql);
    $row=$tmpresult->fetch_array(MYSQLI_ASSOC);
    $tmppwd = $row['pwd'];
 
    if ($encrypted_pwd != $tmppwd) {
        header('Location: ../pages/accountpage.php?pwd=Incorrect');
    } else {
        $encrypted_pwd=crypt($newpwd,$salt);
        $sql ="UPDATE users SET pwd='$encrypted_pwd' WHERE id=$session_id";
        $result = $mysqli->query($sql);
        header('Location: ../pages/accountpage.php?pwd=OK');
    }
}

if(isset($_GET['confirm'])){
    $id=$_GET['confirm'];
    $sql ="UPDATE bookings SET bstatus='confirmed' WHERE bid=$id";
    $mysqli->query($sql);
    header('Location: ../pages/mybooking.php');
}

if(isset($_GET['pay'])){
    $id=$_GET['pay'];
    $sql ="UPDATE bookings SET bstatus='paid' WHERE bid=$id";
    $mysqli->query($sql);
    header('Location: ../pages/mybooking.php');
}

/*if(isset($_GET['reject'])){
    $id=$_GET['reject'];
    $sql ="UPDATE bookings SET bstatus='rejected' WHERE bid=$id";
    $mysqli->query($sql);
    $sql1="INSERT INTO failedbooking (`bid`,`accomID`,`users`,`bookFrom`,`bookTo`,`bstatus`,`noofguests`,`totalprice`,`comments`) SELECT * FROM bookings WHERE bid=$id";
    //echo $sql1;
    $mysqli->query($sql1);
    $sql2="DELETE FROM bookings WHERE bid=$id";
    $mysqli->query($sql2);
    header('Location: ../pages/mybooking.php');
}*/

if (isset($_GET['cancel'])) {
    $id=$_GET['cancel'];
    $sql ="UPDATE bookings SET bstatus='cancelled' WHERE bid=$id";
    $mysqli->query($sql);
    $sql1="INSERT INTO failedbooking (`bid`,`accomID`,`users`,`bookFrom`,`bookTo`,`bstatus`,`noofguests`,`totalprice`,`comments`) SELECT * FROM bookings WHERE bid=$id";
    $mysqli->query($sql1);
    $sql2="DELETE FROM bookings WHERE bid=$id";
    $mysqli->query($sql2);
    header('Location: ../pages/mybooking.php');
}    

if(isset($_GET['bookingConf'])){
    $id=$session_id;
    $accomid=$_GET['accomID'];
    $bookFrom=$_GET['accomInDate'];
    $bookTo=$_GET['accomOutDate'];
    $bstatus="pending";
    $noofguests=$_GET['noofguests'];
    $price=$_GET['price'];

    $sql ="INSERT INTO bookings (`accomID`, `users`, `bookFrom`,`bookTo`,`bstatus`,`noofguests`,`totalprice`) VALUES ('$accomid','$id','$bookFrom','$bookTo','$bstatus','$noofguests','$price')";
    echo $sql;
    $mysqli->query($sql);
    header('Location: ../pages/mybooking.php');
}

if(isset($_GET['review'])){
    $bid=$_GET['bid'];
    $hostID=$_GET['hostID'];
    $accomID=$_GET['accomID'];
    $accomRating=$_GET['accomRating'];
    $hostRating=$_GET['hostRating'];
    $review=$_GET['review'];
    $sql ="INSERT INTO reviews (`bid`,`hostID`,`reviewerID`,`accomID`,`accomRating`,`hostRating`,`review`) VALUES ('$bid','$hostID','$session_id','$accomID','$accomRating','$hostRating','$review')";
    $mysqli->query($sql);
    $sql1 ="UPDATE bookings SET bstatus='reviewed' WHERE bid=$bid";
    $mysqli->query($sql1);
    header('Location: ../pages/mybooking.php');
}

if(isset($_GET['updatereview'])){
    $id=$_POST['id'];
    $accomRating=$_POST['accomRating'];
    $hostRating=$_POST['accomRating'];
    $review=$_POST['review'];
    $sql ="UPDATE reviews SET accomRating='$accomRating', hostRating='$hostRating', review='$review' WHERE id=$id";
    $mysqli->query($sql);
    header('Location: ../pages/myreviews.php');
}

if(isset($_GET['delReview'])){
    $reviewID=$_GET['delReview'];
    $sql = "SELECT bid FROM reviews WHERE id=$reviewID";
    $result = $mysqli->query($sql);
    if(!$result) {
        echo "<script type='text/javascript'>alert('Database Error: There has been an error occurred in database please contact support');
        window.location='../pages/myreviews.php';</script>";
     }
     else {
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $bid = $row['bid'];
        $sql = "UPDATE bookings SET bstatus='paid' WHERE bid=$bid";
        if(!$mysqli->query($sql)) {
            echo "<script type='text/javascript'>alert('Database Error: There has been an error occurred in database please contact support');
            window.location='../pages/myreviews.php';</script>";
        }
        else {
            $sql = "DELETE FROM reviews WHERE id = $reviewID";
            if(!$mysqli->query($sql)) {
                echo "<script type='text/javascript'>alert('Database Error: There has been an error occurred in database please contact support');
                window.location='../pages/myreviews.php';</script>";
            }
            else {
                header('Location: ../pages/myreviews.php');
            }
        }
    }
}

if(isset($_GET['contact'])){
    $fromID=$_POST['fromID'];
    $toID=$_POST['toID'];
    $message=$_POST['message'];
    $fullMessage=$_POST['msgDetails'].$message;
    $bookingID=$_POST['bookingID'];
    $sql = "INSERT INTO inbox (`fromID`,`toID`,`msg`,`bookingID`,`mread`) VALUES ('$fromID','$toID','$fullMessage','$bookingID','unread')";
    //echo $sql;
    $mysqli->query($sql);


    if(isset($_POST['reject'])){
        $sql ="UPDATE bookings SET bstatus='rejected',comments='$message' WHERE bid=$bookingID";
        $mysqli->query($sql);
        $sql1="INSERT INTO failedbooking (`bid`,`accomID`,`users`,`bookFrom`,`bookTo`,`bstatus`,`noofguests`,`totalprice`,`comments`) SELECT * FROM bookings WHERE bid=$bookingID";
        //echo $sql1;
        $mysqli->query($sql1);
        $sql2="DELETE FROM bookings WHERE bid=$bookingID";
        //echo $sql2;
        $mysqli->query($sql2);
        header('Location: ../pages/mybooking.php');
    } else {
        header('location: ../pages/inbox.php');
    }
}

if(isset($_GET['editListing'])){
    $id=$_GET['editListing'];
    $accomAddress=$_POST['accomAddress'];
    $availFrom=$_POST['availFrom'];
    $availTo=$_POST['availTo'];
    $guests=$_POST['guests'];
    $price=$_POST['price'];
    $rooms=$_POST['rooms'];
    $bathrooms=$_POST['bathrooms'];
    $smoking=$_POST['smoking'];
    $garage=$_POST['garage'];
    $pet=$_POST['pet'];
    $internet=$_POST['internet'];
    $sql="UPDATE accommodation SET accomAddress='$accomAddress',availFrom='$availFrom',availTo='$availTo',guests='$guests',price='$price',rooms='$rooms',bathrooms='$bathrooms',smoking='$smoking',garage='$garage',pet='$pet',internet='$internet' WHERE id=$id";
    if(!$mysqli->query($sql)) {
        echo "<script type='text/javascript'>alert('Database Error: There has been an error occurred in database please contact support');
    window.location='../pages/mylistings.php';</script>";
    }
    else {
        header('location: ../pages/mylistings.php?updated');
    }
}

if(isset($_GET['delListing'])){
    $id=$_GET['delListing'];
    $sql="UPDATE accommodation SET active=0 WHERE id=$id";
    if(!$mysqli->query($sql)) {
        echo "<script type='text/javascript'>alert('Database Error: There has been an error occurred in database please contact support');
    window.location='../pages/mylistings.php';</script>";
    }
    else {
        header('location: ../pages/mylistings.php');
    }
}

if(isset($_GET['newListing'])){
    //first upload the house image
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check == false)
            echo "<script type='text/javascript'>alert('House image is not an actual image.');
            window.location='../pages/mylistings.php';</script>";

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000)
        echo "<script type='text/javascript'>alert('Sorry, your file is too large.');
            window.location='../pages/mylistings.php';</script>";

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
            window.location='../pages/mylistings.php';</script>";
        }

    // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $accomLocation=$_POST['accomLocation'];
            $accomName=$_POST['accomName'];
            $accomDesc=$_POST['accomDesc'];
            $accomAddress=$_POST['accomAddress'];
            $city=$_POST['city'];
            $availFrom=$_POST['availFrom'];
            $availTo=$_POST['availTo'];
            $guests=$_POST['guests'];
            $price=$_POST['price'];
            $rooms=$_POST['rooms'];
            $bathrooms=$_POST['bathrooms'];
            $smoking=$_POST['smoking'];
            $garage=$_POST['garage'];
            $pet=$_POST['pet'];
            $internet=$_POST['internet'];
            $entireHouse=$_POST['entireHouse'];
            $image = basename($_FILES["fileToUpload"]["name"]);
            $sql="INSERT INTO accommodation (accomLocation,accomAddress,availFrom,availTo,guests,price,rooms,bathrooms,smoking,garage,pet,internet,accomName,accomDesc,city,entireHouse,hostID,image) VALUES
            ('$accomLocation','$accomAddress','$availFrom','$availTo','$guests','$price','$rooms','$bathrooms','$smoking','$garage','$pet','$internet','$accomName','$accomDesc','$city','$entireHouse',$session_id,'". $image ."')";
            if(!$mysqli->query($sql)) {
                echo "<script type='text/javascript'>alert('Database Error: There has been an error occurred in database please contact support');
                 window.location='../pages/mylistings.php';</script>";
            }
            else {
                header('location: ../pages/mylistings.php');
            }
        } else {
            echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');
            window.location='../pages/mylistings.php';</script>";
        }
}

if(isset($_GET['mark'])){
    $id=$_GET['mark'];
    $sql="UPDATE inbox SET mread='read' WHERE id=$id";
    $mysqli->query($sql);
    header('location:../pages/inbox.php');
}

if(isset($_POST['newaccess'])){
    $id=$_GET['id'];
    $access=$_POST['newaccess'];
    $sql="UPDATE users SET access='$access' WHERE id=$id";
    if(!$mysqli->query($sql)) {
        echo "<script type='text/javascript'>alert('Database Error: There has been an error occurred in database please contact support');
    window.location='../pages/editusers.php';</script>";
    }
    else {
        header('location:../pages/editusers.php?done');
    }
}

if(isset($_GET['delUser'])){
    $id=$_GET['delUser'];
    $sql="UPDATE users SET active= 0 WHERE id=$id";
    if(!$mysqli->query($sql)) {
        echo "<script type='text/javascript'>alert('Database Error: There has been an error occurred in database please contact support');
    window.location='../pages/editusers.php';</script>";
    }
    else {
        header('location:../pages/editusers.php?done');
    }
}
?>
