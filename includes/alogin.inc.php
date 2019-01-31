<?php


if(isset($_POST['alogin']))
{
    include 'db.inc.php';
    session_start();

    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $pass=mysqli_real_escape_string($conn, $_POST['password']);
    $sql="SELECT *FROM admin where email='$email'";
    $result= mysqli_query($conn, $sql);
    $resultCheck= mysqli_num_rows($result);
    if($resultCheck<1)
      {
        header("Location: ../alogin.php?LoginError");
        exit();
    }
    else
    {
        if($row = mysqli_fetch_assoc($result)){
            
            if($pass!=$row['pass']){
                header("Location: ../alogin.php?LoginError");
                exit();
            }
            elseif($pass==$row['pass']){
                $_SESSION['admin_id']=$row['id'];
                $_SESSION['admin_email']= $row['email'];
                $_SESSION['admin_name']= $row['name'];
                header("Location: ../aprofile.php");
                exit();
                
            }
        }
    }
}
else{
    header("Location: ../alogin.php?LoginError");
    exit();
}
