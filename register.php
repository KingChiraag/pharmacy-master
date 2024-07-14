
<?php
     require 'dbconfig/db.php';
   //  include "header1.html";
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
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
</head>


<body> <div class="container">
    <center><h1>Register</h1></center>
   <form action ="register.php" method="post">
    
        </select><br><br>

       <label for="name">Name</label> <br><br>
        <input type="text" name="name" id="name" placeholder="Enter your name" required ><br><br>
       <!-- <label for="uname">Username</label> <br><br>
        <input type="text" name="p_username" id="uname" placeholder="Enter your username " required ><br><br>-->
        <!-- <label for="sal">Salary</label><br><br>
       <input type="number"  id="sal" placeholder="Enter your Salary" required name="salary"><br><br>-->
        <label for="phone">Mobile Number</label> <br><br>
        <input type="text" name="phone" id="phone" maxlength="10" required><br><br>

        <label for="dob">Date of Birth</label> <br><br>
        <input type="date" name="dob" id="dob"><br><br>

     

        <label for="email">Email</label><br><br>
        <input type="email" name="email" id="email" required> <br><br>

        <label for="password">Password</label> <br><br>
       <input type="password" name="password" id="password" required><br><br>
         
      <label for="cpassword"></label> <input  name="cpassword" type="password" id="cpassword" placeholder="Confirm password"required/><br><br>


   <!--  <label for="gender">Gender:</label>
        <input type="radio" name="gender" id="gender">Male
        <input type="radio" name="gender" id="gender">Female<br><br>-->

      <!---- <label for="address">Address</label><br><br>
       <input type="text" name="address" id="address"><br><br>-->
       <input type="submit" name="adduser" value="Register"><br><br>
    </div>
    </form>


<?php

   if(isset($_POST['adduser']))
   {
       //echo '<script type ="text/javascript"> alert("Sign up button clicked") </script>';
   
    $name= mysqli_real_escape_string($con, $_REQUEST['name']);
  //  $salary=mysqli_real_escape_string($con, $_REQUEST['salary']);
   // $p_username = mysqli_real_escape_string($con, $_REQUEST['p_username']);
    $email = mysqli_real_escape_string($con, $_REQUEST['email']);
    $password = mysqli_real_escape_string($con, $_REQUEST['password']);
    $cpassword = mysqli_real_escape_string($con, $_REQUEST['cpassword']);
   // $gender = mysqli_real_escape_string($con, $_REQUEST['gender']);
    $phone = mysqli_real_escape_string($con, $_REQUEST['phone']);
   // $role = mysqli_real_escape_string($con, $_REQUEST['role']);
    $dob = mysqli_real_escape_string($con, $_REQUEST['dob']);
    if($password==$cpassword){
        $query="Select * from staff where name='$name'";
        $query_run =mysqli_query($con,$query);
       
        if(mysqli_num_rows($query_run)>0)
        {
            echo '<script type ="text/javascript"> alert("User name already exists") </script>';
        }
    
        else
        {
            $query ="INSERT INTO staff (name,phone,dob,email,password)  VALUES('$name','$phone','$dob','$email','$password');";
            $query_run =mysqli_query($con,$query);
            if($query_run==TRUE)
            {
                
                echo '<script type ="text/javascript"> alert("Registered successfuly Go to Login page....") </script>';
                header('location:login.php');
                
            }
           else
           { 
                echo '<script type ="text/javascript"> alert("User details not added successfuly ....") </script>';
           }
        }
    }

     else
        {
               echo '<script type ="text/javascript"> alert("password does not match") </script>';
        }
       }
    
?>
</body>
</html>
