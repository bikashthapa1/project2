<?php

session_start();
include 'includes/db.inc.php';
if(isset($_POST['finduser']))
{
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $sql="SELECT *FROM user WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    $resultCheck= mysqli_num_rows($result);
    if($resultCheck > 0)
    {
        while($row = mysqli_fetch_assoc($result)) {
            echo '
            <!DOCTYPE html>
            <html>
            
            <head>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-compatible" content="IE-edge">
              <title>DBMS Project</title>
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <meta name="description" content="Employee Management website" />
              <meta name="keywords" content="Employee" />
              <meta name="author" content="Prasant Jha" />
              <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.min.css">
              <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap-theme.min.css">
              <link rel="stylesheet" href="css/animate.css">
              <link rel="stylesheet" href="node_modules\font-awesome\css\font-awesome.min.css">
              <link rel="stylesheet" href="mystyle.css">
              
            </head>
            
            <body>
              <div class="top">
                <nav class="navbar navbar-expand-lg navbar-dark fixed-top" role="navigation">
                  <div class="container-fluid">
                    <div class="navbar-header">
            
                      /*<a class="navbar-brand" href="profile.php">DBMS Project</a>*/
                      <button class="navbar-toggle navbar-toggle-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
            
                      </button>
                    </div>
                    <div id="navbarResponsive" class="navbar-collapse collapse">
                      <ul class="nav navbar-nav navbar-right">
                        <li >
                          <a href="aprofile.php" data-nav-section="home">
                            <span>Home</span>
                          </a>
                          
                        <li><a href="includes/logout.inc.php" data-nav-section="work" id="navlogin" name="logout"><span>Logout</span></a></li>
                      </ul>
                    </div>
                  </div>
                </nav>
                </div>
            <div class="container">
            <h2>Employee Details</h2>
            <p>The table contains the employee details:</p>            
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>Position</th>
                  <th>Date of Joining</th>
                  <th>Contact no</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>'.$row["name"].'</td>
                  <td>'.$row["gender"].'</td>
                  <td>'.$row["email"].'</td>
                  <td>'.$row["position"].'</td>
                  <td>'.$row["doe"].'</td>
                  <td>'.$row["phone"].'</td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="container-fluid">
          
            <footer>
              <div class="row">
        
                <div class="col-lg-12">
                  <div class="col-md-7">
                    <a href="#">Terms of Service</a> |
                    <a href="#">Privacy</a>
                  </div>
                  <div class="col-md-5">
                    <p class="muted pull-right">© 2017 Prasant Jha. All rights reserved</p>
                  </div>
                </div>
              </div>
          </div>
          </footer>
          </div>
        </body>
            
        
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous"></script>
            <script src="node_modules\popper.js\dist\popper.min.js"></script>
            <script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
        
        </body>
        </html>
            
            
            ';
        }
    }
    else
    {
        echo'No user found';
    }
}

else{
    header("Location: ../alogin.php");
    exit();
}


?>