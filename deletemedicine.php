<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Medicine</title>
 
</head>
<html>
<head>
<title>VIEW BUS</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: lightblue;
}

.container {
    width: 50%;
    margin: 50px auto;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
}

h1 {
    text-align: center;
}

form {
    padding: 20px;
}

label {
    font-weight: bold;
}


input[type="number"],

select,
textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: #007bff;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
</head>

<title>Add Medicine</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                <a class="nav-link" href="addcompany.php">Add Comapany <span class="sr-only">(current)</span></a>
               </li>
                <li class="nav-item">
                <a class="nav-link" href="addmedicine.php">Add Medicine</a>
                </li>
                <li class="nav-item"><li class="nav-item">
                <a class="nav-link" href="viewmedicine.php">View Medicine Details</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="login.php">Logout</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="addmedicine.php">Medcine Dashboaed</a>
                </li>
             </ul>
          </div>
        </nav>
<body><h1>Delete Medicine:</h1><div class="container">
<form action ="deletemedicine.php" method="post">
   <label for="mid">Medicine id:</label> <br><br>
   <input type="number" name="medicine_id">
   <input type="submit" name="d_medicine" value="Delete Medicine">
</form>
</div>
</body>
</html>
<?php
require "dbconfig/db.php";
//error_reporting(0);
//$t='';
if(isset($_POST['d_medicine'])){
//$medicine_id=$_POST['t'];
$medicine_id= mysqli_real_escape_string($con, $_REQUEST['medicine_id']);
//echo 't';
$query5="DELETE FROM medicine WHERE medicine_id='$medicine_id'";      
    if($con->query($query5)==TRUE)
    {
            echo '<script type ="text/javascript"> alert("Medicine details deleted successfuly ....") </script>';
          //  header('location:viewmedicine.php');
    }
   else
   { 
    echo '<script type ="text/javascript"> alert("Medicine details  not deleted successfuly ....") </script>';
   }
}

    ?>