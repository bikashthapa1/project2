

<?php

 $dbServername="localhost";
 $dbUsername="root";
 $dbPassword="";
 $dbName="project2";

 $conn= mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn){
	die("Error in connection".mysql_error());
}


 ?>
