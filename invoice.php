<?php
     require 'dbconfig/db.php';
     session_start();
    
 $s_id=$_SESSION['s_id'];
 echo "$s_id";
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
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
                <a class="nav-link" href="medicinedashboard.php">MEDICINE <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                <a class="nav-link" href="dashboard.php">MAIN DASHBOARD</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="home.php">LOG OUT</a>
                </li>
              
                
                
             </ul>
          </div>
        </nav>
</head>
<body><div class="container">
    <form action="invoice.php" method="post">
        <label for="pnumber">Phone Number:</label><br><br>
        <input type="number" id="pnumber" name="pnumber"> <br><br>
        <label for="idate">Invoice Date:</label><br><br>
        <input type="date" id="idate" name="idate"><br><br>
        <input type="submit" value="Submit" name="submit"></div>
    </form>
</body>
</html>
<?php

   if(isset($_POST['submit']))
   {
       //echo '<script type ="text/javascript"> alert("Sign up button clicked") </script>';
    $invoice_date= mysqli_real_escape_string($con, $_REQUEST['idate']);
    $phone_number = mysqli_real_escape_string($con, $_REQUEST['pnumber']);
            $query ="INSERT INTO invoice (invoice_date,phone_number)  VALUES('$invoice_date','$phone_number');";
            $query_run =mysqli_query($con,$query);
            if($query_run==TRUE)
            {
                
                echo '<script type ="text/javascript"> alert("Date and Phone Numbersuccessfuly....") </script>';
                header('location:billing.php');
                
        $_SESSION['phone_number'] = $phone_number;
        $_SESSION['invoice_date'] = $invoice_date;
            }
           else
           { 
                echo '<script type ="text/javascript"> alert("Date and Phone Numbersuccessfuly.... ....") </script>'
                ;
           }
        } 
?>
</body>
</html>
