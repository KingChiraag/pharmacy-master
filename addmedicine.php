<?php
     require 'dbconfig/db.php';
   //  include "header1.html";
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Medicine</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
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
                <a class="nav-link" href="addmedicine.php">Add Medicine Details <span class="sr-only">(current)</span></a>
               </li>
                <li class="nav-item">
                <a class="nav-link" href="deletemedicine.php">Remove medicines</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="viewmedicine.php">View Medicine Details</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="medicinedashboard.php">Medicine Dashboard</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
                </li>
                
                
             </ul>
          </div>
        </nav>
<body><h1>Add Medicine</h1>
    <div class="container">

    <form  action="addmedicine.php" method="post">
       
    <label for="cid">Company_id:<p>If you are not a registered company<a href="addcompany.php"> <b>Register Here!</b></a></p></label><br><br>
        <input type="text" id="cid" name="cid" required><br><br> 


        <label for="mname">Medicine name:</label><br><br>
        <input type="text" id="mname" name="mname" required><br><br>

       <label for="cname"> Category name:</label><br><br>
       <input type="text" id="cname" name="cname" required><br><br>
       <label for="pdate">Purchase Date:</label><br><br>
      <input type="date" id="pdate" name="pdate" required><br><br>

      <label for="mfdate">  Manufacture date: </label><br><br>
      <input type="date" id="mfdate" name="mfdate" required><br><br>

      <label for="expdate">Expiry date:</label><br><br>
      <input type="date" id="expdate" name="expdate" required><br><br>

      <!--<label for="bprice">Buying price:</label><br><br>
      <input type="number" id="mrp" name="mrp" required><br><br>-->

      <label for="mrp">Mrp:</label><br><br>
      <input type="number" id="mrp" name="mrp" required><br><br>

      <label for="quantity">Quantity:</label><br><br>
      <input type="number" id="quantity" name="quantity" required><br><br>

      <input type="submit" name="addmedicine" value="Add Medicine">

        </div>
    </form>
</body>
</html>



<?php

   if(isset($_POST['addmedicine']))
   {
      // echo '<script type ="text/javascript"> alert("Sign up button clicked") </script>';
      $company_id= mysqli_real_escape_string($con, $_REQUEST['cid']);
    $medicine_name= mysqli_real_escape_string($con, $_REQUEST['mname']);
    $category_name=mysqli_real_escape_string($con, $_REQUEST['cname']);
   // $p_username = mysqli_real_escape_string($con, $_REQUEST['p_username']);
    $mfd_date = mysqli_real_escape_string($con, $_REQUEST['mfdate']);
    $expdate = mysqli_real_escape_string($con, $_REQUEST['expdate']);
    $mrp = mysqli_real_escape_string($con, $_REQUEST['mrp']);
   // $gender = mysqli_real_escape_string($con, $_REQUEST['gender']);
    $quantity = mysqli_real_escape_string($con, $_REQUEST['quantity']);
    //$role = mysqli_real_escape_string($con, $_REQUEST['role']);
   // $dob = mysqli_real_escape_string($con, $_REQUEST['dob']);
   
            $query ="INSERT INTO medicine (company_id,medicine_name,category_name,mfg_date,expiry,mrp,quantity)  VALUES('$company_id','$medicine_name','$category_name','$mfd_date','$expdate','$mrp','$quantity');";
            $query_run =mysqli_query($con,$query);
            if($query_run==TRUE)
            {
                
                echo '<script type ="text/javascript"> alert("Medicine Added Successfully....") </script>';
                
            }
           else
           { 
                echo '<script type ="text/javascript"> alert(" Medicine not added successfuly ....") </script>';
           }
        }
    
?>

