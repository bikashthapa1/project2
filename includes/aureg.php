<?php 
session_start();
if(isset($_POST['submit']))
{
    include_once 'db.inc.php';
    
    $name= mysqli_real_escape_string($conn, $_POST['myName']);
    $pwd= mysqli_real_escape_string($conn, $_POST['pwd']);
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $doe= mysqli_real_escape_string($conn, $_POST['dob']);
    $gender= mysqli_real_escape_string($conn, $_POST['gender']);
    $phone= mysqli_real_escape_string($conn, $_POST['phone']);
    $position= mysqli_real_escape_string($conn, $_POST['position']);
    

    $sql= "SELECT *FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    
    if($resultCheck > 0)
    {
        header("Location: ../eregistration.php?usertaken");
        exit();
    }
    else
    {
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (name, pass, email, doe, gender, phone, position) 
                    VALUES('$name','$hashedPwd','$email','$doe','$gender','$phone','$position');";
    
        mysqli_query($conn, $sql);
        $sql = "SELECT * FROM user WHERE email='$email' AND name='$name'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) 
        {
            while ($row = mysqli_fetch_assoc($result))
             {
                $userid = $row['id'];
                $sql = "INSERT INTO profileimg (userid, status)
                VALUES ('$userid', 1)";
                mysqli_query($conn, $sql);
            }
            header("Location: ../uc.php");
            exit();

        }
    }
}
else
{
    header("Location: ../aprofile.php");
    exit();
}