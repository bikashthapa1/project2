<?php
session_start();
include 'includes/db.inc.php';
if(isset($_SESSION['admin_email']))
{

echo '<!DOCTYPE html>
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
              </li>
            
            <li><a href="includes/logout.inc.php" data-nav-section="work" id="navlogin" name="logout"><span>Logout</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
    
    
    <h1> Welcome to Employee Management System</h1>';                     
                          
 

  echo'
  <div class="container">    
  <div class="row">
      <div class="panel panel-primary">
      <div class="panel-heading">  
      <h1>Admin Profile</h1></div>
       <div class="panel-body">
      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">';
        echo '<div class="profile-pic">';
       echo "<img src='includes/uploads/profiledefault.jpg' class='img-responsive'>";      
    echo '
      </div>
      </div>
      <div class="col-md-6 col-xs-12 col-sm-6 col-lg-8" >
          <div class="container-details" >
            <h2>'.$_SESSION['admin_name'].'</h2>
            <p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>'.$_SESSION['admin_email'].'</p>
        <ul>
        <div class="span1">
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#adduser"><span class="glyphicon glyphicon-plus"></span><br>Add Employee</button>
        <div id="adduser" class="collapse">
        <form name="myform" action="includes/aureg.php" method="post">
        <div class=" form-group">
          <label for="myName">Name *</label>
          <input id="myName" name="myName" class="form-control" type="text" required>
          <span id="error_name" class="text-danger"></span>
        </div>
        <div class="col-md-6 form-group">
          <label for="pwd">Password*</label>
          <input id="pwd" name="pwd" class="form-control" type="password" required>
          <span id="error_pwd" class="text-danger"></span>
        </div>
        <div class="col-md-6 form-group">
          <label for="confirmpwd">Confirm Password *</label>
          <input id="confirmpwd" name="confirmpwd" class="form-control" type="password" required>
          <span id="error_confirmpwd" class="text-danger"></span>
        </div>
        <div class="col-md-6 form-group">
          <label for="email">Email *</label>
          <input id="email" name="email" class="form-control" type="text" required>
          <span id="error_email" class="text-danger"></span>
        </div>
        
        <div class="col-md-6 form-group">
          <label for="dob">Date of Enrollment *</label>
          <input type="date" name="dob" id="dob" class="form-control" required>
          <span id="error_dob" class="text-danger"></span>
        </div>
        <div class="col-md-6 form-group">
          <label for="gender">Gender*</label>
          <select name="gender" id="gender" class="form-control">
            <option selected>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
          <span id="error_gender" class="text-danger"></span>
        </div>
        <div class="col-md-6 form-group">
          <label for="phone">Phone Number *</label>
          <input type="text" id="phone" name="phone" class="form-control" required>
          <span id="error_phone" class="text-danger"></span>
        </div>
        <div class=" form-group">
          <label for="position">Position *</label>
          <input id="position" name="position" class="form-control" type="text" required>
          <span id="error_position" class="text-danger"></span>
        </div>
        
        
        <button id="submit" name="submit" type="submit" value="submit" class="btn btn-primary center">Submit</button>
    
      </form>
      </div>
    </div>';
    echo '<div class="span1">
    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#viewuser"><span class="glyphicon glyphicon-eye-open"></span><br>View Employee</button>
    <div id="viewuser" class="collapse">
    <form action="view.php" method="POST">
    <input type="text" name="email" placeholder="Enter user email.">
    <button  type="submit" name="finduser">Find</button>
  </form>
  </div>
</div>';
   echo'
   <div class="span1">
   <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#deluser"><span class="glyphicon glyphicon-trash"></span><br>Delete Employee</button>
   <div id="deluser" class="collapse">
   <form action="del.php" method="POST">
   <input type="text" name="email" placeholder="Enter user email to delete.">
   <button  type="submit" name="deluser">Delete</button>
 </form>
 </div>
</div>
<div class="span1">
<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-envelope"></span>Mailbox</button>
</div>
        </ul>
      </div>
</div>
</div>
</div>
  ';
  echo '</div>';
  echo '<div class="container-fluid">
  
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
    <script src="js/register.js"></script>

</body>
</html>';
 }

 else{
     header("Location: ../employee/alogin.php");
     exit();
 }