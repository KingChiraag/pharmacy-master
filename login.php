<?php
     require 'dbconfig/db.php';
   //  include "header1.html";
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="register.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
       <center> <h1><b>QuickRelief Pharmacy</b></h1>
        <h6><b> "Empowering Health, Enriching Lives: Your Trusted Pharmaceutical Partner"</b></h6></center>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">QuickRelief Pharmacy </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="nav-link" href="home.php">HOME <span class="sr-only">(current)</span></a>
               </li>
                <li class="nav-item">
                <a class="nav-link" href="login.php">LOGIN</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="register.php">REGISTER</a>
                </li>
                
                
             </ul>
          </div>
        </nav>
    <title>Login Form</title>

<body>
    <div class="container">
    <center>   <h3>SIGN IN</h3></center> 
      <form action="login.php" method="post">
        <div class="form-group">
            <input type="text" placeholder="Enter username:" name="name" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div><p>Not registered yet ?     <a href="register.php"><b>Register Here</b></a></p></div>
    </div>
</body>
</html>
<?php
        if(isset($_POST['login']))
        {
            $name=$_POST['name'];
            $password=$_POST['password'];
            $query="select  * from staff WHERE name='$name' AND password='$password'";
            $query_run =mysqli_query($con,$query);
            if(mysqli_num_rows($query_run)>0)
            {
                echo '<script type ="text/javascript"> alert("User logged in successfully ") </script>';
                session_start();
                $_SESSION['name']=$name;
                header('location:dashboard.php');
            }
            else{
                echo '<script type ="text/javascript"> alert("Invalid Credentials ") </script>';
            }
        }
        ?>