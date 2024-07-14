<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Medicine</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="addcompany.css">
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
               
                <li class="nav-item">
                <a class="nav-link" href="invoice.php">Billing</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Main Dashboard</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="home.php">Log out </a>
                </li>
                
             </ul>
          </div>
        </nav>
</head>
<body><div class="container">
    <h1><center>Customer Details</center></h1>
    <form action="addcustomer.php" method="post">
    <!--c_id:
    <input type="number" name="c_id">-->
    <label for="cname">Customer Name:</label><br><br>
    <input type="text" name="cname" id="cname" required>
    <br><br>
   <label for="email">Email:</label><br><br>
    <input type="email" name="email" id="email" required>
    <br><br>
   <label for="number">Phone Number: </label><br><br>
    <input type="number" name="phone" maxlength="10" id="number" required>
    <br><br>
    <input type="submit" name="addCompany" value="submit">

   <!-- s_id
    <input type="number" name="staff_id">
    <br><br><br>-->
</form></div>
</body>
</html>
<?php
    require "dbconfig/db.php";
   // include "header.php";
   session_start();
   $s_id = $_SESSION['s_id'];
   echo $s_id;
           $_SESSION['s_id'] = $s_id;
        if(isset($_POST['addCompany']))
        {
               // echo '<script type ="text/javascript"> alert("Sign up button clicked") </script>';
              //$c_id = mysqli_real_escape_string($con, $_REQUEST['c_id']);
              $cust_name = mysqli_real_escape_string($con, $_REQUEST['cname']);
             // $company_name= mysqli_real_escape_string($con, $_REQUEST['comp_name']);
            //  $sales_ex = mysqli_real_escape_string($con, $_REQUEST['sales_ex']);
              $email = mysqli_real_escape_string($con, $_REQUEST['email']);
              $phone = mysqli_real_escape_string($con, $_REQUEST['phone']);
             // $s_id = mysqli_real_escape_string($con, $_REQUEST['staff_id']);
                             
                
                    $query="INSERT INTO customer (cust_name,email,phone)  VALUES ('$cust_name' ,'$email','$phone');";
                    $query_run =mysqli_query($con,$query);
                    if($query_run===TRUE)
                    {
                            echo '<script type ="text/javascript"> alert("Company details added successfuly ....") </script>';
                           // header('location:Company.php');

                        }
                   else
                   { 
                    echo '<script type ="text/javascript"> alert("Company details  not added successfuly ....") </script>';
                   }
                   
                    
                
                
            }
?>