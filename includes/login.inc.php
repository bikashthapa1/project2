<?php


if(isset($_POST['submit']))
{
    include 'db.inc.php';
    session_start();

    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $pass=mysqli_real_escape_string($conn, $_POST['password']);

    $sql="SELECT *FROM user where email='$email'";
    $result= mysqli_query($conn, $sql);
    $resultCheck= mysqli_num_rows($result);
    if($resultCheck<1)
      {
        header("Location: ../elogin.php?LoginError");
        exit();
    }
    else
    {
        if($row = mysqli_fetch_assoc($result)){
            $hashedPwdCheck = password_verify($pass,$row['pass']);
            if($hashedPwdCheck == false){
                header("Location: ../elogin.php?LoginError");
                exit();
            }
            elseif($hashedPwdCheck == true){
                $_SESSION['user_id']=$row['id'];
                $_SESSION['user_email']= $row['email'];
                $_SESSION['user_name']= $row['name'];
                $_SESSION['user_doe']= $row['doe'];
                $_SESSION['user_gender']= $row['gender'];
                $_SESSION['user_phone']= $row['phone'];
                $_SESSION['user_position']= $row['position'];
                header("Location: ../profile.php");
                exit();
                
            }
        }
    }
}
else{
    header("Location: ../elogin.php?LoginError");
    exit();
}