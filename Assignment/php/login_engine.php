<?php
include ('../pages/db_conn.php');
include ('../pages/session.php');

if(isset($_POST)){
$user_email = trim($_POST['loginEmail']);
$user_password = $_POST['loginPassword'];

$salt="KIT502";
$encrypted_pwd = crypt($user_password,$salt);

$sql ="SELECT * FROM users WHERE email='$user_email' AND (NOT active='inactive' OR active IS NULL)";
$result = $mysqli->query($sql);
$row=$result->fetch_array(MYSQLI_ASSOC);

//if(!$row['email'] || $row['email'] != $user_email ){
if(is_null($row)){
   echo "Cannot locate your email in our system, please confirm your email.";
  } else {
    if($row['pwd'] == $encrypted_pwd) {

      $_SESSION['session_id'] = $row['id'];
      $_SESSION['session_user']=$row['firstname'];
      $_SESSION['session_lastname']=$row['lastname'];
      $_SESSION['session_email']=$row['email'];
      $_SESSION['session_mobile']=$row['mobile'];
      $_SESSION['session_access']=$row['access'];
      
      echo '<script type="text/javascript"> $("#loginModal").modal("hide") </script>';

      $welcomeMsg = "Hi " . $_SESSION['session_user'] . ", you are now logged in.";
      echo '<script type="text/javascript"> alert("'.$welcomeMsg.'") </script>';
      echo '<script type="text/javascript"> window.location.reload() </script>';

    } else {
    echo "Invalid password! Please try again.";
    }
  }
}

?>
